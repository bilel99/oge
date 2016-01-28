<?php

class ajaxController extends bootstrap {

    var $Command;

    function ajaxController(&$command, $config, $app) {
        parent::__construct($command, $config, $app);

        // On place le redirect sur la home
        $_SESSION['request_url'] = $this->url;

        $this->autoFireHeader = false;
        $this->autoFireDebug = false;
        $this->autoFireHead = false;
        $this->autoFireFooter = false;
    }
    
     

    /* Fonction AJAX delete image ELEMENT */

    function _deleteImageElement() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->tree_elements->get($this->params[0], 'id');

            // On supprime le fichier sur le serveur
            @unlink($this->spath . 'images/' . $this->tree_elements->value);

            // On supprime le fichier de la base
            $this->tree_elements->value = '';
            $this->tree_elements->complement = '';
            $this->tree_elements->update();

            echo '<td>&nbsp;</td>';
        }
    }

    /* Fonction AJAX delete fichier ELEMENT */

    function _deleteFichierElement() {
                
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->tree_elements->get($this->params[0], 'id');

            // On supprime le fichier sur le serveur
            @unlink($this->spath . 'fichiers/' . $this->tree_elements->value);

            // On supprime le fichier de la base
            $this->tree_elements->value = '';
            $this->tree_elements->complement = '';
            $this->tree_elements->update();

            echo '<td>&nbsp;</td>';
        }
    }

    /* Fonction AJAX delete fichier protected ELEMENT */

    function _deleteFichierProtectedElement() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->tree_elements->get($this->params[0], 'id');

            // On supprime le fichier sur le serveur
            @unlink($this->path . 'protected/templates/' . $this->tree_elements->value);

            // On supprime le fichier de la base
            $this->tree_elements->value = '';
            $this->tree_elements->complement = '';
            $this->tree_elements->update();

            echo '<td>&nbsp;</td>';
        }
    }
    
    /* Fonction AJAX delete image ELEMENT BLOC */

    function _deleteImageElementBloc() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->blocs_elements->get($this->params[0], 'id');

            // On supprime le fichier sur le serveur
            @unlink($this->spath . 'images/' . $this->blocs_elements->value);

            // On supprime le fichier de la base
            $this->blocs_elements->value = '';
            $this->blocs_elements->complement = '';
            $this->blocs_elements->update();

            echo '<td>&nbsp;</td>';
        }
    }

    /* Fonction AJAX delete fichier ELEMENT BLOC */

    function _deleteFichierElementBloc() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->blocs_elements->get($this->params[0], 'id');

            // On supprime le fichier sur le serveur
            @unlink($this->spath . 'fichiers/' . $this->blocs_elements->value);

            // On supprime le fichier de la base
            $this->blocs_elements->value = '';
            $this->blocs_elements->complement = '';
            $this->blocs_elements->update();

            echo '<td>&nbsp;</td>';
        }
    }

    /* Fonction AJAX delete fichier protected ELEMENT BLOC */

    function _deleteFichierProtectedElementBloc() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->blocs_elements->get($this->params[0], 'id');

            // On supprime le fichier sur le serveur
            @unlink($this->path . 'protected/templates/' . $this->blocs_elements->value);

            // On supprime le fichier de la base
            $this->blocs_elements->value = '';
            $this->blocs_elements->complement = '';
            $this->blocs_elements->update();

            echo '<td>&nbsp;</td>';
        }
    }

    /* Fonction AJAX delete image TREE */

    function _deleteImageTree() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            $this->tree->get(array('id_tree' => $this->params[0], 'id_langue' => $this->params[1]));

            // On supprime le fichier sur le serveur
            @unlink($this->spath . 'images/' . $this->tree->img_menu);

            // On supprime le fichier de la base
            $this->tree->img_menu = '';
            $this->tree->update(array('id_tree' => $this->params[0], 'id_langue' => $this->params[1]));
        }
    }

    /* Fonction AJAX chargement des noms de la section de traduction */

    function _loadNomTexte() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Recuperation de la liste des noms de la section
            $this->lNoms = $this->ln->selectTexts($this->params[0]);
        }
    }

    /* Fonction AJAX chargement des traductions de la section de traduction */

    function _loadTradTexte() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Recuperation de la liste traductions
            $this->lTranslations = $this->ln->selectTranslations($this->params[1], $this->params[0]);
        }
    }

    /* Activer un utilisateur sur une zone */

    function _activeUserZone() {
        $this->autoFireView = false;

        if (isset($this->params[0]) && $this->params[0] != '') {
            // Recuperation du statut actuel de l'user
            $this->users_zones->get($this->params[0], 'id_zone = ' . $this->params[1] . ' AND id_user');

            if ($this->users_zones->id != '') {
                $this->users_zones->delete($this->users_zones->id);
                echo $this->surl . '/images/admin/check_off.png';
            } else {
                $this->users_zones->id_user = $this->params[0];
                $this->users_zones->id_zone = $this->params[1];
                $this->users_zones->create();
                echo $this->surl . '/images/admin/check_on.png';
            }
        }
    }

    /* Fonction AJAX ajout produit complementaire */

    function _ajoutProduitComp() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Chargement des datas
            $this->produits_crosseling = $this->loadData('produits_crosseling');
            $this->produits_elements = $this->loadData('produits_elements');
            $this->produits = $this->loadData('produits', array('url' => $this->url, 'surl' => $this->surl, 'produits_elements' => $this->produits_elements, 'upload' => $this->upload, 'spath' => $this->spath));

            // Ajout du produit complementaire pour le produit
            $this->produits_crosseling->id_produit = $this->params[0];
            $this->produits_crosseling->id_crosseling = $this->params[1];
            $this->produits_crosseling->ordre = $this->produits->getMaxOrdreComp($this->params[0]);
            $this->produits_crosseling->create();

            // Recuperation de la liste des produits complementaires
            $this->lProduitCrosseling = $this->produits_crosseling->select('id_produit = "' . $this->params[0] . '"', 'ordre ASC');

            // Chargement de la vue
            $this->setView('produitComplementaire');
        }
    }

    /* Fonction AJAX move produit complementaire */

    function _moveProduitComp() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Chargement des datas
            $this->produits_crosseling = $this->loadData('produits_crosseling');
            $this->produits_elements = $this->loadData('produits_elements');
            $this->produits = $this->loadData('produits', array('url' => $this->url, 'surl' => $this->surl, 'produits_elements' => $this->produits_elements, 'upload' => $this->upload, 'spath' => $this->spath));

            // en fonction du mouvement on applique la fonction
            if ($this->params[2] == 'up') {
                $this->produits->moveUp($this->params[0], $this->params[1]);
            } elseif ($this->params[2] == 'down') {
                $this->produits->moveDown($this->params[0], $this->params[1]);
            }

            // Recuperation de la liste des produits complementaires
            $this->lProduitCrosseling = $this->produits_crosseling->select('id_produit = "' . $this->params[0] . '"', 'ordre ASC');

            // Chargement de la vue
            $this->setView('produitComplementaire');
        }
    }

    /* Fonction AJAX delete produit complementaire */

    function _deleteProduitComp() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Chargement des datas
            $this->produits_crosseling = $this->loadData('produits_crosseling');
            $this->produits_elements = $this->loadData('produits_elements');
            $this->produits = $this->loadData('produits', array('url' => $this->url, 'surl' => $this->surl, 'produits_elements' => $this->produits_elements, 'upload' => $this->upload, 'spath' => $this->spath));

            // Ajout du produit complementaire pour le produit
            $this->produits_crosseling->delete(array('id_produit' => $this->params[0], 'id_crosseling' => $this->params[1]));

            // Reordenancement des produits comp
            $this->produits->reordreComp($this->params[0]);

            // Recuperation de la liste des produits complementaires
            $this->lProduitCrosseling = $this->produits_crosseling->select('id_produit = "' . $this->params[0] . '"', 'ordre ASC');

            // Chargement de la vue
            $this->setView('produitComplementaire');
        }
    }

    /* Fonction AJAX suppression d'une image produit */

    function _deleteImageFicheProduit() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Chargement des datas
            $this->produits_images = $this->loadData('produits_images');
            $this->produits_elements = $this->loadData('produits_elements');
            $this->produits = $this->loadData('produits', array('url' => $this->url, 'surl' => $this->surl, 'produits_elements' => $this->produits_elements, 'upload' => $this->upload, 'spath' => $this->spath));

            // On recupere l'image
            $this->produits_images->get($this->params[1], 'id_image');

            // On supprime le fichier sur le serveur
            @unlink($this->spath . 'images/produits/' . $this->produits_images->fichier);

            // On supprime le fichier de la base
            $this->produits_images->delete($this->params[1], 'id_image');

            // Reordenancement des images
            $this->produits->reordre($this->params[0]);

            // Recuperation de la liste des images pour le produit
            $this->lImages = $this->produits_images->select('id_produit = "' . $this->params[0] . '"', 'ordre ASC');

            // Chargement de la vue
            $this->setView('imagesProduits');
        }
    }

    /* Fonction AJAX placement en principal d'une image produit */

    function _moveImageToFirstOne() {
        if (isset($this->params[0]) && $this->params[0] != '') {
            // Chargement des datas
            $this->produits_images = $this->loadData('produits_images');
            $this->produits_elements = $this->loadData('produits_elements');
            $this->produits = $this->loadData('produits', array('url' => $this->url, 'surl' => $this->surl, 'produits_elements' => $this->produits_elements, 'upload' => $this->upload, 'spath' => $this->spath));

            // Attribution de l'ordre zero pour l'img
            $this->produits_images->get($this->params[1], 'id_image');
            $this->produits_images->ordre = 0;
            $this->produits_images->update();

            // Reordenancement des images
            $this->produits->reordre($this->params[0]);

            // Recuperation de la liste des images pour le produit
            $this->lImages = $this->produits_images->select('id_produit = "' . $this->params[0] . '"', 'ordre ASC');

            // Chargement de la vue
            $this->setView('imagesProduits');
        }
    }

    function _deleteClient() {
        $client = $this->loadData("oge_clients");
        $client->get($this->params[0]);
        $client_contact = $this->loadData('oge_clients_contacts');
        $historyclient = $this->loadData('oge_clients_contacts_history');
        $select = $client_contact->select("id_oge_client = '" . $this->params[0] . "'");
        foreach ($select as $s) {
            $client_contact->get($s['id_oge_clients_contact']);
            $historyclient->id_oge_client =$s['id_oge_client'];
            $historyclient->id_contact =$s['id_contact'];
            $historyclient->event_time =date("Y-m-d H:i:s");
            $historyclient->event_type  ="delete_client";
            $historyclient->create();                        
            $client_contact->delete($s['id_oge_clients_contact']);
        }
        $memosClient = $this->loadData('memos');
        $selectmemos = $memosClient->select(" id= '" . $this->params[0] . "' and target='clients'");
        foreach ($selectmemos as $m) {
            $memosClient->get($m['id_memo']);
            $memosClient->delete($m['id_memo']);
        }
        $resp['success'] = true;
        $_SESSION['smokey'] = "delete";
        $client->status = 0;       
        $client->update();
        echo json_encode($resp);
        exit();
    }
    function _deleteContact() {
        $contact = $this->loadData("contacts");
        $contact->get($this->params[0]);
        $client_contact = $this->loadData('oge_clients_contacts');
        $historycontact = $this->loadData('oge_clients_contacts_history');
        $select = $client_contact->select("id_contact = '" . $this->params[0] . "'");        
        foreach ($select as $s) {            
            $client_contact->get($s['id_oge_clients_contact']);            
            $historycontact->id_oge_client =$s['id_oge_client'];
            $historycontact->id_contact =$s['id_contact'];
            $historycontact->event_time =date("Y-m-d H:i:s");
            $historycontact->event_type  ="delete_contact";
            $historycontact->create();            
            $client_contact->delete($s['id_oge_clients_contact']);
        }
        $resp['success'] = true;
        $_SESSION['smokey'] = "delete";
        $contact->status=0;        
        $contact->update();
        echo json_encode($resp);
        exit();
    }

    function _upload_file() {
        $resp = array('success' => false, 'name' => "", 'error' => $_FILES['uploadedfile']['error']);
        $this->upload->setUploadDir($this->path, 'public/default/var/uploads/');
        $status = $this->upload->doUpload("uploadedfile");
        if ($status == true) {
            $resp['success'] = true;
            $resp['name'] = $this->upload->getName();
        }
        echo json_encode($resp);
    }

    function _saveEtudes() {
        $dateYear = date(Y);
        $etudes = $this->loadData("etudes");
        
        $a = $etudes->existNumConvention(substr($dateYear, 2, 4).'-'.$_POST['num_convention']);
        if($a == true){
            unset($_SESSION['num_convention_existant']);
            $_SESSION['num_convention_existant'] = 'Le num_convention '.substr($dateYear, 2, 4).'-'.$_POST['num_convention'].' existe déjà';
            $_SESSION['smokey'] = "num_convention_existant";
            
            $resp['success'] = false;
            echo json_encode($resp);
        }else{
        
        $etudes->id_oge_client = $_POST['idclient'];
        $etudes->id_contact = $_POST['idcontact'];
        $etudes->nom_interne = $_POST['nom_interne'];
        $etudes->descriptif = $_POST['descriptif'];
        $etudes->budget_fsi = $_POST['budget_fsi'];
        $etudes->je = $_POST['je'];
        $etudes->budget_hfs = $_POST['aux_budget_hfs'];
        $etudes->frais_previsio = $_POST['frais_previsio'];
        $etudes->date_debut=$_POST['date_debut'];
        $etudes->date_fin=$_POST['date_fin'];
        
        $etudes->num_convention= substr($dateYear, 2, 4).'-'.$_POST['num_convention'];
        
        
        $id = $etudes->create();
        $_SESSION['smokey'] = "add-etude";
        $resp['id'] = $etudes->id_etudes;
        $resp['success'] = true;
        echo json_encode($resp);
        
        
        /* Création dans la table CDP_etudes => Accord id_cdp = Auth->Users()->id_user , => id_etude = etude crée au dessus, percentage = 100 */
        $cdp_etude = $this->loadData('cdp_etude');
        if(isset($_SESSION['user']['id_user'])){
            $cdp_etude->id_cdp = $_SESSION['user']['id_user'];
        }else if(isset($_SESSION['user']['id_cdp'])){
            $cdp_etude->id_cdp = $_SESSION['user']['id_cdp'];
        }
        $cdp_etude->id_etude = $id;
        $cdp_etude->percentage = 100;
        $cdp_etude->create();
        /* FIN */
        
        
        
        }
        
        exit();
    }
    function _savecdm() {
        $cdm = $this->loadData("cdms");
        if (isset($_POST['id_cdm'])) {
            $cdm->get($_POST['id_cdm']);
        }
        if (count($_POST['langues'] > 0)) {
            $langues = implode(",", $_POST['langues']);
        } else {
            $langues = $_POST['langues'];
        }
        
        if (count($_POST['competences'] > 0)) {
            $competences = $_POST['competences'];
        } else {
            $competences = $_POST['competences'];
        }
        
        $cdm->id_cdp = $_POST['id_cdp'];
        $cdm->nom = strtoupper($_POST['nom']);
        $cdm->prenom = $_POST['prenom'];
        $cdm->telephone = $_POST['telephone'];
        $cdm->banner = $_POST['banner'];
        $cdm->date_naissance = $_POST['ann']."-".$_POST['mois']."-".$_POST['jour'];
        $cdm->adresse = $_POST['adresse'];
        $cdm->ville = $_POST['ville'];
        $cdm->email = $_POST['email'];
        $cdm->code_postal = $_POST['code_postal'];
        $cdm->motorise = $_POST['motorise'];
        $cdm->num_ss = $_POST['num_ss'];
        $cdm->provenance = $_POST['provenance1'] . ',' . $_POST['provenance2'] . ',' . $_POST['provenance3'];
        $cdm->langues = $langues;
        
        $cdm->competence = $competences;
        $cdm->evaluation = $_POST['evaluation'];
        
        $cdm->cursus = $_POST['cursus'];
        $cdm->annee = $_POST['annee'];
        //$cdm->details = $_POST['details'];
        $cdm->upload = $_POST['upload_name'] != null ? $_POST['upload_name'] : null;
        $cdm->status = 1;
        $cdm->archive = 1;
        
        if ($_POST['id_cdm']) {
            if ($_POST['upload_name'] != $_POST['uploadfile'] && $_POST['upload_name'] != null) {
                // SIZE MAX < || >
                if($_FILES['userfile']['size'] > $_POST['MAX_FILE_SIZE']){   
                }else{
                $cdm->upload = $_POST['upload_name'];
                }
            } else {
                $cdm->upload = $_POST['uploadfile'];
            }
            $cdm->update();
            $_SESSION['smokey'] = "editcdm";
            $resp['success'] = true;
        } else {
            $cdm->create();
            $_SESSION['smokey'] = "addcdm";
            $resp['success'] = true;
        }
        
        
        
        /* Ajout d'une nouvelle ville */
        $ville = $this->loadData('ville');
            // Vérification si ville entrer est new,
            $villeExiste = $ville->exist_label($_POST['ville']);
            if($villeExiste == 0){
                $ville->label = $_POST['ville'];
                $ville->create();
            }
            
        /*Fin*/
        
        
        
        echo json_encode($resp);
        exit();
    }
    
    
    
    /*Edit profil*/
    function _editProfil(){
        $users = $this->loadData("users");
        $cdps = $this->loadData("cdps");
        
        
        if(isset($_SESSION['user']['id_user'])){
            if ($_POST['id_user']) {
                $users->get($_POST['id_user']);
            }
            $users->firstname = $_POST['nom'];
            $users->name = $_POST['prenom'];
            $users->phone = $_POST['phone'];
            $users->mobile = $_POST['mobile'];
            $users->email = $_POST['email'];

            if($_POST['newPassword']){
                

                $_SESSION['smokey'] = "resetpass";
            }


            if ($_POST['id_user']) {
                $users->update();
                $_SESSION['smokey'] = "edituser";

                    if($_POST['newPassword']){
                        $_SESSION['smokey'] = "resetpass";
                    }

                $resp['success'] = true;
            } else {

            }
        }else if($_SESSION['user']['id_cdp']){
            if ($_POST['id_user']) {
                $cdps->get($_POST['id_user']);
            }
            $cdps->nom = $_POST['nom'];
            $cdps->prenom = $_POST['prenom'];
            $cdps->telephone = $_POST['phone'];
            $cdps->mobile = $_POST['mobile'];
            $cdps->email = $_POST['email'];

            if($_POST['newPassword']){
                $to      = $_POST['id_president'];
                $subject = 'Demande de changement de mot de passe';
                $message = "Bonjour, \nLe CDP suivant a fait une demande de renouvellement de mot de passe : \n ID : '".$_POST['id_user']."' \n Prenom : '".$_POST['prenom']."' \n  Nom : '".$_POST['nom']."' \n Mail : '".$_POST['email']."' ";
                $headers = 'From: OGE' . "\r\n" .
                'Reply-To: OGE' . "\r\n";
                
                mail($to, $subject, $message, $headers);

                $_SESSION['smokey'] = "resetpass";
            }


            if(isset($_SESSION['user']['id_user'])){
                if ($_POST['id_user']) {
                    $users->update();
                    $_SESSION['smokey'] = "edituser";

                        if($_POST['newPassword']){
                            $_SESSION['smokey'] = "resetpass";
                        }

                    $resp['success'] = true;
                } else {

                }
            }else if($_SESSION['user']['id_cdp']){
                if ($_POST['id_user']) {
                    $cdps->update();
                    $_SESSION['smokey'] = "edituser";

                        if($_POST['newPassword']){
                            $_SESSION['smokey'] = "resetpass";
                        }

                    $resp['success'] = true;
                } else {

                }
            }
        }
        
        echo json_encode($resp);
        exit();
    }
    /*FIN*/
    
    

    function _savecdp() {
        $cdp = $this->loadData("cdps");
        $cdpu = $this->loadData("cdps");
        
        if ($_POST['id_cdp']) {
            $cdp->get($_POST['id_cdp']);
        }
        $cdp->nom = $_POST['nom'];
        $cdp->prenom = $_POST['prenom'];
        $cdp->nom_interne = $_POST['nom_interne'];
        $cdp->email = $_POST['email'];
        $cdp->mdp = md5($_POST['mdp']) != $cdp->mdp ? md5($_POST['mdp']) : $cdp->mdp;
        $cdp->adresse = $_POST['adresse'];
        $cdp->ville = $_POST['ville'];
        $cdp->code_postal = $_POST['code_postal'];
        $cdp->num_ss = $_POST['num_ss'];
        $cdp->status = 1;
        $cdp->archive = 1;
        
        //$cdp->role = $_POST['role'];
        
        // vérifier si 1 president existe en bdd si alors modifier le role en '', si non insérer un président
        $cdps = $cdpu->exist_general('president', 'role');
        
        if($cdps == 0){
            $cdpu->id_cdp = $cdps['id_cdp'];
            $cdpu->nom = $cdps['nom'];
            $cdpu->prenom = $cdps['prenom'];
            $cdpu->telephone = $cdps['telephone'];
            $cdpu->annee = $cdps['annee'];
            $cdpu->nom_interne = $cdps['nom_interne'];
            $cdpu->email = $cdps['email'];
            $cdpu->mdp = $cdps['mdp'];
            $cdpu->adresse = $cdps['adresse'];
            $cdpu->ville = $cdps['ville'];
            $cdpu->code_postal = $cdps['code_postal'];
            $cdpu->num_ss = $cdps['num_ss'];
            $cdpu->details = $cdps['details'];
            //$cdpu->role = '';
            $cdpu->status = $cdps['status'];
            $cdpu->added = $cdps['added'];
            $cdpu->updated = $cdps['updated'];

            $cdpu->update();
        }
        
        
        
        
        
        if ($_POST['id_cdp']) {
            $cdp->update();
            $_SESSION['smokey'] = "editcdp";
            $resp['success'] = true;
        } else {
            $id_cdp = $cdp->create();
            $_SESSION['smokey'] = "addcdp";
            $resp['success'] = true;
        }
        
        
        
        /* Ajout des droit dans table cdps_zone */
        if($id_cdp != 0){
            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 1;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 2;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 3;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 4;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 5;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 6;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 7;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 8;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 9;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 10;
            $this->cdps_zones->create();
        }
        /* FIN */
        
        
        
        /* Ajout d'une nouvelle ville */
        $ville = $this->loadData('ville');
            // Vérification si ville entrer est new,
            $villeExiste = $ville->exist_label($_POST['ville']);
            if($villeExiste == 0){
                $ville->label = $_POST['ville'];
                $ville->create();
            }
            
        /*Fin*/
            
        
        echo json_encode($resp);
        exit();
    }
    
    
    
    /* transfere Contact d'un client à l'autre */
    function _transferContact(){
        $resp = array('success' => false);
        
        // Base de donnée
        $ogeclientscontact = $this->loadData('oge_clients_contacts');
        $contacts = $this->loadData('contacts');
        
        // Step 1: creation contact
       /* if (!empty($_POST['id'])) {
            if($contacts->get($_POST['id'])){
        
        
                $contacts->nom_contact = $row['nom_contact'];
                $contacts->prenom_contact = $row['prenom_contact'];
                $contacts->fonction = $row['fonction'];
                $contacts->tel_fixe = $row['tel_fixe'];
                $contacts->tel_port = $row['tel_port'];
                $contacts->linkedin = $row['linkedin'];
                $contacts->email = $row['email'];
                $contacts->status = $row['status'];

                $id = $contacts->create();
            }
 
        }*/

        // Step 2 : Ajout dans oge_client_contact une ligne raccordant l'id du contact crée, l'id du client choisie et status = 1
        if (!empty($_POST['id']) AND !empty($_POST['sector'])) {            
            $ogeclientscontact->id_oge_client = $_POST['sector'];
            $ogeclientscontact->id_contact = $_POST['id'];
            $ogeclientscontact->status = 1;
            
            $ogeclientscontact->create();
            
            $_SESSION['smokey'] = "transfer";
        }
        
        $resp['success'] = true;
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    
    

    function _save() {
        $client = $this->loadData("oge_clients");
        $num = $client->counter();

        if ($num < 10) {
            $num = $num + 1;
            $num_client = date("Y") . "00" . $num;
        } else if ($num > 10 && $num < 100) {
            $num = $num + 1;
            $num_client = date("Y") . "0" . $num;
        }

        if ($_POST['id']) {
            $client->get($_POST['id']);
        }
        if ($_POST['typologie'] == 'Entreprise') {
            $client = $this->populateClientEntreprise($client);
        } elseif ($_POST['typologie'] == 'Particulier') {
            $client = $this->populateClientParticulier($client);
        }

        if ($_POST['id']) {
            $client->update();
            $_SESSION['smokey'] = "edit";
            $resp['success'] = true;
        } else {
            $client->num_oge_client = $num_client;
            $client->create();
            $_SESSION['smokey'] = "add";
            $resp['success'] = true;
        }
        $resp['id'] = $client->id_oge_client;

        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    
    
    
    function _varsDocumentEtude() {
        $_SESSION['date_echeance'] = $_POST['date_echeance'];
        $resp['success'] = true;
        if($_POST['type'] != 1){
            $resp['type'] = "preview";
        }
        echo json_encode($resp);       exit();
    }
    function _saveDocumentEtude() {
        $resp['data_document'] = $_POST['dataDocument'];
        
        $date =  date('Y-m-d H:i:s');
        $typeDoc = $this->loadData('type_document')->select('id_type_doc = '.$resp['data_document']["id_type_doc"]);
        $infoDoc = $this->loadData('info_documents');
        
        
        $document = $this->loadData('documents')->counter("id_etudes = '".$resp['data_document']["id_etude"]."' AND id_type_doc = '".$resp['data_document']["id_type_doc"]."'");
        $documents = $this->loadData('documents');
        $documents->id_etudes = $resp['data_document']["id_etude"];
        $documents->nature = $typeDoc[0]['name'];
        $documents->nom_document = $typeDoc[0]['name']."-".($document + 1);
        $documents->date_sortie = $date;
        $documents->tresorier_validation = $resp['data_document']["validation"];
        if($resp['data_document']["id_type_doc"] == 3 || $resp['data_document']["id_type_doc"] == 6){
            $documents->nom;
            $documents->prenom;
        }
        $documents->id_type_doc = $resp['data_document']["id_type_doc"];
        $documents->status = 1;
        $documents->create();
        
        $this->etude = $this->loadData("etudes")->selectClient($documents->id_etudes);
        $infoDoc->id_document = $documents->id_document;
        
        
        
        //Convention
        if($documents->id_type_doc == 1){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            /* Récupération des settings */
            $this->type_document = $this->loadData("type_document")->select("id_type_doc = 1");
            $this->doc_templates = $this->loadData("doc_templates");
            
            if (isset($_SESSION['user']['id_user'])) {
                $this->elements = $this->doc_templates->selectDocTemp(1, $_SESSION['user']['id_user']);
            } else if (isset($_SESSION['user']['id_cdp'])) {
                $this->elements = $this->doc_templates->selectDocTemp(1, $_SESSION['user']['id_cdp']);
            }
            
            /* Récupération des settings Convention */
            $infoDoc->convention_settings1 = $this->elements[0]['value'];
            $infoDoc->convention_settings2 = $this->elements[1]['value'];
            $infoDoc->convention_settings3 = $this->elements[2]['value'];
            $infoDoc->convention_settings4 = $this->elements[3]['value'];
            $infoDoc->convention_settings5 = $this->elements[4]['value'];
            $infoDoc->convention_settings6 = $this->elements[5]['value'];
            $infoDoc->convention_settings7 = $this->elements[6]['value'];
            
                        
        }
        //Attestation de fin de mission
        if($documents->id_type_doc == 2){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
            
            /* Récupération des settings */
            $this->type_document = $this->loadData("type_document")->select("id_type_doc = 2");
            $this->doc_templates = $this->loadData("doc_templates");
            
            if (isset($_SESSION['user']['id_user'])) {
                $this->elements = $this->doc_templates->selectDocTemp(2, $_SESSION['user']['id_user']);
            } else if (isset($_SESSION['user']['id_cdp'])) {
                $this->elements = $this->doc_templates->selectDocTemp(2, $_SESSION['user']['id_cdp']);
            }
            
            /* Récupération des settings Convention */
            $infoDoc->attestation_fin_mission_settings1 = $this->elements[0]['value'];
            
                    
        }
        //Bulletin de versement (BV)
        if($documents->id_type_doc == 3){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
        }
        //Factures
        if($documents->id_type_doc == 4){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
            
            /* Récupération des settings */
            $this->type_document = $this->loadData("type_document")->select("id_type_doc = 4");
            $this->doc_templates = $this->loadData("doc_templates");
            
            if (isset($_SESSION['user']['id_user'])) {
                $this->elements = $this->doc_templates->selectDocTemp(4, $_SESSION['user']['id_user']);
            } else if (isset($_SESSION['user']['id_cdp'])) {
                $this->elements = $this->doc_templates->selectDocTemp(4, $_SESSION['user']['id_cdp']);
            }
            
            /* Récupération des settings Convention */
            $infoDoc->facture_settings1 = $this->elements[0]['value'];
            $infoDoc->facture_settings2 = $this->elements[1]['value'];
            $infoDoc->facture_settings3 = $this->elements[2]['value'];
            $infoDoc->facture_settings4 = $this->elements[3]['value'];
            $infoDoc->facture_settings5 = $this->elements[4]['value'];
            $infoDoc->facture_settings6 = $this->elements[5]['value'];
            $infoDoc->facture_settings7 = $this->elements[6]['value'];



            // Calcul
            $montantTva = ($this->etude['budget_fsi'] + $this->etude['frais_previsio']) * ($this->elements[0]['value'] / 100);
            $totalTtc = $this->etude['budget_fsi'] + $this->etude['frais_previsio'] + $montantTva;

            $infoDoc->montantTva = $montantTva;
            $infoDoc->totalTtcFacture = $totalTtc;

            
            
        }
        //Factures de frais
        if($documents->id_type_doc == 5){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
            /* Récupération des settings */
            $this->type_document = $this->loadData("type_document")->select("id_type_doc = 5");
            $this->doc_templates = $this->loadData("doc_templates");
            
            if (isset($_SESSION['user']['id_user'])) {
                $this->elements = $this->doc_templates->selectDocTemp(5, $_SESSION['user']['id_user']);
            } else if (isset($_SESSION['user']['id_cdp'])) {
                $this->elements = $this->doc_templates->selectDocTemp(5, $_SESSION['user']['id_cdp']);
            }
            
            /* Récupération des settings Convention */
            $infoDoc->facturefrais_settings1 = $this->elements[0]['value'];
            $infoDoc->facturefrais_settings2 = $this->elements[1]['value'];
            $infoDoc->facturefrais_settings3 = $this->elements[2]['value'];
            $infoDoc->facturefrais_settings4 = $this->elements[3]['value'];
            $infoDoc->facturefrais_settings5 = $this->elements[4]['value'];
            $infoDoc->facturefrais_settings6 = $this->elements[5]['value'];
            $infoDoc->facturefrais_settings7 = $this->elements[6]['value'];
            $infoDoc->facturefrais_settings8 = $this->elements[7]['value'];
            $infoDoc->facturefrais_settings9 = $this->elements[8]['value'];
            $infoDoc->facturefrais_settings10 = $this->elements[9]['value'];
            $infoDoc->facturefrais_settings11 = $this->elements[10]['value'];




            // CALCUL
            $hortTaxe1 = $this->elements[2]['value'];
            $hortTaxe2 = $this->elements[4]['value'];
            $hortTaxe3 = $this->elements[6]['value'];
            $hortTaxe4 = $this->elements[8]['value'];
            $hortTaxe5 = $this->elements[10]['value'];

            // TVA
            $tvaOriginal = $this->elements[0]['value'];

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


            // TOTAL CALC
            $hortTaxeTotal = $hortTaxe1 + $hortTaxe2 + $hortTaxe3 + $hortTaxe4 + $hortTaxe5;
            $tvaTotal = $tva1 + $tva2 + $tva3 + $tva4 + $tva5;
            $ttcTotal = $ttc1 + $ttc2 + $ttc3 + $ttc4 + $ttc5;


            $infoDoc->hortTaxeTotal = $hortTaxeTotal;
            $infoDoc->tvaTotal = $tvaTotal;
            $infoDoc->ttcTotal = $ttcTotal;



            
            
        }
        //Avoirs
        if($documents->id_type_doc == 6){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
        }
        //Accord de confidentialité
        if($documents->id_type_doc == 7){
           
           // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $this->cdmX["telephone"];
            $infoDoc->cdms_email = $this->cdmX["email"];
            $infoDoc->cdms_banner = $this->cdmX["banner"];
            $infoDoc->cdms_date_naissance = $this->cdmX["date_naissance"];
            $infoDoc->cdms_adresse = $this->cdmX["adresse"];
            $infoDoc->cdms_ville = $this->cdmX["ville"];
            $infoDoc->cdms_code_postal = $this->cdmX["code_postal"];
            $infoDoc->cdms_motorise = $this->cdmX["motorise"];
            $infoDoc->cdms_num_ss = $this->cdmX["num_ss"];
            $infoDoc->cdms_provenance = $this->cdmX["provenance"];
            $infoDoc->cdms_langues = $this->cdmX["langues"];
            $infoDoc->cdms_cursus = $this->cdmX["cursus"];
            $infoDoc->cdms_annee = $this->cdmX["annee"];
            $infoDoc->cdms_details = $this->cdmX["details"];
            $infoDoc->cdms_role = $this->cdmX["role"];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
           
           /* Récupération des settings */
            $this->type_document = $this->loadData("type_document")->select("id_type_doc = 7");
            $this->doc_templates = $this->loadData("doc_templates");
            
            if (isset($_SESSION['user']['id_user'])) {
                $this->elements = $this->doc_templates->selectDocTemp(7, $_SESSION['user']['id_user']);
            } else if (isset($_SESSION['user']['id_cdp'])) {
                $this->elements = $this->doc_templates->selectDocTemp(7, $_SESSION['user']['id_cdp']);
            }
            
            /* Récupération des settings Convention */
            $infoDoc->accordConfidentialite_settings1 = $this->elements[0]['value'];
            
           
        }
        //Avenant étudiant
        if($documents->id_type_doc == 8){
            
            // ADD ELEMENT CONVENTION, Joint Etude CLient
            $this->etudes = $this->loadData("etudes")->selectClient($documents->id_etudes);
            
            // Joint Etude CDM
            $this->etudeCdm = $this->loadData("etudes")->selectCdm($documents->id_etudes);
            $this->cdmX = $this->loadData("etudes")->cdmX($this->etudeCdm['id_cdm']);
            
            // Joint Etude CDM
            $cdmetudes = $this->loadData('cdm_etude');
            $this->cdmetudes = $cdmetudes->findByEtude($documents->id_etudes);
            
            
            
            // Createur
            if(isset($_SESSION['user']['id_user'])){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_user'];
            }else if($_SESSION['user']['id_cdp']){
                $infoDoc->sessionIdCdp = $_SESSION['user']['id_cdp'];
            }
            // FIN
            
            // ETUDES
            $infoDoc->etudes_id_etudes = $this->etudes['id_etudes'];
            $infoDoc->etudes_id_oge_client = $this->etudes['id_oge_client'];
            $infoDoc->etudes_id_contact = $this->etudes['id_contact'];
            $infoDoc->etudes_num_convention = $this->etudes['num_convention'];
            $infoDoc->etudes_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->etudes_descriptif = $this->etudes["descriptif"];
            $infoDoc->etudes_budget_fsi = $this->etudes["budget_fsi"];
            $infoDoc->etudes_je = $this->etudes["je"];
            $infoDoc->etudes_budget_hfs = $this->etudes["budget_hfs"];
            $infoDoc->etudes_frais_previsio = $this->etudes["frais_previsio"];
            $infoDoc->etudes_date_debut = $this->etudes["date_debut"];
            $infoDoc->etudes_date_fin = $this->etudes["date_fin"];
            $infoDoc->etudes_note_de_frais = $this->etudes["note_de_frais"];
            
            // CONTACT
            $infoDoc->contacts_nom_contact = $this->etudes['nom_contact'];
            $infoDoc->contacts_prenom_contact = $this->etudes["prenom_contact"];
            $infoDoc->contacts_fonction = $this->etudes["fonction"];
            $infoDoc->contacts_tel_fixe = $this->etudes["tel_fixe"];
            $infoDoc->contacts_tel_port = $this->etudes["tel_port"];
            $infoDoc->contacts_linkedin = $this->etudes["linkedin"];
            $infoDoc->contacts_email;
            
            // OGE_CLIENT
            $infoDoc->ogeClient_num_oge_client = $this->etudes['num_oge_client'];
            $infoDoc->ogeClient_typologie = $this->etudes["typologie"];
            $infoDoc->ogeClient_type = $this->etudes["type"];
            $infoDoc->ogeClient_nom = $this->etudes["nom"];
            $infoDoc->ogeClient_prenom = $this->etudes["prenom"];
            $infoDoc->ogeClient_nom_societe = $this->etudes["nom_societe"];
            $infoDoc->ogeClient_activite = $this->etudes["activite"];
            $infoDoc->ogeClient_id_sector = $this->etudes["id_sector"];
            $infoDoc->ogeClient_capital = $this->etudes["capital"];
            $infoDoc->ogeClient_etranger = $this->etudes["etranger"];
            $infoDoc->ogeClient_id_forme = $this->etudes["id_forme"];
            $infoDoc->ogeClient_siret = $this->etudes["siret"];
            $infoDoc->ogeClient_lieu_rcs = $this->etudes["lieu_rcs"];
            $infoDoc->ogeClient_num_rcs = $this->etudes["num_rcs"];
            $infoDoc->ogeClient_adresse = $this->etudes["adresse"];
            $infoDoc->ogeClient_ville = $this->etudes["ville"];
            $infoDoc->ogeClient_tel_standard = $this->etudes["tel_standard"];
            $infoDoc->ogeClient_provenance = $this->etudes["provenance"];
            $infoDoc->ogeClient_code_postal = $this->etudes["code_postal"];
            $infoDoc->ogeClient_id_pays;
            $infoDoc->ogeClient_site_internet = $this->etudes["site_internet"];
            
            // CDMS
            if(isset($_SESSION['cdm']['id_cdm'])){
                $infoDoc->cdms_nom = $_SESSION['cdm']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdm']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdm']['id_cdm'];
            }else if(isset($_SESSION['cdp_choix']['id_cdp'])){
                $infoDoc->cdms_nom = $_SESSION['cdp_choix']['nom'];
                $infoDoc->cdms_prenom = $_SESSION['cdp_choix']['prenom'];
                $infoDoc->session_id_cdm = $_SESSION['cdp_choix']['id_cdp'];
            }
            
            $infoDoc->cdms_telephone = $_SESSION['cdm']['telephone'];
            $infoDoc->cdms_email = $_SESSION['cdm']['email'];
            $infoDoc->cdms_banner = $_SESSION['cdm']['banner'];
            $infoDoc->cdms_date_naissance = $_SESSION['cdm']['date_naissance'];
            $infoDoc->cdms_adresse = $_SESSION['cdm']['adresse'];
            $infoDoc->cdms_ville = $_SESSION['cdm']['ville'];
            $infoDoc->cdms_code_postal = $_SESSION['cdm']['code_postal'];
            $infoDoc->cdms_motorise = $_SESSION['cdm']['motorise'];
            $infoDoc->cdms_num_ss = $_SESSION['cdm']['num_ss'];
            $infoDoc->cdms_provenance = $_SESSION['cdm']['provenance'];
            $infoDoc->cdms_langues = $_SESSION['cdm']['langues'];
            $infoDoc->cdms_cursus = $_SESSION['cdm']['cursus'];
            $infoDoc->cdms_annee = $_SESSION['cdm']['annee'];
            $infoDoc->cdms_details = $_SESSION['cdm']['details'];
            $infoDoc->cdms_role = $_SESSION['cdm']['role'];
            
            
            // CDPS
            $infoDoc->cdps_nom = $_SESSION['cdp']['nom'];
            $infoDoc->cdps_prenom = $_SESSION['cdp']['prenom'];
            $infoDoc->cdps_telephone = $_SESSION['user']['telephone'];
            $infoDoc->cdps_annee = $_SESSION['user']['annee'];
            $infoDoc->cdps_nom_interne = $this->etudes["nom_interne"];
            $infoDoc->cdps_email = $_SESSION['user']['email'];
            $infoDoc->cdps_adresse = $_SESSION['user']['adresse'];
            $infoDoc->cdps_ville = $_SESSION['user']['ville'];
            $infoDoc->cdps_code_postal = $_SESSION['user']['code_postal'];
            $infoDoc->cdps_num_ss = $_SESSION['user']['num_ss'];
            $infoDoc->cdps_details = $_SESSION['user']['details'];
            $infoDoc->cdps_role = $_SESSION['user']['role'];
            $infoDoc->session_id_cdp = $_SESSION['cdp']['id_cdp'];
            
            
            
            // CHOIX CDP //
            $infoDoc->choixCdpNom = $_SESSION['cdp_choix']['nom'];
            $infoDoc->choixCdpPrenom = $_SESSION['cdp_choix']['prenom'];
            $infoDoc->ChoixCdpId = $_SESSION['cdp_choix']['id_cdp'];
            // FIN //
            
            
            
            // Date du jour Formated
            $date = date('Y-m-d');
            $d = substr($date, 8, 10);
            $m = substr($date, 5, 2);
            $y = substr($date, 0, 4);
            $this->date = $d . '/' . $m . '/' . $y;
            // FIN
            
            $infoDoc->fait_leDate = $this->date;
            
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

            
            
            $infoDoc->Setting1Document = $this->Setting1Document;
            $infoDoc->Setting2Document = $this->Setting2Document;
            $infoDoc->Setting3Document = $this->Setting3Document;
            $infoDoc->Setting4Document = $this->Setting4Document;
            $infoDoc->Setting5Document = $this->Setting5Document;
            $infoDoc->Setting6Document = $this->Setting6Document;
            $infoDoc->Setting7Document = $this->Setting7Document;
            $infoDoc->Setting1eachtimeDocument = $this->setting1eachtimeDocument;
            $infoDoc->SettingCompagnyName = $this->SettingCompagnyName;
            $infoDoc->Setting9_Document = $this->Setting9_Document;
            $infoDoc->Setting10_Document = $this->Setting10_Document;
            $infoDoc->Setting12_Document = $this->Setting12_Document;
            

            // FIN ##########################################
            
            
            
            
            
            
            /* Récupération des settings */
            $this->type_document = $this->loadData("type_document")->select("id_type_doc = 8");
            $this->doc_templates = $this->loadData("doc_templates");
            
            if (isset($_SESSION['user']['id_user'])) {
                $this->elements = $this->doc_templates->selectDocTemp(8, $_SESSION['user']['id_user']);
            } else if (isset($_SESSION['user']['id_cdp'])) {
                $this->elements = $this->doc_templates->selectDocTemp(8, $_SESSION['user']['id_cdp']);
            }
            
            /* Récupération des settings Convention */
            $infoDoc->avenant_settings1 = $this->elements[0]['value'];
            $infoDoc->avenant_settings2 = $this->elements[1]['value'];
            
        }
        
        $infoDoc->create();
        
        $resps['url'] = $resp['data_document']['url'];

        echo json_encode($resps);
        exit();
    }
    function _saveTypeDocumentEtude() {        
        
        $this->documentTemplate = $this->loadData("document_templates");
        $this->documentTemplate->get($_POST['document_type_id'], "id_type_document");
        
        $this->documentTemplate->content = $_POST['typeDocument'];
        $this->documentTemplate->id_type_document = $_POST['document_type_id'];
        if($this->documentTemplate->id_document_template){
            $this->documentTemplate->update();
        } else {
            $this->documentTemplate->create();
        }
    }
    
    
    
    
    
    
    
    
    
    

    function populateClientEntreprise($client) {
        $client->typologie = strtolower($_POST['typologie']);
        $client->type = $_POST['type'];
        $client->nom = "";
        $client->prenom = "";

        $client->nom_societe = $_POST['societe'];
        $client->activite = $_POST['activite'];
        $client->id_sector = $_POST['sector'];
        $client->capital = $_POST['capital'];
        $client->etranger = $_POST['etranger'];
        $client->id_forme = $_POST['forme'];

        $client->siret = $_POST['siret'];
        $client->lieu_rcs = $_POST['lieu'];
        $client->num_rcs = $_POST['numrcs'];
        $client->num_tva = $_POST['numtva'];

        $client->adresse = $_POST['adresse'];
        $client->ville = $_POST['ville'];
        $client->tel_standard = $_POST['tel'];
        $client->provenance = $_POST['provenance'];
        $client->code_postal = $_POST['code_postal'];
        $client->id_pays = $_POST['pays'];
        $client->site_internet = $_POST['site_internet'];

        $client->status = 1;
        $client->id_user = $_SESSION['user']['id_user'];

        return $client;
    }

    function populateClientParticulier($client) {

        $client->typologie = strtolower($_POST['typologie']);
        $client->type = $_POST['typeparticulier'];
        $client->nom = strtoupper($_POST['nom']);
        $client->prenom = $_POST['prenom'];

        $client->nom_societe = "";
        $client->activite = "";
        $client->id_sector = "";
        $client->capital = "";
        $client->id_forme = "";

        $client->siret = "";
        $client->lieu_rcs = "";
        $client->num_rcs = "";
        $client->num_tva = "";

        $client->etranger = $_POST['etranger1'];
        $client->adresse = $_POST['adresse'];
        $client->ville = $_POST['ville'];
        $client->tel_standard = $_POST['tel'];
        $client->provenance = $_POST['provenance'];
        $client->code_postal = $_POST['code_postal'];
        $client->id_pays = $_POST['pays'];
        $client->site_internet = $_POST['site_internet'];

        $client->status = 1;
        $client->id_user = $_SESSION['user']['id_user'];

        return $client;
    }

    function _saveContacts() {
        $resp = array('success' => false);
        $contact = $this->loadData("contacts");
        
        
        if(isset($_POST['id'])){
            $check = $this->bdd->run("SELECT *  FROM `contacts` c INNER JOIN `oge_clients_contacts` cc ON c.id_contact = cc.id_contact WHERE `email` LIKE '".$this->bdd->escape_string($_POST['email'])."' AND id_oge_client = '".$this->bdd->escape_string($_POST['societe'])."' AND id_contact != '".$this->bdd->escape_string($_POST['id'])."' ");
        }else{
            $check = $this->bdd->run("SELECT *  FROM `contacts` c INNER JOIN `oge_clients_contacts` cc ON c.id_contact = cc.id_contact WHERE `email` LIKE '".$this->bdd->escape_string($_POST['email'])."' AND id_oge_client = '".$this->bdd->escape_string($_POST['societe'])."' ");
        }
        
        if(count($check) != 0){
            $_SESSION['smokey'] = 'error_email';
        }else{
            
            
            
            
            if (!empty($_POST['id'])) {
            $contact->get($_POST['id']);
            }

            $contact->nom_contact = strtoupper($_POST['nom']);
            $contact->prenom_contact = $_POST['prenom'];
            $contact->fonction = $_POST['fonction'];
            if($_POST['tel_fixe'] == ''){
                $contact->tel_port = $_POST['tel_port'];
            }else if($_POST['tel_port'] == ''){
                $contact->tel_fixe = $_POST['tel_fixe'];
            }else if($_POST['tel_fixe'] != '' && $_POST['tel_port'] != ''){
                $contact->tel_fixe = $_POST['tel_fixe'];
                $contact->tel_port = $_POST['tel_port'];
            }else if($_POST['tel_fixe'] == '' && $_POST['tel_port'] == ''){
                $resp['success'] = false;
                $_SESSION['smokey'] = "erreur_tel";
            }
            
            $contact->linkedin = $_POST['linkedin'];
            $contact->email = $_POST['email'];
            $contact->status = 1;
            $contact->id_user = $_SESSION['user']['id_user'];



            if (!empty($_POST['id'])) {
                $trans = $contact->update();
                $_SESSION['smokey'] = "edit";
            } else {
                $trans = $contact->create();
                $_SESSION['smokey'] = "add";
            }







            /* Societe table oge_client_contact */
            $oge_clients_contacts = $this->loadData('oge_clients_contacts');
            if(!empty($_POST['id'])){
                $oge_clients = $oge_clients_contacts->select('id_contact ='.$_POST['id']);

                foreach ($oge_clients as $oge){
                    //var_dump($oge);
                    $oge_clients_contacts->get($oge['id_oge_clients_contact']);
                    $oge_clients_contacts->id_oge_client = $_POST['societe'];
                    $oge_clients_contacts->update();
                }
                $_SESSION['smokey'] = "edit";
            }else{
                $oge_clients_contacts->id_oge_client = $_POST['societe'];
                $oge_clients_contacts->status = 1;
                $oge_clients_contacts->id_contact = $trans;

                $oge_clients_contacts->create();
                $_SESSION['smokey'] = "add";
            }
            /* FIN */
            
            
            
            
            
        }
        
        
        
        $resp['success'] = true;
        echo json_encode($resp);
        exit();
    }

    function _saveMemo() {
        $resp = array('success' => false);
        $memo = $this->loadData("memos");
        if (!empty($_POST['id'])) {
            $memo->get($_POST['id']);
        }
        $memo->description = $_POST['description'];
        $memo->id = $_POST['id_controller'];
        $memo->target = $_POST['target'];
        $memo->status = 1;
        $memo->role = $_POST['role'];
        if (!empty($_POST['id'])) {
            $trans = $memo->update();
            $_SESSION['smokey'] = "edit";
        } else {
            $trans = $memo->create();
            $_SESSION['smokey'] = "add";
        }

        $resp['success'] = true;
        $resp['id_etude'] = $memo->id;
        echo json_encode($resp);
        exit();
    }

    
    
    
    
    function _searchEtudesBy() {
        $params["id_cdm"] = $_POST['id_cdm'];
        $params["nom_interne"] = $_POST['nom_interne'];
        $etu = $this->loadData("etudes");
        $search = $etu->rechercherQuery($params["nom_interne"]);
        $etuCdm = $this->loadData("cdm_etude");
        foreach ($search as $etudes) {
            $etudesCdm = $etuCdm->select("id_etude= '" . $etudes['id_etudes'] . "'and id_cdm='" . $params["id_cdm"] . "'");
            if (empty($etudesCdm)) {
                $etudess[] = $etudes;
            }
        }
        if (!empty($etudess)) {
            $resp = json_encode(array('etudes' => $etudess));
        } else {
            $resp = json_encode(array('reason' => 1));
        }
        echo $resp;
        exit();
    }
    
    
    
    
    

    function _searchContactsBy() {
        $params["id_oge_client"] = $_POST['id_client'];
        $params["nom_contact"] = $_POST['nom_contact'];
        $conta = $this->loadData("contacts");
        $search = $conta->rechercherQuery($params["nom_contact"]);
        $contaClient = $this->loadData("oge_clients_contacts");
        foreach ($search as $contact) {
            $contactClient = $contaClient->select("id_contact= '" . $contact['id_contact'] . "'and id_oge_client='" . $params["id_oge_client"] . "'");
            if (empty($contactClient)) {
                $contacts[] = $contact;
            }
        }
        if (!empty($contacts)) {
            $resp = json_encode(array('contacts' => $contacts));
        } else {
            $resp = json_encode(array('reason' => 1));
        }
        echo $resp;
        exit();
    }
    function _searchContactEtude() {       
        $this->params[0] == null ? $searc = "" : $searc = $this->params[0];
        $conta = $this->loadData("contacts");
        $search = $conta->rechercherQuery($searc);
        foreach ($search as $contact) {
            $contacts[] = $contact;
        }
        if (!empty($contacts)) {
            $resp = json_encode(array('contacts' => $contacts));
        } else {
            $resp = json_encode(array('reason' => 1));
        }
        echo $resp;
        exit();
    }
    function _searchCdmEtude() {
        $this->params[0] == null ? $searc = "" : $searc = $this->params[0];
        $id = $this->params[1];
        $cdm = $this->loadData("cdms");
        $cdm_etude = $this->loadData("cdm_etude");
        $cdms_etudes = $cdm_etude->select('id_etude = '.$id);
        
        if($cdms_etudes != null){
            $cdms = array();
            foreach($cdms_etudes as $etu){
                $cdms[] = $etu["id_cdm"];
            }            
        }  else {
            $cdms = array();
            $cdms[0] = 0;
        }
        $cdmss = $cdm->rechercherQuery($searc);   // Avant utilisation de la fonction selectWithoutIds mais récupére les cdm sans recherche
                
        if (!empty($cdmss)) {
            $resp = json_encode(array('cdms' => $cdmss));
        } else {
            $resp = json_encode(array('reason' => 1));
        }
        echo $resp;
        exit();
    }
    function _findcdp() {
        $datos = $_POST['allBonus'];
        $cdps = $this->loadData("cdps");  
        $cdp = $cdps->findCdp($datos);
        if(empty($datos[1])){
            $porcent = true;
        }else{
            $porcent = false;
        }
        if (!empty($cdp)) {
            $resp = json_encode(array('success' => true, 'reason' => $cdp, 'porcent' => $porcent));
        } else {
            $resp = json_encode(array('success' => false, 'reason' => 1));
        }
        echo $resp;
        exit();
    }
    
    
    
    
    /**
     * Suppression d'un cdp_etude
     */
    function _deleteCdp_etude() {
        $cdp_etude = $this->loadData("cdp_etude");
        
        if ($cdp_etude->get((int)$this->params[0])) {
            $cdp_etude->delete($this->params[0]);
            $_SESSION['smokey'] = "deletecdp_etude";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    function _saveCdpEtude() {
        
        $etude = $_POST['etude'];
        $cdp = $_POST['cdp'];
        $percent = $_POST['percent'];
        $idEdit = $_POST['idEdit'];
        $porEdit = $_POST['porEdit'];
        
        if($porEdit != null){
            $newPorcent = $porEdit - $percent;
            $cdp_etude = $this->loadData("cdp_etude"); 
            $cdp_etude->get($idEdit);
            $cdp_etude->percentage = $newPorcent;
            $cdp_etude->update();
        }
        
        $cdps_etude = $this->loadData("cdp_etude"); 
        $cdps_etude->id_cdp = $cdp;
        $cdps_etude->id_etude = $etude;
        $cdps_etude->percentage = $percent;
        $cdps_etude->create();
        
        $_SESSION['smokey'] = "add-cdp";
        $resp = json_encode(array('success' => true, 'id_etude' => $etude));
        echo $resp;
        exit();
    }
    function _saveCdmEtude() {
        $cdm_etude = $this->loadData("cdm_etude");  
        
        $idcdm = $_POST['idcdm'];
        $idetude = $_POST['idetude'];
        
        // SI !existe
        $count_cdm_et = $cdm_etude->existMultiple($idcdm,'id_cdm',$idetude,'id_etude');
        if(!$count_cdm_et){
        
            $cdm_etude->id_cdm = $idcdm;
            $cdm_etude->id_etude = $idetude;
            $cdm_etude->create();
            $_SESSION['smokey'] = "add-cdm";
        }else{
            $_SESSION['smokey'] = "existeCdm_etude";
        }
        
        $resp = json_encode(array('success' => true, 'id_etude' => $idetude));
        echo $resp;
        exit();
    }
    function _editCdp() {
        $idCdpEtude = $_POST['idCdpEtude'];
        $idCdpEtudeEdit = $_POST['idCdpEtud'];
        $etude = $_POST['etude'];
        $newCdp = $_POST['cdp'];
        $newPorcent = $_POST['percent'];

        if($idCdpEtudeEdit == $idCdpEtude){
            $cdp_etude = $this->loadData("cdp_etude"); 
            $cdp_etude->get($idCdpEtudeEdit);            
            $cdp_etude->id_cdp = $newCdp;
            $cdp_etude->update();
        }else{

            $cdp_etude = $this->loadData("cdp_etude"); 
            $cdp_etude->get($idCdpEtudeEdit);
            
            $cdp_etudes = $this->loadData("cdp_etude"); 
            $cdp_etudes->get($idCdpEtude);
            
            $oldPorcent = $cdp_etudes->percentage;
            $oldPorcentEdit = $cdp_etude->percentage;
            
            if($oldPorcent > $newPorcent){
                $newPorcentE = $oldPorcent - $newPorcent;
                $newPorcentEdit = $oldPorcentEdit + $newPorcentE;
            }else{
                $newPorcentE = $newPorcent - $oldPorcent;
                $newPorcentEdit = $oldPorcentEdit - $newPorcentE;
            }          

            $cdp_etudes->id_cdp = $newCdp;
            $cdp_etudes->percentage = $newPorcent;
            $cdp_etudes->update();
                        
            $cdp_etude->percentage = $newPorcentEdit;
            $cdp_etude->update();            
        }
        
        $_SESSION['smokey'] = "edit-cdp";
        $resp = json_encode(array('success' => true, 'id_etude' => $etude));
        echo $resp;
        exit();
    }
    
    function _searchClientEtude() {
        $this->params[0] == null ? $searc = "" : $searc = $this->params[0];
        $client = $this->loadData("oge_clients");
        $search = $client->rechercherQuery($searc);
        foreach ($search as $client) {
            $clients[] = $client;
        }
        if (!empty($clients)) {
            $resp = json_encode(array('clients' => $clients));
        } else {
            $resp = json_encode(array('reason' => 1));
        }
        echo $resp;
        exit();
    }
    function _searchEtude() {
        $id = $this->params[0];
        $etudes = $this->loadData("etudes");
        $etude = $etudes->select('id_etudes = '.$id);
        
        $cdp_etude = $this->loadData("cdp_etude");
        $cdp_etudes = $cdp_etude->findByEtude($id);
        
        $cdm_etude = $this->loadData("cdm_etude");
        $cdm_etudes = $cdm_etude->findByEtude($id);
        
        $type_document = $this->loadData("type_document");
        $docs = $type_document->select();
        
        $document = $this->loadData("documents");
        $documents = $document->select('id_etudes = '.$this->params[0]);
        
        $resp = json_encode(array('docs' => $docs, 'etude' => $etude, 'cdp_etude' => $cdp_etudes,'cdm_etude' => $cdm_etudes, 'documents' => $documents));
        echo $resp;exit();
    }
    
    function _addClientContact() {                             
        $cc = $this->loadData("oge_clients_contacts");
        $occ = $cc->select("id_oge_client = '" . $_POST['id_client'] . "' AND id_contact = '" . $_POST['id_contact'] . "'");
        $historyaddclicon = $this->loadData('oge_clients_contacts_history');        
        if (!empty($occ)) {
            $historyaddclicon->id_oge_client =$_POST['id_client'] ;
            $historyaddclicon->id_contact =$_POST['id_contact'];
            $historyaddclicon->event_time =date("Y-m-d H:i:s");
            $historyaddclicon->event_type  ="create";
            $historyaddclicon->create(); 
            $cc->id_oge_clients_contact = $occ[0]['id_oge_clients_contact'];
            $cc->id_oge_client = $_POST['id_client'];
            $cc->id_contact = $_POST['id_contact'];
            $cc->status = 1;
            $cc->update();
        } else {
            $historyaddclicon->id_oge_client =$_POST['id_client'] ;
            $historyaddclicon->id_contact =$_POST['id_contact'];
            $historyaddclicon->event_time =date("Y-m-d H:i:s");
            $historyaddclicon->event_type  ="create";
            $historyaddclicon->create(); 
            $cc->id_oge_client = $_POST['id_client'];
            $cc->id_contact = $_POST['id_contact'];
            $cc->status = 1;
            $cc->create();
        }
        //check if it doesn't exist
        $_SESSION['smokey'] = "contact_added";
        exit();
    }
    
    
    
    
    
    
    
    
    
    
    
    // Ajout etude - cdm
    function _addCdmEtudes() {
        $cc = $this->loadData("cdm_etude");
        $occ = $cc->select("id_cdm = '" . $_POST['id_cdm'] . "' AND id_etude = '" . $_POST['id_etudes'] . "'");
        
        if (!empty($occ)) {
            $cc->id_cdm_etude = $occ[0]['id_cdm_etude'];
            $cc->id_cdm = $_POST['id_cdm'];
            $cc->id_etude = $_POST['id_etudes'];
            $cc->update();
        } else {
            $cc->id_cdm = $_POST['id_cdm'];
            $cc->id_etude = $_POST['id_etudes'];
            $cc->create();
        }
        //check if it doesn't exist
        $_SESSION['smokey'] = "etude_added";
        exit();
    }
    
    
    
    
    
    
    
    
    
    
    
    

    function _deleteClientContact() {
        $idCont = $this->params[0];
        $idClie = $this->params[1];
        $cc = $this->loadData("oge_clients_contacts");
        $historyclientcontact = $this->loadData('oge_clients_contacts_history');
        $occ = $cc->select("id_oge_client = '" . $idClie . "' AND id_contact = '" . $idCont . "'");             
        $historyclientcontact->id_oge_client =$occ[0]['id_oge_client'];
        $historyclientcontact->id_contact =$occ[0]['id_contact'];
        $historyclientcontact->event_time =date("Y-m-d H:i:s");
        $historyclientcontact->event_type  ="delete";
        $historyclientcontact->create();                         
        $cc->delete($occ[0]['id_oge_clients_contact']);  
        $_SESSION['smokey'] = "contact_delete";
        $resp['success'] = true;
        echo json_encode($resp);
        exit();
    }
    
    
    
    function _deleteCdmEtudes() {
        $idetude = $this->params[0];
        $idcdm = $this->params[1];
        $cc = $this->loadData("cdm_etude");
        $occ = $cc->select("id_cdm = '" . $idcdm . "' AND id_etude = '" . $idetude . "'");             
        $cc->delete($occ[0]['id_cdm_etude']);  
        $_SESSION['smokey'] = "etude_delete";
        $resp['success'] = true;
        echo json_encode($resp);
        exit();
    }
    
    

    
    // Suppression definitif
    /*function _deleteCdm() {
        $cdm = $this->loadData("cdms");
        $cdm->get($this->params[0]);
        $memo = $this->loadData("memos");
        $memos = $memo->select("id = '" . $this->params[0] . "' AND target = 'cdm'");
        foreach ($memos as $del) {
            $memo->delete($del['id_memo']);
        }
        $cdm->delete($this->params[0]);
        if ($cdm->get($this->params[0]) == false) {
            $_SESSION['smokey'] = "delete";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }*/
    
    
    function _deleteCdm() {
        $cdm = $this->loadData("cdms");
        
        if ($cdm->get((int)$this->params[0])) {
            $cdm->archive = 2;
            $cdm->update();
            $_SESSION['smokey'] = "delete";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    function _deleteCdmEtude() {
        $cdmEtude = $this->loadData("cdm_etude");
        $cdmEtude->get($_POST['id']);
        $idEtude = $cdmEtude->id_etude;
        $cdmEtude->delete($_POST['id']);
        if ($cdmEtude->get($_POST['id']) == false) {
            $_SESSION['smokey'] = "delete-cdm";
            $resp = array('success' => true, 'id_etude' => $idEtude);
        }
        echo json_encode($resp);
        exit();
    }

    // Suppression definitif
    /*function _deleteCdp() {
        $resp['success'] = false;
        $cdm = $this->loadData("cdps");
        $cdm->get($this->params[0]);
        $cdm->delete($this->params[0]);
        if ($cdm->get($this->params[0]) == false) {
            $_SESSION['smokey'] = "deletecdp";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }*/
    
    function _deleteCdp() {
        $cdp = $this->loadData("cdps");
        
        if ($cdp->get((int)$this->params[0])) {
            $cdp->archive = 2;
            $cdp->update();
            $_SESSION['smokey'] = "deletecdp";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    // Actif cdp
    function _actifCdp() {
        $cdp = $this->loadData("cdps");
        
        if ($cdp->get((int)$this->params[0])) {
            $cdp->archive = 1;
            $cdp->update();
            $_SESSION['smokey'] = "deletecdp";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    // Disable CDP
    function _inactifCdp(){
        $cdp = $this->loadData("cdps");
        
        
        if($cdp->get((int)$this->params[0])){
            $cdp->archive = 2;
            $cdp->update();
            $_SESSION['smokey'] = "deletecdp";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    // Actif / Inactif CDM
    function _changeStatusOnCdm(){
        $cdm = $this->loadData("cdms");
        
        if($cdm->get((int)$this->params[0])){
            $cdm->status = 1;
            $cdm->update();
            $_SESSION['smokey'] = "actifcdm";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    // Rendre passif un cdm
    function _changeStatusCdm(){
        $cdm = $this->loadData("cdms");
        
        if($cdm->get((int)$this->params[0])){
            $cdm->status = 2;
            $cdm->update();
            $_SESSION['smokey'] = "inactifcdm";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    // Actif cdp dash
    function _dashCdp() {
        $cdps = $this->loadData("cdps");
        //var_export($this->params[0]);
            if ($cdps->get($this->params[0])) {
                $cdps->dashboard = 2;
                $cdps->update();
                $_SESSION['smokey'] = "dashcdp";
                $resp['success'] = true;
            }
            
        echo json_encode($resp);
        exit();
    }
    
    
    // Inactif cdp dash
    function _dashCdpIn() {
        $cdps = $this->loadData("cdps");
        //var_export($this->params[0]);
            if ($cdps->get($this->params[0])) {
                $cdps->dashboard = 1;
                $cdps->update();
                $_SESSION['smokey'] = "dashcdpIn";
                $resp['success'] = true;
            }
            
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    
    
    
    
    
    
    // Actif Etudes dash
    function _dashEtudes() {
        $etudes = $this->loadData("etudes");
        //var_export($this->params[0]);
            if ($etudes->get($this->params[0])) {
                $etudes->dashboard = 2;
                $etudes->update();
                $_SESSION['smokey'] = "dashcdp";
                $resp['success'] = true;
            }
            
        echo json_encode($resp);
        exit();
    }
    
    
    // Inactif Etudes Dash
    function _dashEtudesIn() {
        $etudes = $this->loadData("etudes");
        //var_export($this->params[0]);
            if ($etudes->get($this->params[0])) {
                $etudes->dashboard = 1;
                $etudes->update();
                $_SESSION['smokey'] = "dashcdpIn";
                $resp['success'] = true;
            }
            
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    function _saveclient() {
        $client = $this->loadData("oge_clients");
        $num = $client->counter();

        if ($num < 10) {
            $num = $num + 1;
            $num_client = date("Y") . "00" . $num;
        } else if ($num > 10 && $num < 100) {
            $num = $num + 1;
            $num_client = date("Y") . "0" . $num;
        }

        if ($_POST['id']) {
            $client->get($_POST['id']);
        }
        if ($_POST['typologie'] == 'Entreprise') {
            $client = $this->populateClientEntreprise($client);
        } elseif ($_POST['typologie'] == 'Particulier') {
            $client = $this->populateClientParticulier($client);
        }

        if ($_POST['id']) {
            $client->update();
            $_SESSION['smokey'] = "editClient";
            $resp['success'] = true;
        } else {
            $client->num_oge_client = $num_client;
            $client->create();
            $_SESSION['smokey'] = "addClient";
            $resp['success'] = true;
        }
        $resp['id'] = $client->id_oge_client;

        echo json_encode($resp);
        exit();
    }

    function _importcsv() {                
        $resp = array('success' => false, 'name' => "", 'error' => $_FILES['uploadedfile']['error'], 'path' => "");
        if($_FILES['uploadedfile']['type']=='application/vnd.ms-excel'){            
            $this->upload->setUploadDir($this->path, 'public/default/var/uploads/');
            $status = $this->upload->doUpload("uploadedfile");
            if ($status == true) {
               $resp['success'] = true;
                $resp['name'] = $this->upload->getName();
                $resp['path'] = $this->path . 'public/default/var/uploads/' . $this->upload->getName();
            }
            
            $resp = $this->_get2DArrayFromCsv($resp['path'], ",");
            echo json_encode($resp);
        }else{
            $resp['success']=false;
            $resp['error']="type-fail";
            echo json_encode($resp);
        }
    }

    function _get2DArrayFromCsv($file, $delimiter) {
        $notrequireds = array("12", "16");
        $this->settings->get('Motorise', 'type');
        $motorise = explode(";", $this->settings->value);
        $this->settings->get('Cursus', 'type');
        $cursus = explode(";", $this->settings->value);                               
        $this->settings->get('Langues', 'type');
        $langues = explode(";", $this->settings->value);    
        $this->settings->get('annee', 'type');
        $annees = explode(";", $this->settings->value);                
        $resp = array("row" => "", "column" => "", "success" => true);        
        if (($handle = fopen($file, "r")) !== FALSE) {
            $i = 0;
            while (($lineArray = fgetcsv($handle, 4000, $delimiter)) !== FALSE) {
                //if($i==0) continue;
                for ($j = 0; $j < count($lineArray); $j++) {
                    if (in_array($lineArray[$j], $notrequireds) !== true) {
                        
                        
                        if ((empty($lineArray[$j])||$j==12 || ($j == 9 && in_array($lineArray[$j], $motorise)== false) ||($j==14 && !($lineArray[$j] >= $annees[0] && $lineArray[$j] <= $annees[1] )) ||($j == 13 && in_array($lineArray[$j], $cursus)==false))&& $i!=0) {                            
                            if($j==12){
                                $arrlangues=explode("-",$lineArray[$j]);                                
                                    foreach($arrlangues as $arrlangue){
                                        if(in_array($arrlangue,$langues)==false){
                                            $resp['row'] = $i+1;
                                            $resp['column'] = $j+1;
                                            $resp['success'] = true;
                                            //break;
                                        }
                                    }
                                    $data2DArray[$i][$j] = $lineArray[$j];
                            }else{
                                $resp['row'] = $i+1;
                                $resp['column'] = $j+1;
                                $resp['success'] = true;
                                //break;
                            }
                        } else {
                            $data2DArray[$i][$j] = $lineArray[$j];
                        }
                    } else {
                        $data2DArray[$i][$j] = $lineArray[$j];
                    }
                }
                $i++;
            }
            fclose($handle);
        }
        if ($resp['success'] == true) {
            $this->_saveimportcdm($data2DArray);            
            $_SESSION['smokey'] = "importsave";
            return $resp;
        } else {
            return $resp;
        }
    }

    function _saveimportcdm($datas) {
        array_shift($datas);
        $cdm = $this->loadData('cdms');
        
        foreach ($datas as $data) {
            
            $cdm->get($data[0], 'id_cdm');
            
            $provenance = str_replace("-", ",", $data[12]);
            $langues = str_replace("-", ",", $data[13]);
            
            $cdm->nom = $data[1];
            $cdm->prenom = $data[2];
            $cdm->telephone = $data[3];
            $cdm->email = $data[4];
            $cdm->banner = $data[5];
            $cdm->date_naissance = $data[6];
            $cdm->adresse = $data[7];
            $cdm->ville = $data[8];
            $cdm->code_postal = $data[9];
            $cdm->motorise = $data[10];
            $cdm->num_ss = $data[11];
            $cdm->provenance = $provenance;
            $cdm->langues = $langues;
            $cdm->cursus = $data[14];
            $cdm->annee = $data[15];
            $cdm->details = $data[16];
            $cdm->upload = null;
            $cdm->role = $data[18];
            $cdm->status = 1;
            $cdm->archive = $data[20];
            $cdm->id_cdp = $data[21];
            
            $cdm->update();
        }
    }
    
    
    
    

    
    
    
    /* Tresorier actif - inactif Documents */
    function _validationDocDisable() {
        $document = $this->loadData("documents");
        
        if ($document->get((int)$this->params[0])) {
            $document->tresorier_validation = 0;
            $document->update();
            
            $_SESSION['smokey'] = "inactif";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    function _validationDocEnable() {
        $document = $this->loadData("documents");
        
        if ($document->get((int)$this->params[0])) {
            $document->tresorier_validation = 1;
            $document->update();
            
            $_SESSION['smokey'] = "actif";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }




    function _validationDocNoValide() {
        $document = $this->loadData("documents");

        if ($document->get((int)$this->params[0])) {
            $document->tresorier_validation = 2;
            $document->update();

            $_SESSION['smokey'] = "non_valide";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }


    /* FIN */



    // Session = 1 : Actif
    function _sessionsDocActif(){
        unset($_SESSION['doc_actif']);
        unset($_SESSION['doc_inactif']);
        if(!isset($_SESSION['doc_actif'])){
            $_SESSION['doc_actif'] = 1;
            $_SESSION['smokey'] = "session_actif";
            $resp['success'] = true;
            
        }
        echo json_encode($resp);
        exit();
    }


    // Session = 0 : inactif
    function _sessionsDocInactif(){
        unset($_SESSION['doc_inactif']);
        unset($_SESSION['doc_actif']);
        if(!isset($_SESSION['doc_inactif'])){
            $_SESSION['doc_inactif'] = 0;
            $_SESSION['smokey'] = "session_inactif";
            $resp['success'] = true;
            
        }
        echo json_encode($resp);
        exit();
    }


    // Session = 2 : Non valider
    function _sessionsDocNonValider(){
        unset($_SESSION['doc_inactif']);
        unset($_SESSION['doc_actif']);
        unset($_SESSION['doc_non_valider']);
        if(!isset($_SESSION['doc_non_valider'])){
            $_SESSION['doc_non_valider'] = 2;
            $_SESSION['smokey'] = "session_non_valider";
            $resp['success'] = true;

        }
        echo json_encode($resp);
        exit();
    }
    /* FIN */
    
    
    
    
    
    
    
    /*CDP role= Trésorier*/
    function _tresorierChoixCdp() {
        $cdp = $this->loadData("cdps");
        
        if ($cdp->get((int)$this->params[0])) {
            $cdp->role = 'tresorier';
            $cdp->update();
            
            $_SESSION['smokey'] = "roleCdpTresorier";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    /*FIN*/
    
    
    
    /*CDP role= cdp*/
    function _cdpChoixCdp() {
        $cdp = $this->loadData("cdps");
        
        if ($cdp->get((int)$this->params[0])) {
            $cdp->role = ' ';
            $cdp->update();
            
            $_SESSION['smokey'] = "retirerTresorier";
            $resp['success'] = true;
        }
        echo json_encode($resp);
        exit();
    }
    /*FIN*/
    
    
    
    
    /* Changement président */
    
    function _changePresident() {
        $cdp = $this->loadData("cdps");
        
        // Changement président actuel en role = ''
        $cdps = $cdp->exist_general('president', 'role');
        $cdp->get($cdps['id_cdp']);
        $cdp->role = '';
        $cdp->update();
        
        
        if ($cdp->get((int)$this->params[0])) {
            $cdp->role = 'president';
            $cdp->update();

            
            $_SESSION['smokey'] = "ChangePresident";
            $resp['success'] = true;
        }
        
        echo json_encode($resp);
        exit();
    }
    /* FIN */
    
    
    
    
    
    function _saveTresorier(){
        $cdp = $this->loadData("cdps");
        $cdpu = $this->loadData("cdps");
        
        if ($_POST['id_cdp']) {
            $cdp->get($_POST['id_cdp']);
        }
        $cdp->nom = $_POST['nom'];
        $cdp->prenom = $_POST['prenom'];
        $cdp->nom_interne = $_POST['nom_interne'];
        $cdp->email = $_POST['email'];
        $cdp->mdp = md5($_POST['mdp']) != $cdp->mdp ? md5($_POST['mdp']) : $cdp->mdp;
        $cdp->adresse = $_POST['adresse'];
        $cdp->ville = $_POST['ville'];
        $cdp->code_postal = $_POST['code_postal'];
        $cdp->num_ss = $_POST['num_ss'];
        $cdp->status = 1;
        $cdp->archive = 1;
        
        $cdp->role = $_POST['role'];
        
        // vérifier si 1 president existe en bdd si alors modifier le role en '', si non insérer un président
        $cdps = $cdpu->exist_general('president', 'role');
        
        if($cdps == 0){
            $cdpu->id_cdp = $cdps['id_cdp'];
            $cdpu->nom = $cdps['nom'];
            $cdpu->prenom = $cdps['prenom'];
            $cdpu->telephone = $cdps['telephone'];
            $cdpu->annee = $cdps['annee'];
            $cdpu->nom_interne = $cdps['nom_interne'];
            $cdpu->email = $cdps['email'];
            $cdpu->mdp = $cdps['mdp'];
            $cdpu->adresse = $cdps['adresse'];
            $cdpu->ville = $cdps['ville'];
            $cdpu->code_postal = $cdps['code_postal'];
            $cdpu->num_ss = $cdps['num_ss'];
            $cdpu->details = $cdps['details'];
            //$cdpu->role = '';
            $cdpu->status = $cdps['status'];
            $cdpu->added = $cdps['added'];
            $cdpu->updated = $cdps['updated'];

            $cdpu->update();
        }
        
        
        if ($_POST['id_cdp']) {
            $cdp->update();
            $_SESSION['smokey'] = "editcdp";
            $resp['success'] = true;
        } else {
            $cdp->create();
            $_SESSION['smokey'] = "add_tresorier";
            $resp['success'] = true;
        }
        
        
        
        /* Ajout des droit dans table cdps_zone */
        if($id_cdp != 0){
            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 1;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 2;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 3;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 4;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 5;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 6;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 7;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 8;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 9;
            $this->cdps_zones->create();

            $this->cdps_zones->id_cdp = $id_cdp;
            $this->cdps_zones->id_zone = 10;
            $this->cdps_zones->create();
        }
        /* FIN */
        
        
        
        /* Ajout d'une nouvelle ville */
        $ville = $this->loadData('ville');
            // Vérification si ville entrer est new,
            $villeExiste = $ville->exist_label($_POST['ville']);
            if($villeExiste == 0){
                $ville->label = $_POST['ville'];
                $ville->create();
            }
            
        /*Fin*/
        
        
        
        
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    function _choix_etude(){
        // Récupération du cdm_etude grace à l'id
        unset($_SESSION['cdp_choix']);
        unset($_SESSION['cdm']);
        $cdm_etude = $this->loadData('cdm_etude');
        $this->cdm_et = $cdm_etude->findByEtudecdmID($this->params[0]);
        
        foreach ($this->cdm_et as $e){
            $_SESSION['cdm'] = $e;
        }
        
        $resp['success'] = true;
        echo json_encode($resp);       
        exit();
    }
    
    
    
    
    function _choix_etude_cdp(){
        // Récupération du cdp_etude grace à l'id
        unset($_SESSION['cdm']);
        unset($_SESSION['cdp_choix']);
        $cdp_etude = $this->loadData('cdp_etude');
        $this->cdp_et = $cdp_etude->findByEtudecdpID($this->params[0]);
        
        foreach ($this->cdp_et as $e){
            $_SESSION['cdp_choix'] = $e;
        }
        
        $resp['success'] = true;
        echo json_encode($resp);       
        exit();
    }
    
    
    
    
    
    function _changeEtudeCdmHome(){
        // Récupération des étude du cdp
        $cdp_etude = $this->loadData('cdp_etude');
        $cdp_et = $cdp_etude->findByEtudecdms($this->params[0]);
        
        if(count($cdp_et) == 0){
        
            unset($_SESSION['cdp_etude_home']);
            $_SESSION['cdp_etude_home'] = '';
            
            $_SESSION['smokey'] = "session_home_cdp";
            $resp['success'] = true;
        
            
        }else{
            foreach ($cdp_et as $e){
                unset($_SESSION['cdp_etude_home']);
                if(!isset($_SESSION['cdp_etude_home'])){
                    $_SESSION['cdp_etude_home'] = $e;
                    $_SESSION['smokey'] = "session_home_cdp";
                    $resp['success'] = true;
                }
            }
        }
        
        echo json_encode($resp);
        exit();
    }
    
    
    
    
    
    function _saveEvaluationNote(){
        $cdms = $this->loadData('cdms');
        $noteExiste = $cdms->select("id_cdm = '" . $_POST['id_cdm'] . "' ");
        
        if ($noteExiste) {
            
            $this->settings->get('Competences', 'type');
            $this->competences = explode(";", $this->settings->value);
            $this->eval = $this->bdd->run(" SELECT * FROM `settings` WHERE `type` REGEXP '^evaluation[0-9]+$' ");
            
            $tmp = array();
            foreach($this->competences as $a=>$c){ 
                $newcompetences = explode(",", "");
                if (in_array($competence, $newcompetences)) {
                    $tmp[] = $_POST['evaluation'.$a];
                }
            }
            
            $cdms->id_cdm = $noteExiste[0]['id_cdm'];
            $cdms->nom = $noteExiste[0]['nom'];
            $cdms->prenom = $noteExiste[0]['prenom'];
            $cdms->telephone = $noteExiste[0]['telephone'];
            $cdms->email = $noteExiste[0]['email'];
            $cdms->banner = $noteExiste[0]['banner'];
            $cdms->date_naissance = $noteExiste[0]['date_naissance'];
            $cdms->adresse = $noteExiste[0]['adresse'];
            $cdms->ville = $noteExiste[0]['ville'];
            $cdms->code_postal = $noteExiste[0]['code_postal'];
            $cdms->motorise = $noteExiste[0]['motorise'];
            $cdms->num_ss = $noteExiste[0]['num_ss'];
            $cdms->provenance = $noteExiste[0]['provenance'];
            $cdms->langues = $noteExiste[0]['langues'];
            $cdms->competence = $noteExiste[0]['competence'];
            $cdms->evaluation = $noteExiste[0]['evaluation'];
            $cdms->cursus = $noteExiste[0]['cursus'];
            $cdms->annee = $noteExiste[0]['annee'];
            $cdms->details = $noteExiste[0]['details'];
            $cdms->upload = $noteExiste[0]['upload'];
            $cdms->role = $noteExiste[0]['role'];
            $cdms->status = $noteExiste[0]['status'];
            $cdms->archive = $noteExiste[0]['archive'];
            $cdms->id_cdp = $noteExiste[0]['id_cdp'];
            $cdms->added = $noteExiste[0]['added'];
            $cdms->updated = $noteExiste[0]['updated'];
            $cdms->evaluation_competence_note = serialize($tmp);
            $cdms->update();
        } else {
            // ERREUR CAS IMPOSSIBLE
        }
        //check if it doesn't exist
        $_SESSION['smokey'] = "note_added";
        exit();
    }






    function _searchEtudeComplete() {
        $id = $this->params[0];
        $etudes = $this->loadData("etudes");
        $etude = $etudes->select('id_etudes = '.$id);

        $cdp_etude = $this->loadData("cdp_etude");
        $cdp_etudes = $cdp_etude->findByEtude($id);

        $cdm_etude = $this->loadData("cdm_etude");
        $cdm_etudes = $cdm_etude->findByEtude($id);

        $type_document = $this->loadData("type_document");
        $docs = $type_document->select();

        $document = $this->loadData("documents");
        $documents = $document->selectInfoEtude($id);


        $resp = json_encode(array('docs' => $docs, 'etude' => $etude, 'cdp_etude' => $cdp_etudes,'cdm_etude' => $cdm_etudes, 'documents' => $documents));
        echo $resp;exit();
    }


    
    

//    function _paginatecdps() {
//        $response = array('success' => false);
//        $page = $_GET['page'];
//        $limit = 2;
//        $offset = ($page - 1) * $limit;
//        /* Sql a la db */
//        $cdps = $this->loadData('cdps');
//        $sql = $cdps->selectlimit($limit, $offset);
//        $response['sql'] = $sql;
//        $response['success'] = true;
//        $result = json_encode($response);
//        echo $result;
//    }
     
    
    
}