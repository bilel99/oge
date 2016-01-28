<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$this->language?>" lang="<?=$this->language?>">
<head>
	<?php
	if($this->google_webmaster_tools != '')
	{
	?>    
		<meta name="google-site-verification" content="<?=$this->google_webmaster_tools?>" />
   	<?php
	}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$this->meta_title?><?=($this->baseline_title!=''?' - '.$this->baseline_title:'')?></title>
	<meta name="description" content="<?=$this->meta_description?>" />
    <meta name="keywords" content="<?=$this->meta_keywords?>" />
    <?=($this->tree->id_tree != '' && $this->tree->indexation == 0?'<meta name="robots" content="noindex,nofollow" />':'')?>
    <link rel="shortcut icon" href="<?=$this->surl?>/images/default/favicon.png" type="image/x-icon" />
    <script type="text/javascript">
		var add_surl = '<?=$this->surl?>';
		var add_url = '<?=$this->lurl?>';
	</script>
	<?php $this->callCss();?>
    <?php $this->callJs();?>	
</head>
<body>
<?php
// Bouton pour les traductions
if(isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] != '')
{
	// Si les modifications sont actives on desactive les liens
	if($_SESSION['modification'] == 1)
	{
	?>
		<script type="text/javascript">
			$(document).ready(function() { 
				$('a').click(function() {
					 return false; 
				});			 
			});
		</script>
    <?php
	}
	?>
	<div class="blocAdminIzI">
    	<a onclick="activeModificationsTraduction(<?=($_SESSION['modification'] == 1?0:1)?>,'<?=$_SERVER['REQUEST_URI']?>');" class="boutonAdm" title="<?=($_SESSION['modification'] == 1?'Masquer les traductions':'Modifier les traductions')?>">
        	<img src="<?=$this->surl?>/images/admin/traductions_<?=($_SESSION['modification'] == 1?'on':'off')?>.png" alt="<?=($_SESSION['modification'] == 1?'Masquer les traductions':'Modifier les traductions')?>" />
      	</a>
  	</div>
<?php
}
?>
<?php
if($this->google_analytics != '')
{
?>    
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?=$this->google_analytics?>']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
<?php
}
?>