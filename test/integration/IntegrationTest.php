<?php

declare(strict_types=1);

namespace integration;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @coversNothing
 */
final class IntegrationTest extends KernelTestCase
{
    public function test(): void
    {
        $this->assertTrue(true);
    }
}
