<?php if ($this->params[2] != 'preview' && $this->params[2] != 'pdf' && $this->params[2] != null) { ?>
	<title>ACCORD DE CONFIDENTIALITE</title>
    <page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" >
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
            <tr>
                <td align="center"><u><b style="font-size:32px">ACCORD DE CONFIDENTIALITE</b></u></td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 40px;"><u><b style="font-size:24px">relatif &agrave; la convention n&deg; <?= $this->info_doc[0]['etudes_num_convention'] ?></b></u></td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;"><u>Entre les parties soussign&eacute;es</u> :</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">
                    <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?>, <?= $this->info_doc[0]['Setting1Document'] ?>,<br>
                    Association de loi 1901, N&deg; SIRET <?= $this->info_doc[0]['Setting2Document'] ?>,<br> 
                    Code NAF <?= $this->info_doc[0]['Setting3Document'] ?>, N&deg; URSSAF <?= $this->info_doc[0]['Setting4Document'] ?>,<br>
                    Dont le si&egrave;ge est situ&eacute; <?= $this->info_doc[0]['Setting5Document'] ?>,<br>
                    Repr&eacute;sent&eacute;e aux fins des pr&eacute;sentes par son pr&eacute;sident, <?= $this->info_doc[0]['Setting6Document'] ?>,<br>
                    Ci-apr&egrave;s d&eacute;nomm&eacute;e : « l&rsquo;ASSOCIATION »
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px">
                    D&rsquo;une part,
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 10px">
                    Et:
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 10px">
                    <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>,
                    <?php if($this->info_doc[0]['ogeClient_typologie'] == 'entreprise'){ ?>
                        au capital de <?= $this->info_doc[0]['ogeClient_capital']?> euros,<br>
                        Immatricul&eacute;e au RCS de <?= $this->info_doc[0]['ogeClient_lieu_rcs']?> sous le N&deg;<?= $this->info_doc[0]['ogeClient_num_rcs']?>,<br>
                    <?php } ?>
                    Dont le si&egrave;ge est situ&eacute; au <?= $this->info_doc[0]['ogeClient_adresse'] ?>, <?= $this->info_doc[0]['ogeClient_code_postal'] ?> <?= $this->info_doc[0]['ogeClient_ville'] ?><br>
                    Repr&eacute;sent&eacute;e aux fins des pr&eacute;sentes par <?= $this->info_doc[0]['contacts_prenom_contact'] ?> <?= $this->info_doc[0]['contacts_nom_contact'] ?>, d&ucirc;ment
                    habilit&eacute; &agrave; l&rsquo;effet des pr&eacute;sentes,<br>
                    Ci-apr&egrave;s d&eacute;nomm&eacute;e <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>,<br>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    D&rsquo;autre part,
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Ci-apr&egrave;s d&eacute;nomm&eacute;es individuellement la « Partie », et collectivement 
                    les « Parties »,
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><u>Etant pr&eacute;alablement rappel&eacute; ce qui suit</u> :</td>
            </tr>
            <tr>
                <td>
                    <ol>
                        <li style="padding-bottom: 20px;">L&rsquo;ASSOCIATION a une comp&eacute;tence en mati&egrave;re d&rsquo;analyse 
                            marketing et dispose d&rsquo;une exp&eacute;rience et d&rsquo;un savoir-faire 
                            en ce qui concerne la r&eacute;alisation d&rsquo;&eacute;tudes, pour lesquelles 
                            elle a d&eacute;velopp&eacute; des m&eacute;thodologies adapt&eacute;es.</li>
                        <li style="padding-bottom: 20px;"><?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> a fait appel &agrave; l&rsquo;ASSOCIATION pour 
                            <?= $this->info_doc[0]['accordConfidentialite_settings1'] ?></li>
                        <li style="padding-bottom: 20px;">Dans le cadre de cette 
                            mission, <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> peut &ecirc;tre amen&eacute; &agrave; divulguer un 
                            certain nombre d&rsquo;informations confidentielles de nature
                            commerciale, strat&eacute;gique, technique ou financi&egrave;re &agrave; l&rsquo;ASSOCIATION.</li>
                        <li style="padding-bottom: 20px;">Les Parties d&eacute;sirent donc 
                            arr&ecirc;ter les conditions de divulgation de ces informations 
                            confidentielles et fixer les r&egrave;gles relatives &agrave; leur utilisation 
                            et &agrave; leur protection par l&rsquo;ASSOCIATION.</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><u>En cons&eacute;quence il a &eacute;t&eacute; convenu ce qui suit</u> :</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 1</u> : OBJET
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    L&rsquo;objet du pr&eacute;sent accord est de prot&eacute;ger les informations confidentielles
                    (ci-apr&egrave;s d&eacute;nomm&eacute;es « Informations Confidentielles ») transmises 
                    par <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> &agrave; l&rsquo;ASSOCIATION.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 2</u> : DEFINITION DES INFORMATIONS CONFIDENTIELLES
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  Dans le cadre du pr&eacute;sent accord, les Informations Confidentielles 
                  recouvrent toutes informations ou donn&eacute;es de toute nature et notamment
                  techniques, commerciales ou financi&egrave;res transmises par <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> 
                  &agrave; l&rsquo;ASSOCIATION ou port&eacute;es &agrave; la connaissance de l&rsquo;ASSOCIATION par 
                  &eacute;crit ou par oral ; la transmission des Informations Confidentielles 
                  pouvant &ecirc;tre assur&eacute;e par tout moyen incluant sans limitation tous
                  documents, &eacute;chantillons, mod&egrave;les ou tout autre support de divulgation 
                  de l&rsquo;information pouvant &ecirc;tre choisis pendant la p&eacute;riode de validit&eacute; de 
                  cet accord.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 3</u> : UTILISATION DES INFORMATIONS CONFIDENTIELLES
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  L&rsquo;ASSOCIATION s&rsquo;engage &agrave; n&rsquo;utiliser les Informations Confidentielles 
                  qu&rsquo;avec pour seul objet de mener &agrave; bien la r&eacute;alisation de la Mission 
                  qui lui a &eacute;t&eacute; confi&eacute;e. Elles ne pourront &ecirc;tre utilis&eacute;es pour d&rsquo;autres 
                  objectifs.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 4</u> : OBLIGATIONS DE L&rsquo;ASSOCIATION
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  L&rsquo;ASSOCIATION qui aura re&ccedil;u les Informations Confidentielles s&rsquo;engage pendant la dur&eacute;e de l&rsquo;accord &agrave; ce que celles-ci :
                  <Ol type="a">
                      <li style="padding-bottom: 20px"> Soient prot&eacute;g&eacute;es et gard&eacute;es strictement confidentielles 
                          et soient trait&eacute;es avec le degr&eacute; le plus extr&ecirc;me de pr&eacute;caution et protection ;</li>
                      <li style="padding-bottom: 20px">Ne soient divulgu&eacute;es qu&rsquo;aux seuls associ&eacute;s et membres de
                          son personnel ayant &agrave; les connaître sous r&eacute;serve que ces 
                          derniers s&rsquo;engagent &agrave; respecter les obligations de confidentialit&eacute; 
                          contenues dans le pr&eacute;sent accord ainsi qu&rsquo;&agrave; tout tiers pr&eacute;alablement 
                          agr&eacute;&eacute; par &eacute;crit par <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>, &eacute;tant entendu que l&rsquo;ASSOCIATION
                          divulguant les Informations Confidentielles garantit express&eacute;ment 
                          le respect, par ses membres et son personnel ou par tout tiers agr&eacute;&eacute; 
                          par <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>, des obligations pr&eacute;vues dans le pr&eacute;sent accord ;</li>
                         <li style="padding-bottom: 20px">Ne soient divulgu&eacute;es ni 
                             susceptibles d&rsquo;&ecirc;tre divulgu&eacute;es, soit directement ou
                             indirectement &agrave; tout tiers ou &agrave; toutes personnes autres 
                             que celles mentionn&eacute;es &agrave; l&rsquo;alin&eacute;a b) ci-dessus ;</li>
                         <li style="padding-bottom: 20px">Ne soient ni copi&eacute;es, ni 
                             reproduites, ni dupliqu&eacute;es totalement ou partiellement 
                             pour ses besoins propres, lorsque de telles copies, 
                             reproductions ou duplications n&rsquo;ont pas &eacute;t&eacute; autoris&eacute;es 
                             par <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>.</li>

                  </Ol>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">
                    <u>Article 5</u> : LIMITATION DES OBLIGATIONS
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20">
                    L&rsquo;engagement de confidentialit&eacute; ne s&rsquo;applique pas aux Informations Confidentielles :
                </td>
            </tr>
            <tr>
                <td>
                    <ol type="a">
                        <li style="padding-bottom: 20px;">Qui sont entr&eacute;es dans le domaine public pr&eacute;alablement &agrave; 
                            la date de divulgation ou communication ou qui tomberont
                            dans le domaine public apr&egrave;s leur communication et/ou 
                            divulgation sans que la cause ne soit imputable &agrave; 
                            l&rsquo;ASSOCIATION ;</li>
                        <li style="padding-bottom: 20px;">
                            Dont il peut &ecirc;tre d&eacute;montr&eacute; qu&rsquo;elles sont d&eacute;j&agrave; connues 
                            de l&rsquo;ASSOCIATION avant leur transmission ;
                        </li>
                         <li style="padding-bottom: 20px;">Qui auront &eacute;t&eacute; re&ccedil;ues d&rsquo;un tiers de mani&egrave;re licite, sans 
                             violation du pr&eacute;sent accord ;
                        </li>
                         <li style="padding-bottom: 20px;">Que la loi, la r&eacute;glementation applicable ou une d&eacute;cision 
                           de justice obligeraient &agrave; divulguer.
                        </li>
                    </ol>
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 6</u> : DUREE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  La dur&eacute;e du pr&eacute;sent accord est de dix (10) ans &agrave; compter de sa 
                  signature par les Parties.
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 7</u> : PROPRIETE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  Toutes les informations Confidentielles et leurs reproductions 
                  transmises resteront la propri&eacute;t&eacute; de Carine GUICHETEAU et devront 
                  &ecirc;tre restitu&eacute;es &agrave; <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> imm&eacute;diatement sur sa demande.
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
              La divulgation d&rsquo;Informations Confidentielles au titre du pr&eacute;sent accord
              ne peut en aucun cas &ecirc;tre interpr&eacute;t&eacute;e comme conf&eacute;rant de mani&egrave;re expresse 
              ou implicite &agrave; l&rsquo;ASSOCIATION un droit (aux termes d&rsquo;une licence ou par tout
              autre moyen) sur les documents, mati&egrave;res ou inventions auxquelles se 
              rapportent ces Informations Confidentielles.
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 8</u> : INTUITU PERSONAE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                 Le pr&eacute;sent accord &eacute;tant conclu intuitu personae, les Parties s&rsquo;engagent 
                 &agrave; ne pas le c&eacute;der ou le transf&eacute;rer sous quelque forme que ce soit &agrave; un 
                 tiers quel qu&rsquo;il soit, y compris &agrave; une soci&eacute;t&eacute; m&egrave;re ou une filiale..
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 9</u> : PORTEE DE L&rsquo;ACCORD
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                 Aucune disposition contenue dans le pr&eacute;sent accord ne peut &ecirc;tre 
                 interpr&eacute;t&eacute;e comme obligeant <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?> &agrave; divulguer des 
                 Informations Confidentielles &agrave; l&rsquo;ASSOCIATION ou &agrave; se lier 
                 contractuellement avec cette derni&egrave;re.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                Les Parties conviennent que le pr&eacute;sent accord ne peut &ecirc;tre interpr&eacute;t&eacute; 
                comme la cr&eacute;ation d&rsquo;une entit&eacute; commune ni comme une association ou 
                partenariat de quelque nature que ce soit.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 10</u> : LITIGES
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                Tous diff&eacute;rends entre les Parties relatifs &agrave; la validit&eacute;, l&rsquo;interpr&eacute;tation,
                l&rsquo;ex&eacute;cution et la r&eacute;siliation du pr&eacute;sent accord que les Parties ne 
                pourraient r&eacute;soudre &agrave; l&rsquo;amiable, seront soumis aux tribunaux comp&eacute;tents
                de Paris.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 11</u> : DROIT APPLICABLE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                Le pr&eacute;sent accord est r&eacute;gi par le droit fran&ccedil;ais.
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    Fait &agrave; <?= $this->info_doc[0]['Setting7Document'] ?>, le <?= $this->info_doc[0]['fait_leDate'];?><br>
                    En deux exemplaires originaux
                </td>
            </tr>
        </table>
        <table align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
            <tr>
                <td align="left" style="width: 320px;">
                    <b>Pour <?= $this->info_doc[0]['Setting1eachtimeDocument'] ?>,</b>
                </td>
                <td align="right" style="width: 320px">
                    <b>Pour <?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?>,</b>
                </td>
            </tr>
             <tr>
                <td align="left">
                    <b><?= $this->info_doc[0]['Setting6Document'] ?></b>
                </td>
                <td align="right">
                    <b><?= $this->info_doc[0]['ogeClient_typologie'] == 'particulier' ? $this->info_doc[0]['ogeClient_prenom'].' '.$this->info_doc[0]['ogeClient_nom'] : $this->info_doc[0]['ogeClient_nom_societe'] ?></b>
                </td>
            </tr>
        </table>
    </page>
<?php }else{ ?>
    <page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" >
        <table style="width: <?= $this->etude["type"] == "pdf" ? '100%' : '80%' ?>;" align="center">
            <tr>
                <td align="center"><u><b style="font-size:32px">ACCORD DE CONFIDENTIALITE</b></u></td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 40px;"><u><b style="font-size:24px">relatif &agrave; la convention n&deg; <?= $this->etude["num_convention"] ?></b></u></td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;"><u>Entre les parties soussign&eacute;es</u> :</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">
                    <?= $this->setting1eachtimeDocument ?>, <?= $this->Setting1Document ?>,<br>
                    Association de loi 1901, N&deg; SIRET <?= $this->Setting2Document ?>,<br> 
                    Code NAF <?= $this->Setting3Document ?>, N&deg; URSSAF <?= $this->Setting4Document ?>,<br>
                    Dont le si&egrave;ge est situ&eacute; <?= $this->Setting5Document ?>,<br>
                    Repr&eacute;sent&eacute;e aux fins des pr&eacute;sentes par son pr&eacute;sident, <?= $this->Setting6Document ?>,<br>
                    Ci-apr&egrave;s d&eacute;nomm&eacute;e : « l&rsquo;ASSOCIATION »
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px">
                    D&rsquo;une part,
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 10px">
                    Et:
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 10px">
                    <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>,
                    <?php if($this->etude['typologie'] == 'entreprise'){ ?>
                        au capital de <?= $this->etude['capital'] ?> euros,<br>
                        Immatricul&eacute;e au RCS de <?= $this->etude['lieu_rcs'] ?> sous le N&deg;<?= $this->etude['num_rcs'] ?>,<br>
                    <?php } ?>
                    Dont le si&egrave;ge est situ&eacute; au <?= $this->etude['adresse'] ?>, <?= $this->etude['code_postal'] ?> <?= $this->etude['ville'] ?><br>
                    Repr&eacute;sent&eacute;e aux fins des pr&eacute;sentes par <?= $this->etude['prenom_contact'] ?> <?= $this->etude['nom_contact'] ?>, d&ucirc;ment
                    habilit&eacute; &agrave; l&rsquo;effet des pr&eacute;sentes,<br>
                    Ci-apr&egrave;s d&eacute;nomm&eacute;e <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>,<br>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    D&rsquo;autre part,
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Ci-apr&egrave;s d&eacute;nomm&eacute;es individuellement la « Partie », et collectivement 
                    les « Parties »,
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><u>Etant pr&eacute;alablement rappel&eacute; ce qui suit</u> :</td>
            </tr>
            <tr>
                <td>
                    <ol>
                        <li style="padding-bottom: 20px;">L&rsquo;ASSOCIATION a une comp&eacute;tence en mati&egrave;re d&rsquo;analyse 
                            marketing et dispose d&rsquo;une exp&eacute;rience et d&rsquo;un savoir-faire 
                            en ce qui concerne la r&eacute;alisation d&rsquo;&eacute;tudes, pour lesquelles 
                            elle a d&eacute;velopp&eacute; des m&eacute;thodologies adapt&eacute;es.</li>
                        <li style="padding-bottom: 20px;"><?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> a fait appel &agrave; l&rsquo;ASSOCIATION pour 
                            <?= $this->elements[0]["value"] ?></li>
                        <li style="padding-bottom: 20px;">Dans le cadre de cette 
                            mission, <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> peut &ecirc;tre amen&eacute; &agrave; divulguer un 
                            certain nombre d&rsquo;informations confidentielles de nature
                            commerciale, strat&eacute;gique, technique ou financi&egrave;re &agrave; l&rsquo;ASSOCIATION.</li>
                        <li style="padding-bottom: 20px;">Les Parties d&eacute;sirent donc 
                            arr&ecirc;ter les conditions de divulgation de ces informations 
                            confidentielles et fixer les r&egrave;gles relatives &agrave; leur utilisation 
                            et &agrave; leur protection par l&rsquo;ASSOCIATION.</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;"><u>En cons&eacute;quence il a &eacute;t&eacute; convenu ce qui suit</u> :</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 1</u> : OBJET
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    L&rsquo;objet du pr&eacute;sent accord est de prot&eacute;ger les informations confidentielles
                    (ci-apr&egrave;s d&eacute;nomm&eacute;es « Informations Confidentielles ») transmises 
                    par <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> &agrave; l&rsquo;ASSOCIATION.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 2</u> : DEFINITION DES INFORMATIONS CONFIDENTIELLES
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  Dans le cadre du pr&eacute;sent accord, les Informations Confidentielles 
                  recouvrent toutes informations ou donn&eacute;es de toute nature et notamment
                  techniques, commerciales ou financi&egrave;res transmises par <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> 
                  &agrave; l&rsquo;ASSOCIATION ou port&eacute;es &agrave; la connaissance de l&rsquo;ASSOCIATION par 
                  &eacute;crit ou par oral ; la transmission des Informations Confidentielles 
                  pouvant &ecirc;tre assur&eacute;e par tout moyen incluant sans limitation tous
                  documents, &eacute;chantillons, mod&egrave;les ou tout autre support de divulgation 
                  de l&rsquo;information pouvant &ecirc;tre choisis pendant la p&eacute;riode de validit&eacute; de 
                  cet accord.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 3</u> : UTILISATION DES INFORMATIONS CONFIDENTIELLES
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  L&rsquo;ASSOCIATION s&rsquo;engage &agrave; n&rsquo;utiliser les Informations Confidentielles 
                  qu&rsquo;avec pour seul objet de mener &agrave; bien la r&eacute;alisation de la Mission 
                  qui lui a &eacute;t&eacute; confi&eacute;e. Elles ne pourront &ecirc;tre utilis&eacute;es pour d&rsquo;autres 
                  objectifs.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 4</u> : OBLIGATIONS DE L&rsquo;ASSOCIATION
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  L&rsquo;ASSOCIATION qui aura re&ccedil;u les Informations Confidentielles s&rsquo;engage pendant la dur&eacute;e de l&rsquo;accord &agrave; ce que celles-ci :
                  <Ol type="a">
                      <li style="padding-bottom: 20px"> Soient prot&eacute;g&eacute;es et gard&eacute;es strictement confidentielles 
                          et soient trait&eacute;es avec le degr&eacute; le plus extr&ecirc;me de pr&eacute;caution et protection ;</li>
                      <li style="padding-bottom: 20px">Ne soient divulgu&eacute;es qu&rsquo;aux seuls associ&eacute;s et membres de
                          son personnel ayant &agrave; les connaître sous r&eacute;serve que ces 
                          derniers s&rsquo;engagent &agrave; respecter les obligations de confidentialit&eacute; 
                          contenues dans le pr&eacute;sent accord ainsi qu&rsquo;&agrave; tout tiers pr&eacute;alablement 
                          agr&eacute;&eacute; par &eacute;crit par <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>, &eacute;tant entendu que l&rsquo;ASSOCIATION
                          divulguant les Informations Confidentielles garantit express&eacute;ment 
                          le respect, par ses membres et son personnel ou par tout tiers agr&eacute;&eacute; 
                          par <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>, des obligations pr&eacute;vues dans le pr&eacute;sent accord ;</li>
                         <li style="padding-bottom: 20px">Ne soient divulgu&eacute;es ni 
                             susceptibles d&rsquo;&ecirc;tre divulgu&eacute;es, soit directement ou
                             indirectement &agrave; tout tiers ou &agrave; toutes personnes autres 
                             que celles mentionn&eacute;es &agrave; l&rsquo;alin&eacute;a b) ci-dessus ;</li>
                         <li style="padding-bottom: 20px">Ne soient ni copi&eacute;es, ni 
                             reproduites, ni dupliqu&eacute;es totalement ou partiellement 
                             pour ses besoins propres, lorsque de telles copies, 
                             reproductions ou duplications n&rsquo;ont pas &eacute;t&eacute; autoris&eacute;es 
                             par <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>.</li>

                  </Ol>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px">
                    <u>Article 5</u> : LIMITATION DES OBLIGATIONS
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20">
                    L&rsquo;engagement de confidentialit&eacute; ne s&rsquo;applique pas aux Informations Confidentielles :
                </td>
            </tr>
            <tr>
                <td>
                    <ol type="a">
                        <li style="padding-bottom: 20px;">Qui sont entr&eacute;es dans le domaine public pr&eacute;alablement &agrave; 
                            la date de divulgation ou communication ou qui tomberont
                            dans le domaine public apr&egrave;s leur communication et/ou 
                            divulgation sans que la cause ne soit imputable &agrave; 
                            l&rsquo;ASSOCIATION ;</li>
                        <li style="padding-bottom: 20px;">
                            Dont il peut &ecirc;tre d&eacute;montr&eacute; qu&rsquo;elles sont d&eacute;j&agrave; connues 
                            de l&rsquo;ASSOCIATION avant leur transmission ;
                        </li>
                         <li style="padding-bottom: 20px;">Qui auront &eacute;t&eacute; re&ccedil;ues d&rsquo;un tiers de mani&egrave;re licite, sans 
                             violation du pr&eacute;sent accord ;
                        </li>
                         <li style="padding-bottom: 20px;">Que la loi, la r&eacute;glementation applicable ou une d&eacute;cision 
                           de justice obligeraient &agrave; divulguer.
                        </li>
                    </ol>
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 6</u> : DUREE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  La dur&eacute;e du pr&eacute;sent accord est de dix (10) ans &agrave; compter de sa 
                  signature par les Parties.
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 7</u> : PROPRIETE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                  Toutes les informations Confidentielles et leurs reproductions 
                  transmises resteront la propri&eacute;t&eacute; de Carine GUICHETEAU et devront 
                  &ecirc;tre restitu&eacute;es &agrave; <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> imm&eacute;diatement sur sa demande.
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
              La divulgation d&rsquo;Informations Confidentielles au titre du pr&eacute;sent accord
              ne peut en aucun cas &ecirc;tre interpr&eacute;t&eacute;e comme conf&eacute;rant de mani&egrave;re expresse 
              ou implicite &agrave; l&rsquo;ASSOCIATION un droit (aux termes d&rsquo;une licence ou par tout
              autre moyen) sur les documents, mati&egrave;res ou inventions auxquelles se 
              rapportent ces Informations Confidentielles.
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 8</u> : INTUITU PERSONAE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                 Le pr&eacute;sent accord &eacute;tant conclu intuitu personae, les Parties s&rsquo;engagent 
                 &agrave; ne pas le c&eacute;der ou le transf&eacute;rer sous quelque forme que ce soit &agrave; un 
                 tiers quel qu&rsquo;il soit, y compris &agrave; une soci&eacute;t&eacute; m&egrave;re ou une filiale..
                </td>
            </tr>
              <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 9</u> : PORTEE DE L&rsquo;ACCORD
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                 Aucune disposition contenue dans le pr&eacute;sent accord ne peut &ecirc;tre 
                 interpr&eacute;t&eacute;e comme obligeant <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?> &agrave; divulguer des 
                 Informations Confidentielles &agrave; l&rsquo;ASSOCIATION ou &agrave; se lier 
                 contractuellement avec cette derni&egrave;re.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                Les Parties conviennent que le pr&eacute;sent accord ne peut &ecirc;tre interpr&eacute;t&eacute; 
                comme la cr&eacute;ation d&rsquo;une entit&eacute; commune ni comme une association ou 
                partenariat de quelque nature que ce soit.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 10</u> : LITIGES
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                Tous diff&eacute;rends entre les Parties relatifs &agrave; la validit&eacute;, l&rsquo;interpr&eacute;tation,
                l&rsquo;ex&eacute;cution et la r&eacute;siliation du pr&eacute;sent accord que les Parties ne 
                pourraient r&eacute;soudre &agrave; l&rsquo;amiable, seront soumis aux tribunaux comp&eacute;tents
                de Paris.
                </td>
            </tr>
             <tr>
                <td style="padding-bottom: 20px;">
                    <u>Article 11</u> : DROIT APPLICABLE
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                Le pr&eacute;sent accord est r&eacute;gi par le droit fran&ccedil;ais.
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">
                    Fait &agrave; <?= $this->Setting7Document ?>, le <?= date('d/m/Y');?><br>
                    En deux exemplaires originaux
                </td>
            </tr>
        </table>
        <table align="<?= $this->etude["type"] == "pdf" ? 'left' : 'center' ?>" >
            <tr>
                <td align="left" style="width: 320px;">
                    <b>Pour <?= $this->setting1eachtimeDocument ?>,</b>
                </td>
                <td align="right" style="width: 320px">
                    <b>Pour <?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?>,</b>
                </td>
            </tr>
             <tr>
                <td align="left">
                    <b><?= $this->Setting6Document ?></b>
                </td>
                <td align="right">
                    <b><?= $this->etude['typologie'] == 'particulier' ? $this->etude['prenom'].' '.$this->etude['nom'] : $this->etude['nom_societe'] ?></b>
                </td>
            </tr>
        </table>
    </page>
<?php } ?>