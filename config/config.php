<?php
/**
 * Pico configuration
 */

/*
 * BASIC
 */
// $config['site_title'] = 'Pico';              // Site title
$config['site_title'] = 'z720.net';			// Site title
// $config['base_url'] = '';                    // Override base URL (e.g. http://example.com)
// $config['rewrite_url'] = null;               // A boolean indicating forced URL rewriting
$config['rewrite_url'] = true;               // A boolean indicating forced URL rewriting

/*
 * THEME
 */
// $config['theme'] = 'default';                // Set the theme (defaults to "default")
$config['theme'] = 'v06'; 			// Set the theme (defaults to "default")
// $config['twig_config'] = array(              // Twig settings
//     'cache' => false,                        // To enable Twig caching change this to a path to a writable directory
//     'autoescape' => false,                   // Auto-escape Twig vars
//     'debug' => false                         // Enable Twig debug
// );
$config['twig_config'] = array(			// Twig settings
	'cache' => '../cache/twig',					// To enable Twig caching change this to CACHE_DIR
	'autoescape' => false,				// Autoescape Twig vars
	'debug' => false					// Enable Twig debug
);

/*
 * CONTENT
 */
// $config['date_format'] = '%D %T';            // Set the PHP date format as described here: http://php.net/manual/en/function.strftime.php
$config['date_format'] = '%d/%m/%Y';		// Set the PHP date format
// $config['pages_order_by'] = 'alpha';         // Order pages by "alpha" or "date"
$config['pages_order_by'] = 'date';	// Order pages by "alpha" or "date"
// $config['pages_order'] = 'asc';              // Order pages "asc" or "desc"
$config['pages_order'] = 'desc';			// Order pages "asc" or "desc"
// $config['content_dir'] = 'content-sample/';  // Content directory
$config['content_dir'] = './';  // Content directory
// $config['content_ext'] = '.md';              // File extension of content files to serve
$config['content_ext'] = '.md';              // File extension of content files to serve

$config['excerpt_length'] = 50;			// The pages excerpt length (in words)

/*
 * TIMEZONE
 */
// $config['timezone'] = 'UTC';                 // Timezone may be required by your php install
$config['timezone'] = 'Europe/Paris';                 // Timezone may be required by your php install

/*
 * PLUGINS
 */
// $config['DummyPlugin.enabled'] = false;      // Force DummyPlugin to be disable
$config['oEmbed_cache_dir'] = '../cache/oEmbed';
$config['index_cache'] = '../cache/index.dat';

/*
 * CUSTOM
 */
// $config['custom_setting'] = 'Hello';         // Can be accessed by {{ config.custom_setting }} in a theme
$config['request_uri'] = $_SERVER['REQUEST_URI'];

/*
 * Env 
 */
/* Local override for env dependent settings (api key...) */
$env_override = '../env.php';
if(file_exists($env_override)) {
	include($env_override);
}
$config['build'] = 'dev';
if ( file_exists('../build') ) {
	$config['build'] = file_get_contents('../build');
}
