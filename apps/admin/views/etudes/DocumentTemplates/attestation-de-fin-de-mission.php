<page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr>
            <td align="center" >
                <p class="alignleft normal"><?=$this->lng['doc-attestation-de-fin-de-mission']['01-num-convention']?>$num_convention</p>
            </td>
        </tr>
        <tr>
            <td align="center" >
                <h2>
                    <u><?=$this->lng['doc-attestation-de-fin-de-mission']['02-attestation-fin-mission']?></u>
                </h2>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>">
        <tr align="left">
            <td>
                <p>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['03-disposition1']?>
                    <?=$this->lng['doc-commun']['junior-essec']?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['04-disposition2']?>
                    $date_reception_doc
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['05-disposition3']?>
                    <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['06-disposition4']?>
                    <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['07-disposition5']?>
                    <?=$this->lng['doc-commun']['junior-essec']?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['08-disposition6']?>
                    <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['06-disposition4']?>
                    <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['09-disposition7']?>
                    $date_signature_convention
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['10-disposition8']?>
                    <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['11-disposition9']?>
                    <?=$this->lng['doc-commun']['junior-essec']?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['12-disposition10']?>
                    <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['13-disposition11']?>
                    <?=$this->lng['doc-commun']['junior-essec']?>
                    <?=$this->lng['doc-attestation-de-fin-de-mission']['14-disposition12']?>
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr align="left">
            <td style="width: 25%" ><?=$this->lng['doc-accord-de-confidentialite']['76-pour']?><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?>,</td>
            <td style="width: 75%" ><?=$this->lng['doc-accord-de-confidentialite']['76-pour']?><?=$this->lng['doc-commun']['junior-essec']?>,</td>
        </tr>

        <tr align="left">
            <td></td>
            <td></td>
        </tr>

        <tr align="left">
            <td style="width: 25%"><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></td>
            <td style="width: 75%"><?=$this->lng['doc-commun']['president']?></td>
        </tr>

        <tr align="left">
            <td></td>
            <td></td>
        </tr>
    </table>
    
</page>