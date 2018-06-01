<?php

require dirname(__DIR__) . '/config/init.php';
require LIBS . '/functions.php';
require CONFIG . '/routes.php'; // Формируем таблицу роутов приложения

use north\App;

new App();