<?php

namespace app\controllers;

use app\controllers\AppController;

class MainController extends AppController
{

    public function indexAction() {
        
        $this->set(['name' => 'vasya', 'age' => 123]);

    }

}