<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');

require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();

$result = [];

if (isset($_SESSION['frm_uid'])){
    $result['success'] = true;
    $result['message'] = 'Vous êtes connecté !';
}

echo json_encode($result);