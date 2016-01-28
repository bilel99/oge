$(document).ready(function() {    
    $("#start").datepicker({
        dateFormat: "dd/mm/yy",
        firstDay: 1,
    });
    $("#finish").datepicker({
        dateFormat: "dd-mm-yy",
        firstDay: 1,
    });
    $('#start').change(function() {
        var date_crea = $('input[name=date_crea]').val();
        $('#finish').datepicker('destroy');
        $("#finish").datepicker({dateFormat: "dd-mm-yy", firstDay: 1, minDate: new Date("'" + date_crea + "'"), });

    });
    $('#finish').change(function() {
        var date_le = $('input[name=date_le]').val();
        $('#start').datepicker('destroy');
        $("#start").datepicker({dateFormat: "dd-mm-yy", firstDay: 1, maxDate: new Date("'" + date_le + "'"), });
    });

    $('#add_cdm').validate({
        rules: {
            nom: {required: true, number: false},
            prenom: {required: true, number: false},
            telephone: { required: true, number: true, minlength: 10 },
            banner: {required: true},
            jour : {required: true},
            mois : {required: true},
            ann : {required: true},
            email : {required: true, email: true},
            //date_nais: {required: true},
            motorise: {required: true},
            ville: {required: true},
            adresse: {required: true},
            code_postal: {required: true,number: true},            
            num_ss: {required: true,number: true},            
            cursus: {required: true},
            annee: {required: true},
            evaluation: {required: true},
            provenance1: {required: true},
            provenance2: {required: true},
            provenance3: {required: true},
            id_cdp : {required : true}
            //details: {required: true}
        },
        errorClass: "error-field",
        errorPlacement: function(error, element) {
            $('#general-error').show();
        },
        submitHandler: function(form) { 
            var inputFileImage = document.getElementById("uploadedfile");
            var file = inputFileImage.files[0];            
            if(typeof file !== "undefined"){                                                          
                var data = new FormData();
                data.append('uploadedfile', file);
                var url = add_url + "/ajax/upload_file";
                $.ajax({
                    url: url,
                    type: 'POST',
                    contentType: false,
                    data: data,
                    processData: false,
                    cache: false,        
                success: function(resp) {   
                    var resp = $.parseJSON(resp);
                    var data = $(form).serializeArray();
                        if(resp.success){                        
                            data.push({name:'upload_name',value:resp.name});                        
                        }else{
                            $('#upload').show();
                            form.stopPropagation();
                        }
                        saveCdm(data);
                    }
                });                            
            
            }else{  
                var data = $(form).serializeArray();
                saveCdm(data);
            }
        }                       
    });
    
    $('#add_cdm').submit(function(){
        selectError($(this).find("select[name=jour]"));
        selectError($(this).find("select[name=mois]"));
        selectError($(this).find("select[name=ann]"));
        
        selectError($(this).find("select[name=motorise]"));
        selectError($(this).find("select[name=langues]")); 
        selectError($(this).find("select[name=competences]")); 
        selectError($(this).find("select[name=cursus]"));
        selectError($(this).find("select[name=annee]"));   
        selectError($(this).find("select[name=evaluation]"));   
    });
    

});

function selectError(ele){
    if($(ele).val() == ""){
        $(ele).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
    }    
}

function saveCdm(form){
    var url = add_url+"/ajax/savecdm";      
    $.ajax({
        url: url,
        type: "POST",
        data: form,
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                //window.location.replace(add_url+"/users/cdm");
                window.location.replace(add_url+"/users/synthese_cdm");
            } else {
                alert(resp.reason);
            }
        }
    });         
} 
