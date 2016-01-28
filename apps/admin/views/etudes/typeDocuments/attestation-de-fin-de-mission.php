<?php if ($this->params[2] != 'preview' && $this->params[2] != 'pdf' && $this->params[2] != null) { ?>
   <title>ATTESTATION DE FIN DE MISSION</title>
   <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
            <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
                <tr>
                    <td align="left">
                        N&deg; de convention : <?= $this->info_doc[0]['etudes_num_convention'] ?>
                        <br>
                        <br><br>
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom: 60px;">
                        <h2><u>ATTESTATION DE FIN DE MISSION</u></h2>
                    </td>
                </tr>
                <tr>
                    <td align="justify" style="padding-bottom: 240px;">
                        D&rsquo;accord entre les parties, <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> remet ce jour, le <?= $this->info_doc[0]['fait_leDate'] ?>, 
                        &agrave; <?= $this->info_doc[0]['contacts_prenom_contact'] ?> <?= $this->info_doc[0]['contacts_nom_contact'] ?> de <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>, qui l&rsquo;accepte sans r&eacute;serve, 
                        le document final de la mission dont le contenu est d&eacute;fini &agrave; l&rsquo;article 
                        2 de la convention n&deg;<?= $this->info_doc[0]['etudes_num_convention'] ?> sign&eacute;e entre <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> et <?= $this->info_doc[0]['contacts_prenom_contact'] ?> <?= $this->info_doc[0]['contacts_nom_contact'] ?> 
                        de <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>, le <?= $this->info_doc[0]['attestation_fin_mission_settings1'] ?>. La remise de ce 
                        document atteste de la fin de ladite mission. Cependant, comme 
                        convenu avec <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>, <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> assurera un service 
                        post &eacute;tude et r&eacute;pondra &agrave; toutes les questions de <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> 
                        relatives &agrave; la mission et &agrave; sa synth&egrave;se durant un d&eacute;lai d&rsquo;un an. 
                        Le client autorise &agrave; ce jour la destruction des &eacute;ventuels supports 
                        papier li&eacute;s &agrave; l&rsquo;&eacute;tude. Par ailleurs, <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> s&rsquo;engage &agrave; conserver 
                        tous les documents relatifs &agrave; l&rsquo;&eacute;tude pour une dur&eacute;e d&rsquo;au moins un an.
                    </td>
                </tr>
            </table>
            <table style="width:<?= $this->etude["type"]=='pdf' ? '100%' : '80%' ?>" align="center">
                <tr>
                    <td style="padding-right: 240px;">
                        
                        Pour <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>,
                        <br>
                        <br>
                        <br><br>
                    </td>
                    <td>
                        Pour <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?>,
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td><?= $this->info_doc[0]['contacts_prenom_contact'] ?> <?= $this->info_doc[0]['contacts_nom_contact'] ?></td>
                    <td><?= $this->info_doc[0]['Setting6Document'] ?></td>
                </tr>
            </table>
    </page>
<?php }else{ ?>
    <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
            <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
                <tr>
                    <td align="left">
                        N&deg; de convention : <?= $this->etude["num_convention"] ?>
                        <br>
                        <br><br>
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom: 60px;">
                        <h2><u>ATTESTATION DE FIN DE MISSION</u></h2>
                    </td>
                </tr>
                <tr>
                    <td align="justify" style="padding-bottom: 240px;">
                        D&rsquo;accord entre les parties, <?= $this->setting1eachtimeDocument ?> remet ce jour, le <?= $this->date ?>, 
                        &agrave; <?= $this->etude['prenom_contact'] ?> <?= $this->etude['nom_contact'] ?> de <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>, qui l&rsquo;accepte sans r&eacute;serve, 
                        le document final de la mission dont le contenu est d&eacute;fini &agrave; l&rsquo;article 
                        2 de la convention n&deg;<?= $this->etude["num_convention"] ?> sign&eacute;e entre <?= $this->setting1eachtimeDocument ?> et <?= $this->etude['prenom_contact'] ?> <?= $this->etude['nom_contact'] ?> 
                        de <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>, le <?= $this->elements[0]["value"] ?>. La remise de ce 
                        document atteste de la fin de ladite mission. Cependant, comme 
                        convenu avec <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>, <?= $this->setting1eachtimeDocument ?> assurera un service 
                        post &eacute;tude et r&eacute;pondra &agrave; toutes les questions de <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> 
                        relatives &agrave; la mission et &agrave; sa synth&egrave;se durant un d&eacute;lai d&rsquo;un an. 
                        Le client autorise &agrave; ce jour la destruction des &eacute;ventuels supports 
                        papier li&eacute;s &agrave; l&rsquo;&eacute;tude. Par ailleurs, <?= $this->setting1eachtimeDocument ?> s&rsquo;engage &agrave; conserver 
                        tous les documents relatifs &agrave; l&rsquo;&eacute;tude pour une dur&eacute;e d&rsquo;au moins un an.
                    </td>
                </tr>
            </table>
            <table style="width:<?= $this->etude["type"]=='pdf' ? '100%' : '80%' ?>" align="center">
                <tr>
                    <td style="padding-right: 240px;">
                        Pour <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>,
                        <br>
                        <br>
                        <br><br>
                    </td>
                    <td>
                        Pour <?= $this->setting1eachtimeDocument ?>,
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td><?= $this->etude['prenom_contact'] ?> <?= $this->etude['nom_contact'] ?></td>
                    <td><?= $this->Setting6Document ?></td>
                </tr>
            </table>
    </page>
<?php } ?>
