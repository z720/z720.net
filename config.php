<?php

// Override any of the default settings below:

$config['site_title'] = 'z720.net';			// Site title
//$config['base_url'] = ''; 				// Override base URL (e.g. http://example.com)
$config['theme'] = 'v06'; 			// Set the theme (defaults to "default")
$config['date_format'] = 'd/m/Y';		// Set the PHP date format
$config['twig_config'] = array(			// Twig settings
	'cache' => CACHE_DIR . 'twig',					// To enable Twig caching change this to CACHE_DIR
	'autoescape' => false,				// Autoescape Twig vars
	'debug' => false					// Enable Twig debug
);
$config['pages_order_by'] = 'date';	// Order pages by "alpha" or "date"
$config['pages_order'] = 'desc';			// Order pages "asc" or "desc"
$config['excerpt_length'] = 50;			// The pages excerpt length (in words)

$config['oEmbed_cache_dir'] = CACHE_DIR . 'oEmbed';

// To add a custom config setting:
$config['request_uri'] = $_SERVER['REQUEST_URI'];

/* Local override for env dependent settings (api key...) */
$env_override = '../env.php';
if(file_exists($env_override)) {
	include($env_override);
}
$config['build'] = 'dev';
if ( file_exists('../build') ) {
	$config['build'] = file_get_contents('../build');
}
