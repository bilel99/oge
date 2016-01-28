<?php 
function implodeParams($params){
    $str = '';
    foreach($params as $k => $v){
        $str .= "/$k=$v";
    }
    return $str;
}

function getRechercherValues($nom, $tthis){
    $val = "";
    if(isset($tthis->newParams[$nom])) $val = $tthis->newParams[$nom];
    return $val;
}

$smokeyMsgs = array(
    "actif" => array("title" => "Document validé", "msg" => "Le document est désormais validé"),
    "inactif" => array("title" => "Document", "msg" => "Le document n’est plus validé"),
    "session_actif" => array("title" => "Document validé", "msg" => "Affichage des document validé"),
    "session_inactif" => array("title" => "Document inactif", "msg" => "Affichage des document inactif"),
    "session_non_valider" => array("title" => "Document non valider", "msg" => "Affichage des document non valider"),
    "non_valide" => array("title" => "Document", "msg" => "Le document n’a pas été validé"),

    
    );
?>


<div id="forms">
    <div class="freeow freeow-top-right">
        <?php if(isset($_SESSION['smokey'])) { ?>
            <div class="smokey" style="opacity: 1; ">
                <div class="background">
                    <div class="info-msg">
                        <h2><?php echo $smokeyMsgs[$_SESSION['smokey']]['title'];?></h2>
                        <p><?php echo $smokeyMsgs[$_SESSION['smokey']]['msg'];?></p>
                    </div>
                </div>
                <span class="icon"></span>
                <span class="close"></span>
            </div>
            <?php unset($_SESSION['smokey']); ?>
        <?php } ?>
    </div>
    
    <h1><span><strong>Document trésorier</strong></span></h1>
    
    <div id="formentre">
        <div class="form-entreprise form-error">
                <!-- EXPORT CDM PAIEMENT -->
                <a style="margin-left: 500px;" href="<?= $this->url ?>/tresorier/exportcdmpaiement" class="btn-search button-secondary" id="button-users">Export CDM Paiement </a>
                <!-- FIN -->
                
                <!-- EXPORT TVA -->
                <a style="" href="<?= $this->url ?>/tresorier/exporttva" class="btn-search button-secondary" id="button-users">Export TVA </a>
                <!-- FIN -->
                
                <!-- EXPORT Etude facture non payer -->
                    <a style="margin-left: 296px; margin-top: -31px;" href="<?= $this->url ?>/tresorier/exportetudes" class="btn-search button-secondary" id="button-users">Export Etudes </a>   
                <!-- FIN -->
                <br /><br />
                    
                <span class="button" href="#" onclick="sessionsDocActif()" style="cursor: pointer">Document validé</span>
            
                <span class="button" href="#" onclick="sessionsDocInactif()" style="cursor: pointer">Document en attente de validation</span>

                <span class="button" href="#" onclick="sessionsDocNonValider()" style="cursor: pointer">Document non valider</span>
            
            
                    <div class="content cf">
                        <table id="datepicker" class="dataTable no-footer">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">ID</th>
                                    <th class="sorting_asc">Nature</th>
                                    <th class="sorting_asc">Nom Du document</th>
                                    <th class="sorting_asc">Date de sortie</th>
                                    <th class="sorting_asc">Validation</th>
                                    <th class="sorting_asc">Nom & Prénom (rémunération)</th>
                                    <th class="sorting_asc">Etude</th>
                                    <th class="sorting_asc"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($this->doc as $doc) {
                                        
                                        if(isset($_SESSION['doc_actif'])){    
                                            if($doc['tresorier_validation'] == 1){ ?>
                                    <tr>
                                        <td><?= $doc['id_document'] ?></td>
                                        <td><?= $doc['nature'] ?></td>
                                        <td>
                                            <a class="doc_preview" href="<?= $this->url ?>/etudes/doc/<?= $doc['etudes_id_etudes'] ?>/<?= $doc['id_type_doc'] ?>/<?= $doc['id_document'] ?>"><?= $doc['nom_document'] ?></a> 
                                        </td>
                                        <td><?= $doc['date_sortie'] ?></td>
                                        <td>
                                            <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                <?= $doc['tresorier_validation']==1?'Validé':''  ?>
                                            <?php }else{
                                                echo '';
                                            } ?>
                                        </td>

                                        <td>
                                            <?php if ($doc['nature'] == 'Convention') {
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'] ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                <?php }

                                            }else if($doc['nature'] == 'Factures de frais') {
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'].' ('.$doc['ttcTotal'].' )' ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['ttcTotal'].' )' ?>
                                                <?php }

                                            }else if($doc['nature'] == 'Factures'){
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                <?php }

                                            }else if($doc['nature'] == 'Attestation de fin de mission'){
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'] ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                <?php }

                                            }else if($doc['nature'] == 'Accord de confidentialité'){
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'] ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                <?php }

                                            }else if($doc['nature'] == 'Avenant étudiant'){ ?>
                                                <?= $doc['cdms_nom'].' '.$doc['cdms_prenom'] ?>

                                            <?php }else if($doc['nature'] == 'Bulletin de versement (BV)'){
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'] ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                <?php }

                                            }else if($doc['nature'] == 'Avoirs'){
                                                if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                    <?= $doc['ogeClient_nom_societe'] ?>
                                                <?php }else{ ?>
                                                    <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                <?php }

                                            }?>
                                        </td>

                                        <td><?= $doc['nom_interne'] ?></td>
                                        <td>
                                            <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                <?php if($doc['tresorier_validation'] == 1){ ?>
                                                    <span href="#" onclick="validationDocDisable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-on.png" title="valider" /></span>
                                                <?php }else{ ?>
                                                    <span href="#" onclick="validationDocEnable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-off.png" title="non valider" /></span>
                                                    <span href="#" onclick="validationDocNoValide(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/delete.png" title="Supprimer" /></span>
                                                <?php } 
                                            }?>
                                        </td>
                                    </tr>
                                <?php }
                                    }else if(isset($_SESSION['doc_inactif'])){ 
                                        if($doc['tresorier_validation'] == 0){ ?>
                                            
                                        <tr>
                                            <td><?= $doc['id_document'] ?></td>
                                            <td><?= $doc['nature'] ?></td>
                                            <td>
                                                <a class="doc_preview" href="<?= $this->url ?>/etudes/doc/<?= $doc['etudes_id_etudes'] ?>/<?= $doc['id_type_doc'] ?>/<?= $doc['id_document'] ?>"><?= $doc['nom_document'] ?></a> 
                                            </td>
                                            <td><?= $doc['date_sortie'] ?></td>
                                            <td>
                                                <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                        <?= $doc['tresorier_validation']==0?'En attente de validation':'' ?>
                                                <?php }else{
                                                    echo '';
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($doc['nature'] == 'Convention') {
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Factures de frais') {
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'].' ('.$doc['ttcTotal'].' )' ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['ttcTotal'].' )' ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Factures'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Attestation de fin de mission'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Accord de confidentialité'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Avenant étudiant'){ ?>
                                                    <?= $doc['cdms_nom'].' '.$doc['cdms_prenom'] ?>

                                                <?php }else if($doc['nature'] == 'Bulletin de versement (BV)'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Avoirs'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }?>
                                            </td>
                                            <td><?= $doc['nom_interne'] ?></td>
                                            <td>
                                                <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                    <?php if($doc['tresorier_validation'] == 1){ ?>
                                                        <span href="#" onclick="validationDocDisable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-on.png" title="valider" /></span>
                                                    <?php }else{ ?>
                                                        <span href="#" onclick="validationDocEnable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-off.png" title="non valider" /></span>
                                                        <span href="#" onclick="validationDocNoValide(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/delete.png" title="Supprimer" /></span>
                                                    <?php } 
                                                }?>
                                            </td>
                                        </tr>
                                   
                                   <?php }
                                        }else if(isset($_SESSION['doc_non_valider'])){
                                            if($doc['tresorier_validation'] == 2){ ?>

                                                <tr>
                                                    <td><?= $doc['id_document'] ?></td>
                                                    <td><?= $doc['nature'] ?></td>
                                                    <td>
                                                        <a class="doc_preview" href="<?= $this->url ?>/etudes/doc/<?= $doc['etudes_id_etudes'] ?>/<?= $doc['id_type_doc'] ?>/<?= $doc['id_document'] ?>"><?= $doc['nom_document'] ?></a> 
                                                    </td>
                                                    <td><?= $doc['date_sortie'] ?></td>
                                                    <td>
                                                        <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                            <?= $doc['tresorier_validation']==2?'non validé':'' ?>
                                                        <?php }else{
                                                                echo '';
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($doc['nature'] == 'Convention') {
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'] ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                            <?php }

                                                        }else if($doc['nature'] == 'Factures de frais') {
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'].' ('.$doc['ttcTotal'].' )' ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['ttcTotal'].' )' ?>
                                                            <?php }

                                                        }else if($doc['nature'] == 'Factures'){
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                            <?php }

                                                        }else if($doc['nature'] == 'Attestation de fin de mission'){
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'] ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                            <?php }

                                                        }else if($doc['nature'] == 'Accord de confidentialité'){
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'] ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                            <?php }

                                                        }else if($doc['nature'] == 'Avenant étudiant'){ ?>
                                                            <?= $doc['cdms_nom'].' '.$doc['cdms_prenom'] ?>

                                                        <?php }else if($doc['nature'] == 'Bulletin de versement (BV)'){
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'] ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                            <?php }

                                                        }else if($doc['nature'] == 'Avoirs'){
                                                            if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                                <?= $doc['ogeClient_nom_societe'] ?>
                                                            <?php }else{ ?>
                                                                <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                            <?php }

                                                        }?>
                                                    </td>
                                                    <td><?= $doc['nom_interne'] ?></td>
                                                    <td>
                                                        <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                            <?php if($doc['tresorier_validation'] == 1){ ?>
                                                                <span href="#" onclick="validationDocDisable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-on.png" title="valider" /></span>
                                                            <?php }else{ ?>
                                                                <span href="#" onclick="validationDocEnable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-off.png" title="non valider" /></span>

                                                            <?php }
                                                        }?>
                                                    </td>
                                                </tr>

                                            <?php }
                                    }else{ ?>
                                        <tr>
                                            <td><?= $doc['id_document'] ?></td>
                                            <td><?= $doc['nature'] ?></td>
                                            <td>
                                                <a class="doc_preview" href="<?= $this->url ?>/etudes/doc/<?= $doc['etudes_id_etudes'] ?>/<?= $doc['id_type_doc'] ?>/<?= $doc['id_document'] ?>"><?= $doc['nom_document'] ?></a> 
                                            </td>
                                            <td><?= $doc['date_sortie'] ?></td>
                                            <td>
                                                <?php
                                                if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){
                                                        if ($doc['tresorier_validation'] == 0) {
                                                            echo 'En attente de validation';
                                                        } else if ($doc['tresorier_validation'] == 1) {
                                                            echo 'Validé';
                                                        } else if ($doc['tresorier_validation'] == 2) {
                                                            echo 'non validé';
                                                        }
                                                    }else{
                                                        echo '';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($doc['nature'] == 'Convention') {
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Factures de frais') {
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'].' ('.$doc['ttcTotal'].' )' ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['ttcTotal'].' )' ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Factures'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'].' ('.$doc['totalTtcFacture'].' )' ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Attestation de fin de mission'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Accord de confidentialité'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Avenant étudiant'){ ?>
                                                    <?= $doc['cdms_nom'].' '.$doc['cdms_prenom'] ?>

                                                <?php }else if($doc['nature'] == 'Bulletin de versement (BV)'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }else if($doc['nature'] == 'Avoirs'){
                                                    if ($doc['ogeClient_nom_societe'] != null) { ?>
                                                        <?= $doc['ogeClient_nom_societe'] ?>
                                                    <?php }else{ ?>
                                                        <?= $doc['ogeClient_nom'].' '.$doc['ogeClient_prenom'] ?>
                                                    <?php }

                                                }?>
                                            </td>
                                            <td><?= $doc['nom_interne'] ?></td>
                                            <td>
                                                <?php if($doc['nature'] != 'Convention'  && $doc['nature'] != 'Accord de confidentialité' && $doc['nature'] != 'Attestation de fin de mission' && $doc['nature'] != 'Avenant étudiant'){ ?>
                                                    <?php if($doc['tresorier_validation'] == 1){ ?>
                                                        <span href="#" onclick="validationDocDisable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-on.png" title="valider" /></span>
                                                    <?php }else{ ?>
                                                        <span href="#" onclick="validationDocEnable(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/Picto-off.png" title="non valider" /></span>
                                                        <span href="#" onclick="validationDocNoValide(<?= $doc['id_document'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/delete.png" title="Supprimer" /></span>
                                                    <?php } 
                                                }?>
                                            </td>
                                        </tr>
                                <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                </section>
            
        </div>
    </div> 
</div>
    
