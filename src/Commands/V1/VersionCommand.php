<?php

namespace Lyve\Linker\Commands\V1;

use Composer\Composer;

class VersionCommand
{
    public function execute()
    {
        $version = $this->getPackageVersion();

        $output = <<<EOL
        ****************************************
        *          Linker Version Info          *
        ****************************************
        
        Version: $version
        
        ****************************************
EOL;

        echo $output;
    }

    protected function getPackageVersion(): string
    {
        $composer = new Composer();
        $package = $composer->getPackage();

        return $package->getPrettyVersion();
    }
}
