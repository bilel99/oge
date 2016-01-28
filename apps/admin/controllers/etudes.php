<?php

class etudesController extends bootstrap {

    function etudesController($command, $config, $app) {
        parent::__construct($command, $config, $app);
        $this->users->checkAccess('etudes');

        $this->menu_admin = 'etudes';
    }

    function _default() {
        $this->loadJs('admin/etudes/default');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadCss('../styles/admin/jquery.dataTables');

        

        $params = array();
        $this->limit = $limit = 20;
        $page = 1;
        if (count($this->params)) {
            for ($i = 0; $i < count($this->params); $i++) {
                if (isset($this->params[$i])) {
                    $par = explode("=", $this->params[$i]);
                    $params[$par[0]] = urldecode($par[1]);
                }
            }
        }
        $client = $this->loadData("oge_clients");
        if (isset($params['page']))
            $page = $params['page'];
        $params['page'] = $page;
        $this->ini = $ini = ($page - 1) * $limit;
        $this->newParams = $params;

        
        $etudes = $this->loadData('etudes');
        $search = $etudes->search($params, $ini, $limit);
        $this->etudesClients = $search['count'];
        $this->etudes = $search['query'];
        
    }

    function _add() {
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/etudes/add');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->add = true;
        $this->settings->get('Budget HFS', 'type');
        $this->budgetHFS = $this->settings->value;
    }

    function _edit() {
        // Chargements fichiers JS
        $this->loadJs('admin/jquery/jquery.validate.min');
        //$this->loadJs('admin/etudes/edit');


        /* Récupération des utilisateur sur cette études */
        $cdmetudes = $this->loadData('cdm_etude');
        $this->cdmetudes = $cdmetudes->findByEtude($this->params[0]);
        /* FIN */

        /* Récupération percentage étude cdp_etude */
        $cdpetudes = $this->loadData('cdp_etude');
        $this->cdpetudes = $cdpetudes->findByEtude($this->params[0]);
        /* FIN */


        $this->cdp_etude = $this->loadData("cdp_etude")->select("id_etude = " . $this->params[0], "added ASC");
        $this->cdm_etude = $this->loadData("cdm_etude")->selectCdm($this->params[0]);


        /* Récupération des memos */
        $this->memos = $this->loadData("memos")->findbyidtarget($this->params[0], 'etudes');


        /* Récupération des cdm status = 1 et archive != 1 */
        $cdms = $this->loadData('cdms');
        $this->cdms = $cdms->select('status = 1 AND archive = 1');
        /* FIN */


        /* Récupération table etude - contact - client */
        $etudeContactClient = $this->loadData('etudes');
        $this->etudeContactClient = $etudeContactClient->selectClient($this->params[0]);
        /* FIN */

        /* Documents nom prenom selon le document diverge */
        $this->cdpEtu = $cdpetudes->findByEtudecdpsContactClient(4);
        /* FIN */

    }

    function _doc() {

        $this->type_document = $this->loadData("type_document")->select("id_type_doc = " . $this->params[1]);
        $this->doc_templates = $this->loadData("doc_templates");

        if (isset($_SESSION['user']['id_user'])) {
            $this->elements = $this->doc_templates->selectDocTemp($this->type_document[0]['id_type_doc'], $_SESSION['user']['id_user']);
        } else if (isset($_SESSION['user']['id_cdp'])) {
            $this->elements = $this->doc_templates->selectDocTemp($this->type_document[0]['id_type_doc'], $_SESSION['user']['id_cdp']);
        }


        $this->view = "typeDocuments/" . $this->type_document[0]['src'];


        // Joint Etude CLient
        $this->etude = $this->loadData("etudes")->selectClient($this->params[0]);
        // FIN
        // Joint Etude CDM
        $this->etudeCdm = $this->loadData("etudes")->selectCdm($this->params[0]);
        $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
        // FIN
        // Joint Etude CDM
        $cdmetudes = $this->loadData('cdm_etude');
        $this->cdmetudes = $cdmetudes->findByEtude($this->params[0]);
        // FIN
        
        
        
        
        /* Récupération info_document */
        $info_document = $this->loadData('info_documents');
        $this->info_doc = $info_document->select('id_document ='.$this->params[2]);
        
        /*FIN*/
        
        
        
        
        
        // Date du jour Formated
        $date = date('Y-m-d');
        $d = substr($date, 8, 10);
        $m = substr($date, 5, 2);
        $y = substr($date, 0, 4);
        $this->date = $d . '/' . $m . '/' . $y;
        // FIN
        // Setting ######################################
        $this->settings->get('Setting1eachtimeDocument', 'type');
        $this->setting1eachtimeDocument = $this->settings->value;

        $this->settings->get('Setting6Document', 'type');
        $this->Setting6Document = $this->settings->value;

        $this->settings->get('Setting1Document', 'type');
        $this->Setting1Document = $this->settings->value;

        $this->settings->get('Setting2Document', 'type');
        $this->Setting2Document = $this->settings->value;

        $this->settings->get('Setting3Document', 'type');
        $this->Setting3Document = $this->settings->value;

        $this->settings->get('Setting4Document', 'type');
        $this->Setting4Document = $this->settings->value;

        $this->settings->get('Setting5Document', 'type');
        $this->Setting5Document = $this->settings->value;

        $this->settings->get('Setting7Document', 'type');
        $this->Setting7Document = $this->settings->value;

        $this->settings->get('SettingCompagnyName', 'type');
        $this->SettingCompagnyName = $this->settings->value;

        $this->settings->get('Setting9_Document', 'type');
        $this->Setting9_Document = $this->settings->value;

        $this->settings->get('Setting10_Document', 'type');
        $this->Setting10_Document = $this->settings->value;

        $this->settings->get('Setting12_Document', 'type');
        $this->Setting12_Document = $this->settings->value;




        // FIN ##########################################
        // Enregistrement du ttc dans table etude get(params)
        
        $this->type_document_facture_frais = $this->loadData("type_document")->select("id_type_doc = 5");
        
        if (isset($_SESSION['user']['id_user'])) {
            $this->elements_facture_frais = $this->doc_templates->selectDocTemp(5, $_SESSION['user']['id_user']);
        } else if (isset($_SESSION['user']['id_cdp'])) {
            $this->elements_facture_frais = $this->doc_templates->selectDocTemp(5, $_SESSION['user']['id_cdp']);
        }
        
        // CALCUL
        $hortTaxe1 = $this->elements_facture_frais[2]['value'];
        $hortTaxe2 = $this->elements_facture_frais[4]['value'];
        $hortTaxe3 = $this->elements_facture_frais[6]['value'];
        $hortTaxe4 = $this->elements_facture_frais[8]['value'];
        $hortTaxe5 = $this->elements_facture_frais[10]['value'];

        // TVA
        $tvaOriginal = $this->elements_facture_frais[0]['value'];
        
        $tva1 = ($hortTaxe1 * $tvaOriginal) / 100;
        $tva2 = ($hortTaxe2 * $tvaOriginal) / 100;
        $tva3 = ($hortTaxe3 * $tvaOriginal) / 100;
        $tva4 = ($hortTaxe4 * $tvaOriginal) / 100;
        $tva5 = ($hortTaxe5 * $tvaOriginal) / 100;

        $ttc1 = $hortTaxe1 + $tva1;
        $ttc2 = $hortTaxe2 + $tva2;
        $ttc3 = $hortTaxe3 + $tva3;
        $ttc4 = $hortTaxe4 + $tva4;
        $ttc5 = $hortTaxe5 + $tva5;


        // TOTAL CALC TTC
        $ttcTotal = $ttc1 + $ttc2 + $ttc3 + $ttc4 + $ttc5;
        
        
        $etudeTTCFrais = $this->loadData("etudes");
        $etudeTTCFrais->get((int) $this->params[0]);
        $etudeTTCFrais->note_de_frais = $ttcTotal;
        $etudeTTCFrais->update();
        // FIN #############################




        $this->etude["type"] = "frame";
        if ($this->params[2] == "pdf") {
            if ($this->params[1] != 4 && $this->params[1] != 5 && empty($this->params[3])) {
                $this->etude["type"] = "pdf";
                ob_start();
                include(dirname(__FILE__) . "/../views/etudes/" . $this->view . ".php");
                $content = ob_get_clean();
                require_once(dirname(__FILE__) . '/../../../librairies/html2pdf2/html2pdf.class.php');
                $html2pdf = new HTML2PDF('P', 'LETTER', 'fr');
                $html2pdf->WriteHTML($content);
                ob_end_clean();
                $pdf = $html2pdf->Output('exemple.pdf');

                header('Content-Description: File Transfer');
                header('Content-Type: pdf');
                header('Content-Disposition: attachment; filename=."' . $pdf . '"');
            } else if ($this->params[3]) {
                $this->document = $this->loadData("documents")->select("id_document = " . $this->params[3]);
                if ($this->document[0]['tresorier_validation'] == 1) {
                    $this->etude["type"] = "pdf";
                    ob_start();
                    include(dirname(__FILE__) . "/../views/etudes/" . $this->view . ".php");
                    $content = ob_get_clean();
                    require_once(dirname(__FILE__) . '/../../../librairies/html2pdf2/html2pdf.class.php');
                    $html2pdf = new HTML2PDF('P', 'LETTER', 'fr');
                    $html2pdf->WriteHTML($content);
                    ob_end_clean();
                    $html2pdf->Output('exemple.pdf');

                    header('Content-Description: File Transfer');
                    header('Content-Type: pdf');
                    header('Content-Disposition: attachment; filename=."' . $html2pdf->Output('exemple.pdf') . '"');
                }
            }
        }
        if ($this->params[2] == 'preview') {
            $this->etude["type"] = 'preview';
            if ($this->params[3]) {
                $this->document = $this->loadData("documents")->selectInfo($this->params[3]);
//                $infoDoc->num_convention;
                $this->etude["nom_societe"] = $this->document['nom_societe'];
                $this->etude["num_rcs"] = $this->document['num_rcs_societe'];
                $this->etude["adresse"] = $this->document['adresse_societe'];
                $this->etude["code_postal"] = $this->document['cp_societe'];
                $this->etude["ville"] = $this->document['ville_societe'];
                $this->etude["siret"] = $this->document['num_siret'];
                $this->etude["id_sector"] = $this->document['code_naf'];
//                $infoDoc->num_urssaf;
                $this->etude["budget_fsi"] = $this->document['prix_prestation_ht'];
                $this->etude["descriptif"] = $this->document['prix_prestation_ht_texte'];
                $this->etude["je"] = $this->document['duree_etude'] || $this->document['mission_etude'];
//                $infoDoc->duree_etude_texte;
//                $infoDoc->fait_a_date;
//                $infoDoc->date_reception_doc;
//                $infoDoc->date_signature_convention;
//                $infoDoc->date_envoi_courrier;
//                $infoDoc->num_facture;
//                $infoDoc->type_frais;
//                $infoDoc->valeur_frais_ht;
//                $infoDoc->tva;
//                $infoDoc->valeur_frais_ttc;
//                $infoDoc->total_valeur_frais_ht;
//                $infoDoc->total_valeur_frais_ttc;
//                $infoDoc->nom_tresorier;
                $this->etude["date_echeance"] = $this->document['date_echeance'];
//                $infoDoc->solde_relatif;
//                $infoDoc->total_frais;
//                $infoDoc->total_ttc_a_regler;
//                $infoDoc->total_ttc_a_regler_lettre;
                $this->etude["capital"] = $this->document['capital_societe'];
                $this->etude["lieu_rcs"] = $this->document['lieu_rcs_societe'];
                $this->etude["adresse"] = $this->document['adresse_societe'];
                $this->etude["prenom_contact"] = $this->document['prenom_contact'];
                $this->etude["nom_contact"] = $this->document['nom_contact'];
//                $infoDoc->metier_societe;
//                $infoDoc->num_etudiant;
//                $infoDoc->etudiant;
//                $infoDoc->adresse_etudiant;
//                $infoDoc->cp_etudiant;
//                $infoDoc->ville_etudiant;
            } else {
                $this->etude['date_echeance'] = $_SESSION['date_echeance'];
            }
        }
        $this->autoFireHead = false;
        $this->autoFireHeader = false;
        $this->autoFireFooter = false;
    }

    function _deletememo() {
        $memo = $this->loadData("memos");
        $memo->get($this->params[1]);
        if ($memo->target == 'etudes') {
            $memo->delete();
        }
        $_SESSION['smokey'] = "delete";
        // Renvoi sur la liste des utilisateurs
        header('Location:' . $this->lurl . '/etudes/edit/' . $this->params[0]);
        die;
    }

    function _typeDocument() {
        $this->menu_admin = "document";
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Modification du template
            if (!empty($_POST['form_edit_document'])) {
                $this->elements = $this->loadData('elements');
                $this->doc_elements = $this->loadData('doc_elements');
                foreach ($_POST as $ele => $key) {
                    if ($ele != 'form_edit_document' && $ele != 'send_document') {
                        $elemenPrin = $this->elements->select('slug="' . $ele . '" and id_template=' . $_POST['form_edit_document']);
                        if (isset($_SESSION['user']['id_user'])) {
                            $this->doc_elements->getTypeDocument($elemenPrin[0]['id_element'], 'id_elements', $_SESSION['user']['id_user'], 'id_cdp');
                        } else if (isset($_SESSION['user']['id_cdp'])) {
                            $this->doc_elements->getTypeDocument($elemenPrin[0]['id_element'], 'id_elements', $_SESSION['user']['id_cdp'], 'id_cdp');
                        }
                        
                        if (!empty($key)) {
                            if (!empty($this->doc_elements->id)) {
                                if (isset($_SESSION['user']['id_cdp'])) {
                                    $this->doc_elements->id_cdp = $_SESSION['user']['id_cdp'];
                                } else {
                                    $this->doc_elements->id_cdp = $_SESSION['user']['id_user'];
                                }
                                $this->doc_elements->value = $key;
                                $this->doc_elements->update();
                            } else {
                                $this->doc_elements->id_doc_template = $_POST['form_edit_document'];
                                $this->doc_elements->id_elements = $elemenPrin[0]['id_element'];
                                if (isset($_SESSION['user']['id_cdp'])) {
                                    $this->doc_elements->id_cdp = $_SESSION['user']['id_cdp'];
                                } else {
                                    $this->doc_elements->id_cdp = $_SESSION['user']['id_user'];
                                }
                                $this->doc_elements->value = $key;
                                $this->doc_elements->complement = '';
                                $this->doc_elements->status = 1;
                                $this->doc_elements->create();
                            }
                        }
                    }
                }
                $_SESSION['smokey'] = "edit_document";
            }
        }

        /**
         * Insertion automatique des élément,
         * 1. Vérification si champs existe déjà en table
         * 2 . Si existe alors rien Sinon
         * 3 . Insérer pour tous les users existant un base avec value ' '
         */
        $cdpUtilisateur = $this->loadData('cdps');
        $userUtilisateur = $this->loadData('users');

        $cdpUser = $cdpUtilisateur->select();
        $userUser = $userUtilisateur->select();

        $elements = $this->loadData('elements');
        $elemenPrinn = $elements->select();
        foreach ($elemenPrinn as $cc) {

            foreach ($cdpUser as $a) {

                $this->doc_elements = $this->loadData('doc_elements');
                $this->doc_elements->getTypeDocument($cc['id_element'], 'id_elements', $a['id_cdp'], 'id_cdp');

                $doc_element = $this->loadData('doc_elements');
                $docelmt = $this->bdd->run(" SELECT COUNT(*) FROM `doc_elements` WHERE `id_elements` = '" . $cc['id_element'] . "' AND id_cdp = '" . $a['id_cdp'] . "' ");
                if ($docelmt[0][0] == 0) {
                    $this->doc_elements->id_doc_template = $this->params[1];
                    $this->doc_elements->id_elements = $cc['id_element'];
                    $this->doc_elements->id_cdp = $a['id_cdp'];
                    $this->doc_elements->value = '';
                    $this->doc_elements->complement = '';
                    $this->doc_elements->status = 1;
                    $this->doc_elements->create();
                }
            }

            foreach ($userUser as $b) {

                $this->doc_elements = $this->loadData('doc_elements');
                $this->doc_elements->getTypeDocument($cc['id_element'], 'id_elements', $b['id_user'], 'id_cdp');


                $doc_element = $this->loadData('doc_elements');
                $docelmt = $this->bdd->run(" SELECT COUNT(*) FROM `doc_elements` WHERE `id_elements` = '" . $cc['id_element'] . "' AND id_cdp = '" . $b['id_user'] . "' ");
                if ($docelmt[0][0] == 0) {
                    $this->doc_elements->id_doc_template = $this->params[1];
                    $this->doc_elements->id_elements = $cc['id_element'];
                    $this->doc_elements->id_cdp = $b['id_user'];
                    $this->doc_elements->value = '';
                    $this->doc_elements->complement = '';
                    $this->doc_elements->status = 1;
                    $this->doc_elements->create();
                }
            }
        }






        $this->etudes = $this->loadData('etudes');
        $this->templates = $this->loadData('templates');
        $this->elements = $this->loadData('elements');
        $this->typeDocument = $this->loadData('type_document');
        $this->doc_template = $this->loadData('doc_templates');
        $this->doc_elements = $this->loadData('doc_elements');
        $this->doc_template->get($this->params[0], 'id_type_document');
        $this->typeDocument->get($this->params[0]);
        
        //$this->ltemplate = $this->templates->select('status > 0 AND type = 0 AND id_template=' . $this->doc_template->id_doc_template);
        $this->ltemplate = $this->bdd->run("SELECT *  FROM `elements` WHERE `status` > 0 AND `id_template` = '".$this->doc_template->id_doc_template."' ORDER BY ordre ASC ");
        
        $this->lElements = $this->elements->findElmentsValue($this->ltemplate[0]['id_template']);
        $this->urls = array('surl' => $this->surl, 'url' => $this->url, 'spath' => $this->spath);


        $this->HT_Document = $this->bdd->run(" SELECT * FROM `settings` WHERE `type` REGEXP '^HT_Document[0-9]+$' ");

        if (!function_exists('array_column')) {
            $this->calcht = array_sum(array_column2($this->HT_Document, 'value'));
        } else {
            $this->calcht = array_sum(array_column($this->HT_Document, 'value'));
        }
        //$calcTtc = $this->TVA_Document * $calcht / 100 + $calcht + $this->TVA_Document * $calcht / 100 + $calcht;
    }

    

    function _saveExport($results, $header) {
        $name = rand(1, 100000);
        $path = $this->path . "public/default/var/tmp/exportCdm" . $name;
        $filesave = fopen($path . ".csv", "w");
        fwrite($filesave, $header);
        fwrite($filesave, "\n");
        foreach ($results as $result) {
            fwrite($filesave, $result);
            fwrite($filesave, "\n");
        }
        fclose($filesave);
        return $path;
    }

    function _downloadExport($file, $downloadfilename = null) {
        if (file_exists($file)) {
            $downloadfilename = $downloadfilename !== null ? $downloadfilename : basename($file);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $downloadfilename);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }

}

/**
 * Returns an array of values representing a single column from the input
 * array.
 * @param array $array A multi-dimensional array from which to pull a
 *     column of values.
 * @param mixed $columnKey The column of values to return. This value may
 *     be the integer key of the column you wish to retrieve, or it may be
 *     the string key name for an associative array. It may also be NULL to
 *     return complete arrays (useful together with index_key to reindex
 *     the array).
 * @param mixed $indexKey The column to use as the index/keys for the
 *     returned array. This value may be the integer key of the column, or
 *     it may be the string key name.
 * @return array
 */
function array_column2(array $array, $columnKey, $indexKey = null) {
    $result = array();
    foreach ($array as $subArray) {
        if (!is_array($subArray)) {
            continue;
        } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
            $result[] = $subArray[$columnKey];
        } elseif (array_key_exists($indexKey, $subArray)) {
            if (is_null($columnKey)) {
                $result[$subArray[$indexKey]] = $subArray;
            } elseif (array_key_exists($columnKey, $subArray)) {
                $result[$subArray[$indexKey]] = $subArray[$columnKey];
            }
        }
    }
    return $result;
}




// Générateur conversion Chiffre Lettre
function int2str($a) {
    
    $chiffre = explode('.', $a);
    if (isset($chiffre[1]) && $chiffre[1] != '') {
        return int2str($chiffre[0]) . ' et ' . int2str($chiffre[1]).' centimes';
    }
    
    $chiffre2 = explode(',', $a);
    if (isset($chiffre2[1]) && $chiffre2[1] != '') {
        return int2str($chiffre2[0]) . ' et ' . int2str($chiffre2[1]).' centimes';
    }
    
    
    if ($a < 0)
        return 'moins ' . int2str(-$a);
    if ($a < 17) {
        switch ($a) {
            case 0: return 'zero';
            case 1: return 'un';
            case 2: return 'deux';
            case 3: return 'trois';
            case 4: return 'quatre';
            case 5: return 'cinq';
            case 6: return 'six';
            case 7: return 'sept';
            case 8: return 'huit';
            case 9: return 'neuf';
            case 10: return 'dix';
            case 11: return 'onze';
            case 12: return 'douze';
            case 13: return 'treize';
            case 14: return 'quatorze';
            case 15: return 'quinze';
            case 16: return 'seize';
        }
    } else if ($a < 20) {
        return 'dix-' . int2str($a - 10);
    } else if ($a<100){
		if ($a%10==0){
			switch ($a){
				case 20: return 'vingt';
				case 30: return 'trente';
				case 40: return 'quarante';
				case 50: return 'cinquante';
				case 60: return 'soixante';
				case 70: return 'soixante-dix';
				case 80: return 'quatre-vingt';
				case 90: return 'quatre-vingt-dix';
			}
		} else if ($a<70){
			return int2str($a-$a%10).'-'.int2str($a%10);
		} else if ($a<80){
			return int2str(60).'-'.int2str($a%20);
		} else{
			return int2str(80).'-'.int2str($a%20);
		}
	} else if ($a==100){
		return 'cent';
	} else if ($a<200){
		return int2str(100).($a%100!=0?' '.int2str($a%100):'');
	} else if ($a<1000){
		return int2str((int)($a/100)).' '.int2str(100).' '.($a%100!=0?int2str($a%100):'');
	} else if ($a==1000){
		return 'mille';
	} else if ($a<2000){
		return int2str(1000).($a%1000!=0?' '.int2str($a%1000):'');
	} else if ($a<1000000){
		return int2str((int)($a/1000)).' '.int2str(1000).' '.($a%1000!=0?int2str($a%1000):'');
	}  
	//on pourrait pousser pour aller plus loin
	else return $a;
}
