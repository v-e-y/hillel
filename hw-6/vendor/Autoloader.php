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

    protected function findClass(string $class): string
    {
        $posToSeparateClassFromPrefix = strrpos($class, '\\');
        $classPrefix = substr($class, 0, $posToSeparateClassFromPrefix);
        $className = substr($class, $posToSeparateClassFromPrefix + 1) . '.php';

        if (
            file_exists($this->prefixes[$classPrefix] . $className) 
            && is_readable($this->prefixes[$classPrefix] . $className)
        ) {
            return $this->prefixes[$classPrefix] . $className;
        } 
    }

    public function register(): void
    {
        spl_autoload_register([$this, 'autoload']);
    }

    public function autoload(string $class): void
    {
        if ($this->findClass($class)) {
            require $this->findClass($class);
        }
    }
}