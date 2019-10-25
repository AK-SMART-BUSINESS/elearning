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
    $id_theme = $_POST['id_theme'];

    $theme = new \Core\Libs\C\Themes($intitule_theme, $status);
    try{
        $theme->setIdTheme($id_theme);
        if ($app->updateTheme($theme)){
            $result['success'] = true;
            $result['message'] = 'La modification a été enregistrée !';
            $result["data"] = $id_theme;
        }else{
            $result['success'] = false;
            $result['message'] = 'Echèc de la modidication';
            $result["data"] = $app->getErrorMsg();
        }
    }catch (Exception $e){
        $result['success'] = false;
        $result['message'] = $app->getErrorMsg();
        $result["data"] = [];
    }

} else {
    $result['success'] = false;
    $result['message'] = 'Pas de données envoyées !';
}

echo json_encode($result);