-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2023 a las 06:09:40
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21111118_venta_tres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `direccion_cliente` varchar(64) NOT NULL,
  `telefono_cliente` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `ruc`, `direccion_cliente`, `telefono_cliente`) VALUES
(1, 'Juan Pérez', '12345678901', 'Av. Principal 123', '987654321'),
(2, 'María Gómez', '98765432109', 'Calle Secundaria 456', '912345678'),
(3, 'Carlos Ramírez', '73849572619', 'Urb. Los Pinos 789', '998877665'),
(4, 'Ana López', '45678912304', 'Calle Primera 234', '789456123'),
(5, 'Luis González', '78901234567', 'Calle Principal 789', '745632198'),
(6, 'Elena Vargas', '54637281901', 'Av. Independencia 567', '987654321'),
(7, 'Pedro Rodríguez', '29384756109', 'Calle San Martín 098', '912345678'),
(8, 'Sofía Hernández', '84628374610', 'Urb. Las Rosas 123', '998877665'),
(9, 'Mario García', '92836475804', 'Calle La Paz 456', '789456123'),
(10, 'Laura Díaz', '10345678923', 'Calle Los Álamos 456', '745632198'),
(11, 'Andrés Martínez', '39485729165', 'Av. Los Pájaros 657', '987654321'),
(12, 'Silvia Ríos', '75938475619', 'Calle Las Flores 234', '912345678'),
(13, 'Fernando Silva', '85729364718', 'Urb. Los Laureles 789', '998877665'),
(14, 'Paula Torres', '92834765674', 'Calle Los Olivos 567', '789456123'),
(15, 'Diego Ramírez', '23984756383', 'Av. Los Cerezos 567', '745632198'),
(16, 'Isabel Cordero', '23847619283', 'Calle Los Pinos 456', '987654321'),
(17, 'Oscar Montes', '67192836582', 'Urb. Las Acacias 123', '912345678'),
(18, 'Valentina Paredes', '29384719018', 'Calle Los Cedros 234', '789456123'),
(19, 'Ricardo Morales', '39485756391', 'Calle Los Olivos 456', '998877665'),
(20, 'Carmen Robles', '85927465102', 'Av. Los Jazmines 789', '745632198'),
(29, 'ADMIN', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_venta`, `id_producto`, `cantidad`) VALUES
(1, 5, 1, 12123),
(2, 6, 1, 12123),
(3, 6, 5, 12123),
(4, 7, 8, 3),
(5, 7, 11, 5),
(6, 7, 47, 4),
(7, 8, 1, 12),
(8, 8, 1, 12123),
(9, 1, 5, 5),
(10, 2, 10, 6),
(11, 3, 15, 8),
(12, 4, 20, 3),
(13, 5, 25, 5),
(14, 6, 30, 4),
(15, 7, 35, 9),
(16, 8, 40, 3),
(17, 2, 45, 4),
(18, 3, 50, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `numero_actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `nombre`, `numero_actual`) VALUES
(1, 'Factura', 5),
(2, 'Boleta', 1),
(3, 'Recibo de Pago', 1),
(4, 'Nota de Crédito', 1),
(5, 'Nota de Débito', 1),
(6, 'Guía de Remisión', 1),
(7, 'Orden de Compra', 1),
(8, 'Cotización', 1),
(9, 'Comprobante de Retención', 1),
(10, 'Recibo por Honorarios', 1),
(11, 'Comprobante de Traslado', 1),
(12, 'Boleta de Venta Electrónica', 1),
(13, 'Factura de Venta Electrónica', 1),
(14, 'Ticket de Venta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL,
  `usuario` varchar(32) DEFAULT NULL,
  `contrasena` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `telefono`, `direccion`, `usuario`, `contrasena`) VALUES
(1, 'ADOLFO', '942151641', 'Mariscal Castilla 345', 'Adolfo', '$2y$10$eehIB9vGApP370/VwG/znOI/NY0jLDR5mwTCD.vDYGyZ1Rw64KPDW'),
(2, 'HEIINER', '985214521', 'Avenida Lima 715', 'Heinner', '$2y$10$XYD7AmLq8vqr8n3aP9iSvOh3ADsdRY5A7vpgOiJx4MsS1s1g7naXy'),
(3, 'ADMIN', '987659647', 'AV Parras', 'Admin', '$2y$10$sgOZb3cMVjEVPnpPsvDNAuLKddqJaK4Emxjstod4eMD86dH7hf0Ei');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id`, `nombre`) VALUES
(1, 'Electrónicos'),
(2, 'Ropa'),
(3, 'Abarrotes'),
(4, 'Juguetes'),
(5, 'Hogar'),
(6, 'Calzado'),
(7, 'Belleza'),
(8, 'Deportes'),
(9, 'Mascotas'),
(10, 'Libros'),
(11, 'Muebles'),
(12, 'Computadoras'),
(13, 'Instrumentos Musicales'),
(14, 'Joyería'),
(15, 'Cocina'),
(16, 'Jardín'),
(17, 'Electrodomésticos'),
(18, 'Herramientas'),
(19, 'Oficina'),
(20, 'Salud'),
(21, 'Automotriz'),
(22, 'Bebés'),
(23, 'Bolsos'),
(24, 'Arte'),
(25, 'Cine y TV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `unidad_medida` varchar(15) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `precio_unidad` decimal(10,2) NOT NULL,
  `costo_unidad` decimal(10,2) NOT NULL,
  `id_linea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`, `unidad_medida`, `stock`, `descripcion`, `precio_unidad`, `costo_unidad`, `id_linea`) VALUES
(1, 'Televisor LED 50 pulgadas', 'unidad', 30, 'Televisor LED de 50 pulgadas con resolución Full HD, Smart TV y conexión HDMI.', 1200.50, 900.00, 1),
(2, 'Comedero tradicional para mascotas', 'unidad', 35, 'Comedero para mascotas, especiamente diseñado para perros.', 200.50, 150.00, 9),
(3, 'Smartphone Android', 'unidad', 50, 'Teléfono inteligente con pantalla AMOLED de 6.5 pulgadas, cámara de 48MP y 128GB de almacenamiento.', 500.00, 350.00, 1),
(4, 'Lavadora de carga frontal', 'unidad', 20, 'Lavadora de carga frontal con capacidad para 8 kg y múltiples programas de lavado.', 850.00, 650.00, 3),
(5, 'Pantalones vaqueros', 'unidad', 80, 'Pantalones vaqueros de estilo moderno y cómodo, disponibles en varias tallas.', 39.99, 25.00, 2),
(6, 'Arroz', 'kilogramos', 200, 'Arroz de grano largo, ideal para tus comidas diarias.', 3.00, 2.00, 3),
(7, 'Laptop Windows 10', 'unidad', 40, 'Laptop con procesador Intel Core i5, 8GB de RAM y SSD de 256GB.', 900.00, 650.00, 1),
(8, 'Refrigeradora de dos puertas', 'unidad', 25, 'Refrigeradora con congelador en la parte superior y capacidad de 300 litros.', 750.00, 550.00, 3),
(9, 'Blusas de verano', 'unidad', 120, 'Blusas de verano de tela ligera y transpirable, ideales para días calurosos.', 29.99, 20.00, 2),
(10, 'Frijoles', 'kilogramos', 100, 'Frijoles negros de calidad premium.', 4.00, 3.00, 3),
(11, 'Tablet Android', 'unidad', 60, 'Tablet con pantalla HD de 10 pulgadas, procesador quad-core y almacenamiento de 64GB.', 220.00, 150.00, 1),
(12, 'Microondas digital', 'unidad', 30, 'Microondas digital con múltiples funciones y capacidad de 20 litros.', 120.00, 80.00, 3),
(13, 'Vestidos elegantes', 'unidad', 50, 'Vestidos elegantes y sofisticados para ocasiones especiales.', 69.99, 45.00, 2),
(14, 'Aceite vegetal', 'Litros', 80, 'Aceite vegetal de primera calidad para tus preparaciones.', 10.99, 8.00, 3),
(15, 'Impresora multifuncional', 'unidad', 40, 'Impresora multifuncional con conectividad inalámbrica y función de escaneo.', 150.00, 100.00, 1),
(16, 'Set de bloques de construcción', 'unidad', 100, 'Set de bloques de construcción para niños, con diferentes formas y colores.', 25.99, 15.00, 4),
(17, 'Muñeca de peluche', 'unidad', 80, 'Muñeca de peluche suave y adorable, ideal para regalos.', 12.99, 8.00, 4),
(18, 'Carro de control remoto', 'unidad', 50, 'Carro de control remoto con batería recargable y alta velocidad.', 45.00, 30.00, 4),
(19, 'Juego de sábanas', 'unidad', 120, 'Juego de sábanas suaves y cómodas para cama matrimonial.', 35.99, 25.00, 5),
(20, 'Set de utensilios de cocina', 'unidad', 60, 'Set de utensilios de cocina de acero inoxidable, incluye cucharas, tenedores y cuchillos.', 50.00, 35.00, 5),
(21, 'Almohadas decorativas', 'unidad', 90, 'Almohadas decorativas con diseños modernos para sofás y camas.', 18.99, 12.00, 5),
(22, 'Zapatos deportivos para hombres', 'par', 70, 'Zapatos deportivos cómodos y resistentes para hombres.', 60.00, 40.00, 6),
(23, 'Botas de cuero para mujeres', 'par', 40, 'Botas de cuero elegantes y duraderas para mujeres.', 85.00, 60.00, 6),
(24, 'Zapatillas para niños', 'par', 120, 'Zapatillas cómodas y ligeras para niños, con diseño colorido.', 30.00, 20.00, 6),
(25, 'Set de maquillaje', 'unidad', 50, 'Set de maquillaje completo con paletas de sombras, rubor y labiales.', 40.00, 25.00, 7),
(26, 'Crema hidratante facial', 'unidad', 80, 'Crema hidratante facial para piel seca y sensible.', 15.99, 10.00, 7),
(27, 'Esmalte de uñas', 'unidad', 120, 'Esmalte de uñas en diversos colores y acabados.', 5.99, 3.50, 7),
(28, 'Balón de fútbol', 'unidad', 100, 'Balón de fútbol de cuero resistente y tamaño oficial.', 25.00, 15.00, 8),
(29, 'Raqueta de tenis', 'unidad', 60, 'Raqueta de tenis de alta calidad y diseño ergonómico.', 80.00, 50.00, 8),
(30, 'Mochila deportiva', 'unidad', 40, 'Mochila deportiva con múltiples compartimentos y correa ajustable.', 35.00, 20.00, 8),
(31, 'Comedero automático para mascotas', 'unidad', 30, 'Comedero automático con temporizador para alimentar a tu mascota.', 55.00, 40.00, 9),
(32, 'Juguete interactivo para perros', 'unidad', 80, 'Juguete interactivo para perros con dispensador de premios.', 12.99, 8.50, 9),
(33, 'Rascador para gatos', 'unidad', 50, 'Rascador para gatos con poste y plataforma de descanso.', 30.00, 20.00, 9),
(34, 'Novela de ciencia ficción', 'unidad', 90, 'Novela de ciencia ficción con emocionante trama espacial.', 20.00, 12.00, 10),
(35, 'Libro de cocina internacional', 'unidad', 70, 'Libro de cocina con recetas de diferentes países.', 18.99, 12.50, 10),
(36, 'Libro de poesía', 'unidad', 60, 'Libro de poesía con versos y reflexiones.', 15.00, 9.50, 10),
(37, 'Sofá de tres plazas', 'unidad', 25, 'Sofá cómodo y espacioso para la sala de estar.', 300.00, 220.00, 11),
(38, 'Escritorio de madera', 'unidad', 40, 'Escritorio de madera maciza con cajones y espacio para computadora.', 180.00, 120.00, 11),
(39, 'Mesa de comedor', 'unidad', 30, 'Mesa de comedor con capacidad para seis personas.', 250.00, 180.00, 11),
(40, 'Monitor LED 24 pulgadas', 'unidad', 70, 'Monitor LED de 24 pulgadas con resolución Full HD.', 150.00, 100.00, 12),
(41, 'Teclado inalámbrico', 'unidad', 80, 'Teclado inalámbrico con diseño ergonómico y teclas silenciosas.', 35.00, 25.00, 12),
(42, 'Disco duro externo', 'unidad', 90, 'Disco duro externo de 1TB para almacenar tus archivos.', 60.00, 40.00, 12),
(43, 'Guitarra acústica', 'unidad', 40, 'Guitarra acústica con cuerdas de acero y cuerpo de madera.', 120.00, 80.00, 13),
(44, 'Teclado electrónico', 'unidad', 30, 'Teclado electrónico con teclas sensibles al tacto.', 90.00, 60.00, 13),
(45, 'Batería completa', 'unidad', 20, 'Batería completa con platillos y pedal de bombo.', 350.00, 250.00, 13),
(46, 'Collar de plata', 'unidad', 80, 'Collar de plata con colgante en forma de corazón.', 25.00, 15.00, 14),
(47, 'Anillo de compromiso', 'unidad', 60, 'Anillo de compromiso con diamante y diseño elegante.', 400.00, 280.00, 14),
(48, 'Pulsera de oro', 'unidad', 50, 'Pulsera de oro con eslabones entrelazados.', 150.00, 100.00, 14),
(49, 'Olla a presión', 'unidad', 40, 'Olla a presión de acero inoxidable con capacidad de 5 litros.', 50.00, 35.00, 15),
(50, 'Batidora eléctrica', 'unidad', 30, 'Batidora eléctrica con varias velocidades y accesorios.', 40.00, 25.00, 15),
(51, 'Set de cuchillos de chef', 'unidad', 80, 'Set de cuchillos de chef con bloque de madera.', 60.00, 40.00, 15),
(52, 'Maceta de cerámica', 'unidad', 100, 'Maceta de cerámica para decorar tu jardín.', 20.00, 12.00, 16),
(53, 'Silla plegable para exteriores', 'unidad', 80, 'Silla plegable de aluminio para exteriores.', 18.99, 12.50, 16),
(54, 'Parrilla de carbón', 'unidad', 60, 'Parrilla de carbón para barbacoas y asados.', 80.00, 50.00, 16),
(55, 'Aspiradora sin bolsa', 'unidad', 50, 'Aspiradora sin bolsa con filtro HEPA.', 90.00, 60.00, 17),
(56, 'Licuadora de alta potencia', 'unidad', 30, 'Licuadora con motor de alta potencia y jarra de vidrio.', 55.00, 40.00, 17),
(57, 'Plancha de vapor', 'unidad', 70, 'Plancha de vapor con suela de cerámica.', 30.00, 20.00, 17),
(58, 'Juego de destornilladores', 'unidad', 120, 'Juego de destornilladores con puntas intercambiables.', 25.99, 15.00, 18),
(59, 'Taladro inalámbrico', 'unidad', 80, 'Taladro inalámbrico con batería recargable.', 45.00, 30.00, 18),
(60, 'Caja de herramientas', 'unidad', 60, 'Caja de herramientas con compartimentos para organizar tus herramientas.', 35.00, 20.00, 18),
(61, 'Papel de impresora', 'unidad', 200, 'Papel de impresora de alta calidad tamaño carta.', 10.99, 8.00, 19),
(62, 'Silla de oficina ergonómica', 'unidad', 50, 'Silla de oficina ergonómica con soporte lumbar.', 100.00, 70.00, 19),
(63, 'Calculadora científica', 'unidad', 80, 'Calculadora científica con funciones avanzadas.', 15.99, 10.00, 19),
(64, 'Termómetro digital', 'unidad', 120, 'Termómetro digital para medir la temperatura corporal.', 12.99, 8.50, 20),
(65, 'Botiquín de primeros auxilios', 'unidad', 70, 'Botiquín de primeros auxilios con suministros básicos.', 18.99, 12.00, 20),
(66, 'Báscula digital', 'unidad', 90, 'Báscula digital para medir el peso corporal.', 20.00, 12.00, 20),
(67, 'Llave inglesa ajustable', 'unidad', 100, 'Llave inglesa ajustable para reparaciones automotrices.', 15.00, 9.00, 21),
(68, 'Cargador de batería', 'unidad', 50, 'Cargador de batería automático para vehículos.', 50.00, 35.00, 21),
(69, 'Fundas para asientos', 'unidad', 80, 'Fundas para asientos de automóvil en tela resistente.', 40.00, 25.00, 21),
(70, 'Cuna de madera', 'unidad', 30, 'Cuna de madera con barandas laterales.', 100.00, 70.00, 22),
(71, 'Pañales desechables', 'paquete', 120, 'Pañales desechables para bebés, tamaño recién nacido.', 25.99, 15.00, 22),
(72, 'Biberón con tetina suave', 'unidad', 150, 'Biberón con tetina suave y antifugas.', 8.99, 5.50, 22),
(73, 'Bolso de mano elegante', 'unidad', 90, 'Bolso de mano elegante para ocasiones especiales.', 45.00, 30.00, 23),
(74, 'Mochila escolar', 'unidad', 120, 'Mochila escolar resistente y espaciosa.', 30.00, 20.00, 23),
(75, 'Cartera de cuero', 'unidad', 60, 'Cartera de cuero con múltiples compartimentos.', 25.00, 15.00, 23),
(76, 'Set de pinturas acrílicas', 'unidad', 50, 'Set de pinturas acrílicas de colores variados.', 18.99, 12.50, 24),
(77, 'Caballete de madera', 'unidad', 30, 'Caballete de madera para pintar cuadros.', 25.00, 15.00, 24),
(78, 'Lienzo en blanco', 'unidad', 80, 'Lienzo en blanco para pintura al óleo o acrílica.', 10.00, 6.50, 24),
(79, 'Película en Blu-ray', 'unidad', 120, 'Película en Blu-ray de tu género favorito.', 15.99, 10.00, 25),
(80, 'Televisión 4K', 'unidad', 70, 'Televisión 4K con pantalla de 55 pulgadas.', 600.00, 400.00, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_linea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `id_linea`) VALUES
(1, 'Electronics Supplier Inc.', 1),
(2, 'Fashion World Wholesalers', 2),
(3, 'Grocery Distributors LLC', 3),
(4, 'Home Appliances Depot', 11),
(5, 'Computer Parts Warehouse', 12),
(6, 'Musical Instruments Co.', 13),
(7, 'Jewelry & Gems Wholesale', 14),
(8, 'Kitchen Essentials Ltd.', 15),
(9, 'Tools & Hardware Suppliers', 18),
(10, 'Office Supplies Plus', 19),
(11, 'Healthcare Products Corp.', 20),
(12, 'Automotive Parts Distributors', 21),
(13, 'KARLA', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE `temp` (
  `numero` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`numero`, `id_producto`, `cantidad`) VALUES
(11, 1, 12123),
(12, 1, 12123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_venta` varchar(64) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_documento` int(11) DEFAULT NULL,
  `numero_documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `fecha`, `tipo_venta`, `id_cliente`, `id_empleado`, `id_documento`, `numero_documento`) VALUES
(1, '2023-01-01', 'contado', 1, 1, 1, 1),
(2, '2023-02-15', 'crédito', 2, 1, 2, 2),
(3, '2023-03-20', 'contado', 3, 1, 1, 1),
(4, '2023-04-10', 'contado', 4, 2, 3, 2),
(5, '2023-08-07', 'contado', 1, 2, 1, 1),
(6, '2023-08-07', 'contado', 1, 2, 1, 2),
(7, '2023-08-07', 'contado', 1, 1, 1, 3),
(8, '2023-08-07', 'contado', 1, 2, 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_linea` (`id_linea`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_linea` (`id_linea`);

--
-- Indices de la tabla `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_documento` (`id_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
