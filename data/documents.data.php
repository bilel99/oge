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

class documents extends documents_crud
{

	function documents($bdd,$params='')
    {
        parent::documents($bdd,$params);
    }
    
    function get($id,$field='id_document')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_document')
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
		$sql = 'SELECT * FROM `documents`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	} 
	function selectInfo($id)
	{
		$sql = 'SELECT * FROM `documents` ';
        $sql .= 'INNER JOIN `info_documents` ON documents.id_document = info_documents.id_document ';
        $sql .= 'WHERE documents.id_document = '. $id;

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result[0];
	}





	function selectInfoEtude($id)
	{
		$sql = 'SELECT *,info_documents.id_document as infoDoc_id_document FROM `documents` ';
		$sql .= 'INNER JOIN `info_documents` ON documents.id_document = info_documents.id_document ';
		$sql .= 'WHERE documents.id_etudes = '. $id;



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
			
		$sql='SELECT count(*) FROM `documents` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_document')
	{
		$sql = 'SELECT * FROM `documents` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
        
        
        
        function findByEtudeDoc()
	{
		$sql = 'SELECT * FROM `documents` d ';
		$sql .= ' INNER JOIN `etudes` e ON (d.id_etudes = e.id_etudes) ';
		
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_assoc($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}



	function findByEtudeDocComplete()
	{
		$sql = 'SELECT *,info_documents.id_document as infoDoc_id_document FROM `documents` ';
		$sql .= 'INNER JOIN `info_documents` ON documents.id_document = info_documents.id_document ';
		$sql .= ' INNER JOIN `etudes` ON (documents.id_etudes = etudes.id_etudes) ';

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_assoc($resultat))
		{
			$result[] = $record;
		}
		return $result;
	}


}