<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit238c35caec536157a7a1d264402b5ca9
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit238c35caec536157a7a1d264402b5ca9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit238c35caec536157a7a1d264402b5ca9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}