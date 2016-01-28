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

class oge_clients_contacts extends oge_clients_contacts_crud
{

	function oge_clients_contacts($bdd,$params='')
    {
        parent::oge_clients_contacts($bdd,$params);
    }
    
    function get($id,$field='id_oge_clients_contact')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_oge_clients_contact')
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
		$sql = 'SELECT * FROM `oge_clients_contacts`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	} 
        function searchnomsociete($idcontact){            
            $where= "WHERE id_contact=".$idcontact;
            $sql='SELECT id_oge_client, max(added) FROM `oge_clients_contacts` '.$where." GROUP BY id_oge_client ORDER BY added DESC limit 1";                        
            $resulta = $this->bdd->query($sql);            
            $result = array();
		while($record = $this->bdd->fetch_array($resulta))
		{
			$result[] = $record;
		}
                if($result!=null){                
                    $sql2='SELECT * FROM `oge_clients` WHERE nom_societe != "" and id_oge_client='.$result[0]['id_oge_client'].'';
                    $resul = $this->bdd->query($sql2);  
                    while($record = $this->bdd->fetch_array($resul))
                        {
                            $res[] = $record;
                        }                            
                    return $res[0];                    
                }else{
                    return null;
                }            
        }
        
        
        
        
        function findByEtude($id)
	{
		$sql = 'SELECT * FROM `oge_clients_contacts` cc ';
		$sql .= ' INNER JOIN `oge_clients` oc ON (cc.id_oge_client = oc.id_oge_client) ';
		$sql .= ' WHERE cc.id_contact = '.$id;

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
			
		$sql='SELECT count(*) FROM `oge_clients_contacts` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_oge_clients_contact')
	{
		$sql = 'SELECT * FROM `oge_clients_contacts` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
}