<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd46cf2e9a7a6dedf1b6aef7f7ec33e04
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

        spl_autoload_register(array('ComposerAutoloaderInitd46cf2e9a7a6dedf1b6aef7f7ec33e04', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd46cf2e9a7a6dedf1b6aef7f7ec33e04', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd46cf2e9a7a6dedf1b6aef7f7ec33e04::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
