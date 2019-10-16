<?php
namespace App;

class Session
{
  private static $uid;
  private static $sessions;

  public static function initSession()
  {
    session_start();
  }
  public static function sessionExist()
  {
    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
      return true;
    }else {
      return false;
    }
  }

  public static function createSession($session_data = array())
  {
    foreach ($session_data as $key => $value) {
      $_SESSION[$key] = $value;
    }
  }

  public static function session($session_key)
  {
    if (array_key_exists($session_key, $_SESSION)) {
      return $_SESSION[$session_key];
    }else {
      return false;
    }
  }

  public function killAllSession()
  {
    unset($_SESSION);
  }

  public function killSession($session_key)
  {
    unset($_SESSION[$session_key]);
  }
}
