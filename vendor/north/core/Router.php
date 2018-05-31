<?php


namespace north;


class Router
{

    protected static $routes = []; // Переменная (таблица) хранения роутов приложения
    protected static $route = []; // Переменная хранения текущего роута

    /*
     * Функция добавления роута в таблицу маршрутизации
     */
    public static function add ($regexp, $route = []) {

        self::$routes[$regexp] = $route;

    }

    /*
     * Отладочная функция возвращения всех роутов
     */
    public static function getRoutes() {

        return self::$routes;
    }

    /*
     * Отладочная функция возвращения текущего роута
     */
    public static function getRoute() {

        return self::$route;
    }

    /*
     * Функция %применения действия% при сравнении урл с роутами
     */
    public static function dispatch ($url) {

        if (self::matchRoute($url)) {
            echo 'ok';
        } else {
            echo 'not ok';
        }

    }

    /*
     * Функция сравнения УРЛ с таблицей маршрутизации
     */
    public static function matchRoute ($url) {

        return false;

    }

}