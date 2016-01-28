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

class etudes extends etudes_crud
{

	function etudes($bdd,$params='')
    {
        parent::etudes($bdd,$params);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function create($cs='')
    {
        $id = parent::create($cs);
        return $id;
    }
	
	function select($where='',$order='',$start='',$nb='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
		if($order != '')
			$order = ' ORDER BY '.$order;
		$sql = 'SELECT * FROM `etudes`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

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
			
		$sql='SELECT count(*) FROM `etudes` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
        
        
        
        function selectClient($id)
	{
		$sql ='SELECT * FROM `etudes` ';
		$sql .='INNER JOIN `oge_clients` ON etudes.id_oge_client = oge_clients.id_oge_client ' ;
		$sql .='INNER JOIN `contacts` ON etudes.id_contact = contacts.id_contact ' ;
		$sql .='WHERE etudes.id_etudes = '.$id ;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
        
		return $result[0];
	}
        
        
        
        
        function selectCdm($id)
	{
		$sql ='SELECT * FROM `etudes` ';
		$sql .='INNER JOIN `cdm_etude` ON etudes.id_etudes = cdm_etude.id_etude ' ;
		$sql .='WHERE etudes.id_etudes = '.$id ;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
        
		return $result[0];
	}
        
        
        
        
        
        
        
        function cdmX($id)
	{
		$sql ='SELECT * FROM `cdms` ';
		$sql .='INNER JOIN `cdm_etude` ON cdm_etude.id_cdm = cdms.id_cdm ' ;
		$sql .='WHERE cdms.id_cdm = '.$id ;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
        
		return $result[0];
	}











	
	function exist($id,$field='id_etude')
	{
		$sql = 'SELECT * FROM `etudes` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
        
        
        
        // Verification num_convention si existe
        function existNumConvention($id, $field='num_convention'){
            $sql = 'SELECT * FROM `etudes` WHERE '.$field.'="'.$id.'"';
            $result = $this->bdd->query($sql);
            return ($this->bdd->fetch_array($result,0,0)>0);
        }
        // FIN
        
        
        
        
        function search($params, $start='',$nb=''){
        
        $select .= "FROM etudes e ";
        $select .= "LEFT JOIN contacts c ON (e.id_contact = c.id_contact) ";
        $select .= "LEFT JOIN oge_clients oc ON (e.id_oge_client = oc.id_oge_client) ";
        
        $and = "";
        $fields = " oc.id_oge_client, oc.num_oge_client, oc.typologie, oc.nom, oc.prenom, oc.nom_societe, oc.activite, oc.id_sector, ";
        $fields .= "oc.capital, oc.etranger, oc.id_forme, oc.siret, oc.lieu_rcs, oc.num_rcs, oc.num_tva, oc.adresse, oc.ville, oc.tel_standard, oc.provenance, ";
        $fields .= "oc.code_postal, oc.id_pays, oc.site_internet, oc.status as ocstatus, oc.id_user, oc.added, oc.updated, ";        
        $fields .= "c.id_contact, c.nom_contact, c.prenom_contact, c.fonction, c.tel_fixe, c.tel_port, c.linkedin, c.email, c.status, c.added, c.updated , c.id_user";
        $fields .= ", e.id_etudes, e.id_oge_client, e.id_contact, e.num_convention, e.nom_interne, e.descriptif, e.budget_fsi, e.je, e.budget_hfs, e.frais_previsio, e.date_debut, e.date_fin, e.added, e.updated ";

        if(isset($params['nom_societe'])){
            $and .=" WHERE oc.nom_societe LIKE '%".$params['nom_societe']."%'";
        }
        if(isset($params['nom_contact'])){
            if($and == ""){
                $and .=" WHERE c.nom_contact LIKE '%".$params['nom_contact']."%'";
            }else{
                $and .=" AND c.nom_contact LIKE '%".$params['nom_contact']."%'";
            }            
        }
        if(isset($params['id_oge_client'])){
            if($and == ""){
                $and .=" WHERE occ.id_oge_client = " . $params['id_oge_client'];
            }else{
                $and .=" AND occ.id_oge_client = " . $params['id_oge_client'];
            }            
        }
        if(isset($params['not_id_oge_client'])){
            if($and == ""){
                $and .=' WHERE ((occ.id_oge_client != ' . $params['not_id_oge_client'] . ' AND occ.status=1) OR (occ.id_oge_client = ' . $params['not_id_oge_client'] . ' AND occ.status=0) OR (occ.id_oge_client IS NULL))';
            }else{
                $and .=' AND ((occ.id_oge_client != ' . $params['not_id_oge_client'] . ' AND occ.status=1) OR (occ.id_oge_client = ' . $params['not_id_oge_client'] . ' AND occ.status=0) OR (occ.id_oge_client IS NULL))';
            }            
        }
        
        if(isset($params['prenom_contact'])){
            if($and == ""){
                $and .=" WHERE c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            }else{
                $and .=" AND c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            }            
        }
        if(isset($params['fonction'])){
            if($and == ""){
                $and .=" WHERE c.fonction LIKE '".$params['fonction']."'";
            }else{
                $and .=" AND c.fonction LIKE '".$params['fonction']."'";
            }            
        }
        if(isset($params['email'])){
            if($and == ""){
                $and .=" WHERE c.email LIKE '".$params['email']."'";
            }else{
                $and .=" AND c.email LIKE '".$params['email']."'"; 
            }            
        }
        
        if(!isset($params['not_oge_clients_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" oc.status = 1 ";
        }
        
        if(!isset($params['not_oge_clients_contact_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" c.status = 1 ";
        }
        

        
        $and .=" GROUP BY e.id_etudes";
        $query = $select.$and;
        
        $result['query'] = $this->executeQuery($fields, $query, $start, $nb);
        $result['count'] = $this->counterQuery($query);
        
        return $result;
    }
    
    
    
    
    
    // Function search du cdp connecter session
    function searchCdpConnect($params, $start='',$nb=''){
        
        $select .= "FROM etudes e ";
        $select .= "LEFT JOIN contacts c ON (e.id_contact = c.id_contact) ";
        $select .= "LEFT JOIN oge_clients oc ON (e.id_oge_client = oc.id_oge_client) ";
        
        $select .= "LEFT JOIN cdp_etude cpe ON (cpe.id_etude = e.id_etudes) ";
        $select .= "LEFT JOIN cdps cdps ON (cdps.id_cdp = cpe.id_cdp) ";
        
        
        $and = "";
        $fields = " oc.id_oge_client, oc.num_oge_client, oc.typologie, oc.nom, oc.prenom, oc.nom_societe, oc.activite, oc.id_sector, ";
        $fields .= "oc.capital, oc.etranger, oc.id_forme, oc.siret, oc.lieu_rcs, oc.num_rcs, oc.num_tva, oc.adresse, oc.ville, oc.tel_standard, oc.provenance, ";
        $fields .= "oc.code_postal, oc.id_pays, oc.site_internet, oc.status as ocstatus, oc.id_user, oc.added, oc.updated, ";        
        $fields .= "c.id_contact, c.nom_contact, c.prenom_contact, c.fonction, c.tel_fixe, c.tel_port, c.linkedin, c.email, c.status, c.added, c.updated , c.id_user";
        $fields .= ", e.id_etudes, e.id_oge_client, e.id_contact, e.num_convention, e.nom_interne, e.descriptif, e.budget_fsi, e.je, e.budget_hfs, e.frais_previsio, e.date_debut, e.date_fin, e.added, e.updated ";

        if(isset($params['nom_societe'])){
            $and .=" WHERE oc.nom_societe LIKE '%".$params['nom_societe']."%'";
        }
        if(isset($params['nom_contact'])){
            if($and == ""){
                $and .=" WHERE c.nom_contact LIKE '%".$params['nom_contact']."%'";
            }else{
                $and .=" AND c.nom_contact LIKE '%".$params['nom_contact']."%'";
            }            
        }
        if(isset($params['id_oge_client'])){
            if($and == ""){
                $and .=" WHERE occ.id_oge_client = " . $params['id_oge_client'];
            }else{
                $and .=" AND occ.id_oge_client = " . $params['id_oge_client'];
            }            
        }
        if(isset($params['not_id_oge_client'])){
            if($and == ""){
                $and .=' WHERE ((occ.id_oge_client != ' . $params['not_id_oge_client'] . ' AND occ.status=1) OR (occ.id_oge_client = ' . $params['not_id_oge_client'] . ' AND occ.status=0) OR (occ.id_oge_client IS NULL))';
            }else{
                $and .=' AND ((occ.id_oge_client != ' . $params['not_id_oge_client'] . ' AND occ.status=1) OR (occ.id_oge_client = ' . $params['not_id_oge_client'] . ' AND occ.status=0) OR (occ.id_oge_client IS NULL))';
            }            
        }
        
        if(isset($params['prenom_contact'])){
            if($and == ""){
                $and .=" WHERE c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            }else{
                $and .=" AND c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            }            
        }
        if(isset($params['fonction'])){
            if($and == ""){
                $and .=" WHERE c.fonction LIKE '".$params['fonction']."'";
            }else{
                $and .=" AND c.fonction LIKE '".$params['fonction']."'";
            }            
        }
        if(isset($params['email'])){
            if($and == ""){
                $and .=" WHERE c.email LIKE '".$params['email']."'";
            }else{
                $and .=" AND c.email LIKE '".$params['email']."'"; 
            }            
        }
        
        if(!isset($params['not_oge_clients_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" oc.status = 1 ";
        }
        
        if(!isset($params['not_oge_clients_contact_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" c.status = 1 ";
        }
        

        
        $and .=" AND cdps.id_cdp = ".$_SESSION['user']['id_cdp'];
        $query = $select.$and;
        
        $result['query'] = $this->executeQuery($fields, $query, $start, $nb);
        $result['count'] = $this->counterQuery($query);
        
        return $result;
    }
    // FIN
    
    
    
    
    
    function executeQuery($fields, $query, $start='', $nb=''){
        
        $sql = "SELECT ".$fields." ".$query. ($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));        
        
        $resultat = $this->bdd->query($sql);
		$result = array();                
		while($record = $this->bdd->fetch_array($resultat))        
		{                    
           $result[] = $record;
		}
        return $result; 
   }
   function counterQuery($query){
        $sql = 'SELECT count(*) FROM (SELECT c.id_contact ' . $query . ') AS t';
		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
   }
   
   
   
   
   
   
   public $typesElements = array('Texte','Textearea','Texteditor','Lien Interne','Lien Externe','Produit','Lien Interne ou Produit','Lien Interne ou Produit ou Lien Externe','Image','Fichier','Fichier Protected','Date','Checkbox');
   
 function displayFormElement($element , $type='doc_template',$langue,$url)             
	{     
		if($type == 'doc_template')
		{								
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
							<input class="input-document" type="text" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" value="'.$element['value'].'" />
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
							<textarea class="textarea_large textarea-document" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'">'.$element['value'].'</textarea>
						</td>
					</tr>';				
				break;
				
				case 'Texteditor':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<textarea class="textarea_large" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'">'.$element['value'].'</textarea>
							<script type="text/javascript">var cked = CKEDITOR.replace(\''.$element['slug'].'_'.$langue.'\');</script>
						</td>
					</tr>';			
				break;
				
				case 'Lien Interne':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
							<select name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" class="select">';
							foreach($this->listChilds(0,'-',array(),$langue) as $tree)
							{
								echo '<option value="'.$tree['id_tree'].'"'.($element['value'] == $tree['id_tree']?' selected="selected"':'').'>'.$tree['title'].'</option>';
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
							<input class="input_big" type="text" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" value="'.$element['value'].'" />
						</td>
					</tr>';
				break;
				
				case 'Produit':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
							<select name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" class="select">';
							foreach($this->selectProducts($langue) as $prod)
							{
								echo '<option value="'.$prod['id_produit'].'"'.($element['value'] == $prod['id_produit']?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
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
							<select name="L-'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers une page du site</option>';
								foreach($this->listChilds(0,'-',array(),$langue) as $tree)
								{
									echo '<option value="'.$tree['id_tree'].'"'.(($element['value'] == $tree['id_tree'] && $element['complement'] == 'L')?' selected="selected"':'').'>'.$tree['title'].'</option>';
								}
								echo '
							</select>	
							&nbsp;&nbsp;ou&nbsp;&nbsp;
							<select name="P-'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers un produit</option>';
								foreach($this->selectProducts($langue) as $prod)
								{
									echo '<option value="'.$prod['id_produit'].'"'.(($element['value']==$prod['id_produit'] && $element['complement'] == 'P')?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
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
							<select name="L-'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers une page</option>';
								foreach($this->listChilds(0,'-',array(),$langue) as $tree)
								{
									echo '<option value="'.$tree['id_tree'].'"'.(($element['value'] == $tree['id_tree'] && $element['complement'] == 'L')?' selected="selected"':'').'>'.$tree['title'].'</option>';
								}
								echo '
							</select>
							&nbsp;&nbsp;ou&nbsp;&nbsp;	
							<select name="P-'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" class="select">
								<option value="">Lien vers un produit</option>';
								foreach($this->selectProducts($langue) as $prod)
								{
									echo '<option value="'.$prod['id_produit'].'"'.(($element['value']==$prod['id_produit'] && $element['complement'] == 'P')?' selected="selected"':'').'>'.$prod['nom_produit'].'</option>';
								}
								echo '
							</select>
							&nbsp;&nbsp;ou un lien externe :&nbsp;&nbsp;
							<input class="input_large" type="text" name="LX-'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" value="'.($element['complement'] == 'LX'?$element['value']:'').'" />
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
							<input type="file" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$element['value'].'" />
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'">Nom du fichier image :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$element['complement'].'" />
						</th>
					</tr>
					<tr id="deleteImageElement'.$element['id'].'">';
						if($element['value'] != '')
						{
							if(substr(strtolower(strrchr(basename($element['value']),'.')),1) == 'swf')
							{
								echo '
								<th class="bas">
									<object type="application/x-shockwave-flash" data="'.$url['surl'].'/var/images/'.$element['value'].'" width="400" height="180" style="vertical-align:middle;">
										<param name="src" value="'.$url['surl'].'/var/images/'.$element['value'].'" />
										<param name="movie" value="'.$url['surl'].'/var/images/'.$element['value'].'" />
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
									<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce flash ?\')){deleteImageElement('.$element['id'].',\''.$element['slug'].'_'.$langue.'\');return false;}">
										<img src="'.$url['surl'].'/images/admin/delete.png" alt="Supprimer" style="vertical-align:middle;" />
									</a>
								</th>';	
							}
							else
							{
								list($width,$height) = @getimagesize($url['spath'].'images/'.$element['value']);								
								echo '
								<th class="bas">
									<a href="'.$url['surl'].'/var/images/'.$element['value'].'" class="thickbox">
										<img src="'.$url['surl'].'/var/images/'.$element['value'].'" alt="'.$element['name'].'"'.($height > 180?' height="180"':($width > 400?' width="400"':'')).' style="vertical-align:middle;" />
									</a>
									&nbsp;&nbsp; Supprimer l\'image&nbsp;&nbsp;
									<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer cette image ?\')){deleteImageElement('.$element['id'].',\''.$element['slug'].'\');return false;}">
										<img src="'.$url['surl'].'/images/admin/delete.png" alt="Supprimer" style="vertical-align:middle;" />
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
							<input type="file" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$element['value'].'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'">Nom du fichier :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$element['complement'].'" />
						</th>
					</tr>
					<tr id="deleteFichierElement'.$element['id'].'">';
						if($element['value'] != '')
						{
							echo '
							<th class="bas">
								<label>Fichier actuel</label> : 
								<a href="'.$url['surl'].'/var/fichiers/'.$element['value'].'" target="blank">'.$url['surl'].'/var/fichiers/'.$element['value'].'</a> 
								&nbsp;&nbsp;
								<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce fichier ?\')){deleteFichierElement('.$element['id'].',\''.$element['slug'].'\');return false;}">
									<img src="'.$url['surl'].'/images/admin/delete.png" alt="Supprimer" />
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
							<input type="file" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'" />
							<input type="hidden" name="'.$element['slug'].'-old" id="'.$element['slug'].'_'.$langue.'-old" value="'.$element['value'].'" />	
							&nbsp;&nbsp;<label for="nom_'.$element['slug'].'">Nom du fichier :</label>
							<input class="input_large" type="text" name="nom_'.$element['slug'].'" id="nom_'.$element['slug'].'_'.$langue.'" value="'.$element['complement'].'" />
						</th>
					</tr>
					<tr id="deleteFichierProtectedElement'.$element['id'].'">';
						if($element['value'] != '')
						{
							echo '
							<th class="bas">
								<label>Fichier actuel</label> : 
								<a href="'.$url['url'].'/protected/templates/'.$element['value'].'" target="blank">'.$element['value'].'</a> 
								&nbsp;&nbsp;
								<a onclick="if(confirm(\'Etes vous sur de vouloir supprimer ce fichier ?\')){deleteFichierProtectedElement('.$element['id'].',\''.$element['slug'].'_'.$langue.'\');return false;}">
									<img src="'.$url['surl'].'/images/admin/delete.png" alt="Supprimer" />
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
							<input class="input_dp" type="text" name="'.$element['slug'].'" id="datepik_'.$langue.'_1" value="'.$element['value'].'" />
                                                </th>
					</tr>';				
				break;
                            
                            
                            
                                case 'Date2':
					echo '
					<tr>
						<th>
							<label for="datepik_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<th class="bas">
							<input class="input_dp" type="text" name="'.$element['slug'].'" id="datepik_'.$langue.'_2" value="'.$element['value'].'" />
                                                </th>
					</tr>';				
				break;
				
                            
                            
				case 'Checkbox':
					echo '
					<tr>
						<th class="bas">
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].'</label> : 
							<input type="checkbox" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="1"'.($element['value'] == 1?' checked="checked"':'').' />
						</th>
					</tr>';				
				break;
                            
                                // Attention ici mise en dur de select
                                case 'SelectFacture':
					echo '
					<tr>
						<th class="bas">
                                                        <label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].'</label> : 
                                                        <select class="select-custom" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'"  >
                                                            <option value="'.$element['value'].'">'.$element['value'].'</option>
                                                            <option value=""></option>
                                                            <option value="acompte">ACOMPTE</option>
                                                            <option value="solde">SOLDE</option>
                                                            <option value="avoir">AVOIR</option>
                                                        </select>
						</th>
					</tr>';				
				break;
                            
                            
                                
                            
                            
                                
                                case 'SelectFrais':
					echo '
					<tr>
						<th class="bas">
                                                        <label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].'</label> : 
                                                        <select class="select-custom" name="'.$element['slug'].'" id="'.$element['slug'].'_'.$langue.'"  >
                                                            <option value="'.$element['value'].'">'.$element['value'].'</option>
                                                            <option class="default" value=""></option>
                                                            <option value="Frais de reprographie">Frais de reprographie</option>
                                                            <option value="frais téléphonique">frais téléphonique</option>
                                                            <option value="location de véhicule">location de véhicule</option>
                                                            <option value="frais d’affranchissement">frais d’affranchissement</option>
                                                            <option value="frais de restauration">frais de restauration</option>
                                                            <option value="frais de carburant">frais de carburant</option>
                                                            <option value="frais de déplacement">frais de déplacement</option>
                                                            <option value="frais de déplacement en transport collectif">frais de déplacement en transport collectif</option>
                                                            <option value="frais d’hébergement">frais d’hébergement</option>
                                                            <option value="sous traitance">sous traitance</option>
                                                            <option value="autre">autre</option>
                                                        </select>
						</th>
					</tr>';				
				break;
                            
                            
                            
                            
                            
                            
                                case 'TextFactureFrais':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input-document" type="text" name="'.$element['slug'].'" id="tva_fact_frais" value="'.$element['value'].'" />
						</td>
					</tr>';				
				break;
                                
                            
                            
                            
                                
                            
                                case 'TexteFraisPort':	
					echo '
					<tr>
						<th>
							<label for="'.$element['slug'].'_'.$langue.'">'.$element['name'].' :</label>
						</th>
					</tr>
					<tr>
						<td>
							<input class="input-document" type="text" name="'.$element['slug'].'" id="calc" value=" " />
						</td>
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
							<input class="input_big" type="text" name="'.$element['slug'].'_'.$langue.'" id="'.$element['slug'].'_'.$langue.'" value="'.$element['value'].'" />
						</td>
					</tr>';	
				break;
			}		
		}		
	}
                                
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
        function selectExample(){
            
        }
        function selectDocTemp()
        {
//            if($where != '')
//			$where = ' WHERE '.$where;
//		if($order != '')
//			$order = ' ORDER BY '.$order;
//		$sql = 'SELECT * FROM `type_document`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
//
//		$resultat = $this->bdd->query($sql);
//		$result = array();
//		while($record = $this->bdd->fetch_array($resultat))
//		{
//			$result[] = $record;
//		}
//		return $result;}
            return "listo";
        }
   
   
        
        
        
        function rechercherQuery($nom){
        $sql = "SELECT * FROM etudes WHERE nom_interne LIKE '".$nom."%' ";
	return $this->bdd->run($sql);
       
   }
   
   
   
}