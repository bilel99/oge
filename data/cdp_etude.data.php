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

class cdp_etude extends cdp_etude_crud
{

	function cdp_etude($bdd,$params='')
    {
        parent::cdp_etude($bdd,$params);
    }
    
    function get($id,$field='id_cdp_etude')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_cdp_etude')
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
		$sql = 'SELECT * FROM `cdp_etude`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

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
		$sql = 'SELECT * FROM `cdp_etude` ce ';
		$sql .= ' INNER JOIN `cdps` cdp ON (ce.id_cdp = cdp.id_cdp) ';
		$sql .= ' WHERE ce.id_etude = '.$id;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}
        
        
        
        
        function findByEtudecdms($id)
	{
		$sql = 'SELECT * FROM `cdp_etude` ce ';
		$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
		$sql .= ' WHERE ce.id_cdp = '.$id;
                
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_assoc($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}




	function findByEtudecdpsContactClient($id)
	{
		$sql = 'SELECT *, `cdp`.nom AS cdp_nom, `cdp`.prenom AS cdp_prenom FROM `cdp_etude` ce ';
		$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
		$sql .=	' INNER JOIN `oge_clients` ogc ON e.id_oge_client = ogc.id_oge_client ' ;
		$sql .=	' INNER JOIN `contacts` con ON e.id_contact = con.id_contact ' ;
		$sql .=	' INNER JOIN `cdps` cdp ON cdp.id_cdp = ce.id_cdp ' ;
		$sql .= ' WHERE ce.id_cdp = '.$id;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_assoc($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}




        
        
        
        function findByEtudeGeneric()
	{
		$sql = 'SELECT *, `e`.nom_interne AS et_nomInterne FROM `cdp_etude` ce ';
		$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
                $sql .= ' INNER JOIN `cdps` c ON (ce.id_cdp = c.id_cdp) ';
                
                $resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_assoc($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}

        
        
        
        
        function findByEtudecdpID($id)
	{
		$sql = 'SELECT * FROM `cdp_etude` ce ';
		$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
                $sql .= ' INNER JOIN `cdps` cdps ON (ce.id_cdp = cdps.id_cdp) ';
		$sql .= ' WHERE ce.id_cdp = '.$id;

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
			
		$sql='SELECT count(*) FROM `cdp_etude` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_cdp_etude')
	{
		$sql = 'SELECT * FROM `cdp_etude` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
}