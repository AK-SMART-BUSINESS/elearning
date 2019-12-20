<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset:utf-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php';
session_start();

$result = [];

$app = new \Core\Libs\MngFormation();

$path = dirname(dirname(dirname(__DIR__))).'/media/uploads/';//Dossier de sauvegarde des images uploadées
$valid_file_formats = array("jpg", "png", "gif", "bmp", "jpeg");//Liste des extensions autorisées

if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $filename = $_FILES['image_form']["name"];
    $filesize = $_FILES['image_form']['size'];

    $intitule = htmlentities($_POST['intitule']);
    $theme    = intval($_POST['theme']);
    $prix = intval($_POST['prix']);
    $description = htmlentities($_POST['description']);
    $prerequis = htmlentities($_POST['prerequis']);


    if (strlen($filename)) {
        list($txt, $ext) = explode('.', $filename);
        if (in_array($ext, $valid_file_formats)) {
            if ($filesize < (1024*1024)) {
                // $image_name = time().'_'.$_SESSION['admin_uid'].'.'.$ext;
                $image_name = time().'.'.$ext;
                $tmp = $_FILES['image_form']['tmp_name'];
                if (move_uploaded_file($tmp, $path.$image_name)) {
                    //Création de l'objet formation
                    $formation = new \Core\Libs\C\Formation($intitule, $description, $prerequis, $prix, $image_name, $theme);
                    if ($app->addFormation($formation)) {//Enregistrement de la formation
                                                        //Renvoie "ID" du dernier enregistrement en cas de succès autrement "false
                        $result['success'] = true;
                        $result['message'] = "Nouvelle formation enregistrée";
                    }else {
                        $result['success'] = false;
                        $result['message'] = "Echèc d'enregistrement de la formation";
                        $result['donnees'] = $app->getErrorMsg();
                    }                    
                } else {
                    $result['success'] = false;
                    $result['message'] = "Impossible de sauvegarder votre image";
                }                
            }else {
                $result['success'] = false;
                $result['message'] = "Image trop grand";
            }
        }else {
            $result['success'] = false;
            $result['message'] = "Format de fichier non valide !";
        }
    }else {
        $result['success'] = false;
        $result['message'] = "Veuillez sélectionner une image de couverture";
    }
}

echo json_encode($result);