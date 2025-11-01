-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2025 a las 17:15:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solaria`
--
CREATE DATABASE IF NOT EXISTS `solaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `solaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoriaId` int(11) NOT NULL,
  `nombreCat` varchar(30) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `citaId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `fechaAcordadaCita` datetime DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citastecnicos`
--

CREATE TABLE `citastecnicos` (
  `citaTecnicoId` int(11) NOT NULL,
  `tecnicoId` int(11) NOT NULL,
  `citaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clienteId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `numDocumentoId` char(25) NOT NULL,
  `presupuestoDisp` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesventas`
--

CREATE TABLE `detallesventas` (
  `ventaDetallesId` int(11) NOT NULL,
  `ventaId` int(11) NOT NULL,
  `productoId` int(11) NOT NULL,
  `precioUnit` float(8,2) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `envioId` int(11) NOT NULL,
  `ventaId` int(11) NOT NULL,
  `repartidorId` int(11) NOT NULL,
  `direccionEntrega` varchar(255) DEFAULT NULL,
  `costoEnvio` float(8,2) DEFAULT NULL,
  `fechaPaqueteRecibido` datetime DEFAULT NULL,
  `fechaPaqueteEntregado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `instalacionId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `fechaEstimada` date DEFAULT NULL,
  `ubicacionGeo` char(100) DEFAULT NULL,
  `estado` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacionestecnicos`
--

CREATE TABLE `instalacionestecnicos` (
  `instalacionTecnicoId` int(11) NOT NULL,
  `tecnicoId` int(11) NOT NULL,
  `instalacionId` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `marcaId` int(11) NOT NULL,
  `nombreMarca` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pagoId` int(11) NOT NULL,
  `ventaId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `montoPago` float(8,2) NOT NULL,
  `fechaPago` datetime NOT NULL,
  `estadoPago` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `productoId` int(11) NOT NULL,
  `categoriaId` int(11) NOT NULL,
  `marcaId` int(11) NOT NULL,
  `precioUnitario` decimal(10,0) NOT NULL,
  `tiempoGarantia` varchar(30) DEFAULT NULL,
  `fechaFab` date DEFAULT NULL,
  `existente` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidores`
--

CREATE TABLE `repartidores` (
  `repartidorId` int(11) NOT NULL,
  `nombreRepartidor` char(25) NOT NULL,
  `costoEntrega` float(8,2) DEFAULT NULL,
  `telefono` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rolId` int(11) NOT NULL,
  `rolName` char(15) NOT NULL,
  `rolDesc` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `tecnicoId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `especialidad` char(25) DEFAULT NULL,
  `nivelCategoria` char(25) DEFAULT NULL,
  `fechaContratacion` date DEFAULT NULL,
  `fechaFinContrato` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioId` int(11) NOT NULL,
  `rolId` int(11) NOT NULL,
  `username` char(15) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `pass` char(64) NOT NULL,
  `email` char(25) NOT NULL,
  `telefonoContacto` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ventaId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `direccionEntrega` varchar(255) DEFAULT NULL,
  `fechaVenta` date NOT NULL,
  `fechaEntregaEstimada` date DEFAULT NULL,
  `fechaEnvio` date DEFAULT NULL,
  `total` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoriaId`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`citaId`),
  ADD KEY `fk_clientes_citas` (`clienteId`);

--
-- Indices de la tabla `citastecnicos`
--
ALTER TABLE `citastecnicos`
  ADD PRIMARY KEY (`citaTecnicoId`),
  ADD KEY `fk_citastecnicos_citas` (`citaId`),
  ADD KEY `fk_citastenicos_tecnicos` (`tecnicoId`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clienteId`),
  ADD KEY `fk_clientes_usuarios` (`usuarioId`);

--
-- Indices de la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD PRIMARY KEY (`ventaDetallesId`),
  ADD KEY `fk_detallesventas_productos` (`productoId`),
  ADD KEY `fk_detallesventas_ventas` (`ventaId`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`envioId`),
  ADD KEY `fk_envios_ventas` (`ventaId`),
  ADD KEY `fk_repartidor_envios` (`repartidorId`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`instalacionId`),
  ADD KEY `fk_instalaciones_clientes` (`clienteId`);

--
-- Indices de la tabla `instalacionestecnicos`
--
ALTER TABLE `instalacionestecnicos`
  ADD PRIMARY KEY (`instalacionTecnicoId`),
  ADD KEY `fk_instalacionestecnicos_instalaciones` (`instalacionId`),
  ADD KEY `fk_instalacionestecnicos_tecnicos` (`tecnicoId`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marcaId`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pagoId`),
  ADD KEY `fk_clientes_pagos` (`clienteId`),
  ADD KEY `fk_ventas_pagos` (`ventaId`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productoId`),
  ADD KEY `fk_productos_categorias` (`categoriaId`),
  ADD KEY `fk_productos_marcas` (`marcaId`);

--
-- Indices de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  ADD PRIMARY KEY (`repartidorId`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolId`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`tecnicoId`),
  ADD KEY `fk_tecnicos_usuarios` (`usuarioId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioId`),
  ADD KEY `fk_usuarios_roles` (`rolId`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ventaId`),
  ADD KEY `fk_clientes_ventas` (`clienteId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoriaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `citaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citastecnicos`
--
ALTER TABLE `citastecnicos`
  MODIFY `citaTecnicoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  MODIFY `ventaDetallesId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `envioId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `instalacionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalacionestecnicos`
--
ALTER TABLE `instalacionestecnicos`
  MODIFY `instalacionTecnicoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marcaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pagoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `productoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  MODIFY `repartidorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rolId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `tecnicoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ventaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_clientes_citas` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `citastecnicos`
--
ALTER TABLE `citastecnicos`
  ADD CONSTRAINT `fk_citastecnicos_citas` FOREIGN KEY (`citaId`) REFERENCES `citas` (`citaId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citastenicos_tecnicos` FOREIGN KEY (`tecnicoId`) REFERENCES `tecnicos` (`tecnicoId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_usuarios` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD CONSTRAINT `fk_detallesventas_productos` FOREIGN KEY (`productoId`) REFERENCES `productos` (`productoId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detallesventas_ventas` FOREIGN KEY (`ventaId`) REFERENCES `ventas` (`ventaId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `fk_envios_ventas` FOREIGN KEY (`ventaId`) REFERENCES `ventas` (`ventaId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repartidor_envios` FOREIGN KEY (`repartidorId`) REFERENCES `repartidores` (`repartidorId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `fk_instalaciones_clientes` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `instalacionestecnicos`
--
ALTER TABLE `instalacionestecnicos`
  ADD CONSTRAINT `fk_instalacionestecnicos_instalaciones` FOREIGN KEY (`instalacionId`) REFERENCES `instalaciones` (`instalacionId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_instalacionestecnicos_tecnicos` FOREIGN KEY (`tecnicoId`) REFERENCES `tecnicos` (`tecnicoId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_clientes_pagos` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ventas_pagos` FOREIGN KEY (`ventaId`) REFERENCES `ventas` (`ventaId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`categoriaId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productos_marcas` FOREIGN KEY (`marcaId`) REFERENCES `marcas` (`marcaId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `fk_tecnicos_usuarios` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rolId`) REFERENCES `roles` (`rolId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_clientes_ventas` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO `roles` (`rolId`, `rolName`, `rolDesc`) VALUES (NULL, 'Admin', 'Administrador del sitio'), (NULL, 'Cliente', 'Cliente visitante del sitio');
--INSERT INTO `usuarios` (`usuarioId`, `rolId`, `username`, `nombres`, `apellidos`, `pass`, `email`, `telefonoContacto`) VALUES (NULL, '1', 'Admin', 'Admin', 'Admin', sha2('admin',256), 'admin@admin.com', NULL);
