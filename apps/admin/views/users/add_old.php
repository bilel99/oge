<div id="popup">
	<a onclick="parent.$.fn.colorbox.close();" title="Fermer" class="closeBtn"><img src="<?=$this->surl?>/images/admin/delete.png" alt="Fermer" /></a>
	<form method="post" name="add_users" id="add_users" enctype="multipart/form-data" action="<?=$this->lurl?>/users" target="_parent" onsubmit="return checkFormAjoutUser();">
        <h1>Ajouter un utilisateur</h1>            
        <fieldset>
            <table class="formColor">
            	<tr>
                    <th><label for="firstname">Pr&eacute;nom :</label></th>
                    <td><input type="text" name="firstname" id="firstname" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label for="name">Nom :</label></th>
                    <td><input type="text" name="name" id="name" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label for="phone">T&eacute;l&eacute;phone :</label></th>
                    <td><input type="text" name="phone" id="phone" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label for="mobile">Mobile :</label></th>
                    <td><input type="text" name="mobile" id="mobile" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label for="email">Email* :</label></th>
                    <td><input type="text" name="email" id="email" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label for="password">Password* :</label></th>
                    <td><input type="password" name="password" id="password" class="input_large" /></td>
                </tr>
                <tr>
                    <th><label for="id_tree">Rubrique d'arriv&eacute;e :</label></th>
                    <td>
                        <select name="id_tree" id="id_tree" class="select">
                            <option value="0">Choisir un lien</option>
                            <?php
                            foreach($this->lTree as $tree)
                            {
                                echo '<option value="'.$tree['id_tree'].'">'.$tree['title'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label>Statut de l'administrateur :</label></th>
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
                        <input type="hidden" name="form_add_users" id="form_add_users" />
                        <input type="submit" value="Valider" title="Valider" name="send_users" id="send_users" class="btn" />
                    </th>
                </tr>
            </tr>
        </table>
        </fieldset>
    </form>
</div>