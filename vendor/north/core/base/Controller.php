<?php

namespace north\base;

use north\App;

abstract class Controller
{

    public $route;
    public $controller;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route) {

        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        $this->meta['title'] = App::$app->getProperty('app_name');
        $this->meta['desc'] = App::$app->getProperty('desc');
        $this->meta['keywords'] = App::$app->getProperty('keywords');

    }

    public function getView() {

        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);

    }

    public function set ($data) {

        $this->data = $data;

    }

    // Функция, вызываемая в экшене для установки тайтла (метатеги устанавливаются из конфига)
    public function setTitle ($title = '') {

        $this->meta['title'] = $title;

    }

    // Функция, вызываемая в экшене для установки тайтла и метатегов
    public function setMeta ($title = '', $desc = '', $keywords = '') {

        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;

    }

}