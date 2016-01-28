//*************************//
// *** FICHIER JS ADMIN ***//
//*************************//

/* Elements Jquery */
$(document).ready(function()
{
	$(".thickbox").colorbox();
});

/* Traductions */
function openTraduc(id)
{
	$.fn.colorbox({href:add_url+'/thickbox/openTraduc/'+id});
}