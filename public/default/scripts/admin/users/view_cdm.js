/*
$(document).ready(function() {
    $('.column-right button').click(function() {
        var content = '<div id="tables-popup">';
        
        content = "<h2 id='' > AVENANTS </h2>";

        content += "<table class='poppup'>";
        content += "<thead>";
        content += '<th>Date</th><th>Etude</th><th>Document</th>';
        content += '</thead>';
        content += '</tbody>';
        content += '<tr><td>ji</td><td>ji</td><td>Télécharger</td></tr>';
        content += '<tr><td>ji</td><td>ji</td><td>Télécharger</td></tr>';
        content += '</tbody>';
        content += '</table>';
        content += '<br>';
        content += '<h2> BV </h2>';
        content += '<table class="poppup">';
        content += "<thead>";
        content += '<th>Date</th><th>Etude</th><th>Document</th>';
        content += '</thead>';
        content += '</tbody>';
        content += '<tr><td>ji</td><td>ji</td><td>Télécharger</td></tr>';
        content += '<tr><td>ji</td><td>ji</td><td>Télécharger</td></tr>';
        content += '</tbody>';
        content += '</table>';
        content += '</div>'
                
    $.colorbox({
        'html': content,
        onComplete: function() {
            $("#id-form").submit(function() {
                return false;
            });
        }
    });
    });
    
    $('.evaluer').click(function() {
        var content = '<div  id="tables-popup">';
        
        content = "<h2 id='' > EVALUATION </h2>";
        content += "<div class='row-form cf other1 select-custom'>";
        content += "<label>Item 1</label>";
        content += "<div class='custom-select'>";
        content += "<div class='custom-select-overlay'>";
        content += '<span class="custom-select-value"> &nbsp; </span>';
        content += '<small class="custom-select-button"><i class="custom-select-arrow"></i></small>';
        content += '</div>';
        content += "<select name='evaluation' class='select-replace'>";
        content += "<option value='0'>0</option>";
        content += "<option value='1'>1</option>";
        content += "</select>";
        content += '</div>';
        content += '</div>';        
        content += '<br>';
        
        content += "<div class='row-form cf other1 select-custom'>";
        content += "<label>Item 2</label>";
        content += "<div class='custom-select'>";
        content += "<div class='custom-select-overlay'>";
        content += '<span class="custom-select-value"> &nbsp; </span>';
        content += '<small class="custom-select-button"><i class="custom-select-arrow"></i></small>';
        content += '</div>';
        content += "<select name='evaluation' class='select-replace'>";
        content += "<option value='0'>0</option>";
        content += "<option value='1'>1</option>";
        content += "</select>";
        content += '</div>';
        content += '</div>';
        content += '</br>';
        
        content += "<div class='row-form cf other1 select-custom'>";
        content += "<label>Item 3</label>";
        content += "<div class='custom-select'>";
        content += "<div class='custom-select-overlay'>";
        content += '<span class="custom-select-value"> &nbsp; </span>';
        content += '<small class="custom-select-button"><i class="custom-select-arrow"></i></small>';
        content += '</div>';
        content += "<select name='evaluation' class='select-replace'>";
        content += "<option value='0'>0</option>";
        content += "<option value='1'>1</option>";
        content += "</select>";
        content += '</div>';
        content += '</div>';
                
        $.colorbox({
            'html': content,
            onComplete: function() {
                $("#id-form").submit(function() {
                    return false;
                });
            }
        });
    });
    
});
*/
















function changeStatusCdm(id) {
    var url = add_url + "/ajax/changeStatusCdm/" + id;

    if (confirm('Etes vous sur de vouloir rendre passif ce cdm?')) {
        $.ajax({
            url: url,
            success: function (resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    //window.location.replace(add_url + "/users/cdm");
                    location.reload();
                } else {
                    alert(resp.reason);
                }
            }
        });
    }
}



/* Actif Actif CDM */
function actifCdm(id){
    var url = add_url + "/ajax/changeStatusOnCdm/" + id;
    if (confirm('Etes vous sur de vouloir rendre actif ce cdm?')) {
        $.ajax({
            url: url,
            success: function (resp) {
                var resp = $.parseJSON(resp);
                if (resp.success) {
                    //window.location.replace(add_url + "/users/cdm");
                    location.reload();
                } else {
                    alert(resp.reason);
                }
            }
        });
    }
}

/* FIN */