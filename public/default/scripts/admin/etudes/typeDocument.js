$(document).ready(function(){       
    $("#add_typeDocument").submit(function(e){  
        $("#success-sauver").hide();
        $('#general-error').hide();
        e.preventDefault();
        var tdocument = $('#cke_contents_typeDocument iframe').contents().find( 'body' ).html()                
        if(tdocument ===""|| tdocument === "<p><br></p>"){
            $('#general-error').show();
            
        }else{
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();    
            
            var url = add_url + "/ajax/saveTypeDocumentEtude";
            $.ajax({
                url: url,
                type: 'POST',    
                data: $(this).serialize(),
                success: function(resp) {
                     //
                }
            });
            $("#success-sauver").show();
        }        
    });
}); 

