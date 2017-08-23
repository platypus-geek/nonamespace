<?php

$dir = '';
$option = getopt('d:');
if (isset($option['d'])) {
    $dir = $option['d'];
}

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach($objects as $name => $object){
    $fileName = $object->getFilename();
    if ($fileName !== '..' && $fileName !== '.' && $object->getExtension() === 'php') {
        $content = file_get_contents($name);
        if (strpos($content, 'namespace') <= 0) {
            echo $name . "\n";
        }

    }
}

?>
