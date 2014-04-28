<?php
error_reporting(0); // no errors in production
date_default_timezone_set('Europe/Paris');

define('ROOT_DIR', realpath(dirname(__FILE__).'/../') .'/');
define('CONTENT_DIR', ROOT_DIR . 'public/' );
define('CONTENT_EXT', '.md');
define('LIB_DIR', ROOT_DIR .'vendor/gilbitron/pico/lib/');
define('PLUGINS_DIR', ROOT_DIR .'public/plugins/');
define('THEMES_DIR', ROOT_DIR .'public/themes/');
define('CACHE_DIR', ROOT_DIR .'cache/');

require(ROOT_DIR .'vendor/autoload.php');
require(LIB_DIR .'pico.php');

$pico = new Pico();
