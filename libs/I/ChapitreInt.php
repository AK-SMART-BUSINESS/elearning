<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 15/10/2019
 * Time: 20:26
 */

namespace Core\Libs\I;


use Core\Libs\C\Chapitre;

interface ChapitreInt
{
    public function addChapitre(Chapitre $chapitre);

    public function getChapitres();

    public function getChapitre($id_chapitre);
}