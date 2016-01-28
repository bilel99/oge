<div id="popup">
	<a onclick="parent.$.fn.colorbox.close();" title="Fermer" class="closeBtn"><img src="<?=$this->surl?>/images/admin/delete.png" alt="Fermer" /></a>
	<form method="post" name="add_settings" id="add_settings" enctype="multipart/form-data" action="<?=$this->lurl?>/redirections" target="_parent">
        <h1>Ajouter une redirection</h1>            
        <fieldset>
            <table class="formColor">
            	<tr>
                    <td colspan="2"><h2>Origine</h2></td>
                </tr>
                <tr>
                    <th><label for="from_slug"><?=$this->urlfront?>/</label></th>
                    <td><input type="text" name="from_slug" id="from_slug" class="input_large" /></td>
                </tr>
                <tr>
                    <td colspan="2"><br><h2>Destination</h2></td>
                </tr>
                <tr>
                    <th><label for="to_slug"><?=$this->urlfront?>/</label></th>
                    <td><input type="text" name="to_slug" id="to_slug" class="input_large" /></td>
                </tr>
                <tr>
                    <td colspan="2"><br><h2>Paramètres</h2></td>
                </tr>
                <tr>
                    <th><label for="type">Type de redirection :</label></th>
                    <td>
                        <select name="type" id="type" class="select">
                            <option value="301">Permanente</option>
                            <option value="302">Temporaire</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="id_langue">Choix de la langue :</label></th>
                    <td>
                        <select name="id_langue" id="id_langue" class="select">
                            <?
                            foreach($this->lLangues as $key => $lng)
                            {			
                            ?>
                                <option value="<?=$key?>"><?=$lng?></option>
                            <?
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label>Statut de la redirection :</label></th>
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
                        <input type="hidden" name="addRedir" id="addRedir" />
                        <input type="submit" value="Valider" title="Valider" name="btnSend" id="btnSend" class="btn" />
                    </th>
                </tr>
        	</table>
        </fieldset>
    </form>
</div>