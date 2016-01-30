<?php

class bootstrap extends Controller
{
	var $Command;
	
	function bootstrap($command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
                
		// Mise en session de l'url demandée pour un retour si deconnecté sauf pour la fonction login du controller root
		if($this->current_function != 'login') { $_SESSION['request_url'] = $_SERVER['REQUEST_URI']; }
                //var_dump($_SESSION['user']); die;
		
		// Chargements des librairies
		$this->dates = $this->loadLib('dates');
		$this->ficelle = $this->loadLib('ficelle');
		$this->upload = $this->loadLib('upload');
		$this->photos = $this->loadLib('photos',array($this->spath,$this->surl));
				
		// Chargements des datas
		$this->ln = $this->loadData('textes');
		$this->settings = $this->loadData('settings');
		$this->tree_elements = $this->loadData('tree_elements');
		$this->blocs_elements = $this->loadData('blocs_elements');
		$this->tree = $this->loadData('tree',array('url'=>$this->lurl,'front'=>$this->Config['url'][$this->Config['env']]['default'],'surl'=>$this->surl,'tree_elements'=>$this->tree_elements,'blocs_elements'=>$this->blocs_elements,'upload'=>$this->upload,'spath'=>$this->spath,'path'=>$this->path));
		$this->users = $this->loadData('users',array('config'=>$this->Config,'url'=>$this->lurl));
                $this->cdps = $this->loadData('cdps',array('config'=>$this->Config,'url'=>$this->lurl));
		$this->users_zones = $this->loadData('users_zones');
                $this->cdps_zones = $this->loadData('cdps_zones');
		$this->routages = $this->loadData('routages',array('url'=>$this->lurl));
		
		// Chargements des datas pour la gestion des emailings
		$this->mails_filer = $this->loadData('mails_filer');
		$this->mails_text = $this->loadData('mails_text');
		$this->nmp = $this->loadData('nmp');
		
		// Recuperation des variables NMP
		$this->settings->get('NMP Server API','type');
		$this->serveur_api = $this->settings->value;
		
		$this->settings->get('NMP Key','type');
		$this->key_api = $this->settings->value;
		
		$this->settings->get('NMP Login','type');
		$this->login_api = $this->settings->value;
		
		$this->settings->get('NMP Password','type');
		$this->pwd_api = $this->settings->value;
		
		$this->settings->get('NMP Mail','type');
		$this->mail_api = $this->settings->value;
		
		$this->settings->get('NMP From Mail','type');
		$this->frommail_api = $this->settings->value;
		
		$this->settings->get('NMP ID Clonage','type');
		$this->id_clone_nmp = $this->settings->value;
		
		// On recupere le formulaire de connexion s'il est passé
		$this->users->handleLogin('connect','login','password');
                
                // Mise à jour de session à chaque changement
                if(isset($_SESSION['user']['role'])){
                    $cdp = $this->loadData("cdps");
                    $selectCdp = $cdp->select('`id_cdp` = '.$_SESSION['user']['id_cdp']);
                    $_SESSION['user'] = $selectCdp[0];
                }
                
                
                
                $this->lng['competences'] = $this->ln->selectFront('competences', $this->language);
                
                
		
		// Chargement des fichiers JS
        $this->loadJs('admin/jquery/jquery-1.10.2.min');
        $this->loadJs('admin/modernizr');
		$this->loadJs('admin/jquery/jquery.checkbox.radio');
        $this->loadJs('admin/jquery/jquery.select.replace');
        $this->loadJs('admin/jquery/jquery.cookie');
        $this->loadJs('admin/jquery/jquery.json');
        $this->loadJs('admin/jquery/jquery-ui-1.10.4.custom.min');
                
		// JQUERY UI
		$this->loadJs('admin/jquery/jquery-migrate-1.2.1');
		// FIN
                
		$this->loadJs('admin/freeow/jquery.freeow.min');
		$this->loadJs('admin/colorbox/jquery.colorbox-min');
		$this->loadJs('admin/treeview/jquery.treeview');
		$this->loadJs('admin/treeview/jquery.cookie');
		$this->loadJs('admin/treeview/tree');
		$this->loadJs('admin/tablesorter/jquery.tablesorter.min');
		$this->loadJs('admin/tablesorter/jquery.tablesorter.pager');
		$this->loadJs('admin/datepicker/jquery-ui-1.7.2.custom.min');
		$this->loadJs('admin/datepicker/ui.datepicker-fr');
		$this->loadJs('admin/ajax');
		$this->loadJs('admin/main');
                
                
                
                
		$this->loadJs('admin/functions');
		
		// Chargement des fichiers CSS
		$this->loadCss('../scripts/admin/freeow/freeow');
		$this->loadCss('../scripts/admin/colorbox/colorbox');
		$this->loadCss('../scripts/admin/treeview/jquery.treeview');
		$this->loadCss('../scripts/admin/tablesorter/style');
	    $this->loadCss('admin/jquery-ui-1.7.2.custom');
        $this->loadCss('admin/main');
		$this->loadCss('admin/style');
		$this->loadCss('admin/global');
                

		// SWEET ALERT
		$this->loadJs('admin/jquery/sweetalert.min');
		$this->loadCss('admin/sweetalert');
		// FIN

		
		// Recuperation du code Google Analytics
		$this->settings->get('Google Analytics','type');
		$this->google_analytics = $this->settings->value;
		
		// Recuperation du mail du compte Google Analytics
		$this->settings->get('Google Mail','type');
		$this->google_mail = $this->settings->value;
		
		// Recuperation du password cu compte Google Analytics
		$this->settings->get('Google Password','type');
		$this->google_password = $this->settings->value;
		
		// Recuperation du paging des tableaux
		$this->settings->get('Paging Tableaux','type');
		$this->nb_lignes = $this->settings->value;
		
		// Recuperation de l'url du front
		$this->urlfront = $this->Config['url'][$this->Config['env']]['default'];
		
		// Recuperation de la liste des langue disponibles
		$this->lLangues = $this->Config['multilanguage']['allowed_languages'];
		
		// Recuperation de la langue par defaut
		$array = array_keys($this->Config['multilanguage']['allowed_languages']);
		$this->dLanguage = $array[0];
		
                
                
                
		// Si user connecté recuperation de la liste des zones autorisée pour affichage du menu
		if(isset($_SESSION['user']['id_user']))
		{
			$this->lZonesHeader = $this->users_zones->selectZonesUser($_SESSION['user']['id_user']);
		}else if(isset($_SESSION['user']['id_cdp']))
                {
			$this->lZonesHeader = $this->cdps_zones->selectZonesUser($_SESSION['user']['id_cdp']);
		}
                
                
                $this->documentTypes = $this->loadData('type_document')->select();
                
                
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
	function array_column2(array $array, $columnKey, $indexKey = null)
	{
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
        
        
        
}