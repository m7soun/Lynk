#!/usr/bin/env php
<?php

if (!defined('DS')) {
    if (DIRECTORY_SEPARATOR === '\\') {
        define('DS', '/');
    } else {
        define('DS', DIRECTORY_SEPARATOR);
    }
}

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'Config' . DS . 'Registries' . DS . 'V1' . DS . 'CommandRegistry.php';

use Lyve\Linker\Commands\Config\Registries\V1\CommandRegistry;
var_dump($argv);
// Get the command and version from the command line
$inputCommandWithVersion = isset($argv[1]) ? $argv[1] : '';
$inputCommandParts = explode(' ', $inputCommandWithVersion);
$command = isset($inputCommandParts[0]) ? $inputCommandParts[0] : '';
$args = array_slice($inputCommandParts, 1);

// Retrieve the available commands from the registry
$commandRegistry = CommandRegistry::getCommands();

// Traverse the commands hierarchy
$currentCommands = $commandRegistry;
foreach (explode(':', $command) as $commandPart) {
    if (isset($currentCommands[$commandPart])) {
        $currentCommands = $currentCommands[$commandPart];
    } else {
        echo "Unknown command or subcommand: '{$command}'\n";
        exit(1);
    }
}

// Execute the final command if it exists for the specified version
$version = isset($args[0]) ? $args[0] : '';
$commandArgs = array_slice($args, 1); // Extract the command arguments

if (isset($currentCommands[$version])) {
    $commandClass = $currentCommands[$version];
    $commandInstance = new $commandClass();
    $commandInstance->execute($commandArgs); // Pass the command arguments
} else {
    echo "Unknown version: '{$version}'\n";
    exit(1);
}
