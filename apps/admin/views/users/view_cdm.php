<script>
$(document).ready(function() {
    
    $('.column-right button').click(function() {
        var content = '<div id="tables-popup">';
        
        content = "<h2 id='' > AVENANTS </h2>";
        
        content += "<table class='poppup'>";
        content += "<thead>";
        content += '<th>Date</th><th>Etude</th><th>Document</th>';
        content += '</thead>';
        content += '</tbody>'; <?php
                                    if(count($this->documentThis) == 0){ ?>
                                        content += '<tr><td>Vide</td><td>Vide</td><td>Vide</td></tr>';
                                    <?php }else{
                                        foreach ($this->documentThis as $d){   
                                            if($d['session_id_cdm'] == $this->params[1]){
                                                if($d['nature'] == 'Avenant étudiant'){ ?>
                                                
                                                
                                                    content += '<tr><td><?= $d['added'] ?></td><td><?= $d['cdps_nom_interne'] ?></td><td><a href="<?= $this->url ?>/etudes/doc/<?= $d['etudes_id_etudes'] ?>/8" download="<?= $d['nom_document'] ?>"> <?= $d['nom_document'] ?> </a></td></tr>';
        
        
        content += '</tbody>'; <?php }}}}    ?>
        content += '</table>';
        content += '<br>';
        content += '<h2> BV </h2>';
        content += '<table class="poppup">';
        content += "<thead>";
        content += '<th>Date</th><th>Etude</th><th>Document</th>';
        content += '</thead>';
        content += '</tbody>'; <?php
                                    if(count($this->documentThis) == 0){ ?>
                                        content += '<tr><td>Vide</td><td>Vide</td><td>Vide</td></tr>';
                                    <?php }else{
                                        foreach ($this->documentThis as $d){  
                                            if($d['session_id_cdm'] == $this->params[1]){
                                                if($d['nature'] == 'Bulletin de versement (BV)'){ ?>
                                                
                                                    content += '<tr><td><?= $d['added'] ?></td><td><?= $d['cdps_nom_interne'] ?></td><td><a href="<?= $this->url ?>/etudes/doc/<?= $d['etudes_id_etudes'] ?>/3" download="<?= $d['nom_document'] ?>"> <?= $d['nom_document'] ?> </a></td></tr>';
        
        
        content += '</tbody>'; <?php }}}}  ?>
        content += '</table>';
        content += '</div>';
                
    $.colorbox({
        'html': content,
        onComplete: function() {
            $("#id-form").submit(function() {
                return false;
            });
        }
    });
    });
    
    $('.evaluer_class button').click(function() {
        var content = '<div  id="tables-popup">';
        
        content = "<h2 id='' > EVALUATION </h2>";
        content += "<form id='note_eval'>";
        content += "<input type='hidden' name='id_cdm' id='id_cdm' value='<?= $this->params[1]; ?>'>";
        <?php foreach($this->competences as $a=>$c){ 
                $newcompetences = explode(",", "");
                if (in_array($competence, $newcompetences)) { ?>
                content += "<div class='row-form cf other1 select-custom'>";
                content += "<label><?= $this->lng['competences'][$c] ?>&nbsp;</label>";
                content += "<div class=''>";
                content += "<div class='custom-select-overlay'>";
                content += '<span class="custom-select-value"> &nbsp; </span>';
                content += '<small class="custom-select-button"><i class="custom-select-arrow"></i></small>';
                content += '</div>';
                content += "<select style='margin-left: 15px;' name='evaluation<?=$a?>' id='evaluation<?=$a?>' class='select-replace' >";
                content += "<option value='<?=unserialize($this->cdm->evaluation_competence_note)[$a]?>'><?= unserialize($this->cdm->evaluation_competence_note)[$a] ?> </option>";
                <?php for($i=0;$i<=20;$i++){ ?>
                    content += "<option value='<?=$i?>'><?= $i ?></option>";
                <?php } 
                ?>
                content += "</select>";
                content += '</div>';
                content += '</div>';
                content += '<br>';
        <?php }
        } ?>
                    
                content += '<center><input type="submit" class="btn-src" value="Valider"></center>';
                content += '</form>';
            
                
        $.colorbox({
            'html' : content,
            onComplete : function(){
                $("#note_eval").submit(function(){
                    $.ajax({
                        url: add_url+"/ajax/saveEvaluationNote",
                        type: "POST",
                        dataType : "json",
                        data: $("#note_eval").serialize(),
                        success : function(data){
                            console.log(data);
                            location.reload();
                            //window.location.replace(add_url+"/users/cdm");
                        }
                    });
                     
                    return false;
                });
            }
        });
    });
    
    
    
    var table = $('#datepicker').tablesorter();
    var table = $('#datepicker-2').tablesorter();
    
    $("#searchEtudes").submit(function(){
        if(!($(this).data("busy"))){
            $(this).data("busy", true);
            addEtude(this);
        }
        return false;
    });
    
    
    
    
    
    $(".deletee").click(function(e) {
        var id = $(this).attr("data-id");
        var idCli = $(this).attr("data-cli");
        var url = add_url+"/ajax/deleteCdmEtudes/"+id+"/"+idCli;
        confirmar = confirm('Êtes vous sur de vouloir supprimer l\'étude ?');
        if (confirmar) {
        $.ajax({
            url: url,
            success: function(resp) {
                var del = $.parseJSON(resp);
                if (del.success) { 
                    window.location.replace(add_url + "/users/cdm/"+idCli);
                }
            }
        });
        return false;
        } 
        e.preventDefault();
    });
    
    
});





// Lien étude - cdm
function addEtude(form) {    
    var url = add_url+"/ajax/searchEtudesBy";
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",
        data: $(form).serialize(),
        success: function(resp) {
            console.log(resp);
            var content = '<div id="add-contact-popup">';
            if (resp.reason == 1){
               content = "<h2 id='spn' > AUCUN RÉSULTAT </h2>";
            } else {
                content += "<h2 id='spn' > Sélectionner une études </h2>";
                content += "<form id='add-etudes-form'>";
                content += '<input type="hidden" name="id_cdm" value="' + $(form).find("input[name=id_cdm]").val() + '" />'
                $(resp.etudes).each(function(i) { 
                   var c = resp.etudes[i];
                   content += "<div class='search-contact' >";
                   content += '<label > <input type="radio" class="radio-btn" name="id_etudes" value="' + c.id_etudes + '"/>';
                   content += "<span class='name-contact' >" + c.nom_interne + "</span></label>";
                   content += "</div>";
                });
                content += '<input type="submit" class="btn-src" value="Valider">';
                content += '</form>';
            }
            content += '</div>';
            $.colorbox({
                'html' : content,
                onComplete : function(){
                    $("#add-etudes-form").submit(function(){
                        if($('input[name="id_etudes"]:checked').val() != null){
                            $.ajax({
                            url: add_url+"/ajax/addCdmEtudes",
                            type: "POST",
                            dataType : "json",
                            data: $("#add-etudes-form").serialize(),
                            success : function(){
                                //location.reload();
                                window.location.replace(add_url+"/users/cdm");
                            }
                        });
                        } 
                        return false;
                    });
                }
            });
            $("#searchEtudes").data("busy", false);
        }
    }); 
}







</script>







<?php 
function implodeParams($params){
    $str = '';
    foreach($params as $k => $v){
        $str .= "/$k=$v";
    }
    return $str;
}

$smokeyMsgs = array(
    "add" => array("title" => "Mémo ajouté", "msg" => "Vous avez ajouté le mémo"),
    "edit" => array("title" => "Mémo édité", "msg" => "Vous avez édité le mémo"),    
    "delete"=>array("title" => "Mémo supprimé", "msg" => "Vous avez supprimé le mémo"),
    "contact_delete" => array("title" => "Contact removed", "msg" => "A contact was removed"),
    "actifcdm" => array("title" => "Cdm Actif", "msg" => "CDM rendu actif avec succès !"),
    "inactifcdm" => array("title" => "CDM Inactif", "msg" => "CDM rendu Inactif avec succès !"),
    "note_added" => array("title" => "Note Ajouté", "msg" => "note ajouté avec succès !"),
);

?>
<div>
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
        <header class="title-panel cf">
            <h1><span><strong>Synthèse</strong></span></h1>
        </header><!-- /.title-panel -->
        
        <div class="content cf">
            <div class="synthese">
                <div class="column-left">
                    
                    <span id="namespan"><?= $this->cdm->nom?> <?=$this->cdm->prenom ?></span>
                    <span>Statut</span>
                    <span><?php if($this->cdm->status == 1){echo 'Actif'; }else{echo 'Passif'; } ?></span>
                    
                    <?php
                    if($this->cdm->status == 1) { ?>
                        <button class="button" onclick="changeStatusCdm(<?= $this->params[1] ?>)">Archiver</button>
                    <?php
                    } else { ?>
                        <button class="button" onclick="actifCdm(<?= $this->params[1] ?>)" >Valider l’année en cours</button>
                    <?php 
                    } ?>
                </div>
                <div class="column-right">
                    <button class="button-secondary zion-button">Documents</button>
                    <!--button class="button-secondary zion-button" id="view-doc" data-id="<?= $this->params[1] ?>" >Documents</button-->
                </div>
                
            </div><!-- /.content -->
            <br>
        </div>
        
        <div class="p1" style="position:relative; display: inline-block;">
            <p style="margin-left: -760px; margin-top: 30px;">Versement année en cours : <?= $this->versementAnneeCours[0][0] ?>€</p>
            <p style="margin-left: 660px; margin-top: -40px;">Versement année civile : <?= $this->versementAnneeCivil[0][0] ?>€</p>
        </div>
        <br>
        <div id="client-view-body" class="clearBoth">                                            
        <section class="panel">
                <header class="title-panel cf">
                    <h1><span><strong>Informations CDM</strong></span></h1>
                    
                    
                    
                    <!-- Evaluation form -->
                    <div class="evaluer_class">
                        <button class="evaluer">Evaluer</button>
                    </div>
                    <!-- FIN -->
                    
                    
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Nom: </label>
                            <span><?= $this->cdm->nom ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Prénom:</label>
                            <span><?= $this->cdm->prenom ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Telephone:</label>
                            <span><?= $this->cdm->telephone ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Email:</label>
                            <span><?= $this->cdm->email ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Adresse:</label>
                            <span><?= $this->cdm->adresse ?></span>
                        </div><!-- /.row-form -->
                        <?php if($this->cdm->upload != ""){?>
                        <div class="row-form cf">
                            <label>Upload Doc:</label>
                            <a href="<?= $this->url ?>/users/cdm/download/<?=  $this->cdm->upload ?>" ><?=  $this->cdm->upload ?></a> 
                        </div><!-- /.row-form -->            
                        <?php } ?>
                    </div><!-- /.column-form -->
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Ville:</label>
                            <span><?= $this->cdm->ville ?></span>
                        </div><!-- /.row-form -->
                        
                        <div class="row-form cf">
                            <label>Code postal:</label>
                            <span><?= $this->cdm->code_postal ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Motorisé:</label>
                            <span><?= $this->cdm->motorise ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Cursus:</label>
                            <span><?= $this->cdm->cursus ?></span>
                        </div><!-- /.row-form -->
                        <div class="row-form cf">
                            <label>Année:</label>
                            <span><?= $this->cdm->annee ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->
                    
                    
                
                </div><!-- /.content -->                
               <a href="<?=$this->url?>/users/cdm/edit/<?= $this->params[1];?>">
                   <button class="button">Modifier</button>           
               </a>
            </section><!-- /.panel --> 
            </div>
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>Memos</strong></span></h1>
            <button class="button button-secondary action" id="add-contact-button" id-client="<?= $this->params[1];?>" memo-target="<?= $this->menu_admin ?>"> Ajouter un memo</button>
        </header>
        <div class="content cf">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th style="width: 50px;">type de mémo</th>
                        <th class="sorting_asc">Date</th>
                        <th class="sorting_asc">Memo</th>                        
                        <th class="sorting_asc">E/T</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->memos as $memo) {
                        if($memo['status'] == 1 && $memo['target'] == 'cdm') {
                            if($memo['role'] == 'commercial'){?>
                    
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #900000;"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-client="<?= $this->params[1];?>" id-memo="<?= $memo['id_memo'] ?>" memo-target="<?= $memo['target'] ?>" memo-content="<?= $memo['description']?>" memo-role="<?= $memo['role']?> ">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/users/cdm/deletememo/<?= $this->params[1];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
                                            <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                        </a>
                                    </td>
                                </tr>
                        <?php 
                            }
                            if($memo['role'] == 'suivi'){?>
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #008000"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-client="<?= $this->params[1];?>" id-memo="<?= $memo['id_memo'] ?>" memo-target="<?= $memo['target'] ?>" memo-content="<?= $memo['description']?>" memo-role="<?= $memo['role']?> ">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/users/cdm/deletememo/<?= $this->params[1];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
                                            <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                        </a>
                                    </td>
                                </tr>
                        <?php 
                            } 
                            if($memo['role'] == 'commentaire'){?>
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #0070a3;"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-client="<?= $this->params[1];?>" id-memo="<?= $memo['id_memo'] ?>" memo-target="<?= $memo['target'] ?>" memo-content="<?= $memo['description']?>" memo-role="<?= $memo['role']?> ">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/users/cdm/deletememo/<?= $this->params[1];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
                                            <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                        </a>
                                    </td>
                                </tr>
                        <?php }?>
                    <?php
                        }
                    }?>
                </tbody>
            </table>            
        </div>
    </section>
        
        
        
        
        
    
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>ÉTUDES</strong></span></h1>
        </header>
        <div class="form-search">
            <form action="" method="post" id="searchEtudes">
                <label>Nom</label>
                <input type="text" name="nom" class="fiel" value="" />
                
                <input type="hidden" name="id_cdm" value="<?=$this->params[1]?>" />
                <?php if($this->cdm->archive != 2){ ?>
                    <input type="submit" class="btn-search" value="Rechercher"/>
                <?php } ?>
            </form>
        </div>
        <div class="content cf">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc">Date</th>
                        <th class="sorting_asc">Nom de l’étude</th>
                        <th class="sorting_asc">CDP</th>
                        <th class="sorting_asc">Statut</th>
                        <th class="sorting_asc">Voir</th>
                        <th class="noImg"></th>
                    </tr>
                </thead>
                <tbody>
                   <?php if(count($this->cdm_etude[0])>0){?>
                     <?php foreach ($this->cdm_etude as $etudes) { 
                        foreach ($this->cdp as $cdp){ ?>
                            <tr>
                                <?php  ?>
                                <td><?= $etudes['date_debut'] ?></td>
                                <td><?= $etudes['nom_interne'] ?></td><!-- CDP ?? voir comment régler ce problème ! -->
                                <td><?= substr($cdp['nom'], 0, 1) ?> <?= $cdp['prenom'] ?></td>
                                <td><?= $etudes['status'] ?></td>
                                <td>
                                    <a href="<?= $this->url ?>/etudes/edit/<?= $etudes['id_etudes'] ?>"><?= $etudes['nom_interne']?></a>
                                </td>
                                <td>
                                    <a href="" class="deletee" data-cli="<?=$this->params[1]?>" data-id='<?= $etudes['id_etudes'] ?>' >
                                        <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                    </a>                                
                                </td>
                            </tr>
                        <?php } ?>
                     <?php }?>
                  <?php }?>
                </tbody>
            </table>            
        </div>
    </section>
</div>