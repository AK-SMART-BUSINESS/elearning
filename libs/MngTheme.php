<?php
/**
 * Class contenant toutes les méthodes permettant de gérer les thèmes de formation
 * @Implement ThemeInt [Interface ThemeInt]
 * @extends Database [Connexion à la base de données]
 */
namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Themes;
use Core\Libs\I\ThemeInt;

class MngTheme extends Database implements ThemeInt
{
    /**
     * Ajout d'un nouveau theme
     * @param Themes $themes
     * @return bool
     */
    public function addTheme(Themes $themes)
    {
        try{
            $sql = "INSERT INTO themes 
                    SET intituleTh=:intitule, statusTh=:status";
            if ($themes){
                $db = $this->getDb();
                $req = $db->prepare($sql);
                $req->bindParam(":intitule", $themes->getIntituleTh());
                $req->bindParam(":status", $themes->getStatusTh());
                if ($req->execute())
                {
                    return true;
                }
            }else{
                throw new \Exception("Erreur: Un object theme doit être créé avant ajout.");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Modification d'un thème
     * @param Themes $themes
     * @return bool
     */
    public function updateTheme(Themes $themes)
    {
        try{
            $sql = "UPDATE themes 
                    SET intituleTh=:intitule, statusTh=:status 
                    WHERE idTheme=:id_theme";
            if ($themes){
                $req = $this->getDb()->prepare($sql);
                $req->bindParam(":intitule", $themes->getIntituleTh());
                $req->bindParam(":status", $themes->getStatusTh());
                $req->bindParam(":id_theme", $themes->getIdTheme());
                if ($req->execute()){
                    return true;
                }
            }else{
                throw new \Exception("Erreur: Un object theme doit être créé avant ajout.");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Suppression d'un thème
     * @param $id_theme
     * @return bool
     */
    public function removeTheme($id_theme)
    {
        try{
            $sql = "DELETE FROM themes WHERE idTheme=?";
            if (intval($id_theme) > 0){
                $req = $this->getDb()->prepare($sql);
                if ($req->execute([intval($id_theme)])){
                    return $this->getDb()->lastInsertId();
                }
            }else{
                throw new \Exception("Erreur: Un object theme doit être créé avant ajout.");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Récupération de tous les thèmes enregistrés
     * @return mixed
     */
    public function getThemes()
    {
        try{
            $sql = "SELECT * FROM themes";
            $req = $this->getDb()->prepare($sql);
            $req->execute();
            $res = $req->fetchAll();
            $req->closeCursor();
            return $res;
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Récupération d'un seul thème en fonction de l'Identifiant du thème
     * @param $id_theme
     * @return bool
     */
    public function getTheme($id_theme)
    {
        try{
            $sql = "SELECT * FROM themes WHERE idTheme=?";
            if (intval($id_theme) > 0){
                $req = $this->getDb()->prepare($sql);
                $req->execute([intval($id_theme)]);
                $res = $req->fetch();
                $req->closeCursor();
                return $res;

            }else{
                throw new \Exception("Erreur: Un argument [identifiant] est manquant.");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Récupération des thèmes publiés
     * @return bool
     */
    public function getActiveThemes()
    {
        try{
            $sql = "SELECT * FROM themes WHERE statusTh='on'";
            $req = $this->getDb()->prepare($sql);
            $req->execute();
            $res = $req->fetchAll();
            $req->closeCursor();
            return $res;
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Publication d'un thème
     * @param $id_theme
     * @return bool
     */
    public function publishTheme($id_theme)
    {
        try{
            $sql = "UPDATE themes 
                    SET statusTh='on' 
                    WHERE idTheme=?";
            if (intval($id_theme) > 0){
                $req = $this->getDb()->prepare($sql);
                $req->bindParam(1, intval($id_theme));
                if ($req->execute()){
                    return true;
                }
            }else{
                throw new \Exception("Erreur: Un argument [identifiant] est manquant.");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    /**
     * Annulation de la publication d'un thème
     * @param $id_theme
     * @return bool
     */
    public function desableTheme($id_theme)
    {
        try{
            $sql = "UPDATE themes 
                    SET statusTh='off' 
                    WHERE idTheme=?";
            if (intval($id_theme) > 0){
                $req = $this->getDb()->prepare($sql);
                $req->bindParam(1, intval($id_theme));
                if ($req->execute()){
                    return true;
                }
            }else{
                throw new \Exception("Erreur: Un argument [identifiant] est manquant.");
            }
        }catch (\Exception $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

}