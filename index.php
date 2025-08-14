<?php

use Exan\Phprint\HomeController;
use Exan\Phprint\PrintController;
use Exan\Phprint\Services\FileNamingService;
use Exan\Phprint\Services\PrintService;
use Exan\PoopExpress\PoopExpress;

require './vendor/autoload.php';

$router = new PoopExpress($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

$homeController = new HomeController();
$printController = new PrintController(
    new FileNamingService(),
    new PrintService('brother-hl110'),
    __DIR__ . '/uploads'
);

$router->attempt([''], ['GET' => $homeController->index(...)])
    || $router->attempt(['print', 'upload'], ['POST' => $printController->upload(...)]);
