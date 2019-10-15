<?php
header('Content-Type: application/json; charset=utf-8');
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';

$resultats = [];

$app = new \Core\Libs\MngApprenant();

$apprenants = $app->getApprenants();

if ($apprenants){
    $resultats["success"] = true;
    $resultats["message"] = count($apprenants).' apprenant(s) trouvé(s)';
    $resultats["donnees"] = $apprenants;

}else{
    $resultats["success"] = false;
    $resultats["message"] = 'Pas d\'apprenant trouvé';
    $resultats["donnees"] = $app->getErrorMsg();
}

echo json_encode($resultats);