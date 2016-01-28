<?php 

class queriesController extends bootstrap
{
	var $Command;
	
	function queriesController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;

		// Controle d'acces � la rubrique
		$this->users->checkAccess('stats');
		
		// Activation du menu
		$this->menu_admin = 'stats';
	}
	
	function _add()
	{
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->lurl;
	}
	
	function _edit()
	{
		// Chargement des datas
		$this->queries = $this->loadData('queries');
		
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->lurl;
		
		// Recuperation des infos de la personne
		$this->queries->get($this->params[0],'id_query');
	}
	
	function _default()
	{
		// Chargement des datas
		$this->queries = $this->loadData('queries');
		
		// Recuperation de la liste des requetes
		$this->lRequetes = $this->queries->select(($this->cms == 'iZinoa'?'cms = "iZinoa" || cms = ""':''),'executed DESC');
				
		// Formulaire edition d'une requete
		if(isset($_POST['form_edit_requete']))
		{
			// Recuperation des infos du requete
			$this->queries->get($this->params[0],'id_query');		
			$this->queries->name = $_POST['name'];
			$this->queries->paging = $_POST['paging'];
			$this->queries->sql = $_POST['sql'];
			$this->queries->update();
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Modification d\'une requ&ecirc;te';
			$_SESSION['freeow']['message'] = 'La requ&ecirc;te a bien &eacute;t&eacute; modifi&eacute;e !';
    		
    		// Renvoi sur l'edition du template
			header('Location:'.$this->lurl.'/queries');
			die;
		}
		
		// Formulaire d'ajout d'une requete
		if(isset($_POST['form_add_requete']))
		{
			$this->queries->name = $_POST['name'];
			$this->queries->paging = $_POST['paging'];
			$this->queries->sql = $_POST['sql'];
			$this->queries->create();
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Ajout d\'une requ&ecirc;te';
			$_SESSION['freeow']['message'] = 'La requ&ecirc;te a bien &eacute;t&eacute; ajout&eacute;e !';
			
			// Renvoi sur la home des blocs
			header('Location:'.$this->lurl.'/queries');
			die;
		}
		
		// Suppression d'une requete
		if(isset($this->params[0]) && $this->params[0] == 'delete')
		{
			$this->queries->delete($this->params[1],'id_query');
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Suppression d\'une requ&ecirc;te';
			$_SESSION['freeow']['message'] = 'La requ&ecirc;te a bien &eacute;t&eacute; supprim&eacute;e !';	
			
			// Renvoi sur la page de gestion
			header('Location:'.$this->lurl.'/queries');
			die;
		}
	}
	
	function _params()
	{
		// Chargement des datas
		$this->queries = $this->loadData('queries');
		
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->lurl;
		
		// Recuperation des infos de la reqete
		$this->queries->get($this->params[0],'id_query');
		preg_match_all("/@[_a-zA-Z1-9]+@/",$this->queries->sql,$this->sqlParams,PREG_SET_ORDER);
		$this->sqlParams = $this->queries->super_unique($this->sqlParams);
	}
	
	function _execute()
	{
		// Chargement des datas
		$this->queries = $this->loadData('queries');
		
		// Recuperation des infos du setting
		$this->queries->get($this->params[0],'id_query');
		
		// Traitement des parametres
		preg_match_all("/@[_a-zA-Z1-9]+@/", $this->queries->sql, $this->sqlParams, PREG_SET_ORDER);
		$this->sqlParams = $this->queries->super_unique($this->sqlParams);
		
		foreach($this->sqlParams as $param)
		{
			$this->queries->sql = str_replace($param[0],$_POST['param_'.str_replace('@','',$param[0])],$this->queries->sql);
		}

		$this->result = $this->queries->run($this->params[0],$this->queries->sql);
	}	
	
	function _excel()
	{
		// Chargement des datas
		$this->queries = $this->loadData('queries');
		
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;

		// Recuperation des infos du settings
		$this->queries->get($this->params[0],'id_query');
		
		// Traitement des parametres		
		preg_match_all("/@[_a-zA-Z1-9]+@/", $this->queries->sql, $this->sqlParams, PREG_SET_ORDER);
		$this->sqlParams = $this->queries->super_unique($this->sqlParams);
		
		foreach($this->sqlParams as $param)
		{
			$this->queries->sql = str_replace($param[0],$_POST['param_'.str_replace('@','',$param[0])],$this->queries->sql);
		}

		$this->result = $this->queries->run($this->params[0],$this->queries->sql);
	}
}