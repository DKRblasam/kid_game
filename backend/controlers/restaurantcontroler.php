<?php
// backend/controllers/RestauranteController.php

class RestauranteController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->prepare("SELECT * FROM RESTAURANTES WHERE id_restaurante = ?");
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
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            // Validación de datos
            if (empty($data['nombre']) || empty($data['direccion'])) {
                echo json_encode(['message' => 'Nombre y dirección son requeridos']);
                return;
            }
            $stmt = $this->pdo->prepare("INSERT INTO RESTAURANTES (nombre, direccion) VALUES (?, ?)");
            $stmt->execute([$data['nombre'], $data['direccion']]);
            echo json_encode(['message' => 'Restaurante creado']);
        } catch (Exception $e) {
            echo json_encode(['message' => 'Error al crear el restaurante: ' . $e->getMessage()]);
        }
    }
}