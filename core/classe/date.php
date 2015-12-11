<?php


/**
 * Class date
 */
class date
{
    /**
     * @var string Englobe la date quel soit de format standard ou en format unitaire(strtotime)
     */
    private $date;

    /**
     * date constructor.
     * @param $date string retourne dans la variable @var date la valeur envoyer par le controller
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * @param $date string / Prend la date inscrite en VARIABLE PRIVATE
     * @return int / Retourne la VARIABLE PRIVATE en format unitaire strtotime
     */
    public function format_strt($date)
    {
        return strtotime($date);
    }

    /**
     * @param $date string / Prend la date inscrite en VARIABLE PRIVATE
     * @return bool|string / Retourne la VARIABLE PRIVATE en format Standard sans les Heures et Minutes
     */
    public function format_date($date)
    {
        return date("d-m-Y", $date);
    }

    /**
     * @param $date string / Prend la date inscrite en VARIABLE PRIVATE
     * @return bool|string / Retourne la VARIABLE PRIVATE en format Standard avec les Heures et Minutes
     */
    public function format_dateTime($date)
    {
        return date("d-m-Y H:i", $date);
    }

    /**
     * @param $jour int / Transforme la VARIABLE $JOUR en string accomplît
     */
    public function jour_semaine($jour)
    {
        switch($jour)
        {
            case 1: echo "Lundi"; break;
            case 2: echo "Mardi"; break;
            case 3: echo "Mercredi"; break;
            case 4: echo "Jeudi"; break;
            case 5: echo "Vendredi"; break;
            case 6: echo "Samedi"; break;
            case 7: echo "Dimanche"; break;
        }
    }

    /**
     * @param $mois int / Transforme la VARIABLE $MOIS en string accomplît
     */
    public function mois($mois)
    {
        switch($mois)
        {
            case 1: echo "Janvier"; break;
            case 2: echo "Février"; break;
            case 3: echo "Mars"; break;
            case 4: echo "Avril"; break;
            case 5: echo "Mai"; break;
            case 6: echo "Juin"; break;
            case 7: echo "Juillet"; break;
            case 8: echo "Aout"; break;
            case 9: echo "Septembre"; break;
            case 10: echo "Octobre"; break;
            case 11: echo "Novembre"; break;
            case 12: echo "Décembre"; break;
        }
    }

    /**
     * @param $date_format string / Envoie et transforme la variable STRT en format standard complète.
     * @return string
     */
    public function formatage($date_format)
    {
        $jour = date("d", $date_format);
        $mois = date("m", $date_format);
        $year = date("Y", $date_format);

        $formatage = $jour." ".$this->mois($mois)." ".$year;
        return $formatage;
    }

    /**
     * @param $datetime string / Prend la variable en unitaire et la convertie en base de IL Y A
     * @return string
     */
    public function format_inc($datetime)
    {
        $now = time();
        $created = $datetime;

        //Calcul de la différence
        $diff = $now-$created;
        $m = ($diff)/(60); // Minutes
        $h = ($diff)/(60*60); // Heures
        $j = ($diff)/(60*60*24); // jours
        $s = ($diff)/(60*60*24*7);

        if($diff < 60) {
            return $diff." Secondes";
        }elseif ($m < 60) { // "il y a x minutes"
            $minute = (floor($m) == 1) ? 'minute' : 'minutes';
            return floor($m).' '.$minute;
        }
        elseif ($h < 24) { // " il y a x heures, x minutes"
            $heure = (floor($h) <= 1) ? 'heure' : 'heures';
            $dateFormated = floor($h).' '.$heure;
            if (floor($m-(floor($h))*60) != 0) {
                $minute = (floor($m) == 1) ? 'minute' : 'minutes';
                $dateFormated .= ', '.floor($m-(floor($h))*60).' '.$minute;
            }
            return $dateFormated;
        }
        elseif ($j < 7) { // " il y a x jours, x heures"
            $jour = (floor($j) <= 1) ? 'jour' : 'jours';
            $dateFormated = floor($j).' '.$jour;
            if (floor($h-(floor($j))*24) != 0) {
                $heure = (floor($h) <= 1) ? 'heure' : 'heures';
                $dateFormated .= ', '.floor($h-(floor($j))*24).' '.$heure;
            }
            return $dateFormated;
        }
        elseif ($s < 5) { // " il y a x semaines, x jours"
            $semaine = (floor($s) <= 1) ? 'semaine' : 'semaines';
            $dateFormated = floor($s).' '.$semaine;
            if (floor($j-(floor($s))*7) != 0) {
                $jour = (floor($j) <= 1) ? 'jour' : 'jours';
                $dateFormated .= ', '.floor($j-(floor($s))*7).' '.$jour;
            }
            return $dateFormated;
        }
        else { // on affiche la date normalement
            return strftime("%d %B %Y à %H:%M", $created);
        }
    }
}