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
class oge_clients_crud
{
	
	public $id_oge_client;
	public $num_oge_client;
	public $typologie;
	public $type;
	public $nom;
	public $prenom;
	public $nom_societe;
	public $activite;
	public $id_sector;
	public $capital;
	public $etranger;
	public $id_forme;
	public $siret;
	public $lieu_rcs;
	public $num_rcs;
	public $num_tva;
	public $adresse;
	public $ville;
	public $tel_standard;
	public $provenance;
	public $code_postal;
	public $id_pays;
	public $site_internet;
	public $status;
	public $id_user;
	public $added;
	public $updated;

	
	function oge_clients($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_oge_client = '';
		$this->num_oge_client = '';
		$this->typologie = '';
		$this->type = '';
		$this->nom = '';
		$this->prenom = '';
		$this->nom_societe = '';
		$this->activite = '';
		$this->id_sector = '';
		$this->capital = '';
		$this->etranger = '';
		$this->id_forme = '';
		$this->siret = '';
		$this->lieu_rcs = '';
		$this->num_rcs = '';
		$this->num_tva = '';
		$this->adresse = '';
		$this->ville = '';
		$this->tel_standard = '';
		$this->provenance = '';
		$this->code_postal = '';
		$this->id_pays = '';
		$this->site_internet = '';
		$this->status = '';
		$this->id_user = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_oge_client')
	{
		$sql = 'SELECT * FROM  `oge_clients` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_oge_client = $record['id_oge_client'];
			$this->num_oge_client = $record['num_oge_client'];
			$this->typologie = $record['typologie'];
			$this->type = $record['type'];
			$this->nom = $record['nom'];
			$this->prenom = $record['prenom'];
			$this->nom_societe = $record['nom_societe'];
			$this->activite = $record['activite'];
			$this->id_sector = $record['id_sector'];
			$this->capital = $record['capital'];
			$this->etranger = $record['etranger'];
			$this->id_forme = $record['id_forme'];
			$this->siret = $record['siret'];
			$this->lieu_rcs = $record['lieu_rcs'];
			$this->num_rcs = $record['num_rcs'];
			$this->num_tva = $record['num_tva'];
			$this->adresse = $record['adresse'];
			$this->ville = $record['ville'];
			$this->tel_standard = $record['tel_standard'];
			$this->provenance = $record['provenance'];
			$this->code_postal = $record['code_postal'];
			$this->id_pays = $record['id_pays'];
			$this->site_internet = $record['site_internet'];
			$this->status = $record['status'];
			$this->id_user = $record['id_user'];
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
		$this->id_oge_client = $this->bdd->escape_string($this->id_oge_client);
		$this->num_oge_client = $this->bdd->escape_string($this->num_oge_client);
		$this->typologie = $this->bdd->escape_string($this->typologie);
		$this->type = $this->bdd->escape_string($this->type);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->nom_societe = $this->bdd->escape_string($this->nom_societe);
		$this->activite = $this->bdd->escape_string($this->activite);
		$this->id_sector = $this->bdd->escape_string($this->id_sector);
		$this->capital = $this->bdd->escape_string($this->capital);
		$this->etranger = $this->bdd->escape_string($this->etranger);
		$this->id_forme = $this->bdd->escape_string($this->id_forme);
		$this->siret = $this->bdd->escape_string($this->siret);
		$this->lieu_rcs = $this->bdd->escape_string($this->lieu_rcs);
		$this->num_rcs = $this->bdd->escape_string($this->num_rcs);
		$this->num_tva = $this->bdd->escape_string($this->num_tva);
		$this->adresse = $this->bdd->escape_string($this->adresse);
		$this->ville = $this->bdd->escape_string($this->ville);
		$this->tel_standard = $this->bdd->escape_string($this->tel_standard);
		$this->provenance = $this->bdd->escape_string($this->provenance);
		$this->code_postal = $this->bdd->escape_string($this->code_postal);
		$this->id_pays = $this->bdd->escape_string($this->id_pays);
		$this->site_internet = $this->bdd->escape_string($this->site_internet);
		$this->status = $this->bdd->escape_string($this->status);
		$this->id_user = $this->bdd->escape_string($this->id_user);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `oge_clients` SET `num_oge_client`="'.$this->num_oge_client.'",`typologie`="'.$this->typologie.'",`type`="'.$this->type.'",`nom`="'.$this->nom.'",`prenom`="'.$this->prenom.'",`nom_societe`="'.$this->nom_societe.'",`activite`="'.$this->activite.'",`id_sector`="'.$this->id_sector.'",`capital`="'.$this->capital.'",`etranger`="'.$this->etranger.'",`id_forme`="'.$this->id_forme.'",`siret`="'.$this->siret.'",`lieu_rcs`="'.$this->lieu_rcs.'",`num_rcs`="'.$this->num_rcs.'",`num_tva`="'.$this->num_tva.'",`adresse`="'.$this->adresse.'",`ville`="'.$this->ville.'",`tel_standard`="'.$this->tel_standard.'",`provenance`="'.$this->provenance.'",`code_postal`="'.$this->code_postal.'",`id_pays`="'.$this->id_pays.'",`site_internet`="'.$this->site_internet.'",`status`="'.$this->status.'",`id_user`="'.$this->id_user.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_oge_client="'.$this->id_oge_client.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_oge_client,'id_oge_client');
	}
	
	function delete($id,$field='id_oge_client')
	{
		if($id=='')
			$id = $this->id_oge_client;
		$sql = 'DELETE FROM `oge_clients` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_oge_client = $this->bdd->escape_string($this->id_oge_client);
		$this->num_oge_client = $this->bdd->escape_string($this->num_oge_client);
		$this->typologie = $this->bdd->escape_string($this->typologie);
		$this->type = $this->bdd->escape_string($this->type);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->nom_societe = $this->bdd->escape_string($this->nom_societe);
		$this->activite = $this->bdd->escape_string($this->activite);
		$this->id_sector = $this->bdd->escape_string($this->id_sector);
		$this->capital = $this->bdd->escape_string($this->capital);
		$this->etranger = $this->bdd->escape_string($this->etranger);
		$this->id_forme = $this->bdd->escape_string($this->id_forme);
		$this->siret = $this->bdd->escape_string($this->siret);
		$this->lieu_rcs = $this->bdd->escape_string($this->lieu_rcs);
		$this->num_rcs = $this->bdd->escape_string($this->num_rcs);
		$this->num_tva = $this->bdd->escape_string($this->num_tva);
		$this->adresse = $this->bdd->escape_string($this->adresse);
		$this->ville = $this->bdd->escape_string($this->ville);
		$this->tel_standard = $this->bdd->escape_string($this->tel_standard);
		$this->provenance = $this->bdd->escape_string($this->provenance);
		$this->code_postal = $this->bdd->escape_string($this->code_postal);
		$this->id_pays = $this->bdd->escape_string($this->id_pays);
		$this->site_internet = $this->bdd->escape_string($this->site_internet);
		$this->status = $this->bdd->escape_string($this->status);
		$this->id_user = $this->bdd->escape_string($this->id_user);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `oge_clients`(`num_oge_client`,`typologie`,`type`,`nom`,`prenom`,`nom_societe`,`activite`,`id_sector`,`capital`,`etranger`,`id_forme`,`siret`,`lieu_rcs`,`num_rcs`,`num_tva`,`adresse`,`ville`,`tel_standard`,`provenance`,`code_postal`,`id_pays`,`site_internet`,`status`,`id_user`,`added`,`updated`) VALUES("'.$this->num_oge_client.'","'.$this->typologie.'","'.$this->type.'","'.$this->nom.'","'.$this->prenom.'","'.$this->nom_societe.'","'.$this->activite.'","'.$this->id_sector.'","'.$this->capital.'","'.$this->etranger.'","'.$this->id_forme.'","'.$this->siret.'","'.$this->lieu_rcs.'","'.$this->num_rcs.'","'.$this->num_tva.'","'.$this->adresse.'","'.$this->ville.'","'.$this->tel_standard.'","'.$this->provenance.'","'.$this->code_postal.'","'.$this->id_pays.'","'.$this->site_internet.'","'.$this->status.'","'.$this->id_user.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_oge_client = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_oge_client,'id_oge_client');
		
		return $this->id_oge_client;
	}
	
	function unsetData()
	{
		$this->id_oge_client = '';
		$this->num_oge_client = '';
		$this->typologie = '';
		$this->type = '';
		$this->nom = '';
		$this->prenom = '';
		$this->nom_societe = '';
		$this->activite = '';
		$this->id_sector = '';
		$this->capital = '';
		$this->etranger = '';
		$this->id_forme = '';
		$this->siret = '';
		$this->lieu_rcs = '';
		$this->num_rcs = '';
		$this->num_tva = '';
		$this->adresse = '';
		$this->ville = '';
		$this->tel_standard = '';
		$this->provenance = '';
		$this->code_postal = '';
		$this->id_pays = '';
		$this->site_internet = '';
		$this->status = '';
		$this->id_user = '';
		$this->added = '';
		$this->updated = '';

	}
}