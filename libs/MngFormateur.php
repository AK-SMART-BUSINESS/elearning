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
                    pays=:pays, ville=:ville, dateAjoutForm=NOW()";
        try{
            if ($formateur){
                $nom = $formateur->getNomForm();
                $prenom = $formateur->getPrenomsForm();
                $email = $formateur->getEmailForm();
                $passe = $formateur->getPrenomsForm();
                $specialite = $formateur->getSpecialite();
                $contact = $formateur->getContactForm();
                $pays = $formateur->getPays();
                $ville = $formateur->getVille();

                $request = $this->getDb()->prepare($sql);
                $request->bindParam(':nom', $nom);
                $request->bindParam(':prenom',$prenom);
                $request->bindParam(':email', $email);
                $request->bindParam(':mdp', $passe);
                $request->bindParam(':specialite', $specialite);
                $request->bindParam(':contact', $contact);
                $request->bindParam(':pays', $pays);
                $request->bindParam(':ville', $ville);

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

    public function updateFormateur(Formateur $formateur, $id_formateur)
    {
        $sql = "UPDATE formateurs
                SET nomForm=:nom, prenomsForm=:prenom, emailForm=:email,
                    specialites=:specialite, contactForm=:contact, 
                    paysForm=:pays, villeForm=:ville 
                WHERE idFormateur=:id_form";
        try{
            if ($formateur){
                $request = $this->getDb()->prepare($sql);
                $request->bindParam(':nom', $formateur->getNomForm());
                $request->bindParam(':prenom', $formateur->getPrenomForm());
                $request->bindParam(':email', $formateur->getEmailForm());
                $request->bindParam(':contact', $formateur->getContactForm());
                $request->bindParam(':pays', $formateur->getPaysForm());
                $request->bindParam(':specialite', $formateur->getSpecialiteForm());
                $request->bindParam(':ville', $formateur->getVilleForm());
                $request->bindParam(':id_form', $formateur->getIdForm());

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

    public function deleteFormateur($id_formateur)
    {
        $sql = 'UPDATE formateurs
                SET statusForm="enable" WHERE idFormateur=?';
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

    public function enableFormateur($id_formateur)
    {
        $sql = 'DELETE FROM formateur WHERE idFormateur=?';
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
                SET status_form="disable" WHERE id_form=?';
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