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

function envAsset(): string
{
    $manifest = json_decode(file_get_contents('./../public/build/manifest.json'), true);
    $css      = $manifest['assets/js/app.css']['file'];
    $js       = $manifest['assets/js/app.js']['file'];

    if (config('app.env') === 'dev') {
        return <<<HTML
            <script type="module" src="http://localhost:5173/assets/js/app.js"></script>
            <script type="module" src="http://localhost:5173/@vite/client"></script>
        HTML;
    }

    return <<<HTML
            <link rel="stylesheet" href="./../build/{$css}">
            <script src="./../build/{$js}"></script>
        HTML;
}
