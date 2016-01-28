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
class documents_crud
{
	
	public $id_document;
	public $id_etudes;
	public $nature;
	public $nom_document;
	public $date_sortie;
	public $tresorier_validation;
	public $nom;
	public $prenom;
	public $id_type_doc;
	public $status;
	public $added;
	public $updated;

	
	function documents($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_document = '';
		$this->id_etudes = '';
		$this->nature = '';
		$this->nom_document = '';
		$this->date_sortie = '';
		$this->tresorier_validation = '';
		$this->nom = '';
		$this->prenom = '';
		$this->id_type_doc = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_document')
	{
		$sql = 'SELECT * FROM  `documents` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_document = $record['id_document'];
			$this->id_etudes = $record['id_etudes'];
			$this->nature = $record['nature'];
			$this->nom_document = $record['nom_document'];
			$this->date_sortie = $record['date_sortie'];
			$this->tresorier_validation = $record['tresorier_validation'];
			$this->nom = $record['nom'];
			$this->prenom = $record['prenom'];
			$this->id_type_doc = $record['id_type_doc'];
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
		$this->id_document = $this->bdd->escape_string($this->id_document);
		$this->id_etudes = $this->bdd->escape_string($this->id_etudes);
		$this->nature = $this->bdd->escape_string($this->nature);
		$this->nom_document = $this->bdd->escape_string($this->nom_document);
		$this->date_sortie = $this->bdd->escape_string($this->date_sortie);
		$this->tresorier_validation = $this->bdd->escape_string($this->tresorier_validation);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->id_type_doc = $this->bdd->escape_string($this->id_type_doc);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `documents` SET `id_etudes`="'.$this->id_etudes.'",`nature`="'.$this->nature.'",`nom_document`="'.$this->nom_document.'",`date_sortie`="'.$this->date_sortie.'",`tresorier_validation`="'.$this->tresorier_validation.'",`nom`="'.$this->nom.'",`prenom`="'.$this->prenom.'",`id_type_doc`="'.$this->id_type_doc.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_document="'.$this->id_document.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_document,'id_document');
	}
	
	function delete($id,$field='id_document')
	{
		if($id=='')
			$id = $this->id_document;
		$sql = 'DELETE FROM `documents` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_document = $this->bdd->escape_string($this->id_document);
		$this->id_etudes = $this->bdd->escape_string($this->id_etudes);
		$this->nature = $this->bdd->escape_string($this->nature);
		$this->nom_document = $this->bdd->escape_string($this->nom_document);
		$this->date_sortie = $this->bdd->escape_string($this->date_sortie);
		$this->tresorier_validation = $this->bdd->escape_string($this->tresorier_validation);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->id_type_doc = $this->bdd->escape_string($this->id_type_doc);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `documents`(`id_etudes`,`nature`,`nom_document`,`date_sortie`,`tresorier_validation`,`nom`,`prenom`,`id_type_doc`,`status`,`added`,`updated`) VALUES("'.$this->id_etudes.'","'.$this->nature.'","'.$this->nom_document.'","'.$this->date_sortie.'","'.$this->tresorier_validation.'","'.$this->nom.'","'.$this->prenom.'","'.$this->id_type_doc.'","'.$this->status.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_document = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_document,'id_document');
		
		return $this->id_document;
	}
	
	function unsetData()
	{
		$this->id_document = '';
		$this->id_etudes = '';
		$this->nature = '';
		$this->nom_document = '';
		$this->date_sortie = '';
		$this->tresorier_validation = '';
		$this->nom = '';
		$this->prenom = '';
		$this->id_type_doc = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
}