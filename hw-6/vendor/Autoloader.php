<?php

declare(strict_types=1);

namespace vendor;

class AutoLoader
{
    protected $prefixes;
    protected $baseDir;

    public function setBaseDir(string $baseDir): void
    {
        $this->baseDir = trim($baseDir, '\\') . DIRECTORY_SEPARATOR;
    }

    public function addNamespase(string $prefix, string $dir): void
    {
        $dir = trim($dir, '\\') . DIRECTORY_SEPARATOR;
        $this->prefixes[$prefix] = $dir;

    }

    public function register()
    {
        spl_autoload_register([$this, 'autoload']);
    }

    // TODO cheange property
    public function findClass(string $class): string
    {
        $posToSeparateClassFromPrefix = strrpos($class, '\\');
        $classPrefix = substr($class, 0, $posToSeparateClassFromPrefix);
        $className = substr($class, $posToSeparateClassFromPrefix + 1) . '.php';

        return $this->prefixes[$classPrefix] . $className;
    }


    public function autoload(string $class): void
    {
        if (file_exists($this->findClass($class)) && is_readable($this->findClass($class))) {
            echo 'required';
            require $this->findClass($class);
        }
    }
}