<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();

$result = [];

$app = new \Core\Libs\MngTheme();
if (isset($_POST) && !empty($_POST)){
    $intitule_theme = htmlentities($_POST['theme']);
    $status = $_POST['status'];

    $theme = new \Core\Libs\C\Themes($intitule_theme, $status);

//    $resultat_operation = $app->addTheme($theme);
    if ($app->addTheme($theme)){
        $result['success'] = true;
        $result['message'] = 'Nouveau thème ajouté !';
        $result["data"] = [];
    }else{
        $result['success'] = false;
        $result['message'] = 'Echèc de l\'enregistrement !';
        $result["data"] = [$app->getErrorMsg()];
    }

} else {
    $result['success'] = false;
    $result['message'] = 'Pas de données envoyées !';
}

echo json_encode($result);