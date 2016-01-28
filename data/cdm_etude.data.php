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

class cdm_etude extends cdm_etude_crud
{

	function cdm_etude($bdd,$params='')
    {
        parent::cdm_etude($bdd,$params);
    }
    
    function get($id,$field='id_cdm_etude')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_cdm_etude')
    {
    	parent::delete($id,$field);
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
		$sql = 'SELECT * FROM `cdm_etude`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
        
        function findByEtude($id)
	{
		$sql = 'SELECT * FROM `cdm_etude` ce ';
		$sql .= ' INNER JOIN `cdms` cdm ON (ce.id_cdm = cdm.id_cdm) ';
		$sql .= ' WHERE ce.id_etude = '.$id;
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
        
        
        
        
        function findByEtudecdm($id)
	{
		$sql = 'SELECT * FROM `cdm_etude` ce ';
		$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
		$sql .= ' WHERE ce.id_cdm = '.$id;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
        
        
        
        
        
        function findByEtudecdmID($id)
	{
		$sql = 'SELECT * FROM `cdm_etude` ce ';
		$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
                $sql .= ' INNER JOIN `cdms` cdms ON (ce.id_cdm = cdms.id_cdm) ';
		$sql .= ' WHERE ce.id_cdm = '.$id;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
        
        
        
        
        function findByEtudeGeneral(){
            $sql = 'SELECT * FROM `cdm_etude` ce ';
            $sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
            $sql .= ' INNER JOIN `cdms` cdms ON (cdms.id_cdm = ce.id_cdm) ';

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
			
		$sql='SELECT count(*) FROM `cdm_etude` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_cdp_etude')
	{
		$sql = 'SELECT * FROM `cdm_etude` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
        
        
        
        function existMultiple($id,$field='id_cdm', $id2, $field2='id_etude')
	{
		$sql = 'SELECT * FROM `cdm_etude` WHERE '.$field.'="'.$id.'" AND '.$field2.'="'.$id2.'" ';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
        
        
    
    function selectCdm($id){
            $sql = "SELECT * FROM cdm_etude ";
            $sql .= "INNER JOIN cdms ON cdms.id_cdm = cdm_etude.id_cdm ";
            $sql .= "WHERE cdm_etude.id_etude = ".$id;            
            $resultat = $this->bdd->query($sql);
            $result = array();
            while($record = $this->bdd->fetch_array($resultat))
            {
               $result[] = $record;
            }
            return $result; 
       }
}