<?php

define("DEBUG", 1);
define("PATH", 'http://shop.local');
define("LAYOUT", 'default');

define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/north/core');
define("LIBS", ROOT . '/vendor/north/core/libs');
define("TMP", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';