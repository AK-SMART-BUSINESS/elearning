<?php
namespace Core\Libs\I;


use Core\Libs\C\Formation;

/**
 * Interface défissant les méthodes de base pour la gestion des formations
 * Interface FormationInt
 * @package Core\Libs\I
 */
interface FormationInt
{
    /**
     * Ajout d'une nouvelle formation
     * @param Formation $formation
     * @return mixed
     */
    public function addFormation(Formation $formation);

    /**
     * Récupération de toutes les formations enregistrées
     * @return mixed
     */
    public function getFormations();

    /**
     * Récupération d'une formation
     * @param $id_formation
     * @return mixed
     */
    public function getFormation($id_formation);

    /**
     * Modification d'une formation enregistrée
     * @param Formation $formation
     * @return mixed
     */
    public function updateFormation(Formation $formation);
}