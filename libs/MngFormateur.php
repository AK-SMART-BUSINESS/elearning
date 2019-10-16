<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Formateur;
use Core\Libs\I\FormateurInt;

class MngFormateur extends Database implements FormateurInt
{
    public function addFormateur(Formateur $formateur)
    {
        // TODO: Implement addFormateur() method.
    }

    public function getFormateur()
    {
        $sql = "SELECT * FROM formateur";

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