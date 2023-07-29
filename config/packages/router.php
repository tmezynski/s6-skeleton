<?php

declare(strict_types=1);

use Symfony\Config\FrameworkConfig;

return static function(FrameworkConfig $framework): void
{
    $router = $framework->router();
    $router->utf8(true);
};
