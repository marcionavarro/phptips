<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/*
 * Controllers
 */
$router->namespace("Source\App");

/**
 * WEB
 * home
 */
$router->group(null);
$router->get("/", "Web:home");
$router->get("/contato", "Web:contact");

/**
 * ERRORS
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");


$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}
