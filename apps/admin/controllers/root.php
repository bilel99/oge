<?php
class rootController extends bootstrap
{
	var $Command;
	
	function rootController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;	
                
	}
	
	function _login()
	{
		// On masque le header et le footer
		$this->autoFireHead = false;
		$this->autoFireHeader = false;
		$this->autoFireDebug = false;
		$this->autoFireFooter = false;
		
                
		// Formulaire d'envoi d'un nouveau password
		if(isset($_POST['form_new_password']))
		{
			if($this->users->get(trim($_POST['email']),'email'))
			{
				// Generation du nouveau mot de passe
				$this->new_password = $this->ficelle->generatePassword(7);
				$this->users->password = md5($this->new_password);
				$this->users->update();
				
				//***********************************************//
				//*** ENVOI DU MAIL AVEC NEW PASSWORD NON EMT ***//
				//***********************************************//
	
				// Recuperation du modele de mail
				$this->mails_text->get('admin-nouveau-mot-de-passe','lang = "'.$this->language.'" AND type');
				
				// Variables du mailing
				$cms = $this->cms;
				$surl = $this->surl;
				$url = $this->lurl;
				$email = trim($_POST['email']);
				$password = $this->new_password;
				
				// Attribution des données aux variables
				$sujetMail = $this->mails_text->subject;
				eval("\$sujetMail = \"$sujetMail\";");
				
				$texteMail = $this->mails_text->content;
				eval("\$texteMail = \"$texteMail\";");
				
				$exp_name = $this->mails_text->exp_name;
				eval("\$exp_name = \"$exp_name\";");
				
				// Nettoyage de printemps
				$sujetMail = strtr($sujetMail,'ÀÁÂÃÄÅÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝÇçàáâãäåèéêëìíîïòóôõöùúûüýÿÑñ','AAAAAAEEEEIIIIOOOOOUUUUYCcaaaaaaeeeeiiiiooooouuuuyynn');
				$exp_name = strtr($exp_name,'ÀÁÂÃÄÅÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝÇçàáâãäåèéêëìíîïòóôõöùúûüýÿÑñ','AAAAAAEEEEIIIIOOOOOUUUUYCcaaaaaaeeeeiiiiooooouuuuyynn');
				
				// Envoi du mail
				$this->email = $this->loadLib('email',array());
				$this->email->setFrom($this->mails_text->exp_email,$exp_name);
				$this->email->addRecipient(trim($_POST['email']));
				$this->email->addBCCRecipient('j.dehais@equinoa.fr');
				$this->email->setSubject('=?UTF-8?B?'.base64_encode($sujetMail).'?=');
				$this->email->setHTMLBody($texteMail);
				Mailer::send($this->email,$this->mails_filer,$this->mails_text->id_textemail);
				
				// Mise en session du message
				$_SESSION['msgErreur'] = 'newPassword';
				$_SESSION['newPassword'] = 'OK';
				
				// Renvoi sur la page de login
				header('Location:'.$this->lurl.'/login');
				die;
			}
			else
			{
				// Mise en session du message
				$_SESSION['msgErreur'] = 'newPassword';
				$_SESSION['newPassword'] = 'NOK';
				
				header('Location:'.$this->lurl.'/login');
				die;	
			}
		}
	}
	
	function _logout()
	{
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->lurl;
		
		$this->users->handleLogout();
	}
	
	function _sitemap()
	{
		// Controle d'acces à la rubrique
		$this->users->checkAccess('edition');
		
		// Activation du menu
		$this->menu_admin = 'edition';
		
		// Recuperation du sitemap
		$sitemap = $this->tree->getSitemap($this->language,$this->params[0]);
		
		// Mise en session du message
		$_SESSION['freeow']['title'] = 'Sitemap du site';		
		
		// On enregistre le sitemap dans le fichier
		$fichier = $this->path.'public/default/sitemap.xml';
		$handle = fopen($fichier,"w");
		
		// Regarde si le fichier est accessible en écriture
		if(is_writable($fichier))
		{
			// Ecriture echec
			if(fwrite($handle,$sitemap) === FALSE)
			{
				$_SESSION['freeow']['message'] = 'Impossible d\'écrire dans le fichier : '.$fichier;
				exit;
			}
			
			// Ecriture réussie					
			$_SESSION['freeow']['message'] = 'Le sitemap a bien &eacute;t&eacute; cr&eacute;&eacute; !';
			
			fclose($handle);
		}
		else
		{
			$_SESSION['freeow']['message'] = 'Impossible d\'écrire dans le fichier : '.$fichier;
		}
		
		// Renvoi sur la page de gestion
		header('Location:'.$this->lurl.'/home');
		die;
	}
	
	function _indexation()
	{
		// Controle d'acces à la rubrique
		$this->users->checkAccess('edition');
		
		// Activation du menu
		$this->menu_admin = 'edition';
		
		// Chargement de la class de recherche
		$this->se = $this->loadLib('elgoog',array($this->bdd));
		
		// Mise en session du message
		$_SESSION['freeow']['title'] = 'Indexation du site';
		$_SESSION['freeow']['message'] = 'Le site a bien &eacute;t&eacute; index&eacute; !';
		
		// Renvoi sur la page de gestion
		header('Location:'.$this->lurl.'/home');
		die;
	}
	
	function _default()
	{
		// Check de la plateforme
		if($this->cms == 'iZinoa')
		{
			// Renvoi sur la page de gestion de l'arbo
			header('Location:'.$this->lurl.'/home');
			die;
		}
		
		// Controle d'acces à la rubrique
		$this->users->checkAccess('dashboard');
		
		// Activation du menu
		$this->menu_admin = 'dashboard';	
		
		//***********//
		// CA ANNUEL //
		//***********//
		
		// Chargement des fichiers JS
		$this->loadJs('admin/chart/highcharts');
		
		// Chargement du data
		$this->transactions = $this->loadData('transactions');
		$this->partenaires_types = $this->loadData('partenaires_types');
		
		// Recuperation de la liste des type de partenaires
		$this->lTypes = $this->partenaires_types->select('status = 1');
		
		// Recuperation du chiffre d'affaire sur les mois de l'année
		$lCaParMois = $this->transactions->recupCAByMonthForAYear(date('Y'));
		
		// Les CA pour les typrd Partenaires
		foreach($this->lTypes as $part)
		{
			$lCaParMoisPart[$part['id_type']] = $this->transactions->recupCAByMonthForAYearType(date('Y'),$part['id_type']);
		}
		
		for($i=1; $i<=12; $i++)		
		{
			$i = ($i<10?'0'.$i:$i);			
			$this->caParmois[$i] = number_format(($lCaParMois[$i] != ''?$lCaParMois[$i]:0),2,'.','');
			foreach($this->lTypes as $part)
			{
				$this->caParmoisPart[$part['id_type']][$i] = number_format(($lCaParMoisPart[$part['id_type']][$i] != ''?$lCaParMoisPart[$part['id_type']][$i]:0),2,'.','');
			}
		}	
		
		//******//
		// HITS //
		//******//
		
		$this->hitProd = $this->transactions->recupHitProduits(5);
		
		//***************//
		// DERNIERS AVIS //
		//***************//
		
		// Chargement des datas
		$this->produits_avis = $this->loadData('produits_avis');
		$this->produits_votes = $this->loadData('produits_votes');
		$this->produits_elements = $this->loadData('produits_elements');
		$this->produits = $this->loadData('produits',array('url'=>$this->url,'surl'=>$this->surl,'produits_elements'=>$this->produits_elements,'upload'=>$this->upload,'spath'=>$this->spath));
		
		// Validation de l'avis
		if(isset($this->params[0]) && $this->params[0] == 'valide')
		{
			// Recuperation des infos de l'avis
			$this->produits_avis->get($this->params[1],'id_avis');
			$this->produits_avis->status = 1;
			$this->produits_avis->update();
			
			// On enregistre la note
			if($this->produits_avis->note > 0)
			{
				$this->produits_votes->id_produit = $this->produits_avis->id_produit;		
				$this->produits_votes->vote = $this->produits_avis->note;	
				$this->produits_votes->ip = $this->produits_avis->ip;	
				$this->produits_votes->create();
			}
					
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Validation d\'un avis';
			$_SESSION['freeow']['message'] = 'L\'avis a bien &eacute;t&eacute; valid&eacute; !';
			
			// Renvoi sur la page de gestion
			header('Location:'.$this->lurl.'/produits/avis');
			die;
		}
		
		// Suppression de l'avis
		if(isset($this->params[0]) && $this->params[0] == 'delete')
		{
			// Recuperation des infos de l'avis
			$this->produits_avis->delete($this->params[1],'id_avis');
			
			// Mise en session du message
			$_SESSION['freeow']['title'] = 'Suppression d\'un avis';
			$_SESSION['freeow']['message'] = 'L\'avis a bien &eacute;t&eacute; supprim&eacute; !';
			
			// Renvoi sur la page de gestion
			header('Location:'.$this->lurl.'/produits/avis');
			die;
		}
		
		// Recuperation de la liste des avis en attente de moderation
		$this->lAvis = $this->produits_avis->select('status = 0','added DESC LIMIT 5');	
		
		$this->nbAvisT = count($this->produits_avis->select('status = 0'));	
		
		// ******************* //
		// DERNIERES COMMANDES //
		// ******************* //
		
		// Declaration des classes
		$this->clients = $this->loadData('clients');
		
		// Recuperation des commandes en cours de traitement
		$this->lCommandes = $this->transactions->select('etat < 3 AND status = 1','etat ASC,date_transaction DESC LIMIT 10');
	}
    
    function _home()
    {
        $this->users->checkAccess('dashboard');
        $this->loadJs('admin/root/home');
        
        
        // récupération etudes date debut et date fin avec dashboard = 2 pour le calendrier
        $etudes = $this->loadData('etudes');
        $this->etudes = $etudes->select('dashboard = 2');
        
        
        $cdpsEtude = $this->loadData('cdp_etude');
        $this->cdp_etude = $cdpsEtude->findByEtudeGeneric();
        
        $this->cdp_etude_classique = $cdpsEtude->select();
        
        if(isset($_SESSION['cdp_etude_home']['id_cdp'])){
            $this->cdp_etude_session = $cdpsEtude->findByEtudecdms($_SESSION['cdp_etude_home']['id_cdp']);
        }
        
        $this->myetudealways = $cdpsEtude->findByEtudecdms($_SESSION['user']['id_cdp']);
        // FIN
        
        
        
        // Récupération des cdp et cdms
        $cdp = $this->loadData('cdps');
        $this->cdps = $cdp->select();
        
        $cdm = $this->loadData('cdms');
        $this->cdms = $cdm->select();
        // FIN
        
        
        // Récupération des cdm cdp ayant des études
        $cdp_etude = $this->loadData('cdp_etude');
        foreach ($this->cdps as $row){
            $this->cdpetude = $cdp_etude->findByEtudecdms($row['id_cdp']);
        }
        
        
        $cdm_etude = $this->loadData('cdm_etude');
        foreach ($this->cdms as $row){
            $this->cdmetude = $cdm_etude->findByEtudecdm($row['id_cdm']);
        }
        // FIN
        
        
        /* CDPS */
        $this->cdpsAll = $cdp->select();
        /* FIN */
        
        
        /* Récupération des id et calcul de la somme des totalTTCFacture Table info_documents */
        //$document = $this->loadData("documents");
        $this->sum_montant = $this->bdd->run("SELECT * FROM info_documents INNER JOIN `documents` ON info_documents.id_document = documents.id_document WHERE documents.tresorier_validation = 1 GROUP BY id_type_doc ");
        
        //$document->findByEtudeDocComplete()
        
        /* Fin */
        
        
    }
}