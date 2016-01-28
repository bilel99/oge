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
class etudes_crud
{
	
	public $id_etudes;
	public $id_oge_client;
	public $id_contact;
	public $num_convention;
	public $nom_interne;
	public $descriptif;
	public $budget_fsi;
	public $je;
	public $budget_hfs;
	public $frais_previsio;
	public $date_debut;
	public $date_fin;
	public $dashboard;
	public $status;
	public $note_de_frais;
	public $added;
	public $updated;

	
	function etudes($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_etudes = '';
		$this->id_oge_client = '';
		$this->id_contact = '';
		$this->num_convention = '';
		$this->nom_interne = '';
		$this->descriptif = '';
		$this->budget_fsi = '';
		$this->je = '';
		$this->budget_hfs = '';
		$this->frais_previsio = '';
		$this->date_debut = '';
		$this->date_fin = '';
		$this->dashboard = '';
		$this->status = '';
		$this->note_de_frais = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_etudes')
	{
		$sql = 'SELECT * FROM  `etudes` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_etudes = $record['id_etudes'];
			$this->id_oge_client = $record['id_oge_client'];
			$this->id_contact = $record['id_contact'];
			$this->num_convention = $record['num_convention'];
			$this->nom_interne = $record['nom_interne'];
			$this->descriptif = $record['descriptif'];
			$this->budget_fsi = $record['budget_fsi'];
			$this->je = $record['je'];
			$this->budget_hfs = $record['budget_hfs'];
			$this->frais_previsio = $record['frais_previsio'];
			$this->date_debut = $record['date_debut'];
			$this->date_fin = $record['date_fin'];
			$this->dashboard = $record['dashboard'];
			$this->status = $record['status'];
			$this->note_de_frais = $record['note_de_frais'];
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
		$this->id_etudes = $this->bdd->escape_string($this->id_etudes);
		$this->id_oge_client = $this->bdd->escape_string($this->id_oge_client);
		$this->id_contact = $this->bdd->escape_string($this->id_contact);
		$this->num_convention = $this->bdd->escape_string($this->num_convention);
		$this->nom_interne = $this->bdd->escape_string($this->nom_interne);
		$this->descriptif = $this->bdd->escape_string($this->descriptif);
		$this->budget_fsi = $this->bdd->escape_string($this->budget_fsi);
		$this->je = $this->bdd->escape_string($this->je);
		$this->budget_hfs = $this->bdd->escape_string($this->budget_hfs);
		$this->frais_previsio = $this->bdd->escape_string($this->frais_previsio);
		$this->date_debut = $this->bdd->escape_string($this->date_debut);
		$this->date_fin = $this->bdd->escape_string($this->date_fin);
		$this->dashboard = $this->bdd->escape_string($this->dashboard);
		$this->status = $this->bdd->escape_string($this->status);
		$this->note_de_frais = $this->bdd->escape_string($this->note_de_frais);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `etudes` SET `id_oge_client`="'.$this->id_oge_client.'",`id_contact`="'.$this->id_contact.'",`num_convention`="'.$this->num_convention.'",`nom_interne`="'.$this->nom_interne.'",`descriptif`="'.$this->descriptif.'",`budget_fsi`="'.$this->budget_fsi.'",`je`="'.$this->je.'",`budget_hfs`="'.$this->budget_hfs.'",`frais_previsio`="'.$this->frais_previsio.'",`date_debut`="'.$this->date_debut.'",`date_fin`="'.$this->date_fin.'",`dashboard`="'.$this->dashboard.'",`status`="'.$this->status.'",`note_de_frais`="'.$this->note_de_frais.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_etudes="'.$this->id_etudes.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_etudes,'id_etudes');
	}
	
	function delete($id,$field='id_etudes')
	{
		if($id=='')
			$id = $this->id_etudes;
		$sql = 'DELETE FROM `etudes` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_etudes = $this->bdd->escape_string($this->id_etudes);
		$this->id_oge_client = $this->bdd->escape_string($this->id_oge_client);
		$this->id_contact = $this->bdd->escape_string($this->id_contact);
		$this->num_convention = $this->bdd->escape_string($this->num_convention);
		$this->nom_interne = $this->bdd->escape_string($this->nom_interne);
		$this->descriptif = $this->bdd->escape_string($this->descriptif);
		$this->budget_fsi = $this->bdd->escape_string($this->budget_fsi);
		$this->je = $this->bdd->escape_string($this->je);
		$this->budget_hfs = $this->bdd->escape_string($this->budget_hfs);
		$this->frais_previsio = $this->bdd->escape_string($this->frais_previsio);
		$this->date_debut = $this->bdd->escape_string($this->date_debut);
		$this->date_fin = $this->bdd->escape_string($this->date_fin);
		$this->dashboard = $this->bdd->escape_string($this->dashboard);
		$this->status = $this->bdd->escape_string($this->status);
		$this->note_de_frais = $this->bdd->escape_string($this->note_de_frais);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `etudes`(`id_oge_client`,`id_contact`,`num_convention`,`nom_interne`,`descriptif`,`budget_fsi`,`je`,`budget_hfs`,`frais_previsio`,`date_debut`,`date_fin`,`dashboard`,`status`,`note_de_frais`,`added`,`updated`) VALUES("'.$this->id_oge_client.'","'.$this->id_contact.'","'.$this->num_convention.'","'.$this->nom_interne.'","'.$this->descriptif.'","'.$this->budget_fsi.'","'.$this->je.'","'.$this->budget_hfs.'","'.$this->frais_previsio.'","'.$this->date_debut.'","'.$this->date_fin.'","'.$this->dashboard.'","'.$this->status.'","'.$this->note_de_frais.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_etudes = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_etudes,'id_etudes');
		
		return $this->id_etudes;
	}
	
	function unsetData()
	{
		$this->id_etudes = '';
		$this->id_oge_client = '';
		$this->id_contact = '';
		$this->num_convention = '';
		$this->nom_interne = '';
		$this->descriptif = '';
		$this->budget_fsi = '';
		$this->je = '';
		$this->budget_hfs = '';
		$this->frais_previsio = '';
		$this->date_debut = '';
		$this->date_fin = '';
		$this->dashboard = '';
		$this->status = '';
		$this->note_de_frais = '';
		$this->added = '';
		$this->updated = '';

	}
}