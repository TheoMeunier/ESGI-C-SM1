<?php

use Core\Config\ConfigLoader;

function config(string $key): mixed
{
    return ConfigLoader::getInstance()->get($key);
}

function dd(mixed $var): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

function icon(string $iconName): string
{
    $iconPath = "../assets/images/icons/{$iconName}.svg";
    if (file_exists($iconPath)) {
        return file_get_contents($iconPath);
    }

    return '?';
}
