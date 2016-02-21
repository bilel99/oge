<?php

class rootController extends bootstrap
{
	var $Command;
	
	function rootController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;
	}
	
	function _default()
	{
		// Appel de la page home
		$this->setView('../root/home');
	}


	function _contact(){
		// Appel de la page contact
		$this->setView('../root/contact');
	}

	function _home(){
		// récupération etudes date debut et date fin avec dashboard = 2 pour le calendrier
		$etudes = $this->loadData('etudes');
		$allEtudes = $etudes->select();

		$this->r = array();
		// Ce que je veux pour mon calendrier $r[TIMESTAMP][id] = nom_interne
		foreach($allEtudes as $id=>$e){
			$this->r[strtotime($e['date_debut'])][$e['id_etudes']] = $e['nom_interne'];
		}

	}

}