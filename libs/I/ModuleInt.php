<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 15/10/2019
 * Time: 20:26
 */

namespace Core\Libs\I;


use Core\Libs\C\Module;

interface ModuleInt
{
    public function addModule(Module $module);

    public function getModules();

    public function getModule($id_module);
}