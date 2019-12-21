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
if (isset($_POST) && !empty($_POST)) {
    // $result['data'] = $_SESSION['uid'];
    $module = (int) $_POST['module'];
    $mode = $_POST['mode'];
    $reference = $_POST['reference'];
    $uid = $_SESSION['uid'];
    // $result['data'] = $reference;

    if ($app->inscriptionFormation($uid, $module, $mode, $reference)){
        $result['success'] = true;
        $result['message'] = "Bravo ! Vous êtes inscrit à la formation";
    }
    else {
        $result['success'] = false;
        $result['message'] = "Echèc lors de l'inscription !";
        $result['donnees'] = $app->getErrorMsg();
    }
} else {
    $result['success'] = false;
    $result['message'] = "Pas de données soumises !";
}
echo json_encode($result);