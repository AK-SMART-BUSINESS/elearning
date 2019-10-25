<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: GET");


require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();


$result = [];

$app = new \Core\Libs\MngTheme();
$themes = $app->getThemes();
if ($themes){
    $result['success'] = true;
    $result['msg'] = count($themes).' thème(s) trouvé(s)';
    $result['data'] = $themes;
}else{
    $result['success'] = false;
    $result['msg'] = 'Pas de thème enregistré';
    $result['data'] = $app->getErrorMsg();
}

echo json_encode($result);