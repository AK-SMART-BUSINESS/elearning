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
    $nom = htmlentities($_POST['nom']);
    $prenoms = htmlentities($_POST['prenoms']);
    $contact = htmlentities($_POST['contact']);
    $email = htmlentities($_POST['email']);
    $pseudo = htmlentities($_POST['pseudo']);
    $passe = $_POST['passe'];

    $apprenant = new \Core\Libs\C\Apprenant($nom,$prenoms,$contact,$email,$passe,$pseudo);

    if ($app->addApprenant($apprenant)){
        $result['success'] = true;
        $result['message'] = "Nouveau formateur enregistré";
    } else {
        $result['success'] = false;
        $result['message'] = "Echèc de création de votre compte ! Veuillez réessayer plutard.";
        $result['donnees'] = $app->getErrorMsg();
    }
}

echo json_encode($result);