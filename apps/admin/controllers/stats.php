<?php

class statsController extends bootstrap
{
	var $Command;
	
	function statsController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;

		// Controle d'acces ŕ la rubrique
		$this->users->checkAccess('stats');
		
		// Activation du menu
		$this->menu_admin = 'stats';
	}
	
	function _default()
	{
		// Chargement de la lib google
		$this->ga = $this->loadLib('gapi',array($this->google_mail,$this->google_password,(isset($_SESSION['ga_auth_token'])?$_SESSION['ga_auth_token']:null)));
		
		// Mise en session de la connexion GA
		$_SESSION['ga_auth_token'] = $this->ga->getAuthToken();
		
		// Recuperation de l'ID
		$this->ga->requestAccountData();
		
		foreach($this->ga->getResults() as $result)
		{
			$this->id_profile = $result->getProfileId();
		}
		
		// Traitement des dates du formulaire
		if(isset($_POST['next']))
		{
			$this->mois = intval($_POST['mois']);
			$this->annee = intval($_POST['annee']);
			
			$this->mois++;
			
			if($this->mois > 12)
			{
				$this->mois = 1;
				$this->annee++;
			}
			
			$this->deb_jour = 1;
			$this->deb_mois = $this->fin_mois = $this->mois;
			$this->deb_annee = $this->fin_annee = $this->annee;
			$this->fin_jour = $this->dates->nb_jour_dans_mois($this->mois, $this->annee);
			
			if($this->deb_jour < 10) { $this->deb_jour = '0'.$this->deb_jour; }
			if($this->deb_mois < 10) { $this->deb_mois = '0'.$this->deb_mois; }
			if($this->fin_jour < 10) { $this->fin_jour = '0'.$this->fin_jour; }
			if($this->fin_mois < 10) { $this->fin_mois = '0'.$this->fin_mois; }
		}		
		elseif(isset($_POST['prev']))
		{
			$this->mois = intval($_POST['mois']);
			$this->annee = intval($_POST['annee']);
			
			$this->mois--;
			
			if($this->mois < 1)
			{
				$this->mois = 12;
				$this->annee--;
			}
			
			$this->deb_jour = 1;
			$this->deb_mois = $this->fin_mois = $this->mois;
			$this->deb_annee = $this->fin_annee = $this->annee;
			$this->fin_jour = $this->dates->nb_jour_dans_mois($this->mois, $this->annee);
			
			if($this->deb_jour < 10) { $this->deb_jour = '0'.$this->deb_jour; }
			if($this->deb_mois < 10) { $this->deb_mois = '0'.$this->deb_mois; }
			if($this->fin_jour < 10) { $this->fin_jour = '0'.$this->fin_jour; }
			if($this->fin_mois < 10) { $this->fin_mois = '0'.$this->fin_mois; }
		}		
		elseif(isset($_POST['voir']))
		{
			$this->mois = intval($_POST['mois']);
			$this->annee = intval($_POST['annee']);
			
			$this->deb_jour = 1;
			$this->deb_mois = $this->fin_mois = $this->mois;
			$this->deb_annee = $this->fin_annee = $this->annee;
			$this->fin_jour = $this->dates->nb_jour_dans_mois($this->mois, $this->annee);
			
			if($this->deb_jour < 10) { $this->deb_jour = '0'.$this->deb_jour; }
			if($this->deb_mois < 10) { $this->deb_mois = '0'.$this->deb_mois; }
			if($this->fin_jour < 10) { $this->fin_jour = '0'.$this->fin_jour; }
			if($this->fin_mois < 10) { $this->fin_mois = '0'.$this->fin_mois; }
		}		
		elseif(isset($_POST['intervalle']))
		{
			$this->deb_jour = $_POST['du-jour'];
			$this->deb_mois = $_POST['du-mois'];
			$this->deb_annee = $_POST['du-annee'];
			$this->fin_jour = $_POST['au-jour'];
			$this->fin_mois = $_POST['au-mois'];
			$this->fin_annee = $_POST['au-annee'];
			
			$this->mois = $this->deb_mois;
			$this->annee = $this->deb_annee;
			
			if($this->deb_jour < 10) { $this->deb_jour = '0'.$this->deb_jour; }
			if($this->deb_mois < 10) { $this->deb_mois = '0'.$this->deb_mois; }
			if($this->fin_jour < 10) { $this->fin_jour = '0'.$this->fin_jour; }
			if($this->fin_mois < 10) { $this->fin_mois = '0'.$this->fin_mois; }
		}
		else
		{		
			// Attribution jour,mois,année par defaut
			$this->deb_jour = 1;
			$this->deb_mois = $this->fin_mois = date('m');
			$this->deb_annee = $this->fin_annee = date('Y');
			$this->fin_jour = $this->dates->nb_jour_dans_mois(date('m'), date('Y'));
			
			$_POST['du-jour'] = $this->deb_jour;
			$_POST['du-mois'] = $this->deb_mois;
			$_POST['du-annee'] = $this->deb_annee;
			$_POST['au-jour'] = $this->fin_jour;
			$_POST['au-mois'] = $this->fin_mois;
			$_POST['au-annee'] = $this->fin_annee;
			
			$this->mois = $this->deb_mois;
			$this->annee = $this->deb_annee;
			
			if($this->deb_jour < 10) { $this->deb_jour = '0'.$this->deb_jour; }
			if($this->fin_jour < 10) { $this->fin_jour = '0'.$this->fin_jour; }
		}
		
		// Recuperation du nombre de jours
		$this->nb_jours = $this->dates->intervalleJours($this->deb_jour,$this->deb_mois,$this->deb_annee,$this->fin_jour,$this->fin_mois,$this->fin_annee);
		
		if($this->nb_jours == 0)
		{
			$this->deb_jour = 1;
			$this->deb_mois = $this->fin_mois = date('m');
			$this->deb_annee = $this->fin_annee = date('Y');
			$this->fin_jour = $this->dates->nb_jour_dans_mois(date('m'), date('Y'));

			$_POST['du-jour'] = $this->deb_jour;
			$_POST['du-mois'] = $this->deb_mois;
			$_POST['du-annee'] = $this->deb_annee;
			$_POST['au-jour'] = $this->fin_jour;
			$_POST['au-mois'] = $this->fin_mois;
			$_POST['au-annee'] = $this->fin_annee;
			
			$this->mois = $this->deb_mois;
			$this->annee = $this->deb_annee;
			
			if($this->deb_jour < 10) { $this->deb_jour = '0'.$this->deb_jour; }
			if($this->fin_jour < 10) { $this->fin_jour = '0'.$this->fin_jour; }
			
			$this->nb_jours = $this->dates->intervalleJours($this->deb_jour,$this->deb_mois,$this->deb_annee,$this->fin_jour,$this->fin_mois,$this->fin_annee);
		}
		
		// Recupearation d'un rapport GA
		$this->ga->requestReportData($this->id_profile,array('visitCount'),array('pageviews','visits','newVisits'),null,null,$this->deb_annee.'-'.$this->deb_mois.'-'.$this->deb_jour,$this->fin_annee.'-'.$this->fin_mois.'-'.$this->fin_jour);
	}
}