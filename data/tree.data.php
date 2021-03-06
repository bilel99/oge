<?php
// **************************************************************************************************** //
// ***************************************    ASPARTAM    ********************************************* //
// **************************************************************************************************** //
//
// Copyright (c) 2008-2011, equinoa
// Permission is hereby granted, free of charge, to any person obtaining a copy of this software and 
// associated documentation files (the "Software"), to deal in the Software without restriction, 
// including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
// and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, 
// subject to the following conditions:
// The above copyright notice and this permission notice shall be included in all copies 
// or substantial portions of the Software.
// The Software is provided "as is", without warranty of any kind, express or implied, including but 
// not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. 
// In no event shall the authors or copyright holders equinoa be liable for any claim, 
// damages or other liability, whether in an action of contract, tort or otherwise, arising from, 
// out of or in connection with the software or the use or other dealings in the Software.
// Except as contained in this notice, the name of equinoa shall not be used in advertising 
// or otherwise to promote the sale, use or other dealings in this Software without 
// prior written authorization from equinoa.
//
//  Version : 2.4.0
//  Date : 21/03/2011
//  Coupable : CM
//                                                                                   
// **************************************************************************************************** //

class tree extends tree_crud
{

	function tree($bdd,$params='')
    {
        parent::tree($bdd,$params);
    }
    
    function get($list_field_value)
    {
        return parent::get($list_field_value);
    }
    
    function update($list_field_value)
    {
        parent::update($list_field_value);
    }
    
    function delete($list_field_value)
    {
    	parent::delete($list_field_value);
    }
    
    function create($list_field_value=array())
    {
        parent::create($list_field_value);
    }
	
	function select($where='',$order='',$start='',$nb='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
		if($order != '')
			$order = ' ORDER BY '.$order;
		$sql = 'SELECT * FROM tree'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	} 
	
	function counter($where='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
			
		$sql='SELECT count(*) FROM tree '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($list_field_value)
	{
		foreach($list_field_value as $champ => $valeur)
			$list.=' AND '.$champ.' = "'.$valeur.'" ';
			
		$sql = 'SELECT * FROM tree WHERE 1=1 '.$list.' ';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
	
	//******************************************************************************************//
	//**************************************** AJOUTS ******************************************//
	//******************************************************************************************//
	
	// Recuperation de la liste des produits
	function selectProducts($langue='fr',$order='nom_produit')
	{
		if($order != '')
			$order = ' ORDER BY '.$order;
			
		$sql = 'SELECT produits.*, produits_elements.value AS nom_produit 
				FROM `produits` 
				JOIN elements ON (elements.id_template > 0 AND elements.id_template = produits.id_template AND elements.ordre = 3) 
				JOIN produits_elements ON (elements.id_element = produits_elements.id_element AND produits.id_produit = produits_elements.id_produit) 
				WHERE produits_elements.id_langue = "'.$langue.'" '.$order; 
		
		$res = $this->bdd->query($sql);
		$result = array();
		
		while($rec = $this->bdd->fetch_array($res))
		{
			$result[] = $rec;
		}
		
		return $result;
	}
	
	// Definition des types d'éléments
	public $typesElements = array('Texte','Textearea','Texteditor','Lien Interne','Lien Externe','Produit','Lien Interne ou Produit','Lien Interne ou Produit ou Lien Externe','Image','Fichier','Fichier Protected','Date','Checkbox');
	
	// Affichage des elements de formulaire en fonction du type d'élément
	function displayFormElement($id_tree,$element,$type='tree',$langue='fr')
	{
		if($type == 'tree')
		{
			// Remize a zero de l'objet
			$this->params['tree_elements']->unsetData();			
			
			// Recuperation de la valeur de l'element pour la page
			$this->params['tree_elements']->get($element['id_element'],'id_tree = '.$id_tree.' AND id_langue = "'.$langue.'" AND id_element');
					
			// Construction des differents elements
			switch($element['type_element'])
			{
				case 'Texte':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$this->params['tree_elements']->value.'" />
						</td>
					</tr>';				
				break;
				
				case 'Textearea':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<textarea class="textarea_large" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'">'.$this->params['tree_elements']->value.'</textarea>
						</td>
					</tr>';				
				break;
				
				case 'Texteditor':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<textarea class="textarea_large" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'">'.$this->params['tree_elements']->value.'</textarea>
							<script type="text/javascript">var cked = CKEDITOR.replace(\''.$element['slug'].'_'.$langue.'\');</script>
						</td>
					</tr>';			
				break;
				
				case 'Lien Interne':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
							<select name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">';
							foreach($this->listChilds(0,'-',array(),$langue) as $tree)
							{
								echo '<option value="'.$tree['id_tree'].'"'.($this->params['tree_elements']->value == $tree['id_tree']?' selected="selected"':'').'>'.$tree['title'].'</option>';
							}
							echo '
							</select>	
						</th>
					</tr>';			
				break;
				
				case 'Lien Externe':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$this->params['tree_elements']->value.'" />
						</td>
					</tr>';
				break;
				
				case 'Produit':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
							<select name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">';
							foreach($this->selectProducts($langue) as $prod)
							{
								echo '<option value="'.$prod['id_produit'].'"'.($this->params['tree_elements']->value == $prod['id_produit']?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
							}
							echo '
							</select>	
						</th>
					</tr>';			
				break;
				
				case 'Lien Interne ou Produit':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<select name="L-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers une page du site</option>';
								foreach($this->listChilds(0,'-',array(),$langue) as $tree)
								{
									echo '<option value="'.$tree['id_tree'].'"'.(($this->params['tree_elements']->value == $tree['id_tree'] && $this->params['tree_elements']->complement == 'L')?' selected="selected"':'').'>'.$tree['title'].'</option>';
								}
								echo '
							</select>	
							&nbsp;&nbsp;ou&nbsp;&nbsp;
							<select name="P-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers un produit</option>';
								foreach($this->selectProducts($langue) as $prod)
								{
									echo '<option value="'.$prod['id_produit'].'"'.(($this->params['tree_elements']->value==$prod['id_produit'] && $this->params['tree_elements']->complement == 'P')?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
								}
								echo '
							</select>
						</th>
					</tr>';			
				break;
				
				case 'Lien Interne ou Produit ou Lien Externe':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<select name="L-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers une page</option>';
								foreach($this->listChilds(0,'-',array(),$langue) as $tree)
								{
									echo '<option value="'.$tree['id_tree'].'"'.(($this->params['tree_elements']->value == $tree['id_tree'] && $this->params['tree_elements']->complement == 'L')?' selected="selected"':'').'>'.$tree['title'].'</option>';
								}
								echo '
							</select>
							&nbsp;&nbsp;ou&nbsp;&nbsp;	
							<select name="P-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers un produit</option>';
								foreach($this->selectProducts($langue) as $prod)
								{
									echo '<option value="'.$prod['id_produit'].'"'.(($this->params['tree_elements']->value==$prod['id_produit'] && $this->params['tree_elements']->complement == 'P')?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
								}
								echo '
							</select>
							&nbsp;&nbsp;ou un lien externe :&nbsp;&nbsp;
							<input class="input_large" type="text" name="LX-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.($this->params['tree_elements']->complement == 'LX'?$this->params['tree_elements']->value:'').'" />
						</th>
					</tr>';			
				break;
				
				case 'Image':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input type="file" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'_'.$langue.'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$this->params['tree_elements']->value.'" />
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'_'.$langue.'">Nom du fichier image :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'_'.$langue.'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$this->params['tree_elements']->complement.'" />
						</th>
					</tr>
					<tr id="deleteImageElement'.$this->params['tree_elements']->id.'">';
						if($this->params['tree_elements']->value != '')
						{
							if(substr(strtolower(strrchr(basename($this->params['tree_elements']->value),'.')),1) == 'swf')
							{
								echo '
								<th class="bas">
									<object type="application/x-shockwave-flash" data="'.$this->params['surl'].'/var/images/'.$this->params['tree_elements']->value.'" width="400" height="180" style="vertical-align:middle;">
										<param name="src" value="'.$this->params['surl'].'/var/images/'.$this->params['tree_elements']->value.'" />
										<param name="movie" value="'.$this->params['surl'].'/var/images/'.$this->params['tree_elements']->value.'" />
										<param name="quality" value="high" />
										<param name="bgcolor" value="#fff" />
										<param name="play" value="true" />
										<param name="loop" value="true" />
										<param name="scale" value="showall" />
										<param name="menu" value="true" />
										<param name="align" value="middle" />
										<param name="wmode" value="transparent" />
										<param name="pluginspage" value="http://www.macromedia.com/go/getflashplayer" />
										<param name="type" value="application/x-shockwave-flash" />
									</object>
									&nbsp;&nbsp; Supprimer le flash&nbsp;&nbsp;
									<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce flash ?\')){deleteImageElement('.$this->params['tree_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
										<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" style="vertical-align:middle;" />
									</a>
								</th>';	
							}
							else
							{
								list($width,$height) = @getimagesize($this->params['spath'].'images/'.$this->params['tree_elements']->value);								
								echo '
								<th class="bas">
									<a href="'.$this->params['surl'].'/var/images/'.$this->params['tree_elements']->value.'" class="thickbox">
										<img src="'.$this->params['surl'].'/var/images/'.$this->params['tree_elements']->value.'" alt="'.$element['name'].'"'.($height > 180?' height="180"':($width > 400?' width="400"':'')).' style="vertical-align:middle;" />
									</a>
									&nbsp;&nbsp; Supprimer l\'image&nbsp;&nbsp;
									<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer cette image ?\')){deleteImageElement('.$this->params['tree_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
										<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" style="vertical-align:middle;" />
									</a>
								</th>';	
							}
						}
						else
						{
							echo '
							<td>&nbsp;</td>';
						}
					echo '
					</tr>';
				break;
				
				case 'Fichier':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th colspan="2" class="bas">
							<input type="file" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'_'.$langue.'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$this->params['tree_elements']->value.'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'_'.$langue.'">Nom du fichier :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'_'.$langue.'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$this->params['tree_elements']->complement.'" />
						</th>
					</tr>
					<tr id="deleteFichierElement'.$this->params['tree_elements']->id.'">';
						if($this->params['tree_elements']->value != '')
						{
							echo '
							<th class="bas">
								<label>Fichier actuel</label> : 
								<a href="'.$this->params['surl'].'/var/fichiers/'.$this->params['tree_elements']->value.'" target="blank">'.$this->params['surl'].'/var/fichiers/'.$this->params['tree_elements']->value.'</a> 
								&nbsp;&nbsp;
								<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce fichier ?\')){deleteFichierElement('.$this->params['tree_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
									<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" />
								</a>
							</th>';	
						}
						else
						{
							echo '
							<td>&nbsp;</td>';
						}
					echo '
					</tr>';
				break;
				
				case 'Fichier Protected':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input type="file" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'_'.$langue.'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$this->params['tree_elements']->value.'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'_'.$langue.'">Nom du fichier :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'_'.$langue.'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$this->params['tree_elements']->complement.'" />
						</th>
					</tr>
					<tr id="deleteFichierProtectedElement'.$this->params['tree_elements']->id.'">';
						if($this->params['tree_elements']->value != '')
						{
							echo '
							<th class="bas">
								<label>Fichier actuel</label> : 
								<a href="'.$this->params['url'].'/protected/templates/'.$this->params['tree_elements']->value.'" target="blank">'.$this->params['tree_elements']->value.'</a> 
								&nbsp;&nbsp;
								<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce fichier ?\')){deleteFichierProtectedElement('.$this->params['tree_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
									<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" />
								</a>
							</th>';	
						}
						else
						{
							echo '
							<td>&nbsp;</td>';
						}
					echo '
					</tr>';
				break;
				
				case 'Date':
					echo '
					<tr>
						<th>
							<label for="datepik_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input class="input_dp" type="text" name="'.$element['slug'].'_'.$langue.'" id="datepik_'.$langue.'" value="'.$this->params['tree_elements']->value.'" />
						</th>
					</tr>';				
				break;
				
				case 'Checkbox':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].'</label> : 
							<input type="checkbox" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="1"'.($this->params['tree_elements']->value == 1?' checked="checked"':'').' />
						</th>
					</tr>';				
				break;
				
				default:
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$this->params['tree_elements']->value.'" />
						</td>
					</tr>';	
				break;
			}
		}
		else
		{
			// Remize a zero de l'objet
			$this->params['blocs_elements']->unsetData();
			
			// Recuperation de la valeur de l'element pour le bloc
			$this->params['blocs_elements']->get($element['id_element'],'id_bloc = '.$id_tree.' AND id_langue = "'.$langue.'" AND id_element');
				
			// Construction des differents elements
			switch($element['type_element'])
			{		
				case 'Texte':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$this->params['blocs_elements']->value.'" />
						</td>
					</tr>';				
				break;
				
				case 'Textearea':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<textarea class="textarea_large" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'">'.$this->params['blocs_elements']->value.'</textarea>
						</td>
					</tr>';				
				break;
				
				case 'Texteditor':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<textarea class="textarea_large" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'">'.$this->params['blocs_elements']->value.'</textarea>
							<script type="text/javascript">var cked = CKEDITOR.replace(\''.$element['slug'].'_'.$langue.'\');</script>
						</td>
					</tr>';			
				break;
				
				case 'Lien Interne':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
							<select name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">';
							foreach($this->listChilds(0,'-',array(),$langue) as $tree)
							{
								echo '<option value="'.$tree['id_tree'].'"'.($this->params['blocs_elements']->value == $tree['id_tree']?' selected="selected"':'').'>'.$tree['title'].'</option>';
							}
							echo '
							</select>	
						</th>
					</tr>';			
				break;
				
				case 'Lien Externe':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$this->params['blocs_elements']->value.'" />
						</td>
					</tr>';
				break;
				
				case 'Produit':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
							<select name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">';
							foreach($this->selectProducts($langue) as $prod)
							{
								echo '<option value="'.$prod['id_produit'].'"'.($this->params['blocs_elements']->value == $prod['id_produit']?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
							}
							echo '
							</select>	
						</th>
					</tr>';			
				break;
				
				case 'Lien Interne ou Produit':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<select name="L-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers une page du site</option>';
								foreach($this->listChilds(0,'-',array(),$langue) as $tree)
								{
									echo '<option value="'.$tree['id_tree'].'"'.(($this->params['blocs_elements']->value == $tree['id_tree'] && $this->params['blocs_elements']->complement == 'L')?' selected="selected"':'').'>'.$tree['title'].'</option>';
								}
								echo '
							</select>	
							&nbsp;&nbsp;ou&nbsp;&nbsp;
							<select name="P-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers un produit</option>';
								foreach($this->selectProducts($langue) as $prod)
								{
									echo '<option value="'.$prod['id_produit'].'"'.(($this->params['blocs_elements']->value==$prod['id_produit'] && $this->params['blocs_elements']->complement == 'P')?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
								}
								echo '
							</select>
						</th>
					</tr>';			
				break;
				
				case 'Lien Interne ou Produit ou Lien Externe':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<select name="L-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers une page</option>';
								foreach($this->listChilds(0,'-',array(),$langue) as $tree)
								{
									echo '<option value="'.$tree['id_tree'].'"'.(($this->params['blocs_elements']->value == $tree['id_tree'] && $this->params['blocs_elements']->complement == 'L')?' selected="selected"':'').'>'.$tree['title'].'</option>';
								}
								echo '
							</select>
							&nbsp;&nbsp;ou&nbsp;&nbsp;	
							<select name="P-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers un produit</option>';
								foreach($this->selectProducts($langue) as $prod)
								{
									echo '<option value="'.$prod['id_produit'].'"'.(($this->params['blocs_elements']->value==$prod['id_produit'] && $this->params['blocs_elements']->complement == 'P')?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
								}
								echo '
							</select>
							&nbsp;&nbsp;ou un lien externe :&nbsp;&nbsp;
							<input class="input_large" type="text" name="LX-'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.($this->params['blocs_elements']->complement == 'LX'?$this->params['blocs_elements']->value:'').'" />
						</th>
					</tr>';			
				break;
				
				case 'Image':
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input type="file" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'_'.$langue.'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$this->params['blocs_elements']->value.'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'_'.$langue.'">Nom du fichier image :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'_'.$langue.'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$this->params['blocs_elements']->complement.'" />
						</th>
					</tr>
					<tr id="deleteImageElementBloc'.$this->params['blocs_elements']->id.'">';
						if($this->params['blocs_elements']->value != '')
						{
							if(substr(strtolower(strrchr(basename($this->params['blocs_elements']->value),'.')),1) == 'swf')
							{
								echo '
								<th class="bas">
									<object type="application/x-shockwave-flash" data="'.$this->params['surl'].'/var/images/'.$this->params['blocs_elements']->value.'" width="400" height="180" style="vertical-align:middle;">
										<param name="src" value="'.$this->params['surl'].'/var/images/'.$this->params['blocs_elements']->value.'" />
										<param name="movie" value="'.$this->params['surl'].'/var/images/'.$this->params['blocs_elements']->value.'" />
										<param name="quality" value="high" />
										<param name="bgcolor" value="#fff" />
										<param name="play" value="true" />
										<param name="loop" value="true" />
										<param name="scale" value="showall" />
										<param name="menu" value="true" />
										<param name="align" value="middle" />
										<param name="wmode" value="transparent" />
										<param name="pluginspage" value="http://www.macromedia.com/go/getflashplayer" />
										<param name="type" value="application/x-shockwave-flash" />
									</object>
									&nbsp;&nbsp; Supprimer le flash&nbsp;&nbsp;
									<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce flash ?\')){deleteImageElementBloc('.$this->params['blocs_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
										<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" style="vertical-align:middle;" />
									</a>
								</th>';	
							}
							else
							{
								list($width,$height) = @getimagesize($this->params['surl'].'/var/images/'.$this->params['blocs_elements']->value);								
								echo '
								<th class="bas">
									<a href="'.$this->params['surl'].'/var/images/'.$this->params['blocs_elements']->value.'" class="thickbox">
										<img src="'.$this->params['surl'].'/var/images/'.$this->params['blocs_elements']->value.'" alt="'.$element['name'].'"'.($height > 180?' height="180"':($width > 400?' width="400"':'')).' style="vertical-align:middle;" />
									</a>
									&nbsp;&nbsp; Supprimer l\'image&nbsp;&nbsp;
									<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer cette image ?\')){deleteImageElementBloc('.$this->params['blocs_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
										<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" style="vertical-align:middle;" />
									</a>
								</th>';	
							}
						}
						else
						{
							echo '
							<td>&nbsp;</td>';
						}
					echo '
					</tr>';
				break;
				
				case 'Fichier':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input type="file" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'_'.$langue.'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$this->params['blocs_elements']->value.'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'_'.$langue.'">Nom du fichier :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'_'.$langue.'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$this->params['blocs_elements']->complement.'" />
						</th>
					</tr>
					<tr id="deleteFichierElementBloc'.$this->params['blocs_elements']->id.'">';
						if($this->params['blocs_elements']->value != '')
						{
							echo '
							<th class="bas">
								<label>Fichier actuel</label> : 
								<a href="'.$this->params['surl'].'/var/fichiers/'.$this->params['blocs_elements']->value.'" target="blank">'.$this->params['surl'].'/var/fichiers/'.$this->params['blocs_elements']->value.'</a> 
								&nbsp;&nbsp;
								<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce fichier ?\')){deleteFichierElementBloc('.$this->params['blocs_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
									<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" />
								</a>
							</th>';	
						}
						else
						{
							echo '
							<td>&nbsp;</td>';
						}
					echo '
					</tr>';
				break;
				
				case 'Fichier Protected':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input type="file" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'_'.$langue.'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$this->params['blocs_elements']->value.'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'_'.$langue.'">Nom du fichier :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'_'.$langue.'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$this->params['blocs_elements']->complement.'" />
						</th>
					</tr>
					<tr id="deleteFichierProtectedElementBloc'.$this->params['blocs_elements']->id.'">';
						if($this->params['blocs_elements']->value != '')
						{
							echo '
							<th class="bas">
								<label>Fichier actuel</label> : 
								<a href="'.$this->params['url'].'/protected/templates/'.$this->params['blocs_elements']->value.'" target="blank">'.$this->params['blocs_elements']->value.'</a> 
								&nbsp;&nbsp;
								<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce fichier ?\')){deleteFichierProtectedElementBloc('.$this->params['blocs_elements']->id.',\''.$element['slug'].'_'.$langue.'\');return false;}">
									<img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Supprimer" />
								</a>
							</th>';	
						}
						else
						{
							echo '
							<td>&nbsp;</td>';
						}
					echo '
					</tr>';
				break;
				
				case 'Date':
					echo '
					<tr>
						<th>
							<label for="datepik_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input class="input_dp" type="text" name="'.$element['slug'].'_'.$langue.'" id="datepik_'.$langue.'" value="'.$this->params['blocs_elements']->value.'" />
						</th>
					</tr>';				
				break;
				
				case 'Checkbox':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].'</label> : 
							<input type="checkbox" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="1"'.($this->params['blocs_elements']->value == 1?' checked="checked"':'').' />
						</th>
					</tr>';				
				break;
				
				default:
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$this->params['blocs_elements']->value.'" />
						</td>
					</tr>';	
				break;
			}
		}	
	}
	
	// Traitement du formulaire des elements en fonction du type d'element
	function handleFormElement($id_tree,$element,$type='tree',$langue='fr')
	{
		if($type == 'tree')
		{
			// Traitement des differents elements
			switch($element['type_element'])
			{
				case 'Image':					
					if(isset($_FILES[$element['slug'].'_'.$langue]) && $_FILES[$element['slug'].'_'.$langue]['name'] != '')
					{
						if($_POST['nom_'.$element['slug'].'_'.$langue] != '')
						{
							$this->nom_fichier = $this->bdd->generateSlug($_POST['nom_'.$element['slug'].'_'.$langue]);
						}
						else
						{
							$this->nom_fichier = '';
						}
						
						$this->params['upload']->setUploadDir($this->params['spath'],'images/');
						
						if($this->params['upload']->doUpload($element['slug'].'_'.$langue,$this->nom_fichier))
						{
							$_POST[$element['slug'].'_'.$langue] = $this->params['upload']->getName();
							$this->params['tree_elements']->id_tree = $id_tree;
							$this->params['tree_elements']->id_element = $element['id_element'];
							$this->params['tree_elements']->id_langue = $langue;
							$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue];
							$this->params['tree_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
							$this->params['tree_elements']->status = 1;
							$this->params['tree_elements']->create();
						}
						else
						{
							$this->params['tree_elements']->id_tree = $id_tree;
							$this->params['tree_elements']->id_element = $element['id_element'];
							$this->params['tree_elements']->id_langue = $langue;
							$this->params['tree_elements']->value = '';
							$this->params['tree_elements']->complement = '';
							$this->params['tree_elements']->status = 1;
							$this->params['tree_elements']->create();
						}
					}
					else
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue.'-old'];
						$this->params['tree_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();								
					}					
				break;
				
				case 'Fichier':					
					if(isset($_FILES[$element['slug'].'_'.$langue]) && $_FILES[$element['slug'].'_'.$langue]['name'] != '')
					{
						if($_POST['nom_'.$element['slug'].'_'.$langue] != '')
						{
							$this->nom_fichier = $this->bdd->generateSlug($_POST['nom_'.$element['slug'].'_'.$langue]);
						}
						else
						{
							$this->nom_fichier = '';
						}
						
						$this->params['upload']->setUploadDir($this->params['spath'],'fichiers/');
						
						if($this->params['upload']->doUpload($element['slug'].'_'.$langue,$this->nom_fichier))
						{
							$_POST[$element['slug'].'_'.$langue] = $this->params['upload']->getName();
							$this->params['tree_elements']->id_tree = $id_tree;
							$this->params['tree_elements']->id_element = $element['id_element'];
							$this->params['tree_elements']->id_langue = $langue;
							$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue];
							$this->params['tree_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
							$this->params['tree_elements']->status = 1;
							$this->params['tree_elements']->create();
						}
						else
						{
							$this->params['tree_elements']->id_tree = $id_tree;
							$this->params['tree_elements']->id_element = $element['id_element'];
							$this->params['tree_elements']->id_langue = $langue;
							$this->params['tree_elements']->value = '';
							$this->params['tree_elements']->complement = '';
							$this->params['tree_elements']->status = 1;
							$this->params['tree_elements']->create();
						}
					}
					else
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue.'-old'];
						$this->params['tree_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();								
					}					
				break;
				
				case 'Fichier Protected':					
					if(isset($_FILES[$element['slug'].'_'.$langue]) && $_FILES[$element['slug'].'_'.$langue]['name'] != '')
					{
						if($_POST['nom_'.$element['slug'].'_'.$langue] != '')
						{
							$this->nom_fichier = $this->bdd->generateSlug($_POST['nom_'.$element['slug'].'_'.$langue]);
						}
						else
						{
							$this->nom_fichier = '';
						}
						
						$this->params['upload']->setUploadDir($this->params['path'],'protected/templates/');
						
						if($this->params['upload']->doUpload($element['slug'].'_'.$langue,$this->nom_fichier))
						{
							$_POST[$element['slug'].'_'.$langue] = $this->params['upload']->getName();
							$this->params['tree_elements']->id_tree = $id_tree;
							$this->params['tree_elements']->id_element = $element['id_element'];
							$this->params['tree_elements']->id_langue = $langue;
							$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue];
							$this->params['tree_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
							$this->params['tree_elements']->status = 1;
							$this->params['tree_elements']->create();
						}
						else
						{
							$this->params['tree_elements']->id_tree = $id_tree;
							$this->params['tree_elements']->id_element = $element['id_element'];
							$this->params['tree_elements']->id_langue = $langue;
							$this->params['tree_elements']->value = '';
							$this->params['tree_elements']->complement = '';
							$this->params['tree_elements']->status = 1;
							$this->params['tree_elements']->create();
						}
					}
					else
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue.'-old'];
						$this->params['tree_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();								
					}					
				break;
				
				case 'Lien Interne ou Produit':					
					if($_POST['P-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST['P-'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->complement = 'P';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}
					elseif($_POST['L-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST['L-'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->complement = 'L';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}
					else
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = '';
						$this->params['tree_elements']->complement = '';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}					
				break;
				
				case 'Lien Interne ou Produit ou Lien Externe':				
					if($_POST['P-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST['P-'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->complement = 'P';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}
					elseif($_POST['L-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST['L-'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->complement = 'L';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}
					elseif($_POST['LX-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = $_POST['LX-'.$element['slug'].'_'.$langue];
						$this->params['tree_elements']->complement = 'LX';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}
					else
					{
						$this->params['tree_elements']->id_tree = $id_tree;
						$this->params['tree_elements']->id_element = $element['id_element'];
						$this->params['tree_elements']->id_langue = $langue;
						$this->params['tree_elements']->value = '';
						$this->params['tree_elements']->complement = '';
						$this->params['tree_elements']->status = 1;
						$this->params['tree_elements']->create();
					}									
				break;
				
				default:				
					$this->params['tree_elements']->id_tree = $id_tree;
					$this->params['tree_elements']->id_element = $element['id_element'];
					$this->params['tree_elements']->id_langue = $langue;
					$this->params['tree_elements']->value = $_POST[$element['slug'].'_'.$langue];
					$this->params['tree_elements']->complement = '';
					$this->params['tree_elements']->status = 1;
					$this->params['tree_elements']->create();					
				break;
			}
		}
		else
		{
			// Traitement des differents elements
			switch($element['type_element'])
			{
				case 'Image':					
					if(isset($_FILES[$element['slug'].'_'.$langue]) && $_FILES[$element['slug'].'_'.$langue]['name'] != '')
					{
						if($_POST['nom_'.$element['slug'].'_'.$langue] != '')
						{
							$this->nom_fichier = $this->bdd->generateSlug($_POST['nom_'.$element['slug'].'_'.$langue]);
						}
						else
						{
							$this->nom_fichier = '';
						}
						
						$this->params['upload']->setUploadDir($this->params['spath'],'images/');
						
						if($this->params['upload']->doUpload($element['slug'].'_'.$langue,$this->nom_fichier))
						{
							$_POST[$element['slug'].'_'.$langue] = $this->params['upload']->getName();
							$this->params['blocs_elements']->id_bloc = $id_tree;
							$this->params['blocs_elements']->id_element = $element['id_element'];
							$this->params['blocs_elements']->id_langue = $langue;
							$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue];
							$this->params['blocs_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
							$this->params['blocs_elements']->status = 1;
							$this->params['blocs_elements']->create();
						}
						else
						{
							$this->params['blocs_elements']->id_bloc = $id_tree;
							$this->params['blocs_elements']->id_element = $element['id_element'];
							$this->params['blocs_elements']->id_langue = $langue;
							$this->params['blocs_elements']->value = '';
							$this->params['blocs_elements']->complement = '';
							$this->params['blocs_elements']->status = 1;
							$this->params['blocs_elements']->create();
						}
					}
					else
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue.'-old'];
						$this->params['blocs_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();								
					}					
				break;
				
				case 'Fichier':					
					if(isset($_FILES[$element['slug'].'_'.$langue]) && $_FILES[$element['slug'].'_'.$langue]['name'] != '')
					{
						if($_POST['nom_'.$element['slug'].'_'.$langue] != '')
						{
							$this->nom_fichier = $this->bdd->generateSlug($_POST['nom_'.$element['slug'].'_'.$langue]);
						}
						else
						{
							$this->nom_fichier = '';
						}
						
						$this->params['upload']->setUploadDir($this->params['spath'],'fichiers/');
						
						if($this->params['upload']->doUpload($element['slug'].'_'.$langue,$this->nom_fichier))
						{
							$_POST[$element['slug'].'_'.$langue] = $this->params['upload']->getName();
							$this->params['blocs_elements']->id_bloc = $id_tree;
							$this->params['blocs_elements']->id_element = $element['id_element'];
							$this->params['blocs_elements']->id_langue = $langue;
							$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue];
							$this->params['blocs_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
							$this->params['blocs_elements']->status = 1;
							$this->params['blocs_elements']->create();
						}
						else
						{
							$this->params['blocs_elements']->id_bloc = $id_tree;
							$this->params['blocs_elements']->id_element = $element['id_element'];
							$this->params['blocs_elements']->id_langue = $langue;
							$this->params['blocs_elements']->value = '';
							$this->params['blocs_elements']->complement = '';
							$this->params['blocs_elements']->status = 1;
							$this->params['blocs_elements']->create();
						}
					}
					else
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue.'-old'];
						$this->params['blocs_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();								
					}					
				break;
				
				case 'Fichier Protected':
					if(isset($_FILES[$element['slug'].'_'.$langue]) && $_FILES[$element['slug'].'_'.$langue]['name'] != '')
					{
						if($_POST['nom_'.$element['slug'].'_'.$langue] != '')
						{
							$this->nom_fichier = $this->bdd->generateSlug($_POST['nom_'.$element['slug'].'_'.$langue]);
						}
						else
						{
							$this->nom_fichier = '';
						}
						
						$this->params['upload']->setUploadDir($this->params['path'],'protected/templates/');
						
						if($this->params['upload']->doUpload($element['slug'].'_'.$langue,$this->nom_fichier))
						{
							$_POST[$element['slug'].'_'.$langue] = $this->params['upload']->getName();
							$this->params['blocs_elements']->id_bloc = $id_tree;
							$this->params['blocs_elements']->id_element = $element['id_element'];
							$this->params['blocs_elements']->id_langue = $langue;
							$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue];
							$this->params['blocs_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
							$this->params['blocs_elements']->status = 1;
							$this->params['blocs_elements']->create();
						}
						else
						{
							$this->params['blocs_elements']->id_bloc = $id_tree;
							$this->params['blocs_elements']->id_element = $element['id_element'];
							$this->params['blocs_elements']->id_langue = $langue;
							$this->params['blocs_elements']->value = '';
							$this->params['blocs_elements']->complement = '';
							$this->params['blocs_elements']->status = 1;
							$this->params['blocs_elements']->create();
						}
					}
					else
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue.'-old'];
						$this->params['blocs_elements']->complement = $_POST['nom_'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();								
					}					
				break;
				
				case 'Lien Interne ou Produit':					
					if($_POST['P-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST['P-'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->complement = 'P';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}
					elseif($_POST['L-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST['L-'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->complement = 'L';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}
					else
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = '';
						$this->params['blocs_elements']->complement = '';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}					
				break;
				
				case 'Lien Interne ou Produit ou Lien Externe':				
					if($_POST['P-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST['P-'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->complement = 'P';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}
					elseif($_POST['L-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST['L-'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->complement = 'L';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}
					elseif($_POST['LX-'.$element['slug'].'_'.$langue] != '')
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = $_POST['LX-'.$element['slug'].'_'.$langue];
						$this->params['blocs_elements']->complement = 'LX';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}
					else
					{
						$this->params['blocs_elements']->id_bloc = $id_tree;
						$this->params['blocs_elements']->id_element = $element['id_element'];
						$this->params['blocs_elements']->id_langue = $langue;
						$this->params['blocs_elements']->value = '';
						$this->params['blocs_elements']->complement = '';
						$this->params['blocs_elements']->status = 1;
						$this->params['blocs_elements']->create();
					}									
				break;
				
				default:				
					$this->params['blocs_elements']->id_bloc = $id_tree;
					$this->params['blocs_elements']->id_element = $element['id_element'];
					$this->params['blocs_elements']->id_langue = $langue;
					$this->params['blocs_elements']->value = $_POST[$element['slug'].'_'.$langue];
					$this->params['blocs_elements']->complement = '';
					$this->params['blocs_elements']->status = 1;
					$this->params['blocs_elements']->create();					
				break;
			}
		}
	}
	
	// Recuperation de l'id max pour la création d'une page (clé primaire multiple, pas d'auto incremente)
	function getMaxId()
	{
		$sql = 'SELECT MAX(id_tree) as id FROM tree';
		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	// Recuperation des enfants et construction html de l'arbo
	function getChilds($id_parent,$langue='fr')
	{
		$lRubriques = $this->select('id_parent = '.$id_parent.' AND id_langue = "'.$langue.'"','ordre ASC');
		
		// Creation de l'arbo
		foreach($lRubriques as $rub)
		{
			// On recupere la premiere position pour voir si on affiche la fleche up
			if($rub['ordre'] == $this->getFirstPosition($rub['id_parent']))
			{
				$up = '';
			}				
			else
			{
				$up = '<a href="'.$this->params['url'].'/tree/up/'.$rub['id_tree'].'" title="Up"><img src="'.$this->params['surl'].'/images/admin/up.png" alt="Up" /></a>';
			}
			
			// On recupere la derniere position pour voir si on affiche la fleche down			
			if($rub['ordre'] == $this->getLastPosition($rub['id_parent']))
			{
				$down = '';
			}				
			else
			{
				$down = '
				<a href="'.$this->params['url'].'/tree/down/'.$rub['id_tree'].'" title="Down"><img src="'.$this->params['surl'].'/images/admin/down.png" alt="Down" /></a>';
			}
			
			// On tronque les noms trop longs pour l'affichage dans le menu
			if(strlen($rub['menu_title']) > 60)
			{
				$rub['menu_title'] = substr($rub['menu_title'],0,60).'...';
			}
			
			// Mise en gras des principales rubriques (id_parent = 1)
			if($rub['id_parent'] == 1)
			{
				$b = '<strong>';
				$sb = '</strong>';
			}
			else
			{
				$b = '';
				$sb = '';
			}
			
			// On check si ya encore un niveau en dessous pour afficher un icone de dossier ou de fichier
			if($this->counter('id_parent = '.$rub['id_tree']) > 0)
			{
				if($rub['status'] == 0)
				{
					$class = 'folder hl';
				}
				else
				{
					$class = 'folder';
				}
			}
			else
			{
				if($rub['status'] == 0)
				{
					$class = 'file hl';
				}
				else
				{
					$class = 'file';
				}	
			}
			
			// Constructions des edit,del et add
			$edit = '
			<a href="'.$this->params['url'].'/tree/edit/'.$rub['id_tree'].'" title="Edit"><img src="'.$this->params['surl'].'/images/admin/edit.png" alt="Edit" /></a>';
			
			$add = '
			<a href="'.$this->params['url'].'/tree/add/'.$rub['id_tree'].'" title="Add"><img src="'.$this->params['surl'].'/images/admin/add.png" alt="Add" /></a>';
			
			$del = '
			<a href="'.$this->params['url'].'/tree/delete/'.$rub['id_tree'].'" onclick="return confirm(\'Etes vous sur de vouloir supprimer cette page et toutes les pages qui en dépendent ?\')" title="Delete"><img src="'.$this->params['surl'].'/images/admin/delete.png" alt="Delete" /></a>';
			
			// Construction de l'arbre
			$this->arbre .= '
			<li>
				<span class="'.$class.'">'.$b.''.$rub['menu_title'].''.$sb.''.$up.''.$down.''.$edit.''.$add.''.$del.'</span>';
				
			if($this->counter('id_parent = '.$rub['id_tree']) > 0)
			{
				$this->arbre .= '
				<ul>';	

				$this->getChilds($rub['id_tree'],$langue,$this->arbre);
				
				$this->arbre .= '
				</ul>';
			}
			
			$this->arbre .= '
			</li>';
		}
	}
	
	// Recuperation et affichage de l'arbo du site
	function getArbo($id='1',$langue='fr')
	{	
		$edit = '
		<a href="'.$this->params['url'].'/tree/edit/'.$id.'" title="Edit"><img src="'.$this->params['surl'].'/images/admin/edit.png" alt="Edit" /></a>';
		
		$add = '
		<a href="'.$this->params['url'].'/tree/add/'.$id.'" title="Add"><img src="'.$this->params['surl'].'/images/admin/add.png" border="0" alt="Add" /></a>';
		
		$this->arbre = '<img src="'.$this->params['surl'].'/images/admin/home.png" border="0" alt="Home" />'.$edit.''.$add;
		
		$this->arbre .= '<ul id="browser" class="filetree">';		
		
		$this->getChilds($id,$langue,$this->arbre);
		
		$this->arbre .= '</ul>';
		
		return $this->arbre;
	}
	
	// Construction de l'arbo pour un select
	function listChilds($id_parent,$indent,$tableau,$id_langue='fr')
	{
		if($indent != '')
		{
			$indent .= '---';
		}
			
		$sql = 'SELECT * FROM tree WHERE id_parent = '.$id_parent.' AND id_langue = "'.$id_langue.'" ORDER BY ordre ASC ';
		$result = $this->bdd->query($sql);
	
		while($record = $this->bdd->fetch_assoc($result))
		{
			$tableau[]= array('id_tree'=>$record['id_tree'],'title'=>$indent.$record['menu_title'],'id_parent'=>$id_parent,'slug'=>$record['slug']);
			$tableau = $this->listChilds($record['id_tree'],$indent,$tableau,$id_langue);
		}
		
		return $tableau;
	}
	
	// Construction de l'arbo pour un select de cat secondaires
	function listChildsBis($lID,$id_langue='fr')
	{
		$sql = 'SELECT * FROM tree WHERE id_tree IN ('.$lID.') AND id_langue = "'.$id_langue.'" ORDER BY ordre ASC ';
		$result = $this->bdd->query($sql);
		$tableau = array();
		
		while($record = $this->bdd->fetch_assoc($result))
		{
			$sql2 = 'SELECT * FROM tree WHERE id_parent = '.$record['id_tree'].' AND id_langue = "'.$id_langue.'" ORDER BY ordre ASC ';
			$result2 = $this->bdd->query($sql2);
			
			while($record2 = $this->bdd->fetch_assoc($result2))
			{
				$tableau[]= array('id_tree'=>$record2['id_tree'],'title'=>$record2['menu_title'],'id_parent'=>$record['id_tree'],'title_parent'=>$record['menu_title'],'slug'=>$record2['slug']);
			}
		}
		return $tableau;
	}
	
	// Récupération de la premiere position des pages d'une rubrique
	function getFirstPosition($id_parent)
	{
		$sql = 'SELECT ordre FROM tree WHERE id_parent = '.$id_parent.' ORDER BY ordre ASC LIMIT 1';
		$result = $this->bdd->query($sql);
		
		return (int)($this->bdd->result($result,0,0));
	}
	
	// Récupération de la derniere position des pages d'une rubrique
	function getLastPosition($id_parent)
	{
		$sql = 'SELECT ordre FROM tree WHERE id_parent = '.$id_parent.' ORDER BY ordre DESC LIMIT 1';
		$result = $this->bdd->query($sql);
		
		return (int)($this->bdd->result($result,0,0));
	}
	
	// Monter une page dans l'arborescence
	// Si pb cf tree_menu
	function moveUp($id)
	{
		$id_parent = $this->getParent($id);
		$position = $this->getPosition($id);
		
		$sql = 'UPDATE tree SET ordre = ordre + 1 WHERE id_parent = '.$id_parent.' AND ordre < '.$position.' ORDER BY ordre DESC LIMIT 1';
		$this->bdd->query($sql);
		
		$sql = 'UPDATE tree SET ordre = ordre - 1 WHERE id_tree = '.$id;
		$this->bdd->query($sql);
		$this->reordre($id_parent);
	}
	
	// Descendre une page dans l'arborescence
	// Si pb cf tree_menu
	function moveDown($id)
	{
		$id_parent = $this->getParent($id);
		$position = $this->getPosition($id);
		
		$sql = 'UPDATE tree SET ordre = ordre - 1 WHERE id_parent = '.$id_parent.' AND ordre > '.$position.' ORDER BY ordre ASC LIMIT 1';
		$this->bdd->query($sql);
		
		$sql = 'UPDATE tree SET ordre = ordre + 1 WHERE id_tree = '.$id;
		$this->bdd->query($sql);
		$this->reordre($id_parent);
	}
	
	// Récupération de l'ID parent de la rubrique
	function getParent($id)
	{
		$sql = 'SELECT id_parent FROM tree WHERE id_tree = '.$id;
		$result = $this->bdd->query($sql);
		
		return (int)($this->bdd->result($result,0,0));
	}
	
	// Récupération de la position de la page
	function getPosition($id)
	{
		$sql = 'SELECT ordre FROM tree WHERE id_tree = '.$id;
		$result = $this->bdd->query($sql);
		
		return (int)($this->bdd->result($result,0,0));
	}
	
	// Reordonner une rubrique
	function reordre($id_parent)
	{
		$sql = 'SELECT DISTINCT(id_tree) FROM tree WHERE id_parent='.$id_parent.' ORDER BY ordre ASC ';
		$result = $this->bdd->query($sql);
		
		$i = 0;
		while($record = $this->bdd->fetch_array($result))
		{
			$sql1 = 'UPDATE tree SET ordre = '.$i.' WHERE id_tree = '.$record['id_tree'];
			$this->bdd->query($sql1);
			$i++;
		}
	}
	
	// Suppression en cascade des pages d'un parent
	function deleteCascade($id_parent)
	{
		$id_grand_parent = $this->getParent($id_parent);
		
		$sql = 'SELECT id_tree FROM tree WHERE id_parent = '.$id_parent;
		$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($result))
		{
			$final[] = $record['id_tree'];
			$this->params['tree_elements']->delete($record['id_tree'],'id_tree');
			$this->deleteCascade($record['id_tree']);			
		}
	
		if(is_array($final))
		{
			foreach($final as $f)
			{
				if(!is_null($f))
				{
					$this->delete(array('id_tree'=>$f));
				}
			}
		}
		
		$this->delete(array('id_tree'=>$id_parent));
		$this->params['tree_elements']->delete($id_parent,'id_tree');
		$this->reordre($id_grand_parent);
	}
	
	// On rement le champ template des page à 0 dans la table tree
	function deleteTemplate($id_template)
	{
		$sql = 'UPDATE tree SET id_template = 0 WHERE id_template = "'.$id_template.'"';
		$this->bdd->query($sql);
	}
	
	// Récupération des menus de la navigation principale
	function getNavigation($id_parent,$langue='fr',$result=array())
	{
		$sql = 'SELECT * FROM tree 
				WHERE status = 1 AND status_menu = 1 AND id_langue = "'.$langue.'" AND id_parent = "'.$id_parent.'" 
				ORDER BY tree.ordre ASC';
				
		$resultat = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		
		return $result;		
	}
	
	// Récupération des menus hors navigation principale
	function getMenu($slug,$langue='fr',$lurl)
	{
		$sql = 'SELECT tm.*, m.id_menu, (IF(tm.complement="LX", (IF(tm.value LIKE "https://%", tm.value, IF(tm.value LIKE "http://%", tm.value, CONCAT("http://",tm.value)))), CONCAT("'.$lurl.'/",(SELECT slug FROM tree WHERE id_tree = tm.value AND id_langue= "'.$langue.'")))) as url
			   FROM menus m 
			   LEFT JOIN tree_menu tm ON m.id_menu = tm.id_menu 
			   WHERE m.status = 1 
			   AND tm.id_langue = "'.$langue.'" 
			   AND m.slug = "'.$slug.'" 
			   AND tm.status = 1  
			   ORDER BY tm.ordre ASC';
                               
	   $resultat = $this->bdd->query($sql);
	   $result = array();
	   
	   while($record = $this->bdd->fetch_array($resultat))
	   {
			$result[] = $record;
	   }
	   
	   return $result;
	}
	
	// Récupération du slug de la page
	function getSlug($id,$langue='fr')
	{
		$sql = 'SELECT slug FROM tree WHERE id_langue = "'.$langue.'" AND id_tree = '.$id;
		$result = $this->bdd->query($sql);
		
		return $this->bdd->result($result,0,0);
	}
	
	// Récupération du premier parent (premiere rubrique juste sous la home donc id_parent = 1)
	function getFirstParent($id,$langue='fr')
	{
		$sql = 'SELECT id_tree,id_parent FROM tree WHERE id_langue = "'.$langue.'" AND id_tree = '.$id;
		$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($result))
       	{
       		if($record['id_parent'] == 1)
       		{
       			$tmp = $record['id_tree'];
       			continue;
       		}
       		return $this->getFirstParent($record['id_parent'],$langue);
       	}
       	
       	return $tmp;
  	}
	
	// Récupération du parent avec template unlock
	function getFirstUnlock($id,$langue='fr')
	{
		$sql = 'SELECT 
					t.id_tree AS id_tree,
					t.id_parent AS id_parent, 
					(SELECT tp.affichage FROM templates tp WHERE t.id_template = tp.id_template) AS affichage 
				FROM tree t WHERE t.id_langue = "'.$langue.'" AND t.id_tree = '.$id;
		$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($result))
       	{
       		if($record['affichage'] == 0)
       		{
       			$tmp = $record['id_tree'];
       			continue;
       		}
       		return $this->getFirstUnlock($record['id_parent'],$langue);
       	}
       	
       	return $tmp;
  	}
	
	// Récupération du premier parent qu'on choisi 
	function getSelectedParent($id,$langue='fr',$id_parent=1)
	{
		$sql = 'SELECT id_tree,id_parent FROM tree WHERE id_langue = "'.$langue.'" AND id_tree = '.$id;
		$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($result))
       	{
       		if($record['id_parent'] == $id_parent)
       		{
       			$tmp = $record['id_tree'];
       			continue;
       		}
       		return $this->getFirstParent($record['id_parent'],$langue);
       	}
       	
       	return $tmp;
  	}
	
	// Recuperation du breadcrumb
	function getBreadCrumbTemp($id_tree,$langue='fr',$tableau=array(),$first=true)
	{
		$sql = 'SELECT * FROM tree WHERE id_langue = "'.$langue.'" AND id_tree = '.$id_tree;
		
       	$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($result))
       	{
       		$tableau[]= $record;
			
			if($record['id_parent'] != 0)
			{
				$tableau = $this->getBreadCrumbTemp($record['id_parent'],$langue,$tableau,false);       		
			}
       	}
		
		return $tableau;
	}
	
	function getBreadCrumb($id_tree,$langue='fr')
	{		
		return array_reverse($this->getBreadCrumbTemp($id_tree,$langue));
	}
	
	// Recuperation des enfants et construction html de l'arbo plan du site
	function getChildsPDS($id_parent,$langue='fr')
	{
		$lRubriques = $this->select('id_langue = "'.$langue.'" AND status = 1 AND id_parent = '.$id_parent,'ordre ASC');//,71
		
		// Creation de l'arbo
		foreach($lRubriques as $rub)
		{
			// Mise en gras des principales rubriques (id_parent = 1)
			if($rub['id_parent'] == 1)
			{
				$b = '<strong>';
				$sb = '</strong>';
			}
			else
			{
				$b = '';
				$sb = '';
			}
			
			// Construction de l'arbre
			$this->arbre .= '
			<li><a href="'.$this->params['url'].'/'.$rub['slug'].'">'.$b.''.$rub['menu_title'].''.$sb.'</a>';
				
			if($this->counter('id_parent = '.$rub['id_tree']) > 0)
			{
				$this->arbre .= '
				<ul>';	

				$this->getChildsPDS($rub['id_tree'],$langue,$this->arbre);
				
				$this->arbre .= '
				</ul>';
			}
			
			$this->arbre .= '
			</li>';			
		}
	}
	
	// Recuperation et affichage de l'arbo du plan du site
	function getPlanDuSite($langue='fr')
	{
		$this->arbre = '<ul class="plansite">';		
		
		$this->arbre .= '<li><a href="'.$this->params['url'].'"><strong>Accueil</strong></a></li>';
		
		$this->getChildsPDS(1,$langue,$this->arbre);
		
		$this->arbre .= '</ul>';
		
		return $this->arbre;
	}
	
	// Recuperation du prochain article d'une rubrique
	function getNextPage($id_tree,$langue='fr')
	{
		$id_parent = $this->getParent($id_tree);
		$position = $this->getPosition($id_tree);
		
		$sql = 'SELECT slug,title,id_tree FROM tree WHERE id_parent = "'.$id_parent.'" AND ordre = '.($position + 1).' AND status = 1 AND id_langue = "'.$langue.'"';
		$result = $this->bdd->query($sql);
		$record = $this->bdd->fetch_array($result);

		return $record;
	}
	
	// Recuperation du precedent article d'une rubrique
	function getPreviousPage($id_tree,$langue='fr')
	{
		$id_parent = $this->getParent($id_tree);
		$position = $this->getPosition($id_tree);
		
		$sql = 'SELECT slug,title,id_tree FROM tree WHERE id_parent = "'.$id_parent.'" AND ordre = '.($position - 1).' AND status = 1 AND id_langue = "'.$langue.'"';
		$result = $this->bdd->query($sql);
		$record = $this->bdd->fetch_array($result);

		return $record;
	}
	
	// Recuperation des ID pages (dernier niveau de l'arbo) a partir d'une rubrique
	function listIdchild($id_parent,$langue='fr',$tableau=array())
	{
		$sql = 'SELECT * FROM tree WHERE id_langue = "'.$langue.'" AND id_parent = '.$id_parent;
		$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_assoc($result))
		{
			$tableau[]= $record['id_tree'];
			$tableau = $this->listIdchild($record['id_tree'],$tableau);
		}
		
		return $tableau;
	}
	
	// La suite ...
	function getLastChildren($id_parent,$id_template,$langue='fr',$start='',$nb='')
	{
		$sql = 'SELECT * FROM tree WHERE id_template = "'.$id_template.'" AND id_tree IN ('.implode(',',$this->listIdchild($id_parent,$langue)).') AND id_langue = "'.$langue.'" ORDER BY added DESC '.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
		$resultat = $this->bdd->query($sql);
		
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
	
	// Status à 0 en cascade pour les enfants d'une page que l'on passe à 0
	function statusCascade($id_parent,$id_langue='fr')
	{
		$sql = 'SELECT id_tree FROM tree WHERE id_parent = '.$id_parent.' AND id_langue = "'.$id_langue.'"';
		$result = $this->bdd->query($sql);
		
		while($record = $this->bdd->fetch_array($result))
		{
			$final[] = $record['id_tree'];
			$this->statusCascade($record['id_tree'],$id_langue);			
		}
	
		if(is_array($final))
		{
			foreach($final as $f)
			{
				if(!is_null($f))
				{
					$this->get(array('id_tree'=>$f,'id_langue'=>$id_langue));
					$this->status = 0;
					$this->update(array('id_tree'=>$f,'id_langue'=>$id_langue));
				}
			}
		}
	}
	
	// Select pour le sitemap
	function selectMap($where='',$order='',$start='',$nb='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
		if($order != '')
			$order = ' ORDER BY '.$order;
		$sql = 'SELECT t.slug as slug, t.updated as updated FROM tree t'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
	
	// Counter pour le site map
	function counterMap($where='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
			
		$sql='SELECT count(t.id_tree) FROM tree t '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	} 
	
	// Recuperation du liste produits
	function listeProduits($id_langue='fr',$status='1')
	{
		$sql = 'SELECT
					p.id_produit AS id_produit, 
					p.status AS status, 
					(SELECT t.title FROM tree t JOIN produits_tree pt ON t.id_tree = pt.id_tree WHERE pt.id_produit = p.id_produit AND t.id_langue = "'.$id_langue.'" AND pt.ordre_tree = 1) AS categorie, 
					(SELECT t.slug FROM tree t JOIN produits_tree pt ON t.id_tree = pt.id_tree WHERE pt.id_produit = p.id_produit AND t.id_langue = "'.$id_langue.'" AND pt.ordre_tree = 1) AS slug_categorie, 
					(SELECT pi.fichier FROM produits_images pi WHERE pi.id_produit = p.id_produit AND pi.fichier != "" ORDER BY pi.ordre ASC LIMIT 1) AS image, 		
					(SELECT pe.value FROM produits_elements pe JOIN elements e ON (e.id_element = pe.id_element AND e.ordre = 3) WHERE pe.id_produit = p.id_produit AND pe.id_langue = "'.$id_langue.'") AS nom, 
					(SELECT pe.complement FROM produits_elements pe JOIN elements e ON (e.id_element = pe.id_element AND e.ordre = 3) WHERE pe.id_produit = p.id_produit AND pe.id_langue = "'.$id_langue.'") AS slug
				FROM 
					produits p 
				WHERE 
					p.status IN ('.$status.') 
				';

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
	
	// Recuperation des enfants et construction sitemap
	function getChildSitemap($id_parent,$langue='fr',$cms='iZinoa')
	{
		$lRubriques = $this->selectMap('t.id_parent = '.$id_parent.' AND t.id_langue = "'.$langue.'" AND t.id_template > 0 AND t.status = 1 AND t.prive = 0 AND (SELECT tp.affichage FROM templates tp WHERE tp.id_template = t.id_template) = 0','t.ordre ASC');
		
		// Creation de l'arbo
		foreach($lRubriques as $rub)
		{			
			// Construction du sitemap
			$this->sitemap .= '
	<url>
		<loc>'.$this->params['front'].'/'.$langue.'/'.$rub['slug'].'</loc>
		<lastmod>'.$rub['updated'].'</lastmod>
	</url>';
				
			if($this->counterMap('t.id_parent = '.$rub['id_tree'].' AND t.id_langue = "'.$langue.'" AND t.id_template > 0 AND t.status = 1 AND t.prive = 0 AND (SELECT tp.affichage FROM templates tp WHERE tp.id_template = t.id_template) = 0') > 0)
			{
				$this->getChildSitemap($rub['id_tree'],$langue,$cms,$this->sitemap);
			}
		}
		
		if($cms == 'iZicom')
		{
			$lProduits = $this->listeProduits($langue,1);
			
			// Creation de l'arbo
			foreach($lProduits as $rub)
			{			
				// Construction du sitemap
				$this->sitemap .= '
	<url>
		<loc>'.$this->params['front'].'/'.$langue.'/'.$rub['slug'].'/'.$rub['slug_categorie'].'</loc>
		<lastmod>'.$rub['updated'].'</lastmod>
	</url>';
			}
		}
	}
	
	// Recuperation du sitemap
	function getSitemap($langue='fr',$cms='iZinoa')
	{	
		$this->sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>'.$this->params['front'].'/'.$langue.'</loc>
	</url>';
		
		$this->getChildSitemap(1,$langue,$cms,$this->sitemap);
		
		$this->sitemap .= '
</urlset>';
		
		return $this->sitemap;
	}
	
	// duplication
	function duplicatePage($id_tree,$id_parent)
	{
		$sql = 'SELECT ordre FROM tree WHERE id_parent = '.$id_parent. ' ORDER BY ordre DESC LIMIT 1';
		$result = $this->bdd->query($sql);
		$ordre = $this->bdd->result($result,0)+1;
		
		$sql = 'SELECT id_tree FROM tree  ORDER BY id_tree DESC LIMIT 1';
		$result = $this->bdd->query($sql);
		$id = $this->bdd->result($result,0)+1;
		
		$sql = 'INSERT INTO `tree`(`id_tree`,`id_langue`,`id_parent`,`id_template`,`id_user`,`title`,`slug`,`img_menu`,`menu_title`,`meta_title`,`meta_description`,`meta_keywords`,`ordre`,`status`,`status_menu`,`prive`,`indexation`,`added`,`updated`,`canceled`) 
		(SELECT "'.$id.'",`id_langue`,"'.$id_parent.'",`id_template`,`id_user`,`title`,concat(`slug`,"-copy-'.$id.'"),`img_menu`,`menu_title`,`meta_title`,`meta_description`,`meta_keywords`,"'.$ordre.'",0,`status_menu`,`prive`,`indexation`,`added`,`updated`,`canceled` FROM tree WHERE id_tree="'.$id_tree.'")';
		$this->bdd->query($sql);
		
		$sql = 'INSERT INTO tree_elements(`id_tree`, `id_element`, `id_langue`, `value`, `complement`, `status`, `added`, `updated`)
		(SELECT '.$id.', `id_element`, `id_langue`, `value`, `complement`, `status`, `added`, `updated` FROM tree_elements WHERE id_tree='.$id_tree.')';
		$this->bdd->query($sql);	
	}	
}