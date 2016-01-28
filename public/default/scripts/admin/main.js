//*************************//
// *** FICHIER JS ADMIN ***//
//*************************//

/* Elements Jquery */
$(document).ready(function()
{
	$(".thickbox").colorbox();
    
    if($("div.smokey").length){
        $("div.smokey").fadeOut(3000);
    }
    
    $('.smokey' ).bind( "click", function() {
        $('.smokey').remove();
    });
});

/* Changer l'onglet de la langue */
function changeOngletLangue(lng)
{
	var lang_encours = document.getElementById('lng_encours').value;
		
	document.getElementById('lng_encours').value = lng;	
	document.getElementById('lien_'+lang_encours).className = '';
	document.getElementById('lien_'+lng).className = 'active';
	document.getElementById('langue_'+lang_encours).style.display = 'none';
	document.getElementById('langue_'+lng).style.display = 'block';
}

/* Set du nouvel ID parent pour les 2 langues */
function setNewIdParent(id)
{
	document.getElementById('id_parent').value = id;
}

/* Changer l'onglet de la page produit */
function changeOngletProduit(divon,divoff)
{
	document.getElementById('lien_'+divoff).className = '';
	document.getElementById('lien_'+divon).className = 'active';
	document.getElementById(divoff).style.display = 'none';
	document.getElementById(divon).style.display = 'block';
}
/* Chack formulaire edition user */
function checkFormModifUser()
{
	if(document.getElementById('email').value == '')
	{
		alert("Vous devez indiquer une adresse e-mail !");
		return false;	
	}
	
	return true;	
}

/* Check du formulaire d'ajout d'un user */
function checkFormAjoutUser()
{
	if(document.getElementById('email').value == '')
	{
		alert("Vous devez indiquer une adresse e-mail !");
		return false;	
	}
	else if(document.getElementById('password').value == '')
	{
		alert("Vous devez indiquer un mot de passe !");
		return false;
	}
	
	return true;	
}

/* Ajout détail produit */
function ajouterDetails(div)
{
	var nb_encours = parseInt(document.getElementById(div).value);
	
	// Attribution du nouveau nombre
	document.getElementById(div).value = nb_encours + 1;
	var nb_new = parseInt(document.getElementById(div).value);
	
	// Affichage de la ligne correspondante
	document.getElementById('contenuDetails'+nb_new).style.display = 'block';
	
	if(nb_new == 10)
	{
		document.getElementById('lienAjoutDetails').style.display = 'none';
	}
}