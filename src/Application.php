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
      // echo '<pre>';
      // var_dump($_SERVER);
      // die();
      if (isset($_GET["url"]) && preg_match('/panel/', $_GET["url"]) && !isset($_SESSION['admin'])) {
        $this->action = "log";
        $url = trim($this->url,'/');
        $url = explode('/', $url);
        unset($url[0]);
        
        $action = $url[1];
        
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
        unset($url[1]);
        $this->url_params = !empty($url) ? $url : [];
        unset($url);
      }elseif (preg_match('/classroom/', $_GET["url"]) ) {
        $this->action = "connexion";
      }else {
        if ($this->url == "") {
          $this->action = "accueil";
        }
      }

      // if ($this->url == "") {
      //   $this->action = "accueil";
      // }
      // else {
      //   $url = trim($this->url,'/');
      //   $url = explode('/', $url);
      //   $action = $url[0];
      //   $action = explode('-',$action);
      //   if (count($action) == 1) {
      //     $this->action = $action[0];
      //   }else {
      //     $this->action = $action[0];
      //     for ($i=1; $i < count($action); $i++) { 
      //       $this->action .= ucfirst($action[$i]);
      //     }
      //   }

      //   unset($url[0]);
      //   $this->url_params = !empty($url) ? $url : [];
      //   unset($url);
      // }
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
