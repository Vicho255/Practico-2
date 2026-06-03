CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

-- Datos de ejemplo
INSERT INTO items (name, description) VALUES
('Ejemplo 1', 'Primer registro de prueba'),
('Ejemplo 2', 'Segundo registro de prueba');