<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
    $(function () {
        var availableTags = [
<?php foreach ($this->ville as $v) { ?>
                "<?= $v['label'] ?>",
<?php } ?>
        ];
        $("#tags").autocomplete({
            source: availableTags,
            minLength: 3 // on indique qu'il faut taper au moins 3 caractères pour afficher l'autocomplétion
        });
    });
</script>








<script>
    function Choix(form) {
        i = form.competences.selectedIndex;
        
        switch (i) {
                <?php foreach($this->eval as $e => $key){ 
                        $this->evalua = explode(";", $this->eval[$e]['value']); ?>
                        case <?= $e ?> :
                        var txt = <?= json_encode($this->evalua); ?>;
                        <?php $nbr = count($this->evalua); ?>
                        //console.log(txt);
                        //console.log(<?= $nbr ?>);
                        
                        for(w=0; w< <?= $nbr ?>; w++){
                            $('#evaluation option[value="<?= $e ?>"]').remove();
                            $('#evaluation').append('<option value="<?= $e ?>" ></option>');
                        }
                        
                        
                            for (j = 0; j < <?= $nbr ?>; j++) {
                                form.evaluation.options[j].text = txt[j];
                                $('#evaluation').trigger('change'); // Permet de mettre à jour le select
                                
                            }
                                
                        break;
                        
                <?php } ?>
            }
            
    }


    
</script>



<?php

function implodeParams($params) {
    $str = '';
    foreach ($params as $k => $v) {
        $str .= "/$k=$v";
    }
    return $str;
}

function getRechercherValues($nom, $tthis) {
    $val = "";
    if (isset($tthis->newParams[$nom]))
        $val = urldecode($tthis->newParams[$nom]);
    return $val;
}

$smokeyMsgs = array(
    "add" => array("title" => "Contact added", "msg" => "New contact was added"),
    "editcdm" => array("title" => "CDM edited", "msg" => "A CDM was edited"),
    "addcdm" => array("title" => "CDM added", "msg" => "New CDM was added"),
    "edit" => array("title" => "Contact edited", "msg" => "A contact was edited"),
    "delete" => array("title" => "CDM", "msg" => "Le CDM a été supprimé"),
    "importsave" => array("title" => "Import CSV", "msg" => "Import CSV effectué"),
    "cdmpassif" => array("title" => "Status passif", "msg" => "Status Passif effectué"),
    "etude_added" => array("title" => "Etude ajouté", "msg" => "Etude ajouter avec succès au cdm"),
    "etude_delete" => array("title" => "Etude supprimé", "msg" => "Etude supprimé avec succès du cdm"),
    
);
?>



<div class="wrapper">
    <div class="freeow freeow-top-right">
        <?php if (isset($_SESSION['smokey'])) { ?>
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
        <?php } ?>
    </div>
    <section class="panel">
        <div id="formrechercher">
            <form enctype="multipart/form-data"  method="post" action="" name="importfor" id="importfor">
                <header class="title-panel cf">
                    <h1><span><strong>Rechercher</strong></span></h1>
                </header>
                <div style="" class="form-search">
                    <div style="margin-left: 300px;" id ="fake-button">
                        <a class="btn-search button-secondary faky" id="button-users">Import CSV</a>
                        <input id="upfile" type="file" accept=".csv" name="uploadedfile" onchange="javascript: importCdms()" class="btn-search button-secondary"   /><br/>
                    </div>
                    <a href="<?= $this->url ?>/users/cdm/exportcdm" class="btn-search button-secondary" id="button-users">Export CSV</a>
                    
                    <a href= "<?= $this->url ?>/users/cdm/add" class="btn-search button-secondary" id="button-users">Ajouter un CDM</a>                 
                </div>
                <br />
                <br />
                <br />
                <div>            
                    <p id="upload" class="error-msg display-none form-responses"></p>
                </div>
            </form>
            <form id="rechercher" method="get" action="">

                <div class="content cf">
                    <div class='columna-form'>
                        <div class="row-form cf other1">
                            <label>Nom</label>
                            <input style="margin-left: 13px;" type="text" name="nom" class="field" value="<?= getRechercherValues("nom", $this) ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="field" value="<?= getRechercherValues("prenom", $this) ?>" />
                        </div>
                        <div class="row-form cf other1">
                            <label>Banner</label>
                            <input style="margin-left: 13px;" type="text" name="banner" class="field" value="<?= getRechercherValues("banner", $this) ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>N° CDM</label>
                            <input type="text" name="id_oge" class="field" value="<?= getRechercherValues("id_oge", $this) ?>" />
                        </div>                                                
                        <div class="row-form cf other1">
                            <label>Ville</label>
                            <input style="margin-left: 13px;" type="text" name="ville" id="tags" class="field" value="<?= getRechercherValues("ville", $this) ?>" />
                        </div>     
                        <div class="row-form cf other2">
                            <label>Code Postal</label>
                            <input type="text" name="code_postal" class="field" value="<?= getRechercherValues("code_postal", $this) ?>" />
                        </div>                                                
                        <div class="row-form cf other1">
                            <label>Provenance</label>
                            <input style="margin-left: 13px;" type="text" name="provenance" class="field" value="<?= getRechercherValues("provenance", $this) ?>" />
                        </div>
                        <div class="row-form cf other2 select-custom">
                            <label>Motorisé</label>
                            <select class="select-replace" name="motorise" id="motorise" >
                                <option value="" > </option>
                                <?php
                                foreach ($this->motorise as $motorise) {
                                    if (getRechercherValues("motorise", $this) == $motorise) {
                                        ?>
                                        <option value="<?= $motorise ?>" selected><?= $motorise ?></option>         
                                    <?php } else {
                                        ?>
                                        <option value="<?= $motorise ?>" ><?= $motorise ?></option> 
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row-form cf other1 select-custom">
                            <label>Cursus</label>
                            <select name="cursus" class="select-replace" id="cursus" >
                                <option value=""  > &nbsp </option>
                                <?php
                                foreach ($this->cursus as $cursu) {
                                    if (getRechercherValues('cursus', $this) == $cursu) {
                                        ?>
                                        <option value="<?= $cursu ?>" selected ><?= $cursu ?></option> 
                                    <?php } else {
                                        ?>
                                        <option value="<?= $cursu ?>" ><?= $cursu ?></option> 
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row-form cf other2 select-custom">
                            <label>Année</label>
                            <select name="annee" class="select-replace" id="annee" >
                                <option value=""  > &nbsp </option>
                                <?php
                                foreach ($this->annees as $annee) {
                                    if (getRechercherValues('annee', $this) == $annee) {
                                        ?>
                                        <option value="<?= $annee ?>" selected><?= $annee ?></option>        
                                    <?php } else {
                                        ?>
                                        <option value="<?= $annee ?>" ><?= $annee ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <div class="row-form cf other1 select-mult-custom">
                            <label>Langues</label>                            
                            <select style="margin-left: 13px;" class="select-multi" multiple name="langues" id="langues" >                                
                                <?php
                                foreach ($this->langues as $langue) {
                                    $newlangues = explode(",", getRechercherValues('langues', $this));
                                    if (in_array($langue, $newlangues)) {
                                        ?>
                                        <option selected value="<?= $langue ?>" ><?= $langue ?></option> 
                                    <?php } else { ?>
                                        <option  value="<?= $langue ?>" ><?= $langue ?></option> 
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        
                        



                        <!-- EVALUATION -->
                        <div class="row-form cf other2 select-custom remi2">
                            <label>Evaluation</label>
                            <select name="evaluation" class="select-replace" id="evaluation" >
                                
                                <!--option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option-->
                                
                            </select>
                        </div>
                        <!-- FIN -->












                        <div class="row-form cf  select-custom remi2">
                            <label>Status</label>
                            <select name="status" class="select-replace" id="status" >
                                <option value=""  > &nbsp </option>
                                <?php foreach ($this->status as $status) { ?>
                                    <option value="<?= $status ?>" ><?= $status ?></option> 
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row-form cf select-mult-custom">
                            <label>Compétences</label>
                            
                            <select style="margin-left: 13px;" name="competences" multiple=""  class="select-multi" id="competences" onClick="Choix(this.form)" >
                                <?php
                                foreach ($this->competences as $competence) {
                                    $newcompetences = explode(",", getRechercherValues('competences', $this));
                                    if (in_array($competence, $newcompetences)) {
                                        ?>
                                        <option selected value="<?= $competence ?>" ><?= $this->lng['competences'][$competence] ?></option> 
                                    <?php } else { ?>
                                        <option value="<?= $competence ?>" ><?= $this->lng['competences'][$competence] ?></option> 
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row-form cf other2">
                            <label style="margin-top: -35px;">Email</label>
                            <input style="margin-top: -35px;" type="text" name="email" class="field" value="<?= getRechercherValues("email", $this) ?>" />
                        </div>


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
                    </div>
                </div>
            </form>

            <div class="content cf">
                <?php if (count($this->cdms) > 0) { ?>
                    <table id="datepicker" class="dataTable no-footer">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc header">N° CDM</th>
                                <th class="sorting_asc header">Statut</th>
                                <th class="sorting_asc header ">Nom Prénom</th>
                                <th class="sorting_asc header">Téléphone</th>
                                <th class="sorting_asc header ">Email</th>
                                <th class="sorting_asc header ">Date maj</th>
                                <th class="sorting_asc header">Banner</th>
                                <th class=" noImg sorting_asc header">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->cdms as $c) {
                                if ($c['archive'] == 1) {
                                    ?>
                                    <tr>
                                        <td><?= $c['id_cdm'] ?></td>
                                        <td><?= $c['status'] ?></td>
                                        <td><?= $c['nom'] . ' ' . $c['prenom'] ?></td>
                                        <td><?= $c['telephone'] ?></td>
                                        <td><a href="mailto:<?= $c['email'] ?>"><?= $c['email'] ?></a></td>
                                        <?php
                                        $date = new DateTime($c['date_naissance']);
                                        $fecha = $date->format('d/m/Y');
                                        ?>
                                        <td><?= $fecha ?></td>
                                        <td><?= $c['banner'] ?></td>           
                                        <td>
                                            <a href="<?= $this->url ?>/users/cdm/view/<?= $c['id_cdm'] ?>">
                                                <img src="<?= $this->surl ?>/images/admin/modif.png" title="Voir" />
                                            </a>
                                            <a href="<?= $this->url ?>/users/cdm/edit/<?= $c['id_cdm'] ?>">
                                                <img src="<?= $this->surl ?>/images/admin/edit.png" title="Modifier" />
                                            </a>
                                            <span href="#" onclick="deleteCdm(<?= $c['id_cdm'] ?>)" style="cursor: pointer"><img src="<?= $this->surl ?>/images/admin/delete.png" title="Supprimer" /></span>
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
                        <?php
                        if (isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                            $np = $this->newParams;
                            $np['page'] --;
                            ?>
                            <a href="<?= $this->lurl ?>/users/cdm<?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
                        <?php } else {
                            ?>
                            <span class="num">Précédent</span>
                        <?php }
                        ?>
                        <span class="num"><?= $this->newParams['page'] ?></span>
                        <?php
                        if ($this->cdmsCount > ($this->ini + $this->limit)) {
                            $np = $this->newParams;
                            $np['page'] ++;
                            ?>
                            <a href="<?= $this->lurl ?>/users/cdm<?= implodeParams($np) ?>" class="btn-pag" >Suivant</a>
                        <?php } else {
                            ?>
                            <span class="num">Suivant</span>
                        <?php }
                        ?>
                    </div>
                <?php } else {
                    ?>
                    <div>Pad de resultats pour le moment</div>    
                <?php }
                ?>
            </div><!-- /.content -->
    </section>
</div>