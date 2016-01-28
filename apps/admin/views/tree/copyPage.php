<div id="popup">
	<a onclick="parent.$.fn.colorbox.close();" title="Fermer" class="closeBtn"><img src="<?=$this->surl?>/images/admin/delete.png" alt="Fermer" /></a>
	<form method="post" name="copyPage" id="copyPage" enctype="multipart/form-data" action="<?=$this->lurl?>/tree/" target="_parent">
        <h1>Dupliquer une page</h1>            
        <fieldset>
            <table class="formColor">
            	<tr>
                    <th><label for="id_parent">Choix du Parent :</label></th>
                    <td>
                    	<select name="id_parent" class="select">
                            <option value="0">Choisissez une page</option>
                            <?php
                            foreach($this->lTree as $t)
                            {
                            ?>
                                <option value="<?=$t['id_tree']?>"><?=$t['title']?></option>
                            <?php	
                            }
                            ?>
                        </select>
                  	</td>
                </tr>               
                <tr>
                    <td>&nbsp;</td>
                	<th>
                        <input type="hidden" name="duplicate" id="duplicate" />
                        <input type="hidden" name="id_tree" id="id_tree" value="<?=$this->params[0]?>"/>
                        <input type="submit" value="Valider" title="Valider" name="duplicateBtn" id="duplicateBtn" class="btn" />
                    </th>
                </tr>
        	</table>
        </fieldset>
    </form>
</div>