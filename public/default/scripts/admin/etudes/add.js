$(document).ready(function(){
    
    $('#add_etudes').validate({
         rules : {
             nom_interne     : { required: true },
             num_convention  : { required: true, digits:true, maxlength: 4, minlength: 4},
             descriptif      : { required: true },
             budget_fsi      : { required: true ,number:true},
             budget_hfs      : { required: true ,number:true},
             je              : { required: true ,number:true },
             frais_previsio  : { required: true },
             client          : { required: true },
             contact         : { required: true },
         },
         errorClass : "error-field",
         errorPlacement: function(error, element) {
             $('#general-error').show();
             if(error[0].htmlFor == 'num_convention'){
                 $('#general-numC').show();
             }
             
         },
         
         submitHandler: function(form) {
            if(($('#input-search-client').attr('data-id') != '') && ($('#input-search-contact').attr('data-id') != '')){
                var url = add_url + "/ajax/saveEtudes";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(resp) {
                        var resp = $.parseJSON(resp);
                        if (resp.success) {
                            window.location.replace(add_url+"/etudes/edit/"+resp.id);
                        }else{
                            location.reload();
                        }
                    }
                });
            }else{  
                $('#rechercher-error').show();
            } 
        }
    });
    $('#budget_fsi').blur(function(){
        
        var par = $('#budget_param').val();
        var para = par.replace(",",".");
        var param = Number(para);
        var bud_fsi = Number($('#budget_fsi').val());
        if( bud_fsi != '' ){
            var bud_hfs =  bud_fsi * (1 - param); 
            $('#budget_hfs').val(bud_hfs);
            $('#aux_budget_hfs').val(bud_hfs);
        }
    });
    $("#search_contact").click(function(){
        var search = $('#input-search-contact').val();
        addContact(search);
        return false;
    });

    $("#search_client").click(function(e){           
        var search = $('#input-search-client').val();
        addClient(search);
        return false;
        return false;
    });
        
});

function addContact(indata) { 
    var url = add_url+"/ajax/searchContactEtude/"+ indata;    
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",        
        success: function(resp) {
            var content = '<div id="add-contact-popup">';
            if (resp.reason == 1){
               content = "<h2 id='spn' > AUCUN RÉSULTAT </h2>";
            } else {
                content += "<h2 id='spn' > Sélectionner un contact </h2>";
                content += "<form id='add-contact-form'>";
                $(resp.contacts).each(function(i) { 
                   var c = resp.contacts[i];
                   content += "<div class='search-contact' >";
                   content += '<label > <input type="radio" class="radio-btn" name="id_contact" data-id="'+ c.id_contact +'" value="' + c.prenom_contact + " " + c.nom_contact +'"/>';                   
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
                            var idcontact= $('input[name="id_contact"]:checked').attr("data-id");                             
                            var precontact= $('input[name="id_contact"]:checked').val();  
                            $('#input-search-contact').attr("data-id",idcontact);                            
                            $('#input-search-contact').val(precontact);  
                            $('input[name="idcontact"]').val(idcontact);
                            $.colorbox.close();
                        } 
                        return false;
                    }); 
                }
            });
        }
    }); 
}
function addClient(indata) {        
    var url = add_url+"/ajax/searchClientEtude/"+ indata;    
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",        
        success: function(resp) {
            var content = '<div id="add-client-popup">';
            if (resp.reason == 1){
               content = "<h2 id='spn' > AUCUN RÉSULTAT </h2>";
            } else {
                content += "<h2 id='spn' > Sélectionner un client </h2>";
                content += "<form id='add-client-form'>";
                $(resp.clients).each(function(i) { 
                   var c = resp.clients[i];
                    console.info(c);
                   content += "<div class='search-client' >";
                   if(c.nom_societe != ''){
                       content += '<label > <input type="radio" class="radio-btn" name="id_client" data-id="'+ c.id_oge_client +'" value="' + c.nom_societe +'"/>';                   
                       content += "<span class='name-client' >" + c.nom_societe + "</span></label>";
                   }else{
                       content += '<label > <input type="radio" class="radio-btn" name="id_client" data-id="'+ c.id_oge_client +'" value="' + c.nom + " " + c.prenom +'"/>';                   
                       content += "<span class='name-client' >" + c.nom + " " + c.prenom + "</span></label>";
                   }
                   content += "</div>";
                });
                content += '<input type="submit" class="btn-src" value="Valider">';
                content += '</form>';
            }
            content += '</div>';                          
            $.colorbox({
                'html' : content,
                onComplete : function(){                    
                     $("#add-client-form").submit(function(){
                        if($('input[name="id_client"]:checked').val() != null){
                            var idcontact= $('input[name="id_client"]:checked').attr("data-id");                             
                            var precontact= $('input[name="id_client"]:checked').val();  
                            $('#input-search-client').attr("data-id",idcontact);                            
                            $('#input-search-client').val(precontact);  
                            $('input[name="idclient"]').val(idcontact);
                            $.colorbox.close();
                        } 
                        return false;
                    }); 
                }
            });
        }
    }); 
}
$(function()
{
    $("#date_fin").datepicker({
        dateFormat: "yy-mm-dd",
    });
});
$(function() 
{
    $("#date_debut").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText,inst){
            var lockDate = new Date($('#date_debut').datepicker('getDate'));
            $('#date_fin').datepicker('option','minDate',lockDate);
        }
     });
 });
