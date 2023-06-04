<?php

$scriptDir = __DIR__;
$source = realpath($scriptDir . DIRECTORY_SEPARATOR . 'linker');
$destination = dirname(dirname($scriptDir)) . DIRECTORY_SEPARATOR . 'lyve-packages' . DIRECTORY_SEPARATOR . 'packages-tester' . DIRECTORY_SEPARATOR . 'linker';

if (!file_exists($destination)) {
    copy($source, $destination);
    chmod($destination, 0755);
    echo 'The linker file has been published to the root of your project.', PHP_EOL, $destination;
} else {
    echo 'The linker file already exists in the root of your project.', PHP_EOL;
}
