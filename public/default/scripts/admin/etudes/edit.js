$(document).ready(function(){   
    /*Add Memo*/    
    $('.action').click(function() {
        var etudeId = $(this).attr('id-etude');
        var memoId   = $(this).attr('id-memo');
        var memoContent = $(this).attr('memo-content');
        var target   = $(this).attr('memo-target');
        
        var content  = '<div id="forms">';
        
        if(memoId) {
            content = "<h2 id='' > MODIFIER LE MEMO </h2>";            
        }else{
            content = "<h2 id='' > CREE UN MEMO </h2>";            
        }
        content += "<form action='' method='post' id='all-memos'>";
        content += "<section class='panel'>";
        content += "<input type='hidden' name='id_controller' value='"+etudeId+"' />";
        if(memoId) {
            content += "<input type='hidden' name='id' value='"+ memoId +"' />";
        } else {
            content += "<input type='hidden' name='id' value='' />";
        }
        content += "<input type='hidden' name='target' id='target-con' value='"+target+"'>";
        content += "<div id=''>";
        if (memoContent) {
            content += "<input type='radio' name='role' value='commercial' checked='checked' />&nbsp;Commercial &nbsp;";
            content += "<input type='radio' name='role' value='suivi' />&nbsp;Suivi &nbsp;";
            content += "<input type='radio' name='role' value='commentaire' />&nbsp;Commentaire &nbsp; <br /><br />";
            
            content += "<textarea name='description' class='field' style='width: 430px; height: 80px'>"+ memoContent +"</textarea>";
        } else {
            content += "<input type='radio' name='role' value='commercial' checked='checked' />&nbsp;Commercial &nbsp;";
            content += "<input type='radio' name='role' value='suivi' />&nbsp;Suivi &nbsp;";
            content += "<input type='radio' name='role' value='commentaire' />&nbsp;Commentaire &nbsp; <br /><br />";
            
            content += "<textarea name='description' class='field' style='width: 430px; height: 80px'></textarea>";
        }
        content += "</div>";
        if(memoId) {
            content += "<input type='submit' class='button' value='Modifier le memo'>";
        } else {
              content += "<input type='submit' class='button' value='Creer le memo'>";
        }
        content += "</section>";
        content += "</form>";
        
        content += '</div>'
                
    $.colorbox({
        'html': content,
            onComplete: function() {
                $('#all-memos').validate({
                    rules: {
                        description: {required: true},
                    },
                    errorClass: "error-field",
                    errorPlacement: function(error, element) {
                        $('.error-msg').show();
                    },
                    submitHandler: function(form) {
                        if (!$(form).data("message-sent")) {
                            var url = add_url + "/ajax/saveMemo";
                            $(".form-responses").hide();
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: $(form).serialize(),
                                success: function(resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.success) {
                                            window.location.replace(add_url + "/etudes/edit/" + resp.id_etude);
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });
    });
    
    
    $('.edit-cdp-etude').on('click', function(event){
        var idCdpEtude = $(this).attr('data-id-cdp-etude');
        var idCdp = parseInt($(this).attr('data-id-cdp'));
        var porcentage = parseInt($(this).attr('data-percentage'));
        
        var url = add_url+"/ajax/findcdp";
        var allBonus = [];
        var percentage = [];
        var idCdpEtudes = [];
        $("li.bonus").each(function(i, el){
            allBonus.push(parseInt($(el).attr('data-id-cdp')));
            percentage.push(parseInt($(el).attr('data-por')));
            idCdpEtudes.push(parseInt($(el).attr('data-id-cdp-etude')));
        });
        
        var idCdpEtud = idCdpEtudes[1];
        var porCdpEtud = percentage[1];
              
        var porcen = 0;
        for(var i = 0; i < percentage.length; i++){
            var porcen = porcen + percentage[i];
        }
        var porcen = porcen - porcentage;
        
        var idx = allBonus.indexOf(idCdp); 
        if(idx != -1) allBonus.splice(idx, 1); 
        
        $.ajax({
            url: url,
            type: "POST",
            data: {allBonus: allBonus},
            success: function(resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    var cdps = resp.reason;
                    var content  = '<div id="forms">';

                    content = "<h2> Edit un CDP à l’étude </h2>";            
                    content += "<form action='' method='post' id='cdp_etude' >";
                    content += "<section class='panel'>";
                    content += "<div class='row-form cf other1 select-custom'>";
                    content += "<label>CDP</label>";
                    content += "<select name='cdp' class='' id='cdp' disable >";
                    content += "<option value=''  > &nbsp </option>";
                    $(cdps).each(function(){
                        if(idCdp == $(this)[0].id_cdp){
                            content += "<option value='"+$(this)[0].id_cdp+"' selected >"+$(this)[0].nom+"</option> ";
                        }else{
                            content += "<option value='"+$(this)[0].id_cdp+"' >"+$(this)[0].nom+"</option> ";
                        }
                    });
                    content += "</select>";
                    content += "</div>";
                    content += "<div class='row-form cf other2 select-custom'>";
                    content += "<label>Répartition</label>";
                    if(idCdpEtud == idCdpEtude){
                        content += "<select disabled name='percent' class=' select-disable' id='percent' >";
                    }else{
                        content += "<select name='percent' class='' id='percent' >";
                    }
                    
                    content += "<option value=''  > &nbsp </option>";

                    if(resp.porcent == true){
                        content += "<option value='100' selected >100 %</option> ";
                    }else{
                        for(var i = 0; i < 100; i++){
                            if(porcentage == (i + 5)){
                                content += "<option value='"+(i + 5)+"' selected >"+(i + 5)+" %</option> ";
                            }else{
                                content += "<option value='"+(i + 5)+"' >"+(i + 5)+" %</option> ";
                            }
                            i = i + 4;
                        }
                    }
                    content += "</select>";
                    content += "</div>";
                    content += "</section>";
                    content += "<div class='div-error' >";
                    content += "<p class='form-error-msg display-none form-responses'>Le champ sélectionné n’est pas valide. Veuillez le corriger</p>";
                    content += "<p class='form-percen-msg display-none form-responses'>Attention la répartition dépasse 100% merci de mettre à jour</p>";
                    content += "</div>";
                    content += "<input type='submit' class='button' value='Valider'>";
                    content += "</form>";
                    content += '</div>';
                }else{
                    var content  = '<div id="forms">';
                    content = "<h2 id='' > ne pas exister CDP </h2>";  
                    content += '</div>';
                }
                $.colorbox({
                    'html': content,
                    onComplete: function() {
                        $.selectReplace();
                        $('.select-replace').change(function(){
                            if($(this).val() == ""){
                                $(this).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
                            }else if($(this).val() != ""){
                                $(this).siblings(".custom-select-overlay").find('.custom-select-value').removeClass('error-field');
                            }
                        });
                        $('#cdp_etude').validate({
                            rules: {
                                cdp: {required: true},
                                percent: {required: true},
                            },
                            errorClass: "error-field",
                            errorPlacement: function(error, element) {
                                selectError($('#cdp_etude').find("select[name=cdp]"));
                                selectError($('#cdp_etude').find("select[name=percent]"));
                                $('.form-error-msg').show();
                            },
                            submitHandler: function(form) {
                                $('.form-responses').hide();

                                var por = $('#cdp_etude').find("select[name=percent]").val();
                                var cdp = $('#cdp_etude').find("select[name=cdp]").val();
                                var porNew = parseInt(por) - parseInt(porcentage);
                                var porReally = parseInt(porCdpEtud) - parseInt(porNew);
                                
                                
                                var porcenta = parseInt(por) + parseInt(porcen);
                                var etude = $('#add-cdp-button').attr('data-id');                                
                                var url = add_url+"/ajax/editCdp";
                                
                                if((porcenta <= 100 ) || (porReally > 4)){
                                    $.ajax({
                                        url: url,
                                        type: "POST",
                                        data: {percent: por, cdp: cdp, etude: etude, idCdpEtude: idCdpEtude, idCdpEtud: idCdpEtud},
                                        success: function(resp) {
                                            var resp = $.parseJSON(resp);
                                            if (resp.success) {
                                                window.location.replace(add_url + "/etudes/edit/" + resp.id_etude);
                                            }
                                        }
                                    });
                                }else{
                                    $('.form-percen-msg').show();
                                }
                                
                            }
                        });
                    }
                });
            }
        });
             
        event.preventDefault();
    });
    
    $('#add-cdp-button').on('click', function(){
        var url = add_url+"/ajax/findcdp";
        var allBonus = [];
        var percentage = [];
        var idCdpEtude = [];
        $("li.bonus").each(function(i, el){
             allBonus.push($(el).attr('data-id-cdp'));
             percentage.push(parseInt($(el).attr('data-por')));
             idCdpEtude.push(parseInt($(el).attr('data-id-cdp-etude')));
        });
        
        var idEdit = idCdpEtude[1];
        var porEdit = percentage[1];
        
        if(allBonus.length < 7){
            $.ajax({
                url: url,
                type: "POST",
                data: {allBonus: allBonus},
                success: function(resp) {
                    var resp = $.parseJSON(resp);
                    if (resp.success) {
                        var cdps = resp.reason;
                        var content  = '<div id="forms">';

                        content = "<h2 id='' > Ajouter un CDP à l’étude </h2>";            

                        content += "<form action='' method='post' id='cdp_etude' >";
                        content += "<section class='panel'>";
                        content += "<div class='row-form cf other1 select-custom'>";
                        content += "<label>CDP</label>";
                        content += "<select name='cdp' class='' id='cdp' >";
                        content += "<option value=''  > &nbsp </option>";
                        
                        $(cdps).each(function(){
                            content += "<option value='"+$(this)[0].id_cdp+"' >"+$(this)[0].nom+"</option> ";
                        });

                        content += "</select>";

                        content += "</div>";
                        content += "<div class='row-form cf other2 select-custom'>";
                        content += "<label>Répartition</label>";
                        content += "<select name='percent' class='' id='percent' >";
                        content += "<option value=''  > &nbsp </option>";

                        if(resp.porcent == true){
                            content += "<option value='100' >100 %</option> ";
                        }else{
                            for(var i = 0; i < 100; i++){
                                content += "<option value='"+(i + 5)+"' >"+(i + 5)+" %</option> ";
                                i = i + 4;
                            }
                        }                        

                        content += "</select>";
                        content += "</div>";

                        content += "</section>";
                        content += "<div class='div-error' >";
                        content += "<p class='form-error-msg display-none form-responses'>Le champ sélectionné n’est pas valide. Veuillez le corriger</p>";
                        content += "<p class='form-percen-msg display-none form-responses'>Attention la répartition dépasse 100% merci de mettre à jour</p>";
                        content += "</div>";
                        content += "<input type='submit' class='button' value='Valider'>";
                        content += "</form>";

                        content += '</div>';
                    }else{
                        var content  = '<div id="forms">';
                        content = "<h2 id='' > ne pas exister CDP </h2>";  
                        content += '</div>';
                    }

                    $.colorbox({
                        'html': content,
                        onComplete: function() {
                            $.selectReplace();
                            $('.select-replace').change(function(){
                                if($(this).val() == ""){
                                    $(this).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
                                }else if($(this).val() != ""){
                                    $(this).siblings(".custom-select-overlay").find('.custom-select-value').removeClass('error-field');
                                }
                            });
                            $('#cdp_etude').validate({
                                rules: {
                                    cdp: {required: true},
                                    percent: {required: true},
                                },
                                errorClass: "error-field",
                                errorPlacement: function(error, element) {
                                    selectError($('#cdp_etude').find("select[name=cdp]"));
                                    selectError($('#cdp_etude').find("select[name=percent]"));
                                    $('.form-error-msg').show();
                                },
                                submitHandler: function(form) {
                                    $('.form-error-msg').hide();
                                    var por = $('#cdp_etude').find("select[name=percent]").val();
                                    var cdp = $('#cdp_etude').find("select[name=cdp]").val();
                                    if((porEdit > por) || (porEdit == null)){
                                    
                                    var etude = $('#add-cdp-button').attr('data-id');
                                    var url = add_url + "/ajax/saveCdpEtude";
                                    $.ajax({
                                        url: url,
                                        type: "POST",
                                        data: {percent: por, cdp: cdp, etude: etude, idEdit: idEdit, porEdit: porEdit },
                                        success: function(resp) {
                                            var resp = $.parseJSON(resp);
                                            if (resp.success) {
                                                window.location.replace(add_url + "/etudes/edit/" + resp.id_etude);
                                            }
                                        }
                                    });

                                    }else{
                                        $('.form-percen-msg').show();
                                    }
                                }
                            });
                        }
                    });
                }
            });
        }else{
            $('#general-error').show();
        } 
    });  
    
    $('#add-cdm-button').on('click', function(event){
        var search = $('#nom_interne').val();
        var id = $(this).attr('data-id');
        addCdmEtude(search, id);
        
        event.preventDefault();
    });

    $('#add-doc').on('click', function(event){
        var id = $(this).attr('data-id');
        addDoc(id);        
        event.preventDefault();
    });
    
    /*Consulter des documents*/
    $('#view-doc').on('click', function() {
        var id = $(this).attr('data-id');
        viewDoc(id);
        event.preventDefault();
    });
    /*end Consulter des documents*/
});
function selectError(ele){
    if($(ele).val() == ""){
        $(ele).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
    }    
}
function deleteCdmEtude(id){
   var url = add_url + "/ajax/deleteCdmEtude";
    $.ajax({
        url: url,
        type: "POST",
        data: {id: id},
        success: function(resp) {
            var resp = $.parseJSON(resp);
            if (resp.success) {
                window.location.replace(add_url + "/etudes/edit/" + resp.id_etude);
            }
        }
    });  
}

function addCdmEtude(indata, id) {        
    var url = add_url+"/ajax/searchCdmEtude/"+indata+"/"+id;    
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",        
        success: function(resp) {
            var content = '<div id="add-cdm-etude-popup">';
            if (resp.reason == 1){
               content = "<h2 id='spn' > AUCUN RÉSULTAT </h2>";
            } else {
                content += "<h2 id='spn' > Ajouter un CDM à l’étude </h2>";
                content += "<form id='add-cdms-etude-form'>";
                $(resp.cdms).each(function(i) { 
                   var c = resp.cdms[i];
                   content += "<div class='search-cdm' >";
                   content += '<label > <input type="radio" class="radio-btn" name="id_cdm" data-id="'+id+'" value="'+ c.id_cdm +'"/>';                   
                   content += "<span class='name-contact' >" + c.nom + " " + c.prenom + "</span></label>";
                   content += "<p class='form-error-msg display-none form-responses'>Le champ sélectionné n’est pas valide. Veuillez le corriger</p>";
                   content += "</div>";
                });
                content += '<input type="submit" class="btn-src" value="Valider">';
                content += '</form>';
            }
            content += '</div>';                          
            $.colorbox({
                'html' : content,
                onComplete : function(){ 
                    $('#add-cdms-etude-form').validate({
                        rules: {
                            id_cdm: {required: true},                            
                        },
                        errorClass: "error-field",
                        errorPlacement: function(error, element) {
                            $('.form-error-msg').show();
                        },
                        submitHandler: function(form) {
                            $('.form-error-msg').hide();
                            var idcdm = $('input[name="id_cdm"]:checked').val();
                            var idetude = $('input[name="id_cdm"]:checked').attr('data-id');
                            
                            var url = add_url + "/ajax/saveCdmEtude";
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {idcdm: idcdm, idetude: idetude},
                                success: function(resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.success) {
                                        window.location.replace(add_url + "/etudes/edit/" + resp.id_etude);
                                    }
                                }
                            });
                        }
                    });
                }
            });
        }
    }); 
}
function addDoc(id) {
    var url = add_url+"/ajax/searchEtude/"+id;
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",        
        success: function(resp) {
            var content = '<div id="add-doc-etude-popup">';
            content += "<h1 class='title' > Nom : "+resp.etude[0].nom_interne+" - "+resp.etude[0].num_convention+"</h1>";
            content += '<input type="submit" id="btn-colorbox-doc" class="btn-colorbox-doc btn-src" value="Consulter des documents">';

            content += "<h1 class='title' > Listing des CDP associe</h1>";
            content += "<ul style='margin-bottom: 10px;' >";
            $(resp.cdp_etude).each(function(i) { 
               var c = resp.cdp_etude[i];
               content += "<li class='name-contact' >" + c.nom + " " + c.prenom + " " + c.percentage + "%" + "</li>";
            });
            content += "</ul>";
            
            content += "<select name='cdp' class='select-replace selectvis' id='cdp' disable  >";
            content += "<option value=''  > Choix du modèle de document </option>";
            $(resp.docs).each(function(i) {
                var doc = resp.docs[i];                
                content += "<option value='"+doc.id_type_doc+"' data-src="+doc.src+"  > "+doc.name+" </option>";
            });
            content += "</select>";
            content += "<div id='doc-etu' >";
            content += "<div id='document-etude' >";
            content += "</div>";
//            content += "<iframe name='doc' src="<?=$this->lurl?>/produits/upload/<?=$this->produits->id_produit?>" border="0" frameborder="0" width="100%" height="510" scrolling="no"></iframe>";
            content += "</div>";
            
            content += "<p id='error-select' class='visibility-hidden' > choisir un type de document </p>";
            content += "<p id='error-date' class='visibility-hidden' > choisir une date </p>";
            
            content += "<div id='buttons' >";
            content += '<input type="submit" id="btn-visualiser-doc" class="btn-src btns-doc" value="Visualiser">';
            content += '<input type="submit" id="btn-pdf-doc" class="btn-src btns-doc" value="PDF">';
            content += '<input type="submit" id="btn-tresorier-doc" class="btn-src btns-doc" value="Validation Trésorier">';
            content += "</div>";

            content += '</div>';
            
            var etude = resp.etude[0];

            $.colorbox({
                'html' : content,
                onComplete : function(){
                    
                    $('#btn-colorbox-doc').on('click', function(){
                        viewDoc(id);
                    });
                    $.selectReplace();
                    $('.select-replace').change(function(){
                        $('#error-select').css({visibility: 'hidden'});
                        if($(this).val() == ""){
                            $(this).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
                        }else if($(this).val() != ""){
                            $(this).siblings(".custom-select-overlay").find('.custom-select-value').removeClass('error-field');
                        }
                        
                        if($('#doc').length == 1 ){
                            $("#doc").remove();
                        }
                        
                        var iframe = document.createElement("iframe");
                        iframe.id = "doc";
                        var src = add_url+"/etudes/doc/"+id+"/"+$(this).val();      
                        iframe.src = src;
                        iframe.name = "documento";
                        iframe.width = '99%';
                        iframe.height = '400px';
                        $('#document-etude').append(iframe);
                        
                        if($(this).val() >= 3 && $(this).val() <= 6){
                            $('#btn-tresorier-doc').prop("disabled",false);
                            $('#btn-tresorier-doc').removeClass("btn-disable");
                            $('#btn-pdf-doc').prop("disabled",true);
                            $('#btn-pdf-doc').addClass("btn-disable");
                        }else{
                            $('#btn-pdf-doc').prop("disabled",false);
                            $('#btn-pdf-doc').removeClass("btn-disable");
                            $('#btn-tresorier-doc').prop("disabled",true);
                            $('#btn-tresorier-doc').addClass("btn-disable");
                        } 
                    });
                    
                    $('#btn-pdf-doc').on('click', function(){
                        if($('.select-replace').val() != ""){
                            $('#error-select').css({visibility: 'hidden'});
                            var src = add_url+"/etudes/doc/"+id+"/"+$('#cdp').val()+"/pdf";
                            var data = {
                                url: src,
                                id_etude: id,
                                id_type_doc: $('.select-replace').val(),
                                validation: 1,
                            };
                            saveDocumentEtude(data);
                        }else{
                            $('#error-select').css({visibility: 'visible'});
                        }
                    });
                    $('#btn-tresorier-doc').on('click', function(){
                        if($('.select-replace').val() != ""){
                            if($('.select-replace').val() == 4 || $('.select-replace').val() == 5){
                                var date = $("#doc").contents().find("#start").val();
                                if(date == ""){
                                    $('#error-date').css({visibility: 'visible'});
                                }else{
                                    $('#error-select').css({visibility: 'hidden'});
                                    var data = {
                                        url: 1,
                                        id_etude: id,
                                        id_type_doc: $('.select-replace').val(),
                                        validation: 0,
                                        date: date,
                                    };
                                    saveDocumentEtude(data);
                                }
                            }else{
                                $('#error-select').css({visibility: 'hidden'});
                                var data = {
                                    url: 1,
                                    id_etude: id,
                                    id_type_doc: $('.select-replace').val(),
                                    validation: 1,
                                };
                                saveDocumentEtude(data);
                            }
                        }else{
                            $('#error-select').css({visibility: 'visible'});
                        }
                    });
                    
                    $('#btn-visualiser-doc').on('click', function(){
                        if($('.select-replace').val() != ""){
                            var src = add_url+"/etudes/doc/"+id+"/"+$('#cdp').val()+"/preview";
                            storeDocSession(src);
                        }else{
                            $('#error-select').css({visibility: 'visible'});
                        }
                    });
                    
                    $('#add-cdms-etude-form').validate({
                        rules: {
                            id_cdm: {required: true},                            
                        },
                        errorClass: "error-field",
                        errorPlacement: function(error, element) {
                            $('.form-error-msg').show();
                        },
                        submitHandler: function(form) {

                            $('.form-error-msg').hide();
                            var idcdm = $('input[name="id_cdm"]:checked').val();
                            var idetude = $('input[name="id_cdm"]:checked').attr('data-id');
                            
                            var url = add_url + "/ajax/saveCdmEtude";
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {idcdm: idcdm, idetude: idetude},
                                success: function(resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.success) {
                                        window.location.replace(add_url + "/etudes/edit/" + resp.id_etude);
                                    }
                                }
                            });
                        }
                    });
                }
            });
        }
    }); 
}
function viewDoc(id){
    var url = add_url+"/ajax/searchEtude/"+id;
    $.ajax({
        url: url,
        type: "POST",
        dataType : "json",        
        success: function(resp) {
            
            var content = '<div id="view-doc-etude-popup">';
            content += "<h1 class='title' > Nom : "+resp.etude[0].nom_interne+" - "+resp.etude[0].num_convention+"</h1>";
            content += "<input type='submit' id='btn-colorbox-creer-doc' class='btn-colorbox-doc btn-src' value='Creer des documents'>";

            content += "<h1 class='title' > Listing des CDP associe</h1>";
            content += "<ul style='margin-bottom: 10px;' >";
            $(resp.cdp_etude).each(function(i) { 
               var c = resp.cdp_etude[i];
               content += "<li class='name-contact' >" + c.nom + " " + c.prenom + "</li>";
            });
            content += "</ul>";
    
            content += "<div class='content cf'>"
            content += "<table id='documentos' class='dataTable no-footer'>";
            content += "<thead>";
            content += "<tr role='row'>\n\
                            <th class='sorting_asc header'>Nature</th>\n\
                            <th class='sorting_asc header'>Nom du document</th>\n\
                            <th class='sorting_asc header'>Date de sortie</th>\n\
                            <th class='sorting_asc header'>Validation</th>\n\
                            <th class='sorting_asc header'>Nom & Prénom (rémunération)</th>\n\
                        </tr>";
            content += "</thead>";            
            content += "<tbody>";
            $(resp.documents).each(function(i) { 
               var c = resp.documents[i];
               console.info(c);
               content += "<tr role='row'>";
               content += "<td>"+c.nature+"</td>";
               content += "<td><a href='' data-url='"+add_url+"/etudes/doc/"+c.id_etudes+"/"+c.id_type_doc+"/preview/"+c.id_document+"' class='doc_preview' >"+c.nom_document+"</a></td>";
               content += "<td>"+c.date_sortie+"</td>";
               //content += "<td>"+c.tresorier_validation+"</td>";
               content += c.tresorier_validation == 1 ? "<td>En validation</td>" : "<td>Terminer</td>";
               content += "<td>"+c.nom+" "+c.prenom+"</td>";
               content += "</tr>";
            });
            content += "</tbody>";
            content += "</table>";

            
            content += "</div>" //end .content cf
            content += "<form action='' method='post' id='cdp_etude' >";
            content += "<div class='div-error' >";
            content += "<p class='form-error-msg display-none form-responses'>Error</p>";
            content += "</div>";
            content += "<input type='submit' class='button' value='Valider'>";
            content += "</form>";
            content += '</div>';
            
                $.colorbox({
                    'html': content,
                    onComplete: function() {
                        $('#documentos').tablesorter();
                        $('#btn-colorbox-creer-doc').on('click',function(){
                            addDoc(id);
                        });
                        $('.doc_preview').on('click',function(event){
                            var url = $(this).attr('data-url');
                            console.info(url);
                            window.open(url,'_blank');
                            event.preventDefault();
                        });
                        
                        $.selectReplace();
                        $('.select-replace').change(function() {
                            if ($(this).val() == "") {
                                $(this).siblings(".custom-select-overlay").find('.custom-select-value').addClass('error-field');
                            } else if ($(this).val() != "") {
                                $(this).siblings(".custom-select-overlay").find('.custom-select-value').removeClass('error-field');
                            }
                        });
                        $('#cdp_etude').validate({
                            rules: {
                                cdp: {required: true},
                                percent: {required: true},
                            },
                            errorClass: "error-field",
                            errorPlacement: function(error, element) {
                                selectError($('#cdp_etude').find("select[name=cdp]"));
                                $('.form-error-msg').show();
                            },
                            submitHandler: function(form) {
                                /*going to ajax*/
                            }
                        });
                    }
                });
            }
        });
}

function saveDocumentEtude(datos){
    storeDocSession(1);
    var data = {
        dataDocument: datos
    };
    var url = add_url + "/ajax/saveDocumentEtude";
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function(success) {
            var success = $.parseJSON(success);
            if(success.url == 1){
                $.colorbox.close();
            }else{
                $.colorbox.close();
                window.open(success.url,'_blank');
            }
        }
    });
}


function storeDocSession(src){
    var infoDoc = {};
    var name = "";
    var value = "";
    $("#doc").contents().find(".js-set-cookie").each(function(){
        name = $(this).attr('name');
        value = $(this).val();
        infoDoc[name] = value;
    });
    infoDoc['type'] = src;
    var url = add_url + "/ajax/varsDocumentEtude";
    $.ajax({
        url: url,
        type: "POST",
        data: infoDoc,
        success: function(success) {
            var success = $.parseJSON(success);
            if(success.type == "preview"){
                window.open(src,'_blank');
            }
        }
    });
}




/**
 * Suppression d'un ligne dans la table cdp_etude
 */
function deleteCdp_etude(id) {
    var url = add_url + "/ajax/deleteCdp_etude/" + id;
    if (confirm('Etes vous sur de vouloir supprimer le cdp?')) {
        $.ajax({
            url: url,
            success: function(resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    //window.location.replace(add_url + "/users/cdp");
                    location.reload();
                } else {
                    alert(resp.reason);
                }
            }
        });
    }
} 