<script type="text/javascript">
	$(document).ready(function(){
		$(".tablesorter").tablesorter({headers:{3:{sorter: false}}});	
		<?php
		if($this->nb_lignes != '')
		{
		?>
			$(".tablesorter").tablesorterPager({container: $("#pager"),positionFixed: false,size: <?=$this->nb_lignes?>});		
		<?php
		}
		?>
	});
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
<section class="panel">
    <header class="title-panel cf">
        <h1><span><strong>Liste des paramètres globaux</strong></span></h1>
        <!--a href="<?=$this->lurl?>/settings/add_competence" class="button button-secondary thickbox" id="add-contact-button"> Ajouter une compétence</a-->
        <a href="<?=$this->lurl?>/settings/add" class="button button-secondary thickbox" id="add-contact-button"> Ajouter un paramètre</a>
    </header>
<!--	<h1></h1>
    <div class="btnDroite "><a href="<?=$this->lurl?>/settings/add" class="btn_link thickbox">Ajouter un paramètre</a></div>-->
    <?php
	if(count($this->lSettings) > 0)
	{
	?>
    <div class="content cf">
    	<table class="tablesorter">
        	<thead>
                <tr>
                    <th>Type du paramètre</th>
                    <th>Valeur</th>
                    <th>Template</th>
                    <th>&nbsp;</th>  
                </tr>
           	</thead>
            <tbody>
            <?php
			$i = 1;
			foreach($this->lSettings as $s)
			{
				// Recuperation des infos du template
				$nom = ($this->templates->get($s['id_template'],'id_template')?$this->templates->name:'&nbsp;');
				?>
				<tr<?=($i%2 == 1?'':' class="odd"')?>>
					<td><?=$s['type']?></td>
					<td><?=$s['value']?></td>
					<td><?=$nom?></td>
					<td align="center">
						<?php
						if($s['status'] != 2)
						{
						?>
							<a href="<?=$this->lurl?>/settings/status/<?=$s['id_setting']?>/<?=$s['status']?>" title="<?=($s['status']==1?'Passer hors ligne':'Passer en ligne')?>">
								<img src="<?=$this->surl?>/images/admin/<?=($s['status']==1?'offline':'online')?>.png" alt="<?=($s['status']==1?'Passer hors ligne':'Passer en ligne')?>" />
							</a> 
							<a href="<?=$this->lurl?>/settings/edit/<?=$s['id_setting']?>" class="thickbox">
								<img src="<?=$this->surl?>/images/admin/edit.png" alt="Modifier <?=$s['type']?>" />
							</a>
							<a href="<?=$this->lurl?>/settings/delete/<?=$s['id_setting']?>" title="Supprimer <?=$s['type']?>" onclick="return confirm('Etes vous sur de vouloir supprimer <?=$s['type']?> ?')">
								<img src="<?=$this->surl?>/images/admin/delete.png" alt="Supprimer <?=$s['type']?>" />
							</a>
						<?php
						}
						else
						{
						?>
							<a href="<?=$this->lurl?>/settings/edit/<?=$s['id_setting']?>" class="thickbox">
								<img src="<?=$this->surl?>/images/admin/edit.png" alt="Modifier <?=$s['type']?>" />
							</a>
						<?php
						}
						?>
					</td>
				</tr>   
				<?php
				$i++;
            }
            ?>
            </tbody>
        </table>
        <?php
		if($this->nb_lignes != '')
		{
		?>
			<table>
                <tr>
                    <td id="pager">
                        <img src="<?=$this->surl?>/images/admin/first.png" alt="Première" class="first"/>
                        <img src="<?=$this->surl?>/images/admin/prev.png" alt="Précédente" class="prev"/>
                        <input type="text" class="pagedisplay" />
                        <img src="<?=$this->surl?>/images/admin/next.png" alt="Suivante" class="next"/>
                        <img src="<?=$this->surl?>/images/admin/last.png" alt="Dernière" class="last"/>
                        <select class="pagesize">
                        	<option value="<?=$this->nb_lignes?>" selected="selected"><?=$this->nb_lignes?></option>
                       	</select>
                    </td>
                </tr>
            </table>
		<?php
		}
		?>
	<?php
    }
    else
    {
    ?>
        <p>Il n'y a aucun paramètre pour le moment.</p>
    <?php
    }
    ?>
    </div>
</section>
<?php unset($_SESSION['freeow']); ?>