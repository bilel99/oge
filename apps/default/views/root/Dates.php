<?php

/**
 * Created by PhpStorm.
 * User: Bilel Bekkouche
 * Date: 18/02/2016
 * Time: 14:43
 */
class Dates
{

    // Variable global

    /**
     * @var array
     */
    var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    var $months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');





    function getEvents($year){
// Connexion à la bdd, n'oubliez de changer $cnx, c'est ma méthode
        global $DB;
// Pour la requete ajoutez heure dans le select
        $req = $DB->query('SELECT * FROM etudes WHERE YEAR(date_fin)='.$year);
        $r = array();
        while($d = $req->fetch(PDO::FETCH_OBJ))
        {
// Ici on veut obtenir $r[TIMESTAMP][id] = titre.''.heure; donc :
            $r[strtotime($d->date_fin)][$d->id_etudes]=$d->nom_interne .' : la date début de cette enquete est : ' .$d->date_debut ;
        }
        return $r;
    }




    /**
     * @param $year
     * @return array
     */
    function getAll($year){
        $r = array();
        $date = new DateTime($year.'-01-01');
        while($date->format('Y') <= $year){
            // Ce que je veux => $r[annee][mois][jour] = jour de la semaine
            $y = $date->format('Y');
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0', '7', $date->format('w'));
            $r[$y][$m][$d] = $w;
            $date->add(new DateInterval('P1D'));
        }

        return $r;
    }


}