<?php
class presidentController extends bootstrap {
    var $Command;

    function presidentController(&$command, $config, $app) {
        parent::__construct($command, $config, $app);

        $this->catchAll = true;

        // Controle d'acces � la rubrique
        $this->users->checkAccess('configuration');

        // Activation du menu
        $this->menu_admin = 'president';
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
    }
    
    function _default(){
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $this->loadJs('admin/president/default');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadCss('../styles/admin/jquery.dataTables');
        
        
        if ($this->params[0] == 'anciencdp') {
            $this->_ancien_cdp();
        }
        

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
    
    
    
    function _add_tresorier(){
        
        if(isset($_SESSION['user']['role'])){
            if($_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['role'] == '' ){
                header("Location: ".$this->url.'/home');
            }
        }
        
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/president/add_tresorier');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->view  = 'add_tresorier';
        
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
    
    
    
    
    
    
    
    
    
    
    function _saveExport($results,$header) {
        $name=rand(1, 100000);        
        $path = $this->path ."public/default/var/tmp/exportPresident". $name;                       
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
