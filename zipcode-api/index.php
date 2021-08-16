<?php
ob_start();

require_once __DIR__ . '/vendor/autoload.php';

use CoffeeCode\Router\Router;

$route  = new Router('https://localhost/frontend/zipcode-api', ":");
$route->namespace("Source\App\Api");


$route->group("/api");
$route->get("/zipcode/{zipcode}", "Api:index");
$route->post("/zipcode", "Api:zipcode");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();


