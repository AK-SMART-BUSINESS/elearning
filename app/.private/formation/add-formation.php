<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';

$result = [];

if (isset($_POST) && !empty($_POST)){
    $intitule_formation = htmlentities(trim($_POST['intitule']));
    $id_theme = intval($_POST['theme']);
    $description_formation = htmlentities(trim($_POST['description']));
    $prerequis_formation = htmlentities(trim($_POST['prerequis']));
    if ($id_theme > 0) {

    }else {
        $result['success'] = false;
        $result['message'] = "Erreur ! Certaines données soumises ne sont pas valide - [theme]";
    }
}else{
    $result['success'] = false;
    $result['message'] = "Erreur ! Pas de données envoyées en POST";
}

echo json_encode($result);