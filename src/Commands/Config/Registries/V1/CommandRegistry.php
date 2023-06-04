<?php
// linker/src/CommandRegistry.php

namespace Lyve\Linker\Commands\Config\Registries\V1;

class CommandRegistry
{
    /**
     * Returns an array of available commands.
     *
     * @return array
     */
    public static function getCommands()
    {
        return [
            'publish' => [
                'config' => [
                    'database' => [
                        'v1' => \Lyve\Linker\Commands\V1\PublishConfigDatabaseCommand::class,
                    ],
                ],
            ],
            "version" => \Lyve\Linker\Commands\V1\VersionCommand::class,
            "v" => \Lyve\Linker\Commands\V1\VersionCommand::class,
            "" => \Lyve\Linker\Commands\V1\VersionCommand::class,
            "-v" => \Lyve\Linker\Commands\V1\VersionCommand::class,
        ];
    }
}
