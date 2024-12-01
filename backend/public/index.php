<?php
// backend/public/index.php

require_once '../databases/db.php';

header('Content-Type: application/json');

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = explode('/', trim($_SERVER['PATH_INFO'], '/'));

if ($request_uri[0] === 'api' && $request_uri[1] === 'restaurantes') {
    require_once '../controllers/restaurantcontroller.php';
    $controller = new RestauranteController($pdo);
    
    switch ($request_method) {
        case 'GET':
            if (isset($request_uri[2])) {
                $controller->show($request_uri[2]);
            } else {
                $controller->index();
            }
            break;
        case 'POST':
            $controller->store();
            break;
        default:
            http_response_code(405);
            echo json_encode(['message' => 'Método no permitido']);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Ruta no encontrada']);
}