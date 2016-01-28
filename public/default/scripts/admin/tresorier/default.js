$(document).ready(function() {
    
});


function validationDocDisable(id) {
    var url = add_url + "/ajax/validationDocDisable/" + id;

        if (confirm('Vous êtes sur le point d’enlever la validation de ce document.')) {
            $.ajax({
                url: url,
                success: function(resp) {
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        //window.location.replace(add_url + "/users/cdm");
                        location.reload();
                    } else {
                        alert(resp.reason);
                    }
                }
            });
        }
}



function validationDocEnable(id) {
    var url = add_url + "/ajax/validationDocEnable/" + id;
    if (confirm('Vous êtes sur le point de valider ce document.')) {
        $.ajax({
            url: url,
            success: function(resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    //window.location.replace(add_url + "/users/cdm");
                    location.reload();
                } else {
                    alert(resp.reason);
                }
            }
        });
    }
}





function validationDocNoValide(id) {
    var url = add_url + "/ajax/validationDocNoValide/" + id;
        if (confirm('Vous êtes sur le point de ne pas valider ce document !')) {
            $.ajax({
                url: url,
                success: function(resp) {
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        //window.location.replace(add_url + "/users/cdm");
                        location.reload();
                    } else {
                        alert(resp.reason);
                    }
                }
            });
        }
}





function sessionsDocActif() {
    var url = add_url + "/ajax/sessionsDocActif";
    
    $.ajax({
        url: url,
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                //window.location.replace(add_url + "/users/cdm");
                location.reload();
            } else {
                alert(resp.reason);
            }
        }
    });
}



function sessionsDocInactif(){
    var url = add_url + "/ajax/sessionsDocInactif";
    
    $.ajax({
        url: url,
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                //window.location.replace(add_url + "/users/cdm");
                location.reload();
            } else {
                alert(resp.reason);
            }
        }
    });
}





function sessionsDocNonValider(){
    var url = add_url + "/ajax/sessionsDocNonValider";

    $.ajax({
        url: url,
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                //window.location.replace(add_url + "/users/cdm");
                location.reload();
            } else {
                alert(resp.reason);
            }
        }
    });
}