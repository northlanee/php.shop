<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite96363576e8b78aefe9e990ece2894a2
{
    public static $prefixLengthsPsr4 = array (
        'n' => 
        array (
            'north\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'north\\' => 
        array (
            0 => __DIR__ . '/..' . '/north',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite96363576e8b78aefe9e990ece2894a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite96363576e8b78aefe9e990ece2894a2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
