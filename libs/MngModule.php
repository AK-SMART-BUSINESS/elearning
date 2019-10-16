<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Module;
use Core\Libs\I\ModuleInt;

class MngModule extends Database implements ModuleInt
{
    public function addModule(Module $module)
    {
        // TODO: Implement addModule() method.
    }

    public function getModule()
    {
        $sql = "SELECT * FROM module";

        try{
            $request = $this->getDb()->prepare($sql);
            $request->execute();
            //return $result;
            $result = $request->fetchAll();
            $request->closeCursor();
            return $result;
        }catch (\PDOException $e){
            echo $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function getApprenant($id_apprenant)
    {
        // TODO: Implement getApprenant() method.
    }

}