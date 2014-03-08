<?php 
$pico_rss_class = dirname(__FILE__) . '/../../vendor/z720/Pico-RSS-Plugin/pico_rss/pico_rss.php';
if(!@include($pico_rss_class)) {
	//die("Can't load $pico_rss_class");
}