<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Symfony\Config\DoctrineConfig;

return static function(DoctrineConfig $doctrine): void
{
    $doctrine
        ->dbal()
            ->connection('default')
            ->driver(env('DB_DRIVER'))
            ->host(env('DB_HOST'))
            ->dbname(env('DB_NAME'))
            ->user(env('DB_USER'))
            ->password(env('DB_PASSWORD'))
            ->serverVersion(env('DB_SERVER_VERSION'))
            ->charset(env('DB_CHARSET'));

    $doctrine
        ->orm()
            ->autoGenerateProxyClasses(false)
            ->entityManager('default_entity_manager')
                ->connection('default')
                ->autoMapping(false);

    $doctrine
        ->orm()
            ->defaultEntityManager('default_entity_manager');
};
