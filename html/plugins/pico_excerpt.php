<?php

/**
 * Build excerpt from the first <hr /> separator if any
 * if not cut to basic word count
 *
 * @author Sebastien Erard
 * @link http://z720.net/
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Excerpt {

	protected function build_excerpt($content, $default) {
		$split = explode('<hr />', $content, 2);
		if(count($split) > 1) {
			return strip_tags($split[0]);
		}
		return $default;
	}

	/// Pico Plugin hooks
	public function get_page_data(&$data, $page_meta)
	{
			if(!array_key_exists('excerpt', $data) && array_key_exists('content', $data)) {
				$data['excerpt'] = $this->build_excerpt($data['content'], array_key_exists('excerpt', $data) ? $data['excerpt'] : '');
			}
	}

}

?>
