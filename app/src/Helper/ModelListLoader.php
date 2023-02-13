<?php

namespace App\Helper;

use ReflectionClass;


/**
 * Class ModelListLoader
 */
class ModelListLoader
{
    private static array $modelsCache = [];

    /**
     * @param string $modelsDir
     * @param string $namespace
     * @param string $interfaces
     *
     * @return array
     */
    public static function load(string $modelsDir, string $namespace, string $interfaces): array
    {
        if (!isset(static::$modelsCache[$namespace])) {
            self::$modelsCache[$namespace] = self::loadModelsInternal($modelsDir, $namespace, $interfaces);
        }

        return self::$modelsCache[$namespace];
    }

    /**
     * @param string $modelsDir
     * @param string $namespace
     * @param string $interfaces
     *
     * @return array
     *
     * @throws
     */
    private static function loadModelsInternal(string $modelsDir, string $namespace, string $interfaces): array
    {
        $modelsPattern = sprintf('%s/*.php', $modelsDir);
        $modelFiles = glob($modelsPattern);
        $classes = array_map(fn($file) => sprintf(
            '%s\%s',
            trim($namespace, '\\'),
            basename($file, '.php')
        ), $modelFiles);

        dd($namespace, $classes);

        $models = [];

        foreach ($classes as $class) {
            $classReflection = new ReflectionClass($class);

            if (!in_array($interfaces, $classReflection->getInterfaceNames()) || $classReflection->isAbstract()) {
                continue;
            }

            $models[] = new $class;
        }

        return $models;
    }
}
