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
class partenaires_crud
{
	
	public $id_partenaire;
	public $nom;
	public $slug;
	public $hash;
	public $id_type;
	public $id_code;
	public $status;
	public $added;
	public $updated;

	
	function partenaires($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_partenaire = '';
		$this->nom = '';
		$this->slug = '';
		$this->hash = '';
		$this->id_type = '';
		$this->id_code = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_partenaire')
	{
		$sql = 'SELECT * FROM  `partenaires` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_partenaire = $record['id_partenaire'];
			$this->nom = $record['nom'];
			$this->slug = $record['slug'];
			$this->hash = $record['hash'];
			$this->id_type = $record['id_type'];
			$this->id_code = $record['id_code'];
			$this->status = $record['status'];
			$this->added = $record['added'];
			$this->updated = $record['updated'];

			return true;
		}
		else
		{
			$this->unsetData();
			return false;
		}
	}
	
	function update($cs='')
	{
		$this->id_partenaire = $this->bdd->escape_string($this->id_partenaire);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->slug = $this->bdd->escape_string($this->slug);
		$this->hash = $this->bdd->escape_string($this->hash);
		$this->id_type = $this->bdd->escape_string($this->id_type);
		$this->id_code = $this->bdd->escape_string($this->id_code);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `partenaires` SET `nom`="'.$this->nom.'",`slug`="'.$this->slug.'",`hash`="'.$this->hash.'",`id_type`="'.$this->id_type.'",`id_code`="'.$this->id_code.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_partenaire="'.$this->id_partenaire.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	$this->bdd->controlSlug('partenaires',$this->slug,'id_partenaire',$this->id_partenaire);
		}
		else
		{
	$this->bdd->controlSlugMultiLn('partenaires',$this->slug,$this->id_partenaire,$list_field_value,$this->id_langue);	
		}
		
		$this->get($this->id_partenaire,'id_partenaire');
	}
	
	function delete($id,$field='id_partenaire')
	{
		if($id=='')
			$id = $this->id_partenaire;
		$sql = 'DELETE FROM `partenaires` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_partenaire = $this->bdd->escape_string($this->id_partenaire);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->slug = $this->bdd->escape_string($this->slug);
		$this->hash = $this->bdd->escape_string($this->hash);
		$this->id_type = $this->bdd->escape_string($this->id_type);
		$this->id_code = $this->bdd->escape_string($this->id_code);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `partenaires`(`nom`,`slug`,`hash`,`id_type`,`id_code`,`status`,`added`,`updated`) VALUES("'.$this->nom.'","'.$this->slug.'",md5(UUID()),"'.$this->id_type.'","'.$this->id_code.'","'.$this->status.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_partenaire = $this->bdd->insert_id();
		
		if($cs=='')
		{
	$this->bdd->controlSlug('partenaires',$this->slug,'id_partenaire',$this->id_partenaire);
		}
		else
		{
	$this->bdd->controlSlugMultiLn('partenaires',$this->slug,$this->id_partenaire,$list_field_value,$this->id_langue);	
		}
		
		$this->get($this->id_partenaire,'id_partenaire');
		
		return $this->id_partenaire;
	}
	
	function unsetData()
	{
		$this->id_partenaire = '';
		$this->nom = '';
		$this->slug = '';
		$this->hash = '';
		$this->id_type = '';
		$this->id_code = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
}