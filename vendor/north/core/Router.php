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
     * Функция вызова контроллера и метода при сравнении урл с роутами
     */
    public static function dispatch ($url) {

        $url = self::removeQueryString($url); // Удаление гет-параметров из адресной строки

        if (self::matchRoute($url)) { // Если маршрут найден с помощью метода matchRoute

            // Формируем пространство имен контроллера
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

            // Если класс контроллера найден
            if (class_exists($controller)) {

                $controllerObject = new $controller(self::$route); // Создаем обьект контроллера
                $action = self::$route['action'] . 'Action'; // Формируем название метода контроллера

                // Если метод найден в контроллере
                if (method_exists($controllerObject, $action)) {

                    // Вызываем нужный метод и создаем обьект вида
                    $controllerObject->$action();
                    $controllerObject->getView();

                } else {

                    // Если не найден экшн
                    throw new \Exception("Метод $controller::$action не найден", 404);

                }

            } else {

                // Если не найден контроллер
                throw new \Exception("Контроллер $controller не найден", 404);

            }

        } else {

            // Если не найден путь
            throw new \Exception("Страница не найдена", 404);

        }

    }

    /*
     * Функция сравнения УРЛ с таблицей маршрутизации
     */
    public static function matchRoute ($url) {

        // Цикл перебора всех заданных роутов
        foreach (self::$routes as $pattern => $route) {

            // Если роут совпал, помещаем все параметры роута заданные в конфиге в переменную $matches
            if (preg_match("#{$pattern}#", $url, $matches)) {

                // Цикл перебора массива для сохранения только нужных ключей (только строковые)
                foreach ($matches as $k => $v) {

                    if (is_string($k)) {

                        $route[$k] = $v;

                    }

                }

                // Если метод не задан явно, присваиваем ему индексное значение
                if (empty($route['action'])) {

                    $route['action'] = 'index';

                }

                // Если префикс не задан явно, присваиваем ему пустую строку или добавляем обратный слэш, если задан
                if (!isset($route['prefix'])) {

                    $route['prefix'] = '';

                } else {

                    $route['prefix'] .= '\\';

                }

                // Преобразование регистра имен контроллера и метода
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::lowerCamelCase($route['action']);

                // Если роут найден, помещаем его в статическую переменную и возвращаем true
                self::$route = $route;

                return true;

            }

        }

        return false;

    }

    /*
     * Метод для преобразования регистра контроллера
     */
    protected static function upperCamelCase ($str) {

        $str = str_replace('-', ' ', $str);
        $str = ucwords($str);
        $str = str_replace(' ', '', $str);
        return $str;

    }

    /*
     * Метод для преобразования регистра экшена
     */
    protected static function lowerCamelCase ($str) {

        return lcfirst(self::upperCamelCase($str));

    }

    /*
     * Функция удаления гет-параметров из адресной строки
     */
    protected static function removeQueryString ($url) {

        if ($url) {

            $params = explode('&', $url, 2);

            if (false === strpos($params[0], '=')) {

                return rtrim($params[0], '/');

            } else {

                return '';

            }

        }

    }

}