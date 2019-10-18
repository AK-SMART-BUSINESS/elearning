<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Formation;
use Core\Libs\I\FormationInt;

class MngFormation extends Database implements FormationInt
{
    public function addFormation(Formation $formation)
    {
        // TODO: Implement addFormation() method.
    }

    public function getFormations()
    {
        // TODO: Implement getFormations() method.
    }

    public function getApprenants()
    {
        $sql = "SELECT * FROM formation";

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

    public function getFormation($id_formation)
    {
        // TODO: Implement getFormation() method.
    }

}