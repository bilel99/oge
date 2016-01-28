$(document).ready( function () {
    $( "#datepicker" ).tablesorter();
    
//    $(".deleteContact").click(function() {
//        var id = $(this).attr("idContact");
//        var url = add_url+"/ajax/deleteContact/"+id;
//        confirm = confirm('Etes vous sur de vouloir supprimer le contact?');
//        if (confirm) {
//            $.ajax({
//                url: url,
//                success: function(resp) {
//                    var categoria = $.parseJSON(resp);
//                    if (categoria.success) {
//                        window.location.replace(add_url + "/contacts");
//                    }
//                }
//            });
//            return false;
//        }
//    });
    
    $('.smokey' ).bind( "click", function() {
        $('.smokey').remove();
    });
    
    $("#rechercher").submit(function(e) {
        var nom         = $('input[name=nom]').val();
        var prenom      = $('input[name=prenom]').val();
        var banner      = $('input[name=banner]').val();
        var ville       = $('input[name=ville]').val();
        var provenance  = $('input[name=provenance]').val();
        var idOge       = $('input[name=id_oge]').val();
        var cursus      = $('select[name=cursus]').val();
        var codePostal  = $('input[name=code_postal]').val();
        var langues     = $('select[name=langues]').val();
        var competences = $('select[name=competences]').val();
        var motorise    = $('select[name=motorise]').val();
        var annee       = $('select[name=annee]').val();
        var evaluation  = $('select[name=evaluation]').val();
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
        window.location.replace(add_url+"/users"+filters); 
        return false;
    });
    
//    $("#reset").click(function(e){
//        $(this).parents("form")
//        .find("input[type=text], select")
//        .val("").removeClass("error-field")
//        .trigger("change");
//        e.preventDefault();
//    });
    
});

