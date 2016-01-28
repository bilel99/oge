$(document).ready(function() {
    var table = $('#clients').tablesorter();
    
    $("#start").datepicker({
        dateFormat: "yy-mm-dd",
        firstDay: 1,
    });

    $( "#finish" ).datepicker({
        dateFormat: "yy-mm-dd",
        firstDay: 1,
    });
    $('#rechercher').validate({
        rules:{
            num_clie: {number: true},
            numrcs: {number: true},
            mail: {email: true},
        },
        errorClass : "error-field",
        errorPlacement: function(error, element){
            $('.error-msg').show();
        },
        submitHandler: function(form){
        }
    });
        
           
    $("#reset").click(function(e){
        $(this).parents("form")
        .find("input[type=text], select")
        .val("").removeClass("error-field")
        .trigger("change");
        e.preventDefault();
    });
    
    $('.smokey' ).bind( "click", function() {
        $('.smokey').remove();
    });
    
    $('#valider').click(function(){
        var nom_soci = $('input[name=nom_societe]').val();
        var num_clie = $('input[name=num_oge_client]').val();
        var date_crea = $('input[name=date_crea]').val();
        var tel = $('input[name=tel_standard]').val();
        var sector = $('select[name=id_sector]').val();
        var numrcs = $('input[name=num_rcs]').val();
        var typologie = $('select[name=typologie]').val();
        var date_le = $('input[name=date_le]').val();
        var mail = $('input[name=mail]').val();
        var nom_contact = $('input[name=nom_contact]').val();
        var prenom_contact = $('input[name=prenom_contact]').val();
        var filters = "";
           
        if(nom_soci != ""){
           var filters = filters + "/nom_societe="+nom_soci; 
        }
        if(num_clie != ""){
           var filters = filters + "/num_oge_client="+num_clie; 
        }
        if(date_crea != ""){
           var filters = filters + "/date_crea="+date_crea; 
        }
        if(tel != ""){
           var filters = filters + "/tel_standard="+tel; 
        }
        if(sector != ""){
           var filters = filters + "/id_sector="+sector; 
        }
        if(numrcs != ""){
           var filters = filters + "/num_rcs="+numrcs; 
        }
        if(typologie != ""){
           var filters = filters + "/typologie="+typologie; 
        }
        if(date_le != ""){
           var filters = filters + "/date_le="+date_le; 
        }
        if(mail != ""){
           var filters = filters + "/mail="+mail; 
        }
        if(nom_contact != ""){
           var filters = filters + "/nom_contact="+nom_contact; 
        }
        if(prenom_contact != ""){
           var filters = filters + "/prenom_contact="+prenom_contact; 
        }
        
        window.location.replace(add_url+"/clients/page=1"+filters);  
    });
    $('#start').change(function() {
        var date_crea = $('input[name=date_crea]').val();     
        $('#finish').datepicker('destroy');
        $("#finish").datepicker({dateFormat: "yy-mm-dd", firstDay: 1, minDate: new Date("'"+date_crea+"'"),});
        
    });
    
     $('#finish').change(function() {
        var date_le = $('input[name=date_le]').val();     
        $('#start').datepicker('destroy');
        $("#start").datepicker({dateFormat: "yy-mm-dd", firstDay: 1, maxDate: new Date("'"+date_le+"'"),});
        
    });
    
    
});


function deleteClient(id) {
    var url = add_url + "/ajax/deleteClient/" + id;

    if (confirm('Etes vous sur de vouloir supprimer le client?')) {
        $.ajax({
            url: url,
            success: function (resp) {
                var categoria = $.parseJSON(resp);
                if (categoria.success) {
                    window.location.replace(add_url + "/clients");
                }
            }
        });
        return false;
    }
}
