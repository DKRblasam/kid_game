<?php
// backend/controllers/RestauranteController.php

class RestauranteController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM restaurantes");
        $restaurantes = $stmt->fetchAll();
        echo json_encode($restaurantes);
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM restaurantes WHERE id = ?");
        $stmt->execute([$id]);
        $restaurante = $stmt->fetch();
        echo json_encode($restaurante);
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $this->pdo->prepare("INSERT INTO restaurantes (nombre, direccion) VALUES (?, ?)");
        $stmt->execute([$data['nombre'], $data['direccion']]);
        echo json_encode(['message' => 'Restaurante creado']);
    }
}