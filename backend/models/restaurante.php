<?php
// backend/models/Restaurante.php

class Restaurante {
    private $id;
    private $nombre;
    private $direccion;

    public function __construct($id, $nombre, $direccion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }
}