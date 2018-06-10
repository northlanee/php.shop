<?php

namespace north\base;

use north\Db;

abstract class Model
{

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {

        Db::instance(); // Создание обьекта класса Db

    }

}