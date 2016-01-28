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
    if(isset($tthis->newParams[$nom])) $val = urldecode ($tthis->newParams[$nom]);
    return $val;
}

$smokeyMsgs = array(
    "add" => array("title" => "Contact added", "msg" => "New contact was added"),
    "edit" => array("title" => "Contact edited", "msg" => "A contact was edited"),
    "delete" => array("title" => "Contact", "msg" => "Le contact a été supprimé"),
    "error_email" => array("title" => "Erreur adresse mail", "msg" => "Adresse mail déjà rattacher à une société"),
);

?>

<div class="wrapper">
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
    <section class="panel">
        <div id="formrechercher">
            <form action="" method="get" id="rechercher">
                <header class="title-panel cf">
                    <h1><span><strong>Recherche contact</strong></span></h1><a href="<?= $this->url ?>/contacts/add" class="button button-secondary" id="add-contact-button" > Ajouter un contact</a>
                </header>
                <div class="content cf">
                    <div class="columna-form">
                        <div class="row-form cf other1">
                            <label>Société</label>
                            <input type="text" name="nom_societe" class="field" value="<?= getRechercherValues("nom_societe", $this) ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Nom</label>
                            <input type="text" name="nom_contact" class="field" value="<?= getRechercherValues("nom_contact", $this) ?>" />
                        </div>
                        <div class="row-form cf other1">
                            <label>Prénom</label>
                            <input type="text" name="prenom_contact" class="field" value="<?= getRechercherValues("prenom_contact", $this) ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Fonction</label>
                            <input type="text" name="fonction" class="field" value="<?= getRechercherValues("fonction", $this) ?>" />
                        </div>
                        <div class="row-form cf other1">
                            <label>Email</label>
                            <input type="email" name="email" class="field" value="<?= getRechercherValues("email", $this) ?>" />
                        </div>
                        
                        
                        
                        <div class="row-form cf other2">
                            <label>&nbsp;</label>
                            <label class="label-comodin">&nbsp;</label>
                        </div>
                        <div class="row-form cf other1">
                            <label>&nbsp;</label>
                            <input style="margin-left: -260px; margin-top: 60px;" type="submit" class="button" value="valider" id="valider" />
                        </div>
                        <div class="row-form cf other2 reset">
                            <label>&nbsp;</label>
                            <input style="margin-top: 28px;" id="reset" type="reset" class="button button-secondary" value="Remise á zéro" />
                        </div>
                    </div>
               </div>
                <div class="row-form cf">
                    <label>&nbsp;</label>
                </div><!-- /.row-form -->
            </form>
        </div>

        <div class="content cf content-none">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc">ID</th>
                        <th style="width: 150px;" class="sorting_asc">Societe</th>
                        <th class="sorting_asc">Nom</th>
                        <th class="sorting_asc">Prénom</th>
                        <th class="sorting_asc">Fonction</th>
                        <th style="width: 80px;" class="sorting_asc">Tel 1 </th>
                        <th style="width: 80px;" class="sorting_asc">Tel 2</th>
                        <th class="sorting_asc">Email</th>
                        <th class="sorting_asc">Linkedin</th>
                        <th style="width: 40px;" class="noImg"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach($this->contacts as $c) {
                    
                    if($c['cstatus'] == 1) { ?>
                    <tr>
                        <td><?= $c['id_contact'] ?></td>
                        <td><?= $c['nom_societe'] ?></td>
                        <td><?= $c['nom_contact'] ?></td>
                        <td><?= $c['prenom_contact'] ?></td>
                        <td><?= $c['fonction'] ?></td>
                        <td><?= $c['tel_fixe'] ?></td>
                        <td><?= $c['tel_port'] ?></td>
                        <td><a href="mailto:<?= $c['email'] ?>"><?= $c['email'] ?></a></td>
                        <td><?= $c['linkedin'] ?></td>
                        <td>
                            <a href="<?= $this->lurl ?>/contacts/view/<?= $c['id_contact'] ?>">
                                <img src="<?=$this->surl?>/images/admin/modif.png" title="Voir" />
                            </a>
                            
                            <a href="<?=$this->url?>/contacts/edit/<?= $c['id_contact'] ?>">
                                <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                            </a>
                            <?php
                            if($c['cstatus'] == 0){
                            ?>
                            <a href="" onclick="deleteContact(<?= $c['id_contact'] ?>)" class="deleteContact" idContact='<?= $c['id_contact'] ?>' >
                                <img src="<?=$this->surl?>/images/admin/check.png" title="Active" />
                            </a>
                            <?php
                            } elseif($c['cstatus'] == 1) {
                            ?>
                            <span style="cursor:  pointer;" href="#" onclick="deleteContact(<?= $c['id_contact'] ?>)" class="deleteContact" idContact='<?= $c['id_contact'] ?>' >
                                <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                            </span>
                            <?php
                            }
                            ?>
                        </td>
                    </tr> 
                    <?php
                    $i++;
                    }
                    }
                    ?>
                </tbody>
            </table>
            <div id="clients_paginate">
                <?php if(isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                    $np = $this->newParams;
                    $np['page']--;?>
                    <a href="<?= $this->lurl ?>/contacts<?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
                <?php } else { ?>
                    <span class="num">Précédent</span>
                <?php } ?>
                <span class="num"><?= $this->newParams['page'] ?></span>
                <?php if($this->countContacts > ($this->ini + $this->limit)) {
                        $np = $this->newParams;
                        $np['page']++;
                        ?>
                    <a href="<?= $this->lurl ?>/contacts<?= implodeParams($np) ?>" class="btn-pag" >Suivant</a>
                <?php } else { ?>
                    <span class="num">Suivant</span>
                <?php } ?>
            </div>
        </div><!-- /.content -->
    </section>
</div>