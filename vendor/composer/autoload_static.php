<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitab87da9f51ebdda0aec01033099a17ab
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Symfony\\Component\\ClassLoader' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/class-loader',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitab87da9f51ebdda0aec01033099a17ab::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
