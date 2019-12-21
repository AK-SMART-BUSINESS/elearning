<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Apprenant;
use Core\Libs\I\ApprenantInt;

class MngApprenant extends Database implements ApprenantInt
{
    public function addApprenant(Apprenant $apprenant)
    {
        $sql = "INSERT INTO apprenants
                SET nomApp=:nom, prenomsApp=:prenoms, contactApp=:contact, 
                    emailApp=:email, passApp=:passe, pseudoApp=:pseudo, dateInscripApp=NOW()";
        try {
            $req = $this->getDb()->prepare($sql);
            $nom = $apprenant->getNomApp();
            $prenom = $apprenant->getPrenomsApp();
            $contact = $apprenant->getContactApp();
            $email = $apprenant->getEmailApp();
            $pseudo = $apprenant->getPseudoApp();
            $passe = $apprenant->getPassApp();

            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenoms', $prenom);
            $req->bindParam(':contact', $contact);
            $req->bindParam(':email', $email);
            $req->bindParam(':pseudo', $pseudo);
            $req->bindParam(':passe', $passe);

            if ($req->execute()) return true;
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function inscriptionFormation($uid, $session_num, $mode_paiement, $reference)
    {
        $sql = "INSERT INTO inscriptionformation 
                SET datePaiement=NOW(), 
                    moyenPaiement=:moyen, 
                    sessionFormation_idSessionForm=:session_num,
                    apprenants_idApprenant=:apprenant, 
                    reference=:reference";
        try {
            $req = $this->getDb()->prepare($sql);
            $req->bindParam(':moyen', $mode_paiement);
            $req->bindParam(':session_num', $session_num);
            $req->bindParam(':apprenant', $uid);
            $req->bindParam(':reference', $reference);
            if ($req->execute()) return true;
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function getApprenants()
    {
        $sql = "SELECT * FROM apprenants";

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

    public function getApprenantByEmail($email_app)
    {
        $sql = 'SELECT * FROM apprenants WHERE emailApp=?';
        try{
            if ($email_app != ""){
                $request = $this->getDb()->prepare($sql);
                $request->execute([$email_app]);
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

    public function getApprenantCours($uid)
    {
        
    }

    public function getApprenantCoursBySession($uid, $session_num)
    {
        $sql = "SELECT * FROM inscriptionformation 
                WHERE sessionFormation_idSessionForm=? AND apprenants_idApprenant=?";
        try {
            $req = $this->getDb()->prepare($sql);
            $req->execute([$session_num, $uid]);
            $res = $req->fetch();
            $req->closeCursor();
            return $res;
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function test()
    {
        return 'Ok';
    }

}