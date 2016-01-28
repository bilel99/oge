//***************************//
// *** FICHIER AJAX ADMIN ***//
//***************************//

function no_cache()
{
	date_object = new Date();
	var param = date_object.getTime();

	return param;
}

function AjaxObject()
{
	if(window.XMLHttpRequest)
	{
		xhr_object = new XMLHttpRequest();
		return xhr_object;
	}
	else if(window.ActiveXObject)
	{
		xhr_object = new ActiveXObject('Microsoft.XMLHTTP');
		return xhr_object;
	}
	else
	{ 
		alert('Votre navigateur ne supporte pas les objets XMLHTTPRequest...');
		return;
	}
}

/* Fonction AJAX delete image ELEMENT */
function deleteImageElement(id_elt,slug)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteImageElement' + id_elt).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteImageElement' + id_elt).innerHTML = reponse;
			document.getElementById(slug + '-old').value = '';
			document.getElementById('nom_' + slug).value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteImageElement/' + id_elt + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX delete fichier ELEMENT */
function deleteFichierElement(id_elt,slug)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteFichierElement' + id_elt).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteFichierElement' + id_elt).innerHTML = reponse;
			document.getElementById(slug + '-old').value = '';
			document.getElementById('nom_' + slug).value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteFichierElement/' + id_elt + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX delete fichier protected ELEMENT */
function deleteFichierProtectedElement(id_elt,slug)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteFichierProtectedElement' + id_elt).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteFichierProtectedElement' + id_elt).innerHTML = reponse;
			document.getElementById(slug + '-old').value = '';
			document.getElementById('nom_' + slug).value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteFichierProtectedElement/' + id_elt + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX delete image ELEMENT BLOC */
function deleteImageElementBloc(id_elt,slug)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteImageElementBloc' + id_elt).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteImageElementBloc' + id_elt).innerHTML = reponse;
			document.getElementById(slug + '-old').value = '';
			document.getElementById('nom_' + slug).value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteImageElementBloc/' + id_elt + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX delete fichier ELEMENT Bloc */
function deleteFichierElementBloc(id_elt,slug)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteFichierElementBloc' + id_elt).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteFichierElementBloc' + id_elt).innerHTML = reponse;
			document.getElementById(slug + '-old').value = '';
			document.getElementById('nom_' + slug).value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteFichierElementBloc/' + id_elt + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX delete fichier protected ELEMENT Bloc */
function deleteFichierProtectedElementBloc(id_elt,slug)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteFichierProtectedElementBloc' + id_elt).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteFichierProtectedElementBloc' + id_elt).innerHTML = reponse;
			document.getElementById(slug + '-old').value = '';
			document.getElementById('nom_' + slug).value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteFichierProtectedElementBloc/' + id_elt + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX delete image TREE */
function deleteImageTree(id_tree,lng)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('deleteImageTree_' + lng).innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('deleteImageTree_' + lng).innerHTML = reponse;
			document.getElementById('img_menu_'+lng+'-old').value = '';
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteImageTree/' + id_tree + '/' + lng + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX chargement des noms de la section de traduction */
function loadNomTexte(section)
{
	if(section != "")
	{
		xhr_object = AjaxObject();
		var param = no_cache();
	
		xhr_object.onreadystatechange = function()
		{
			if (xhr_object.readyState != 4) 
			{
				document.getElementById('listeNomTraduction').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
			}
			if(xhr_object.readyState == 4 && xhr_object.status == 200)
			{
				var reponse = xhr_object.responseText;
				document.getElementById('btnAjouterTraduction').style.display = 'block';
				document.getElementById('btnAjouterTraduction').href = add_url + '/traductions/add/' + section;
				document.getElementById('listeNomTraduction').innerHTML = reponse;
				document.getElementById('elementTraduction').innerHTML = '';
			}
		}
		xhr_object.open('GET',add_url + '/ajax/loadNomTexte/' + section + '/' + param ,true);
		xhr_object.send(null);
	}
	else
	{
		document.getElementById('listeNomTraduction').innerHTML = '';
		document.getElementById('elementTraduction').innerHTML = '';	
		document.getElementById('btnAjouterTraduction').style.display = 'none';
	}
}

/* Fonction AJAX chargement des traductions de la section de traduction */
function loadTradTexte(nom,section)
{
	if(nom != "")
	{
		xhr_object = AjaxObject();
		var param = no_cache();
	
		xhr_object.onreadystatechange = function()
		{
			if (xhr_object.readyState != 4) 
			{
				document.getElementById('elementTraduction').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
			}
			if(xhr_object.readyState == 4 && xhr_object.status == 200)
			{
				var reponse = xhr_object.responseText;
				document.getElementById('elementTraduction').innerHTML = reponse;
			}
		}
		xhr_object.open('GET',add_url + '/ajax/loadTradTexte/' + nom + '/' + section + '/' + param ,true);
		xhr_object.send(null);
	}
	else
	{
		document.getElementById('elementTraduction').innerHTML = '';	
	}
}

/* Activer un utilisateur sur une zone */
function activeUserZone(id_user,id_zone,zone)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById(zone).src = reponse;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/activeUserZone/' + id_user + '/' + id_zone + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX ajout produit complementaire */
function ajoutProduitComp(id_prod,id_crosseling)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('bloc_comp_produit').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('bloc_comp_produit').innerHTML = reponse;
			document.getElementById('id_crosseling').value = 0;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/ajoutProduitComp/' + id_prod + '/' + id_crosseling + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX move produit complementaire */
function moveProduitComp(sens,id_prod,id_crosseling)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('bloc_comp_produit').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('bloc_comp_produit').innerHTML = reponse;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/moveProduitComp/' + id_prod + '/' + id_crosseling + '/' + sens + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX suppression produit complementaire */
function deleteProduitComp(id_prod,id_crosseling)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('bloc_comp_produit').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('bloc_comp_produit').innerHTML = reponse;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteProduitComp/' + id_prod + '/' + id_crosseling + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX suppression d'une image produit */
function deleteImageFicheProduit(id_img,id_prod)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('bloc_images_produit').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('bloc_images_produit').innerHTML = reponse;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/deleteImageFicheProduit/' + id_prod + '/' + id_img + '/' + param ,true);
	xhr_object.send(null);
}

/* Fonction AJAX placement en principal d'une image produit */
function moveImageToFirstOne(id_img,id_prod)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if (xhr_object.readyState != 4) 
		{
			document.getElementById('bloc_images_produit').innerHTML = '<img src="' + add_surl + '/images/admin/ajax-loader.gif">';
		}
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{
			var reponse = xhr_object.responseText;
			document.getElementById('bloc_images_produit').innerHTML = reponse;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/moveImageToFirstOne/' + id_prod + '/' + id_img + '/' + param ,true);
	xhr_object.send(null);
}