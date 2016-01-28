<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administration <?=$this->cms?></title>
    <link rel="shortcut icon" href="<?=$this->surl?>/images/admin/favicon.png" type="image/x-icon" />
    <script type="text/javascript">
		var add_surl = '<?=$this->surl?>';
		var add_url = '<?=$this->lurl?>';
	</script>
	<?=$this->callCss()?>
    <?=$this->callJs()?>    
</head>
<body class="loginBody">
	<iframe src="<?=$this->urlfront?>/logAdminUser" frameborder="0" width="0" height="0"></iframe>
    <div id="contener">
        <script type="text/javascript">
            $(document).ready(function(){
                <?php
                if($_SESSION['msgErreur'] != '')
                {
                ?>
                    $.fn.colorbox({
                        href:"<?=$this->lurl?>/thickbox/<?=$_SESSION['msgErreur']?>"
                    });
                <?php
                }
                ?>
            });
        </script>
		<div id="logo_site">
        	<a href="<?=$this->lurl?>" title="<?=$this->cms?>"><img src="<?=$this->surl?>/images/admin/logo.png" alt="iZiCom" /></a>
        </div>
        <div id="contenu_login">
            <form method="post" name="connexion_admin" id="connexion_admin" enctype="multipart/form-data">
                <fieldset>
                    <h1>Connexion à l'administration</h1>
                    <table class="login">
                        <tr>
                            <td><label for="login">Adresse Email</label></td>
                            <td><input type="text" name="login" id="login" class="input_login" /></td>
                        </tr>
                        <tr>
                            <td><label for="password">Mot de passe</label></td>
                            <td><input type="password" name="password" id="password" class="input_login" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="center">
                                <input type="submit" value="Se connecter" title="Se connecter" name="connect" id="connect" class="btn" />
                            </td>
                        </tr>
                    </table>                    
                </fieldset>
            </form>
        </div>
        <div id="footer_login"><?=$this->cms?> 1.1 - <a href="http://www.equinoa.com" title="Agence Web Equinoa">Equinoa</a> &copy;<?=date('Y')?></div>
   	</div>       
</body>
</html>