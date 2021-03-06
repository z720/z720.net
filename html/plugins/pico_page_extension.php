<?php

/**
 * Example hooks for a Pico plugin
 *
 * @author Gilbert Pellegrom
 * @link http://pico.dev7studios.com
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Page_Extension {

	private $metas = 'template,link,background';

	public function before_read_file_meta(&$headers)
	{
		$headers['link'] = 'Link';
		$headers['background'] = 'Background';
    	$headers['backgroundCredit'] = 'Background-credit';
    	$headers['customCSS'] = 'css';
    	$headers['customJS'] = 'js';
  	}

	public function get_page_data(&$data, $page_meta)
	{
		foreach(explode(',', $this->metas) as $meta) {
			if(isset($page_meta[trim($meta)])) {
				$data[$meta] = $page_meta[$meta];
			}
		}
	}

	public function plugins_loaded()
	{

	}

	public function config_loaded(&$settings)
	{

	}

	public function request_url(&$url)
	{

	}

	public function before_load_content(&$file)
	{

	}

	public function after_load_content(&$file, &$content)
	{

	}

	public function before_404_load_content(&$file)
	{

	}

	public function after_404_load_content(&$file, &$content)
	{

	}

	public function file_meta(&$meta)
	{

	}

	public function before_parse_content(&$content)
	{

	}

	public function after_parse_content(&$content)
	{

	}

	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page)
	{

	}

	public function before_twig_register()
	{

	}

	public function before_render(&$twig_vars, &$twig, &$template)
	{

	}

	public function after_render(&$output)
	{

	}

}

?>
