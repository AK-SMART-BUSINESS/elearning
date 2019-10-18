<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 15/10/2019
 * Time: 20:26
 */

namespace Core\Libs\I;


use Core\Libs\C\Formateur;

interface FormateurInt
{
    public function addFormateur(Formateur $formateur);

    public function getFormateurs();

    public function getFormateur($id_formateur);

    public function updateFormateur(Formateur $formateur, $id_formateur);

    public function deleteFormateur($id_formateur);

    public function enableFormateur($id_formateur);

    public function disableFormateur($id_formateur);

}