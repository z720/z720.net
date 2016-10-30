<?php

include('vendor/autoload.php');

// instance Pico
$pico = new Pico(
    __DIR__,    // root dir
    'config/',  // config dir
    'plugins/', // plugins dir
    'themes/'   // themes dir
);

lookup("htdocs/", $pico);

function lookup($dir, $pico) {
  if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if($file != '.' && $file != '..') {
              if(is_dir($dir . $file)) {
                lookup($dir . $file . "/", $pico);
              } elseif(endsWith($file, '.md')) {
                $rawContent = file_get_Contents($dir.$file);
                try {
                  $pico->parseFileMeta($rawContent, array());
                  //echo "ok: $dir$file \n";
                } catch (Symfony\Component\Yaml\Exception\ParseException $e) {
                  //try to fix
                  $pattern = "/^(\/(\*)|---)[[:blank:]]*(?:\r)?\n(?:(.*?)(?:\r)?\n)?(?(2)\*\/|---)[[:blank:]]*(?:(?:\r)?\n|$)(.*)/s";
                  if (preg_match($pattern, $rawContent, $rawMetaMatches) && isset($rawMetaMatches[3])) {
                    $content = "--- \n";
                    $lines = explode("\n", $rawMetaMatches[3]);
                    $identSize = strlen($lines[0])-strlen(ltrim($lines[0]));
                    foreach($lines as $line) {
                      $content .= substr($line, $identSize) . "\n";
                    }
                    $content .= "--- \n\n";
                    $content .= $rawMetaMatches[4];
                    file_put_contents($dir.$file, $content);
                    echo "Updated: $identSize $dir$file \n";
                  } else {
                    echo "KO: $dir$file \n";
                  }
                }
              } else {
                //echo "Ignored :  $dir$file : type : " . filetype($dir . $file) . "\n";
              }
            }
        }
        closedir($dh);
    }
  }
}

function startsWith($haystack, $needle, $case = true) {
    if ($case) {
        return (strcmp(substr($haystack, 0, strlen($needle)), $needle) === 0);
    }
    return (strcasecmp(substr($haystack, 0, strlen($needle)), $needle) === 0);
}

function endsWith($haystack, $needle, $case = true) {
    if ($case) {
        return (strcmp(substr($haystack, strlen($haystack) - strlen($needle)), $needle) === 0);
    }
    return (strcasecmp(substr($haystack, strlen($haystack) - strlen($needle)), $needle) === 0);
}