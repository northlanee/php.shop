<?php

namespace north;

use RedBeanPHP\R as R;

class Db
{

    use TSingletone;

    protected function __construct() {

        $db = require_once CONFIG . '/config_db.php'; // Подключение конфига класса БД
        class_alias('\RedBeanPHP\R', 'R'); // Задание алиаса классу РедБин
        \R::setup($db['dsn'], $db['user'], $db['password']); // Установка соединения с базой
        \R::freeze( TRUE );

        if (DEBUG) {

            \R::debug(true, 1);

        }

        if (!\R::testConnection()) {

            throw new \Exception('Нет соединения с БД', 500);

        }

    }

}