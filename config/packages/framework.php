<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function(ContainerConfigurator $container): void
{
    $container->extension(
        'framework',
        [
            'secret' => '%env(APP_SECRET)%',
        ]
    );

    if ('test' === $container->env()) {
        $container->extension(
            'framework',
            [
                'test' => true,
            ]
        );
    }
};
