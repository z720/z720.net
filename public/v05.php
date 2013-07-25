<?php

error_reporting(E_ALL);

$request = $_SERVER["REDIRECT_V05_RES"];
$repository = realpath(dirname(__FILE__).'/../archives/wp');
$location = realpath("$repository/$request");

if(!$location) {
    header("HTTP/1.0 404 Not found");
    die('This resource was not found: '.$request);
}   

if(strncmp($location,$repository,strlen($repository)) != 0) {
    header("HTTP/1.0 400 Bad Request");
    header("Content-Type: text/plain");
    die("You tried to fool me?"/* \n> $location" */);
}

$candidates = glob("$location/_*.v05.json");

if(isset($candidates[0])) {
    $resource = json_decode(file_get_contents($candidates[0]), true);
    include(dirname(__FILE__).'/../templates/v05.php');
} else {
    header("HTTP/1.0 404 Not found");
    die('This resource was not found: '.$request);
}
