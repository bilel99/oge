<?php

class bootstrap extends Controller
{
	var $Command;
	
	function bootstrap(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		// Chargement des datas
		$this->settings = $this->loadData('settings');
		$this->tree_elements = $this->loadData('tree_elements');
		$this->blocs_elements = $this->loadData('blocs_elements');
		$this->tree = $this->loadData('tree',array('url'=>$this->url,'surl'=>$this->surl,'tree_elements'=>$this->tree_elements,'blocs_elements'=>$this->blocs_elements,'upload'=>$this->upload,'spath'=>$this->spath));
		$this->templates = $this->loadData('templates');
		$this->elements = $this->loadData('elements');
		$this->blocs_templates = $this->loadData('blocs_templates');
		$this->blocs = $this->loadData('blocs');
		$this->mails_filer = $this->loadData('mails_filer');
		$this->mails_text = $this->loadData('mails_text');
		$this->ln = $this->loadData('textes');
		$this->produits_elements = $this->loadData('produits_elements');
		$this->produits = $this->loadData('produits',array('url'=>$this->url,'surl'=>$this->surl,'produits_elements'=>$this->produits_elements,'upload'=>$this->upload,'spath'=>$this->spath));
		$this->produits_images = $this->loadData('produits_images');
		$this->produits_details = $this->loadData('produits_details');
		$this->routages = $this->loadData('routages',array('url'=>$this->lurl,'route'=>$this->Config['route_url']));
		$this->nmp = $this->loadData('nmp');	
		$this->nmp_desabo = $this->loadData('nmp_desabo');
		
		// Chargement des librairies
		$this->upload = $this->loadLib('upload');
		$this->ficelle = $this->loadLib('ficelle');
		$this->photos = $this->loadLib('photos',array($this->spath,$this->surl));
		$this->tnmp = $this->loadLib('tnmp',array($this->nmp,$this->nmp_desabo));
		
		// Recuperation de la liste des langue disponibles
		$this->lLangues = $this->Config['multilanguage']['allowed_languages'];
		
		// Formulaire de modification d'un texte de traduction
		if(isset($_POST['form_mod_traduction']))
		{
			foreach($this->lLangues as $key => $lng)
			{
				$values[$key] = $_POST['texte-'.$key];	
			}
			
			$this->ln->updateTextTranslations($_POST['section'],$_POST['nom'],$values);
		}
		
		// Chargement des fichiers CSS
		$this->loadCss('../scripts/default/colorbox/colorbox');
		$this->loadCss('default/izicom');
		
		// Chargement des fichier JS
		$this->loadJs('default/jquery/jquery-1.5.2.min');
		$this->loadJs('default/colorbox/jquery.colorbox-min');
		$this->loadJs('default/main');
		$this->loadJs('default/ajax');
		
		// Mise en tableau de l'url
		$urlParams = explode('/',$_SERVER['REQUEST_URI']);
		
		// On sniff le partenaire
		$this->handlePartenaire($urlParams);
		
		// Recuperation du code Google Webmaster Tools
		$this->settings->get('Google Webmaster Tools','type');
		$this->google_webmaster_tools = $this->settings->value;
		
		// Recuperation du code Google Analytics
		$this->settings->get('Google Analytics','type');
		$this->google_analytics = $this->settings->value;
		
		// Recuperation de la Baseline Title
		$this->settings->get('Baseline Title','type');
		$this->baseline_title = $this->settings->value;
		
		// Recuperation u mail alert 404
		$this->settings->get('404 Mail Alerte','type');
		$this->mail404 = $this->settings->value;
	}
	
	function handlePartenaire($params)
	{
		// Chargement des datas
		$partenaires = $this->loadData('partenaires');
		$promotions = $this->loadData('promotions');
		$partenaires_clics = $this->loadData('partenaires_clics');
		
		// On check les params pour voir si on a un partenaire
		if(count($params) > 0)
		{
			// Variable pour savoir s'il a trouvé un p
			$getta = false;
			
			$i = 0;			
			foreach($params as $p)
			{
				// Si on detecte un p en params
				if($p == 'p')
				{
					// Youpi il a trouvé
					$getta = true;
					
					$indexPart = $i + 1;
					
					// On regarde si on trouve un partenaire
					if($partenaires->get($params[$indexPart],'hash'))
					{
						// On ajoute un clic
						if($partenaires_clics->get(array('id_partenaire'=>$partenaires->id_partenaire,'date'=>date('Y-m-d'))))
						{
							$partenaires_clics->nb_clics = $partenaires_clics->nb_clics + 1;
							$partenaires_clics->update(array('id_partenaire'=>$partenaires->id_partenaire,'date'=>date('Y-m-d')));
						}
						else
						{
							$partenaires_clics->id_partenaire = $partenaires->id_partenaire;
							$partenaires_clics->date = date('Y-m-d');
							$partenaires_clics->nb_clics = 1;
							$partenaires_clics->create(array('id_partenaire'=>$partenaires->id_partenaire,'date'=>date('Y-m-d')));
						}
						
						// On met le partenaire en session
						$_SESSION['partenaire']['id_partenaire'] = $partenaires->id_partenaire;
						
						// On regarde si on a un code promo actif
						if($promotions->get($partenaires->id_code,'id_code'))
						{
							// On ajoute le code en session
							$_SESSION['partenaire']['code_promo'] = $promotions->code;
							$_SESSION['partenaire']['id_promo'] = $promotions->id_code;
						}
						else
						{
							unset($_SESSION['partenaire']['code_promo']);
							unset($_SESSION['partenaire']['id_promo']);
						}
						
						// On enregistre le partenaire en cookie
						setcookie('izicom_partenaire',$partenaires->hash,time() + 3153600,'/');
						
						// On regarde si le dernier param commence par ?
						if(substr($params[count($params)-1],0,1) == '?')
						{
							$gogole = $params[count($params)-1];
						}
						
						// On rebidouille l'url
						$params = array_slice($params,0,count($params)-3);
						$reeurl = implode('/',$params);
						
						// On renvoi
						header('Location:'.$this->url.$reeurl.($gogole!=''?'/'.$gogole:''));
						die;
					}
				}
				
				$i++;
			}
			
			// Si il a rien trouvé on regarde si on a un cookie et pas de session
			if(!isset($_SESSION['partenaire']['id_partenaire']) && isset($_COOKIE['izicom_partenaire']) && !$getta)
			{
				// On regarde si on trouve toujours un partenaire
				if($partenaires->get($_COOKIE['izicom_partenaire'],'hash'))
				{
					// On met le partenaire en session
					$_SESSION['partenaire']['id_partenaire'] = $partenaires->id_partenaire;
				}
			}			
		}
	}
}