$(document).ready(function() {
    
    $("input[name='typologie']").change(function() {
        var $typo = $(this).val();
        if($typo == 'Particulier'){
            document.getElementById('entre').checked = true;
            $('#formentre').hide();
            $('#formparti').show();
        }        
        if($typo == 'Entreprise'){            
            document.getElementById('parti').checked = true;            
            $('#formparti').hide();
            $('#formentre').show();
        }
    });
    
    
    
    
    /*Change radio button*/
    $("input[name='etranger']").change(function() {
        var $etr = $(this).val();
        if($etr == 'FR'){
            document.getElementById('fr').checked = true;
            $('#formSupplUe').hide();
            $('#formSupplRdm').hide();
            $('#formSupplFr').show();
        }        
        if($etr == 'UE'){            
            document.getElementById('ue').checked = true;            
            $('#formSupplFr').hide();
            $('#formSupplRdm').hide();
            $('#formSupplUe').show();
        }
        if($etr == 'RDM'){            
            document.getElementById('rdm').checked = true;            
            $('#formSupplFr').hide();
            $('#formSupplUe').hide();
            $('#formSupplRdm').show();
        }
        
    });
    /*FIN*/
    
    
    
    
    
    
    $('#entreprise').validate({
        rules:{
            typeparticulier: {required: true},
            societe: {required: true},
            sector: {required: true},
            activite: {required: true},
            capital: {required: true,number:true},
            forme: {required: true},
            
            siret: {required: true},
            numrcs: {required: true},
            lieu: {required: true},
            numtva: {required:true},

            adresse: {required: true},
            code_postal: {required: true,number:true},
            ville: {required: true},
            tel: {required: true, number:true},
            site_internet: {required: true},
            provenance : {required: true},
            pays : {required: true}
        },
        errorClass : "error-field",
        errorPlacement: function(error, element){
            $('.error-msg').show();
        },
        submitHandler: function(form){
            saveClient(form);
        }
    });
    
    $('#particulier').validate({
        rules: {
            typeparticulier: {required: true},
            nom: {required: true, number:false},
            prenom: {required: true, number:false},
            adresse: {required: true},
            code_postal: {required: true},
            ville: {required: true},
            tel: {required: true, number:true},
            site_internet: {required: true},
            provenance : {required: true},
            pays : {required: true}
        },
        errorClass : "error-field",
        errorPlacement: function(error, element) {
            $('.error-msg').show();
        },
        submitHandler: function(form) {
            saveClient(form);
        }
    });
    
    $('.select-replace').change(function(){
        if($(this).val() == ""){
            $(this).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
        }else if($(this).val() != ""){
            $(this).siblings(".custom-select-overlay").find('.custom-select-value').removeClass('error-field');
        }
    });
    
    $('#particulier').submit(function(){
        selectError($(this).find("select[name=pays]"));
        selectError($(this).find("select[name=provenance]"));        
    });
    $('#entreprise').submit(function(){
        selectError($(this).find("select[name=pays]"));
        selectError($(this).find("select[name=provenance]")); 
        selectError($(this).find("select[name=forme]"));
        selectError($(this).find("select[name=sector]"));      
    });
    
    
});

function selectError(ele){
    if($(ele).val() == ""){
        $(ele).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
    }    
}

function saveClient(form){
    var url = add_url+"/ajax/saveclient";
    $.ajax({
        url: url,
        type: "POST",
        data: $(form).serialize(),
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                window.location.replace(add_url+"/clients/view/"+resp.id);
            }else{
                alert(resp.reason);
            }
        }
    });         
} 