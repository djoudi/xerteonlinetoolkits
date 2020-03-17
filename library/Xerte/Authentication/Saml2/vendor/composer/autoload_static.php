<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc9847c6bbda82ac6c894cea5214963f
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RobRichards\\XMLSecLibs\\' => 23,
        ),
        'O' => 
        array (
            'OneLogin\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RobRichards\\XMLSecLibs\\' => 
        array (
            0 => __DIR__ . '/..' . '/robrichards/xmlseclibs/src',
        ),
        'OneLogin\\' => 
        array (
            0 => __DIR__ . '/..' . '/onelogin/php-saml/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc9847c6bbda82ac6c894cea5214963f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc9847c6bbda82ac6c894cea5214963f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}