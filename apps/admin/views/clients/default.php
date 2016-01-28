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
    "contact_added" => array("title" => "Contact added", "msg" => "New contact was added"),
    "delete" => array("title" => "Client", "msg" => "Le client a été supprimé")
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
                    <h1><span><strong>Rechercher</strong></span></h1>
                    <a href="<?= $this->url ?>/clients/add" class="button button-secondary" id="add-contact-button" > Ajouter un client</a>
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="columna-form">
                        <div class="row-form cf other1">
                            <label>Nom Société</label>
                            <input style="margin-left: 60px;" name="nom_societe" type="text" class="field" value="<?= getRechercherValues("nom_societe", $this) ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Num RCS</label>
                            <input name="num_rcs" type="text" class="field" value="<?= getRechercherValues("num_rcs", $this) ?>" />
                        </div><!-- /.row-form -->


                        <div class="row-form cf other1">
                            <label>Nom</label>
                            <input style="margin-left: 60px;" name="nom_contact" type="text" class="field" value="<?= getRechercherValues("nom_contact", $this) ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Prénom</label>
                            <input name="prenom_contact" type="text" class="field" value="<?= getRechercherValues("prenom_contact", $this) ?>" />
                        </div><!-- /.row-form -->


                        <div class="row-form cf other1">
                            <label>Numéro client</label>
                            <input style="margin-left: 60px;" name="num_oge_client" type="text" class="field" value="<?= getRechercherValues("num_oge_client", $this) ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2 select-custom">
                            <label>Typologie</label>
                            <?php $typologies = array("entreprise" => "Entreprise", "particulier" => "Particulier");?>
                            <select name="typologie" class="select-replace" id="tipo">
                                <option value="" >&nbsp;</option>
                                <?php foreach($typologies as $k => $typo){
                                    if(getRechercherValues("typologie", $this) == $k) {?>
                                        <option value="<?= $k ?>" selected="selected"><?= $typo ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $k ?>" ><?= $typo ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Date création </label>
                            <label>Entre le </label>
                            <input style="margin-left: -20px;" name="date_crea" type="text" class="field" id="start" value="<?= getRechercherValues("date_crea", $this) ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Et le</label>
                            <input name="date_le" type="text" class="field" id="finish" value="<?= getRechercherValues("date_le", $this) ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Téléphone</label>
                            <input style="margin-left: 60px;" name="tel_standard" type="text" class=" field" value="<?= getRechercherValues("tel_standard", $this) ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Email</label>
                            <input name="mail" type="text" class="field" value="<?= getRechercherValues("mail", $this) ?>"/>
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1 select-custom">
                            <label>Secteur</label>
                            <div style="margin-left: 403px;">
                                <select name="id_sector" class="select-replace" id="provenance2">
                                    <option value="">&nbsp;</option>
                                    <?php foreach($this->sector as $sector) {  ?>
                                        <?php if(getRechercherValues("id_sector", $this) == $sector) {?>
                                            <option value="<?= $sector ?>" selected="selected"><?= $sector ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $sector ?>" ><?= $sector ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><!-- /.row-form -->

                        <div class="row-form cf other1">
                            <label>&nbsp;</label>
                        </div>
                        <div class="row-form cf other2 select-custom">
                            <label>&nbsp;</label>
                        </div>

                        <div class="row-form cf other1">
                            <label>&nbsp;</label>
                            <input type="submit" class="button" value="Valider" id="valider" />
                        </div>
                        <div class="row-form cf other2 reset">
                            <label>&nbsp;</label>
                            <input id="reset" type="reset" class="button button-secondary" value="Remise á zéro" />
                        </div>

                    </div><!-- /.column-form -->
                </div><!-- /.content -->
                <div class="row-form cf">
                    <label>&nbsp;</label>
                </div><!-- /.row-form -->

            </form>
        </div>
        <?php include $this->path.'apps/'.$this->App.'/views/partials/_clientsTable.php' ?>
    </section>
</div><!-- /.content -->