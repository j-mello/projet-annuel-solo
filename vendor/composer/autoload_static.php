<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteda476f8689cf76babbede05dcc53647
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteda476f8689cf76babbede05dcc53647::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteda476f8689cf76babbede05dcc53647::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
