<?php

class utilisateursController extends bootstrap {

    var $Command;

    function utilisateursController(&$command, $config, $app) {
        parent::__construct($command, $config, $app);

        $this->catchAll = true;

        // Controle d'acces � la rubrique
        $this->users->checkAccess('configuration');

        // Activation du menu
        $this->menu_admin = 'configuration';
    }

    function _default() {
    }

    function _edit_profil() {
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/utilisateurs/edit_utilisateurs');
        $this->loadCss('../styles/admin/jquery.dataTables');
        
        if(isset($_SESSION['user']['id_user'])){
            $this->users = $this->loadData('users');
            $idUser = $this->params[0];
            $this->users->get($idUser);
        }else if($_SESSION['user']['id_cdp']){
            $this->cdps = $this->loadData('cdps');
            $idUser = $this->params[0];
            $this->cdps->get($idUser);
        }
        
        /* Récupération président */
        $cdp = $this->loadData('cdps');
        $this->cdps = $cdp->select();
        
        
        $this->view = 'edit_utilisateurs';
    }

     
}
