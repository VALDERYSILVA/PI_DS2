<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4d0feab76208bc57c02c3d0ed4a43fea
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit4d0feab76208bc57c02c3d0ed4a43fea', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4d0feab76208bc57c02c3d0ed4a43fea', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4d0feab76208bc57c02c3d0ed4a43fea::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
