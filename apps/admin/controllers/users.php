<?php

class usersController extends bootstrap {

    var $Command;

    function usersController(&$command, $config, $app) {
        parent::__construct($command, $config, $app);

        $this->catchAll = true;

        
        // Controle d'acces � la rubrique
        $this->users->checkAccess('users');

        // Activation du menu
        $this->menu_admin = 'users';
    }

    function _default() {
        $this->loadJs('admin/users/default');
        $this->loadJs('admin/tablesorter/jquery.tablesorter.pager');
        $this->loadJs('admin/tablesorter/jquery.tablesorter.min');
    }

    function _add_cdm() {

        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/users/add_cdm');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->settings->get('Motorise', 'type');
        $this->motorise = explode(";", $this->settings->value);
        $this->settings->get('Cursus', 'type');
        $this->cursus = explode(";", $this->settings->value);                
        $this->settings->get('annee', 'type');
        $anneesconfig = explode(";", $this->settings->value);                
        $this->annee = array();
        for ($i=$anneesconfig[0]; $i<=$anneesconfig[1]; $i++) {
            array_push($this->annee, $i);
        }
        $this->settings->get('Langues', 'type');
        $this->langues = explode(";", $this->settings->value);
        
        
        $this->settings->get('Competences', 'type');
        $this->competences = explode(";", $this->settings->value);                 
        
        
        $this->eval = $this->bdd->run(" SELECT * FROM `settings` WHERE `type` REGEXP '^evaluation[0-9]+$' ");
        
        
        $anneej = date('Y');
        $this->ann = array();
        for($i=1989; $i <= $anneej; $i++){
            array_push($this->ann, $i);
        }
        
        $this->mois = array();
        for($i=1; $i<=12; $i++){
            array_push($this->mois, $i);
        }
        
        $this->jour = array();
        for($i=1; $i <= 31; $i++){
            array_push($this->jour, $i);
        }
        
        
        // Récupération de toutes les villes en bdd
        $ville = $this->loadData('ville');
        $this->ville = $ville->select();
        // Fin
        
        $this->view = ('add_cdm');
    }
    
    
    function _synthese_cdm(){
        /* Récupérer le cdm crée en dernier */
        $cdms = $this->loadData('cdms');
        $this->cdms = $cdms->max_id();
    }
    

    function _edit_cdm() {
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/users/add_cdm');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->cdm = $this->loadData('cdms');
        $idCdm = $this->params[1];
        $this->cdm->get($idCdm);
        $provenances = explode(",", $this->cdm->provenance);
        $this->provenance = array($provenances[0], $provenances[1], $provenances[2]);
        $date = new DateTime($this->cdm->date_naissance);
        $this->fecha = $date->format('d/m/Y');
        $this->settings->get('Motorise', 'type');
        $this->motorise = explode(";", $this->settings->value);
        $this->settings->get('Cursus', 'type');
        $this->cursus = explode(";", $this->settings->value);
        $this->settings->get('annee', 'type');
        $anneesconfig = explode(";", $this->settings->value);                
        $this->annee = array();
        for ($i=$anneesconfig[0]; $i<=$anneesconfig[1]; $i++) {
            array_push($this->annee, $i);
        }
        
        $this->settings->get('Langues', 'type');
        $this->langues = explode(";", $this->settings->value);
        
        
        
        /* Récupérer la date de naissance */
        $date_naissance = $this->cdm->select('id_cdm ='.$this->params[1]);
        $date_n = explode('-', $date_naissance[0]['date_naissance']);
        $this->a = $date_n[0];
        $this->m = $date_n[1];
        $this->j = substr($date_n[2], 0, 2);
        /* FIN */
        
        
        
        
        $anneej = date('Y');
        $this->ann = array();
        for($i=1989; $i <= $anneej; $i++){
            array_push($this->ann, $i);
        }
        
        $this->mois = array();
        for($i=1; $i<=12; $i++){
            array_push($this->mois, $i);
        }
        
        $this->jour = array();
        for($i=1; $i <= 31; $i++){
            array_push($this->jour, $i);
        }
        
        
        
        // Récupération de toutes les villes en bdd
        $ville = $this->loadData('ville');
        $this->ville = $ville->select();
        // Fin
        
        
                                               
        $this->view = ('edit_cdm');
    }

    function _addmemo(){
        $this->loadJs('admin/memos/add');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->view = ('addmemo');
    }

    function _editmemo() {
        $this->loadJs('admin/memos/add');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->memo = $this->loadData('memos');
        $idMemo = $this->params[2];
        $this->memo->get($idMemo);
        $this->view = ('addmemo');
    }        

    function _deletememo() {
        $memo = $this->loadData("memos");        
        $memo->get($this->params[2]);
        if ($memo->target == 'cdm') {
            $memo->delete();
        }
        $_SESSION['smokey'] = "delete";
        // Renvoi sur la liste des utilisateurs
        header('Location:' . $this->lurl . '/users/cdm/view/' . $this->params[1]);
        die;
    }

    function _view_cdm() {
        
        $cdm = $this->loadData('cdms');
        $cdm_etude = $this->loadData('cdm_etude');
        
        $this->loadJs('admin/users/view_cdm');
        $this->loadJs('admin/clients/view');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $cdm->get($this->params[1], 'id_cdm');
        $this->cdm = $cdm;
        $this->status = $this->cdm->status == 1 ? 'Actif' : 'Passif';
        $this->memos = $this->loadData("memos")->findbyidtarget($this->params[1], 'cdm');
        $this->studes = null;
        
        
        /* récupérer toutes les études */
        $etudes = $this->loadData('etudes');
        $this->etudess = $etudes->select();
        /* FIN */
        
        
        $this->cdm_etude = $cdm_etude->findByEtudecdm($this->params[1]);
        
        
        /* Select dans la table cdps du champs id_cdp de la table id_cdms, récupération du nom, prenom */
        $cdp = $this->loadData('cdps');
        $this->cdp = $cdp->select('id_cdp ='.$this->cdm->id_cdp);
        
        /* FIN */
        
        
        /* Récupérer les avenant et bv du user cdm */
        foreach ($this->cdm_etude as $cdme){
            $document = $this->loadData("documents");
            $this->documentThis = $document->selectInfoEtude($cdme['id_etudes']);
        }
        
        /* FIN */
        
        
        $this->settings->get('Competences', 'type');
        $this->competences = explode(";", $this->settings->value);                 
        
        
        $this->eval = $this->bdd->run(" SELECT * FROM `settings` WHERE `type` REGEXP '^evaluation[0-9]+$' ");
        
        
        
        // Calcul Versement Annee en cours
        $this->versementAnneeCours = $this->bdd->run("SELECT SUM(avenant_settings1) FROM `info_documents` WHERE session_id_cdm = '".$this->params[1]."' ");        
        // Calcul Versement Annee civile
        $this->versementAnneeCivil = $this->bdd->run("SELECT SUM(avenant_settings1) FROM `info_documents` WHERE session_id_cdm = '".$this->params[1]."' ");

        
        $this->view = ('view_cdm');
    }
    
    function _delete_cdm() {
        $this->loadJs('admin/users/cdm');
    }
    
    

    function _cdm() {
        
        //$this->menu_admin = "cdm";
        if ($this->params[0] == 'add') {
            $this->_add_cdm();
        } elseif ($this->params[0] == 'edit') {
            $this->_edit_cdm();
        } elseif ($this->params[0] == 'view') {
            $this->_view_cdm();
        } elseif($this->params[0] == 'delete') {
                $this->_delete_cdm();        
        } elseif ($this->params[0] == 'deletememo') {
            $this->_deletememo();         
        } elseif ($this->params[0] == 'download') {
            $this->_download();                         
        } elseif ($this->params[0] == 'exportcdm') {
            $this->_exportcsv();         
        } 
        
        $this->loadJs('admin/users/cdm');
        $this->loadJs('admin/tablesorter/jquery.tablesorter.pager');
        $this->loadJs('admin/tablesorter/jquery.tablesorter.min');

        $this->search = "";
        $this->limit = $limit = 30;
        $params = array();
        $page = 1;
        if (count($this->params)) {
            for ($i = 0; $i < count($this->params); $i++) {
                if (isset($this->params[$i])) {
                    $par = explode("=", $this->params[$i]);
                    $params[$par[0]] = urldecode($par[1]);
                }
            }
        }
        $users = $this->loadData("cdms");
        if (isset($params['page']))
            $page = $params['page'];
        $params['page'] = $page;
        $this->ini = $ini = ($page - 1) * $limit;
        $this->newParams = $params;


        $search = $users->search($params, $limit, $ini);
        $this->cdms = $search['cdms'];        
        $this->cdmsCount = $search['count']; 
        $this->settings->get('Motorise', 'type');
        $this->motorise = explode(";", $this->settings->value);
        $this->settings->get('Cursus', 'type');
        $this->cursus = explode(";", $this->settings->value);                               
        $this->settings->get('annee', 'type');
        $anneesconfig = explode(";", $this->settings->value);                
        $this->annees = array();
        for ($i=$anneesconfig[0]; $i<=$anneesconfig[1]; $i++) {
            array_push($this->annees, $i);
        }
        $this->settings->get('Langues', 'type');
        $this->langues = explode(";", $this->settings->value);                                       
        
        $this->settings->get('Competences', 'type');
        $this->competences = explode(";", $this->settings->value);                 
        
        
        $this->eval = $this->bdd->run(" SELECT * FROM `settings` WHERE `type` REGEXP '^evaluation[0-9]+$' ");
        
        
        $this->status = array("0", "1");
        
        // Récupération de toutes les villes en bdd
        $ville = $this->loadData('ville');
        $this->ville = $ville->select();
        // Fin
        
    }

    function _default_old() {
        // Formulaire d'ajout d'un utilisateur
        if (isset($_POST['form_add_users'])) {
            $this->users->firstname = $_POST['firstname'];
            $this->users->name = $_POST['name'];
            $this->users->phone = $_POST['phone'];
            $this->users->mobile = $_POST['mobile'];
            $this->users->email = $_POST['email'];
            $this->users->password = md5($_POST['password']);
            $this->users->id_tree = $_POST['id_tree'];
            $this->users->status = $_POST['status'];
            $this->users->id_user = $this->users->create();

            // Mise en session du message
            $_SESSION['freeow']['title'] = 'Ajout d\'un utilisateur';
            $_SESSION['freeow']['message'] = 'L\'utilisateur a bien &eacute;t&eacute; ajout&eacute; !';

            // Renvoi sur la liste des zones
            header('Location:' . $this->lurl . '/zones');
            die;
        }

        // Formulaire de modification d'un utilisateur
        if (isset($_POST['form_mod_users'])) {
            // Recuperation des infos de la personne
            $this->users->get($this->params[0], 'id_user');

            $this->users->firstname = $_POST['firstname'];
            $this->users->name = $_POST['name'];
            $this->users->phone = $_POST['phone'];
            $this->users->mobile = $_POST['mobile'];
            $this->users->email = $_POST['email'];
            if ($_POST['password'] != '') {
                $this->users->password = md5($_POST['password']);
            }
            $this->users->id_tree = $_POST['id_tree'];
            $this->users->status = ($this->users->status == 2 ? 2 : $_POST['status']);
            $this->users->update();

            // Mise en session du message
            $_SESSION['freeow']['title'] = 'Modification d\'un utilisateur';
            $_SESSION['freeow']['message'] = 'L\'utilisateur a bien &eacute;t&eacute; modifi&eacute; !';

            // Renvoi sur la liste des utilisateurs
            header('Location:' . $this->lurl . '/users');
            die;
        }

        // Suppression d'un utilisateur
        if (isset($this->params[0]) && $this->params[0] == 'delete') {
            // Recuperation des infos du setting
            $this->users->get($this->params[0], 'id_user');

            if ($this->users->status != 2) {
                $this->users->delete($this->params[1], 'id_user');
                $this->users_zones->delete($this->params[1], 'id_user');
            }

            // Mise en session du message
            $_SESSION['freeow']['title'] = 'Suppression d\'un utilisateur';
            $_SESSION['freeow']['message'] = 'L\'utilisateur a bien &eacute;t&eacute; supprim&eacute; !';

            // Renvoi sur la liste des utilisateurs
            header('Location:' . $this->lurl . '/users');
            die;
        }

        // Modification du status d'un utilisateur
        if (isset($this->params[0]) && $this->params[0] == 'status') {
            $this->users->get($this->params[1], 'id_user');

            if ($this->users->status != 2) {
                $this->users->status = ($this->params[2] == 1 ? 0 : 1);
                $this->users->update();
            }

            // Mise en session du message
            $_SESSION['freeow']['title'] = 'Statut d\'un utilisateur';
            $_SESSION['freeow']['message'] = 'Le statut de l\'utilisateur a bien &eacute;t&eacute; modifi&eacute; !';

            // Renvoi sur la liste des utilisateurs
            header('Location:' . $this->lurl . '/users');
            die;
        }

        // Recuperation de la liste des utilisateurs
        $this->lUsers = $this->users->select('id_user != 1', 'name ASC');
    }

    function _edit_old() {
        // On masque les Head, header et footer originaux plus le debug
        $this->autoFireHeader = false;
        $this->autoFireHead = false;
        $this->autoFireFooter = false;
        $this->autoFireDebug = false;

        // On place le redirect sur la home
        $_SESSION['request_url'] = $this->url;

        // Recuperation des infos de la personne
        $this->users->get($this->params[0], 'id_user');

        // Recuperation de l'arbo pour les select
        $this->lTree = $this->tree->listChilds(0, '-', array(), $this->language);
    }

    function _add_old() {
        // On masque les Head, header et footer originaux plus le debug
        $this->autoFireHeader = false;
        $this->autoFireHead = false;
        $this->autoFireFooter = false;
        $this->autoFireDebug = false;

        // On place le redirect sur la home
        $_SESSION['request_url'] = $this->url;

        // Recuperation de l'arbo pour les select
    }

    
    function _view_cdp() {
        if ($this->params[2] == 'exportDocument') {
            $this->_exportDocument();         
        } 
        
        $this->loadJs('admin/users/dashCdp');
        
        $cdps = $this->loadData('cdps');
        $cdp_etude = $this->loadData('cdp_etude');
        
        $this->cdp = $cdps->select('id_cdp = '.$this->params[1]);
        $this->cdp = $this->cdp[0];
        
        $this->cdpetude = $cdp_etude->findByEtudecdms($this->params[1]);
        $this->cdpetude = $this->cdpetude;
        
        
        $this->document = $cdps->documentEtude();
        
        foreach ($this->cdpetude as $cdme){
            $document = $this->loadData("documents");
            $this->documentThis = $document->selectInfoEtude($cdme['id_etudes']);
        }
        
        // Recherche Etudes
        $this->searchEtudes = $cdps->searchEtudes($_POST['nom'], $this->params[1]);
        // FIN
        
        
        // Calcul Versement Annee en cours
        $this->versementAnneeCours = $this->bdd->run("SELECT SUM(avenant_settings1) FROM `info_documents` WHERE session_id_cdm = '".$this->params[1]."' ");        
        // Calcul Versement Annee civile
        $this->versementAnneeCivil = $this->bdd->run("SELECT SUM(avenant_settings1) FROM `info_documents` WHERE session_id_cdm = '".$this->params[1]."' ");
        
        
        $this->view = ('view_cdp');
    }
    
    
    // Voir ancien CDP
    function _ancien_cdp(){
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/users/anciencdp');
        $this->search = "";
        $this->limit = 20;
        $params = array();
        $page = 1;
        if (count($this->params)) {
            for ($i = 0; $i < count($this->params); $i++) {
                if (isset($this->params[$i])) {
                    $par = explode("=", $this->params[$i]);
                    $params[$par[0]] = urldecode($par[1]);
                }
            }
        }
        $users = $this->loadData("cdps");
        if (isset($params['page']))
            $page = $params['page'];
        $params['page'] = $page;
        $this->offset = ($page - 1) * $this->limit;
        $this->newParams = $params;
        
        
        $this->view = 'anciencdp';
    }
    // FIN
    
    

    function _cdp() {
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        if ($this->params[0] == 'add') {
            $this->_add_cdp();
        } elseif ($this->params[0] == 'edit') {
            $this->_edit_cdp();
        } elseif ($this->params[0] == 'view') {
            $this->_view_cdp();
        } elseif ($this->params[0] == 'anciencdp') {
            $this->_ancien_cdp();
        }
        

        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/users/cdp');
        $this->search = "";
        $this->limit = 20;
        $params = array();
        $page = 1;
        if (count($this->params)) {
            for ($i = 0; $i < count($this->params); $i++) {
                if (isset($this->params[$i])) {
                    $par = explode("=", $this->params[$i]);
                    $params[$par[0]] = urldecode($par[1]);
                }
            }
        }
        $users = $this->loadData("cdps");
        if (isset($params['page']))
            $page = $params['page'];
        $params['page'] = $page;
        $this->offset = ($page - 1) * $this->limit;
        $this->newParams = $params;

        $search = $users->search($params, $this->limit, $this->offset);
        $this->cdps = $search['cdps'];
        $this->countCdps = $search['count'];
        $this->settings->get('Motorise', 'type');
        $this->motorise = explode(";", $this->settings->value);
        $this->settings->get('Cursus', 'type');
        $this->cursus = explode(";", $this->settings->value);                               
        $this->settings->get('annee', 'type');
        $anneesconfig = explode(";", $this->settings->value);                
        $this->annee = array();
        for ($i=$anneesconfig[0]; $i<=$anneesconfig[1]; $i++) {
            array_push($this->annee, $i);
        }        
        
        
        // Récupération de toutes les villes en bdd
        $ville = $this->loadData('ville');
        $this->ville = $ville->select();
        // Fin
        
    }

    function _add_cdp() {
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/users/add_cdp');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->view  = 'add_cdp';
        
        // Ce input n'existe plus à présent
        $this->annee = array();
        for ($i=2000; $i<=2014; $i++) {
            array_push($this->annee, $i);
        }
        
        
        
        // Récupération de toutes les villes en bdd
        $ville = $this->loadData('ville');
        $this->ville = $ville->select();
        // Fin
        
    } 
    
    
    
    
    // Générer password
    function _generer_password(){
        $this->loadJs('admin/users/generer_password');
        $this->view = ('view_cdp');
    }
    
    
    
    

    function _edit_cdp() {
        $this->annee = array();
        for ($i=2000; $i<=2014; $i++) {
            array_push($this->annee, $i);
        }
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/users/add_cdp');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->cdp = $this->loadData('cdps');
        $idCdp = $this->params[1];
        $this->cdp->get($idCdp);      
        
        
        // Récupération de toutes les villes en bdd
        $ville = $this->loadData('ville');
        $this->ville = $ville->select();
        // Fin
        
        
        $this->view = 'edit_cdp';
    }
    function _download(){             
        $file = $this->path."public/default/var/uploads/".$this->params[1]; 
        header ("Content-Disposition: attachment; filename=".$this->params[1]." "); 
        header ("Content-Type: application/octet-stream");
        header ("Content-Length: ".filesize($file));
        readfile($file);
    }
    
    function _exportcsv() {
        $result= array();
        $cdmdata=$this->loadData('cdms');  
        $cdms = $cdmdata->select();        
        foreach($cdms as $cdm){
            $provenance = str_replace(",","-",$cdm['provenance']);                        
            $langues = str_replace(",","-",$cdm['langues']);
            
            $result[] = htmlentities($cdm["id_cdm"]).','.htmlentities($cdm["nom"]).','.htmlentities($cdm["prenom"]).','.
                        htmlentities($cdm['telephone']).','.htmlentities($cdm['email']).','.htmlentities($cdm['banner']).','.htmlentities($cdm["date_naissance"]).','.
                        htmlentities($cdm["adresse"]).','.htmlentities($cdm["ville"]).','.htmlentities($cdm["code_postal"]).','.htmlentities($cdm['motorise']).','.
                        htmlentities($cdm["num_ss"]).','.htmlentities($provenance).','.htmlentities($langues).','.htmlentities($cdm['cursus']).','.
                        htmlentities($cdm['annee']).','.htmlentities($cdm['details']).','.htmlentities($cdm['upload']).','.htmlentities($cdm['role']).','.htmlentities($cdm['status']).','.htmlentities($cdm['archive']).','.htmlentities($cdm['id_cdp']);
        }
        $header="id_cdm".','."nom".','."prenom".','."telephone".','."email".','."banner".','.
                "date_naissance".','."adresse".','."ville".','."code postal".','.
                "motorise".','."num ss".','."provenance".','."langues".','."cursus".','."annee".','."details".','."upload".','."role".','."status".','."archive".','."id_cdp";        
        $pathcsv=$this->_saveExport($result,$header);        
        $this->_downloadExport($pathcsv.".csv");
        
        
    }
    function _saveExport($results,$header) {
        $name=rand(1, 100000);        
        $path = $this->path ."public/default/var/tmp/exportCdm". $name;                       
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
    
    
    
    
    
    
    
    function _exportDocument() {
        $result= array();
        $cdps = $this->loadData('cdps');
        $cdp_etude = $this->loadData('cdp_etude');
        $this->cdpetude = $cdp_etude->findByEtudecdms($this->params[1]);
        $this->document = $cdps->documentEtude();
        
        foreach($this->document as $d){
            foreach ($this->cdpetude as $et){
                if($d['id_etudes'] == $et['id_etudes']){
                    if($d['nature'] == 'Bulletin de versement (BV)'){
                        
                        $result[] = $d["id_document"].','.$d["id_etudes"].','.$d["nature"].','.$d["nom_document"].','.
                        $d['date_sortie'].','.$d['tresorier_validation'].','.$d['nom'].','.$d["prenom"].','.
                        $d["id_type_doc"].','.$d["status"].','.$d["added"].','.$d['updated'];
                        
                    }
                }
            }
        }
        
        $header="id_document".','."id_etudes".','."nature".','."nom_document".','."date_sortie".','."tresorier_validation".','.
                "nom".','."prenom".','."id_type_doc".','."status".','.
                "added".','."updated";        
        $pathcsv=$this->_saveExport($result,$header);        
        $this->_downloadExport($pathcsv.".csv");
        
    }
    
    
    
    
    
    
    
    function _forcerTelechargement(){ 
        $this->autoFireView = false;
        $this->autoFireHeader = false;
        $this->autoFireDebug = false;
        $this->autoFireHead = false;
        $this->autoFireFooter = false;
        
        header('Content-Type: application/octet-stream');
        header('Content-Length: '. $this->params[0]);
        header('Content-disposition: attachment; filename='. $this->params[1]);
        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        readfile(urldecode($this->params[2]));
        
        //exit();
        
        /*******************************************************
        *  Appel de la fonction : exemple => forcerTelechargement('test.pdf', './documents/test.pdf', 10000);
        *******************************************************/
    }
    
    
    
     
}





