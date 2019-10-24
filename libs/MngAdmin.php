<?php

namespace Core\Libs;


use Core\Config\Database;
use Core\Libs\C\Admin;
use Core\Libs\I\AdminInt;

class MngAdmin extends Database implements AdminInt
{
    public function addAdmin(Admin $admin)
    {
        // TODO: Implement addAdmin() method.
    }

    public function getAdmins()
    {
        // TODO: Implement getAdmins() method.
    }

    public function getAdmin($id_admin)
    {
        $sql = 'SELECT * FROM administrateur WHERE idAdmini=?';
        try{
            $id_admin = intval($id_admin);
            if ($id_admin > 0){
                $request = $this->getDb()->prepare($sql);
                $request->execute([$id_admin]);
                $result = $request->fetch();
                $request->closeCursor();
                return $result;
            }else{
                throw new \Exception('Erreur : Argument invalide !');
            }
        }catch (\PDOException $e){
            $this->setErrorMsg($e->getMessage());
            return false;
        }
    }

    public function updateAdmin(Admin $admin, $id_admin)
    {
        // TODO: Implement updateAdmin() method.
    }

    public function deleteAdmin($id_admin)
    {
        // TODO: Implement deleteAdmin() method.
    }

    public function getAdminByEmail($admin_email)
    {
        $sql = 'SELECT * FROM administrateur WHERE email=?';
        try{
            if ($admin_email != ""){
                $request = $this->getDb()->prepare($sql);
                $request->execute([$admin_email]);
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