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

  /**
   * Déconnecte l'utilisateur de l'application
   */
  /*public function logout()
  {
    \App\Session::killSession("uid");
    session_destroy();
    header('location: '.URL);
  }*/
  /*--------------------------------------------------------*/
  #########             ADMIN PANEL              ############
  /*--------------------------------------------------------*/
    public function dash()
    {
        ob_start();
        require "pg/dashbord.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function account()
    {
        ob_start();
        require "pg/compte.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function signout()
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
