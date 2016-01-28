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
            content += '<option value="<?= $row["nom"] ?>" ><?= $row["nom"] ?></option>'; 
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
        
        content += '</div>'
                
    $.colorbox({
        'html': content,
            onComplete: function() {
                $('#transfer-contact').validate({
                    rules: {
                        status: {required: true},
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
        
        content += '</div>';
                
    $.colorbox({
        'html': content,
            onComplete: function() {
                $('#all-memos').validate({
                    rules: {
                        role : { required: true},
                        description: {required: true}
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


