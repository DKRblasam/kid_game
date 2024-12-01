<?php
// backend/models/Plato.php

class Plato {
    private $id;
    private $nombre;
    private $precio;
    private $restaurante_id;

    public function __construct($id, $nombre, $precio, $restaurante_id) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->restaurante_id = $restaurante_id;
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getRestauranteId() {
        return $this->restaurante_id;
    }
}