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
        session_start();
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

      // Partie enseignant
      if (isset($_GET["url"]) && preg_match('/panel/', $_GET["url"])) {
        
        if (!isset($_SESSION['frm_uid'])) {
          $this->action = "log";
        }else {
          $url = trim($this->url,'/');
          $url = explode('/', $url);
          unset($url[0]);
          if (empty($url)) {
            $this->action = "dash";
          }else {
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
          }
          
          unset($url[1]);
          $this->url_params = !empty($url) ? $url : [];

          unset($url);
        }
      }
      // Partie étudiant
      elseif (isset($_GET["url"]) && preg_match('/classroom/', $_GET["url"]) ) {
        if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
            $url = trim($this->url,'/');
            $url = explode('/', $url);
            unset($url[0]);
            if (empty($url)) {
                $this->action = "dashboard";
            }else {
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
            }

            unset($url[1]);
            $this->url_params = !empty($url) ? $url : [];

            unset($url);

        }else {
            $this->action = "connexion";
        }
      }
      // Partie administrateur
      elseif (isset($_GET["url"]) && preg_match('/admin/', $_GET["url"]) ) {
//        if (isset($_SESSION['admin_uid']) && !empty($_SESSION['admin_uid'])) {
//            $url = trim($this->url,'/');
//            $url = explode('/', $url);
//            unset($url[0]);
//            if (empty($url)) {
//                $this->action = "ad-dashboard";
//            }else {
//                $action = $url[1];
//
//                $action = explode('-',$action);
//
//                if (count($action) == 1) {
//                    $this->action = $action[0];
//                }else {
//                    $this->action = $action[0];
//                    for ($i=1; $i < count($action); $i++) {
//                        $this->action .= ucfirst($action[$i]);
//                    }
//                }
//            }
//
//            unset($url[1]);
//            $this->url_params = !empty($url) ? $url : [];
//
//            unset($url);
//
//        }else {
////            $this->action = "loginService";
//            header('location: '.URL.'admin/loginService');
//        }
          if (!isset($_SESSION['admin_uid'])) {
              $this->action = "loginService";
//              header('location:'.URL.'admin-login.php');
          }else {
              $url = trim($this->url,'/');
              $url = explode('/', $url);

              unset($url[0]);

              if (count($url) == 0) {
                  $this->action = "adDashboard";
              }else {
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
              }

              unset($url[1]);
              $this->url_params = !empty($url) ? $url : [];

              unset($url);
          }
      }
      // Partie publique
      else {
        if ($this->url == "") {
          $this->action = "accueil";  
        }else {
          $url = trim($this->url,'/');
          $url = explode('/', $url);
          //unset($url[0]);
          
          $action = $url[0];
          unset($url[0]);
          $action = explode('-',$action);
                  
          if (count($action) == 1) {
            $this->action = $action[0];
            //var_dump($this->action);
          }else {
            $this->action = $action[0];
            for ($i=1; $i < count($action); $i++) { 
            $this->action .= ucfirst($action[$i]);
          }
        }
        unset($url[0]);
        //unset($url[1]);
        $this->url_params = !empty($url) ? $url : [];
        unset($url);
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
      // echo $this->action;
      // die();
        try {
          if (method_exists("App\Main", $this->action)) {
            // echo $action = $this->action;
            // die();
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

    public function getUrlParams()
    {
        return $this->url_params;
    }
}
