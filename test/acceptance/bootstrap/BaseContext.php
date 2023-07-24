<?php

declare(strict_types=1);

namespace acceptance\bootstrap;

use Behat\Behat\Context\Context;

final class BaseContext implements Context
{
    /**
     * @When base context works
     */
    public function contextWork(): void
    {
        // Empty function for testing purposes
    }
}
