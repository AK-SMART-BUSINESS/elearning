<?php
define("URL", str_replace("index.php", "",
    (isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

define('SITE_NAME', "Elearning");