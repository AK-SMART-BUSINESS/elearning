<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 24/10/2019
 * Time: 15:47
 */

namespace Core\Libs\I;


use Core\Libs\C\Admin;

interface AdminInt
{
    public function addAdmin(Admin $admin);

    public function getAdmins();

    public function getAdmin($id_admin);

    public function updateAdmin(Admin $admin, $id_admin);

    public function deleteAdmin($id_admin);

}