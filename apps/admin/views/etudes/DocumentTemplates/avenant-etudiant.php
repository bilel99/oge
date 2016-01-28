<style type="text/css">
    .nav { font-size: 13px; line-height: 20px; color: #000; text-align: center; text-transform: uppercase; background: #ededec; }
    .nav a { color: #000; font-weight: bold; padding: 5px 0; display: block; text-decoration: none; }
</style>

<page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr>
            <td style="width: 100%;" align="center" >
                <a href="#">
                    <img src="<?= $this->surl."/images/admin/logo.png"; ?>" alt="logo" style='width: 65mm' />
                    <!--<img src='./res/logo.gif' alt='logo' style='width: 15mm'>-->
                </a>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr class="nav" align="center" >
            <td style=" width: 25%;" align="center" >
                <a href="#">Users</a>
            </td>
            <td style="width: 25%;" align="center" >
                <a href="#">Clients</a>
            </td>
            <td style="width: 25%;" align="center" >
                <a href="#">ÉTudes</a>
            </td>
            <td style="width: 25%;" align="center" >
                <a href="#">Wiki</a>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>">
        <tr align="left" >
            <td style=" width: 100%;" align="left" >
                <h3>
                    <u><?=$this->lng['doc-avenant-etudiant']['01-avenant-etudiant']?>$num_etudiant – <?=$this->lng['doc-avenant-etudiant']['02-debut-mission']?>$num_convention</u>
                </h3>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><?=$this->lng['doc-avenant-etudiant']['03-entre']?> <br /> <?=$this->lng['doc-commun']['junior-essec']?> </td>

            <td></td>
        </tr>

        <tr>
            <td></td>

            <td><?=$this->lng['doc-avenant-etudiant']['04-partie-essec']?> <?=$this->lng['doc-commun']['junior-essec']?></td>
        </tr>

        <tr>
            <td><?=$this->lng['doc-avenant-etudiant']['05-dune-part']?> </td>

            <td></td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['06-et']?> <br /> $etudiant ($num_etudiant) <br /> <?=$this->lng['doc-avenant-etudiant']['07-demeurant-a']?> $adresse_etudiant $cp_etudiant $ville_etudiant</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['08-dautre-part']?> </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['09-disposition1']?> </p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['10-disposition2']?>$num_convention <br /> <?=$this->lng['doc-avenant-etudiant']['11-disposition3']?> <?=$this->lng['doc-commun']['junior-essec']?> <?=$this->lng['doc-avenant-etudiant']['12-de']?> <?= $this->etude["je"] ?> <?=$this->lng['doc-avenant-etudiant']['13-disposition4']?> <br /><?=$this->lng['doc-avenant-etudiant']['14-conclu-entre']?> <?=$this->lng['doc-commun']['junior-essec']?> <?=$this->lng['doc-avenant-etudiant']['15-et']?> <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['16-disposition5']?> […] (texte provenant le l’écran précédant) <br /> <?=$this->lng['doc-avenant-etudiant']['17-disposition6']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['18-disposition7']?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><?=$this->lng['doc-avenant-etudiant']['19-fait-a']?> <?=$this->lng['doc-avenant-etudiant']['20-cergy-pontoise']?> $fait_a_date</p>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>$etudiant <br /> &nbsp;</td>
            <td><?=$this->lng['doc-accord-de-confidentialite']['76-pour']?> <?=$this->lng['doc-commun']['junior-essec']?> <br /> <?=$this->lng['doc-avenant-etudiant']['21-le-president']?> </td>
        </tr>
        <tr>
            <td><?=$this->lng['doc-avenant-etudiant']['22-lu-et-approuve']?></td>
            <td><?=$this->lng['doc-avenant-etudiant']['22-lu-et-approuve']?></td>
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
            <td><?=$this->lng['doc-avenant-etudiant']['23-signature']?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><?=$this->lng['doc-commun']['president']?></td>
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
            <td>&nbsp;</td>
            <td><?=$this->lng['doc-avenant-etudiant']['24-cachet-essec']?></td>
        </tr>
    </table>
</page>
