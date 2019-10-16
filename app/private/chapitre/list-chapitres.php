<?php
header('Content-Type: application/json; charset=utf-8');
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';

$resultats = [];

$app = new \Core\Libs\MngChapitre();

$chapitres = $app->getChapitres();

if ($chapitre){
    $resultats["success"] = true;
    $resultats["message"] = count($chapitre).' chapitre(s) trouvé(s)';
    $resultats["donnees"] = $chapitre;

}else{
    $resultats["success"] = false;
    $resultats["message"] = 'Pas de chapitre trouvé';
    $resultats["donnees"] = $app->getErrorMsg();
}

echo json_encode($resultats);