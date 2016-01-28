$(document).ready(function() {
    $("#realisee").datepicker({
        dateFormat: "yy-mm-dd",
        firstDay: 1,
    });
    
    $("#date_debut").datepicker({
        dateFormat: "yy-mm-dd",
        firstDay: 1,
    });
    
    $("#etle").datepicker({
        dateFormat: "yy-mm-dd",
        firstDay: 1,
    });
    
    $("#datefin").datepicker({
        dateFormat: "yy-mm-dd",
        firstDay: 1,
    });
    
    $("#reset").click(function(e){
        $(this).parents("form")
        .find("input[type=text], select")
        .val("").removeClass("error-field")
        .trigger("change");
        e.preventDefault();
    });
    
    $('#etudes').validate({
        submitHandler: function(form){
        }
    });
    
    $('#valider').click(function(){
        var nom_societe = $('input[name=nom_societe]').val();
        var date_crea   = $('input[name=date_crea]').val();
        var date_debut  = $('input[name=date_debut]').val();
        var nom_interne = $('input[name=nom_interne]').val();
        var num_client  = $('input[name=num_client]').val();
        var et_le       = $('input[name=et_le]').val();
        var date_fin    = $('input[name=date_fin]').val();
        input = "";
        if(nom_societe != ""){ var input = input + "/nom_societe="+nom_societe; }
        if(date_crea   != ""){ var input = input + "/date_crea="+date_crea;}
        if(date_debut  != ""){ var input = input + "/date_debut="+date_debut; }
        if(nom_interne != ""){ var input = input + "/nom_interne="+nom_interne;}
        if(num_client  != ""){ var input = input + "/num_client="+num_client; }
        if(et_le       != ""){ var input = input + "/et_le="+et_le; }
        if(date_fin    != ""){ var input = input + "/date_fin="+date_fin; }
        window.location.replace(add_url+"/etudes/page=1"+input);
    });
});


