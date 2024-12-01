// frontend/utils/api/api.js

const API_URL = 'http://localhost/backend/public/index.php'; // Cambia esto por la URL de tu API en producción

export async function fetchRestaurantes() {
    const response = await fetch(`${API_URL}/api/restaurantes`);
    if (!response.ok) {
        throw new Error('Error al obtener restaurantes');
    }
    return response.json();
}

export async function fetchRestaurante(id) {
    const response = await fetch(`${API_URL}/api/restaurantes/${id}`);
    if (!response.ok) {
        throw new Error('Error al obtener el restaurante');
    }
    return response.json();
}

export async function createRestaurante(data) {
    const response = await fetch(`${API_URL}/api/restaurantes`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    });
    if (!response.ok) {
        throw new Error('Error al crear el restaurante');
    }
    return response.json();
}