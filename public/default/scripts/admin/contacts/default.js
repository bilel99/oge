$(document).ready( function () {
    $( "#datepicker" ).tablesorter();
    
    
        
    $('.smokey' ).bind( "click", function() {
        $('.smokey').remove();
    });
    
    
    
    $("#rechercher").submit(function(e) {
        var nom_soci = $('input[name=nom_societe]').val();
        var nom_contact = $('input[name=nom_contact]').val();
        var fonction = $('input[name=fonction]').val();
        var prenom_contact = $('input[name=prenom_contact]').val();
        var email = $('input[name=email]').val();
        var filters = "";
           
        if(nom_soci != ""){
           var filters = filters + "/nom_societe="+nom_soci; 
        }
        if(nom_contact != ""){
           var filters = filters + "/nom_contact="+nom_contact; 
        }
        if(fonction != ""){
           var filters = filters + "/fonction="+fonction; 
        }
        if(prenom_contact != ""){
           var filters = filters + "/prenom_contact="+prenom_contact; 
        }
        if(email != ""){
           var filters = filters + "/email="+email; 
        }
        window.location.replace(add_url+"/contacts"+filters); 
        return false;
    });
    
    $("#reset").click(function(e){
        $(this).parents("form")
        .find("input[type=text], select")
        .val("").removeClass("error-field")
        .trigger("change");
        e.preventDefault();
    });
    
});
function deleteContact(id) {
    var url = add_url + "/ajax/deleteContact/" + id;

    if (confirm('Etes vous sur de vouloir supprimer le contact?')) {
        $.ajax({
            url: url,
            success: function (resp) {
                var categoria = $.parseJSON(resp);
                if (categoria.success) {
                    location.reload();
                    //window.location.replace(add_url + "/contacts");
                }
            }
        });
        return false;
    }
}


