<?php if ($this->params[2] != 'preview' && $this->params[2] != 'pdf' && $this->params[2] != null) { ?>    
<title>Avenant Etudiant</title>
    <page backtop="33mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
        <page_header>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
            <tr>
                <td style="">
                        <img src="<?= $this->surl."/images/admin/logojunior.jpg"; ?>" alt="logo" style="width: 100%;height:80px;" />
                        <!--<img src='./res/logo.gif' alt='logo' style='width: 15mm'>-->
                </td>
            </tr>
            <tr>
                <td align="left"><img src="<?= $this->surl."/images/admin/logojunior.jpg"; ?>" alt="logo" style="width: 35%;" /></td>
            </tr>
        </table>
        </page_header>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>">
            <tr>
                <td align="center" style="padding-bottom: 10px;"><u><b style="font-size: 16px;">Avenant Etudiant N&deg;<?= $this->info_doc[0]['session_id_cdm'] ?> - d&eacute;but de mission</b></u></td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 40px;"><u><b>relatif &agrave; la convention N&deg;<?= $this->info_doc[0]['etudes_num_convention'] ?></b></u> </td>
            </tr>
            <tr>
                <td>Entre :</td>
            </tr>
            <tr>
                <td><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> </td>
            </tr>
            <tr>
                <td style="padding-left: 120px;">Repr&eacute;sent&eacute;e par son Pr&eacute;sident, </td>
            </tr>
            <tr>
                <td style="padding-left: 120px;">ci-apr&egrave;s d&eacute;nomm&eacute;e <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 30px;">D&rsquo;une part, </td>
            </tr>
            <tr>
                <td>Et:</td>
            </tr>
            <tr>
                <td><?= $this->info_doc[0]['cdms_prenom'].' '.$this->info_doc[0]['cdms_nom'] ?> (<?= $this->info_doc[0]['session_id_cdm'] ?>)</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Demeurant &agrave; : <?= $this->info_doc[0]['cdms_adresse'] ?>, <?= $this->info_doc[0]['cdms_code_postal'].' '.$this->info_doc[0]['cdms_ville'] ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 30px;">D&rsquo;autre part, </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Il a &eacute;t&eacute; conclu ce qui suit :</td>
            </tr>
            <tr>
                <td>Le pr&eacute;sent avenant a pour objet de pr&eacute;ciser les termes de la 
                    collaboration entre les parties signataires &agrave; la r&eacute;alisation de l&rsquo;&eacute;tude, relative &agrave; la convention N&deg;<?= $this->info_doc[0]['etudes_num_convention'] ?> </td>
            </tr>
            <tr>
                <td>dans le cadre de laquelle il s&rsquo;agira pour <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> de <?= $this->info_doc[0]['etudes_descriptif'] ?>
                    s&rsquo;engage &agrave; respecter les termes de la convention et du cahier des 
                    charges relatif &agrave; cette &eacute;tude, dont il/elle d&eacute;clare avoir pris 
                    connaissance, </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">conclus entre <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> et <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?></td>
            </tr>
            <tr>
                <td>En particulier, il/elle s&rsquo;engage &agrave; […] (texte provenant le l&rsquo;&eacute;cran pr&eacute;c&eacute;dant)</td>
            </tr>
            <tr>
                <td>Ce pourquoi il/elle re&ccedil;oit une r&eacute;mun&eacute;ration brute calcul&eacute;e sur la base de <?= $this->info_doc[0]['avenant_settings1'] ?> &euro;</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">ce qui correspond &agrave; un total de <?= $this->info_doc[0]['avenant_settings2'] ?> jour-&eacute;tude</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">Cette r&eacute;mun&eacute;ration est indicative et pourra &ecirc;tre r&eacute;&eacute;valu&eacute;e en fonction du 
                    d&eacute;roulement de l&rsquo;&eacute;tude. </td>
            </tr>
            <tr>
                <td style="padding-bottom: 50px">
                    Fait, en deux exemplaires, &agrave; <?= $this->info_doc[0]['Setting7Document'] ?>, le <?= $this->info_doc[0]['fait_leDate']; ?>
                </td>
            </tr>
        </table>
       <table  style="width:<?= $this->etudes['type']=="pdf" ? '100%;': '80%;margin-left:10%;'?>" align="left">
            <tr>
                <td align="left" style="width: 70%;"><?= $this->info_doc[0]['cdms_prenom'].' '.$this->info_doc[0]['cdms_nom'] ?></td>
                <td align="left" style="width: 30%;">Pour <?= $this->info_doc[0]['setting1eachtimeDocument'] ?>
                    <br>le Pr&eacute;sident</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">(lu et approuv&eacute;)</td>
                <td style="padding-bottom: 20px;">(lu et approuv&eacute;)</td>
            </tr>
            <tr>
                <td>Signature
                <br>
                    <br>
                    <br></td>
                <td><?= $this->info_doc[0]['Setting6Document'] ?>
                    <br>
                    <br>
                    <br>
                    (Cachet Junior ESSEC)
                </td>
            </tr>
        </table>
    </page>
<?php }else{ ?>
    <page backtop="33mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
        <page_header>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
            <tr>
                <td style="">
                        <img src="<?= $this->surl."/images/admin/logojunior.jpg"; ?>" alt="logo" style="width: 100%;height:80px;" />
                        <!--<img src='./res/logo.gif' alt='logo' style='width: 15mm'>-->
                </td>
            </tr>
            <tr>
                <td align="left"><img src="<?= $this->surl."/images/admin/logojunior.jpg"; ?>" alt="logo" style="width: 35%;" /></td>
            </tr>
        </table>
        </page_header>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>">
            <tr>
                <td align="center" style="padding-bottom: 10px;"><u><b style="font-size: 16px;">Avenant Etudiant N&deg;<?php if(isset($_SESSION['cdm']['id_cdm'])){echo $_SESSION['cdm']['id_cdm'];}else if(isset($_SESSION['cdp_choix']['id_cdp'])){echo $_SESSION['cdp_choix']['id_cdp'];} ?> - d&eacute;but de mission</b></u></td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 40px;"><u><b>relatif &agrave; la convention N&deg;<?= $this->etude["num_convention"] ?></b></u> </td>
            </tr>
            <tr>
                <td>Entre :</td>
            </tr>
            <tr>
                <td><?= $this->setting1eachtimeDocument ?> </td>
            </tr>
            <tr>
                <td style="padding-left: 120px;">Repr&eacute;sent&eacute;e par son Pr&eacute;sident, </td>
            </tr>
            <tr>
                <td style="padding-left: 120px;">ci-apr&egrave;s d&eacute;nomm&eacute;e <?= $this->setting1eachtimeDocument ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 30px;">D&rsquo;une part, </td>
            </tr>
            <tr>
                <td>Et:</td>
            </tr>
            <tr>
                <td><?php if(isset($_SESSION['cdm']['id_cdm'])){echo $_SESSION['cdm']['prenom'].' '.$_SESSION['cdm']['nom'];}else if(isset($_SESSION['cdp_choix']['id_cdp'])){echo $_SESSION['cdp_choix']['prenom'].' '.$_SESSION['cdp_choix']['nom'];} ?> (<?php if(isset($_SESSION['cdm']['id_cdm'])){echo $_SESSION['cdm']['id_cdm'];}else if(isset($_SESSION['cdp_choix']['id_cdp'])){echo $_SESSION['cdp_choix']['id_cdp'];} ?>)</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Demeurant &agrave; : <?php if(isset($_SESSION['cdm']['id_cdm'])){echo $_SESSION['cdm']['adresse'];}else if(isset($_SESSION['cdp_choix']['id_cdp'])){echo $_SESSION['cdp_choix']['adresse'];} ?>, <?php if(isset($_SESSION['cdm']['id_cdm'])){echo $_SESSION['cdm']['code_postal'].' '.$_SESSION['cdm']['ville'];}else if(isset($_SESSION['cdp_choix']['id_cdp'])){echo $_SESSION['cdp_choix']['code_postal'].' '.$_SESSION['cdp_choix']['ville'];} ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 30px;">D&rsquo;autre part, </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Il a &eacute;t&eacute; conclu ce qui suit :</td>
            </tr>
            <tr>
                <td>Le pr&eacute;sent avenant a pour objet de pr&eacute;ciser les termes de la 
                    collaboration entre les parties signataires &agrave; la r&eacute;alisation de l&rsquo;&eacute;tude, relative &agrave; la convention N&deg;<?= $this->etude['num_convention'] ?> </td>
            </tr>
            <tr>
                <td>dans le cadre de laquelle il s&rsquo;agira pour <?= $this->setting1eachtimeDocument ?> de <?= $this->etude['descriptif'] ?>
                    s&rsquo;engage &agrave; respecter les termes de la convention et du cahier des 
                    charges relatif &agrave; cette &eacute;tude, dont il/elle d&eacute;clare avoir pris 
                    connaissance, </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">conclus entre <?= $this->setting1eachtimeDocument ?> et <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?></td>
            </tr>
            <tr>
                <td>En particulier, il/elle s&rsquo;engage &agrave; […] (texte provenant le l&rsquo;&eacute;cran pr&eacute;c&eacute;dant)</td>
            </tr>
            <tr>
                <td>Ce pourquoi il/elle re&ccedil;oit une r&eacute;mun&eacute;ration brute calcul&eacute;e sur la base de <?= $this->elements[0]["value"] ?> &euro;</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">ce qui correspond &agrave; un total de <?= $this->elements[1]["value"] ?> jour-&eacute;tude</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">Cette r&eacute;mun&eacute;ration est indicative et pourra &ecirc;tre r&eacute;&eacute;valu&eacute;e en fonction du 
                    d&eacute;roulement de l&rsquo;&eacute;tude. </td>
            </tr>
            <tr>
                <td style="padding-bottom: 50px">
                    Fait, en deux exemplaires, &agrave; <?= $this->Setting7Document ?>, le <?= date('d/m/Y'); ?>
                </td>
            </tr>
        </table>
       <table  style="width:<?= $this->etudes['type']=="pdf" ? '100%;': '80%;margin-left:10%;'?>" align="left">
            <tr>
                <td align="left" style="width: 70%;"><?php if(isset($_SESSION['cdm']['id_cdm'])){echo $_SESSION['cdm']['prenom'].' '.$_SESSION['cdm']['nom'];}else if(isset($_SESSION['cdp_choix']['id_cdp'])){echo $_SESSION['cdp_choix']['prenom'].' '.$_SESSION['cdp_choix']['nom'];} ?></td>
                <td align="left" style="width: 30%;">Pour <?= $this->setting1eachtimeDocument ?>
                    <br>le Pr&eacute;sident</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">(lu et approuv&eacute;)</td>
                <td style="padding-bottom: 20px;">(lu et approuv&eacute;)</td>
            </tr>
            <tr>
                <td>Signature
                <br>
                    <br>
                    <br></td>
                <td><?= $this->Setting6Document ?>
                    <br>
                    <br>
                    <br>
                    (Cachet Junior ESSEC)
                </td>
            </tr>
        </table>
    </page>
<?php } ?>
