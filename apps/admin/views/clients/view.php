<script>
    function addContact(form) {    
    var url = add_url+"/ajax/searchContactsBy";
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",
        data: $(form).serialize(),
        success: function(resp) {
            var content = '<div id="add-contact-popup">';
            if (resp.reason == 1){
               content = "<h2 id='spn' > AUCUN RÉSULTAT </h2>";
            } else {
                content += "<h2 id='spn' > Sélectionner un contact </h2>";
                content += "<form id='add-contact-form'>";
                content += '<input type="hidden" name="id_client" value="' + $(form).find("input[name=id_client]").val() + '" />'
                $(resp.contacts).each(function(i) { 
                   var c = resp.contacts[i];
                   content += "<div class='search-contact' >";
                   content += '<label > <input type="radio" class="radio-btn" name="id_contact" value="' + c.id_contact + '"/>';
                   content += "<span class='name-contact' >" + c.prenom_contact + " " + c.nom_contact + "</span></label>";
                   content += "</div>";
                });
                content += '<input type="submit" class="btn-src" value="Valider">';
                content += '</form>';
            }
            content += '</div>';
            $.colorbox({
                'html' : content,
                onComplete : function(){
                    $("#add-contact-form").submit(function(){
                        if($('input[name="id_contact"]:checked').val() != null){
                            $.ajax({
                            url: add_url+"/ajax/addClientContact",
                            type: "POST",
                            dataType : "json",
                            data: $("#add-contact-form").serialize(),
                            success : function(){
                                location.reload();
//                                window.location.replace(add_url+"/clients");
                            }
                        });
                        } 
                        return false;
                    });
                }
            });
            $("#searchContact").data("busy", false);
        }
    }); 
}
$(document).ready( function () {
    
    var table = $('#datepicker').tablesorter();
    var table = $('#datepicker-2').tablesorter();
    
    
    
    
    
    
    
    /*Transfer*/
    $('.transfer').click(function() {
        var clientId = $(this).attr('id-client');
        var contactId   = $(this).attr('id-contact');
        var transferContent = $(this).attr('transfer-content');
        
        
        var content  = '<div id="forms">';
        
        if(contactId) {
            content = "<h2 id='' > TRANSFERER LE CONTACT </h2>";            
        }
        content += "<form action='' method='post' id='transfer-contact'>";
        content += "<section class='panel'>";
        content += "<input type='hidden' name='id_controller' value='"+clientId+"' />";
        if(contactId) {
            content += "<input type='hidden' name='id' value='"+ contactId +"' />";
            
            content += '<select name="sector" class="select-replace" id="sector" >';
            content += '<option value=""  > &nbsp </option>';
            content += '<?php foreach($this->ogeclients as $row) {  ?>';
            content += '<option value="<?= $row["id_oge_client"] ?>" ><?= $row["nom"] ?> <?= $row["prenom"] ?></option>'; 
            content += '<?php } ?>';
            content += "</select>";
            
        }
        content += "<div id=''>";
        content += "</div>";
        if(contactId) {
            content += "<input type='submit' class='button' value='Modifier le transfer'>";
        }
        content += "</section>";
        content += "</form>";
        
        content += '</div>';
                
    $.colorbox({
        'html': content,
            onComplete: function() {
                $('#transfer-contact').validate({
                    rules: {
                        sector: {required: true}
                    },
                    errorClass: "error-field",
                    errorPlacement: function(error, element) {
                        $('.error-msg').show();
                    },
                    submitHandler: function(form) {
                        if (!$(form).data("message-sent")) {
                            var url = add_url + "/ajax/transferContact";
                            $(".form-responses").hide();
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: $(form).serialize(),
                                success: function(resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.success) {
                                        if($('#target-con').val() == 'cdm') {
                                            window.location.replace(add_url + "/users/cdm/view/" + $(form[0]).val());
                                        } else {
                                            window.location.replace(add_url + "/clients/view/" + $(form[0]).val());
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*Add Memo*/    
    $('.action').click(function() {
        var clientId = $(this).attr('id-client');
        var memoId   = $(this).attr('id-memo');
        var memoContent = $(this).attr('memo-content');
        var memoRole = $(this).attr('memo-role');
        var target   = $(this).attr('memo-target');
        
        
        var content  = '<div id="forms">';
        
        if(memoId) {
            content = "<h2 id='' > MODIFIER LE MEMO </h2>";            
        }else{
            content = "<h2 id='' > CREE UN MEMO </h2>";            
        }
        content += "<form action='' method='post' id='all-memos'>";
        content += "<section class='panel'>";
        content += "<input type='hidden' name='id_controller' value='"+clientId+"' />";
        if(memoId) {
            content += "<input type='hidden' name='id' value='"+ memoId +"' />";
        } else {
            content += "<input type='hidden' name='id' value='' />";
        }
        content += "<input type='hidden' name='target' id='target-con' value='"+target+"'>";
        content += "<div id=''>";
        if (memoContent) {
            if(memoRole.indexOf('commercial') >= 0){
                content += "<input type='radio' name='role' value='commercial' checked='checked' />&nbsp;Commercial &nbsp;";
                content += "<input type='radio' name='role' value='suivi' />&nbsp;Suivi &nbsp;";
                content += "<input type='radio' name='role' value='commentaire' />&nbsp;Commentaire &nbsp; <br /><br />";
            }else if(memoRole.indexOf('suivi') >= 0){
                content += "<input type='radio' name='role' value='commercial' />&nbsp;Commercial &nbsp;";
                content += "<input type='radio' name='role' value='suivi' checked='checked' />&nbsp;Suivi &nbsp;";
                content += "<input type='radio' name='role' value='commentaire' />&nbsp;Commentaire &nbsp; <br /><br />";
            }else if(memoRole.indexOf('commentaire') >= 0){
                content += "<input type='radio' name='role' value='commercial' />&nbsp;Commercial &nbsp;";
                content += "<input type='radio' name='role' value='suivi' />&nbsp;Suivi &nbsp;";
                content += "<input type='radio' name='role' value='commentaire' checked='checked' />&nbsp;Commentaire &nbsp; <br /><br />";
            }
            
            content += "<textarea name='description' class='field' style='width: 430px; height: 80px'>"+ memoContent +"</textarea>";
        } else {
            content += "<input type='radio' name='role' value='commercial' checked='checked' />&nbsp;Commercial &nbsp;";
            content += "<input type='radio' name='role' value='suivi' />&nbsp;Suivi &nbsp;";
            content += "<input type='radio' name='role' value='commentaire' />&nbsp;Commentaire &nbsp; <br /><br />";
            
            content += "<textarea name='description' class='field' style='width: 430px; height: 80px'></textarea>";
        }
        content += "</div>";
        if(memoId) {
            content += "<input type='submit' class='button' value='Modifier le memo'>";
        } else {
              content += "<input type='submit' class='button' value='Creer le memo'>";
        }
        content += "</section>";
        content += "</form>";
        
        content += '</div>'
                
    $.colorbox({
        'html': content,
            onComplete: function() {
                $('#all-memos').validate({
                    rules: {
                        role : { required: true},
                        description: {required: true},
                    },
                    errorClass: "error-field",
                    errorPlacement: function(error, element) {
                        $('.error-msg').show();
                    },
                    submitHandler: function(form) {
                        if (!$(form).data("message-sent")) {
                            var url = add_url + "/ajax/saveMemo";
                            $(".form-responses").hide();
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: $(form).serialize(),
                                success: function(resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.success) {
                                        if($('#target-con').val() == 'cdm') {
                                            //window.location.replace(add_url + "/users/cdm/view/" + $(form[0]).val());
                                            location.reload();
                                        } else {
                                            //window.location.replace(add_url + "/clients/view/" + $(form[0]).val());
                                            location.reload();
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });
    });
//    $('#all-memos').validate({
//        rules : {
//            description : { required: true },
//        },
//        errorClass : "error-field",
//        errorPlacement: function(error, element) {
//            $('.error-msg').show();
//        },
//        
//        submitHandler: function(form) {
//            if(!$(form).data("message-sent")){
//                var url = add_url + "/ajax/saveMemo";
//                $(".form-responses").hide();
//                $.ajax({
//                    url: url,
//                    type: "POST",
//                    data: $(form).serialize(),
//                    success: function(resp) {
//                    var resp = $.parseJSON(resp);
//                        if (resp.success) {
//                            if($('#target-con').val() === 'cdm'){
//                                window.location.replace(add_url+"/users/cdm/view/" +$(form[0]).val());                                
//                            }else{
//                                window.location.replace(add_url+"/clients/view/" +$(form[0]).val());
//                            }
//                        }
//                    }                    
//                });
//            }
//        }
//    });
    
    
    $("#searchContact").submit(function(){
        if(!($(this).data("busy"))){
            $(this).data("busy", true);
            addContact(this);
        }
        return false;
    });
    
    $(".delete").click(function(e) {
        var id = $(this).attr("data-id");
        var idCli = $(this).attr("data-cli");
        var url = add_url+"/ajax/deleteClientContact/"+id+"/"+idCli;
        confirmar = confirm('Êtes vous sur de vouloir supprimer Contact?');
        if (confirmar) {
        $.ajax({
            url: url,
            success: function(resp) {
                var del = $.parseJSON(resp);
                if (del.success) { 
                    window.location.replace(add_url + "/clients/view/"+idCli);
                }
            }
        });
        return false;
        } 
        e.preventDefault();
    });
});
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
    "contact_added" => array("title" => "Contact added to client", "msg" => "New Contact was added"),
    "addClient" => array("title" => "Client added", "msg" => "New client was added"),
    "edit" => array("title" => "Mémo édité", "msg" => "Vous avez édité le mémo"),
    "editClient" => array("title" => "Client edited", "msg" => "A client was edited"),
    "delete"=>array("title" => "Mémo supprimé", "msg" => "Vous avez supprimé le mémo"),
    "contact_delete" => array("title" => "Contact removed", "msg" => "A contact was removed"),
    "transfer" => array("title" => "Contact transfered", "msg" => "A contact was transfered")
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
    <div id="client-view-header">
        <div class="header-section">
            <strong>Num client : </strong><span><?= $this->clients->num_oge_client ?></span>
        </div>
        <div class="header-section">
            <strong>Date d’ajout : </strong><span><?= date("d/m/Y", strtotime($this->clients->added)) ?></span>
        </div>
        <div class="header-section">
            <strong>Créé par : </strong><span><?= $this->users->firstname . " " . $this->users->name ?></span>
        </div>
    </div>
    
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>Memos</strong></span></h1>
            <button class="button button-secondary action" id="add-contact-button" id-client="<?= $this->params[0]; ?>" memo-target="<?= $this->menu_admin ; ?>" > Ajouter un memo</button>
        </header>
        <div class="content cf">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th style="width: 50px;" class="sorting_asc">type de mémo</th>
                        <th class="sorting_asc">Date</th>
                        <th class="sorting_asc">Memo</th>                        
                        <th class="sorting_asc">E/T</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->memos as $memo) {
                        if($memo['status'] == 1 && $memo['target']== 'clients' ) {
                            if($memo['role'] == 'commercial'){?>
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #900000;"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-memo="<?= $memo['id_memo']?>" id-client="<?= $this->params[0];?> " memo-target="<?= $memo['target']?>" memo-content="<?= $memo['description']?>" memo-role="<?= $memo['role']?> ">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/clients/deletememo/<?= $this->params[0];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
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
                                        <a class="action" id-memo="<?= $memo['id_memo']?>" id-client="<?= $this->params[0];?> " memo-target="<?= $memo['target']?>" memo-content="<?= $memo['description']?>" memo-role="<?= $memo['role']?> ">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/clients/deletememo/<?= $this->params[0];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
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
                                        <a class="action" id-memo="<?= $memo['id_memo']?>" id-client="<?= $this->params[0];?> " memo-target="<?= $memo['target']?>" memo-content="<?= $memo['description']?>" memo-role="<?= $memo['role']?> ">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/clients/deletememo/<?= $this->params[0];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
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
            <h1><span><strong>CONTACTS</strong></span></h1>
        </header>
        <div class="form-search">
            <form action="" method="post" id="searchContact">
                <label>Nom</label>
                <input type="text" name="nom_contact" class="field" value="" />
                
                <input type="hidden" name="id_client" value="<?=$this->params[0]?>" />
                <input type="submit" class="btn-search" value="Rechercher"/> 
            </form>
        </div>
        <div class="content cf">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc">Nom</th>
                        <th class="sorting_asc">Prénom</th>
                        <th class="sorting_asc">Fonction</th>
                        <th class="sorting_asc">Téléphone</th>
                        <th class="sorting_asc">Email</th>
                        <th class="sorting_asc">E/T</th>
                        <th class="noImg"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->contacts as $contacts) { ?>
                        <tr>
                            <td><?= $contacts['nom_contact'] ?></td>
                            <td><?= $contacts['prenom_contact'] ?></td>
                            <td><?= $contacts['fonction'] ?></td>
                            <td><?= $contacts['tel_fixe'] ?></td>
                            <td><?= $contacts['email'] ?></td>
                            <td>
                                <a href="<?=$this->url?>/contacts/edit/<?=$contacts['id_contact'] ?>">
                                    <!--img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" /-->
                                    E
                                </a>
                                <a class="transfer" id-contact="<?= $contacts['id_contact']?>" id-client="<?= $this->params[0];?> ">
                                    T
                                </a>
                            </td>
                            <td>
                                <a href="" class="delete" data-cli="<?=$this->params[0]?>" data-id='<?= $contacts['id_contact'] ?>' >
                                    <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                </a>
                            </td>
                        </tr>
                    <?php
                    }?>
                </tbody>
            </table>            
        </div>
    </section>
    
    
    
    
    
    
    
    <!-- ETUDES -->
    <section class="panel">
        <header class="title-panel cf">
            <h1><span><strong>Etudes</strong></span></h1>
        </header>
        <div class="content cf">
            <table id="datepicker" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc">Date</th>
                        <th class="sorting_asc">Nom de l'étude</th>
                        <th class="sorting_asc">CDP</th>
                        <th class="sorting_asc">Détail</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                    foreach ($this->etudeClient as $etudeClient) { 
                        foreach($this->etudeCdp as $cc){ ?>                            
                            
                                <tr>
                                    <td><?= $etudeClient['date_debut'] ?></td>
                                    <td><?= $etudeClient['nom_interne'] ?></td>
                                    <td><?= substr($cc['nom'], 0, 1).' '.$cc['prenom'] ?></td>
                                    <td>
                                        <a href="<?= $this->url ?>/etudes/edit/<?= $etudeClient['id_etudes'] ?>">
                                           <img src="<?= $this->surl ?>/images/admin/modif.png" title="Voir" />
                                        </a>
                                    </td>
                                </tr>
                        
                        <?php 
                        }
                    }?>
                </tbody>
            </table>            
        </div>
    </section>
    <!-- FIN -->
    
    
    
    
    
    
    
    
    <div id="client-view-body" class="clearBoth">
        <?php if ($this->clients->typologie == 'entreprise') { ?>
            <section class="panel">
                <header class="title-panel cf">
                    <h1><span><strong>Société</strong></span></h1>
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="column-form">

                        <div class="row-form cf">
                            <label>Nom Société:</label>
                            <span><?= $this->clients->nom_societe ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Activité:</label>
                            <span><?= $this->clients->activite ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Capital:</label>
                            <span><?= $this->clients->capital ?></span>
                        </div><!-- /.row-form -->

                    </div><!-- /.column-form -->
                    <div class="column-form">

                        <div class="row-form cf">
                            <label>Secteur:</label>
                            <span><?= $this->sectors->noun ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Étranger:</label>
                            <span><?= $this->clients->etranger ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Forme:</label>
                            <span><?= $this->formes->description ?></span>
                        </div><!-- /.row-form -->

                    </div><!-- /.column-form -->

                </div><!-- /.content -->
            </section><!-- /.panel -->

            <section class="panel">
                <header class="title-panel cf">
                    <h1><span><strong>administratif</strong></span></h1>

                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Siret:</label>
                            <span><?= $this->clients->siret ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Lieu RCS:</label>
                            <span><?= $this->clients->lieu_rcs ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->

                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Num RCS:</label>
                            <span><?= $this->clients->num_rcs ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Num TVA:</label>
                            <span><?= $this->clients->num_tva ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->
                </div><!-- /.content -->
            </section><!-- /.panel -->

            <section class="panel">
                <header class="title-panel cf">
                    <h1><span><strong>Renseignement</strong></span></h1>
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Adresse:</label>
                            <span><?= $this->clients->adresse ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Ville:</label>
                            <span><?= $this->clients->ville ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Tel standard:</label>
                            <span><?= $this->clients->tel_standard ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Provenance:</label>
                            <span><?= $this->clients->provenance ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->

                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Code postal:</label>
                            <span><?= $this->clients->code_postal ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Pays:</label>
                            <span><?= $this->pays->fr ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Site Internet:</label>
                            <span><?= $this->clients->site_internet ?></span>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->
                </div><!-- /.content -->
            </section><!-- /.panel -->
            
        <?php } else { ?>
            
            <section class="panel">
                <header class="title-panel cf">
                    <h1><span><strong>Renseignement</strong></span></h1>
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="column-form">

                        <div class="row-form cf">
                            <label>Nom: </label>
                            <span><?= $this->clients->nom ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Étranger:</label>
                            <span><?= $this->clients->etranger ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Addresse:</label>
                            <span><?= $this->clients->adresse ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Ville:</label>
                            <span><?= $this->clients->ville ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Tel standard:</label>
                            <span><?= $this->clients->tel_standard ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Provenance:</label>
                            <span><?= $this->clients->provenance ?></span>
                        </div><!-- /.row-form -->

                    </div><!-- /.column-form -->
                    <div class="column-form">

                        <div class="row-form cf">
                            <label>Code postal:</label>
                            <span><?= $this->clients->code_postal ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Pays:</label>
                            <span><?= $this->pays->fr ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Site Internet:</label>
                            <span><?= $this->clients->site_internet ?></span>
                        </div><!-- /.row-form -->

                    </div><!-- /.column-form -->

                </div><!-- /.content -->
            </section><!-- /.panel -->
        <?php } ?>
    </div>
    <a href="<?= $this->url ?>/clients"><input type="submit" class="btn-search" value="Modifier"/></a>
</div>

<!--<div id="add-contact-popup">
    <input type="radio" name="contact" />
</div>-->