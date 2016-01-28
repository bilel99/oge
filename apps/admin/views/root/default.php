<script type="text/javascript">
	var chart;	
	$(document).ready(function()
	{
		chart = new Highcharts.Chart(
		{
			chart: 
			{
				renderTo: 'caannuel',
				defaultSeriesType: 'spline',
				marginRight: 0,
				marginBottom: 35
			},
			colors: ['#2F86B2','#59AC26','#89A54E','#80699B','#3D96AE','#DB843D','#92A8CD','#A47D7C','#B5CA92'],
			title: 
			{
				text: '',
				x: -20 // center
			},
			xAxis:
			{
				categories: ['Jan','Fév','Mar','Avr','Mai','Juin','Juil','Aout','Sept','Oct','Nov','Déc'],
				title: 
				{
					text: 'Mois',
					style:
					{
						color: '#2F86B2'
					}
				}
			},
			yAxis:
			{
				title:
				{
					text: 'CA (en €)',
					style:
					{
						color: '#2F86B2'
					}
				},
				min: 0,
				plotLines: [
				{
					value: 0,
					width: 1,
					color: '#2F86B2'
				}]
			},
			
			plotOptions:
			{
				column:
				{
					//pointStart: 50
				},
				series:
				{
					cursor: 'pointer',
					marker:
					{
						lineWidth: 1
					}
				}
			},
			legend: {
				 layout: 'vertical',
				 align: 'left',
				 verticalAlign: 'top',
				 x: 0,
				 y: 0,
				 borderWidth: 0
			  },
			series: [
			{
				type: 'spline',
				name: 'CA Total',
				data: [
				<?php
				for($i=1;$i<=12;$i++)
				{
					$i = ($i<10?'0'.$i:$i);
					echo $this->caParmois[$i].($i!=12?',':'');
				}
				?>]
			}
			<?php
			if(count($this->lTypes) > 0)
			{
				foreach($this->lTypes as $part)
				{
					$this->partenaires_types->get($part['id_type']);
				?>
					, 
					{
						name: '<?=$this->partenaires_types->nom?>',
						data: [
						<?php
						for($i=1;$i<=12;$i++)
						{
							$i = ($i<10?'0'.$i:$i);
							echo $this->caParmoisPart[$part['id_type']][$i].($i!=12?',':'');
						}
						?>]
					}
				<?php	
				}
			}
			?>
			  ]
		});
	});
</script>
<div id="contenu">
	<h1>Chiffre d'affaire annuel (<?=date('Y')?>)</h1>
    <div id="caannuel" style="width: 100%; height: 300px;"></div>        
    <br /><br />
    <h1>5 derniers avis en attente de modération <?=($this->nbAvisT>0?'('.$this->nbAvisT.' au total)':'')?></h1>
    <?php
    if(count($this->lAvis) > 0) { ?>
    <table class="tablesorter">
        <thead>
                <tr>
                    <th>Date</th>
                    <th>Produit</th>
                    <th>Nom</th>
                    <th>IP</th>
                    <th>Vote</th>
                    <th>Avis</th>
                    <th>&nbsp;</th>  
                </tr>
            </thead>
            <tbody>
                <?php
			$i = 1;
			foreach($this->lAvis as $a)
			{
				// On recupere les infos du produit
				$this->p = $this->produits->detailsProduit($a['id_produit'],$this->language);
			?>
            	<tr<?=($i%2 == 1?'':' class="odd"')?>>
                	<td><?=$this->dates->formatDate($a['added'],'d/m/Y H:i:s')?></td>
                    <td><?=$this->p['nom']?></td>
                    <td><?=$a['nom'].' '.$a['prenom']?><br/>(<?=$a['email']?>)</td>
                    <td><?=$a['ip']?></td>
                    <td align="center"><?=$a['note']?></td>
                    <td><?=($a['titre'] != ''?$a['titre'].' - ':'').$a['avis']?></td>
                    <td align="center">
                    	<a href="<?=$this->lurl?>/produits/avis/valide/<?=$a['id_avis']?>" title="Valider l'avis">
                        	<img src="<?=$this->surl?>/images/admin/check.png" alt="Valider l'avis" />
                       	</a>
                        <a href="<?=$this->lurl?>/produits/avis/delete/<?=$a['id_avis']?>" title="Supprimer l'avis" onclick="return confirm('Etes vous sur de vouloir supprimer l\'avis ?')">
                        	<img src="<?=$this->surl?>/images/admin/delete.png" alt="Supprimer l'avis" />
                       	</a>
                	</td>
                </tr>   
            <?php	
                $i++;
            }
            ?>
            </tbody>
        </table>
	<?
    }
    else
    {
    ?>
        <p>Il n'y a aucun avis à modéré pour le moment.</p>
    <?
    }
    ?>
    <br /><br />    
    <h1>Top <?=count($this->hitProd)?> Produits</h1>
    <?php
	if(count($this->hitProd) > 0)
	{
	?>
    	<table class="tablesorter">
        	<thead>
                <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Nb Ventes</th>
                    <th>CA (HT)</th>
                </tr>
           	</thead>
            <tbody>
            <?php
			$i = 1;
			foreach($this->hitProd as $p)
			{
			?>
            	<tr<?=($i%2 == 1?'':' class="odd"')?>>
                	<td><?=$p['Reference']?></td>
                    <td><?=$p['Nom']?></td>
                    <td><?=$p['NbVentes']?></td>
                    <td><?=$p['CAht']?></td>
                </tr>   
            <?php	
                $i++;
            }
            ?>
            </tbody>
        </table>
	<?
    }
    else
    {
    ?>
        <p>Il n'y a aucun produit pour le moment.</p>
    <?
    }
    ?>    
    <br /><br />
    <h1>10 dernières commandes</h1>
    <?
	if(count($this->lCommandes) > 0)
	{
	?>
    	<table class="tablesorter">
        	<thead>
                <tr>
                    <th align="center">Date</th>
                    <th align="center">Référence</th>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Livraison</th>
                    <th align="center">Montant</th>
                    <th align="center">Statut</th>
                    <th align="center">&nbsp;</th>  
                </tr>
           	</thead>
            <tbody>
            <?
			$i = 1;
			foreach($this->lCommandes as $cmd)
			{
				// Recuperation des infos clients
				$this->clients->get($cmd['id_client']);
				
				// Eteblissement du statut
				switch($cmd['etat'])
				{
					case 0:
						$etat = 'En attente';
					break;							
					case 1:
						$etat = 'Validée';
					break;
					case 2:
						$etat = 'Expédiée';
					break;
					case 3:
						$etat = 'Annulée';
					break;
				}
			?>
            	<tr<?=($i%2 == 1?'':' class="odd"')?>>
                    <td align="center"><?=$this->dates->formatDate($cmd['date_transaction'],'d/m/Y')?></td>
                    <td align="center"><?=$cmd['id_transaction']?></td>
                    <td><?=$this->clients->civilite?> <?=$this->clients->prenom?> <?=$this->clients->nom?></td>
                    <td><?=$this->clients->email?></td>
                    <td><?=$cmd['cp_liv'].' '.$cmd['ville_liv']?></td>
                    <td align="center"><?=number_format($cmd['montant']/100,2,',',' ')?> €</td>
                    <td align="center"><?=$etat?></td>
                    <td align="center">
                    	<a href="<?=$this->lurl?>/commandes/details/<?=$cmd['id_transaction']?>" class="thickbox">
                        	<img src="<?=$this->surl?>/images/admin/modif.png" alt="Voir le détail de la commande" title="Voir le détail de la commande" />
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
    }
    else
    {
    ?>
        <p>Il n'y a aucune commande pour le moment.</p>
    <?
    }
    ?>
</div>