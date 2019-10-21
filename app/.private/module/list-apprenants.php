<?php
header('Content-Type: application/json; charset=utf-8');
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';

$resultats = [];

$app = new \Core\Libs\MngModule();

$modules = $app->getModules();

if ($modules){
    $resultats["success"] = true;
    $resultats["message"] = count($modules).' apprenant(s) trouvé(s)';
    $resultats["donnees"] = $modules;

}else{
    $resultats["success"] = false;
    $resultats["message"] = 'Pas de module trouvé';
    $resultats["donnees"] = $app->getErrorMsg();
}

echo json_encode($resultats);