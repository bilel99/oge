<style type="text/css">
    table{
        margin: auto;
    }
</style>
<page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr>
            <td align="center" >
                <h1>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['accord-de-confidentialite']?></u>
                </h1>
            </td>
        </tr>
        <tr>
            <td align="center" >
                <p>
                    <u style="font-size: 22px; font-weight: bold;" ><?=$this->lng['doc-accord-de-confidentialite']['01-relatif-convention']?> $num_convention</u>
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr align="left">
            <td>
                <u><?=$this->lng['doc-accord-de-confidentialite']['02-parties-soussignees']?></u>
            </td>
        </tr>
        <tr align="left">
            <td >
                <p>
                    <strong><?=$this->lng['doc-commun']['junior-essec']?></strong>
                    <?=$this->lng['doc-accord-de-confidentialite']['03-partie-essec-01']?> <?=$this->lng['doc-commun']['president']?>, <br />
                    <?=$this->lng['doc-accord-de-confidentialite']['04-partie-essec-02']?><?=$this->lng['doc-commun']['association']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['05-dune-part']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['06-et']?></u>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>, <br /> 
                    <?=$this->lng['doc-accord-de-confidentialite']['07-au-capital-de']?> <?= $this->etude["capital"] ?> <?=$this->lng['doc-accord-de-confidentialite']['08-euros']?> <br /> 
                    <?=$this->lng['doc-accord-de-confidentialite']['09-immatriculation-rcs']?> <?= $this->etude["lieu_rcs"] ?> <?=$this->lng['doc-accord-de-confidentialite']['10-sous-numero-rcs']?> <?= $this->etude["lieu_rcs"] ?>, <br />
                    <?=$this->lng['doc-accord-de-confidentialite']['11-siege-social']?> <?= $this->etude["adresse"].", ".$this->etude["code_postal"].", ".$this->etude ["ville"] ?> <br />
                    <?=$this->lng['doc-accord-de-confidentialite']['12-representant']?> <?= $this->etude["prenom_contact"]." ".$this->etude["nom_contact"] ?>, <?=$this->lng['doc-accord-de-confidentialite']['13-habilitation']?> 
                    <strong><?= $this->etude["prenom_contact"]." ".$this->etude["nom_contact"] ?></strong>,
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['14-dautre-part']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['15-denommees-parties']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['16-rappel']?></u>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <ol style=" margin-left: -1em !important;">
                    <li><?=$this->lng['doc-accord-de-confidentialite']['17-association-competence']?></li>

                    <li>
                        <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>

                        <?=$this->lng['doc-accord-de-confidentialite']['18-metier-entreprise']?> $metier_societe.
                    </li>

                    <li>
                        <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>

                         <?=$this->lng['doc-accord-de-confidentialite']['19-fait-appel']?><?= $this->etude["je"] ?>
                    </li>

                    <li>
                        <?=$this->lng['doc-accord-de-confidentialite']['20-cadre-mission']?> 

                        <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> 

                        <?=$this->lng['doc-accord-de-confidentialite']['21-informations-confidentielles']?>
                    </li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['22-parties-desirent']?></li>
                </ol>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    &nbsp;
                </p>
            </td>
        </tr>    
        <tr align="left">
            <td>
                <p>
                    &nbsp;
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['23-consequence-convenu']?></u>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['24-article1']?></u>
                    <?=$this->lng['doc-accord-de-confidentialite']['25-nom-article1']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <?=$this->lng['doc-accord-de-confidentialite']['26-disposition-article1']?> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> <?=$this->lng['doc-accord-de-confidentialite']['27-disposition2-article1']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
               <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['28-article2']?></u>

                    <?=$this->lng['doc-accord-de-confidentialite']['29-nom-article2']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['30-disposition-article2']?> <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong> <?=$this->lng['doc-accord-de-confidentialite']['31-disposition2-article2']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['32-article3']?></u>

                    <?=$this->lng['doc-accord-de-confidentialite']['33-nom-article3']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['34-disposition-article3']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['35-article4']?></u>

                     <?=$this->lng['doc-accord-de-confidentialite']['36-nom-article4']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['37-disposition-article4']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <ol style=" margin-left: -1em !important;" class="bullet-letters">
                    <li><?=$this->lng['doc-accord-de-confidentialite']['38-disposition-article4-a']?></li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['39-disposition-article4-b']?><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong><?=$this->lng['doc-accord-de-confidentialite']['40-disposition-article4-b2']?><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong><?=$this->lng['doc-accord-de-confidentialite']['41-disposition-article4-b3']?></li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['42-disposition-article4-c']?></li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['43-disposition-article4-d']?><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>.</li>
                </ol>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['44-article5']?></u>

                     <?=$this->lng['doc-accord-de-confidentialite']['45-nom-article5']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['46-disposition-article5']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <ol style=" margin-left: -1em !important;" class="bullet-letters">
                    <li><?=$this->lng['doc-accord-de-confidentialite']['47-disposition-article5-a']?></li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['48-disposition-article5-b']?></li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['49-disposition-article5-c']?></li>

                    <li><?=$this->lng['doc-accord-de-confidentialite']['50-disposition-article5-d']?></li>
                </ol>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['51-article6']?></u>

                     <?=$this->lng['doc-accord-de-confidentialite']['52-nom-article6']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['53-disposition-article6']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['53-disposition-article6']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['54-article7']?></u>

                     <?=$this->lng['doc-accord-de-confidentialite']['55-nom-article7']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['56-disposition-article7']?><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong><?=$this->lng['doc-accord-de-confidentialite']['57-disposition2-article7']?><strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong><?=$this->lng['doc-accord-de-confidentialite']['58-disposition3-article7']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['59-disposition4-article7']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['60-article8']?></u>
                    <?=$this->lng['doc-accord-de-confidentialite']['61-nom-article8']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['62-disposition-article8']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['63-article9']?></u>
                    <?=$this->lng['doc-accord-de-confidentialite']['64-nom-article9']?>
                </p>
            </td>    
        </tr>
        <tr align="left">
            <td>
                <p>
                    <?=$this->lng['doc-accord-de-confidentialite']['65-disposition-article9']?>
                    <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>
                    <?=$this->lng['doc-accord-de-confidentialite']['66-disposition2-article9']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['67-disposition3-article9']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['68-article10']?></u>
                    <?=$this->lng['doc-accord-de-confidentialite']['69-nom-article10']?>
                </p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p><?=$this->lng['doc-accord-de-confidentialite']['70-disposition-article10']?></p>
            </td>
        </tr>
        <tr align="left">
            <td>
                <p>
                    <u><?=$this->lng['doc-accord-de-confidentialite']['71-article11']?></u>
                    <?=$this->lng['doc-accord-de-confidentialite']['72-nom-article11']?>
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr align="left">
            <td style="width: 100%" >
                <p><?=$this->lng['doc-accord-de-confidentialite']['73-disposition-article11']?></p>
            </td>
        </tr>
        <tr align="left">
            <td style="width: 100%" >
                <p><?=$this->lng['doc-accord-de-confidentialite']['74-fait-a-cergy']?>$fait_a_date <br /> <?=$this->lng['doc-accord-de-confidentialite']['75-2-exemplaires-originaux']?></p>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr align="left">
            <td style="width: 10%" >
                <strong><?=$this->lng['doc-accord-de-confidentialite']['76-pour']?><?=$this->lng['doc-commun']['junior-essec']?>, <br /><?=$this->lng['doc-commun']['president']?></strong>
            </td>
            <td style="width: 90%" >
                <strong><?=$this->lng['doc-accord-de-confidentialite']['76-pour']?><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>, <br /> <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></strong>
            </td>
        </tr>
    </table>
</page>
