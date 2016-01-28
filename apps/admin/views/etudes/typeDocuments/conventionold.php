<page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr>
            <td style="width: 100%;" align="center" >
                <h1>
                    <u><?=$this->lng['doc-convention']['01-convention']?> $num_convention</u>
                </h1>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['02-disposition1']?></u>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>,</strong> <br /> <?=$this->lng['doc-convention']['03-disposition2']?> <?= $this->etude["num_rcs"] ?>, <br /> <?=$this->lng['doc-convention']['04-disposition3']?> <?= $this->etude ["adresse"]?> <?= $this->etude["code_postal"] ?> <?= $this->etude["ville"] ?> <br /> <?=$this->lng['doc-convention']['05-disposition4']?> <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>, <br /> <?=$this->lng['doc-convention']['06-disposition5']?> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>,</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['07-dune-part']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['08-et']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><?=$this->lng['doc-commun']['junior-essec']?></strong>, <?=$this->lng['doc-convention']['09-disposition6']?> <?= $this->etude["siret"] ?><?=$this->lng['doc-convention']['10-code-naf']?><?= $this->etude["id_sector"] ?><?=$this->lng['doc-convention']['11-num-urssaf']?> $num_urssaf<?=$this->lng['doc-convention']['11-adresse-essec']?> <br /> <?=$this->lng['doc-convention']['13-disposition7']?> <?=$this->lng['doc-commun']['president']?>, <br /> <?=$this->lng['doc-convention']['14-disposition8']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong>,</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['15-dautre-part']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['16-disposition9']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <?=$this->lng['doc-convention']['17-disposition10']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <?=$this->lng['doc-convention']['18-disposition11']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['19-disposition12']?> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> <?=$this->lng['doc-convention']['20-disposition13']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <?=$this->lng['doc-convention']['21-disposition14']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['22-disposition15']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['23-article1']?></u>

                     <?=$this->lng['doc-convention']['24-nom-article1']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['25-disposition1-article1']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <?=$this->lng['doc-convention']['26-disposition2-article1']?> <?= $this->etude["je"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['27-disposition3-article1']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['28-article2']?></u>
                     <?=$this->lng['doc-convention']['29-nom-article2']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['30-disposition1-article2']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <?=$this->lng['doc-convention']['31-disposition2-article2']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong><?=$this->lng['doc-convention']['32-disposition3-article2']?> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> <?=$this->lng['doc-convention']['33-disposition4-article2']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['34-article3']?></u>
                    <?=$this->lng['doc-convention']['35-nom-article3']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> <?=$this->lng['doc-convention']['36-disposition1-article3']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <?=$this->lng['doc-convention']['37-disposition2-article3']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['38-disposition3-article3']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['39-disposition4-article3']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['40-article4']?></u>
                     <?=$this->lng['doc-convention']['41-nom-article4']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['42-disposition1-article4']?> 
                    <?=$this->lng['doc-commun']['junior-essec']?> 
                    <?=$this->lng['doc-convention']['43-disposition2-article4']?>
                    <?= $this->etude["budget_fsi"] ?> 
                    <?=$this->lng['doc-convention']['44-hors-taxe']?> 
                    (<?= $this->etude["descriptif"] ?> 
                    <?=$this->lng['doc-convention']['44-hors-taxe']?> ) 
                    <?=$this->lng['doc-convention']['45-disposition5-article4']?>
                    <?= $this->etude["je"] ?> ($duree_etude_texte) 
                    <?=$this->lng['doc-convention']['46-disposition6-article4']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['47-disposition7-article4']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['48-disposition8-article4']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['49-article5']?></u>
                    <?=$this->lng['doc-convention']['50-nom-article5']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['51-disposition1-article5']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['52-disposition2-article5']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['53-article6']?></u>
                     <?=$this->lng['doc-convention']['54-nom-article6']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['55-disposition1-article6']?> 
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> 
                    <?=$this->lng['doc-convention']['56-disposition2-article6']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['57-disposition3-article6']?> $duree_prestation 
                    <?=$this->lng['doc-convention']['58-disposition4-article6']?> $num_premiere-semaine 
                    <?=$this->lng['doc-convention']['59-disposition5-article6']?> $num_derniere-semaine.
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['60-article7']?></u>
                     <?=$this->lng['doc-convention']['61-nom-article7']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['62-disposition1-article7']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['63-disposition2-article7']?> 
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> 
                    <?=$this->lng['doc-convention']['64-disposition3-article7']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['65-disposition4-article7']?> 
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong>
                    <?=$this->lng['doc-convention']['66-disposition5-article7']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['67-article8']?></u>
                     <?=$this->lng['doc-convention']['68-nom-article8']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['69-disposition1-article8']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['70-disposition2-article8']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['71-article9']?></u>
                     <?=$this->lng['doc-convention']['72-nom-article9']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['73-disposition1-article9']?></p>
            </td>
        </tr>
        <tr>
            <td>
               <p>
                    <?=$this->lng['doc-convention']['74-disposition2-article9']?> 
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> 
                    <?=$this->lng['doc-convention']['75-disposition3-article9']?>
               </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['76-article10']?></u>
                     <?=$this->lng['doc-convention']['77-nom-article10']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['78-disposition1-article10']?> 
                    <br /> 
                    <?=$this->lng['doc-convention']['79-disposition2-article10']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['80-article11']?></u>
                     <?=$this->lng['doc-convention']['81-nom-article11']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p> 
                    <?=$this->lng['doc-convention']['82-disposition1-article11']?> 
                    <?=$this->lng['doc-commun']['junior-essec']?> 
                    <?=$this->lng['doc-convention']['83-disposition2-article11']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['84-disposition3-article11']?>
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> 
                    <?=$this->lng['doc-convention']['85-disposition4-article11']?> 
                    <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> 
                    <?=$this->lng['doc-convention']['86-disposition5-article11']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong>
                    <?=$this->lng['doc-convention']['08-et']?> 
                    <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>
                    <?=$this->lng['doc-convention']['87-disposition6-article11']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['88-article12']?></u>
                    <?=$this->lng['doc-convention']['89-nom-article12']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['90-disposition1-article12']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-convention']['91-disposition2-article12']?> 
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong>.
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <u><?=$this->lng['doc-convention']['92-article13']?></u>
                     <?=$this->lng['doc-convention']['93-nom-article13']?>
                </p>             
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-convention']['94-disposition-article13']?></p>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
        <tr>
            <td><?=$this->lng['doc-convention']['95-fait-a-cergy-le']?> $fait_a_date, <br /> <?=$this->lng['doc-convention']['96-deux-exemplaires']?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?=$this->lng['doc-convention']['97-pour']?> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> <br /> <?=$this->lng['doc-convention']['98-lu-et-approuve']?></td>
            <td><?=$this->lng['doc-convention']['97-pour']?> <strong><?=$this->lng['doc-commun']['junior-essec']?></strong> <br /> <?=$this->lng['doc-convention']['98-lu-et-approuve']?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><br /> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong></td>
            <td><i><?=$this->lng['doc-convention']['99-le-presient']?></i> <br /> <strong><?=$this->lng['doc-commun']['president']?></strong></td>
        </tr>
    </table>
</page>
					