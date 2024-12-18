<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbcc7c6b555e26c9dbb3e673c2b412790
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

        spl_autoload_register(array('ComposerAutoloaderInitbcc7c6b555e26c9dbb3e673c2b412790', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbcc7c6b555e26c9dbb3e673c2b412790', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbcc7c6b555e26c9dbb3e673c2b412790::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
