<script type="text/javascript">
	$(document).ready(function(){
		$(".tablesorter").tablesorter({headers:{3:{sorter: false}}});	
		<?
		if($this->nb_lignes != '')
		{
		?>
			$(".tablesorter").tablesorterPager({container: $("#pager"),positionFixed: false,size: <?=$this->nb_lignes?>});		
		<?
		}
		?>
	});
	<?
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
	<?
	}
	?>
</script>
<div id="freeow-tr" class="freeow freeow-top-right"></div>
<div id="contenu">
	<ul class="breadcrumbs">
        <li><a href="<?=$this->lurl?>/tree" title="Edition">Edition</a> -</li>
        <li>Gestion des redirections</li>
    </ul>
	<h1>Liste des redirections</h1>
    <div class="btnDroite"><a href="<?=$this->lurl?>/redirections/add" class="btn_link thickbox">Ajouter une redirection</a></div>
    <?
	if(count($this->lRedirections) > 0)
	{
	?>
    	<table class="tablesorter">
        	<thead>
                <tr>
                    <th>Type</th>
                    <th>Origine</th>
                    <th>Destination</th>
                    <th>&nbsp;</th>  
                </tr>
           	</thead>
            <tbody>
            <?
			$i = 1;
			foreach($this->lRedirections as $s)
			{
				?>
				<tr<?=($i%2 == 1?'':' class="odd"')?>>
					<td><?=$s['type']?></td>
					<td><a href="<?=$this->urlfront?>/<?=(count($this->lLangues) > 1?$s['id_langue'].'/':'')?><?=$s['from_slug']?>" target="_blank"><?=$this->urlfront?>/<?=(count($this->lLangues) > 1?$s['id_langue'].'/':'')?><?=$s['from_slug']?></a></td>
                    <td><a href="<?=$this->urlfront?>/<?=(count($this->lLangues) > 1?$s['id_langue'].'/':'')?><?=$s['to_slug']?>" target="_blank"><?=$this->urlfront?>/<?=(count($this->lLangues) > 1?$s['id_langue'].'/':'')?><?=$s['to_slug']?></a></td>
					<td align="center">
						<a href="<?=$this->lurl?>/redirections/status/<?=$s['id_redirection']?>/<?=$s['status']?>" title="<?=($s['status']==1?'Passer hors ligne':'Passer en ligne')?>">
                            <img src="<?=$this->surl?>/images/admin/<?=($s['status']==1?'offline':'online')?>.png" alt="<?=($s['status']==1?'Passer hors ligne':'Passer en ligne')?>" />
                        </a> 
                        <a href="<?=$this->lurl?>/redirections/edit/<?=$s['id_redirection']?>" class="thickbox">
                            <img src="<?=$this->surl?>/images/admin/edit.png" alt="Modifier" />
                        </a>
                        <a href="<?=$this->lurl?>/redirections/delete/<?=$s['id_redirection']?>" title="Supprimer" onclick="return confirm('Etes vous sur de vouloir supprimer la redirection ?')">
                            <img src="<?=$this->surl?>/images/admin/delete.png" alt="Supprimer" />
                        </a>
					</td>
				</tr>   
				<?
				$i++;
            }
            ?>
            </tbody>
        </table>
        <?
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
		<?
		}
		?>
	<?
    }
    else
    {
    ?>
        <p>Il n'y a aucune redirections pour le moment.</p>
    <?
    }
    ?>
</div>
<?php unset($_SESSION['freeow']); ?>