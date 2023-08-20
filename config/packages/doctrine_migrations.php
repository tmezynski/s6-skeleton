<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Symfony\Config\DoctrineMigrationsConfig;

return static function(DoctrineMigrationsConfig $migrations): void
{
    $migrations
        ->connection('default')
        ->organizeMigrations(false)
        ->allOrNothing(false)
        ->checkDatabasePlatform(true)
        ->transactional(true);

    $migrations->migrationsPath(
        'Shared\Infrastructure\PgSql\Migration',
        '%kernel.project_dir%/src/Shared/Infrastructure/PgSql/Migration'
    );

    $migrations
        ->storage()
        ->tableStorage()
        ->tableName('migrations');
};
