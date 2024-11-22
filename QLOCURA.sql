-- Crear la base de datos
CREATE DATABASE  QLOCURA;
USE QLOCURA;

-- Tabla Personas
CREATE TABLE   Personas (
    persona_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    direccion VARCHAR(255)
);

-- Tabla Administradores
CREATE TABLE  Administradores (
    administrador_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARBINARY(256),
    clave_unica VARBINARY(256),
    iv VARBINARY(16),
    CONSTRAINT fk_persona_administrador FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Usuarios
CREATE TABLE   Usuarios (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    password VARCHAR(255) NOT NULL, -- Almacena hash de la contraseña
    CONSTRAINT fk_persona_usuario FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Pilotos
CREATE TABLE   Pilotos (
    piloto_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Almacena hash de la contraseña
    clave_unica VARCHAR(50) NOT NULL,
    CONSTRAINT fk_persona_piloto FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Categorias
CREATE TABLE  Categorias (
    categoria_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion TEXT
);

-- Tabla Productos
CREATE TABLE  Productos (
    producto_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    categoria_id INT,
    precio DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    CONSTRAINT fk_categoria_producto FOREIGN KEY (categoria_id) REFERENCES Categorias(categoria_id)
);

-- Tabla Pedidos
CREATE TABLE   Pedidos (
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
CREATE TABLE  DetallesPedido (
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
CREATE TABLE  Clientes (
    cliente_id INT PRIMARY KEY AUTO_INCREMENT,
    persona_id INT,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_persona_cliente FOREIGN KEY (persona_id) REFERENCES Personas(persona_id)
);

-- Tabla Ventas
CREATE TABLE  Ventas (
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
