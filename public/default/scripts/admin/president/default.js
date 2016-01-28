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
        window.location.replace(add_url+"/users/cdp"+filters); 
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


function tresorierChoixCdp(id) {
    var url = add_url + "/ajax/tresorierChoixCdp/" + id;
        if (confirm('êtes vous sur de vouloir rendre trésorier cette utilisateur !')) {
            $.ajax({
                url: url,
                success: function (resp) {
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        //window.location.replace(add_url + "/users/cdp");
                        location.reload();
                    } else {
                        alert(resp.reason);
                    }
                }
            });
    }
} 




function cdpChoixCdp(id) {
    var url = add_url + "/ajax/cdpChoixCdp/" + id;
        if (confirm('êtes vous sur de retirer le role trésorier à cette utilisateur !')) {
            $.ajax({
                url: url,
                success: function (resp) {
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        //window.location.replace(add_url + "/users/cdp");
                        location.reload();
                    } else {
                        alert(resp.reason);
                    }
                }
            });
    }
}




function changePresident(id) {
    var url = add_url + "/ajax/changePresident/" + id;
        if (confirm('Etes vous sûr de vouloir donner le rôle de président à ce CDP ? Cela supprimera le rôle du président actuel !')) {
            $.ajax({
                url: url,
                success: function (resp) {
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        //window.location.replace(add_url + "/users/cdp");
                        location.reload();
                    } else {
                        alert(resp.reason);
                    }
                }
            });
    }
}





function inactifCdp(id) {
    var url = add_url + "/ajax/inactifCdp/" + id;

    if (confirm('Etes vous sur de vouloir rendre inactif ce cdp?')) {
        $.ajax({
            url: url,
            success: function (resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    window.location.replace(add_url + "/users/cdp");
                } else {
                    alert(resp.reason);
                }
            }
        });
    }
}
