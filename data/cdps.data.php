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

class cdps extends cdps_crud {

    function cdps($bdd, $params = '') {
        parent::cdps($bdd, $params);
    }

    function get($id, $field = 'id_cdp') {
        return parent::get($id, $field);
    }

    function update($cs = '') {
        parent::update($cs);
    }

    function delete($id, $field = 'id_cdp') {
        parent::delete($id, $field);
    }

    function create($cs = '') {
        $id = parent::create($cs);
        return $id;
    }

    function select($where = '', $order = '', $start = '', $nb = '') {
        if ($where != '')
            $where = ' WHERE ' . $where;
        if ($order != '')
            $order = ' ORDER BY ' . $order;
        $sql = 'SELECT * FROM `cdps`' . $where . $order . ($nb != '' && $start != '' ? ' LIMIT ' . $start . ',' . $nb : ($nb != '' ? ' LIMIT ' . $nb : ''));
        $resultat = $this->bdd->query($sql);
        $result = array();
        while ($record = $this->bdd->fetch_array($resultat)) {
            $result[] = $record;
        }
        return $result;
    }

    function counter($where = '') {
        if ($where != '')
            $where = ' WHERE ' . $where;

        $sql = 'SELECT count(*) FROM `cdps` ' . $where;

        $result = $this->bdd->query($sql);
        return (int) ($this->bdd->result($result, 0, 0));
    }

    function exist($id, $field = 'id_cdp') {
        $sql = 'SELECT * FROM `cdps` WHERE ' . $field . '="' . $id . '"';
        $result = $this->bdd->query($sql);
        return ($this->bdd->fetch_array($result, 0, 0) > 0);
    }

    function exist_general($val, $field) {
        $sql = 'SELECT * FROM `cdps` WHERE ' . $field . '="' . $val . '"';
        //var_dump($sql);
        $result = $this->bdd->query($sql);
        //var_dump($this->bdd->fetch_assoc($result));
        return ($this->bdd->fetch_assoc($result));
    }

    function search($params, $limit, $offset) {
        $fields = "* from cdps";
        $and = "";
        if (isset($params['nom'])) {
            $and .=" WHERE archive = 1 AND nom LIKE '%" . $params['nom'] . "%'";
        }
        if (isset($params['prenom'])) {
            if ($and == "") {
                $and .=" WHERE prenom LIKE '%" . $params['prenom'] . "%'";
            } else {
                $and .=" AND prenom LIKE '%" . $params['prenom'] . "%'";
            }
        }
        if (isset($params['nom_interne'])) {
            if ($and == "") {
                $and .=" WHERE nom_interne LIKE '%" . $params['nom_interne'] . "%'";
            } else {
                $and .=" AND nom_interne LIKE '%" . $params['nom_interne'] . "%'";
            }
        }
        if (isset($params['email'])) {
            if ($and == "") {
                $and .=" WHERE email LIKE '%" . $params['email'] . "%'";
            } else {
                $and .=" AND email LIKE '%" . $params['email'] . "%'";
            }
        }
        if (isset($params['telephone'])) {
            if ($and == "") {
                $and .=" WHERE telephone LIKE '%" . $params['telephone'] . "%'";
            } else {
                $and .=" AND telephone LIKE '%" . $params['telephone'] . "%'";
            }
        }
        if (isset($params['adresse'])) {
            if ($and == "") {
                $and .=" WHERE adresse LIKE '%" . $params['adresse'] . "%'";
            } else {
                $and .=" AND adresse LIKE '%" . $params['adresse'] . "%'";
            }
        }
        if (isset($params['ville'])) {
            if ($and == "") {
                $and .=" WHERE ville LIKE '%" . $params['ville'] . "%'";
            } else {
                $and .=" AND ville LIKE '%" . $params['ville'] . "%'";
            }
        }
        if (isset($params['code_postal'])) {
            if ($and == "") {
                $and .=" WHERE code_postal LIKE '%" . $params['code_postal'] . "%'";
            } else {
                $and .=" AND code_postal LIKE '%" . $params['code_postal'] . "%'";
            }
        }
        if (isset($params['num_ss'])) {
            if ($and == "") {
                $and .=" WHERE num_ss LIKE '%" . $params['num_ss'] . "%'";
            } else {
                $and .=" AND num_ss LIKE '%" . $params['num_ss'] . "%'";
            }
        }
        if (isset($params['annee'])) {
            if ($and == "") {
                $and .=" WHERE annee LIKE '%" . $params['annee'] . "%'";
            } else {
                $and .=" AND annee LIKE '%" . $params['annee'] . "%'";
            }
        }
        if (isset($params['details'])) {
            if ($and == "") {
                $and .=" WHERE details LIKE '%" . $params['details'] . "%'";
            } else {
                $and .=" AND details LIKE '%" . $params['details'] . "%'";
            }
        }
        $sql = 'SELECT ' . $fields . '' . $and . ' LIMIT ' . $limit . ' OFFSET ' . $offset;
        $queryCount = 'SELECT ' . $fields . '' . $and;
        $sqlmajor['count'] = $this->counterQuery($queryCount);
        $resultat = $this->bdd->query($sql);
        $result = array();
        while ($record = $this->bdd->fetch_array($resultat)) {
            $result[] = $record;
        }
        $sqlmajor['cdps'] = $result;
        return $sqlmajor;
    }

    function counterQuery($query) {
        $sql = "SELECT count(*) FROM (" . $query . ") as count";
        $result = $this->bdd->query($sql);
        return (int) ($this->bdd->result($result, 0, 0));
    }

    function findCdp($ids) {
        $sql = 'SELECT * FROM `cdps` ';

        foreach ($ids as $k => $id) {
            if ($k == 0) {
                $sql .= "WHERE id_cdp !=  '" . $id . "'";
            } else {
                $sql .= " AND id_cdp !=  '" . $id . "'";
            }
        }
        $resultat = $this->bdd->query($sql);
        $result = array();
        while ($record = $this->bdd->fetch_array($resultat)) {
            $result[] = $record;
        }
        return ($result);
    }
    
    
    
    
    
    function searchEtudes($params, $id){
        
        $sql = 'SELECT * FROM `cdp_etude` ce ';
	$sql .= ' INNER JOIN `etudes` e ON (ce.id_etude = e.id_etudes) ';
	$sql .= ' WHERE ce.id_cdp = '.$id;
        $sql .= ' AND e.nom_interne LIKE "%' . $params . '%" ';
        

        $resultat = $this->bdd->query($sql);
        $result = array();
        while ($record = $this->bdd->fetch_array($resultat)) {
            $result[] = $record;
        }
        return ($result);
    }
    
    
    
    
    
    function documentEtude(){
        $sql = 'SELECT * FROM `documents` d ';
	$sql .= ' INNER JOIN `etudes` e ON (d.id_etudes = e.id_etudes) ';
        
        $resultat = $this->bdd->query($sql);
        $result = array();
        while ($record = $this->bdd->fetch_array($resultat)) {
            $result[] = $record;
        }
        return ($result);
    }
    
    
    

}
