<?php
namespace App;


class Application
{
    private $url = "";
    private $action = "";
    private $file = "";
    private $url_params = [];
  /**
   * Initialise l'application
   */
    public function __construct()
    {
        /*if (!Session::sessionExist()) {
          header("location: login.php");
          exit();
        }*/
//        var_dump($_GET);
//        die();
        if (isset($_GET['url'])){
            $this->url = $_GET['url'];
        }

        $this->configuration();
    }
  /**
   * Configure les actions (Les pages à ajoutées) et les paramètres
   */
    private function configuration(){

      if ($this->url == "") {
        $this->action = "accueil";
      }else {
        $url = trim($this->url,'/');
        $url = explode('/', $url);
        $action = $url[0];
        $action = explode('-',$action);
        if (count($action) == 1) {
          $this->action = $action[0];
        }else {
          $this->action = $action[0];
          for ($i=1; $i < count($action); $i++) { 
            $this->action .= ucfirst($action[$i]);
          }
        }

        unset($url[0]);
        $this->url_params = !empty($url) ? $url : [];
        unset($url);
      }
    }

    private function setPageFile()
    {
      $this->file = $this->page.'.phtml';
    }
  /**
   * Lance l'application
   */
    public function run()
    {
        try {
          if (method_exists("App\Main", $this->action)) {
            $action = $this->action;
            $app = new Main($this->action, $this->url_params);
            $app->$action();
          } else {
            throw new \Exception("Erreur ! Action non valide.", 1);
          }
        } catch (\Exception $e) {
          die($e->getMessage());
        }

    }
}
