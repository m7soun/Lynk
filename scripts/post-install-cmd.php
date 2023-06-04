<?php

$source = __DIR__ . '/linker';
$destination = dirname(dirname(__DIR__)) . '/linker';

if (!file_exists($destination)) {
    copy($source, $destination);
    chmod($destination, 0755); // Set executable permissions if necessary
    echo 'The linker file has been published to the root of your project.', PHP_EOL;
}
