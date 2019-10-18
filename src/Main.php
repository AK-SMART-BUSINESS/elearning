<?php
namespace App;
//use Libs\panel\MngArticles;

/**
 * Class définissant les actions de l'application
 * Pour définir une nouvelle action:
 *  - Ajouter une méthode avec pour nom l'action appelée dans l'url
 *  - Inclure le fichier à appelé concernat l'action ainsi que le template si défini
 */
class Main
{
  private $action;
  private $params;

  function __construct($action, $url_params)
  {
    $this->action = $action;
    $this->params = $url_params;
  }
  /**
   * Affiche le message d'erreur défini dans l'exception
   */
  private function error($msg)
  {
    ob_start();
      echo "$msg";
    $err_msg = ob_get_clean();
    require "public/tpl/404.phtml";
    exit();
  }
  /**
   * Display homepage
   */
  public function accueil()
  {
    ob_start();
    require "public/tpl/home.phtml";
      $output = ob_get_clean();
    require "public/tpl/template.phtml";
  }

    public function catalogue()
    {
        ob_start();
        require "public/tpl/cours.phtml";
        $output = ob_get_clean();
        require "public/tpl/template.phtml";
    }

  public function inscription()
  {
    ob_start();
    require "public/tpl/register.phtml";
      $output = ob_get_clean();
    require "public/tpl/template.phtml";
  }

  /*--------------------------------------------------------*/
  #########             ADMIN PANEL              ############
  /*--------------------------------------------------------*/
    public function log()
    {
        ob_start();
        require "public/panel/login.phtml";
        $output = ob_get_clean();
        require "public/panel/tpl.phtml";
    }
    public function classroom()
    {
        ob_start();
        require "public/panel/tpl/dashbord.phtml";
        $output = ob_get_clean();
        require "public/panel/tpl/tpl.phtml";
    }

    public function logoutAdmin()
    {
        \App\Session::killSession("uid");
        session_destroy();
        header('location: '.URL.'panel');
    }

  /*--------------------------------------------------------*/
  #########             CLASSROOM PANEL              #########
  /*--------------------------------------------------------*/
  public function connexion()
  {
      // ob_start();
      require "public/classroom/login.phtml";
      // $output = ob_get_clean();
      // require "puplic/classroom/tpl.phtml";
  }
  public function dashboard()
  {
      ob_start();
      require "public/classroom/dashbord.phtml";
      $output = ob_get_clean();
      require "public/classroom/tpl.phtml";
  }




    public function logout()
    {
        \App\Session::killSession("uid");
        session_destroy();
        header('location: '.URL);
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }


}
