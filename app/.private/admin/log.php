<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();


$result = [];

$app = new \Core\Libs\MngAdmin();
if (isset($_POST) && !empty($_POST)){
    $email_admin = htmlentities($_POST['email']);
    $password_form = $_POST['password'];
    $admin = $app->getAdminByEmail($email_admin);
    if ($admin){
        if ($admin->statusAdmin == 'on'){
            $saved_password = $admin->mdp;
            if ($password_form == $saved_password){
                $result['success'] = true;
                $result['message'] = "<b>Accèss autorisé !</b><br>Vous êtes connecté.";
                $result['data'] = $admin;
                $_SESSION['admin_uid'] = $admin->idAdmini;
                $_SESSION['admin_mail'] = $admin->email;
                $_SESSION['user'] = $admin->nomComplet;
            }else{
                $result['success'] = false;
                $result['message'] = '<b>Accès réfuser !</b><br>Mot de passe incorrect';
                $result['data'] = $app->getErrorMsg();
            }
        }else{
            $result['success'] = false;
            $result['message'] = '<b>Accès réfuser !</b><br>Veuillez vous connecter à votre mail pour activer votre compte ou contacter votre administrateur';
            $result['data'] = $app->getErrorMsg();
        }

    }else{
        $result['success'] = false;
        $result['message'] = '<b>Accès réfuser !</b><br>Ce compte n\'existe pas';
        $result['data'] = $app->getErrorMsg();
    }
} else {
    $result['success'] = false;
    $result['message'] = 'Pas de données envoyées !';
}

echo json_encode($result);