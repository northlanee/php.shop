<?php

namespace app\controllers;

use app\controllers\AppController;

class MainController extends AppController
{

    public function indexAction() {

        $posts = \R::findAll('test');

        $this->set(compact('posts'));
        $this->setTitle('Главная');

    }

}