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

    public function getFormateurs()
    {
        // TODO: Implement getFormateurs() method.
    }

    public function getFormateur($id_formateur)
    {
        $sql = "SELECT * FROM formateur=?";

        try{
            $request = $this->getDb()->prepare($sql);
            $request->execute([$id_formateur]);
            //return $result;
            $result = $request->fetchAll();
            $request->closeCursor();
            return $result;
        }catch (\PDOException $e){
            echo $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function getFormateurByEmail($email_form)
    {
        $sql = 'SELECT * FROM apprenant WHERE email_form=?';
        try{
            if ($email_form != ""){
                $request = $this->getDb()->prepare($sql);
                $request->execute([$email_form]);
                $result = $request->fetch();
                $request->closeCursor();
                return $result;
            }else{
                throw new \Exception('Erreur : Paramètre email manquant !');
            }
        }catch (\PDOException $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }
}