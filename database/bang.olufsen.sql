-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 07:24 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bang.olufsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Parlante'),
(2, 'Auricular'),
(3, 'Televisor'),
(4, 'Accesorio');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_perfil` int(11) NOT NULL,
  `cliente_apellidos` varchar(30) NOT NULL,
  `cliente_nombres` varchar(30) NOT NULL,
  `cliente_pais` varchar(30) NOT NULL,
  `cliente_provincia` varchar(30) NOT NULL,
  `cliente_ciudad` varchar(30) NOT NULL,
  `cliente_calle` varchar(30) NOT NULL,
  `cliente_altura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_perfil`, `cliente_apellidos`, `cliente_nombres`, `cliente_pais`, `cliente_provincia`, `cliente_ciudad`, `cliente_calle`, `cliente_altura`) VALUES
(13, 1, 'Aguirre', 'Gonzalo Adolfo', 'Argentina', 'Chaco', 'P. R. Sáenz Peña', '9 de Julio', 1449),
(14, 2, 'Bang', 'Peter', 'Dinamarca', 'Jutlandia', 'Struer', 'Fake st.', 123),
(15, 2, 'Olufsen', 'Svend', 'Dinamarca', 'Midtjylland', 'Skive', 'Karup st.', 777);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `compra_id` int(11) NOT NULL,
  `compra_cliente` int(11) NOT NULL,
  `compra_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`compra_id`, `compra_cliente`, `compra_fecha`) VALUES
(12, 14, '2019-06-11'),
(13, 15, '2019-06-11'),
(14, 15, '2019-06-11'),
(15, 13, '2019-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `consulta`
--

CREATE TABLE `consulta` (
  `consulta_id` int(11) NOT NULL,
  `consulta_apellidos` varchar(30) NOT NULL,
  `consulta_nombres` varchar(30) NOT NULL,
  `consulta_email` varchar(50) NOT NULL,
  `consulta_telefono` varchar(20) NOT NULL,
  `consulta_categoria` varchar(10) NOT NULL,
  `consulta_texto` text NOT NULL,
  `consulta_estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consulta`
--

INSERT INTO `consulta` (`consulta_id`, `consulta_apellidos`, `consulta_nombres`, `consulta_email`, `consulta_telefono`, `consulta_categoria`, `consulta_texto`, `consulta_estado`) VALUES
(9, 'Gimenez', 'Daniel', 'daniel@gimenez.com', '0303456', 'envio', 'Con que empresa realizan los envios?', 1),
(10, 'Olufsen', 'Svend', 'svend@bo.com', '6543030', 'envio', 'Cuanto demoran los envios internacionales?', 1),
(11, 'Bang', 'Peter', 'peter@bo.com', '', 'compra', 'Aceptan PayPal?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detallecompra`
--

CREATE TABLE `detallecompra` (
  `detallecompra_compra` int(11) NOT NULL,
  `detallecompra_producto` int(11) NOT NULL,
  `detallecompra_cantidad` int(11) NOT NULL,
  `detallecompra_precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detallecompra`
--

INSERT INTO `detallecompra` (`detallecompra_compra`, `detallecompra_producto`, `detallecompra_cantidad`, `detallecompra_precio`) VALUES
(12, 20, 6, 6000),
(12, 35, 1, 700),
(13, 15, 1, 2750),
(13, 26, 1, 250),
(13, 30, 1, 70),
(14, 28, 1, 7849),
(15, 26, 1, 250);

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `perfil_id` int(11) NOT NULL,
  `perfil_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`perfil_id`, `perfil_nombre`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL,
  `producto_categoria` int(11) NOT NULL,
  `producto_nombre` text NOT NULL,
  `producto_descripcion` text NOT NULL,
  `producto_estado` tinyint(1) NOT NULL,
  `producto_stock` int(11) NOT NULL,
  `producto_precio` float NOT NULL,
  `producto_oferta` float NOT NULL,
  `producto_imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`producto_id`, `producto_categoria`, `producto_nombre`, `producto_descripcion`, `producto_estado`, `producto_stock`, `producto_precio`, `producto_oferta`, `producto_imagen`) VALUES
(15, 1, 'Beoplay A9', 'Belleza y pasión para tu música', 1, 29, 2750, 0, 'beoplay_a9.png'),
(16, 1, 'Beolab 50', 'El futuro del sonido', 1, 30, 3699, 10, 'beolab_50.png'),
(17, 1, 'Beolab 90', 'El sonido como filosofía', 1, 10, 4000, 5, 'beolab_90.png'),
(18, 1, 'Beoplay A1', 'Que no pare la música', 1, 100, 250, 0, 'beoplay_a1.png'),
(19, 1, 'Beoplay P6', 'Portabilidad y potencia sin límites', 1, 60, 400, 0, 'beoplay_p6.png'),
(20, 1, 'Beosound Shape', 'Música que sale de tu pared', 1, 34, 6000, 0, 'beosound_shape.png'),
(21, 1, 'Beosound 2', 'Ponle voz con Asistente de Google', 1, 40, 2000, 0, 'beosound_2.png'),
(22, 2, 'Beoplay E8 Motion', 'Active el movimiento', 1, 45, 350, 0, 'e8.png'),
(23, 2, 'Beoplay H9', 'Sumérgete en el sonido', 1, 33, 500, 0, 'h9.png'),
(24, 2, 'Beoplay H9i', 'Descubra los auriculares supraaurales definitivos', 1, 20, 500, 0, 'h9i.png'),
(25, 2, 'Beoplay H9i RIMOWA', 'Edición limitada exclusiva de Beoplay H9i', 1, 15, 800, 0, 'rimowa.png'),
(26, 2, 'Beoplay E4', 'El poder del silencio', 1, 70, 250, 0, 'e4.png'),
(27, 3, 'Beovision Harmony', 'Deje que despliegue su magia', 1, 3, 9311, 0, 'BeoVisionV300-77-Open-Oak-F0.png'),
(28, 3, 'Beovision Eclipse', 'Sonido artesano y diseño armónico', 1, 6, 7849, 0, 'eclipse-bronze.png'),
(29, 3, 'Beovision Horizon', 'Espacio para el cambio', 1, 10, 6310, 0, 'beovision-horizon-40.png'),
(30, 4, 'Funda para auriculares', 'Compatible con todos los auriculares de B&amp;O', 1, 199, 100, 30, 'headphonebag_natural_hero.png'),
(31, 4, 'Base de carga Beoplay', 'Fácil carga qi inalámbrica', 1, 90, 125, 0, 'charging-pad-indigo-blue-1.png'),
(32, 4, 'Beosound Core', 'El corazón de tu música', 1, 50, 190, 0, 'beosound_core.png'),
(33, 4, 'Soporte de pared para Beosound Edge', 'Un solo producto, ubicación flexible', 1, 90, 325, 50, 'bs_edge_wall.png'),
(34, 4, 'Auriculares derechos para Beoplay', 'Mejor ajuste garantizado', 1, 30, 125, 0, 'e8_2_natural_right_earbud.png'),
(35, 4, 'Beosound Essence Remote', 'Música al alcance de tu mano', 1, 39, 700, 0, 'beosound_essence.png'),
(36, 4, 'Almohadillas Comply Isolation Plus', 'Mejor ajuste garantizado', 1, 200, 25, 0, 'isolation_l_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_cliente` int(11) NOT NULL,
  `usuario_email` varchar(50) NOT NULL,
  `usuario_contraseña` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_cliente`, `usuario_email`, `usuario_contraseña`) VALUES
(10, 13, 'gonza@aguirre.com', 'YWd1aXJyZQ=='),
(11, 14, 'peter@bo.com', 'MTIzNDU2'),
(12, 15, 'svend@bo.com', 'MTIzNDU2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `id_perfil` (`cliente_perfil`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`compra_id`),
  ADD KEY `compra_cliente` (`compra_cliente`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`consulta_id`);

--
-- Indexes for table `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD KEY `detallecompra_compra` (`detallecompra_compra`),
  ADD KEY `detallecompra_producto` (`detallecompra_producto`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`perfil_id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria` (`producto_categoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `id_cliente` (`usuario_cliente`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cliente_perfil`) REFERENCES `perfil` (`perfil_id`);

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`compra_cliente`) REFERENCES `cliente` (`cliente_id`);

--
-- Constraints for table `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`detalleCompra_compra`) REFERENCES `compra` (`compra_id`),
  ADD CONSTRAINT `detallecompra_ibfk_2` FOREIGN KEY (`detalleCompra_producto`) REFERENCES `producto` (`producto_id`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`producto_categoria`) REFERENCES `categoria` (`categoria_id`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usuario_cliente`) REFERENCES `cliente` (`cliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
