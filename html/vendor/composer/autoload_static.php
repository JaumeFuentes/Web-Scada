<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8bfeca7f68e582fce882139528893fca
{
    public static $prefixesPsr0 = array (
        'd' => 
        array (
            'danog\\PHP\\' => 
            array (
                0 => __DIR__ . '/..' . '/danog/phpstruct/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit8bfeca7f68e582fce882139528893fca::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}