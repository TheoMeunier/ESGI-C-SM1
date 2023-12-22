<?php

use App\Controllers\AboutUsController;
use App\Controllers\Admin\AdminController;
use App\Controllers\Auth\SecurityController;
use App\Controllers\ContactController;
use App\Controllers\GalleryController;
use App\Controllers\MainController;
use Core\Config\ConfigLoader;
use Core\Router\Router;

require __DIR__.'/../vendor/autoload.php';

// Start read config file
$config = new ConfigLoader();
$config->load();

$router = new Router();

$router->get('/', [MainController::class, 'home']);
$router->get('/contact', [ContactController::class, 'contact']);
$router->get('/a-propos', [AboutUsController::class, 'aboutUs']);
$router->get('/gallery', [GalleryController::class, 'gallery']);
$router->get('/artist', [MainController::class, 'artist']);
$router->get('/template', [MainController::class, 'template']);


$router->get('/login', [SecurityController::class, 'login']);
$router->get('/register', [SecurityController::class, 'register']);
$router->get('/logout', [SecurityController::class, 'logout']);
$router->get('/reset-password', [SecurityController::class, 'resetPassword']);

$router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$router->get('/admin/comments', [AdminController::class, 'comments']);
$router->get('/admin/roles', [AdminController::class, 'roles']);
$router->get('/admin/pages', [AdminController::class, 'pages']);

$router->run();
