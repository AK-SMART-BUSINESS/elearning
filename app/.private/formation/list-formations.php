<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';

$resultats = [];

$app = new \Core\Libs\MngFormation();

$formations = $app->getFormations();

if ($formations){
    $resultats["success"] = true;
    $resultats["message"] = count($formations).' apprenant(s) trouvé(s)';
    $resultats["donnees"] = $formation;

}else{
    $resultats["success"] = false;
    $resultats["message"] = 'Pas de formation trouvé';
    $resultats["donnees"] = $app->getErrorMsg();
}

echo json_encode($resultats);