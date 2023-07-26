<?php

declare(strict_types=1);

use Symfony\Config\MonologConfig;

return static function(MonologConfig $monolog): void
{
    $monolog
        ->handler('main')
        ->type('rotating_file')
        ->path('%kernel.logs_dir%/%kernel.environment%/.log')
        ->filenameFormat('{date}')
        ->maxFiles(10)
        ->level('error');
};
