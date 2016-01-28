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
class produits_details_crud
{
	
	public $id_detail;
	public $id_produit;
	public $reference;
	public $poids;
	public $prix;
	public $prix_ht;
	public $promo;
	public $montant_promo;
	public $prix_promo;
	public $prix_promo_ht;
	public $debut_promo;
	public $fin_promo;
	public $type_detail;
	public $detail;
	public $ordre;
	public $stock;
	public $status;
	public $added;
	public $updated;

	
	function produits_details($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_detail = '';
		$this->id_produit = '';
		$this->reference = '';
		$this->poids = '';
		$this->prix = '';
		$this->prix_ht = '';
		$this->promo = '';
		$this->montant_promo = '';
		$this->prix_promo = '';
		$this->prix_promo_ht = '';
		$this->debut_promo = '';
		$this->fin_promo = '';
		$this->type_detail = '';
		$this->detail = '';
		$this->ordre = '';
		$this->stock = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_detail')
	{
		$sql = 'SELECT * FROM  `produits_details` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_detail = $record['id_detail'];
			$this->id_produit = $record['id_produit'];
			$this->reference = $record['reference'];
			$this->poids = $record['poids'];
			$this->prix = $record['prix'];
			$this->prix_ht = $record['prix_ht'];
			$this->promo = $record['promo'];
			$this->montant_promo = $record['montant_promo'];
			$this->prix_promo = $record['prix_promo'];
			$this->prix_promo_ht = $record['prix_promo_ht'];
			$this->debut_promo = $record['debut_promo'];
			$this->fin_promo = $record['fin_promo'];
			$this->type_detail = $record['type_detail'];
			$this->detail = $record['detail'];
			$this->ordre = $record['ordre'];
			$this->stock = $record['stock'];
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
		$this->id_detail = $this->bdd->escape_string($this->id_detail);
		$this->id_produit = $this->bdd->escape_string($this->id_produit);
		$this->reference = $this->bdd->escape_string($this->reference);
		$this->poids = $this->bdd->escape_string($this->poids);
		$this->prix = $this->bdd->escape_string($this->prix);
		$this->prix_ht = $this->bdd->escape_string($this->prix_ht);
		$this->promo = $this->bdd->escape_string($this->promo);
		$this->montant_promo = $this->bdd->escape_string($this->montant_promo);
		$this->prix_promo = $this->bdd->escape_string($this->prix_promo);
		$this->prix_promo_ht = $this->bdd->escape_string($this->prix_promo_ht);
		$this->debut_promo = $this->bdd->escape_string($this->debut_promo);
		$this->fin_promo = $this->bdd->escape_string($this->fin_promo);
		$this->type_detail = $this->bdd->escape_string($this->type_detail);
		$this->detail = $this->bdd->escape_string($this->detail);
		$this->ordre = $this->bdd->escape_string($this->ordre);
		$this->stock = $this->bdd->escape_string($this->stock);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `produits_details` SET `id_produit`="'.$this->id_produit.'",`reference`="'.$this->reference.'",`poids`="'.$this->poids.'",`prix`="'.$this->prix.'",`prix_ht`="'.$this->prix_ht.'",`promo`="'.$this->promo.'",`montant_promo`="'.$this->montant_promo.'",`prix_promo`="'.$this->prix_promo.'",`prix_promo_ht`="'.$this->prix_promo_ht.'",`debut_promo`="'.$this->debut_promo.'",`fin_promo`="'.$this->fin_promo.'",`type_detail`="'.$this->type_detail.'",`detail`="'.$this->detail.'",`ordre`="'.$this->ordre.'",`stock`="'.$this->stock.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_detail="'.$this->id_detail.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_detail,'id_detail');
	}
	
	function delete($id,$field='id_detail')
	{
		if($id=='')
			$id = $this->id_detail;
		$sql = 'DELETE FROM `produits_details` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_detail = $this->bdd->escape_string($this->id_detail);
		$this->id_produit = $this->bdd->escape_string($this->id_produit);
		$this->reference = $this->bdd->escape_string($this->reference);
		$this->poids = $this->bdd->escape_string($this->poids);
		$this->prix = $this->bdd->escape_string($this->prix);
		$this->prix_ht = $this->bdd->escape_string($this->prix_ht);
		$this->promo = $this->bdd->escape_string($this->promo);
		$this->montant_promo = $this->bdd->escape_string($this->montant_promo);
		$this->prix_promo = $this->bdd->escape_string($this->prix_promo);
		$this->prix_promo_ht = $this->bdd->escape_string($this->prix_promo_ht);
		$this->debut_promo = $this->bdd->escape_string($this->debut_promo);
		$this->fin_promo = $this->bdd->escape_string($this->fin_promo);
		$this->type_detail = $this->bdd->escape_string($this->type_detail);
		$this->detail = $this->bdd->escape_string($this->detail);
		$this->ordre = $this->bdd->escape_string($this->ordre);
		$this->stock = $this->bdd->escape_string($this->stock);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `produits_details`(`id_produit`,`reference`,`poids`,`prix`,`prix_ht`,`promo`,`montant_promo`,`prix_promo`,`prix_promo_ht`,`debut_promo`,`fin_promo`,`type_detail`,`detail`,`ordre`,`stock`,`status`,`added`,`updated`) VALUES("'.$this->id_produit.'","'.$this->reference.'","'.$this->poids.'","'.$this->prix.'","'.$this->prix_ht.'","'.$this->promo.'","'.$this->montant_promo.'","'.$this->prix_promo.'","'.$this->prix_promo_ht.'","'.$this->debut_promo.'","'.$this->fin_promo.'","'.$this->type_detail.'","'.$this->detail.'","'.$this->ordre.'","'.$this->stock.'","'.$this->status.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_detail = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_detail,'id_detail');
		
		return $this->id_detail;
	}
	
	function unsetData()
	{
		$this->id_detail = '';
		$this->id_produit = '';
		$this->reference = '';
		$this->poids = '';
		$this->prix = '';
		$this->prix_ht = '';
		$this->promo = '';
		$this->montant_promo = '';
		$this->prix_promo = '';
		$this->prix_promo_ht = '';
		$this->debut_promo = '';
		$this->fin_promo = '';
		$this->type_detail = '';
		$this->detail = '';
		$this->ordre = '';
		$this->stock = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
}