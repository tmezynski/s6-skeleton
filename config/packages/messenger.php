<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Shared\Application\Command\AsyncCommandInterface;
use Shared\Application\Command\SyncCommandInterface;
use Shared\Application\Query\AsyncQueryInterface;
use Shared\Application\Query\SyncQueryInterface;
use Shared\Domain\Event\AsyncEventInterface;
use Shared\Domain\Event\SyncEventInterface;
use Symfony\Config\FrameworkConfig;

return static function(FrameworkConfig $framework): void
{
    $messenger = $framework->messenger();
    $messenger->defaultBus('eventBus');

    $messenger->bus('commandBus');
    $messenger->bus('queryBus');
    $messenger->bus('eventBus')
        ->defaultMiddleware('allow_no_handlers');

    $messenger->transport('sync')->dsn('sync://');
    $messenger->transport('async')->dsn('sync://');

    $messenger->routing(SyncCommandInterface::class)->senders(['sync']);
    $messenger->routing(AsyncCommandInterface::class)->senders(['async']);
    $messenger->routing(SyncQueryInterface::class)->senders(['sync']);
    $messenger->routing(AsyncQueryInterface::class)->senders(['async']);
    $messenger->routing(SyncEventInterface::class)->senders(['sync']);
    $messenger->routing(AsyncEventInterface::class)->senders(['async']);
};
