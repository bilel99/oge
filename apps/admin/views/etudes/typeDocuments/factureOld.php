<page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
        <tr>
            <td style="width: 100%;" align="right" >
                <p>
                    <strong><?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?> <br /> <?=$this->lng['doc-note-de-frais-attachee-a-une-facture']['01-a-lattention-de']?> <?= $this->etude["nom_societe"]."". $this->etude["nom"]." ". $this->etude["prenom"] ?> <br /> <?= $this->etude["adresse"] ?> <br /> <?= $this->etude["code_postal"] ?> <?= $this->etude["ville"] ?> <br /> <br /> <?=$this->lng['doc-note-de-frais-attachee-a-une-facture']['02-lieu-depart-document']?> $date_envoi_courrier</strong>
                </p>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>">
        <tr align="left" >
            <td><?=$this->lng['doc-note-de-frais-attachee-a-une-facture']['03-convention-num']?></td>
        </tr>

        <tr align="left" >
            <td>$num_convention</td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>">
        <tr align="left" >
            <td><?=$this->lng['doc-facture']['01-date-echeance']?></td>
        </tr>
        <tr>
            <td align="left" >
                <?php if($this->etude["type"] == "frame"){ ?>
                    <input name="date_echeance" type="text" id="start" class="js-set-cookie" />
                <?php } if($this->etude["type"] == "preview" || $this->etude["type"] == "pdf"){ ?>
                    <?= $this->etude['date_echeance'] ?>
                <?php } ?>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center" >
        <tr>
            <td  >
                <h2>
                    <i><?=$this->lng['doc-facture']['02-facture-num']?> $num_facture</i>
                </h2>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
        <tr>
            <td style="width: 75%; "><strong><?=$this->lng['doc-facture']['03-disposition1']?> $num_convention <br /><?=$this->lng['doc-facture']['04-disposition2']?></strong></td>
            <td style="width: 25%; ">$solde-relatif</td>
        </tr>
        <tr>
            <td style="width: 75%; " ><?=$this->lng['doc-facture']['05-total-frais']?></td>
            <td style="width: 25%; " >$total_frais</td>
        </tr>
        <tr>
            <td style="width: 75%; " ><?=$this->lng['doc-facture']['06-montant-tva']?></td>
            <td style="width: 25%; " ><?= $this->etude["num_tva"] ?></td>
        </tr>
        <tr>
            <td style="width: 75%; " ><strong><?=$this->lng['doc-facture']['07-total-ttc-a-regler']?></strong></td>
            <td style="width: 25%; " ><strong>$total_ttc_a_regler</strong></td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-facture']['08-disposition3']?> $total_ttc_a_regler. 
                    <br />
                    <span class="spacer">$total_ttc_a_regler_lettre</span>
                </p>
            </td>
        </tr>
        <tr>
            <td>						
                <p>
                    <?=$this->lng['doc-facture']['09-disposition4']?> 
                    <?=$this->lng['doc-commun']['junior-essec']?>, 
                    <br /> 
                    <?=$this->lng['doc-facture']['10-disposition5']?> 
                    <br /> 
                    <?=$this->lng['doc-facture']['11-disposition6']?> 
                    <br /> 
                    <strong>
                        <u><?=$this->lng['doc-facture']['12-disposition7']?></u>
                    </strong>
                </p>
            </td>
        </tr>
        <tr>
            <td>						
                <p>
                    <?=$this->lng['doc-facture']['13-disposition8']?> 
                    <br />
                    <?=$this->lng['doc-facture']['14-disposition9']?> 
                    <br /> 
                    <?=$this->lng['doc-facture']['15-disposition10']?> 
                    <br /> 
                    <?=$this->lng['doc-commun']['junior-essec']?> 
                    <?=$this->lng['doc-facture']['16-disposition11']?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?=$this->lng['doc-facture']['17-disposition12']?> 
                    <br /> 
                    <?=$this->lng['doc-facture']['18-disposition13']?> 
                    <br /> 
                    <?=$this->lng['doc-facture']['19-disposition14']?>
                </p>
            </td>
        </tr>
    </table>
    <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'right' : 'center' ?>" >
        <tr>
            <td align="right" >
                <p>
                    <?=$this->lng['doc-accord-de-confidentialite']['76-pour']?>
                    <?=$this->lng['doc-commun']['junior-essec']?> 
                    <br /> 
                    <?=$this->lng['doc-note-de-frais-attachee-a-une-facture']['10-le-tresorier']?> 
                    <br /> 
                    $nom_tresorier
                </p>
            </td>
        </tr>
    </table>
    
    <?php if($this->etude["type"] != "pdf"){ ?>
        <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/jquery/jquery-1.10.2.min.js">	</script>
        <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/jquery/jquery-migrate-1.2.1.js"></script>
        <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/modernizr.js"></script>
        <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/datepicker/jquery-ui-1.7.2.custom.min.js">	</script>
        <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/datepicker/ui.datepicker-fr.js">	</script>
        <link media="all" href="<?=$this->surl?>/styles/admin/jquery-ui-1.7.2.custom.css" type="text/css" rel="stylesheet" />
        <link media="all" href="<?=$this->surl?>/styles/admin/jquery.dataTables.css" type="text/css" rel="stylesheet" />
        <script>
            $("#start").datepicker({
                 dateFormat: "yy-mm-dd",
                 firstDay: 1,
            });
        </script>
    <?php } ?>
</page>