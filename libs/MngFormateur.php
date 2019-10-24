<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Formateur;
use Core\Libs\I\FormateurInt;

class MngFormateur extends Database implements FormateurInt
{
    public function addFormateur(Formateur $formateur)
    {
        $sql = "INSERT INTO formateurs
                SET nomForm=:nom, prenomsForm=:prenom, emailForm=:email,
                    passForm=:mdp, specialites=:specialite, contactForm=:contact, 
                    paysForm=:pays, villeForm=:ville, dateAjoutForm=NOW()";
        try{
            if ($formateur){
                $request = $this->getDb()->prepare($sql);
                $request->bindParam(':nom', $formateur->getNomForm());
                $request->bindParam(':prenom', $formateur->getPrenomForm());
                $request->bindParam(':email', $formateur->getEmailForm());
                $request->bindParam(':mdp', $formateur->getMdpForm());
                $request->bindParam(':specialite', $formateur->getSpecialiteForm());
                $request->bindParam(':contact', $formateur->getContactForm());
                $request->bindParam(':pays', $formateur->getPaysForm());
                $request->bindParam(':ville', $formateur->getVilleForm());

                if ($request->execute()){
                    return true;
                }
            }else{
                throw new \Exception("Erreur ! Données d'enregistrement de formateur incorrectes");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function getFormateurs()
    {
        $sql = "SELECT * FROM formateurs";
        try{
            $request = $this->getDb()->prepare($sql);
            $request->execute();
            $result = $request->fetchAll();
            $request->closeCursor();
            return $result;
        }catch (\PDOException $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function getFormateur($id_formateur)
    {
        $sql = "SELECT * FROM formateurs WHERE idFormateur=?";

        try{
            $request = $this->getDb()->prepare($sql);
            $request->execute([$id_formateur]);
            //return $result;
            $result = $request->fetch();
            $request->closeCursor();
            return $result;
        }catch (\PDOException $e){
            echo $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function getFormateurByEmail($email_form)
    {
        $sql = 'SELECT * FROM formateurs WHERE emailForm=?';
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
//    public function getFormateurByPseudo($pseudo_form)
//    {
//        $sql = 'SELECT * FROM formateur WHERE pseudo_form LIKE ?';
//        try{
//            if ($pseudo_form != ""){
//                $request = $this->getDb()->prepare($sql);
//                $request->bindParam(1, $pseudo_form);
//                $request->execute();
//                $result = $request->fetch();
//                $request->closeCursor();
//                return $result;
//            }else{
//                throw new \Exception('Erreur : Paramètre email manquant !');
//            }
//        }catch (\PDOException $e){
//            $this->setErrorMsg($e->getMessage());
//            return false;
//        }
//    }

    public function updateFormateur(Formateur $formateur, $id_formateur)
    {
//        $sql = "UPDATE formateur
//                SET nom_form=:nom, prenom_form=:prenom, pseudo_form=:pseudo,
//                    mdp_form=:mdp, dat_nais_form=:date_nais, email_form=:email,
//                    contact_form=:contact, pays_form=:pays, specialite_form=:specialite,
//                    ville_form=:ville, adresse_form=:adresse
//                WHERE id_form=:id_form";
//        try{
//            if ($formateur){
//                $request = $this->getDb()->prepare($sql);
//                $request->bindParam(':nom', $formateur->getNomForm());
//                $request->bindParam(':prenom', $formateur->getPrenomForm());
//                $request->bindParam(':pseudo', $formateur->getPseudoForm());
//                $request->bindParam(':mdp', $formateur->getMdpForm());
//                $request->bindParam(':date_nais', $formateur->getDatNaisForm());
//                $request->bindParam(':email', $formateur->getEmailForm());
//                $request->bindParam(':contact', $formateur->getContactForm());
//                $request->bindParam(':pays', $formateur->getPaysForm());
//                $request->bindParam(':specialite', $formateur->getSpecialiteForm());
//                $request->bindParam(':ville', $formateur->getVilleForm());
//                $request->bindParam(':adresse', $formateur->getAdresseForm());
//                $request->bindParam(':id_form', $formateur->getIdForm());
//
//                if ($request->execute()){
//                    return true;
//                }
//            }else{
//                throw new \Exception("Erreur ! Données d'enregistrement de formateur incorrectes");
//            }
//        }catch (\Exception $e){
//            $this->setErrorMsg($e->getMessage());
//            return false;
//        }
    }

    public function deleteFormateur($id_formateur)
    {
//        $sql = 'UPDATE formateur
//                SET status_form="enable" WHERE id_form=?';
//        try{
//            $id_form = intval($id_formateur);
//            if ($id_form > 0){
//                $request = $this->getDb()->prepare($sql);
//                $request->bindParam(1, $id_form);
//                $request->execute();
//                if ($request->execute()) return true;
//            }else{
//                throw new \Exception('Erreur : Paramètre incorrect !');
//            }
//        }catch (\PDOException $e){
//            $this->setErrorMsg($e->getMessage());
//            return false;
//        }
    }

    public function enableFormateur($id_formateur)
    {
        $sql = 'DELETE FROM formateur WHERE id_form=?';
        try{
            $id_form = intval($id_formateur);
            if ($id_form > 0){
                $request = $this->getDb()->prepare($sql);
                $request->bindParam(1, $id_form);
                $request->execute();
                if ($request->execute()) return true;
            }else{
                throw new \Exception('Erreur : Paramètre incorrect !');
            }
        }catch (\PDOException $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function disableFormateur($id_formateur)
    {
        $sql = 'UPDATE formateur 
                SET statusForm="disable" WHERE idFormateur=?';
        try{
            $id_form = intval($id_formateur);
            if ($id_form > 0){
                $request = $this->getDb()->prepare($sql);
                $request->bindParam(1, $id_form);
                $request->execute();
                if ($request->execute()) return true;
            }else{
                throw new \Exception('Erreur : Paramètre incorrect !');
            }
        }catch (\PDOException $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }


}