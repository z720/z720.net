<?php

include(__DIR__ . '/../config/pico.bootstrap.php');

// run application
$pico->run();
$index_file = $pico->getRootDir() . $pico->getConfig('index_cache');

file_put_contents($index_file, serialize($pico->getPages()));

header('Content-Type: text/plain');
echo "Reindex: [ok]";
