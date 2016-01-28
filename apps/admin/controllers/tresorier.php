<?php
class tresorierController extends bootstrap {
    var $Command;

    function tresorierController(&$command, $config, $app) {
        parent::__construct($command, $config, $app);

        $this->catchAll = true;

        // Controle d'acces � la rubrique
        $this->users->checkAccess('configuration');

        // Activation du menu
        $this->menu_admin = 'tresorier';
        
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
    }
    
    function _default(){
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $this->loadJs('admin/tresorier/default');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadCss('../styles/admin/jquery.dataTables');
        
        if($this->params[0] == 'exportcdmpaiement') {
            $this->_exportcsvpaiement();
        }else if($this->params[0] == 'exporttva') {
            $this->_exportcsvtva();
        }else if ($this->params[0] == 'exportetudes') {
            $this->_exportcsvEtudes();
        }
        
        $document = $this->loadData('documents');
        $this->doc = $document->findByEtudeDocComplete();
        
        
        
    }
    
    
    
    
    function _exportcsvpaiement() {
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $result= array();
        $cdmdata=$this->loadData('cdm_etude');  
        $cdms = $cdmdata->findByEtudeGeneral(); 
        
        // Récupération remunération
        $info_doc = $this->loadData('info_documents');
        $infdoc = $info_doc->select();
        
        // Date du jour
        $startTime = mktime() - 30*3600*24;
        $endTime = mktime();
        
        foreach($cdms as $cdm){
            foreach ($infdoc as $d){
                
                if($d['avenant_settings1'] != '' AND $d['avenant_settings2'] != '' AND $d['cdms_nom'] == $cdm['nom'] AND $d['cdms_prenom'] == $cdm['prenom']){
                
                    $result[] = htmlentities($d["etudes_num_convention"]).','.htmlentities($d["session_id_cdm"]).','.htmlentities($d["cdms_banner"]).','.
                        htmlentities($d['cdms_prenom']).','.htmlentities($d['cdms_nom']).','.htmlentities($d['cdms_num_ss']).','.htmlentities($d["cdms_adresse"]).','.
                        htmlentities($d["cdms_ville"]).','.htmlentities($d["cdms_code_postal"]).','.htmlentities($d['avenant_settings1']);
                }
            }
        }
        $header="num_convention".','."id_cdm".','."banner".','."prenom".','."nom".','."num_ss".','.
                "adresse".','."ville".','."code_postal".','."remuneration";        
        $pathcsv=$this->_saveExport($result,$header);        
        $this->_downloadExport($pathcsv.".csv");
        
        
    }
    
    
    function _exportcsvtva() {
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        // TVA ICI CES JUSTE UN MODEL
        die;
        $result= array();
        $cdmdata=$this->loadData('cdm_etude');  
        $cdms = $cdmdata->findByEtudeGeneral(); 
        
        // Récupération remunération
        $doc_element = $this->loadData('doc_elements');
        $doc = $doc_element->select('id_doc_template = 8 AND id_elements = 27');
        
        foreach($cdms as $cdm){
            foreach ($doc as $d){
            
                $result[] = htmlentities($cdm["num_convention"]).','.htmlentities($cdm["id_cdm"]).','.htmlentities($cdm["banner"]).','.
                        htmlentities($cdm['prenom']).','.htmlentities($cdm['nom']).','.htmlentities($cdm['num_ss']).','.htmlentities($cdm["adresse"]).','.
                        htmlentities($cdm["ville"]).','.htmlentities($cdm["code_postal"]).','.htmlentities($d['value']);
        
            }
        }
        $header="num_convention".','."id_cdm".','."banner".','."prenom".','."nom".','."num_ss".','.
                "adresse".','."ville".','."code_postal".','."code postal".','.
                "remuneration";        
        $pathcsv=$this->_saveExport($result,$header);        
        $this->_downloadExport($pathcsv.".csv");
        
        
    }
    
    
    
    
    function _exportcsvEtudes() {
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $result = array();

        $document = $this->loadData('documents');
        $doc = $document->findByEtudeDocComplete();

        foreach ($doc as $d) {
            if($d['tresorier_validation'] == 0){
                
                if($d['nature'] != 'Convention'  && $d['nature'] != 'Accord de confidentialité' && $d['nature'] != 'Attestation de fin de mission' && $d['nature'] != 'Avenant étudiant'){
                    $tresorier = $d['tresorier_validation']==0?'En attente de validation':'';
                }
                
                
                if ($d['nature'] == 'Convention') {
                    if ($d['ogeClient_nom_societe'] != null) {
                        $a = $d['ogeClient_nom_societe'];
                    }else{ 
                        $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom'];
                    }

                }else if($d['nature'] == 'Factures de frais') {
                    if ($d['ogeClient_nom_societe'] != null) {
                        $a = $d['ogeClient_nom_societe'].' ('.$d['ttcTotal'].' )';
                     }else{
                        $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom'].' ('.$d['ttcTotal'].' )';
                     }

                }else if($d['nature'] == 'Factures'){
                    if ($d['ogeClient_nom_societe'] != null) {
                        $a = $d['ogeClient_nom_societe'].' ('.$d['totalTtcFacture'].' )';
                     }else{ 
                        $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom'].' ('.$d['totalTtcFacture'].' )';
                     }

                }else if($d['nature'] == 'Attestation de fin de mission'){
                    if ($d['ogeClient_nom_societe'] != null) {
                        $a = $d['ogeClient_nom_societe'];
                     }else{ 
                        $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom']; 
                     }

                }else if($d['nature'] == 'Accord de confidentialité'){
                    if ($d['ogeClient_nom_societe'] != null) {
                       $a = $d['ogeClient_nom_societe'];
                     }else{
                       $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom'];
                     }

                }else if($d['nature'] == 'Avenant étudiant'){
                    $a = $d['cdms_nom'].' '.$d['cdms_prenom'];

                 }else if($d['nature'] == 'Bulletin de versement (BV)'){
                    if ($d['ogeClient_nom_societe'] != null) {
                       $a = $d['ogeClient_nom_societe'];
                    }else{ 
                       $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom'];
                    }

                }else if($d['nature'] == 'Avoirs'){
                    if ($d['ogeClient_nom_societe'] != null) {
                       $a = $d['ogeClient_nom_societe'];
                     }else{ 
                       $a = $d['ogeClient_nom'].' '.$d['ogeClient_prenom'];
                     }

                }
                
                
                
                $result[] = htmlentities($d["id_document"]) . ',' . htmlentities($d["nature"]) . ',' . htmlentities($d["nom_document"]) . ',' .
                        htmlentities($d['date_sortie']) . ',' . htmlentities($tresorier) . ',' . htmlentities($a) . ',' . htmlentities($d["nom_interne"]);
            }
        
        }
        $header = "id" . ',' . "nature" . ',' . "nom document" . ',' . "date sortie" . ',' . "validation" . ',' . "nom prenom (remuneration)" . ',' .
                "etude";
        $pathcsv = $this->_saveExport($result, $header);
        $this->_downloadExport($pathcsv . ".csv");
    }
    
    
    
    function _saveExport($results,$header) {
        $name=rand(1, 100000);        
        $path = $this->path ."public/default/var/tmp/exportTresorier". $name;                       
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
    
    
    function _downloadExport($file, $downloadfilename = null){                     
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
