<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 30.05.2018
 * Time: 16:38
 */

namespace north;


trait TSingletone
{

    private static $instance;

    public static function instance() {

        if (self::$instance === null) {

            self::$instance = new self;

        }

        return self::$instance;

    }

}