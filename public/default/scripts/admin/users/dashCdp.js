function dashCdp(id) {
    var url = add_url + "/ajax/dashCdp/" + id;
    if (confirm('Etes vous sur de vouloir rendre actif dans le dashboard ce cdp?')) {
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


function dashCdpIn(id) {
    var url = add_url + "/ajax/dashCdpIn/" + id;
    if (confirm('Etes vous sur de vouloir rendre inactif dans le dashboard ce cdp?')) {
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
