<?php

/**
 * Example hooks for a Pico plugin
 *
 * @author Gilbert Pellegrom
 * @link http://pico.dev7studios.com
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Swiftype_Search {

	private $api_key;
	private $endpoint;
	private $engine;
	private $isSearch = false;

	public function plugins_loaded()
	{

	}

	public function config_loaded(&$settings)
	{
		$this->api_key = $setting['swiftype-api-key'];
		$this->engine = 'z720-dot-net';
		$this->endpoint = 'http://api.swiftype.com/api/v1/engines/%1$s/search.json?&auth_token=%2$s&q=%3$s';
		
	}

	public function request_url(&$url)
	{
		//substr($url,-7) == "search"
		if(isset($_GET['q'])) {
			$this->isSearch = true;
		}
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

	public function before_read_file_meta(&$headers)
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

	public function get_page_data(&$data, $page_meta)
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
		if($this->isSearch) {
			$url = sprintf($this->endpoint, $this->engine, $this->api_key, urlencode($_GET['q']));
			$response = file_get_contents($url);
			$result = json_decode($response, true);
			//$twig_vars['search_url'] = $url;
			$twig_vars['nb_results'] = $result['info']['page']['total_result_count'];
			$twig_vars['query'] = $result['info']['page']['query'];
			$twig_vars['results'] = $result['records']['page'];
		}
	}

	public function after_render(&$output)
	{

	}

}

?>
