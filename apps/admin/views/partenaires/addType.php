<div id="popup">
	<a onclick="parent.$.fn.colorbox.close();" title="Fermer" class="closeBtn"><img src="<?=$this->surl?>/images/admin/delete.png" alt="Fermer" /></a>
	<form method="post" name="add_type" id="add_type" enctype="multipart/form-data" action="<?=$this->lurl?>/partenaires/types" target="_parent">
        <h1>Ajouter un type de campagne</h1>            
        <fieldset>
            <table class="formColor">
            	<tr>
                    <th><label for="nom">Type :</label></th>
                    <td><input type="text" name="nom" id="nom" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label>Statut du type :</label></th>
                    <td>
                        <input type="radio" value="1" id="status1" name="status" checked="checked" class="radio" />
                        <label for="status1" class="label_radio">En ligne</label>
                        <input type="radio" value="0" id="status0" name="status" class="radio" />
                        <label for="status0" class="label_radio">Hors ligne</label>	
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                	<th>
                        <input type="hidden" name="form_add_type" id="form_add_type" />
                        <input type="submit" value="Valider" title="Valider" name="send_type" id="send_type" class="btn" />
                    </th>
                </tr>
        	</table>
        </fieldset>
    </form>
</div>