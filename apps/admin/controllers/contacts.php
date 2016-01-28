<?php
class contactsController extends bootstrap{
    
    function contactsController($command,$config,$app){
		parent::__construct($command,$config,$app);

        $this->catchAll = true;
        
		// Controle d'acces � la rubrique
		$this->users->checkAccess('contacts');
		
		// Activation du menu
		$this->menu_admin = 'contacts';
    }
    
    function _default(){
        $this->loadJs('admin/contacts/default');
        $this->loadJs('admin/tablesorter/jquery.tablesorter.pager');
        $this->loadJs('admin/tablesorter/jquery.tablesorter.min');
        
        $this->search  = "";
        $this->limit = $limit = 20;
        $params = array();
        $page = 1;
        if(count($this->params)){
            for($i=0; $i<count($this->params); $i++){
                if(isset($this->params[$i])){
                    $par = explode("=", $this->params[$i]);
                    $params[$par[0]] = urldecode($par[1]);
                }
            }
        }
        $contacts = $this->loadData("contacts");
        if(isset($params['page'])) $page = $params['page'];
        $params['page'] = $page;
        $this->ini = $ini = ($page-1) * $limit;
        $this->newParams = $params;
        
        $params['not_oge_clients_contact_status'] = true;
        $params['not_oge_clients_status'] = true;
        $params['not_contacts_status'] =true;
        
        $search = $contacts->search($params, $ini, $limit);        
        $this->countContacts = $search['count'];        
        $nomsociete=$this->loadData("oge_clients_contacts");                
        foreach($search['query'] as $query =>$val){               
            $client= $nomsociete->searchnomsociete($val['id_contact']);            
            $search['query'][$query]['nom_societe']= $client['nom_societe'];            
        }                                       
        $this->contacts = $search['query'];
        
        
        
    }
    
    function _add(){
       $this->loadJs('admin/contacts/add');
       $this->loadJs('admin/jquery/jquery.validate.min');
       
       
       /* Liste des societe */
       $ogeClients = $this->loadData('oge_clients');
       $this->oge_clients = $ogeClients->select();
       $this->oge_clients = $this->oge_clients;
       /* FIN */
       
       //$this->check = $this->bdd->run("SELECT DISTINCT `nom_societe` FROM `oge_clients` ");
       // Liste distinct aucun doublon
       $this->oge_client_distinct = $ogeClients->selectDistinctSociete();
       $this->oge_client_distinct = $this->oge_client_distinct;
       // Fin
       
    }
    
    function _edit(){
        $this->loadJs('admin/contacts/add');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->contact = $this->loadData('contacts');
        $idContact = $this->params[0];
        $this->contact->get($idContact);
        
        /* Récupération de la societe */
        $oge_clients_contacts = $this->loadData('oge_clients_contacts');
        $this->oge_clients_contacts = $oge_clients_contacts->findByEtude($idContact);
        /* FIN */
        
        /* Liste societe */
        $ogeClients = $this->loadData('oge_clients');
        $this->oge_clients = $ogeClients->select();
        $this->oge_clients = $this->oge_clients;
        /* FIN */
        
        //$this->check = $this->bdd->run("SELECT DISTINCT `nom_societe` FROM `oge_clients` ");
       // Liste distinct aucun doublon
       $this->oge_client_distinct = $ogeClients->selectDistinctSociete();
       $this->oge_client_distinct = $this->oge_client_distinct;
       // Fin
    }    
    
    function _default_alt(){
        $this->loadJs('admin/jquery/jquery.dataTables');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadJs('admin/contacts/default');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->sector = $this->loadData('sectors')->select();
        
        $this->search  = "";
        $this->limit = $limit = 20;
        $params = array();
        $page = 1;
        if(count($this->params)){
            for($i=0; $i<count($this->params); $i++){
                if(isset($this->params[$i])){
                    $par = explode("=", $this->params[$i]);
                    $params[$par[0]] = html_entity_decode($par[1]);
                }
            }
        }
        $client = $this->loadData("oge_clients");
        if(isset($params['page'])) $page = $params['page'];
        $params['page'] = $page;
        $this->ini = $ini = ($page-1) * $limit;
        $this->newParams = $params;
        
        $search = $client->search($params, $ini, $limit);
        $this->countClients = $search['count'][0][0];
        $this->clients = $search['query'];
    }
    
    
    
    
    
    
    function _view(){        
        $this->loadJs('admin/clients/view');
        $this->loadJs('admin/jquery/jquery.validate.min');
        $this->loadCss('../styles/admin/jquery.dataTables');
        $this->contact = $this->loadData('contacts');
        $idContact = $this->params[0];
        $this->contact->get($idContact);
        $this->memos = $this->loadData("memos")->findbyidtarget($this->params[0], 'contacts');         
    }
    
    
    
    
    
    function _deletememo() {
        $memo = $this->loadData("memos");
        $memo->get($this->params[1]);
        if ($memo->target == 'contacts') {
            $memo->delete();
        }
        $_SESSION['smokey'] = "delete";
        // Renvoi sur la liste des utilisateurs
        header('Location:' . $this->lurl . '/contacts/view/' . $this->params[0]);
        die;
    }
    
    
}


