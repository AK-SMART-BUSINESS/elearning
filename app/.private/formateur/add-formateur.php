<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();

$result = [];
$app = new \Core\Libs\MngFormateur();

if (isset($_POST) && !empty($_POST)){
    
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $email = $_POST["email"];
    $contact = htmlentities($_POST["contact"]);
    $specialite = htmlentities($_POST["specialites"]);
    $pays = htmlentities($_POST["pays"]);
    $ville = htmlentities($_POST["ville"]);
    $passe = $_POST['passe'];

    $frm = $app->getFormateurByEmail($email);

    if (!$frm){
        $formateur = new \Core\Libs\C\Formateur($nom,$prenom,$passe,$email,$contact,$pays,$specialite,$ville);
        if ($app->addFormateur($formateur)){
            $result['success'] = true;
            $result['message'] = "Nouveau formateur enregistré";
        } else {
            $result['success'] = false;
            $result['message'] = "Echèc de l'enregistrement !";
            $result['donnees'] = $app->getErrorMsg();
        }
    } else{
        $result['success'] = false;
        $result['message'] = "Ce formateur existe déjà !";
    }

}else {
    $result['success'] = false;
    $result['message'] = "Pas de données soumises !";
}

echo json_encode($result);