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
		// Activation du cache
		$this->fireCache();
		
		// On regarde si le slug passé est celui d'un produit
		if(isset($this->params[0]) && $this->params[0] != '' && $this->produits->isProduct($this->params[0],$this->language,$id_produit))
		{
			// On recupere les infos du produit
			$this->produits->get($id_produit,'id_produit');
			$this->p = $this->produits->detailsProduit($id_produit,$this->language);
			
			// Recuperation du template de la page produit
			$this->templates->get($this->p['id_template'],'id_template');
			$this->current_template = $this->templates->name.' | '.$this->templates->slug.'.php';
			
			// Recuperation du contenu de la page produit
			$contenu = $this->produits_elements->select('id_produit = "'.$this->p['id_produit'].'" AND id_langue = "'.$this->language.'"');
			foreach($contenu as $elt)
			{
				$this->elements->get($elt['id_element']);
				$this->contentP[$this->elements->slug] = $elt['value'];	
				$this->complementP[$this->elements->slug] = $elt['complement'];
			}
			
			// Declaration des metas pour l'arbo
			$this->meta_title = ($this->p['meta_title']!=''?$this->p['meta_title']:$this->p['nom']);
			$this->meta_description = $this->p['meta_description'];
			$this->meta_keywords = $this->p['meta_keywords'];
			
			// Recuperation de la categorie en url
			if(isset($this->params[1]) && $this->params[1] != '')
			{
				// Recuperation des infos de la categorie par le slug
				$this->tree->get(array('slug'=>$this->params[1],'id_langue'=>$this->language));
				
				// Creation du breadcrumb
				$this->breadCrumb = $this->tree->getBreadCrumb($this->tree->id_tree,$this->language);
			}
			// Si on a pas de categorie en url on prend la principale et on recupere les infos de la categorie par le slug
			elseif($this->tree->get(array('slug'=>$this->p['slug_categorie'],'id_langue'=>$this->language)))
			{
				// Creation du breadcrumb
				$this->breadCrumb = $this->tree->getBreadCrumb($this->tree->id_tree,$this->language);
			}
			// Sinon pas de breadcrumb ni de catégorie
			else
			{
				$this->breadCrumb = array();
			}
			
			// Recuperation du contenu de la categorie
			if(isset($this->tree->id_tree) && $this->tree->id_tree != '')
			{
				$contenu = $this->tree_elements->select('id_tree = "'.$this->tree->id_tree.'" AND id_langue = "'.$this->language.'"');
				foreach($contenu as $elt)
				{
					$this->elements->get($elt['id_element']);
					$this->content[$this->elements->slug] = $elt['value'];	
					$this->complement[$this->elements->slug] = $elt['complement'];
				}
			}
			
			// Recuperation du details principal pour ce produit
			$this->produits_details->getFirstDetail($this->p['id_produit']);
			
			// On fixe la quantite originale
			$this->quantite = 1;
			
			// Recuperation de la liste des images pour le produit
			$this->lImages = $this->produits_images->select('id_produit = "'.$this->p['id_produit'].'"','ordre ASC');
			
			// Recuperation de la liste des produits complementaires
			$this->lProduits = $this->produits->listeProduitsComp($this->p['id_produit'],$this->language,'','ordre ASC');
			
			// Recuperations des differents details du produit
			$this->lDetails = $this->produits_details->select('id_produit = "'.$this->p['id_produit'].'" AND status = 1 AND stock > 0','ordre ASC');			
			
			// Chargemement du tempalte
			if($this->templates->slug == '')
			{
				header("HTTP/1.0 404 Not Found");
				$this->setView('../root/404');
				
				// Mail
				if($this->mail404 != '')
				{
					// Variables du mailing
					$sujetMail = '404 Report - No Template';
					$texteMail = '<strong>404 URL</strong> : '.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'<br><strong>Referred by</strong> : '.$_SERVER['HTTP_REFERER'].'<br><strong>User Agent</strong> : '.$_SERVER['HTTP_USER_AGENT'].'<br>';
					
					// Envoi du mail
					$this->email = $this->loadLib('email',array());
					$this->email->setFrom('admin@equinoa.fr','iZinoa Report');
					$this->email->addRecipient(trim($this->mail404));
					$this->email->setSubject($sujetMail);
					$this->email->setHTMLBody($texteMail);
					Mailer::send($this->email);
				}
			}
			else
			{
				$this->setView('../templates/'.$this->templates->slug,true);
			}
		}
		else
		{	
			// On check pour les tracker google defonce pas la home
			if(substr($this->params[0],0,1) == '?')
			{
				$paramSlug = '';
			}
			else
			{
				$paramSlug = $this->params[0];
			}
			
			// Recuperation des infos de la page
			if($this->tree->get(array('slug'=>$paramSlug,'id_langue'=>$this->language)))
			{					
				if($this->tree->prive == 1)
				{
					$this->etatLogin = true;
					
					// Declarations des datas 
					$this->clients = $this->loadData('clients');	
					
					// On regarde si on a un client dans la salle
					if(!$this->clients->checkAccess())
					{
						$this->etatLogin = false;
					}
				}
			
				// Modification du title,menu_title et template dans la previsualisation de la page
				if(isset($_POST['preview']) && $_POST['preview'] == md5($this->url.'/'.$this->tree->slug))
				{
					$this->tree->id_template = $_POST['id_template_'.$this->language];
					$this->tree->title = $_POST['title_'.$this->language];
					$this->tree->menu_title = $_POST['menu_title_'.$this->language];
				}
			
				// Declaration des metas pour l'arbo
				$this->meta_title = $this->tree->meta_title;
				$this->meta_description = $this->tree->meta_description;
				$this->meta_keywords = $this->tree->meta_keywords;				
				
				// Recuperation du template de la page
				$this->templates->get($this->tree->id_template);
				$this->current_template = $this->templates->name.' | '.$this->templates->slug;
				
				if($this->templates->affichage == 1)
				{
					// On renvoi vers le premier parent qui a un affichage à 0
					header('Location:'.$this->lurl.'/'.$this->tree->getSlug($this->tree->getFirstUnlock($this->tree->id_tree,$this->language),$this->language));
					die;
				}
							
				// Dans le cas ou on a pas de template cet a dire pas de page derriere le lien on prend le premier enfant
				if($this->tree->id_template == 0)
				{
					$this->subpages = $this->tree->select('id_parent = "'.$this->tree->id_tree.'" AND id_langue = "'.$this->language.'"','ordre ASC');
					
					if(count($this->subpages) > 0)
					{
						header('Location:'.$this->lurl.'/'.$this->subpages[0]['slug']);
						die;	
					}
				}
							
				// Recuperation du contenu de la page
				$contenu = $this->tree_elements->select('id_tree = "'.$this->tree->id_tree.'" AND id_langue = "'.$this->language.'"');
				foreach($contenu as $elt)
				{
					$this->elements->get($elt['id_element']);
					$this->content[$this->elements->slug] = $elt['value'];
					$this->complement[$this->elements->slug] = $elt['complement'];
				}
				
				// Recuperation du contenu de la page dans la previsualisation de la page
				if(isset($_POST['preview']) && $_POST['preview'] == md5($this->url.'/'.$this->tree->slug))
				{
					// Remplissage des éléments
					foreach($this->content as $key => $value)
					{
						$this->content[$key] = stripslashes($_POST[$key.'_'.$this->language]);
					}
				}
				
				// Recuperation des positions des blocs
				$this->lBlocsPosition = $this->bdd->getEnum('blocs_templates','position');
				
				// Recuperation des blocs pour chaque position
				foreach($this->lBlocsPosition as $pos)
				{
					$this->lBlocs[$pos] = $this->blocs_templates->selectBlocs('position = "'.$pos.'" AND id_template = '.$this->tree->id_template,'ordre ASC');
					
					// Recuperation du contenu de chaque bloc
					foreach($this->lBlocs[$pos] as $bloc)
					{
						$lElements = $this->blocs_elements->select('id_bloc = '.$bloc['id_bloc'].' AND id_langue = "'.$this->language.'"');
						foreach($lElements as $b_elt)
						{
							$this->elements->get($b_elt['id_element']);
							$this->bloc_content[$this->elements->slug] = $b_elt['value'];	
							$this->bloc_complement[$this->elements->slug] = $b_elt['complement'];	
						}			
					}				
				}
				
				// Recuperation du contenu des enfants
				$this->childs = $this->tree->select('id_parent = "'.$this->tree->id_tree.'" AND status = 1 AND id_langue = "'.$this->language.'"','ordre ASC');
				foreach($this->childs as $child)
				{
					$contenu = $this->tree_elements->select('id_tree = "'.$child['id_tree'].'" AND id_langue = "'.$this->language.'"');
					
					foreach($contenu as $elt)
					{
						$this->elements->get($elt['id_element']);
						$this->childsContent[$child['id_tree']][$this->elements->slug] = $elt['value'];
						$this->childsComplement[$child['id_tree']][$this->elements->slug] = $elt['complement'];
					}
				}
			   
				// Creation du breadcrumb
				$this->breadCrumb = $this->tree->getBreadCrumb($this->tree->id_tree,$this->language);
				
				// Chargemement du tempalte
				if($this->templates->slug == '')
				{
					header("HTTP/1.0 404 Not Found");
					$this->setView('../root/404');
					
					// Mail
					if($this->mail404 != '')
					{
						// Variables du mailing
						$sujetMail = '404 Report - No Template';
						$texteMail = '<strong>404 URL</strong> : '.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'<br><strong>Referred by</strong> : '.$_SERVER['HTTP_REFERER'].'<br><strong>User Agent</strong> : '.$_SERVER['HTTP_USER_AGENT'].'<br>';
						
						// Envoi du mail
						$this->email = $this->loadLib('email',array());
						$this->email->setFrom('admin@equinoa.fr','iZinoa Report');
						$this->email->addRecipient(trim($this->mail404));
						$this->email->setSubject($sujetMail);
						$this->email->setHTMLBody($texteMail);
						Mailer::send($this->email);
					}	
				}				
				elseif($this->tree->status == 0 && !isset($_SESSION['user']))
				{
					header("HTTP/1.0 404 Not Found");
					$this->setView('../root/404');	
					
					// Mail
					if($this->mail404 != '')
					{
						// Variables du mailing
						$sujetMail = '404 Report - Offline Page';
						$texteMail = '<strong>404 URL</strong> : '.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'<br><strong>Referred by</strong> : '.$_SERVER['HTTP_REFERER'].'<br><strong>User Agent</strong> : '.$_SERVER['HTTP_USER_AGENT'].'<br>';
						
						// Envoi du mail
						$this->email = $this->loadLib('email',array());
						$this->email->setFrom('admin@equinoa.fr','iZinoa Report');
						$this->email->addRecipient(trim($this->mail404));
						$this->email->setSubject($sujetMail);
						$this->email->setHTMLBody($texteMail);
						Mailer::send($this->email);
					}
				}
				else
				{
					$this->setView('../templates/'.$this->templates->slug,true);
				}
			}
			else
			{
				// On regarde si on a une redirection sur ce slug
				$this->redirections = $this->loadData('redirections');
				
				if($this->redirections->get($paramSlug,'id_langue = "'.$this->language.'" AND from_slug'))
				{
					if($this->redirections->status == 1)
					{
						header('location:'.$this->lurl.'/'.$this->redirections->to_slug,true,$this->redirections->type);
						die;	
					}
				}
				else
				{
					header("HTTP/1.0 404 Not Found");
					$this->setView('../root/404');	
					
					// Mail
					if($this->mail404 != '')
					{
						// Variables du mailing
						$sujetMail = '404 Report - Page Not Found';
						$texteMail = '<strong>404 URL</strong> : '.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'<br><strong>Referred by</strong> : '.$_SERVER['HTTP_REFERER'].'<br><strong>User Agent</strong> : '.$_SERVER['HTTP_USER_AGENT'].'<br>';
						
						// Envoi du mail
						$this->email = $this->loadLib('email',array());
						$this->email->setFrom('admin@equinoa.fr','iZinoa Report');
						$this->email->addRecipient(trim($this->mail404));
						$this->email->setSubject($sujetMail);
						$this->email->setHTMLBody($texteMail);
						Mailer::send($this->email);
					}
				}
			}	
		}
	}
	
	function _logAdminUser()
	{
		$this->autoFireHeader = false;
		$this->autoFireDebug = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		
		$this->users = $this->loadData('users');
		
		if($this->params[0] != '' && $this->params[1] != '')
		{		
			$this->users->handleLoginFront($this->params[0],$this->params[1]);
		}
		else
		{
			$this->users->handleLogoutFront();
		}
	}
}