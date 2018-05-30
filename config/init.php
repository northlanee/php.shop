<?php

define("DEBUG", 1);
define("PATH", 'shop.local');
define("LAYOUT", 'default');

define("ROOT", dirname(__DIR__));
define("WWW", dirname(ROOT . '/public'));
define("APP", dirname(ROOT . '/app'));
define("CORE", dirname(ROOT . '/vendor/north/core'));
define("LIBS", dirname(ROOT . '/vendor/north/libs'));
define("TMP", dirname(ROOT . '/tmp/cache'));
define("CONFIG", dirname(ROOT . '/config'));
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';