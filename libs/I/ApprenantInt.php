<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 15/10/2019
 * Time: 20:26
 */

namespace Core\Libs\I;


use Core\Libs\C\Apprenant;

interface ApprenantInt
{
    public function addApprenant(Apprenant $apprenant);

    public function getApprenants();

    public function getApprenant($id_apprenant);
}