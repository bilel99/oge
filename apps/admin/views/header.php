<script type="text/javascript">
	$(document).ready(function(){
		$(".searchBox").colorbox({
			onComplete:function(){
				$.datepicker.setDefaults($.extend({showMonthAfterYear: false}, $.datepicker.regional['fr']));
				$("#datepik_from").datepicker({showOn: 'both', buttonImage: '<?=$this->surl?>/images/admin/calendar.gif', buttonImageOnly: true,changeMonth: true,changeYear: true,yearRange: '<?=(date('Y')-10)?>:<?=(date('Y')+10)?>'});
				$("#datepik_to").datepicker({showOn: 'both', buttonImage: '<?=$this->surl?>/images/admin/calendar.gif', buttonImageOnly: true,changeMonth: true,changeYear: true,yearRange: '<?=(date('Y')-10)?>:<?=(date('Y')+10)?>'});
			}
		});
	});
</script>
<div class="wrapper">
		<header class="site-header">
			<div class="shell cf">
				<nav class="nav-user right">
					<p><strong>Bonjour <?=$_SESSION['user']['firstname']==''?$_SESSION['user']['nom'].' '.$_SESSION['user']['prenom']:$_SESSION['user']['firstname'].' '.$_SESSION['user']['name']?></strong></p>
					<ul>
                                            <?php if(isset($_SESSION['user']['id_user'])){ ?>
						<li><a href="<?= $this->url ?>/utilisateurs/edit_profil/<?= $_SESSION['user']['id_user'] ?>">Editer son profil</a></li>
                                            <?php }else if(isset($_SESSION['user']['id_cdp'])){ ?>
                                                <li><a href="<?= $this->url ?>/utilisateurs/edit_profil/<?= $_SESSION['user']['id_cdp'] ?>">Editer son profil</a></li>
                                            <?php } ?>
                                                
                                                <li class="logout"><a href="<?= $this->url ?>/logout">Déconnexion</a></li>
					</ul>
				</nav><!-- /.nav-user -->

				<a href="<?= $this->url.'/home' ?>" class="logo notext">Junior ESSEC Conseil</a>
			</div><!-- /.shell -->
		</header><!-- /.site-header -->

		<nav class="nav">
			<div class="shell">
                            <ul style="margin-left: -75px;" id="general-nav">
                    <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['id_user']){ ?>
                        <li class="<?= $this->menu_admin == "configuration" ? "current" : null ?>" id="config-nav">
                            <a title="Configuration" >Configuration</a>
                            <ul class="submenu">
                                <li><a href="<?=$this->lurl?>/settings" title="Settings"> Settings</a></li>
                                <li><a href="<?=$this->lurl?>/traductions" title="Traductions">Traductions</a></li>
                            </ul>
                        </li>
                        
                        <!-- <li id="config-nav">
                            <a href="<?=$this->lurl?>/traductions" title="Traductions"<?=($this->menu_admin == 'traductions'?' class="active"':'')?>>Traductions</a>
                        </li>-->
                        
                    <?php } ?>
                            
                            
                            
                    
                    <li class="<?= $this->menu_admin == "users" ? "current" : null ?>">
                        <a>Users</a>
                        <ul class="submenu">
                            <li><a href="<?= $this->url ?>/users/cdm">CDM</a></li>
                            <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['id_user']){ ?>
                                <li><a href="<?= $this->url ?>/users/cdp">CDP</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    
                    <li class="<?= $this->menu_admin == "clients" ? "current" : null ?>">
                        <a href="<?= $this->url ?>/clients">Clients</a>
                    </li>
                    <li class="<?= $this->menu_admin == "contacts" ? "current" : null ?>">
                        <a href="<?= $this->url ?>/contacts/">Contacts</a>
                    </li>
                    <li class="<?= $this->menu_admin == "etudes" ? "current" : null ?>">
                        <a href="<?= $this->url ?>/etudes/">éTudes</a>
                    </li>
                    
                    <!-- Seulement accessible par les trésorier -->
                    <?php if($_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['id_user']){ ?>
                        <li class="<?= $this->menu_admin == "tresorier" ? "current" : null ?>">
                            <a href="<?= $this->url ?>/tresorier/">trésorier</a>
                        </li>
                    <?php } ?>
                    <!-- FIN -->
                    
                    
                    <!-- Seulement accessible au PRESIDENT -->
                    <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['id_user']){ ?>
                        <li class="<?= $this->menu_admin == "president" ? "current" : null ?>">
                            <a href="<?= $this->url ?>/president/">président</a>
                        </li>
                    <?php } ?>
                    <!-- FIN -->
                    
                    <li class="<?= $this->menu_admin == "document" ? "current" : null ?>">
                        <a onclick="return false;">Document</a>
                        <ul class="submenu document">
                            <?php foreach($this->documentTypes as $k => $dt) {?>
                                <li class="<?= $k%2 ? "odd-submenu" : "" ?>">
                                    <a href="<?= $this->url ?>/etudes/typeDocument/<?= $dt['id_type_doc'] ?>"><?= $dt['name'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
				</ul>
			</div><!-- /.shell -->
		</nav><!-- /.nav -->

        <div class="main shell">

















<!--<div id="header">
	<div class="logo_header">
    	<a href="<?=$this->lurl?>" title="Administration du site"><img src="<?=$this->surl?>/images/admin/logo_<?=$this->cms?>.png" alt="<?=$this->cms?>" /></a>
    </div>
    <div class="titre_header">Administration de votre site</div>
    <div class="bloc_info_header">
    	<?=$_SESSION['user']['firstname'].' '.$_SESSION['user']['name']?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=date('d/m/Y')?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=$this->lurl?>/logout" title="Se deconnecter"><strong>Se deconnecter</strong></a><br /><br />
        <a href="<?=$this->urlfront?>" title="Retourner sur le site" target="_blank"><strong>Retourner sur le site</strong></a>
    </div>
</div>
<div id="navigation">
	<ul id="menu_deroulant">
    	<?
		if(in_array('dashboard',$this->lZonesHeader) && $this->cms == 'iZicom')
		{
		?>
    		<li><a href="<?=$this->lurl?>" title="Dashboard"<?=($this->menu_admin == 'dashboard'?' class="active"':'')?>>Dashboard</a></li>
      	<?
		}
		if(in_array('edition',$this->lZonesHeader))
		{
		?>
        	<li>
            	<a href="<?=$this->lurl?>/tree" title="Edition"<?=($this->menu_admin == 'edition'?' class="active"':'')?>>Edition</a>
                <ul class="sous_menu">
                	<li><a href="<?=$this->lurl?>/tree" title="Arborescence">Arborescence</a></li>
                    <li><a href="<?=$this->lurl?>/blocs" title="Blocs">Blocs</a></li>
                    <li><a href="<?=$this->lurl?>/menus" title="Menus">Menus</a></li>
                    <li><a href="<?=$this->lurl?>/templates" title="Templates">Templates</a></li>
                    <li><a href="<?=$this->lurl?>/indexation" title="Indexer le Site">Indexer le Site</a></li>
                    <li><a href="<?=$this->lurl?>/sitemap/<?=$this->cms?>" title="Créer le Sitemap">Créer le Sitemap</a></li>
                    <li><a href="<?=$this->lurl?>/settings/cache" title="Vider le cache">Vider le cache</a></li>
                    <li><a href="<?=$this->lurl?>/settings/crud" title="Vider le CRUD">Vider le CRUD</a></li>
                    <li><a href="<?=$this->lurl?>/redirections" title="Gestion des redirections">Gestion des redirections</a></li>                    
                </ul>
          	</li>
        <?
		}
		if(in_array('configuration',$this->lZonesHeader))
		{
		?>
        	<li>
            	<a href="<?=$this->lurl?>/settings" title="Configuration"<?=($this->menu_admin == 'configuration'?' class="active"':'')?>>Configuration</a>
                <ul class="sous_menu">
                	<li><a href="<?=$this->lurl?>/users" title="Administrateurs">Administrateurs</a></li>
                    <li><a href="<?=$this->lurl?>/zones" title="Droits Administrateurs">Droits Administrateurs</a></li>
                    <li><a href="<?=$this->lurl?>/settings" title="Paramètres">Paramètres</a></li>
                    <li><a href="<?=$this->lurl?>/mails" title="Mails">Mails</a></li>
                    <li><a href="<?=$this->lurl?>/mails/logs" title="Historique des Mails">Historique des Mails</a></li>
                    <li><a href="<?=$this->lurl?>/traductions" title="Traductions"<?=($this->menu_admin == 'traductions'?' class="active"':'')?>>Traductions</a></li>
					<li><a href="<?=$this->lurl?>/routages" title="Routage">Routage</a></li>          
                </ul>
          	</li>
        <?
		}
		if(in_array('stats',$this->lZonesHeader))
		{
		?>
        	<li>
            	<a href="<?=$this->lurl?>/queries" title="Stats"<?=($this->menu_admin == 'stats'?' class="active"':'')?>>Stats</a>
                <ul class="sous_menu">
                	<li><a href="<?=$this->lurl?>/queries" title="Requêtes">Requêtes</a></li>
                    <?			
                    if($this->google_analytics != '' && $this->google_mail != '' && $this->google_password != '')
                    {
                    ?>
                        <li><a href="<?=$this->lurl?>/stats" title="Google Analytics">Google Analytics</a></li>
                    <?
                    }
                    ?>
                </ul>
          	</li>
        <?
		}
		if(in_array('boutique',$this->lZonesHeader) && $this->cms == 'iZicom')
		{
		?>
        	<li>
            	<a href="<?=$this->lurl?>/produits" title="Boutique"<?=($this->menu_admin == 'boutique'?' class="active"':'')?>>Boutique</a>
                <ul class="sous_menu">
                	<li><a href="<?=$this->lurl?>/produits" title="Produits">Produits</a></li>
                	<li><a href="<?=$this->lurl?>/temproduits" title="Templates Produits">Templates Produits</a></li>
                    <li><a href="<?=$this->lurl?>/promotions" title="Promotions">Promotions</a></li>
                    <li><a href="<?=$this->lurl?>/fdp" title="Frais de port">Frais de port</a></li>
                    <li><a href="<?=$this->lurl?>/fdp/types" title="Types de FDP">Types de FDP</a></li>
                    <li><a href="<?=$this->lurl?>/brands" title="Gestion des marques">Gestion des marques</a></li>
                    <li><a href="<?=$this->lurl?>/partenaires" title="Campagnes">Campagnes</a></li>
                    <li><a href="<?=$this->lurl?>/partenaires/types" title="Types de campagnes">Types de campagnes</a></li>
                    <li><a href="<?=$this->lurl?>/produits/avis" title="Avis des produits">Avis des produits</a></li>
                </ul>
          	</li>
        <?
		}		
		if(in_array('clients',$this->lZonesHeader) && $this->cms == 'iZicom')
		{
		?>
        	<li>
            	<a href="<?=$this->lurl?>/clients" title="Clients"<?=($this->menu_admin == 'clients'?' class="active"':'')?>>Clients</a>
                <ul class="sous_menu">
                	<li><a href="<?=$this->lurl?>/clients" title="Gestion des clients">Gestion des clients</a></li>
                    <li><a href="<?=$this->lurl?>/clients/groupes" title="Groupes de clients">Groupes de clients</a></li>
                    <li><a href="<?=$this->lurl?>/clients/newsletter" title="Newsletter">Newsletter</a></li>
                </ul>
          	</li>
        <?
		}
		if(in_array('commandes',$this->lZonesHeader) && $this->cms == 'iZicom')
		{
		?>
        	<li class="last">
            	<a href="<?=$this->lurl?>/commandes" title="Commandes"<?=($this->menu_admin == 'commandes'?' class="active"':'')?>>Commandes</a>
                <ul class="sous_menu">
                	<li><a href="<?=$this->lurl?>/commandes" title="Commandes reçues">Commandes reçues</a></li>
                    <li><a href="<?=$this->lurl?>/commandes/boxSearch" class="searchBox">Rechercher commandes</a></li>
                </ul>
          	</li>
        <?
		}
		if(in_array('ventes',$this->lZonesHeader) && $this->cms == 'iZicom')
		{
		?>
        	<li class="last"><a href="<?=$this->lurl?>/ventes" title="Ventes"<?=($this->menu_admin == 'ventes'?' class="active"':'')?>>Ventes</a></li>
        <?
		}
		?>
    </ul>
</div>-->