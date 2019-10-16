<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Chapitre;
use Core\Libs\I\ChapitreInt;

class MngChapitre extends Database implements ChapitreInt
{
    public function addChapitre(Chapitre $chapitre)
    {
        // TODO: Implement addChapitre() method.
    }

    public function getChapitre()
    {
        $sql = "SELECT * FROM chapitre";

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

    public function getChapitre($id_chapitre)
    {
        // TODO: Implement getChapitre() method.
    }

}