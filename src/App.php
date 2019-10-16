<?php
namespace App;

/**
 *
 */
class App
{

  public static function secure($data)
  {
    $d = htmlentities($data, ENT_QUOTES);
    return $d;
  }
  public static function slug($slug_text)
  {
    $search = array("é","è","ê","ô","î","ï","à","â","ç","ù","'"," ",",",";");
    $replace = array("e","e","e","o","i","i","a","a","c","u","-","-","-","-");
    $transform = str_replace($search, $replace, $slug_text);
    $slug_array = explode(" ", trim($transform));
    $slug = strtolower(implode("-",$slug_array));
    return $slug;
  }
}
