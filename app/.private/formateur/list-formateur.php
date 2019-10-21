<?php
header('Content-Type: application/json; charset=utf-8');
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';

$resultats = [];

$app = new \Core\Libs\MngFormateur();

$formateurs = $app->getFormateurs();

if ($formateurs){
    $resultats["success"] = true;
    $resultats["message"] = count($formateurs).' Formateur(s) trouvé(s)';
    $resultats["donnees"] = $formateurs;

}else{
    $resultats["success"] = false;
    $resultats["message"] = 'Pas de formateur trouvé';
    $resultats["donnees"] = $app->getErrorMsg();
}

echo json_encode($resultats);