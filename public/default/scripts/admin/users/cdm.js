$(document).ready( function () {
    $( "#datepicker" ).tablesorter();
    $('.smokey' ).bind( "click", function() {
        $('.smokey').remove();
    });
    
    $("#rechercher").submit(function(e) {
        var nom         = $('input[name=nom]').val();
        var prenom      = $('input[name=prenom]').val();
        var banner      = $('input[name=banner]').val();
        var ville       = $('input[name=ville]').val();
        var provenance  = $('input[name=provenance]').val();
        var email       = $('input[name=email]').val();
        var idOge       = $('input[name=id_oge]').val();
        var cursus      = $('select[name=cursus]').val();
        var codePostal  = $('input[name=code_postal]').val();
        var langues     = $('select[name=langues]').val();
        var competences = $('select[name=competences]').val();
        var motorise    = $('select[name=motorise]').val();
        var annee       = $('select[name=annee]').val();
        var evaluation  = $('select[name=evaluation]').val();
        var status  = $('select[name=status]').val();
        var filters = "";        
        if(nom != ""){
           var filters = filters + "/nom="+nom; 
        }
        if(prenom!= ""){
           var filters = filters + "/prenom="+prenom; 
        }
        if(banner != ""){
           var filters = filters + "/banner="+banner; 
        }
        if(ville != ""){
           var filters = filters + "/ville="+ville; 
        }
        if(provenance != ""){
           var filters = filters + "/provenance="+provenance; 
        }
        if(email != ""){
           var filters = filters + "/email="+email; 
        }
        if(idOge != ""){
           var filters = filters + "/id_oge="+idOge; 
        }
        if(cursus != ""){
           var filters = filters + "/cursus="+cursus; 
        }
        if(codePostal != ""){
           var filters = filters + "/code_postal="+codePostal; 
        }
        if(langues != "" && langues != null){
           var filters = filters + "/langues="+langues; 
        }
        if(competences != "" && competences != null){
           var filters = filters + "/competences="+competences; 
        }
        if(motorise != "" && motorise != null) {            
           var filters = filters + "/motorise="+motorise; 
        }
        if(annee != "" && annee != null) {
           var filters = filters + "/annee="+annee; 
        }
        if(evaluation != "" && evaluation != null){
           var filters = filters + "/evaluation="+evaluation; 
        }
        if(status != "" && status != null){
           var filters = filters + "/status="+status; 
        }
        window.location.replace(add_url+"/users/cdm"+filters); 
        return false;
    });
    
    $("#reset").click(function(e){
        $(this).parents("form")
        .find("input[type=text], select")
        .val("").removeClass("error-field")
        .trigger("change");
        e.preventDefault();
    });                  
    
    $("#upfile").mouseover(function(e){
        $(".faky").addClass('hover');
    });
    $("#upfile").mouseout(function(){
        $(".faky").removeClass('hover');
    });


});


// Suppression definitif
/*function deleteCdm(id) {
    var url = add_url + "/ajax/deleteCdm/" + id;
     if (confirm('Etes vous sur de vouloir supprimer le CDM?')) {
         $.ajax({
            url: url,
            success: function(resp) {
                var response = $.parseJSON(resp);
                if (response.success) {
                    window.location.replace(add_url + "/users/cdm");
                }
            }
        });
        return false;
     }
}*/

function deleteCdm(id) {
    var url = add_url + "/ajax/deleteCdm/" + id;

    if (confirm('Etes vous sur de vouloir supprimer le cdm?')) {
        $.ajax({
            url: url,
            success: function (resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    window.location.replace(add_url + "/users/cdm");
                } else {
                    alert(resp.reason);
                }
            }
        });    
    }
} 


   function importCdms(){
            var inputFileImage = document.getElementById("upfile");
            var file = inputFileImage.files[0];
            if(typeof file !== "undefined"){                                                          
                var data = new FormData();
                data.append('uploadedfile', file);
                var url = add_url + "/ajax/importcsv";
                $.ajax({
                    url: url,
                    type: 'POST',
                    contentType: false,
                    data: data,
                    processData: false,
                    cache: false,        
                success: function(resp) {
                        var resp = $.parseJSON(resp);                    
                        if(resp.success){ 
                            window.location.replace(add_url + "/users/cdm");
                            location.reload();
                        }else{                                                        
                            if(resp.error==="type-fail"){
                                $('#upload').text("Type de fichier non valide");
                            }else{
                                $('#upload').text("Erreur champ non valide ou nulle : rangee:"+resp.row +", colonne:"+ resp.column );
                            }
                            $('#upfile').val('');
                            $('#upload').show();
                            location.reload();
                        }
                    }
                });                            
                return false;
            }
   }




