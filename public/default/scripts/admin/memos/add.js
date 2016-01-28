$(document).ready(function() {

    $('#all-memos').validate({
        rules : {
            role : { required : true},
            description : { required: true },
        },
        errorClass : "error-field",
        errorPlacement: function(error, element) {
            $('.error-msg').show();
        },
        
        submitHandler: function(form) {
            if(!$(form).data("message-sent")){
                var url = add_url + "/ajax/saveMemo";
                $(".form-responses").hide();
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(resp) {
                    var resp = $.parseJSON(resp);
                        if (resp.success) {
                            if($('#target-con').val() === 'cdm') {
                                window.location.replace(add_url+"/users/cdm/view/" +$(form[0]).val());                                
                            }else{
                                window.location.replace(add_url+"/clients/view/" +$(form[0]).val());
                            }
                        }
                    }                    
                });
            }
        }
    });
});


