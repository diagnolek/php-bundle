<?php

use App\Kernel;

if (!defined('PATH_CORE')) {
    define('PATH_CORE', dirname(__DIR__));
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
