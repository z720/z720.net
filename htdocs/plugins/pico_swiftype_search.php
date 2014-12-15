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
	private $isSearch = false;

	public function config_loaded(&$settings)
	{
		if(isset($settings['swiftype-api-key'])) {
			$this->api_key = $settings['swiftype-api-key'];
		}
		$this->endpoint = 'http://api.swiftype.com/api/v1/engines/z720-dot-net/search.json?&auth_token=%1$s&q=%2$s';
	}

	public function request_url(&$url)
	{
		if(substr($url,-6) == "search"
			&& isset($_GET['q'])
			&& isset($this->api_key)) {
			$this->isSearch = true;
		}
	}

	public function before_render(&$twig_vars, &$twig, &$template)
	{
		if($this->isSearch) {
			$url = sprintf($this->endpoint, $this->api_key, urlencode($_GET['q']));
			$response = file_get_contents($url);
			if($response) {
				$result = json_decode($response, true);
				$twig_vars['search']['count'] = $result['info']['page']['total_result_count'];
				$twig_vars['search']['query'] = $result['info']['page']['query'];
				$twig_vars['search']['results'] = $result['records']['page'];
			}
		}
	}

	public function plugins_loaded()
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

	public function after_render(&$output)
	{

	}

}

?>
