<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();

$result = [];

$app = new \Core\Libs\MngFormation();

$courses = $app->getFrontCourse();

if ($courses) {
    $result['success'] = true;
    $result['message'] = count($courses)." cours trouvé(s)";
    $result['donnees'] = $courses;
} else {
    $result['success'] = false;
    $result['message'] = "Pas de cours enregistré !";
    $result['donnees'] = $app->getErrorMsg();
}

echo json_encode($result);