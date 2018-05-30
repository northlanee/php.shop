<?php
/*
 * Главный класс приложения
 */

namespace north;

class App
{

    public static $app; // Переменная для хранения конфигов приложения

    public function __construct()
    {

        $query = trim($_SERVER['QUERY_STRING'], '/'); // Обрезаем URL от слеша и помещаем в переменную
        session_start(); // Запуск сессии
        self::$app = Registry::instance(); // Создаем обьект реестра через синглтон
        $this->getParams(); // Помещаем параметры из конфига в статическую переменную класса

    }

    /*
     * Метод для заполнения статической переменной класса свойствами из конфига
     */
    protected function getParams() {

        $params = require_once CONFIG . '/params.php';

        if (!empty($params)) {

            foreach ($params as $k => $v) {

                self::$app->setProperty($k, $v);

            }

        }

    }

}