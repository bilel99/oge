<?php if ($this->params[2] != 'preview' && $this->params[2] != 'pdf' && $this->params[2] != null) { ?>
    
    <?php 
    // Calcul
    $montantTva = ($this->info_doc[0]['etudes_budget_fsi'] + $this->info_doc[0]['etudes_frais_previsio']) * ($this->info_doc[0]['facture_settings1'] / 100);
    $totalTtc = $this->info_doc[0]['etudes_budget_fsi'] + $this->info_doc[0]['etudes_frais_previsio'] + $montantTva;
    ?>
<title>Facture</title>
    <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
        <table style='width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;' align="center">
            <tr>
                <td align="right"><b><?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?><b></td>
            </tr>
            <tr>
                 <td align="right"><b>A l&rsquo;attention de <?= $this->info_doc[0]['contacts_prenom_contact'] ?> <?= $this->info_doc[0]['contacts_nom_contact'] ?><b></td>
            </tr>
            <tr>
                 <td align="right"><b><?= $this->info_doc[0]['ogeClient_adresse'] ?><b></td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;width: 100%;" align="right"><b><?= $this->info_doc[0]['ogeClient_code_postal'] ?> <?= $this->info_doc[0]['ogeClient_ville'] ?><b></td>
            </tr>
            <tr>
                <td align="right"><b><?= $this->info_doc[0]['Setting7Document'] ?>, le <?= $this->info_doc[0]['fait_leDate'] ?></b></td>
            </tr>
        </table>
        <table style="border-collapse: collapse;margin-bottom: 10px;width: 120px;margin-left:<?= $this->etudes['type']=="pdf" ? '0%': '10%' ?>">
            <tr>
                <td style=" border: 1px solid black;" align="center">Convention n&deg;</td>
            </tr>
            <tr>
                <td style=" border: 1px solid black;" align="center"><?= $this->info_doc[0]['etudes_num_convention'] ?></td>
            </tr>
        </table>
        <table style="border-collapse: collapse;width: 120px;margin-left:<?= $this->etudes['type']=="pdf" ? '0%': '10%' ?>;">
            <tr>
                <td style=" border: 1px solid black;" align="center">Date d&rsquo;&eacute;ch&eacute;ance</td>
            </tr>
            <tr>
                <td style=" border: 1px solid black;" align="center"><?= $this->info_doc[0]['facture_settings5'] ?></td>
            </tr>
        </table>
         <table style=" width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;border-bottom: 1px solid #CACACA;padding-bottom: 10px;" align="center">
            <tr>
                <td colspan="3" style=" border-bottom: 1px solid #CACACA;padding-bottom: 20px;" align="center"><b style="font-size:28px;">FACTURE N&deg; <?= $this->info_doc[0]['fait_leDate'] ?></b></td>
            </tr>
            <tr>
                <td align="left"><b><?= $this->info_doc[0]['facture_settings3'] ?> relatif &agrave; la convention <?= $this->info_doc[0]['etudes_num_convention'] ?></b></td>
                <td rowspan="2" align="right"><?= $this->info_doc[0]['etudes_budget_fsi'] ?> &euro;</td>
            </tr>
            <tr>
                <td align="left"><b>correspondant &agrave; <?= $this->info_doc[0]['etudes_je'] ?> jours-&eacute;tudes et 100% du montant total</b></td>
            </tr>
            <tr>
                <td>Total des frais</td>
                <td align="right"><?= $this->info_doc[0]['etudes_frais_previsio'] ?>&euro;</td>
            </tr>
            <tr>
                <td>Montant de la TVA (<?= $this->info_doc[0]['facture_settings1'] ?>%)</td>
                <td align="right"><?= $montantTva ?>&euro;</td>
            </tr>
            <tr>
                <td><b>Total TTC &agrave; r&eacute;gler</b></td>
                <td align="right"><b><?= $totalTtc ?>&euro;</b></td>
            </tr>
         </table>
        <table width="<?= $this->etude['type']=="pdf"? '100%' : '80%' ?>" align="center">
            <tr>
                <td style="padding-top: 20px;">A valoir en votre aimable r&egrave;glement de <?= $totalTtc ?> <?= $totalTtc > 1?'Euros':'Euro' ?>.</td>
            </tr>
            <tr>
                <td style="padding-left: 150px;"><?= int2str($totalTtc) ?>.</td>
            </tr>
            <tr>
                <td style="padding-top: 20px;">Par ch&egrave;que &agrave; l&rsquo;ordre de <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?>,</td>
            </tr>
            <tr>
                <td>Ou par virement bancaire aux coordonn&eacute;es suivantes :</td>
            </tr>

            <tr>
                <td><?= $this->info_doc[0]['Setting9_Document'] ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><u><b><?= $this->info_doc[0]['Setting10_Document'] ?></b></u></td>
            </tr>
            <tr>
                <td>N&deg; de TVA intracommunautaire : <?= $this->info_doc[0]['facture_settings2'] ?></td>
            </tr>
            <tr>
                <td>Code NAF : <?= $this->info_doc[0]['Setting3Document'] ?></td>
            </tr>
            <tr>
                <td>N&deg; de SIREN : <?= $this->info_doc[0]['Setting2Document'] ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> est une association de loi 1901 affili&eacute;e &agrave; la CNJE</td>
            </tr>
            <tr>
                <td>La TVA est acquit&eacute;e sur les encaissements.</td>
            </tr>
            <tr>
                <td>
                    En cas de retard de paiement, conform&eacute;ment &agrave; la loi 2008-776 du 4 ao&ucirc;t 2008, il sera appliqu&eacute; des p&eacute;nalit&eacute;s
                </td>
            </tr>
            <tr>
                <td>au taux de 3 fois le taux d&rsquo;int&eacute;r&ecirc;t l&eacute;gal en vigueur.</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Escompte z&eacute;ro pour tout paiement anticip&eacute;.</td>
            </tr>
            <tr>
                <td align="right">Pour <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></td>
            </tr>
             <tr>
                <td align="right">Le Tr&eacute;sorier</td>
            </tr>
             <tr>
                <td align="right"><?= $this->info_doc[0]['Setting12_Document'] ?></td>
            </tr>
        </table>
    </page>
<?php }else{ ?>
    
    <?php 
    // Calcul
    $montantTva = ($this->etude['budget_fsi'] + $this->etude['frais_previsio']) * ($this->elements[0]['value'] / 100);
    $totalTtc = $this->etude['budget_fsi'] + $this->etude['frais_previsio'] + $montantTva;
    ?>

    <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
        <table style='width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;' align="center">
            <tr>
                <td align="right"><b><?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?><b></td>
            </tr>
            <tr>
                 <td align="right"><b>A l&rsquo;attention de <?= $this->etude['prenom_contact'] ?> <?= $this->etude['nom_contact'] ?><b></td>
            </tr>
            <tr>
                 <td align="right"><b><?= $this->etude['adresse'] ?><b></td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;width: 100%;" align="right"><b><?= $this->etude['code_postal'] ?> <?= $this->etude['ville'] ?><b></td>
            </tr>
            <tr>
                <td align="right"><b><?= $this->Setting7Document ?>, le <?= date("d/m/Y") ?></b></td>
            </tr>
        </table>
        <table style="border-collapse: collapse;margin-bottom: 10px;width: 120px;margin-left:<?= $this->etudes['type']=="pdf" ? '0%': '10%' ?>">
            <tr>
                <td style=" border: 1px solid black;" align="center">Convention n&deg;</td>
            </tr>
            <tr>
                <td style=" border: 1px solid black;" align="center"><?= $this->etude["num_convention"] ?></td>
            </tr>
        </table>
        <table style="border-collapse: collapse;width: 120px;margin-left:<?= $this->etudes['type']=="pdf" ? '0%': '10%' ?>;">
            <tr>
                <td style=" border: 1px solid black;" align="center">Date d&rsquo;&eacute;ch&eacute;ance</td>
            </tr>
            <tr>
                <td style=" border: 1px solid black;" align="center"><?= $this->elements[4]['value']; ?></td>
            </tr>
        </table>
         <table style=" width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;border-bottom: 1px solid #CACACA;padding-bottom: 10px;" align="center">
            <tr>
                <td colspan="3" style=" border-bottom: 1px solid #CACACA;padding-bottom: 20px;" align="center"><b style="font-size:28px;">FACTURE N&deg; <?= date("d/m/Y") ?></b></td>
            </tr>
            <tr>
                <td align="left"><b><?= $this->elements[2]['value'] ?> relatif &agrave; la convention <?= $this->etude['num_convention'] ?></b></td>
                <td rowspan="2" align="right"><?= $this->etude['budget_fsi'] ?> &euro;</td>
            </tr>
            <tr>
                <td align="left"><b>correspondant &agrave; <?= $this->etude['je'] ?> jours-&eacute;tudes et 100% du montant total</b></td>
            </tr>
            <tr>
                <td>Total des frais</td>
                <td align="right"><?= $this->etude['frais_previsio'] ?>&euro;</td>
            </tr>
            <tr>
                <td>Montant de la TVA (<?= $this->elements[0]["value"] ?>%)</td>
                <td align="right"><?= $montantTva ?>&euro;</td>
            </tr>
            <tr>
                <td><b>Total TTC &agrave; r&eacute;gler</b></td>
                <td align="right"><b><?= $totalTtc ?>&euro;</b></td>
            </tr>
         </table>
        <table width="<?= $this->etude['type']=="pdf"? '100%' : '80%' ?>" align="center">
            <tr>
                <td style="padding-top: 20px;">A valoir en votre aimable r&egrave;glement de <?= $totalTtc ?> <?= $totalTtc > 1?'Euros':'Euro' ?>.</td>
            </tr>
            <tr>
                <td style="padding-left: 150px;"><?= int2str($totalTtc) ?>.</td>
            </tr>
            <tr>
                <td style="padding-top: 20px;">Par ch&egrave;que &agrave; l&rsquo;ordre de <?= $this->setting1eachtimeDocument ?>,</td>
            </tr>
            <tr>
                <td>Ou par virement bancaire aux coordonn&eacute;es suivantes :</td>
            </tr>

            <tr>
                <td><?= $this->Setting9_Document ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><u><b><?= $this->Setting10_Document ?></b></u></td>
            </tr>
            <tr>
                <td>N&deg; de TVA intracommunautaire : <?= $this->elements[1]["value"] ?></td>
            </tr>
            <tr>
                <td>Code NAF : <?= $this->Setting3Document ?></td>
            </tr>
            <tr>
                <td>N&deg; de SIREN : <?= $this->Setting2Document ?></td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><?= $this->setting1eachtimeDocument ?> est une association de loi 1901 affili&eacute;e &agrave; la CNJE</td>
            </tr>
            <tr>
                <td>La TVA est acquit&eacute;e sur les encaissements.</td>
            </tr>
            <tr>
                <td>
                    En cas de retard de paiement, conform&eacute;ment &agrave; la loi 2008-776 du 4 ao&ucirc;t 2008, il sera appliqu&eacute; des p&eacute;nalit&eacute;s
                </td>
            </tr>
            <tr>
                <td>au taux de 3 fois le taux d&rsquo;int&eacute;r&ecirc;t l&eacute;gal en vigueur.</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Escompte z&eacute;ro pour tout paiement anticip&eacute;.</td>
            </tr>
            <tr>
                <td align="right">Pour <?= $this->setting1eachtimeDocument ?></td>
            </tr>
             <tr>
                <td align="right">Le Tr&eacute;sorier</td>
            </tr>
             <tr>
                <td align="right"><?= $this->Setting12_Document ?></td>
            </tr>
        </table>
    </page>
<?php } ?>