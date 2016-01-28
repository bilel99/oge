<?php

function implodeParams($params) {
    $str = '';
    foreach ($params as $k => $v) {
        $str .= "/$k=$v";
    }
    return $str;
}

$smokeyMsgs = array(
    "add" => array("title" => "Étude added", "msg" => "New étude was added"),
    "edit" => array("title" => "Étude edited", "msg" => "A étude was edited"),
    "delete" => array("title" => "Étude removed", "msg" => "A étude was removed"),
    "etude_delete" => array("title" => "étude removed", "msg" => "A étude was removed"),
    "dashcdp" => array("title" => "Etude placer sur votre dashboard", "msg" => "Votre étude à bien été placer sur votre dashboard !"),
    "dashcdpIn" => array("title" => "Etude retirer de votre dashboard", "msg" => "Votre étude à bien été retirer de votre dashboard !"),
);
?>
<div>
    <div class="freeow freeow-top-right">
        <?php
        if (isset($_SESSION['smokey'])) { ?>
            <div class="smokey" style="opacity: 1; ">
                <div class="background">
                    <div class="info-msg">
                        <h2><?php echo $smokeyMsgs[$_SESSION['smokey']]['title']; ?></h2>
                        <p><?php echo $smokeyMsgs[$_SESSION['smokey']]['msg']; ?></p>
                    </div>
                </div>
                <span class="icon"></span>
                <span class="close"></span>
            </div>
            <?php unset($_SESSION['smokey']); ?>
        <?php
        } ?>
    </div>
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>ÉTUDES</strong></span></h1>
        </header>
        <div class="form-search">
            <form action="" method="post" id="searchContact">
                <label>Nom</label>
                <input type="text" name="nom" class="fiel" value="" />

                <!--input type="hidden" name="id_client" value="<?= $this->params[0] ?>" /-->
                <input type="submit" class="btn-search" value="Rechercher"/> 
            </form>
        </div>
        <div class="content cf">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc">Date</th>
                        <th class="sorting_asc">Num convention</th>
                        <th class="sorting_asc">Nom de l’étude</th>
                        <th class="sorting_asc">CDP origine</th>
                        <th class="sorting_asc">Statut</th>                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($_POST['nom'] == null){
                        if(count($this->cdpetude) > 0) { 
                            foreach ($this->cdpetude as $row){ ?>
                                <tr>
                                    <td><?= $row[updated] ?></td>
                                    <td><?= $row[num_convention] ?></td>
                                    <td><?= $row[nom_interne] ?></td>
                            <td><?= substr($this->cdp['nom'], 0, 1); ?> <?= $this->cdp['prenom']; ?></td>
                                    <td><?= $row[percentage] >= 0 ? 'En cours' : 'Terminée' ?></td>
                                    
                                </tr>
                            <?php
                            }
                        } 
                    }else{ 
                        if(count($this->cdpetude) > 0) { 
                            foreach ($this->searchEtudes as $search){ ?>
                            <tr>
                                <td><?= $search[updated] ?></td>
                                <td><?= $search[num_convention] ?></td>
                                <td><?= $search[nom_interne] ?></td>
                        <td><?= substr($this->cdp['nom'], 0, 1); ?> <?= $this->cdp['prenom']; ?></td>
                                <td><?= $search[percentage] >= 0 ? 'En cours' : 'Terminée' ?></td>
                                
                            </tr>
                        <?php }
                            }
                        } ?>
                                
                </tbody>
            </table>
            
            <div id="clients_paginate">
                <?php
                if (isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                    $np = $this->newParams;
                    $np['page'] --; ?>
                    <a href="<?= $this->lurl ?>/users/cdp/view/<?= $this->params[0] ?><?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
                    <?php
                    } else { ?>
                    <span class="num">Précédent</span>
                    <?php
                    } ?>
                <span class="num"><?= $this->newParams['page'] ?></span>
                <?php
                if ($this->countContacts > ($this->ini + $this->limit)) {
                    $np = $this->newParams;
                    $np['page'] ++;
                    ?>
                    <a href="<?= $this->lurl ?>/users/cdmp/view/<?= $this->params[0] ?><?= implodeParams($np) ?>" class="btn-pag" >Suivant</a>
                    <?php
                } else { ?>
                    <span class="num">Suivant</span>
                    <?php
                } ?>
            </div>
        </div>
        
        <div class="p1" style="position:relative; display: inline-block;">
            <p style="margin-left: -760px; margin-top: 30px;">Versement année en cours : <?= $this->versementAnneeCours[0][0] ?>€</p>
            <p style="margin-left: 660px; margin-top: -40px;">Versement année civile : <?= $this->versementAnneeCivil[0][0] ?>€</p>
        </div>
        
    </section>
    
    <div id="client-view-body" class="clearBoth">
        
    <?php if($this->cdp['role'] == 'president'){ ?>
        <section class="panel">
            <header class="title-panel cf">
                <h1><span><strong>Générer password</strong></span></h1>
                <br /><br />
                
                <center>
                    <a href="<?= $this->url ?>/users/cdp/edit/<?= $this->params[1] ?>">
                        <button class="button">Générer password</button>
                    </a>
                </center>

            </header><!-- /.title-panel -->
        </section>
    <?php } ?>
        
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>Informations CDP</strong> </h1>
        </header><!-- /.title-panel -->

        
        <div class="content cf">
            
            <!-- Bouton radio ajout dans home cdp -->
            <div class="column-form">
             <div class="row-form cf">   
                <label style="">Dashboard : </label>
                    <span>
                        <label class="radio" style="">
                            <input type="radio" name="dashboard" value="Oui" <?php if($this->cdp['dashboard'] == 2){ ?> checked="checked" <?php } ?> onclick="dashCdp(<?= $this->params[1] ?>)" />
                            Oui
                        </label>

                        <label class="radio" style="">
                            <input type="radio" name="dashboard" value="Non" <?php if($this->cdp['dashboard'] == 1){ ?> checked="checked" <?php } ?> onclick="dashCdpIn(<?= $this->params[1] ?>)" />
                            Non
                        </label>
                    </span>
             </div>
            </div>
            <!-- FIN -->
            
            <div class="column-form"><div class="row-form cf"><br /></div></div>
            
            
            
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Nom:</label>
                            <span><?= $this->cdp['nom'] ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Prenom:</label>
                            <span><?= $this->cdp['prenom'] ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Nom interne:</label>
                            <span><?= $this->cdp['nom_interne'] ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Telephone:</label>
                            <span><?= $this->cdp['telephone'] ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->

                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Adresse:</label>
                            <span><?= $this->cdp['adresse'] ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Ville:</label>
                            <span><?= $this->cdp['ville'] ?></span>
                        </div><!-- /.row-form -->
                        <div class="row-form cf">
                            <label>Code postal:</label>
                            <span><?= $this->cdp['code_postal'] ?></span>
                        </div><!-- /.row-form -->
                        <div class="row-form cf">
                            <label>Num ss:</label>
                            <span><?= $this->cdp['num_ss'] ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->
<!--                    <span><?= 'Reprise des informations de l’ajout + affichage du détail de l’évaluation : item + note' ?></span>-->
        </div><!-- /.content  -->
        <a href="<?= $this->lurl ?>/users/cdp/edit/<?= $this->params[1]; ?>"><button class="button">Régénérer le mot de passe</button></a>
    </section><!-- /.panel -->
    </div>
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>BV</strong></span></h1>
        </header><!-- /.title-panel -->

        <div class="content cf">
            <div class="synthese">
                <div class="column-info">
                    
                    <table style="margin-left: -12px;" id="datepicker" class="dataTable no-footer">
                        
                        <thead>
                            <tr role="row">
                                <th style="width: 100px;" class="sorting_asc">Date</th>
                                <th style="width: 100px;" class="sorting_asc">Etude</th>
                                <th style="width: 100px;" class="sorting_asc">Document</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- PAS DE BV POUR L'INSTANT DATE = 28/12/2015-->
                            <?php if(count($this->documentThis) == 0){ ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php }else{
                                        foreach ($this->documentThis as $d){  
                                            if($d['session_id_cdm'] == $this->params[1]){
                                                if($d['nature'] == 'Bulletin de versement (BV)'){ ?>
                                            
                                            <tr>
                                                <td><?= $d['added'] ?></td>
                                                <td><?= $d['cdps_nom_interne'] ?></td>
                                                <td><a href="<?= $this->url ?>/etudes/doc/<?= $d['etudes_id_etudes'] ?>/3" download="<?= $d['nom_document'] ?>"> <?= $d['nom_document'] ?> </a></td>
                                            </tr>
                                            
                                    <?php }
                                    }
                                }
                            }?>
                        </tbody>
                    </table>
                    
                </div>
            </div><!-- /.content -->
        </div>
    </section><!-- /.panel -->

</div>