<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();


$result = [];

$app = new \Core\Libs\MngApprenant();
if (isset($_POST) && !empty($_POST)){
    $email_apprenant = htmlentities($_POST['email']);
    $password_apprenant = $_POST['password'];
    $apprenant = $app->getApprenantByEmail($email_apprenant);
    if ($apprenant){

        $saved_password = $apprenant->mdp_app;
        if ($password_apprenant == $saved_password){
            $result['success'] = true;
            $result['message'] = "<b>Accèss autorisé !</b><br>Vous êtes connecté.";
            $result['data'] = $apprenant;
            $_SESSION['uid'] = $apprenant->id_app;
            $_SESSION['uemail'] = $apprenant->email_app;
            $_SESSION['user'] = $apprenant->pseudo_app;
        }else{
            $result['success'] = false;
            $result['message'] = '<b>Accès réfuser !</b><br>Mot de passe incorrect';
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