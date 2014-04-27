<?php

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

class ExtendedPico extends Pico {

  protected function add_plugin($plugin_name) {
    if(class_exists($plugin_name)){
      $obj = new $plugin_name;
      $this->plugins[] = $obj;
    } else
  }

  protected function load_plugins() {
    self::add_plugin('Pico_oEmbed');
    parent::load_plugins();
  }

}

$pico = new ExtendedPico();
