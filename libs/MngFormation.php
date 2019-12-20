<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Formation;
use Core\Libs\I\FormationInt;

/**
 * Class contenant toutes les méthodes de gestion des formation *
 * Class MngFormation
 * @implement FomationInt (Interface FormationInt)
 * @package Core\Libs
 */
class MngFormation extends Database implements FormationInt
{
    /**
     * @param Formation $formation
     * @return bool|mixed
     */
    public function addFormation(Formation $formation)
    {
        // Requête d'insertion d'une nouvelle formation
        $sql = "INSERT INTO moduleformations 
                SET intituleForm=:intitule, descriptionForm=:description, prerequis=:prerequis, 
                prix=:prix, image=:image, dateAjoutForm=NOW(), themes_idTheme=:id_theme";
        try{
            if ($formation) { // Vérifie si un objet formation à été initialisé
                //Initialisation des variables
                $intitule = $formation->getIntituleForm();
                $description = $formation->getDescriptionForm();
                $prerequis = $formation->getPrerequis();
                $prix = $formation->getPrix();
                $image = $formation->getImage();
                $id_theme = $formation->getThemesIdTheme();

                // Préparation de la requête
                $requete = $this->getDb()->prepare($sql);

                // Liaison des paramètres de la requête aux variables
                $requete->bindParam(':intitule', $intitule);
                $requete->bindParam(':description', $description);
                $requete->bindParam(':prerequis', $prerequis);
                $requete->bindParam(':prix', $prix);
                $requete->bindParam(':image', $image);
                $requete->bindParam(':id_theme', $id_theme);

                // Exécution de la requête
                if ($requete->execute()) { // Vérifie si la requête d'insertion a réussi
                    // Retourne l'ID de la dernière formation ajoutée
                    return $this->getDb()->lastInsertId();
                }
            } else {
                throw new \Exception('Erreur: argument non valide ! Object formation null');
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * @return bool|mixed
     */
    public function getFormations()
    {
        $sql = "SELECT mf.*, t.intituleTh theme
                FROM moduleformations mf
                INNER JOIN themes t
                    ON t.idTheme=mf.themes_idTheme";
        try {
            // $requet = $this->getDb()->query('SELECT * FROM moduleformations');
            $requet = $this->getDb()->query($sql);
            return $requet->fetchAll();
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id_formation
     * @return bool|mixed
     */
    public function getFormation($id_formation)
    {
        try {
            $id_formation = intval($id_formation); // Cast
            if ($id_formation > 0) { // Vérification de l'ID
                // Requete de recuperation d'une formation
                $sql = 'SELECT * FROM moduleformations WHERE idModuleForm=?';

                $requete = $this->getDb()->prepare($sql);
                $requete->execute([$id_formation]);
                return $requete->fetch();
            } else {
                throw new \Exception('Erreur ! Argument [id_formation] invalide.');
            }

        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * @param Formation $formation
     * @return bool|mixed
     */
    public function updateFormation(Formation $formation)
    {
        // Requête d'insertion d'une nouvelle formation
        $sql = "UPDATE moduleformations 
                SET intituleForm=:intitule, descriptionForm=:description, prerequis=:prerequis, 
                    prix=:prix, image=:image, dateAjoutForm=:date_ajout, themes_idTheme=:id_theme 
                WHERE idModuleForm=:id_form";
        try{
            if ($formation) { // Vérifie si un objet formation à été initialisé
                //Initialisation des variables
                $intitule = $formation->getIntituleForm();
                $description = $formation->getDescriptionForm();
                $prerequis = $formation->getPrerequis();
                $prix = $formation->getPrix();
                $image = $formation->getImage();
                $date_ajout = $formation->getDateAjoutForm();
                $id_theme = $formation->getThemesIdTheme();
                $id_form = $formation->getIdModuleForm();

                // Préparation de la requête
                $requete = $this->getDb()->prepare($sql);

                // Liaison des paramètres de la requête aux variables
                $requete->bindParam(':intitule', $intitule);
                $requete->bindParam(':description', $description);
                $requete->bindParam(':prerequis', $prerequis);
                $requete->bindParam(':prix', $prix);
                $requete->bindParam(':image', $image);
                $requete->bindParam(':date_ajout', $date_ajout);
                $requete->bindParam(':id_theme', $id_theme);
                $requete->bindParam(':id_form', $id_form);

                // Exécution de la requête
                if ($requete->execute()) { // Vérifie si la requête d'insertion a réussi
                    return true;
                }
            } else {
                throw new \Exception('Erreur: argument non valide ! Object formation null');
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Modification de l'image d'un module de formation
     * @param $image
     * @param $id_formation
     * @return bool
     */
    public function updateFormationImage($image, $id_formation)
    {
        try {
            if ($image && $id_formation && intval($id_formation) > 0){
                $sql = 'UPDATE moduleformations SET image=? WHERE idModuleForm=?';

                $requete = $this->getDb()->prepare($sql);

                if ($requete->execute([$image, $id_formation]))
                    return true;
            }
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Modification du prix d'un module de formation
     * @param $prix
     * @param $id_formation
     * @return bool
     */
    public function updateFormationPrix($prix, $id_formation)
    {
        try {
            if ($prix && $id_formation && intval($id_formation) > 0){
                $sql = 'UPDATE moduleformations SET prix=? WHERE idModuleForm=?';

                $requete = $this->getDb()->prepare($sql);

                if ($requete->execute([$prix, $id_formation]))
                    return true;
            }
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Active ou désative un module de formation
     * @param $status
     * @param $id_formation
     * @return bool
     */
    public function updateFormationStatus($status, $id_formation)
    {
        try {
            if ($status && $id_formation && intval($id_formation) > 0){
                $sql = 'UPDATE moduleformations SET statusForm=? WHERE idModuleForm=?';

                $requete = $this->getDb()->prepare($sql);

                if ($requete->execute([$status, $id_formation]))
                    return true;
            }
        } catch (\Exception $e) {
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

}