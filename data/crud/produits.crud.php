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
class produits_crud
{
	
	public $id_produit;
	public $id_template;
	public $id_brand;
	public $type;
	public $tva;
	public $status;
	public $added;
	public $updated;

	
	function produits($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_produit = '';
		$this->id_template = '';
		$this->id_brand = '';
		$this->type = '';
		$this->tva = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_produit')
	{
		$sql = 'SELECT * FROM  `produits` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_produit = $record['id_produit'];
			$this->id_template = $record['id_template'];
			$this->id_brand = $record['id_brand'];
			$this->type = $record['type'];
			$this->tva = $record['tva'];
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
		$this->id_produit = $this->bdd->escape_string($this->id_produit);
		$this->id_template = $this->bdd->escape_string($this->id_template);
		$this->id_brand = $this->bdd->escape_string($this->id_brand);
		$this->type = $this->bdd->escape_string($this->type);
		$this->tva = $this->bdd->escape_string($this->tva);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `produits` SET `id_template`="'.$this->id_template.'",`id_brand`="'.$this->id_brand.'",`type`="'.$this->type.'",`tva`="'.$this->tva.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_produit="'.$this->id_produit.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_produit,'id_produit');
	}
	
	function delete($id,$field='id_produit')
	{
		if($id=='')
			$id = $this->id_produit;
		$sql = 'DELETE FROM `produits` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_produit = $this->bdd->escape_string($this->id_produit);
		$this->id_template = $this->bdd->escape_string($this->id_template);
		$this->id_brand = $this->bdd->escape_string($this->id_brand);
		$this->type = $this->bdd->escape_string($this->type);
		$this->tva = $this->bdd->escape_string($this->tva);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `produits`(`id_template`,`id_brand`,`type`,`tva`,`status`,`added`,`updated`) VALUES("'.$this->id_template.'","'.$this->id_brand.'","'.$this->type.'","'.$this->tva.'","'.$this->status.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_produit = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_produit,'id_produit');
		
		return $this->id_produit;
	}
	
	function unsetData()
	{
		$this->id_produit = '';
		$this->id_template = '';
		$this->id_brand = '';
		$this->type = '';
		$this->tva = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
}