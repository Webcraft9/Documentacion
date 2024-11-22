-- Crear la base de datos
CREATE DATABASE QLOO;
USE QLOO;

-- Tabla Personas
CREATE TABLE Personas (
    persona_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    direccion VARCHAR(255)
);

-- Tabla Administradores
CREATE TABLE Administradores (
    administrador_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Almacena hash de la contraseña
    clave_unica VARCHAR(50) NOT NULL,
    CONSTRAINT fk_persona_administrador FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Usuarios
CREATE TABLE Usuarios (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    password VARCHAR(255) NOT NULL, -- Almacena hash de la contraseña
    CONSTRAINT fk_persona_usuario FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Pilotos
CREATE TABLE Pilotos (
    piloto_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Almacena hash de la contraseña
    clave_unica VARCHAR(50) NOT NULL,
    CONSTRAINT fk_persona_piloto FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Categorias
CREATE TABLE Categorias (
    categoria_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion TEXT
);

-- Tabla Productos
CREATE TABLE Productos (
    producto_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    categoria_id INT,
    precio DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    CONSTRAINT fk_categoria_producto FOREIGN KEY (categoria_id) REFERENCES Categorias(categoria_id)
);

-- Tabla Pedidos
CREATE TABLE Pedidos (
    pedido_id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    piloto_id INT,
    fecha_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR(20) NOT NULL,
    fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_pedido FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id),
    CONSTRAINT fk_piloto_pedido FOREIGN KEY (piloto_id) REFERENCES Pilotos(piloto_id)
);

-- Tabla DetallesPedido
CREATE TABLE DetallesPedido (
    detalle_id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT,
    producto_id INT,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_pedido_detalle FOREIGN KEY (pedido_id) REFERENCES Pedidos(pedido_id),
    CONSTRAINT fk_producto_detalle FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

-- Tabla SeguimientoPedidos
CREATE TABLE SeguimientoPedidos (
    seguimiento_id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT,
    estado_actual VARCHAR(50) NOT NULL,
    fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_pedido_seguimiento FOREIGN KEY (pedido_id) REFERENCES Pedidos(pedido_id)
);

-- Tabla Clientes
CREATE TABLE Clientes (
    cliente_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_persona_cliente FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Ventas
CREATE TABLE Ventas (
    venta_id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    fecha_venta DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_usuario_venta FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id)
);

-- Tabla DetallesVenta
CREATE TABLE DetallesVenta (
    detalle_venta_id INT PRIMARY KEY AUTO_INCREMENT,
    venta_id INT,
    producto_id INT,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2) AS (cantidad * precio) STORED,
    CONSTRAINT fk_venta_detalle FOREIGN KEY (venta_id) REFERENCES Ventas(venta_id),
    CONSTRAINT fk_producto_detalle_venta FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

-- Índices
CREATE INDEX idx_usuario_email ON Usuarios(usuario_id);
CREATE INDEX idx_pedido_usuario ON Pedidos(usuario_id);
CREATE INDEX idx_detalle_pedido ON DetallesPedido(pedido_id);
CREATE INDEX idx_venta_usuario ON Ventas(usuario_id);
CREATE INDEX idx_detalle_venta_venta ON DetallesVenta(venta_id);

-- Trigger para actualizar fecha de modificación en Pedidos
DELIMITER //
CREATE TRIGGER actualizar_fecha_modificacion
BEFORE UPDATE ON Pedidos
FOR EACH ROW
BEGIN
    SET NEW.fecha_actualizacion = NOW();
END //
DELIMITER ;

-- Procedimiento Almacenado para crear un nuevo pedido
DELIMITER //
CREATE PROCEDURE crear_pedido(IN usuarioID INT, IN pilotoID INT, IN productoID INT, IN cantidad INT)
BEGIN
    DECLARE nuevo_pedido_id INT;

    INSERT INTO Pedidos(usuario_id, piloto_id) VALUES (usuarioID, pilotoID);
    SET nuevo_pedido_id = LAST_INSERT_ID();

    INSERT INTO DetallesPedido(pedido_id, producto_id, cantidad, precio)
    VALUES (nuevo_pedido_id, productoID, cantidad, (SELECT precio FROM Productos WHERE producto_id = productoID));
END //
DELIMITER ;

-- Procedimiento Almacenado para registrar una nueva venta
DELIMITER //
CREATE PROCEDURE registrar_venta(IN usuarioID INT, IN productoID INT, IN cantidad INT)
BEGIN
    DECLARE nueva_venta_id INT;
    DECLARE precio_producto DECIMAL(10, 2);

    -- Obtener el precio del producto
    SELECT precio INTO precio_producto FROM Productos WHERE producto_id = productoID;

    -- Insertar la venta en la tabla Ventas
    INSERT INTO Ventas(usuario_id, total) VALUES (usuarioID, (precio_producto * cantidad));
    SET nueva_venta_id = LAST_INSERT_ID();

    -- Insertar los detalles de la venta
    INSERT INTO DetallesVenta(venta_id, producto_id, cantidad, precio)
    VALUES (nueva_venta_id, productoID, cantidad, precio_producto);
END //
DELIMITER ;

-- Insertar datos en la tabla Personas
INSERT INTO Personas (nombre, apellido, telefono, email, direccion) VALUES
('Juan', 'Pérez', '1234567890', 'juan.perez@example.com', 'Calle 1, Ciudad A'),
('Ana', 'García', '2345678901', 'ana.garcia@example.com', 'Calle 2, Ciudad B'),
('Luis', 'Martínez', '3456789012', 'luis.martinez@example.com', 'Calle 3, Ciudad C'),
('María', 'López', '4567890123', 'maria.lopez@example.com', 'Calle 4, Ciudad D'),
('Pedro', 'Hernández', '5678901234', 'pedro.hernandez@example.com', 'Calle 5, Ciudad E'),
('Laura', 'Sánchez', '6789012345', 'laura.sanchez@example.com', 'Calle 6, Ciudad F'),
('José', 'González', '7890123456', 'jose.gonzalez@example.com', 'Calle 7, Ciudad G'),
('Clara', 'Ramírez', '8901234567', 'clara.ramirez@example.com', 'Calle 8, Ciudad H'),
('Carlos', 'Jiménez', '9012345678', 'carlos.jimenez@example.com', 'Calle 9, Ciudad I'),
('Patricia', 'Torres', '0123456789', 'patricia.torres@example.com', 'Calle 10, Ciudad J');

-- Insertar datos en la tabla Administradores
INSERT INTO Administradores (persona_id, username, password, clave_unica) VALUES
(1, 'admin1', 'hashed_password_1', 'unique_key_1'),
(2, 'admin2', 'hashed_password_2', 'unique_key_2'),
(3, 'admin3', 'hashed_password_3', 'unique_key_3'),
(4, 'admin4', 'hashed_password_4', 'unique_key_4'),
(5, 'admin5', 'hashed_password_5', 'unique_key_5'),
(6, 'admin6', 'hashed_password_6', 'unique_key_6'),
(7, 'admin7', 'hashed_password_7', 'unique_key_7'),
(8, 'admin8', 'hashed_password_8', 'unique_key_8'),
(9, 'admin9', 'hashed_password_9', 'unique_key_9'),
(10, 'admin10', 'hashed_password_10', 'unique_key_10');

-- Insertar datos en la tabla Usuarios
INSERT INTO Usuarios (persona_id, password) VALUES
(1, 'hashed_password_1'),
(2, 'hashed_password_2'),
(3, 'hashed_password_3'),
(4, 'hashed_password_4'),
(5, 'hashed_password_5'),
(6, 'hashed_password_6'),
(7, 'hashed_password_7'),
(8, 'hashed_password_8'),
(9, 'hashed_password_9'),
(10, 'hashed_password_10');

-- Insertar datos en la tabla Pilotos
INSERT INTO Pilotos (persona_id, username, password, clave_unica) VALUES
(1, 'pilot1', 'hashed_password_1', 'unique_key_1'),
(2, 'pilot2', 'hashed_password_2', 'unique_key_2'),
(3, 'pilot3', 'hashed_password_3', 'unique_key_3'),
(4, 'pilot4', 'hashed_password_4', 'unique_key_4'),
(5, 'pilot5', 'hashed_password_5', 'unique_key_5'),
(6, 'pilot6', 'hashed_password_6', 'unique_key_6'),
(7, 'pilot7', 'hashed_password_7', 'unique_key_7'),
(8, 'pilot8', 'hashed_password_8', 'unique_key_8'),
(9, 'pilot9', 'hashed_password_9', 'unique_key_9'),
(10, 'pilot10', 'hashed_password_10', 'unique_key_10');

-- Insertar datos en la tabla Categorias
INSERT INTO Categorias (nombre, descripcion) VALUES
('Bebidas', 'Todo tipo de bebidas, gaseosas, jugos, etc.'),
('Hamburguesas', 'Variedad de hamburguesas con diferentes ingredientes.'),
('Pizzas', 'Pizzas de diversos sabores y tamaños.'),
('Aperitivos', 'Snacks y aperitivos como papas fritas y alitas.'),
('Postres', 'Deliciosos postres para complementar la comida.'),
('Ensaladas', 'Ensaladas frescas y saludables.'),
('Desayunos', 'Opciones de desayuno como omelets y pancakes.'),
('Sandwiches', 'Sandwiches variados con diferentes rellenos.'),
('Tacos', 'Tacos de carne, pollo y vegetarianos.'),
('Salsas', 'Salsas y aderezos para acompañar tus comidas.');

-- Insertar datos en la tabla Productos
INSERT INTO Productos (nombre, categoria_id, precio) VALUES
('Coca Cola', 1, 6000.00), -- 1.50 USD
('Hamburguesa Clásica', 2, 23960.00), -- 5.99 USD
('Pizza Pepperoni', 3, 35960.00), -- 8.99 USD
('Papas Fritas', 4, 11960.00), -- 2.99 USD
('Cheesecake', 5, 14000.00), -- 3.50 USD
('Ensalada César', 6, 18000.00), -- 4.50 USD
('Desayuno Continental', 7, 28000.00), -- 7.00 USD
('Sandwich de Pollo', 8, 26000.00), -- 6.50 USD
('Taco de Carne', 9, 10000.00), -- 2.50 USD
('Salsa BBQ', 10, 4800.00); -- 1.20 USD

-- Insertar datos en la tabla Pedidos
INSERT INTO Pedidos (usuario_id, piloto_id, estado) VALUES
(1, 1, 'Pendiente'),
(1, 2, 'Enviado'),
(2, 2, 'Entregado'),
(2, 3, 'Pendiente'),
(3, 3, 'Entregado'),
(4, 4, 'Cancelado'),
(5, 5, 'Pendiente'),
(6, 6, 'Enviado'),
(7, 7, 'Entregado'),
(8, 8, 'Pendiente'),
(1, 9, 'Cancelado'),
(2, 10, 'Pendiente'),
(3, 1, 'Entregado'),
(4, 2, 'Enviado'),
(5, 3, 'Pendiente');

-- Insertar datos en la tabla DetallesPedido
INSERT INTO DetallesPedido (pedido_id, producto_id, cantidad, precio) VALUES
(1, 1, 2, 6000.00),
(1, 2, 1, 23960.00),
(2, 3, 1, 35960.00),
(2, 4, 2, 11960.00),
(3, 5, 1, 14000.00),
(3, 6, 2, 18000.00),
(4, 7, 1, 28000.00),
(5, 8, 1, 26000.00),
(6, 9, 4, 10000.00),
(7, 10, 1, 4800.00),
(8, 1, 2, 6000.00),
(9, 2, 1, 23960.00),
(10, 3, 1, 35960.00);

-- Insertar datos en la tabla Ventas
INSERT INTO Ventas (usuario_id, total) VALUES
(1, 12000.00),
(1, 23960.00),
(2, 35960.00),
(2, 18000.00),
(3, 40000.00),
(4, 35880.00),
(5, 14000.00),
(6, 18000.00),
(7, 28000.00),
(8, 26000.00),
(1, 10000.00),
(2, 4800.00),
(3, 20000.00),
(4, 31000.00),
(5, 39960.00);

-- Insertar datos en la tabla DetallesVenta
INSERT INTO DetallesVenta (venta_id, producto_id, cantidad, precio) VALUES
(1, 1, 2, 6000.00),
(1, 2, 1, 23960.00),
(2, 3, 1, 35960.00),
(2, 4, 3, 11960.00),
(3, 5, 1, 14000.00),
(3, 6, 1, 18000.00),
(4, 7, 1, 28000.00),
(5, 8, 1, 26000.00),
(6, 9, 4, 10000.00),
(7, 10, 1, 4800.00),
(1, 1, 2, 6000.00),
(2, 2, 1, 23960.00),
(3, 3, 1, 35960.00);

-- Consultas

-- Consulta 1: Total de ventas por usuario
SELECT 
    u.usuario_id,
    p.nombre,
    SUM(v.total) AS total_ventas
FROM 
    Usuarios u
JOIN 
    Personas p ON u.persona_id = p.persona_id
JOIN 
    Ventas v ON u.usuario_id = v.usuario_id
GROUP BY 
    u.usuario_id, p.nombre;

-- Consulta 2: Los 5 productos más vendidos
SELECT 
    pr.nombre AS nombre_producto,
    SUM(dv.cantidad) AS total_vendido
FROM 
    DetallesVenta dv
JOIN 
    Productos pr ON dv.producto_id = pr.producto_id
GROUP BY 
    pr.producto_id, pr.nombre
ORDER BY 
    total_vendido DESC
LIMIT 5;  -- Muestra solo los 5 productos más vendidos

-- Consulta 3: Estados de los pedidos de un usuario específico (usuario_id = 1)
SELECT 
    u.usuario_id,
    p.nombre AS nombre_usuario,
    pe.estado
FROM 
    Pedidos pe
JOIN 
    Usuarios u ON pe.usuario_id = u.usuario_id
JOIN 
    Personas p ON u.persona_id = p.persona_id
WHERE 
    u.usuario_id = 1;  -- Cambia el 1 por el ID del usuario deseado

-- Consulta 4: Ingresos totales por categoría
SELECT 
    c.nombre AS nombre_categoria,
    SUM(dv.cantidad * dv.precio) AS ingresos_totales
FROM 
    DetallesVenta dv
JOIN 
    Productos p ON dv.producto_id = p.producto_id
JOIN 
    Categorias c ON p.categoria_id = c.categoria_id
GROUP BY 
    c.categoria_id, c.nombre
ORDER BY 
    ingresos_totales DESC;

-- Consulta 5: Promedio de precio por categoría
SELECT 
    c.nombre AS nombre_categoria,
    AVG(p.precio) AS promedio_precio
FROM 
    DetallesVenta dv
JOIN 
    Productos p ON dv.producto_id = p.producto_id
JOIN 
    Categorias c ON p.categoria_id = c.categoria_id
GROUP BY 
    c.categoria_id, c.nombre;
