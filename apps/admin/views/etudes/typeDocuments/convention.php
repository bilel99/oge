<?php if ($this->params[2] != 'preview' && $this->params[2] != 'pdf' && $this->params[2] != null) { ?>
    <title>CONVENTION</title>
	<page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
            <tr>
                <td style="width: 100%;" align="center" >
                    <h1>
                        <u>CONVENTION N&deg; <?= trim($this->info_doc[0]['etudes_num_convention'])?></u>
                    </h1>
                </td>
            </tr>

        </table>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
            <tr>
                <td>
                    <p>
                        <u>Entre les parties soussign&eacute;es :</u>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        &nbsp;
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong><?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? trim($this->info_doc[0]['ogeClient_nom_societe']) : trim($this->info_doc[0]['ogeClient_prenom'])." ".trim($this->info_doc[0]['ogeClient_nom']) ?> </strong>
                        <?php if($this->info_doc[0]['ogeClient_typologie'] == 'entreprise'){ ?>
                            <br />au capital de <?= $this->info_doc[0]['ogeClient_capital']?> Euros, Immatricul&eacute;(e) au RCS de <?= $this->info_doc[0]['ogeClient_lieu_rcs']?> sous le N&deg;<?= trim($this->info_doc[0]['ogeClient_num_rcs']) ?>,
                        <?php } ?>
                        <br />Dont le si&egrave;ge est situ&eacute; au <?= $this->info_doc[0]['ogeClient_adresse'] ?>, <?= $this->info_doc[0]['ogeClient_code_postal'] ?> <?= $this->info_doc[0]['ogeClient_ville'] ?>,
                        <br />Repr&eacute;sent&eacute;(e) par <?= trim($this->info_doc[0]['contacts_nom_contact'])." ".trim($this->info_doc[0]['contacts_prenom_contact']) ?>, 
                        <br />Ci-apr&egrave;s d&eacute;nomm&eacute;(e) <strong><?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? trim($this->info_doc[0]['ogeClient_nom_societe']) : trim($this->info_doc[0]['ogeClient_prenom'])." ".trim($this->info_doc[0]['ogeClient_nom']) ?> </strong></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>D&rsquo;une part, </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>et</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> <?= $this->info_doc[0]['Setting1Document'] ?><br>
                        Association de loi 1901, N&deg; SIRET <?= $this->info_doc[0]['Setting2Document'] ?>, code NAF <?= $this->info_doc[0]['Setting3Document'] ?>, n&deg; URSSAF <?= $this->info_doc[0]['Setting4Document'] ?>,<br>
                        Dont le si&egrave;ge est situ&eacute; <?= $this->info_doc[0]['adresse_Document8'] ?>, <?= $this->info_doc[0]['Setting5Document'] ?>, <br>
                        Repr&eacute;sent&eacute;e aux fins des pr&eacute;sentes par son pr&eacute;sident, <?= $this->info_doc[0]['Setting6Document'] ?>, <br>
                        Ci-apr&egrave;s d&eacute;nomm&eacute;e <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>,
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>D&rsquo;autre part, </p><br>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Il a &eacute;t&eacute; pr&eacute;alablement rappel&eacute; que <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> </strong>, 
                        est une Junior-Entreprise compos&eacute;e exclusivement d&rsquo;&eacute;l&egrave;ves de 
                        l&rsquo;ESSEC. Elle a pour vocation de compl&eacute;ter la formation th&eacute;orique 
                        dispens&eacute;e dans les &eacute;tablissements d&rsquo;enseignement sup&eacute;rieur par des 
                        applications pratiques en entreprise. <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> est membre de la
                        Conf&eacute;d&eacute;ration Nationale des Junior-Entreprises.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>C&rsquo;est dans cet esprit que <strong><?= strip_tags(trim($this->info_doc[0]['contacts_prenom_contact']))." ".strip_tags(trim($this->info_doc[0]['contacts_nom_contact']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?></strong>
                        a confi&eacute; &agrave; <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> la r&eacute;alisation de l&rsquo;&eacute;tude d&eacute;finie ci-dessous.</p>

                </td>
            </tr>       
            <tr>
                <td>
                    <p>
                        La pr&eacute;sente convention a pour objet de d&eacute;finir les obligations
                        r&eacute;ciproques des parties et de pr&eacute;ciser les modalit&eacute;s d&rsquo;ex&eacute;cution de la mission.
                    </p>
                </td>
            </tr>   
            <tr>
                <td>
                    <p>
                        <u>Article 1</u> : DEFINITION DE L&rsquo;ETUDE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Il s&rsquo;agira pour <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> 
                        de <?= $this->info_doc[0]['etudes_descriptif'] ?>.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Cette &eacute;tude donne lieu &agrave; une analyse et une synth&egrave;se.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><u>Article 2</u> : CONTENU DE LA MISSION</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Les prestations &agrave; fournir par <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?> ont &eacute;t&eacute; pr&eacute;alablement &eacute;tablies dans l&rsquo;avant-projet r&eacute;dig&eacute; par <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>,
                        accept&eacute; par <strong><?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? strip_tags(trim($this->info_doc[0]['ogeClient_nom_societe']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') : strip_tags(trim($this->info_doc[0]['ogeClient_prenom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')." 
                            ".  strip_tags(trim($this->info_doc[0]['ogeClient_nom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?> </strong>
                        annex&eacute; &agrave; la pr&eacute;sente convention.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><u>Article 3</u> : COLLABORATION</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <strong><?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? strip_tags(trim($this->info_doc[0]['ogeClient_nom_societe']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') : strip_tags(trim($this->info_doc[0]['ogeClient_prenom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')." ".  strip_tags(trim($this->info_doc[0]['ogeClient_nom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?> </strong>
                        est tenu d&rsquo;assurer une &eacute;troite collaboration 
                        avec <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> 
                        afin de v&eacute;rifier, aussi souvent que l&rsquo;une des deux parties le jugera n&eacute;cessaire, l&rsquo;ad&eacute;quation entre la prestation fournie et les besoins tels qu&rsquo;ils auront &eacute;t&eacute; d&eacute;finis.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Dans l&rsquo;hypoth&egrave;se où l&rsquo;une ou l&rsquo;autre des deux parties consid&eacute;rerait 
                        que la mission ne s&rsquo;ex&eacute;cute plus conform&eacute;ment aux conditions initiales,
                        celles-ci conviendront de se rapprocher afin d&rsquo;examiner les possibilit&eacute;s 
                        d&rsquo;adaptation du cahier des charges en la forme d&rsquo;un avenant pr&eacute;vu &agrave; l&rsquo;article 8.
                    </p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>En cas de d&eacute;saccord persistant rendant impossible la poursuite 
                        de la collaboration, celle-ci pourra &ecirc;tre rompue &agrave; l&rsquo;initiative 
                        de l&rsquo;une ou l&rsquo;autre partie selon les conditions et modalit&eacute;s 
                        pr&eacute;vues &agrave; l&rsquo;article 9.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 4</u> : PRIX
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Le prix de la prestation r&eacute;alis&eacute;e par <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>
                        dans le cadre de la pr&eacute;sente convention est fix&eacute; d&rsquo;un commun accord 
                        &agrave; <?= strip_tags(trim($this->info_doc[0]['etudes_budget_fsi']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')?> Euros Hors Taxes (<?= int2str($this->info_doc[0]['etudes_budget_fsi']) ?> Euros Hors Taxes) 
                        correspondant &agrave; <?= strip_tags(trim($this->info_doc[0]['etudes_je']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')?> (<?= int2str($this->info_doc[0]['etudes_je']) ?>) Jour(s)-Etude, conform&eacute;ment &agrave; la l&eacute;gislation
                        applicable aux Junior-Entreprises.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        De plus, les frais engag&eacute;s pour la r&eacute;alisation de l&rsquo;&eacute;tude sont 
                        &agrave; la charge du commanditaire sous r&eacute;serve de la pr&eacute;sentation des 
                        justificatifs correspondants. Les frais de d&eacute;placement seront en 
                        particulier rembours&eacute;s sur la base du kilom&egrave;tre fiscal fix&eacute; &agrave; 0.46 
                        Euros Hors Taxes.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Les prestations sont soumises &agrave; la TVA au taux en vigueur &agrave; 
                        la date de l&rsquo;&eacute;mission de la facture.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p><u>Article 5</u> : PAIEMENT DU PRIX</p>
                </td>
            </tr>     
            <tr>
                <td>
                    <p>
                       Le r&egrave;glement s&rsquo;effectuera selon les modalit&eacute;s suivantes : 50% 
                       &agrave; la signature de la convention et 50% &agrave; la signature de l&rsquo;	attestation de fin de mission. 
                        <br /> 
                       Les frais (frais de d&eacute;placement, frais de reprographie…) seront r&eacute;gl&eacute;s en int&eacute;gralit&eacute; lors du r&egrave;glement du solde.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 6</u> : DELAIS DE REALISATION DE L&rsquo;ETUDE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>La prestation r&eacute;alis&eacute;e par <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>
                        d&eacute;bute &agrave; la signature de la pr&eacute;sente convention et &agrave; la r&eacute;ception du r&egrave;glement de la facture d&rsquo;acompte.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                     Cette prestation s&rsquo;effectuera, ainsi que cela est indiqu&eacute; dans 
                     l&rsquo;avant-projet annex&eacute; &agrave; la pr&eacute;sente convention, sur une dur&eacute;e de 
                     3 semaines de la semaine 1 &agrave; la semaine 3.
                     <br>
                    </p>
                </td>
             </tr>
             <tr>
                 <td>
                    <p>
                        <u>Article 7</u> : RESPONSABILITES
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Toute inex&eacute;cution de l&rsquo;une des quelconques obligations vis&eacute;es 
                        &agrave; la pr&eacute;sente convention engage la responsabilit&eacute; de son auteur.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Conform&eacute;ment aux articles 2 et 3 de la pr&eacute;sente convention, 
                        <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> mettra tous ses moyens en œuvre 
                        pour la bonne r&eacute;alisation de sa mission.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Compte-tenu tant de la nature de la mission que de la sp&eacute;cificit&eacute; 
                        de <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>, 
                        la responsabilit&eacute; de celle-ci ne pourra &ecirc;tre engag&eacute;e, sauf faute grave ou d&eacute;faut de moyen, en cas de d&eacute;faut de r&eacute;sultat.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 8</u> : MODIFICATION DE LA CONVENTION
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>La pr&eacute;sente convention ne pourra &ecirc;tre modifi&eacute;e qu&rsquo;apr&egrave;s accord 
                        entre les parties.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                      Toute modification portant notamment sur le prix, le nombre de
                      Jour(s)-Etude, la nature des prestations ou les modalit&eacute;s 
                      d&rsquo;ex&eacute;cution des obligations fera l&rsquo;objet d&rsquo;un avenant &agrave; la 
                      pr&eacute;sente convention.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 9</u> : RESILIATION
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>En cas de manquement aux obligations souscrites &agrave; la pr&eacute;sente 
                        convention et sans qu&rsquo;il y ait lieu d&rsquo;avoir recours au juge, 
                        l&rsquo;une ou l&rsquo;autre des parties qui se pr&eacute;vaut de l&rsquo;inex&eacute;cution 
                        des obligations ci-dessus vis&eacute;es, pourra, apr&egrave;s une mise en 
                        demeure notifi&eacute;e par lettre recommand&eacute;e avec accus&eacute; de 
                        r&eacute;ception et &agrave; l&rsquo;expiration d&rsquo;un d&eacute;lai de 29 jours suivant 
                        la notification, proc&eacute;der de mani&egrave;re unilat&eacute;rale &agrave; la 
                        r&eacute;siliation de la convention.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                       En cas de r&eacute;siliation anticip&eacute;e imputable au client,<strong>
                        <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>
                        pourra exiger le paiement des prestations accomplies jusqu&rsquo;&agrave; la date de rupture de la 
                        convention. Le montant des travaux sera calcul&eacute; au prorata du travail effectu&eacute; et les 
                        frais engag&eacute;s jusqu&rsquo;&agrave; la r&eacute;siliation pour la r&eacute;alisation partielle des travaux seront 
                        rembours&eacute;s sur pr&eacute;sentation de justificatifs.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 10</u> : CONFIDENTIALITE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Chacune des parties s&rsquo;engage &agrave; ne pas divulguer les informations 
                        ou documents qui lui auront &eacute;t&eacute; communiqu&eacute;s ou auxquels elle 
                        aurait pu avoir acc&egrave;s au cours de l&rsquo;ex&eacute;cution de la convention 
                        conclue entre elles, de quelque nature qu&rsquo;ils soient 
                        (&eacute;conomiques, techniques, etc.).<br>
                        Les parties se portent fort du respect par leur personnel et des 
                        tiers de la prise des mesures n&eacute;cessaires pour garantir la 
                        confidentialit&eacute; desdits documents et informations. 
                        Cette obligation de confidentialit&eacute; prendra fin dix ans &agrave; l&rsquo;issue 
                        de la pr&eacute;sente convention.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Les prestations sont soumises &agrave; la TVA au taux en vigueur &agrave; la date de l&rsquo;&eacute;mission 
                        de la facture.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 11</u> : PROPRIETE DE L&rsquo;ETUDE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Les techniques et m&eacute;thodes de recherche demeurent la propri&eacute;t&eacute; 
                        de <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>
                        et ne pourront faire l&rsquo;objet 
                        d&rsquo;aucune utilisation ou reproduction sans l&rsquo;accord express de 
                        celle-ci.</p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        L&rsquo;ensemble des travaux techniques et m&eacute;thodologiques n&eacute;cessaires 
                        &agrave; la r&eacute;alisation de l&rsquo;&eacute;tude demeure la propri&eacute;t&eacute; exclusive de 
                        <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>
                        jusqu&rsquo;au paiement global effectu&eacute;, 
                        le rapport d&rsquo;&eacute;tude et/ou le mat&eacute;riel (questionnaires, rapport, 
                        grille d&rsquo;analyse) destin&eacute;s &agrave; l&rsquo;usage exclusif de
                        <strong><?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? strip_tags(trim($this->info_doc[0]['ogeClient_nom_societe'])) : strip_tags(trim($this->info_doc[0]['ogeClient_prenom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')." ".  strip_tags(trim($this->info_doc[0]['ogeClient_nom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?> </strong>
                        deviendront la propri&eacute;t&eacute; exclusive de ceux-ci.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                   <p>
                       <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong> et <strong><?= strip_tags(trim($this->info_doc[0]['ogeClient_nom_societe']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?></strong> 
                       s&rsquo;autorisent &agrave; utiliser leurs noms r&eacute;ciproques &agrave; titre de r&eacute;f&eacute;rence.
                       En revanche, la marque ESSEC est la propri&eacute;t&eacute; de l&rsquo;association 
                       &eacute;ducative <strong>ESSEC</strong> et ne peut pas &ecirc;tre utilis&eacute;e sans 
                       l&rsquo;accord explicite de ce dernier. 
                   </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 12</u> : LITIGES ET TRIBUNAUX COMPETENTS
                    </p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>En cas de litige les parties s&rsquo;engagent &agrave; rechercher, avant 
                        tout recours contentieux, une solution amiable.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                       En cas de d&eacute;saccord persistant, le litige sera port&eacute; devant 
                       la juridiction comp&eacute;tente (Tribunal d&rsquo;Instance ou de Grande 
                       Instance) dans le ressort de laquelle se trouve le si&egrave;ge de 
                       <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 13</u> : PRISE D&rsquo;EFFET DE LA CONVENTION
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>La pr&eacute;sente convention prendra effet &agrave; compter de la signature 
                        du pr&eacute;sent document.</p><br>
                </td>
            </tr> 
        </table>
        <table style="margin-left: 140px">
            <tr>
                <td>
                    Fait &agrave; <?= $this->info_doc[0]['Setting7Document'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Le <?= $this->info_doc[0]['fait_leDate']?>,
                </td>
            </tr>
            <tr>
                <td>
                    En deux exemplaires.
                    <br><br><br>
                </td>
            </tr>
        </table>
        <table align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
            <tr>
                <td style="width:420px;">Pour <strong> <?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? strip_tags(trim($this->info_doc[0]['ogeClient_nom_societe'])) : strip_tags(trim($this->info_doc[0]['ogeClient_prenom']))." ".  strip_tags(trim($this->info_doc[0]['ogeClient_nom'])) ?>  </strong>
                    <br> (lu et approuv&eacute; et cachet de la soci&eacute;t&eacute;)<br><br><br>
                </td>
                <td style="width:420px;">Pour <strong><?= $this->info_doc[0]['Setting1eachtimeDocument'] ?></strong>
                    <br>
                (lu et approuv&eacute; et cachet de la soci&eacute;t&eacute;)<br><br><br>
                </td>
            </tr>
            <tr>
                <td><strong><?= $this->info_doc[0]['ogeClient_nom_societe']>=" " ? strip_tags(trim($this->info_doc[0]['ogeClient_nom_societe'])) : strip_tags(trim($this->info_doc[0]['ogeClient_prenom']))." ".  strip_tags(trim($this->info_doc[0]['ogeClient_nom'])) ?> </strong>
                </td>
                <td>Le Pr&eacute;sident<br>
                    <strong><?= $this->info_doc[0]['Setting6Document'] ?></strong>
                </td>
            </tr>
        </table>
    </page>
<?php }else{ ?>

    <page backtop="15mm" backbottom="15mm" backleft="10mm" backright="10mm" >    
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
            <tr>
                <td style="width: 100%;" align="center" >
                    <h1>
                        <u>CONVENTION N&deg; <?= trim($this->etude['num_convention'])?></u>
                    </h1>
                </td>
            </tr>

        </table>
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
            <tr>
                <td>
                    <p>
                        <u>Entre les parties soussign&eacute;es :</u>
                    </p>
                </td>
            </tr>
               <tr>
                <td>
                    <p>
                        &nbsp;
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong><?= $this->etude["nom_societe"]>=" " ? trim($this->etude["nom_societe"]) : trim($this->etude['prenom'])." ".trim($this->etude['nom']) ?> </strong>
                        <?php if($this->etude['typologie'] == 'entreprise'){ ?>
                            <br />au capital de <?= $this->etude['capital'] ?> Euros, Immatricul&eacute;(e) au RCS de <?= $this->etude['lieu_rcs'] ?> sous le N&deg;<?= trim($this->etude['num_rcs']) ?>,
                        <?php } ?>
                        <br />Dont le si&egrave;ge est situ&eacute; au <?= $this->etude['adresse'] ?>, <?= $this->etude['code_postal'] ?> <?= $this->etude['ville'] ?>,
                        <br />Repr&eacute;sent&eacute;(e) par <?= trim($this->etude["prenom_contact"])." ".trim($this->etude["nom_contact"]) ?>, 
                        <br />Ci-apr&egrave;s d&eacute;nomm&eacute;(e) <strong><?= $this->etude["nom_societe"]>=" " ? trim($this->etude["nom_societe"]) : trim($this->etude['prenom'])." ".trim($this->etude['nom']) ?> </strong></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>D&rsquo;une part, </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>et</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong><?= $this->setting1eachtimeDocument ?></strong> <?= $this->Setting1Document ?><br>
                        Association de loi 1901, N&deg; SIRET <?= $this->Setting2Document ?>, code NAF <?= $this->Setting3Document ?>, n&deg; URSSAF <?= $this->Setting4Document ?>,<br>
                        Dont le si&egrave;ge est situ&eacute; <?= $this->adresse_Document8 ?>, <?= $this->Setting5Document ?>, <br>
                        Repr&eacute;sent&eacute;e aux fins des pr&eacute;sentes par son pr&eacute;sident, <?= $this->Setting6Document ?>, <br>
                        Ci-apr&egrave;s d&eacute;nomm&eacute;e <strong><?= $this->setting1eachtimeDocument ?></strong>,
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>D&rsquo;autre part, </p><br>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Il a &eacute;t&eacute; pr&eacute;alablement rappel&eacute; que <strong><?= $this->setting1eachtimeDocument ?></strong>, 
                        est une Junior-Entreprise compos&eacute;e exclusivement d&rsquo;&eacute;l&egrave;ves de 
                        l&rsquo;ESSEC. Elle a pour vocation de compl&eacute;ter la formation th&eacute;orique 
                        dispens&eacute;e dans les &eacute;tablissements d&rsquo;enseignement sup&eacute;rieur par des 
                        applications pratiques en entreprise. <strong><?= $this->setting1eachtimeDocument ?></strong> est membre de la
                        Conf&eacute;d&eacute;ration Nationale des Junior-Entreprises.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>C&rsquo;est dans cet esprit que <strong><?= strip_tags(trim($this->etude["prenom_contact"]))." ".strip_tags(trim($this->etude["nom_contact"]),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?></strong>
                        a confi&eacute; &agrave; <strong><?= $this->setting1eachtimeDocument ?></strong> la r&eacute;alisation de l&rsquo;&eacute;tude d&eacute;finie ci-dessous.</p>

                </td>
            </tr>       
            <tr>
                <td>
                    <p>
                        La pr&eacute;sente convention a pour objet de d&eacute;finir les obligations
                        r&eacute;ciproques des parties et de pr&eacute;ciser les modalit&eacute;s d&rsquo;ex&eacute;cution de la mission.
                    </p>
                </td>
            </tr>   
            <tr>
                <td>
                    <p>
                        <u>Article 1</u> : DEFINITION DE L&rsquo;ETUDE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Il s&rsquo;agira pour <strong><?= $this->setting1eachtimeDocument ?></strong> 
                        de <?= $this->etude["descriptif"] ?>.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Cette &eacute;tude donne lieu &agrave; une analyse et une synth&egrave;se.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><u>Article 2</u> : CONTENU DE LA MISSION</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Les prestations &agrave; fournir par <?= $this->setting1eachtimeDocument ?> ont &eacute;t&eacute; pr&eacute;alablement &eacute;tablies dans l&rsquo;avant-projet r&eacute;dig&eacute; par <strong><?= $this->setting1eachtimeDocument ?></strong>,
                        accept&eacute; par <strong><?= $this->etude["nom_societe"]>=" " ? strip_tags(trim($this->etude["nom_societe"]),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') : strip_tags(trim($this->etude['prenom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')." 
                            ".  strip_tags(trim($this->etude['nom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?> </strong>
                        annex&eacute; &agrave; la pr&eacute;sente convention.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><u>Article 3</u> : COLLABORATION</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <strong><?= $this->etude["nom_societe"]>=" " ? strip_tags(trim($this->etude["nom_societe"]),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') : strip_tags(trim($this->etude['prenom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')." ".  strip_tags(trim($this->etude['nom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?> </strong>
                        est tenu d&rsquo;assurer une &eacute;troite collaboration 
                        avec <strong><?= $this->setting1eachtimeDocument ?></strong> 
                        afin de v&eacute;rifier, aussi souvent que l&rsquo;une des deux parties le jugera n&eacute;cessaire, l&rsquo;ad&eacute;quation entre la prestation fournie et les besoins tels qu&rsquo;ils auront &eacute;t&eacute; d&eacute;finis.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Dans l&rsquo;hypoth&egrave;se où l&rsquo;une ou l&rsquo;autre des deux parties consid&eacute;rerait 
                        que la mission ne s&rsquo;ex&eacute;cute plus conform&eacute;ment aux conditions initiales,
                        celles-ci conviendront de se rapprocher afin d&rsquo;examiner les possibilit&eacute;s 
                        d&rsquo;adaptation du cahier des charges en la forme d&rsquo;un avenant pr&eacute;vu &agrave; l&rsquo;article 8.
                    </p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>En cas de d&eacute;saccord persistant rendant impossible la poursuite 
                        de la collaboration, celle-ci pourra &ecirc;tre rompue &agrave; l&rsquo;initiative 
                        de l&rsquo;une ou l&rsquo;autre partie selon les conditions et modalit&eacute;s 
                        pr&eacute;vues &agrave; l&rsquo;article 9.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 4</u> : PRIX
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Le prix de la prestation r&eacute;alis&eacute;e par <strong><?= $this->setting1eachtimeDocument ?></strong>
                        dans le cadre de la pr&eacute;sente convention est fix&eacute; d&rsquo;un commun accord 
                        &agrave; <?= strip_tags(trim($this->etude['budget_fsi']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')?> Euros Hors Taxes (<?= int2str($this->etude['budget_fsi']) ?> Euros Hors Taxes) 
                        correspondant &agrave; <?= strip_tags(trim($this->etude['je']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')?> (<?= int2str($this->etude['je']) ?>) Jour(s)-Etude, conform&eacute;ment &agrave; la l&eacute;gislation
                        applicable aux Junior-Entreprises.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        De plus, les frais engag&eacute;s pour la r&eacute;alisation de l&rsquo;&eacute;tude sont 
                        &agrave; la charge du commanditaire sous r&eacute;serve de la pr&eacute;sentation des 
                        justificatifs correspondants. Les frais de d&eacute;placement seront en 
                        particulier rembours&eacute;s sur la base du kilom&egrave;tre fiscal fix&eacute; &agrave; 0.46 
                        Euros Hors Taxes.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Les prestations sont soumises &agrave; la TVA au taux en vigueur &agrave; 
                        la date de l&rsquo;&eacute;mission de la facture.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p><u>Article 5</u> : PAIEMENT DU PRIX</p>
                </td>
            </tr>     
            <tr>
                <td>
                    <p>
                       Le r&egrave;glement s&rsquo;effectuera selon les modalit&eacute;s suivantes : 50% 
                       &agrave; la signature de la convention et 50% &agrave; la signature de l&rsquo;attestation de fin de mission. 
                        <br /> 
                       Les frais (frais de d&eacute;placement, frais de reprographie…) seront r&eacute;gl&eacute;s en int&eacute;gralit&eacute; lors du r&egrave;glement du solde.
                    </p>
                </td>
            </tr>
                  <tr>
                <td>
                    <p>
                  <u>Article 6</u> : DELAIS DE REALISATION DE L&rsquo;ETUDE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>La prestation r&eacute;alis&eacute;e par <strong><?= $this->setting1eachtimeDocument ?></strong>
                        d&eacute;bute &agrave; la signature de la pr&eacute;sente convention et &agrave; la r&eacute;ception du r&egrave;glement de la facture d&rsquo;acompte.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                     Cette prestation s&rsquo;effectuera, ainsi que cela est indiqu&eacute; dans 
                     l&rsquo;avant-projet annex&eacute; &agrave; la pr&eacute;sente convention, sur une dur&eacute;e de 
                     3 semaines de la semaine 1 &agrave; la semaine 3.
                     <br>
                    </p>
                </td>
             </tr>
             <tr>
                 <td>
                     <p>
                    <u>Article 7</u> : RESPONSABILITES
                    </p>
                    </td>
            </tr>
            <tr>
                <td>
                    <p>Toute inex&eacute;cution de l&rsquo;une des quelconques obligations vis&eacute;es 
                        &agrave; la pr&eacute;sente convention engage la responsabilit&eacute; de son auteur.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Conform&eacute;ment aux articles 2 et 3 de la pr&eacute;sente convention, 
                        <strong><?= $this->setting1eachtimeDocument ?></strong> mettra tous ses moyens en œuvre 
                        pour la bonne r&eacute;alisation de sa mission.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Compte-tenu tant de la nature de la mission que de la sp&eacute;cificit&eacute; 
                        de <strong><?= $this->setting1eachtimeDocument ?></strong>, 
                        la responsabilit&eacute; de celle-ci ne pourra &ecirc;tre engag&eacute;e, sauf faute grave ou d&eacute;faut de moyen, en cas de d&eacute;faut de r&eacute;sultat.</p>

                </td>
            </tr>
                    <tr>
                <td>
                    <p>
                    <u>Article 8</u> : MODIFICATION DE LA CONVENTION
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>La pr&eacute;sente convention ne pourra &ecirc;tre modifi&eacute;e qu&rsquo;apr&egrave;s accord 
                        entre les parties.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                      Toute modification portant notamment sur le prix, le nombre de
                      Jour(s)-Etude, la nature des prestations ou les modalit&eacute;s 
                      d&rsquo;ex&eacute;cution des obligations fera l&rsquo;objet d&rsquo;un avenant &agrave; la 
                      pr&eacute;sente convention.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                    <u>Article 9</u> : RESILIATION
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>En cas de manquement aux obligations souscrites &agrave; la pr&eacute;sente 
                        convention et sans qu&rsquo;il y ait lieu d&rsquo;avoir recours au juge, 
                        l&rsquo;une ou l&rsquo;autre des parties qui se pr&eacute;vaut de l&rsquo;inex&eacute;cution 
                        des obligations ci-dessus vis&eacute;es, pourra, apr&egrave;s une mise en 
                        demeure notifi&eacute;e par lettre recommand&eacute;e avec accus&eacute; de 
                        r&eacute;ception et &agrave; l&rsquo;expiration d&rsquo;un d&eacute;lai de 29 jours suivant 
                        la notification, proc&eacute;der de mani&egrave;re unilat&eacute;rale &agrave; la 
                        r&eacute;siliation de la convention.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                       En cas de r&eacute;siliation anticip&eacute;e imputable au client, <strong>
                        <?= $this->setting1eachtimeDocument ?></strong>
                        pourra exiger le paiement des prestations accomplies jusqu&rsquo;&agrave; la date de rupture de la 
                        convention. Le montant des travaux sera calcul&eacute; au prorata du travail effectu&eacute; et les 
                        frais engag&eacute;s jusqu&rsquo;&agrave; la r&eacute;siliation pour la r&eacute;alisation partielle des travaux seront 
                        rembours&eacute;s sur pr&eacute;sentation de justificatifs.
                    </p>
                </td>
            </tr>
                    <tr>
                <td>
                    <p>
                        <u>Article 10</u> : CONFIDENTIALITE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Chacune des parties s&rsquo;engage &agrave; ne pas divulguer les informations 
                        ou documents qui lui auront &eacute;t&eacute; communiqu&eacute;s ou auxquels elle 
                        aurait pu avoir acc&egrave;s au cours de l&rsquo;ex&eacute;cution de la convention 
                        conclue entre elles, de quelque nature qu&rsquo;ils soient 
                        (&eacute;conomiques, techniques, etc.).<br>
                        Les parties se portent fort du respect par leur personnel et des 
                        tiers de la prise des mesures n&eacute;cessaires pour garantir la 
                        confidentialit&eacute; desdits documents et informations. 
                        Cette obligation de confidentialit&eacute; prendra fin dix ans &agrave; l&rsquo;issue 
                        de la pr&eacute;sente convention.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Les prestations sont soumises &agrave; la TVA au taux en vigueur &agrave; la date de l&rsquo;&eacute;mission 
                        de la facture.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                    <u>Article 11</u> : PROPRIETE DE L&rsquo;ETUDE
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Les techniques et m&eacute;thodes de recherche demeurent la propri&eacute;t&eacute; 
                        de <strong><?= $this->setting1eachtimeDocument ?></strong> 
                        et ne pourront faire l&rsquo;objet 
                        d&rsquo;aucune utilisation ou reproduction sans l&rsquo;accord express de 
                        celle-ci.</p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        L&rsquo;ensemble des travaux techniques et m&eacute;thodologiques n&eacute;cessaires 
                        &agrave; la r&eacute;alisation de l&rsquo;&eacute;tude demeure la propri&eacute;t&eacute; exclusive de 
                        <strong><?= $this->setting1eachtimeDocument ?></strong>
                        jusqu&rsquo;au paiement global effectu&eacute;, 
                        le rapport d&rsquo;&eacute;tude et/ou le mat&eacute;riel (questionnaires, rapport, 
                        grille d&rsquo;analyse) destin&eacute;s &agrave; l&rsquo;usage exclusif de
                        <strong><?= $this->etude["nom_societe"]>=" " ? strip_tags(trim($this->etude["nom_societe"])) : strip_tags(trim($this->etude['prenom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>')." ".  strip_tags(trim($this->etude['nom']),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?> </strong>
                        deviendront la propri&eacute;t&eacute; exclusive de ceux-ci.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                   <p>
                       <strong><?= $this->setting1eachtimeDocument ?></strong> et <strong><?= strip_tags(trim($this->etude["nom_societe"]),'<strong><u><ol><li><ul><sup><em><h1><h2><h3><h4><h5><h6>') ?></strong> 
                       s&rsquo;autorisent &agrave; utiliser leurs noms r&eacute;ciproques &agrave; titre de r&eacute;f&eacute;rence.
                       En revanche, la marque ESSEC est la propri&eacute;t&eacute; de l&rsquo;association 
                       &eacute;ducative <strong>ESSEC</strong> et ne peut pas &ecirc;tre utilis&eacute;e sans 
                       l&rsquo;accord explicite de ce dernier. 
                   </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 12</u> : LITIGES ET TRIBUNAUX COMPETENTS
                    </p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>En cas de litige les parties s&rsquo;engagent &agrave; rechercher, avant 
                        tout recours contentieux, une solution amiable.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                       En cas de d&eacute;saccord persistant, le litige sera port&eacute; devant 
                       la juridiction comp&eacute;tente (Tribunal d&rsquo;Instance ou de Grande 
                       Instance) dans le ressort de laquelle se trouve le si&egrave;ge de 
                       <strong><?= $this->setting1eachtimeDocument ?></strong>.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <u>Article 13</u> : PRISE D&rsquo;EFFET DE LA CONVENTION
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>La pr&eacute;sente convention prendra effet &agrave; compter de la signature 
                        du pr&eacute;sent document.</p><br>
                </td>
            </tr> 
        </table>
        <table style="margin-left: 140px">
            <tr>
                <td>
                    Fait &agrave; <?= $this->Setting7Document ?>
                </td>
            </tr>
             <tr>
                <td>
                    Le <?= date("d/m/Y")?>,
                </td>
            </tr>
              <tr>
                <td>
                    En deux exemplaires.
                    <br><br><br>
                </td>
            </tr>
        </table>
        <table align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
            <tr>
                <td style="width:420px;">Pour <strong> <?= $this->etude["nom_societe"]>=" " ? strip_tags(trim($this->etude["nom_societe"])) : strip_tags(trim($this->etude['prenom']))." ".  strip_tags(trim($this->etude['nom'])) ?>  </strong>
                    <br> (lu et approuv&eacute; et cachet de la soci&eacute;t&eacute;)<br><br><br>
                </td>
                <td style="width:420px;">Pour <strong><?= $this->setting1eachtimeDocument ?></strong>
                    <br>
                (lu et approuv&eacute; et cachet de la soci&eacute;t&eacute;)<br><br><br>
                </td>
            </tr>
            <tr>
                <td><strong><?= $this->etude["nom_societe"]>=" " ? strip_tags(trim($this->etude["nom_societe"])) : strip_tags(trim($this->etude['prenom']))." ".  strip_tags(trim($this->etude['nom'])) ?> </strong>
                </td>
                <td>Le Pr&eacute;sident<br>
                    <strong><?= $this->Setting6Document ?></strong>
                </td>
            </tr>
        </table>
    </page>
<?php } ?>
