<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0cb1f9a0783baf38db93ab5b4974d522
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0cb1f9a0783baf38db93ab5b4974d522::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0cb1f9a0783baf38db93ab5b4974d522::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}