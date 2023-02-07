<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9d36fc7220a8d0918f59b7ab12abd35
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'ToDo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ToDo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9d36fc7220a8d0918f59b7ab12abd35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9d36fc7220a8d0918f59b7ab12abd35::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite9d36fc7220a8d0918f59b7ab12abd35::$classMap;

        }, null, ClassLoader::class);
    }
}