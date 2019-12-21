<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();

$result = [];

$app = new \Core\Libs\MngFormation();

if (isset($_POST) && !empty($_POST)){
    $id_formateur = intval($_POST['formateur']);
    $session = intval($_POST['session_num']);
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $id_module = intval($_POST['module']);

    if ($id_formateur > 0 && $session > 0 && $id_module > 0){
        if ($app->getFormationByModAndSessNum($id_module, $session)){
            $result['success'] = false;
            $result['message'] = "La session N°${$session} de ce module à déjà été enregistrée !";
        } else {
            if($app->addFormationSession($id_module,$id_formateur,$session,$date_debut,$date_fin)) {
                $result['success'] = true;
                $result['message'] = "Session enregistrée";
            } else {
                $result['success'] = false;
                $result['message'] = "Echèc de l'enregistrement !";
                $result['donnees'] = $app->getErrorMsg();
            }
        }
    }else{
        $result['success'] = false;
        $result['message'] = "Erreur ! Paramère incorrecte !";
    }

} else {
    $result['success'] = false;
    $result['message'] = "Aucune donnée soumise !";
}

echo json_encode($result);