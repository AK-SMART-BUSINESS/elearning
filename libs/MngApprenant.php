<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Apprenant;
use Core\Libs\I\ApprenantInt;

class MngApprenant extends Database implements ApprenantInt
{
    public function addApprenant(Apprenant $apprenant)
    {
        // TODO: Implement addApprenant() method.
    }

    public function getApprenants()
    {
        $sql = "SELECT * FROM apprenant";

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