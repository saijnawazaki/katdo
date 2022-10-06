<?php
define('APP_PATH', dirname(__FILE__));
require APP_PATH.'/config.php';
require APP_PATH.'/core/function.php';
require APP_PATH.'/core/app.php';

$app = new app();
$app->start();