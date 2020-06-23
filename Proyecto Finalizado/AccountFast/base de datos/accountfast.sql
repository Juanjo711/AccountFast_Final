-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2020 a las 03:52:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accountfast`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `doc_administrador` varchar(20) NOT NULL,
  `nom_administrador` varchar(40) DEFAULT NULL,
  `ape_administrador` varchar(40) DEFAULT NULL,
  `correo_administrador` varchar(80) DEFAULT NULL,
  `clave` varchar(80) DEFAULT NULL,
  `codigo_recuperar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`doc_administrador`, `nom_administrador`, `ape_administrador`, `correo_administrador`, `clave`, `codigo_recuperar`) VALUES
('1', 'Juan', 'Estrada', 'juankomc711@gmail.com', '202cb962ac59075b964b07152d234b70', '57ee9f59b73545e8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id_categoria`, `categoria`, `descripcion`) VALUES
(1, 'Accesorios', 'Accesorios Apple, audifonos, relojes etc.'),
(2, 'Celulares', ''),
(3, 'Computadores', ''),
(4, 'Servicios', 'mantenimiento y garantia de productos'),
(5, 'Ropa', 'Camisas, bozos etc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `doc_cliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_cliente` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tel_cliente` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`doc_cliente`, `nomb_cliente`, `tel_cliente`, `correo_cliente`) VALUES
('032390399', 'Santiago Mesa ', '3234567876', 'santyChon@gmail.com'),
('09382939', 'Erika Espinosa', '3205643423', 'erima2909@outlook.com'),
('34590409', 'Carlos Orjuela', '3205649060', 'ca.orjuela01@gmail.com'),
('78909390', 'Lee Escobar', '3116403990', 'lesgo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_factura`
--

CREATE TABLE `tbl_detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `num_factura` int(10) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `impuesto` float DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_detalle_factura`
--

INSERT INTO `tbl_detalle_factura` (`id_detalle`, `num_factura`, `id_producto`, `cantidad`, `impuesto`, `precio`) VALUES
(2, 1, 1, 2, 5, 535500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `doc_empleado` int(11) NOT NULL,
  `nomb_empleado` varchar(60) DEFAULT NULL,
  `ape_empleado` varchar(60) DEFAULT NULL,
  `tel_empleado` varchar(20) DEFAULT NULL,
  `correo_empleado` varchar(80) DEFAULT NULL,
  `cargo_empleado` varchar(90) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`doc_empleado`, `nomb_empleado`, `ape_empleado`, `tel_empleado`, `correo_empleado`, `cargo_empleado`, `nit`) VALUES
(1001017737, 'Juan', 'Estrada', '3226188241', 'juan@gmail.com', 'Supervisor', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `nit` varchar(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(90) DEFAULT NULL,
  `doc_administrador` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`nit`, `nombre`, `direccion`, `telefono`, `correo`, `doc_administrador`) VALUES
('1', 'Apple', 'CLL 65 # 43 A 227 local 3408', '018000445678', 'AppleColombia@Apple.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura`
--

CREATE TABLE `tbl_factura` (
  `num_factura` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `plazo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `estado` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `subtotal` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `doc_cliente` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_factura`
--

INSERT INTO `tbl_factura` (`num_factura`, `fecha`, `plazo`, `vencimiento`, `estado`, `subtotal`, `descuento`, `total`, `doc_cliente`) VALUES
(1, '2020-05-11', 'De contado', '2020-05-11', 'PAGO', 535500, 10, 481950, '032390399');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gasto`
--

CREATE TABLE `tbl_gasto` (
  `id_gasto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `nit` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `id_producto` int(11) NOT NULL,
  `nomb_producto` varchar(50) DEFAULT NULL,
  `precio_producto` float DEFAULT NULL,
  `cantidad_producto` float DEFAULT NULL,
  `imagen` varchar(90) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`id_producto`, `nomb_producto`, `precio_producto`, `cantidad_producto`, `imagen`, `id_proveedor`, `id_categoria`) VALUES
(1, 'Camisa', 255000, 9, 'camisaAdidas.jpg', 1000190965, 1),
(2, 'Apple Watch', 12000000, 23, '', 1000190965, 1),
(7, 'Buzo Adidas', 149000, 12, 'busoAdidas.jpg', 1000190965, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `tipo_proveedor` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_proveedor` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tel_proveedor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo_proveedor` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_proveedor`
--

INSERT INTO `tbl_proveedor` (`id_proveedor`, `tipo_proveedor`, `nomb_proveedor`, `tel_proveedor`, `correo_proveedor`, `descripcion`) VALUES
(9008493, 'Proveedor de servicios', 'Juan Esteban Carmona', '3205412309', 'Mantenimientosapp@apple.com', 'Encargado de mantenimientos ,garantias y reparaciones de los productos apple\r\n'),
(1000190965, 'Proveedor de productos', 'Juan Pablo Marquez', '3205142068', 'ProductosApp@Apple.com', ' Proveedor de productos oficiales Apple');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`doc_administrador`);

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`doc_cliente`);

--
-- Indices de la tabla `tbl_detalle_factura`
--
ALTER TABLE `tbl_detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `num_factura` (`num_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`doc_empleado`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`nit`),
  ADD KEY `doc_administrador` (`doc_administrador`);

--
-- Indices de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD PRIMARY KEY (`num_factura`),
  ADD KEY `doc_cliente` (`doc_cliente`);

--
-- Indices de la tabla `tbl_gasto`
--
ALTER TABLE `tbl_gasto`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_factura`
--
ALTER TABLE `tbl_detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_gasto`
--
ALTER TABLE `tbl_gasto`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_detalle_factura`
--
ALTER TABLE `tbl_detalle_factura`
  ADD CONSTRAINT `tbl_detalle_factura_ibfk_1` FOREIGN KEY (`num_factura`) REFERENCES `tbl_factura` (`num_factura`),
  ADD CONSTRAINT `tbl_detalle_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tbl_producto` (`id_producto`);

--
-- Filtros para la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD CONSTRAINT `tbl_empleado_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `tbl_empresa` (`nit`);

--
-- Filtros para la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD CONSTRAINT `tbl_empresa_ibfk_1` FOREIGN KEY (`doc_administrador`) REFERENCES `tbl_administrador` (`doc_administrador`);

--
-- Filtros para la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `tbl_cliente` (`doc_cliente`);

--
-- Filtros para la tabla `tbl_gasto`
--
ALTER TABLE `tbl_gasto`
  ADD CONSTRAINT `tbl_gasto_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `tbl_empresa` (`nit`);

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`),
  ADD CONSTRAINT `tbl_producto_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `tbl_proveedor` (`id_proveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
