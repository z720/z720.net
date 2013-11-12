<?php

/**
 * Read content from archives in JSON
 *
 * @author Sebastien Erard
  * @license http://opensource.org/licenses/MIT
 */
class Pico_v05 {

	private $sideFile = '_post.v05.json';
	private $titleName = 'title';
	private $contentName = 'content:encoded';
	private $dateName = 'pubDate';
	private $prefix = 'v05';

	public function before_load_content(&$file)
	{
		if(!file_exists($file)) {
			$v05file = dirname($file) . '/' . $this->sideFile;
			if(file_exists($v05file)) {
				$file = $v05file;
			}
		}
	}
	
	private function isSideFile($file) {
		return substr($file, -strlen($this->sideFile), strlen($this->sideFile)) == $this->sideFile;
	}
	
	public function after_load_content(&$file, &$content)
	{
		if($this->isSideFile($file)) {
			$json = json_decode($content,true);
			$title = $json[$this->titleName];
			$pubDate = $json[$this->dateName];
			$oldcontent = $json[$this->contentName];
			$content = <<<EOF
/*
 Title: $title
 Date: $pubDate
EOF;
			foreach($json as $meta => $value) {
				if(substr($meta,-7,7) != 'encoded') {
					if(!is_string($value)) {
						$value = json_encode($value);
					}
					$meta = str_replace(':','-', $meta);
					$prefix = $this->prefix;
					$content .= "\n $prefix-$meta: $value";
				}
			}
			$content .= "\n*/\n";
			$content .= $oldcontent;
		}
	}
}

?>