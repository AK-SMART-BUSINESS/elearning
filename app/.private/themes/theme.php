<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: GET");


require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();


$result = [];

$app = new \Core\Libs\MngTheme();
if (isset($_GET) && !empty($_GET)){
    $id_theme = intval($_GET['id_theme']);
    if ($id_theme > 0){
        $theme = $app->getTheme($id_theme);
        if ($theme) {
            $result['success'] = true;
            $result['message'] = 'Thème trouvé';
            $result['data'] = $theme;
        } else {
            $result['success'] = true;
            $result['message'] = 'Oups!!! Ce thème n\'exite pas ou a été supprimé.';
        }
    }else{
        $result['success'] = false;
        $result['message'] = 'Erreur : Argument non valide.';
    }
} else {
    $result['success'] = false;
    $result['message'] = 'Pas de données envoyées !';
    $result['data'] = [];
}

echo json_encode($result);