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
        if ($apprenant->statusApp == 'enable'){
            $saved_password = $apprenant->passApp;
            if ($password_apprenant == $saved_password){
                $result['success'] = true;
                $result['message'] = "<b>Accèss autorisé !</b><br>Vous êtes connec té.";
                $result['data'] = $apprenant;
                $_SESSION['uid'] = $apprenant->idApprenant;
                $_SESSION['uemail'] = $apprenant->emailApp;
                $_SESSION['user'] = $apprenant->pseudoApp;
            }else{
                $result['success'] = false;
                $result['message'] = '<b>Accès réfuser !</b><br>Mot de passe incorrect';
                $result['data'] = $app->getErrorMsg();
            }
        }else{
            $result['success'] = false;
            $result['message'] = '<b>Accès réfuser !</b><br />Veuillez vous connecter à votre mail pour activer votre compte';
            $result['data'] = $app->getErrorMsg();
        }

    }else{
        $result['success'] = false;
        $result['message'] = '<b>Accès réfusé !</b><br>Ce compte n\'existe pas';
        $result['data'] = $app->getErrorMsg();
    }
} else {
    $result['success'] = false;
    $result['message'] = 'Pas de données envoyées !';
}

echo json_encode($result);