<?php
namespace App;
//use Libs\panel\MngArticles;
use Core\Libs\MngFormation;
use Core\Libs\MngTheme;

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
      $app = new MngFormation();
      $app_theme = new MngTheme();
      $themes = $app_theme->getActiveThemes();
      $modules = $app->getFormations();
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

  public function detailCours()
  {
    $app = new MngFormation();
      $error = null;
      // var_dump($this->getParams());
      // die();
      if (count($this->getParams()) == 1){
          $id_formation = (int) $this->getParams()[1];
          if ($id_formation > 0) {
              $formation = $app->getCourseDetail($id_formation);
          } else {
              $error = 'paramètre incorrect';
          }
      }else {
          $error = 'paramètre incorrect';
      }
    ob_start();
    require "public/tpl/detail.phtml";
      $output = ob_get_clean();
    require "public/tpl/template.phtml";
  }

  public function inscriptionCours()
  {
    $app = new MngFormation();
      $error = null;
      // var_dump($this->getParams());
      // die();
      if (count($this->getParams()) == 1){
          $id_formation = (int) $this->getParams()[1];
          if ($id_formation > 0) {
              $formation = $app->getCourseDetail($id_formation);
          } else {
              $error = 'paramètre incorrect';
          }
      }else {
          $error = 'paramètre incorrect';
      }
    ob_start();
    require "public/tpl/inscription-cours.phtml";
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
      require "public/classroom/template.phtml";
  }
  public function mesCours()
  {
      ob_start();
      require "public/classroom/cours.phtml";
      $output = ob_get_clean();
      require "public/classroom/template.phtml";
  }
  public function profile()
  {
      ob_start();
      require "public/classroom/profile.phtml";
      $output = ob_get_clean();
      require "public/classroom/template.phtml";
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
      $app = new MngFormation();
      $error = null;
      if (count($this->getParams()) == 1){
          $id_formation = (int) $this->getParams()[2];
          if ($id_formation > 0) {
              $formation = $app->getFormation($id_formation);
          } else {
              $error = 'paramètre incorrect';
          }
      }else {
          $error = 'paramètre incorrect';
      }

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
