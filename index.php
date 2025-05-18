<?php

use App\Controller\OrderController;
use App\Http\Response;
use App\Http\Http;
use App\Http\Request;
use App\Repository\OrderRepository;
use App\Service\OrderService;
use App\Validator\OrderValidator;
use Nyholm\Psr7\Factory\Psr17Factory;

require_once __DIR__ . '/vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($uri !== '/order' || $method !== 'POST') {
    Response::error('Not Found', Http::NOT_FOUND);
    exit;
}

$input = json_decode(
    json: file_get_contents(filename: 'php://input'),
    associative: true
);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($input)) {
    Response::error(message: 'Invalid JSON');
    exit;
}

$factory = new Psr17Factory();
$request = new Request(
    uri: $factory->createUri($uri),
    body: $factory->createStreamFromFile(filename: 'php://input')
);

try {
    $orderValidator = new OrderValidator();
    $orderRepository = new OrderRepository();
    $orderService = new OrderService($orderRepository);
    $controller = new OrderController($orderValidator, $orderService);

    $controller($request);
} catch (Throwable $e) {
    Response::error(
        message: 'Server Error: ' . $e->getMessage(),
        status: Http::INTERNAL_SERVER_ERROR
    );
}
