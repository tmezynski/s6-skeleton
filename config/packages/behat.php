<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function(ContainerConfigurator $container): void
{
    $services = $container->services();
    $services
        ->load('acceptance\\bootstrap\\', '../../test/acceptance/bootstrap');
};
