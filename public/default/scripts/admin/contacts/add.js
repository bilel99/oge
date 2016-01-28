$(document).ready(function() {
    
    $('#all-contacts').validate({
        rules : {
            nom        : { required: true },
            fonction   : { required: true },
            tel_fixe   : { required: true, number: true, minlength: 10 },
            tel_port   : { required: true, number: true, minlength: 10 },
            email      : { required: true, email:true},
            prenom     : { required: true }
            //societe    : { required: true }
        },
        errorClass : "error-field",
        errorPlacement: function(error, element) {
            $('.error-msg').show();
        },
        
        submitHandler: function(form) {
            if(!$(form).data("message-sent")){
                var url = add_url + "/ajax/saveContacts";
                $(".form-responses").hide();
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(resp) {
                    console.log(resp);
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        
                        window.location.replace(add_url+"/contacts");
                    }
                }
                    
                    
                });
            }
        }
    });
});


