<?php

use App\Kernel;
putenv("COMPOSER_ALLOW_SUPERUSER=1");
require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
