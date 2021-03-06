<script type="text/javascript">
	<?php
	if(isset($_SESSION['freeow']))
	{
	?>
		$(document).ready(function(){
			var title, message, opts, container;
			title = "<?=$_SESSION['freeow']['title']?>";
			message = "<?=$_SESSION['freeow']['message']?>";
			opts = {};
			opts.classes = ['smokey'];
			$('#freeow-tr').freeow(title, message, opts);
		});
	<?php
	}
	?>
</script>
<div id="freeow-tr" class="freeow freeow-top-right"></div>
<div id="contenu">
	<ul class="breadcrumbs">
        <li><a href="<?=$this->lurl?>/settings" title="Configuration">Configuration</a> -</li>
        <li>Traductions</li>
    </ul>
	<h1>Liste des traductions</h1>
    <div class="btnDroite">
    	<a href="<?=$this->lurl?>/traductions/add" class="btn_link thickbox">Ajouter une traduction</a>&nbsp;&nbsp;
        <a href="<?=$this->lurl?>/traductions/export" class="btn_link">Export</a>&nbsp;&nbsp;
        <a href="<?=$this->lurl?>/traductions/import" class="btn_link thickbox">Import</a>
  	</div>
	<?php
	if(count($this->lSections) > 0)
	{
	?>
    	<table class="large">
            <tr>
                <th>
                	<label for="section">Section : </label>
                    <select name="section" id="section" onchange="loadNomTexte(this.value)" class="select">
                    	<option value="">Sélectionner</option>
                        <?php
                        foreach($this->lSections as $section)
                        {
                        ?>
                            <option value="<?=$section[0]?>"<?=($this->params[0] == $section[0]?' selected="selected"':'')?>><?=$section[0]?> (<?=$section[1]?>)</option>
                        <?php
                        }
                        ?>
                    </select>
                </th>
                <th>
                	<div id="listeNomTraduction">
                    	<?php
						if(isset($this->params[0]) && $this->params[0] != '')
						{
						?>
                            <label for="nom">Nom : </label>
                            <select name="nom" id="nom" onchange="loadTradTexte(this.value,document.getElementById('section').value)" class="select">
                                <option value="">Sélectionner</option>
                                <?php
                                foreach($this->lNoms as $nom)
                                {
                                ?>
                                    <option value="<?=$nom[0]?>"<?=($this->params[1] == $nom[0]?' selected="selected"':'')?>><?=$nom[0]?></option>
                                <?php
                                }
                                ?>
                            </select>
                       	<?php
						}
						?>
                    </div>
               	</th>
                <td>&nbsp;</td>
                <th><a href="<?=$this->lurl?>/traductions/add/<?=((isset($this->params[0]) && $this->params[0] != '')?$this->params[0]:'')?>" id="btnAjouterTraduction" class="btn_link thickbox"<?=((isset($this->params[0]) && $this->params[0] != '')?' style="display:block;"':' style="display:none;"')?>>Ajouter une traduction pour la section</a></th>  
            </tr>	
        </table>
        <div id="elementTraduction">
        	<?php
			if(isset($this->params[1]) && $this->params[1] != '')
			{
			?>
                <form method="post" name="mod_traduction" id="mod_traduction" enctype="multipart/form-data" action="<?=$this->lurl?>/traductions">
                    <input type="hidden" name="section" id="section" value="<?=$this->params[0]?>" />
                    <input type="hidden" name="nom" id="nom" value="<?=$this->params[1]?>" />
                    <table class="lng">
                        <?php
                        foreach($this->lLangues as $key => $lng)
                        {
                        ?>
                            <tr>
                                <td>
                                    <img src="<?=$this->surl?>/images/admin/langues/<?=$key?>.png" alt="<?=$lng?>" />
                                </td>
                                <td>
                                    <textarea class="textarea_lng" style="background-image: url('<?=$this->surl?>/images/admin/langues/flag_<?=$key?>.png'); background-position:center; background-repeat:no-repeat;" name="texte-<?=$key?>" id="texte-<?=$key?>"><?=$this->lTranslations[$key]?></textarea>
                                </td>
                            <tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <th colspan="2">
                                <input type="hidden" name="form_mod_traduction" id="form_mod_traduction" value="0" />
                                <input type="submit" value="Modifier" name="send_traduction" id="send_traduction" class="btn" />
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" value="Supprimer" name="del_traduction" id="del_traduction" class="btnRouge" onClick="if(confirm('Êtes vous certain ?')){ document.getElementById('form_mod_traduction').value = 1; } else { return false; }" />
                            </th>
                        </tr>
                    </table>
                </form>
          	<?php
			}
			?>
        </div>
	<?php
    }
    else
    {
    ?>
        <p>Il n'y a aucune section pour le moment.</p>
    <?php
    }
    ?>
</div>
<?php unset($_SESSION['freeow']); ?>