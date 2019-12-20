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
  #########      PRO PANEL (Section prof)      ############
  /*--------------------------------------------------------*/
    public function log()
    {
        ob_start();
        require "public/panel/login.phtml";
        $output = ob_get_clean();
        require "public/panel/tpl.phtml";
    }
    public function dash()
    {
        ob_start(); 
        require "public/panel/dashbord.phtml";
        $output = ob_get_clean();
        require "public/panel/template.phtml";
    }
    public function cours()
    {
        ob_start();
        if (file_exists(("public/panel/prof-cours.phtml"))) { 
          require "public/panel/prof-cours.phtml";
        } else {
          $this->displayError("La page cours n'existe pas !");
        }
        $output = ob_get_clean();
        require "public/panel/template.phtml";
    }
    public function devoirs()
    {
        ob_start();
        if (file_exists(("public/panel/prof-devoirs.phtml"))) { 
          require "public/panel/prof-devoirs.phtml";
        } else {
          $this->displayError("La page cours n'existe pas !");
        }
        $output = ob_get_clean();
        require "public/panel/template.phtml";
    }

    public function logoutAdmin()
    {
        \App\Session::killSession("uid");
        session_destroy();
        header('location: '.URL.'panel');
    }

  /*--------------------------------------------------------*/
  #########    CLASSROOM PANEL (Section Etudiant)    #########
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

////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////


  /*--------------------------------------------------------*/
  #########    ADMIN PANEL (Section administrateur)    #########
  /*--------------------------------------------------------*/
  public function loginService()
  {
      // ob_start();
      require "public/admin/login.phtml";
      // $output = ob_get_clean();
      // require "puplic/classroom/tpl.phtml";
  }
  public function adDashboard()
  {
      ob_start();
      require "public/admin/dashbord.phtml";
      $output = ob_get_clean();
      require "public/admin/template.phtml";
  }

    public function adThemeFormations()
  {
        ob_start();
        require "public/admin/themes.phtml";
        $output = ob_get_clean();
        require "public/admin/template.phtml";
  }


  public function adFormations()
  {
      ob_start();
      require "public/admin/formations.phtml";
      $output = ob_get_clean();
      require "public/admin/template.phtml";
  }
  public function adFormateurs()
  {
      ob_start();
      require "public/admin/formateurs.phtml";
      $output = ob_get_clean();
      require "public/admin/template.phtml";
  }
  public function adEtudiants()
  {
      ob_start();
      require "public/admin/etudiants.phtml";
      $output = ob_get_clean();
      require "public/admin/template.phtml";
  }
  public function adCompte()
  {
      ob_start();
      require "public/admin/compte.phtml";
      $output = ob_get_clean();
      require "public/admin/template.phtml";
  }
  public function detailFormation()
  {
      ob_start();
      require "public/admin/detail-formation.phtml";
      $output = ob_get_clean();
      require "public/admin/template.phtml";
  }

////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

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

    private function displayError($error_text)
    {
      $html = '<div class="uk-alert uk-alert-danger">
                <p>'.$error_text.'</p>
              </div>';
      echo $html;
    }
}
