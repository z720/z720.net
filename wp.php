<?php

$request = $_SERVER['REQUEST_URI'];
$repository = dirname(__FILE__).'/archives/wp';
$location = realpath("$repository/$request");

if(strncmp($location,$repository,strlen($repository)) != 0) {
    header("HTTP/1.0 400 Bad Request");
    die("You tried to fool me? \n".$location);
}

$candidates = glob("$location/_*.v05.json");

print_r($candidates);