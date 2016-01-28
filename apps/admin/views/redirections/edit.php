<div id="popup">
	<a onclick="parent.$.fn.colorbox.close();" title="Fermer" class="closeBtn"><img src="<?=$this->surl?>/images/admin/delete.png" alt="Fermer" /></a>
	<form method="post" name="edit_settings" id="edit_settings" enctype="multipart/form-data" action="<?=$this->lurl?>/redirections/<?=$this->redirections->id_redirection?>" target="_parent">
        <h1>Modifier la redirection</h1>            
        <fieldset>
            <table class="formColor">
            	<tr>
                    <td colspan="2"><h2>Origine</h2></td>
                </tr>
                <tr>
                    <th><label for="from_slug"><?=$this->urlfront?>/</label></th>
                    <td><input type="text" name="from_slug" id="from_slug" class="input_large" value="<?=$this->redirections->from_slug?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><br><h2>Destination</h2></td>
                </tr>
                <tr>
                    <th><label for="to_slug"><?=$this->urlfront?>/</label></th>
                    <td><input type="text" name="to_slug" id="to_slug" class="input_large" value="<?=$this->redirections->to_slug?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><br><h2>Paramètres</h2></td>
                </tr>
                <tr>
                    <th><label for="type">Type de redirection :</label></th>
                    <td>
                        <select name="type" id="type" class="select">
                            <option value="301"<?=($this->redirections->type == 301?' selected="selected"':'')?>>Permanente</option>
                            <option value="302"<?=($this->redirections->type == 302?' selected="selected"':'')?>>Temporaire</option>
                        </select>
                    </td>
                </tr>
               	<tr>
                    <th><label for="id_langue">Choix de la langue :</label></th>
                    <td>
                        <select name="id_langue" id="id_langue" class="select">
                            <option value=""<?=($this->redirections->id_langue == ''?' selected="selected"':'')?>>Aucune</option>
                            <?
                            foreach($this->lLangues as $key => $lng)
                            {			
                            ?>
                                <option value="<?=$key?>"<?=($this->redirections->id_langue == $key?' selected="selected"':'')?>><?=$lng?></option>
                            <?
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label>Statut de la redirection :</label></th>
                    <td>
                        <input type="radio" value="1" id="status1" name="status"<?=($this->redirections->status == 1?' checked="checked"':'')?> class="radio" />
                        <label for="status1" class="label_radio">En ligne</label>
                        <input type="radio" value="0" id="status0" name="status"<?=($this->redirections->status == 0?' checked="checked"':'')?> class="radio" />
                        <label for="status0" class="label_radio">Hors ligne</label>	
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                	<th>
                        <input type="hidden" name="editRedir" id="editRedir" />
                        <input type="submit" value="Valider" title="Valider" name="btnSend" id="btnSend" class="btn" />
                    </th>
                </tr>
        	</table>
        </fieldset>
    </form>
</div>