<?php
require_once __DIR__."/config/site-config.php";
require_once __DIR__."/vendor/autoload.php";

$app = new \App\Application();
$app->run();