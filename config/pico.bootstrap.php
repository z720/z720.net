<?php
header("X-CMS: PicoCMS");
error_reporting(E_ALL); // no errors in production
date_default_timezone_set('Europe/Paris');

// load dependencies
if (is_file(__DIR__ . '/../vendor/autoload.php')) {
    // composer root package
    require_once(__DIR__ . '/../vendor/autoload.php');
} else {
    die("Cannot find `vendor/autoload.php`. Run `composer install`.");
}

// instance Pico
$pico = new Pico(
    __DIR__ . '/../htdocs/',    // root dir
    __DIR__,  // config dir
    'plugins/', // plugins dir
    'themes/'   // themes dir
);