$(document).ready(function() {    
    $('#edit_utilisateurs').validate({
        rules: {
            nom: {required: true},
            prenom: {required: true},
            email: {required: true},
            phone: { required: true, number: true, minlength: 10 }
        },
        errorClass: "error-field",
        errorPlacement: function(error, element) {
            $('.error-msg').show();
        },
        submitHandler: function(form) {
            edit_utilisateurs(form);
        }
    });  
});

function edit_utilisateurs(form) {
    var url = add_url + "/ajax/editProfil";
    $.ajax({
        url: url,
        type: "POST",
        data: $(form).serialize(),
        success: function(resp) {
            //console.log($(form[0]).val());
            var resp = $.parseJSON(resp);
            if (resp.success) {
                window.location.replace(add_url + "/utilisateurs/edit_profil/" + $(form[0]).val());
            } else {
                alert(resp.reason);
            }
        }
    });
} 


