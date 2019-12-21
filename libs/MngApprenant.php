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

    public function inscriptionFormation($id_app, $module, $mode_paiement, $reference)
    {
        $sql = "INSERT INTO inscriptionformation 
                SET dateInscription=NOW(), moyenPaiement=:moyen, sessionFormation_idSessionForm:session,
                    apprenants_idApprenant=:apprenant, reference=:reference";
        try {
            $req = $this->getDb()->prepare($sql);
            $req->bindParam(':moyen', $mode_paiement);
            $req->bindParam(':session', $module);
            $req->bindParam(':apprenant', $id_app);
            $req->bindParam(':reference', $reference);
            if ($req->execute()) return true;
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return fasle;
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

    public function test()
    {
        return 'Ok';
    }

}