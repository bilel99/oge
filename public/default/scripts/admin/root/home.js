$(document).ready(function() {
    
});



function changeCdpEtude(id) {
    var url = add_url + "/ajax/changeEtudeCdmHome/" +id;
    
    $.ajax({
        url: url,
        success: function(resp) {
            console.log(resp);
            var resp = $.parseJSON(resp);
            if (resp.success) {
                location.reload();
            } else {
                alert(resp.reason);
            }
        }
    });
}