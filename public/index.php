<?php

require dirname(__DIR__) . '/config/init.php';
require LIBS . '/functions.php';

use north\App;

new App();

debug(App::$app->getProperties());