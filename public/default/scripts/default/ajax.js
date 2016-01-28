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

/* Modification de la modifcation des traductions à la volée */
function activeModificationsTraduction(etat,url)
{
	xhr_object = AjaxObject();
	var param = no_cache();
	
	xhr_object.onreadystatechange = function()
	{
		if(xhr_object.readyState == 4 && xhr_object.status == 200)
		{			
			var reponse = xhr_object.responseText;
			document.location.href = url;
		}
	}
	xhr_object.open('GET',add_url + '/ajax/activeModificationsTraduction/' + etat + '/' + param ,true);
	xhr_object.send(null);
}