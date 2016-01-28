<?php
class ajaxController extends bootstrap
{	
	var $Command;
	
	function ajaxController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->lurl;
		
		$this->autoFireHeader = false;
		$this->autoFireDebug = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
	}
	
	/* Modification de la modifcation des traductions à la volée */
	function _activeModificationsTraduction()
	{
		// On desactive la vue qui sert à rien
		$this->autoFireView = false;
		
		// On renseigne la session avec l'etat demandé
		$_SESSION['modification'] = $this->params[0];
	}
}