<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite353a14a8758b5ded4b8deee65bbb1bd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite353a14a8758b5ded4b8deee65bbb1bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite353a14a8758b5ded4b8deee65bbb1bd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite353a14a8758b5ded4b8deee65bbb1bd::$classMap;

        }, null, ClassLoader::class);
    }
}
