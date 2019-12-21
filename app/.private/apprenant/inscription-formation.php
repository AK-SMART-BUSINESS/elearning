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
    $module = (int) $_POST['module'];
    $mode = $_POST['mode'];
    $reference = $_POST['reference'];

    
} else {
    $result['success'] = false;
    $result['message'] = "Pas de données soumises !";
}
echo json_encode($result);