<?php

namespace App\Service;

class IntervalStringer
{

/**
 * Affiche un DateInterval lisible par les humains
 *
 * @param DateInterval $date_interval
 *         Intervalle à afficher
 * @return String
 *         Intervalle lisible par les humains
 */

    function interval_to_string($date_interval)
    {
        $parametres = array(
            array("y", 'année', 'années'),
            array("m", 'mois', 'mois'),
            array("d", 'jour', 'jours'),
            array("h", 'heure', 'heures'),
            array("i", 'minute', 'minutes'),
            array("s", 'seconde', 'secondes'),
        );

        $resultat = array();

        foreach ($parametres as $parametre)
        {
            $format = $parametre[0];
            $singulier = $parametre[1];
            $pluriel = $parametre[2];

            if ($date_interval->format('%'.$format) > 0)
            {
                $resultat[] = $date_interval->format('%'.$format)." ".($date_interval->format('%'.$format) > 1 ? $pluriel : $singulier);
            }
        }

        return implode(', ', $resultat);
    }
}