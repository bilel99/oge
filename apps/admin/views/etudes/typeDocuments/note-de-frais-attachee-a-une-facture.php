<?php if ($this->params[2] != 'preview' && $this->params[2] != 'pdf' && $this->params[2] != null) { ?>
<title>Facture de frais</title>
    <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >

        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>; margin-top:80px;" align="center">
            <tr>
                <td align='right'>
                    <b><?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?></b><br>
                    <b>A l&rsquo;attention de <?= $this->info_doc[0]['contacts_prenom_contact'] ?> <?= $this->info_doc[0]['contacts_nom_contact'] ?></b><br>
                    <b><?= $this->info_doc[0]['ogeClient_adresse'] ?></b><br>
                    <b><?= $this->info_doc[0]['ogeClient_code_postal'] ?> <?= $this->info_doc[0]['ogeClient_ville'] ?></b><br>
                    <b><?= $this->info_doc[0]['Setting7Document'] ?>, le <?= $this->info_doc[0]['fait_leDate'] ?></b><br>
               </td>
            </tr>
        </table>
        <table style="border-collapse: collapse;" border="0" >
            <tr>
                <td align='right' style=" border: 1px solid black;">
                   Convetion n&deg;
               </td>
            </tr>
            <tr>
                <td align='center' style=" border: 1px solid black;">
                    <?= $this->info_doc[0]['etudes_num_convention'] ?>
                </td>
            </tr>
        </table>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>" align="center">
            <tr>
                <td colspan="4" style="border-bottom: 1px solid #CACACA;font-size: 32px;padding-bottom: 10px;" align="center">
                    <b>D&eacute;tail des frais relatifs &agrave; la facture N&deg; <?= $this->info_doc[0]['fait_leDate'] ?></b>
                </td>
            </tr>
            <?php
                // CALCUL
                $hortTaxe1 = $this->info_doc[0]['facturefrais_settings3'];
                $hortTaxe2 = $this->info_doc[0]['facturefrais_settings5'];
                $hortTaxe3 = $this->info_doc[0]['facturefrais_settings7'];
                $hortTaxe4 = $this->info_doc[0]['facturefrais_settings9'];
                $hortTaxe5 = $this->info_doc[0]['facturefrais_settings11'];

                // TVA
                $tvaOriginal = $this->info_doc[0]['facturefrais_settings1'];

                $tva1 = ($hortTaxe1 * $tvaOriginal) / 100;
                $tva2 = ($hortTaxe2 * $tvaOriginal) / 100;
                $tva3 = ($hortTaxe3 * $tvaOriginal) / 100;
                $tva4 = ($hortTaxe4 * $tvaOriginal) / 100;
                $tva5 = ($hortTaxe5 * $tvaOriginal) / 100;

                $ttc1 = $hortTaxe1 + $tva1;
                $ttc2 = $hortTaxe2 + $tva2;
                $ttc3 = $hortTaxe3 + $tva3;
                $ttc4 = $hortTaxe4 + $tva4;
                $ttc5 = $hortTaxe5 + $tva5;


                // TOTAL CALC
                $hortTaxeTotal = $hortTaxe1 + $hortTaxe2 + $hortTaxe3 + $hortTaxe4 + $hortTaxe5;
                $tvaTotal = $tva1 + $tva2 + $tva3 + $tva4 + $tva5;
                $ttcTotal = $ttc1 + $ttc2 + $ttc3 + $ttc4 + $ttc5;

            ?>


            <tr>
                <td style="width: 40%;padding-bottom: 20px;">Frais</td>
                <td style="width: 20%;padding-bottom: 20px;padding-right:30px;"    align="right">Frais HT</td>
                <td style="width: 20%;padding-bottom: 20px;padding-right:30px;"    align="right">TVA</td>
                <td style="width: 20%;padding-bottom: 20px;padding-right:30px;"    align="right">Frais TTC</td>
            </tr>

            <!-- R&eacute;cupp&eacute;ration de toutes les facture de frais -->
            <tr>
                <?php if($this->info_doc[0]['facturefrais_settings2'] != ''){ ?>
                <td><b><?= $this->info_doc[0]['facturefrais_settings2'] ?></b><br /></td>
                <td align="right"><b><?= $this->info_doc[0]['facturefrais_settings3'] ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $tva1 ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $ttc1 ?>&euro;</b><br /> </td>
                <?php } ?>
            </tr>

            <tr>
                <?php if($this->info_doc[0]['facturefrais_settings4'] != ''){ ?>
                <td><b><?= $this->info_doc[0]['facturefrais_settings4'] ?></b><br /></td>
                <td align="right"><b><?= $this->info_doc[0]['facturefrais_settings5'] ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $tva2 ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $ttc2 ?>&euro;</b><br /> </td>
                <?php } ?>
            </tr>

            <tr>
                <?php if($this->info_doc[0]['facturefrais_settings6'] != ''){ ?>
                <td><b><?= $this->info_doc[0]['facturefrais_settings6'] ?></b><br /></td>
                <td align="right"><b><?= $this->info_doc[0]['facturefrais_settings7'] ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $tva3 ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $ttc3 ?>&euro;</b><br /> </td>
                <?php } ?>
            </tr>

            <tr>
                <?php if($this->info_doc[0]['facturefrais_settings8'] != ''){ ?>
                <td><b><?= $this->info_doc[0]['facturefrais_settings8'] ?></b><br /></td>
                <td align="right"><b><?= $this->info_doc[0]['facturefrais_settings9'] ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $tva4 ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $ttc4 ?>&euro;</b><br /> </td>
                <?php } ?>
            </tr>

            <tr>
                <?php if($this->info_doc[0]['facturefrais_settings10'] != ''){ ?>
                <td><b><?= $this->info_doc[0]['facturefrais_settings10'] ?></b><br /></td>
                <td align="right"><b><?= $this->info_doc[0]['facturefrais_settings11'] ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $tva5 ?>&euro;</b><br /> </td>
                <td  align="right"><b><?= $ttc5 ?>&euro;</b><br /> </td>
                <?php } ?>
            </tr>



            <!-- Calcul final des facture de frais + Stockage en bdd etudes du total de la facture de frais -->
            <tr>
               <td style="padding-left:0px;padding-bottom: 20px;"><b>Total des frais</b></td>
               <td style="padding-bottom: 20px;" align="right"><b><?= $hortTaxeTotal ?>&euro;</b><br /></td>
               <td style="padding-bottom: 20px;" align="right"><b><?= $tvaTotal ?>&euro;</b><br /></td>
               <td style="padding-bottom: 20px;" align="right"><b><?= $ttcTotal ?>&euro;</b><br /></td>
           </tr>





            <tr>
                <td style="border-top: 1px solid #CACACA;" colspan="4" align="right">
                    Pour <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?><br>
                    Le Tr&eacute;sorier<br>
                    <?= $this->info_doc[0]['Setting12_Document'] ?>
                </td>
            </tr>
        </table>
    </page>
<?php }else{ ?>
    <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >

    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>; margin-top:80px;" align="center">
        <tr>
            <td align='right'>
                <b><?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?></b><br>
                <b>A l&rsquo;attention de <?= $this->etude['prenom_contact'] ?> <?= $this->etude['nom_contact'] ?></b><br>
                <b><?= $this->etude['adresse'] ?></b><br>
                <b><?= $this->etude['code_postal'] ?> <?= $this->etude['ville'] ?></b><br>
                <b><?= $this->Setting7Document ?>, le <?= date("d/m/Y") ?></b><br>
           </td>
        </tr>
    </table>
    <table style="border-collapse: collapse;" border="0" >
        <tr>
            <td align='right' style=" border: 1px solid black;">
               Convetion n&deg;
           </td>
        </tr>
        <tr>
            <td align='center' style=" border: 1px solid black;">
                <?= $this->etude["num_convention"] ?>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>" align="center">
        <tr>
            <td colspan="4" style="border-bottom: 1px solid #CACACA;font-size: 32px;padding-bottom: 10px;" align="center">
                <b>D&eacute;tail des frais relatifs &agrave; la facture N&deg; <?= date("d-m-Y") ?></b>
            </td>
        </tr>
        <?php
            // CALCUL
            $hortTaxe1 = $this->elements[2]['value'];
            $hortTaxe2 = $this->elements[4]['value'];
            $hortTaxe3 = $this->elements[6]['value'];
            $hortTaxe4 = $this->elements[8]['value'];
            $hortTaxe5 = $this->elements[10]['value'];
            
            // TVA
            $tvaOriginal = $this->elements[0]['value'];
            
            $tva1 = ($hortTaxe1 * $tvaOriginal) / 100;
            $tva2 = ($hortTaxe2 * $tvaOriginal) / 100;
            $tva3 = ($hortTaxe3 * $tvaOriginal) / 100;
            $tva4 = ($hortTaxe4 * $tvaOriginal) / 100;
            $tva5 = ($hortTaxe5 * $tvaOriginal) / 100;
            
            $ttc1 = $hortTaxe1 + $tva1;
            $ttc2 = $hortTaxe2 + $tva2;
            $ttc3 = $hortTaxe3 + $tva3;
            $ttc4 = $hortTaxe4 + $tva4;
            $ttc5 = $hortTaxe5 + $tva5;
            
            
            // TOTAL CALC
            $hortTaxeTotal = $hortTaxe1 + $hortTaxe2 + $hortTaxe3 + $hortTaxe4 + $hortTaxe5;
            $tvaTotal = $tva1 + $tva2 + $tva3 + $tva4 + $tva5;
            $ttcTotal = $ttc1 + $ttc2 + $ttc3 + $ttc4 + $ttc5;

        ?>
        
        
        <tr>
            <td style="width: 40%;padding-bottom: 20px;">Frais</td>
            <td style="width: 20%;padding-bottom: 20px;padding-right:30px;"    align="right">Frais HT</td>
            <td style="width: 20%;padding-bottom: 20px;padding-right:30px;"    align="right">TVA</td>
            <td style="width: 20%;padding-bottom: 20px;padding-right:30px;"    align="right">Frais TTC</td>
        </tr>
        
        <!-- R&eacute;cupp&eacute;ration de toutes les facture de frais -->
        <tr>
            <?php if($this->elements['1']['value'] != ''){ ?>
            <td><b><?= $this->elements['1']['value'] ?></b><br /></td>
            <td align="right"><b><?= $this->elements['2']['value'] ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $tva1 ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $ttc1 ?>&euro;</b><br /> </td>
            <?php } ?>
        </tr>
        
        <tr>
            <?php if($this->elements['3']['value'] != ''){ ?>
            <td><b><?= $this->elements['3']['value'] ?></b><br /></td>
            <td align="right"><b><?= $this->elements['4']['value'] ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $tva2 ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $ttc2 ?>&euro;</b><br /> </td>
            <?php } ?>
        </tr>
        
        <tr>
            <?php if($this->elements['5']['value'] != ''){ ?>
            <td><b><?= $this->elements['5']['value'] ?></b><br /></td>
            <td align="right"><b><?= $this->elements['6']['value'] ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $tva3 ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $ttc3 ?>&euro;</b><br /> </td>
            <?php } ?>
        </tr>
        
        <tr>
            <?php if($this->elements['7']['value'] != ''){ ?>
            <td><b><?= $this->elements['7']['value'] ?></b><br /></td>
            <td align="right"><b><?= $this->elements['8']['value'] ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $tva4 ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $ttc4 ?>&euro;</b><br /> </td>
            <?php } ?>
        </tr>
        
        <tr>
            <?php if($this->elements['9']['value'] != ''){ ?>
            <td><b><?= $this->elements['9']['value'] ?></b><br /></td>
            <td align="right"><b><?= $this->elements['10']['value'] ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $tva5 ?>&euro;</b><br /> </td>
            <td  align="right"><b><?= $ttc5 ?>&euro;</b><br /> </td>
            <?php } ?>
        </tr>
        
        
        
        <!-- Calcul final des facture de frais + Stockage en bdd etudes du total de la facture de frais -->
        <tr>
           <td style="padding-left:0px;padding-bottom: 20px;"><b>Total des frais</b></td>
           <td style="padding-bottom: 20px;" align="right"><b><?= $hortTaxeTotal ?>&euro;</b><br /></td>
           <td style="padding-bottom: 20px;" align="right"><b><?= $tvaTotal ?>&euro;</b><br /></td>
           <td style="padding-bottom: 20px;" align="right"><b><?= $ttcTotal ?>&euro;</b><br /></td>
       </tr>
        
        
        
        
        
        <tr>
            <td style="border-top: 1px solid #CACACA;" colspan="4" align="right">
                Pour <?= $this->setting1eachtimeDocument ?><br>
                Le Tr&eacute;sorier<br>
                <?= $this->Setting12_Document ?>
            </td>
        </tr>
    </table>
</page>
<?php } ?>