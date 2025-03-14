<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd470121d405ced76c690478b26c5af1c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
            'MVC\\' => 4,
        ),
        'D' => 
        array (
            'DTO\\' => 4,
            'DB\\' => 3,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'MVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'DTO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models/DTO',
        ),
        'DB\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd470121d405ced76c690478b26c5af1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd470121d405ced76c690478b26c5af1c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd470121d405ced76c690478b26c5af1c::$classMap;

        }, null, ClassLoader::class);
    }
}
