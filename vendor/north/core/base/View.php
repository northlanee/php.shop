<?php

namespace north\base;

class View
{

    public $route;
    public $controller;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta) {

        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if ($layout === false) $this->layout = false;
        else $this->layout = $layout ?: LAYOUT;

    }

    /*
     * Функция формирования вида запрашиваемой страницы
     */
    public function render ($data) {

        if (is_array($data)) extract($data); // Распаковка массива переданных переменных

        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php"; // Путь к файлу вида

        if (is_file($viewFile)) { // Если файл существует

            ob_start();
            require $viewFile;
            $content = ob_get_clean(); // Заносим в переменную содержание вида

        }
        else throw new \Exception("Не найден вид $viewFile", 500); // Иначе выкидываем исключение

        if (false !== $this->layout) { // Если шаблон необходимо подключить

            $layoutFile = APP . "/views/layouts/{$this->layout}.php";

            if (is_file($layoutFile)) {

                require $layoutFile; // Подключаем шаблон

            }
            else throw new \Exception("Не найден шаблон $layoutFile", 500);

        }

    }

    // Функция для рендера тайтла и метатегов, получаемых по умолчанию или из контроллера
    public function getMeta() {

        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;

    }

}