<?php

$packageRootDir = realpath(__DIR__ . '/../..'); // Adjust the path to match the root directory of your package
$source = $packageRootDir . DIRECTORY_SEPARATOR . 'lynk';
$destination = dirname(dirname($packageRootDir)) . DIRECTORY_SEPARATOR . 'lynk';

echo 'Publishing the linker file to the root of your project...', PHP_EOL;
echo 'Source: ', $source, PHP_EOL;
echo 'Destination: ', $destination, PHP_EOL;
echo PHP_EOL;
echo 'If you want to use the linker, you will need to run this script again.', PHP_EOL;

if (!file_exists($destination)) {
    if (copy($source, $destination)) {
        chmod($destination, 0755);
        echo 'The linker file has been published to the root of your project.', PHP_EOL, $destination;
    } else {
        echo 'Failed to copy the linker file.', PHP_EOL;
    }
} else {
    echo 'The linker file already exists in the root of your project.', PHP_EOL;
}
