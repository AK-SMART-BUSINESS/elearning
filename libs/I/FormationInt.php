<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 15/10/2019
 * Time: 20:26
 */

namespace Core\Libs\I;


use Core\Libs\C\Formation;

interface FormationInt
{
    public function addFormation(Formation $formation);

    public function getFormations();

    public function getFormation($id_formation);
}