<?php
class cronController extends bootstrap
{
	var $Command;
	
	function cronController(&$command,$config)
	{
		parent::__construct($command,$config,'default');
		
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireView = false;
		$this->autoFireDebug = false;
		
		// Securisation des acces
		if(isset($_SERVER['REMOTE_ADDR']) && !in_array($_SERVER['REMOTE_ADDR'],$this->Config['ip_admin'][$this->Config['env']]))
		{
			die;
		}
	}
	
	//********************//
	//*** A LA DEMANDE ***//
	//********************//
	
	function _default()
	{
		die;
	}
	
	//*******************//
	//*** AUTOMATIQUE ***//
	//*******************//
	
	//*************************************//
	//*** ENVOI DE LA QUEUE DE MAIL NMP ***//
	//*************************************//
	function _queueNMP()
	{
		$this->tnmp->processQueue();					
		die;
	}
	
	// Les taches executées toutes les minutes
	function _minute()
	{	
		die;
	}	
	
	// Les taches executées tous les jours
	function _jour()
	{	
		//**************************//
		//*** INDEXATION DU SITE ***//
		//**************************//		
		if($this->params[0] == 'recherche')
		{		
			// Chargement de la librairie
			$this->se = $this->loadLib('elgoog',array($this->bdd));
			
			// On index
			$this->se->index();
		}
		
		die;
	}
	
	// Fonctions Annexes
	function ftp_is_dir($connexion,$dir)
	{
		if(ftp_chdir($connexion,$dir))
		{
			ftp_chdir($connexion, '..');
			return true;
		}
		else
		{
			return false;
		}
	}
}
