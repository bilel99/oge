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
    "num_convention_existant" => array("title" => "Num Convention existant", "msg" => "Le num convention existe déjà !"),
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
    <div id="formentre">
        <div class="form-entreprise form-error">
            <div id="formrechercher">
                <section class="panel">
                    <form action="" method="post" id="etudes">
                        <header class="title-panel cf">
                            <h1><span><strong>Recherche</strong></span></h1>
                            <a href="<?= $this->url ?>/etudes/add" class="button button-secondary" id="add-contact-button" > Ajouter un etude</a>

                            

                        </header>
                        <div class="content container cf">
                            <div class="row">
                                <div class="col-1" >
                                    <label>Nom Société</label>
                                    <input name="nom_societe" type="text" class="field" value="<?= getRechercherValues("nom_societe", $this) ?>" />
                                </div>
                                <div class="col-2" >&nbsp;</div>
                                <div class="col-1" >
                                    <label>Numéro client</label>
                                    <input name="num_client" type="text" class="field" value="<?= getRechercherValues("num_client", $this) ?>" />
                                </div>
                            </div> 
                             
                            <div class="row">
                                <div class="col-1" >
                                    <label>Réalisée</label>
                                    <input name="date_crea" type="text" class="field" id="realisee" value="<?= getRechercherValues("date_crea", $this) ?>" />
                                </div>
                                <div class="col-2" >&nbsp;</div>
                                <div class="col-1" >
                                    <label>Et le</label>
                                    <input name="et_le" type="text" class="field" id="etle" value="<?= getRechercherValues("et_le", $this) ?>" />
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-1" >
                                    <label>Date début</label>
                                    <input name="date_debut" type="text" class="field" id="date_debut" value="<?= getRechercherValues("date_debut", $this) ?>" /> 
                                </div>
                                <div class="col-2" >&nbsp;</div>
                                <div class="col-1" >
                                    <label>Date fin</label>
                                    <input name="date_fin" type="text" class="field" id="datefin" value="<?= getRechercherValues("date_fin", $this) ?>" />
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-1" >
                                    <label>Nom interne</label>
                                    <input name="nom_interne" type="text" class="field" value="<?= getRechercherValues("nom_interne", $this) ?>"/>
                                </div>
                                <div class="col-2" >&nbsp;</div>
                                <div class="col-1" >
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-1" >
                                    <label>&nbsp;</label>
                                    <input type="submit" class="button" value="Valider" id="valider" />
                                </div>
                                <div class="col-2" >&nbsp;</div>
                                <div class="col-1" >
                                    <label>&nbsp;</label>
                                    <input id="reset" type="reset" class="button button-secondary" value="Remise á zéro" />
                                </div>
                            </div> 
                        </div>
                  </form>
            </div>     
                    <div class="content cf">
                        <table id="datepicker" class="dataTable no-footer">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">ID</th>
                                    <th class="sorting_asc">N° Convention</th>
                                    <th class="sorting_asc">Date début</th>
                                    <th class="sorting_asc">Date fin</th>
                                    <th class="sorting_asc">Num client</th>
                                    <th class="sorting_asc">Nom société</th>
                                    <th class="sorting_asc">Nom prenom contact</th>
                                    <th class="sorting_asc">nom interne</th>
                                    <th class="sorting_asc">Détails</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        $i = 1;
                                        foreach ($this->etudes as $etudes) {
                                    ?>
                                    <tr>
                                        <td><?= $etudes['id_etudes']?></td>
                                        <td><?= $etudes['num_convention'] ?></td>
                                        <td><?= $etudes['date_debut'] ?></td>
                                        <td><?= $etudes['date_fin'] ?></td>
                                        <td><?= $etudes['id_oge_client']?></td>
                                        <td><?= $etudes['nom_societe']?></td>
                                        <td><?= $etudes['nom_contact'].' '.$etudes['prenom_contact']?></td>
                                        <td><a href="<?= $this->url ?>/etudes/edit/<?= $etudes['id_etudes'] ?>"><?= $etudes['nom_interne']?></a></td>
                                        <td>
                                            <a href="<?= $this->url ?>/etudes/edit/<?= $etudes['id_etudes'] ?>">
                                                <img src="<?= $this->surl ?>/images/admin/modif.png" title="Voir" />
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        $i++;
                                        }
                                    ?>
                                
                            </tbody>
                        </table>
                        <div id="clients_paginate">
                            <?php if(isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                                $np = $this->newParams;
                                $np['page']--;?>
                                <a href="<?= $this->lurl ?>/etudes<?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
                            <?php } else { ?>
                                <span class="num">Précédent</span>
                            <?php } ?>
                            <span class="num"><?= $this->newParams['page'] ?></span>
                            <?php if($this->etudesClients > ($this->ini + $this->limit)) {
                                    $np = $this->newParams;
                                    $np['page']++;
                                    ?>
                                <a href="<?= $this->lurl ?>/etudes<?= implodeParams($np) ?>" class="btn-pag" >Suivant</a>
                            <?php } else { ?>
                                <span class="num">Suivant</span>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            
        </div>
    </div> 
</div>
    
