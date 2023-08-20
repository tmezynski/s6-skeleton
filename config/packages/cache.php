<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Symfony\Config\FrameworkConfig;

return static function(FrameworkConfig $framework): void
{
    $cache = $framework->cache();
    $cache->directory('%kernel.cache_dir%/pools');
    $cache
        ->pool('cache.doctrine.default.metadata')
        ->adapters('cache.adapter.array');
    $cache
        ->pool('cache.doctrine.default.result')
        ->adapters('cache.adapter.array');
    $cache
        ->pool('cache.doctrine.default.query')
        ->adapters('cache.adapter.array');
};
