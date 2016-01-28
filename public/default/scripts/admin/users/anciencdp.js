$(document).ready( function () {
    $( "#datepicker" ).tablesorter();
    $("#rechercher").submit(function(e) {
        var nom        = $('input[name=nom]').val();
        var prenom     = $('input[name=prenom]').val();
        var nomInterne = $('input[name=nom_interne]').val();
        var email      = $('input[name=email]').val();
        var adresse    = $('input[name=adresse]').val();
        var ville      = $('input[name=ville]').val();
        var codePostal = $('input[name=code_postal]').val();
        var numSs      = $('input[name=num_ss]').val();
        var filters    = "";
           
        if(nom != "") {
           var filters = filters + "/nom="+nom; 
        }
        if(prenom!= "") {
           var filters = filters + "/prenom="+prenom; 
        }
        if(nomInterne != ""){
           var filters = filters + "/nom_interne="+nomInterne; 
        }
        if(email != "") {
           var filters = filters + "/email="+email; 
        }
        if(adresse != "") {
           var filters = filters + "/adresse="+adresse;
        }
        if(ville != "") {
           var filters = filters + "/ville="+ville; 
        }
        if(codePostal != "") {
           var filters = filters + "/code_postal="+codePostal; 
        }
        if(numSs != "") {
           var filters = filters + "/num_ss="+numSs; 
        }
        window.location.replace(add_url+"/users/anciencdp"+filters); 
        return false;
    });
    
    $("#reset").click(function(e) {
        $(this).parents("form").find("input[type=text], select").val("").removeClass("error-field").trigger("change");
        e.preventDefault();
    });   
    
});

// Suppression definitif
/*function deleteCdp(id) {
    var url = add_url + "/ajax/deleteCdp/" + id;
    if (confirm('Etes vous sur de vouloir supprimer le cdp?')) {
        $.ajax({
            url: url,
            success: function(resp) {
                var categoria = $.parseJSON(resp);
                if (categoria.success) {
                    window.location.replace(add_url + "/users/cdp");
                }
            }
        });
        return false;
    }
}*/



function actifCdp(id) {
    var url = add_url + "/ajax/actifCdp/" + id;
    if (confirm('Etes vous sur de vouloir rendre actif ce cdp?')) {
        $.ajax({
            url: url,
            success: function(resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    window.location.replace(add_url + "/users/cdp/anciencdp");
                } else {
                    alert(resp.reason);
                }
            }
        });
    }
}
