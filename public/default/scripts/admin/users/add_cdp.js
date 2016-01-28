$(document).ready(function() {    
    $('#add_cdp').validate({
        rules: {
            nom: {required: true},
            prenom: {required: true},
            nom_interne: {required: true},
            email: {required: true, email: true},
            mdp: {required: true},            
            adresse: {required: true},
            ville: {required: true},
            code_postal: {required: true, number: true},            
            num_ss: {required: true, number: true}
        },
        errorClass: "error-field",
        errorPlacement: function(error, element) {
            $('.error-msg').show();
        },
        submitHandler: function(form) {
            saveCdp(form);
        }
    });  
});

function saveCdp(form) {
    var url = add_url + "/ajax/savecdp";
    $.ajax({
        url: url,
        type: "POST",
        data: $(form).serialize(),
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                window.location.replace(add_url + "/users/cdp");
            } else {
                alert(resp.reason);
            }
        }
    });
} 


