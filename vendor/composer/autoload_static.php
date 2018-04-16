<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6835957bc29912b8a4cd2dd758af2e80
{
    public static $files = array (
        'b0655c4b47b25ec49f0e931fe41ab7a3' => __DIR__ . '/..' . '/phalapi/kernal/src/bootstrap.php',
        '5cab427b0519bb4ddb2f894b03d1d957' => __DIR__ . '/..' . '/phalapi/kernal/src/functions.php',
        'dee36c56d6bb319b2a744b267373bb4b' => __DIR__ . '/../..' . '/src/app/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhalApi\\Task\\' => 13,
            'PhalApi\\QrCode\\' => 15,
            'PhalApi\\NotORM\\' => 15,
            'PhalApi\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhalApi\\Task\\' => 
        array (
            0 => __DIR__ . '/..' . '/phalapi/task/src',
        ),
        'PhalApi\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/phalapi/qrcode/src',
        ),
        'PhalApi\\NotORM\\' => 
        array (
            0 => __DIR__ . '/..' . '/phalapi/notorm/src',
        ),
        'PhalApi\\' => 
        array (
            0 => __DIR__ . '/..' . '/phalapi/kernal/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Resque' => 
            array (
                0 => __DIR__ . '/..' . '/joinleft/php-resque/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6835957bc29912b8a4cd2dd758af2e80::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6835957bc29912b8a4cd2dd758af2e80::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6835957bc29912b8a4cd2dd758af2e80::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
