<?php 
class redirectionsController extends bootstrap
{
	var $Command;
	
	function redirectionsController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;
	}
	
	function _default()
	{
		// Controle d'acces à la rubrique
		$this->users->checkAccess('edition');
		
		// Activation du menu
		$this->menu_admin = 'edition';
		
		// Chargement des datas
		$this->redirections = $this->loadData('redirections');
		
		// Formulaire d'ajout d'un redirections
		if(isset($_POST['addRedir']))
		{
			$this->redirections->id_langue = $_POST['id_langue'];
			$this->redirections->from_slug = $_POST['from_slug'];
			$this->redirections->to_slug = $_POST['to_slug'];
			$this->redirections->type = $_POST['type'];
			$this->redirections->status = $_POST['status'];
			$this->redirections->create();
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Ajout d\'une redirection';
			$_SESSION['freeow']['message'] = 'La redirection a bien &eacute;t&eacute;e ajout&eacute;e !';
			
			// Renvoi sur la liste des redirections
			header('Location:'.$this->lurl.'/redirections');
			die;
		}
		
		// Formulaire de modification d'un redirections
		if(isset($_POST['editRedir']))
		{
			// Recuperation des infos du redirections
			$this->redirections->get($this->params[0],'id_redirection');
		
			$this->redirections->id_langue = $_POST['id_langue'];
			$this->redirections->from_slug = $_POST['from_slug'];
			$this->redirections->to_slug = $_POST['to_slug'];
			$this->redirections->type = $_POST['type'];
			$this->redirections->status = $_POST['status'];
			$this->redirections->update();
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Modification d\'une redirection';
			$_SESSION['freeow']['message'] = 'La redirection a bien &eacute;t&eacute;e modifi&eacute;e !';
			
			// Renvoi sur la liste des redirections
			header('Location:'.$this->lurl.'/redirections');
			die;
		}
		
		// Suppression d'un redirections
		if(isset($this->params[0]) && $this->params[0] == 'delete')
		{
			// Delete du redirections
			$this->redirections->delete($this->params[1],'id_redirection');
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Suppression d\'une redirection';
			$_SESSION['freeow']['message'] = 'La redirection a bien &eacute;t&eacute;e supprim&eacute;e !';
			
			// Renvoi sur la page de gestion
			header('Location:'.$this->lurl.'/redirections');
			die;
		}
		
		// Modification du status d'un redirections
		if(isset($this->params[0]) && $this->params[0] == 'status')
		{
			$this->redirections->get($this->params[1],'id_redirection');
			$this->redirections->status = ($this->params[2]==1?0:1);
			$this->redirections->update();
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Statut d\'une redirection';
			$_SESSION['freeow']['message'] = 'Le statut a bien &eacute;t&eacute; modifi&eacute; !';
			
			// Renvoi sur la page de gestion
			header('Location:'.$this->lurl.'/redirections');
			die;
		}
		
		// Recuperation de la liste des redirections
		$this->lRedirections = $this->redirections->select('','updated DESC');
	}
	
	function _edit()
	{
		// Controle d'acces à la rubrique
		$this->users->checkAccess('edition');
		
		// Activation du menu
		$this->menu_admin = 'edition';
		
		// Chargement des datas
		$this->redirections = $this->loadData('redirections');
		
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->url;
		
		// Recuperation des infos de la personne
		$this->redirections->get($this->params[0],'id_redirection');
	}
	
	function _add()
	{
		// Controle d'acces à la rubrique
		$this->users->checkAccess('edition');
		
		// Activation du menu
		$this->menu_admin = 'edition';
		
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;		
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->url;
	}
}