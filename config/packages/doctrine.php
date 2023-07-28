<?php

declare(strict_types=1);

use Symfony\Config\DoctrineConfig;

return static function(DoctrineConfig $doctrine): void
{
    $dbal = $doctrine->dbal();

    $dbal->defaultConnection('default');

    $dbal
        ->connection('default')
        ->driver('pdo_pgsql')
        ->host('')
        ->dbname('')
        ->user('')
        ->password('')
        ->serverVersion('')
        ->charset('');

    $orm = $doctrine->orm();
    $orm->defaultEntityManager('default');

    $defaultEm = $orm->entityManager('default');

    $defaultEm
        ->connection('default')
        ->namingStrategy('doctrine.orm.naming_strategy.underscore');

    $defaultEm
        ->resultCacheDriver()
        ->type('pool')
        ->pool('cache.doctrine.default.result');

    $defaultEm
        ->metadataCacheDriver()
        ->type('pool')
        ->pool('cache.doctrine.default.metadata');

    $defaultEm
        ->queryCacheDriver()
        ->type('pool')
        ->pool('cache.doctrine.default.query');
};
