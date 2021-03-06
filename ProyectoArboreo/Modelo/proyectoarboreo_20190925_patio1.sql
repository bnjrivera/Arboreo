-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2019 a las 07:41:29
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoarboreo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id_especie` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `nom_comun` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nom_cientifico` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipoespecie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id_especie`, `nom_comun`, `nom_cientifico`, `id_tipoespecie`) VALUES
('ACA_JAP', 'Acasia Japónica', NULL, 1),
('AIL', 'Ailantus', 'Ailanthus altissima', 1),
('ARA_AU', 'Araucaria Australiana', NULL, 1),
('ARC_CO', 'Arce Común', 'Acer campestre', 1),
('CAS', 'Casuarina', NULL, 1),
('CED', 'Cedro', NULL, 1),
('CEL', 'Celtis', NULL, 1),
('CIP_ME', 'Ciprés Mediterráneo', NULL, 1),
('CIR_CO', 'Ciruelo Común', NULL, 1),
('COT_NA', 'Coto Nadester', NULL, 1),
('EUC', 'Eucalipto', 'Eucalyptus', 1),
('FAL_AC', 'Falsa Acacia', 'Robinia pseudoacacia', 1),
('FUJ', 'Fuja', NULL, 1),
('GRA', 'Granado', NULL, 1),
('JAB_CH', 'Jabonero Chino', NULL, 1),
('JAC', 'Jacaranda', NULL, 1),
('LIG', 'Ligustro', NULL, 1),
('MAG', 'Magnolio', NULL, 1),
('MOR', 'Morera', NULL, 1),
('NAR', 'Naranjo', NULL, 1),
('NIS', 'Níspero', NULL, 1),
('OLI', 'Olivo', NULL, 1),
('PAL', 'Palqui', NULL, 1),
('PAL_CA', 'Palmera Canaria', NULL, 1),
('PAL_VE', 'Palo Verde', NULL, 1),
('PEU_EX', 'Peumo Extranjero', NULL, 1),
('PIM_BO', 'Pimiento Boliviano', NULL, 1),
('ROB_AU', 'Roble Australiano', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Malo'),
(2, 'Regular'),
(3, 'Bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observaciones` int(11) NOT NULL,
  `observaciones` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observaciones`, `observaciones`) VALUES
(1, 'Clorosis'),
(2, 'Control Rebrotes'),
(3, 'Copa Caída'),
(4, 'Defoliación'),
(5, 'Despejar'),
(6, 'Enredadera'),
(7, 'Extracción'),
(8, 'Exudación'),
(9, 'Fumigar'),
(10, 'Ganchos Secos'),
(11, 'Herbicida'),
(12, 'Hongos'),
(13, 'Mejorar Suelo'),
(14, 'Monitoreo'),
(15, 'Patogeos'),
(16, 'Raleo Copa'),
(17, 'Seco'),
(18, 'Sombra'),
(19, 'Zona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patio`
--

CREATE TABLE `patio` (
  `id_patio` int(11) NOT NULL,
  `n_patio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `patio`
--

INSERT INTO `patio` (`id_patio`, `n_patio`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `propiedad` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `propiedad`) VALUES
(1, 'Cementerio'),
(2, 'Sepultura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `n_registro` int(11) NOT NULL,
  `id_registro` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_patio` int(11) NOT NULL,
  `id_especie` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `longitud` decimal(8,6) NOT NULL,
  `latitud` decimal(8,6) NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `dap_cm` double(5,1) NOT NULL,
  `altura_m` double(5,1) NOT NULL,
  `radio_m` double(5,1) NOT NULL,
  `id_tipopoda` int(11) NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `id_observaciones` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`n_registro`, `id_registro`, `id_patio`, `id_especie`, `longitud`, `latitud`, `id_propiedad`, `id_estado`, `dap_cm`, `altura_m`, `radio_m`, `id_tipopoda`, `id_tratamiento`, `id_observaciones`, `fecha`) VALUES
(1, 'FAL_AC_1_1', 1, 'FAL_AC', '-70.651817', '-33.417474', 1, 3, 26.0, 6.0, 1.5, 3, 4, 14, '2019-09-25 02:33:51'),
(2, 'FAL_AC_1_2', 1, 'FAL_AC', '-70.651982', '-33.417384', 2, 3, 44.0, 6.0, 4.0, 3, 4, 14, '2019-09-25 02:33:51'),
(3, 'FAL_AC_1_3', 1, 'FAL_AC', '-70.651925', '-33.417362', 1, 3, 25.0, 8.0, 1.0, 3, 10, 8, '2019-09-25 02:33:51'),
(4, 'PIM_BO_1_4', 1, 'PIM_BO', '-70.651843', '-33.417369', 1, 3, 40.0, 7.0, 3.0, 3, 10, 6, '2019-09-25 02:33:51'),
(5, 'CAS_1_5', 1, 'CAS', '-70.652131', '-33.417286', 1, 2, 35.0, 9.0, 1.5, 3, 12, 14, '2019-09-25 02:33:51'),
(6, 'CAS_1_6', 1, 'CAS', '-70.652105', '-33.417321', 1, 2, 10.0, 4.0, 1.0, 1, 6, 14, '2019-09-25 02:33:51'),
(7, 'CIP_ME_1_7', 1, 'CIP_ME', '-70.651984', '-33.417361', 1, 3, 34.0, 7.0, 1.5, 3, 10, 8, '2019-09-25 02:33:51'),
(8, 'NAR_1_8', 1, 'NAR', '-70.652081', '-33.417410', 1, 3, 32.0, 9.0, 2.0, 3, 10, 6, '2019-09-25 02:33:51'),
(9, 'CIP_ME_1_9', 1, 'CIP_ME', '-70.652149', '-33.417327', 1, 3, 2.0, 1.8, 0.2, 4, 7, 19, '2019-09-25 02:33:51'),
(10, 'CIP_ME_1_10', 1, 'CIP_ME', '-70.652152', '-33.417371', 1, 3, 12.0, 3.0, 1.5, 3, 10, 9, '2019-09-25 02:33:51'),
(11, 'ACA_JAP_1_11', 1, 'ACA_JAP', '-70.651950', '-33.417275', 2, 3, 22.0, 7.0, 1.0, 3, 4, 14, '2019-09-25 02:33:51'),
(12, 'FAL_AC_1_12', 1, 'FAL_AC', '-70.651950', '-33.417271', 2, 3, 24.0, 6.0, 0.5, 4, 13, 4, '2019-09-25 02:33:52'),
(13, 'PIM_BO_1_13', 1, 'PIM_BO', '-70.651831', '-33.417294', 2, 3, 30.0, 7.0, 1.0, 3, 10, 10, '2019-09-25 02:33:52'),
(14, 'PIM_BO_1_14', 1, 'PIM_BO', '-70.651881', '-33.417266', 2, 3, 37.0, 7.0, 1.5, 1, 10, 2, '2019-09-25 02:33:52'),
(15, 'FAL_AC_1_15', 1, 'FAL_AC', '-70.651763', '-33.417293', 2, 3, 4.0, 3.5, 0.5, 4, 11, 7, '2019-09-25 02:33:52'),
(16, 'CEL_1_16', 1, 'CEL', '-70.651778', '-33.417255', 2, 3, 40.0, 7.0, 2.0, 3, 10, 2, '2019-09-25 02:33:52'),
(17, 'PAL_CA_1_17', 1, 'PAL_CA', '-70.651794', '-33.417241', 2, 3, 10.0, 0.5, 0.5, 4, 7, 7, '2019-09-25 02:33:52'),
(18, 'CIP_ME_1_18', 1, 'CIP_ME', '-70.651882', '-33.417238', 1, 2, 3.0, 0.5, 0.5, 4, 13, 14, '2019-09-25 02:33:52'),
(19, 'LIG_1_19', 1, 'LIG', '-70.652090', '-33.417266', 2, 2, 10.0, 0.5, 0.5, 4, 7, 14, '2019-09-25 02:33:52'),
(20, 'JAC_1_20', 1, 'JAC', '-70.652001', '-33.417309', 1, 3, 2.0, 1.5, 0.2, 4, 7, 14, '2019-09-25 02:33:52'),
(21, 'CIP_ME_1_21', 1, 'CIP_ME', '-70.652006', '-33.417326', 1, 3, 14.0, 3.5, 1.5, 2, 5, 18, '2019-09-25 02:33:52'),
(22, 'ARC_CO_1_22', 1, 'ARC_CO', '-70.651973', '-33.417251', 1, 2, 18.0, 3.5, 1.5, 2, 5, 18, '2019-09-25 02:33:52'),
(23, 'CIP_ME_1_23', 1, 'CIP_ME', '-70.651905', '-33.417191', 1, 3, 7.0, 3.0, 1.5, 2, 11, 14, '2019-09-25 02:33:52'),
(24, 'FAL_AC_1_24', 1, 'FAL_AC', '-70.652002', '-33.417172', 1, 3, 43.0, 9.0, 1.5, 1, 6, 14, '2019-09-25 02:33:52'),
(25, 'CIP_ME_1_25', 1, 'CIP_ME', '-70.652037', '-33.417154', 1, 3, 29.0, 7.0, 1.0, 1, 6, 3, '2019-09-25 02:33:52'),
(26, 'CIR_CO_1_26', 1, 'CIR_CO', '-70.652092', '-33.417158', 1, 3, 9.0, 3.2, 0.5, 1, 6, 5, '2019-09-25 02:33:53'),
(27, 'CIR_CO_1_27', 1, 'CIR_CO', '-70.652097', '-33.417187', 1, 3, 4.0, 2.0, 0.5, 2, 5, 14, '2019-09-25 02:33:53'),
(28, 'CAS_1_28', 1, 'CAS', '-70.652172', '-33.417280', 1, 2, 3.0, 1.8, 0.5, 2, 5, 2, '2019-09-25 02:33:53'),
(29, 'CAS_1_29', 1, 'CAS', '-70.652155', '-33.417259', 1, 2, 3.0, 2.2, 0.1, 4, 13, 14, '2019-09-25 02:33:53'),
(30, 'CAS_1_30', 1, 'CAS', '-70.651847', '-33.417140', 1, 3, 7.0, 4.0, 0.5, 1, 6, 5, '2019-09-25 02:33:53'),
(31, 'AIL_1_31', 1, 'AIL', '-70.651793', '-33.417050', 2, 3, 3.0, 2.0, 1.5, 2, 5, 16, '2019-09-25 02:33:53'),
(32, 'AIL_1_32', 1, 'AIL', '-70.651808', '-33.417031', 2, 3, 3.0, 2.5, 2.0, 2, 5, 2, '2019-09-25 02:33:53'),
(33, 'AIL_1_33', 1, 'AIL', '-70.651747', '-33.416963', 2, 3, 22.0, 6.0, 1.5, 3, 10, 10, '2019-09-25 02:33:53'),
(34, 'CIR_CO_1_34', 1, 'CIR_CO', '-70.651753', '-33.416990', 1, 2, 10.0, 4.0, 1.0, 3, 10, 10, '2019-09-25 02:33:53'),
(35, 'CIR_CO_1_35', 1, 'CIR_CO', '-70.651749', '-33.416928', 1, 1, 4.0, 2.5, 2.0, 3, 10, 2, '2019-09-25 02:33:54'),
(36, 'JAC_1_36', 1, 'JAC', '-70.651960', '-33.417029', 1, 3, 22.0, 3.5, 1.0, 3, 1, 1, '2019-09-25 02:33:54'),
(37, 'PAL_VE_1_37', 1, 'PAL_VE', '-70.651879', '-33.417050', 1, 2, 33.0, 7.0, 2.0, 3, 10, 6, '2019-09-25 02:33:54'),
(38, 'FAL_AC_1_38', 1, 'FAL_AC', '-70.651904', '-33.417069', 2, 1, 17.0, 4.5, 1.0, 4, 13, 15, '2019-09-25 02:33:54'),
(39, 'OLI_1_39', 1, 'OLI', '-70.651813', '-33.416986', 1, 2, 2.0, 1.5, 0.1, 4, 13, 19, '2019-09-25 02:33:54'),
(40, 'CAS_1_40', 1, 'CAS', '-70.651907', '-33.417045', 1, 3, 3.0, 2.2, 0.5, 3, 10, 14, '2019-09-25 02:33:54'),
(41, 'PAL_VE_1_41', 1, 'PAL_VE', '-70.651830', '-33.416985', 2, 2, 3.0, 2.2, 1.0, 2, 9, 2, '2019-09-25 02:33:54'),
(42, 'JAC_1_42', 1, 'JAC', '-70.651788', '-33.417048', 2, 2, 1.0, 1.0, 0.5, 4, 7, 14, '2019-09-25 02:33:54'),
(43, 'PAL_VE_1_43', 1, 'PAL_VE', '-70.651783', '-33.417022', 2, 1, 2.0, 3.0, 0.5, 4, 7, 14, '2019-09-25 02:33:54'),
(44, 'CAS_1_44', 1, 'CAS', '-70.652325', '-33.417076', 1, 3, 12.0, 4.5, 1.0, 3, 1, 16, '2019-09-25 02:33:54'),
(45, 'CAS_1_45', 1, 'CAS', '-70.652388', '-33.417104', 1, 3, 2.0, 1.8, 0.1, 4, 13, 11, '2019-09-25 02:33:54'),
(46, 'CAS_1_46', 1, 'CAS', '-70.652416', '-33.417093', 2, 3, 34.0, 9.0, 1.0, 3, 10, 6, '2019-09-25 02:33:54'),
(47, 'CAS_1_47', 1, 'CAS', '-70.652298', '-33.416960', 1, 3, 1.0, 0.5, 0.1, 4, 13, 11, '2019-09-25 02:33:54'),
(48, 'PAL_VE_1_48', 1, 'PAL_VE', '-70.652337', '-33.416943', 2, 3, 59.0, 5.0, 2.0, 3, 11, 1, '2019-09-25 02:33:54'),
(49, 'LIG_1_49', 1, 'LIG', '-70.652395', '-33.417002', 1, 3, 3.0, 1.8, 0.5, 4, 13, 11, '2019-09-25 02:33:54'),
(50, 'CAS_1_50', 1, 'CAS', '-70.652365', '-33.416982', 1, 3, 2.0, 1.8, 0.5, 4, 7, 14, '2019-09-25 02:33:54'),
(51, 'ROB_AU_1_51', 1, 'ROB_AU', '-70.652253', '-33.416980', 1, 3, 2.0, 1.8, 0.2, 4, 13, 11, '2019-09-25 02:33:54'),
(52, 'CAS_1_52', 1, 'CAS', '-70.652467', '-33.417133', 1, 2, 2.0, 2.0, 0.2, 4, 13, 7, '2019-09-25 02:33:54'),
(53, 'CAS_1_53', 1, 'CAS', '-70.652454', '-33.417081', 1, 2, 5.0, 1.8, 0.5, 2, 5, 2, '2019-09-25 02:33:54'),
(54, 'CAS_1_54', 1, 'CAS', '-70.652447', '-33.417057', 1, 2, 3.0, 2.0, 1.0, 2, 5, 2, '2019-09-25 02:33:55'),
(55, 'CAS_1_55', 1, 'CAS', '-70.652444', '-33.417057', 1, 3, 10.0, 0.5, 0.5, 4, 7, 14, '2019-09-25 02:33:55'),
(56, 'CAS_1_56', 1, 'CAS', '-70.652444', '-33.416989', 1, 2, 2.0, 1.8, 1.0, 4, 7, 19, '2019-09-25 02:33:55'),
(57, 'CAS_1_57', 1, 'CAS', '-70.652464', '-33.416984', 1, 3, 34.0, 9.0, 1.5, 3, 10, 10, '2019-09-25 02:33:55'),
(58, 'CAS_1_58', 1, 'CAS', '-70.652448', '-33.416955', 1, 3, 32.0, 8.0, 1.5, 4, 7, 14, '2019-09-25 02:33:55'),
(59, 'GRA_1_59', 1, 'GRA', '-70.652400', '-33.416922', 1, 2, 1.0, 1.5, 0.1, 4, 13, 14, '2019-09-25 02:33:55'),
(60, 'PAL_CA_1_60', 1, 'PAL_CA', '-70.652314', '-33.416901', 1, 3, 3.0, 1.5, 0.5, 4, 13, 11, '2019-09-25 02:33:55'),
(61, 'CAS_1_61', 1, 'CAS', '-70.652237', '-33.417033', 1, 3, 37.0, 9.0, 2.0, 2, 3, 2, '2019-09-25 02:33:55'),
(62, 'CAS_1_62', 1, 'CAS', '-70.652212', '-33.417101', 1, 3, 26.0, 6.0, 2.0, 3, 10, 6, '2019-09-25 02:33:55'),
(63, 'PAL_CA_1_63', 1, 'PAL_CA', '-70.652255', '-33.417202', 2, 2, 30.0, 9.0, 2.0, 3, 10, 6, '2019-09-25 02:33:55'),
(64, 'CAS_1_64', 1, 'CAS', '-70.652230', '-33.417246', 1, 3, 27.0, 5.0, 2.0, 3, 10, 6, '2019-09-25 02:33:55'),
(65, 'CAS_1_65', 1, 'CAS', '-70.652229', '-33.417301', 1, 3, 4.0, 1.2, 0.5, 4, 7, 14, '2019-09-25 02:33:55'),
(66, 'CAS_1_66', 1, 'CAS', '-70.652252', '-33.417343', 1, 3, 20.0, 5.0, 0.5, 1, 2, 14, '2019-09-25 02:33:55'),
(67, 'PAL_CA_1_67', 1, 'PAL_CA', '-70.652284', '-33.417437', 2, 3, 34.0, 10.0, 1.5, 3, 4, 14, '2019-09-25 02:33:55'),
(68, 'CEL_1_68', 1, 'CEL', '-70.652320', '-33.417407', 2, 3, 19.0, 6.0, 2.0, 3, 4, 14, '2019-09-25 02:33:55'),
(69, 'CAS_1_69', 1, 'CAS', '-70.652366', '-33.417391', 1, 3, 43.0, 12.0, 2.0, 3, 4, 14, '2019-09-25 02:33:55'),
(70, 'MOR_1_70', 1, 'MOR', '-70.652385', '-33.417389', 1, 3, 5.0, 2.0, 0.5, 2, 11, 14, '2019-09-25 02:33:55'),
(71, 'GRA_1_71', 1, 'GRA', '-70.652475', '-33.417409', 1, 2, 5.0, 2.0, 0.5, 2, 11, 14, '2019-09-25 02:33:55'),
(72, 'CEL_1_72', 1, 'CEL', '-70.652559', '-33.417388', 2, 3, 32.0, 10.0, 1.5, 1, 6, 3, '2019-09-25 02:33:55'),
(73, 'FAL_AC_1_73', 1, 'FAL_AC', '-70.652625', '-33.417384', 2, 1, 15.0, 5.0, 2.0, 3, 4, 14, '2019-09-25 02:33:55'),
(74, 'OLI_1_74', 1, 'OLI', '-70.652632', '-33.417226', 2, 3, 25.0, 4.0, 1.5, 3, 4, 9, '2019-09-25 02:33:56'),
(75, 'CIP_ME_1_75', 1, 'CIP_ME', '-70.652533', '-33.417198', 1, 3, 35.0, 6.0, 2.0, 3, 4, 9, '2019-09-25 02:33:56'),
(76, 'EUC_1_76', 1, 'EUC', '-70.651765', '-33.417118', 1, 2, 18.0, 4.0, 1.0, 3, 10, 14, '2019-09-25 02:33:56'),
(77, 'CIP_ME_1_77', 1, 'CIP_ME', '-70.651806', '-33.417195', 1, 3, 4.0, 3.2, 0.5, 2, 10, 2, '2019-09-25 02:33:56'),
(78, 'CIP_ME_1_78', 1, 'CIP_ME', '-70.652009', '-33.417345', 1, 1, 2.0, 1.5, 0.2, 4, 13, 11, '2019-09-25 02:33:56'),
(79, 'MAG_1_79', 1, 'MAG', '-70.652564', '-33.416733', 1, 1, 54.0, 5.0, 2.0, 3, 10, 10, '2019-09-25 02:33:56'),
(80, 'CEL_1_80', 1, 'CEL', '-70.652567', '-33.416688', 1, 3, 22.0, 6.0, 1.0, 4, 13, 6, '2019-09-25 02:33:56'),
(81, 'ARA_AU_1_81', 1, 'ARA_AU', '-70.652514', '-33.416690', 2, 3, 46.0, 10.0, 2.0, 3, 4, 14, '2019-09-25 02:33:56'),
(82, 'PAL_CA_1_82', 1, 'PAL_CA', '-70.652477', '-33.416715', 2, 3, 66.0, 10.0, 2.5, 3, 10, 10, '2019-09-25 02:33:56'),
(83, 'CEL_1_83', 1, 'CEL', '-70.652425', '-33.416679', 2, 3, 2.0, 1.5, 0.1, 4, 13, 11, '2019-09-25 02:33:56'),
(84, 'CIR_CO_1_84', 1, 'CIR_CO', '-70.652380', '-33.416698', 2, 3, 23.0, 6.0, 2.0, 3, 10, 6, '2019-09-25 02:33:56'),
(85, 'CIR_CO_1_85', 1, 'CIR_CO', '-70.652358', '-33.416696', 2, 2, 7.0, 4.0, 0.5, 4, 13, 11, '2019-09-25 02:33:56'),
(86, 'LIG_1_86', 1, 'LIG', '-70.652349', '-33.416736', 2, 2, 20.0, 7.0, 1.5, 3, 12, 14, '2019-09-25 02:33:56'),
(87, 'AIL_1_87', 1, 'AIL', '-70.652277', '-33.416708', 2, 2, 46.0, 10.0, 2.0, 3, 4, 14, '2019-09-25 02:33:56'),
(88, 'NAR_1_88', 1, 'NAR', '-70.652235', '-33.416708', 2, 3, 31.0, 6.0, 2.0, 3, 10, 12, '2019-09-25 02:33:56'),
(89, 'FAL_AC_1_89', 1, 'FAL_AC', '-70.652644', '-33.417401', 2, 1, 2.0, 1.0, 0.1, 4, 13, 11, '2019-09-25 02:33:56'),
(90, 'FAL_AC_1_90', 1, 'FAL_AC', '-70.652609', '-33.417349', 2, 1, 12.0, 4.2, 1.0, 1, 10, 5, '2019-09-25 02:33:56'),
(91, 'PAL_CA_1_91', 1, 'PAL_CA', '-70.652421', '-33.417218', 1, 2, 26.0, 6.2, 1.0, 3, 10, 5, '2019-09-25 02:33:57'),
(92, 'AIL_1_92', 1, 'AIL', '-70.652125', '-33.416768', 2, 3, 15.0, 6.0, 1.0, 3, 10, 10, '2019-09-25 02:33:57'),
(93, 'CIR_CO_1_93', 1, 'CIR_CO', '-70.652044', '-33.416760', 1, 3, 15.0, 5.0, 2.0, 1, 6, 14, '2019-09-25 02:33:57'),
(94, 'FAL_AC_1_94', 1, 'FAL_AC', '-70.652064', '-33.416764', 2, 3, 4.0, 4.0, 1.0, 3, 10, 6, '2019-09-25 02:33:57'),
(95, 'JAB_CH_1_95', 1, 'JAB_CH', '-70.652010', '-33.416781', 1, 3, 20.0, 7.0, 2.5, 4, 13, 11, '2019-09-25 02:33:57'),
(96, 'FAL_AC_1_96', 1, 'FAL_AC', '-70.651926', '-33.416796', 2, 2, 20.0, 7.0, 2.5, 4, 13, 11, '2019-09-25 02:33:57'),
(97, 'NAR_1_97', 1, 'NAR', '-70.651838', '-33.416800', 2, 2, 2.0, 1.8, 0.2, 4, 13, 11, '2019-09-25 02:33:57'),
(98, 'CIP_ME_1_98', 1, 'CIP_ME', '-70.651821', '-33.416839', 1, 3, 14.0, 4.0, 1.0, 4, 13, 11, '2019-09-25 02:33:57'),
(99, 'AIL_1_99', 1, 'AIL', '-70.652164', '-33.416717', 2, 3, 18.0, 6.0, 2.0, 4, 13, 6, '2019-09-25 02:33:57'),
(100, 'CEL_1_100', 1, 'CEL', '-70.652158', '-33.416929', 1, 3, 18.0, 6.0, 2.0, 4, 13, 14, '2019-09-25 02:33:57'),
(101, 'FAL_AC_1_101', 1, 'FAL_AC', '-70.652004', '-33.416951', 2, 2, 11.0, 2.0, 0.0, 4, 13, 17, '2019-09-25 02:33:57'),
(102, 'NAR_1_102', 1, 'NAR', '-70.651992', '-33.416968', 1, 2, 1.0, 0.5, 0.5, 4, 13, 11, '2019-09-25 02:33:57'),
(103, 'NAR_1_103', 1, 'NAR', '-70.651959', '-33.416979', 1, 3, 80.0, 7.0, 4.0, 1, 10, 2, '2019-09-25 02:33:57'),
(104, 'FAL_AC_1_104', 1, 'FAL_AC', '-70.651884', '-33.416960', 2, 2, 3.0, 3.0, 0.5, 2, 5, 2, '2019-09-25 02:33:57'),
(105, 'PAL_VE_1_105', 1, 'PAL_VE', '-70.651901', '-33.416946', 1, 3, 1.0, 1.2, 0.2, 2, 5, 2, '2019-09-25 02:33:57'),
(106, 'CEL_1_106', 1, 'CEL', '-70.651793', '-33.416981', 2, 3, 1.0, 1.5, 0.2, 4, 13, 11, '2019-09-25 02:33:57'),
(107, 'CIR_CO_1_107', 1, 'CIR_CO', '-70.651749', '-33.416937', 2, 1, 3.0, 3.5, 0.1, 4, 13, 11, '2019-09-25 02:33:57'),
(108, 'AIL_1_108', 1, 'AIL', '-70.651859', '-33.416937', 2, 2, 12.0, 5.0, 1.0, 1, 6, 14, '2019-09-25 02:33:57'),
(109, 'AIL_1_109', 1, 'AIL', '-70.651862', '-33.416920', 2, 2, 13.0, 4.5, 1.0, 2, 10, 2, '2019-09-25 02:33:58'),
(110, 'LIG_1_110', 1, 'LIG', '-70.651851', '-33.416918', 2, 3, 13.0, 4.0, 1.0, 2, 10, 2, '2019-09-25 02:33:58'),
(111, 'CIR_CO_1_111', 1, 'CIR_CO', '-70.651841', '-33.416937', 2, 3, 16.0, 5.0, 1.0, 3, 10, 14, '2019-09-25 02:33:58'),
(112, 'PAL_CA_1_112', 1, 'PAL_CA', '-70.651840', '-33.416918', 2, 3, 8.0, 4.0, 1.5, 2, 5, 2, '2019-09-25 02:33:58'),
(113, 'PAL_CA_1_113', 1, 'PAL_CA', '-70.651831', '-33.416920', 2, 3, 1.0, 0.5, 0.5, 4, 13, 19, '2019-09-25 02:33:58'),
(114, 'AIL_1_114', 1, 'AIL', '-70.651844', '-33.416892', 2, 3, 2.0, 3.0, 0.2, 4, 13, 11, '2019-09-25 02:33:58'),
(115, 'AIL_1_145', 1, 'AIL', '-70.651840', '-33.416882', 2, 3, 8.0, 4.0, 1.0, 4, 13, 11, '2019-09-25 02:33:58'),
(116, 'CEL_1_116', 1, 'CEL', '-70.651780', '-33.416865', 2, 3, 3.0, 3.0, 0.2, 1, 8, 2, '2019-09-25 02:33:58'),
(117, 'AIL_1_117', 1, 'AIL', '-70.651763', '-33.416903', 2, 3, 13.0, 3.0, 0.5, 4, 13, 11, '2019-09-25 02:33:58'),
(118, 'CEL_1_118', 1, 'CEL', '-70.651781', '-33.416909', 2, 3, 2.0, 3.0, 0.5, 4, 13, 19, '2019-09-25 02:33:58'),
(119, 'AIL_1_119', 1, 'AIL', '-70.651846', '-33.416915', 2, 3, 3.0, 3.0, 0.5, 4, 13, 11, '2019-09-25 02:33:58'),
(120, 'CIR_CO_1_120', 1, 'CIR_CO', '-70.651803', '-33.416898', 2, 3, 3.0, 3.0, 0.5, 4, 13, 11, '2019-09-25 02:33:58'),
(121, 'AIL_1_121', 1, 'AIL', '-70.651798', '-33.416920', 1, 3, 6.0, 3.2, 0.5, 2, 5, 14, '2019-09-25 02:33:58'),
(122, 'AIL_1_122', 1, 'AIL', '-70.651902', '-33.416921', 2, 3, 1.0, 0.5, 0.5, 4, 13, 11, '2019-09-25 02:33:58'),
(123, 'CIP_ME_1_123', 1, 'CIP_ME', '-70.651743', '-33.416842', 1, 3, 17.0, 3.5, 0.5, 4, 13, 17, '2019-09-25 02:33:58'),
(124, 'CIP_ME_1_124', 1, 'CIP_ME', '-70.651785', '-33.416805', 1, 2, 20.0, 6.0, 1.0, 3, 10, 10, '2019-09-25 02:33:58'),
(125, 'CIP_ME_1_125', 1, 'CIP_ME', '-70.651855', '-33.416753', 1, 3, 2.0, 1.8, 0.5, 4, 7, 14, '2019-09-25 02:33:58'),
(126, 'FAL_AC_1_126', 1, 'FAL_AC', '-70.651975', '-33.416766', 1, 1, 1.0, 1.8, 0.5, 4, 13, 11, '2019-09-25 02:33:58'),
(127, 'PIM_BO_1_127', 1, 'PIM_BO', '-70.652082', '-33.416772', 2, 2, 1.0, 1.5, 0.2, 3, 4, 14, '2019-09-25 02:33:58'),
(128, 'COT_NA_1_128', 1, 'COT_NA', '-70.652179', '-33.416783', 2, 3, 11.0, 3.5, 1.0, 1, 6, 2, '2019-09-25 02:33:58'),
(129, 'FAL_AC_1_129', 1, 'FAL_AC', '-70.652041', '-33.416832', 2, 2, 43.0, 10.0, 2.0, 3, 4, 14, '2019-09-25 02:33:59'),
(130, 'FAL_AC_1_130', 1, 'FAL_AC', '-70.651978', '-33.416855', 2, 3, 2.0, 1.7, 0.2, 3, 10, 5, '2019-09-25 02:33:59'),
(131, 'LIG_1_131', 1, 'LIG', '-70.651902', '-33.416884', 1, 1, 1.0, 1.0, 0.5, 4, 13, 5, '2019-09-25 02:33:59'),
(132, 'CIP_ME_1_132', 1, 'CIP_ME', '-70.651912', '-33.416890', 1, 3, 3.0, 1.5, 0.5, 2, 5, 2, '2019-09-25 02:33:59'),
(133, 'CIP_ME_1_133', 1, 'CIP_ME', '-70.651734', '-33.416887', 1, 3, 28.0, 10.0, 1.5, 3, 4, 14, '2019-09-25 02:33:59'),
(134, 'PIM_BO_1_134', 1, 'PIM_BO', '-70.652404', '-33.417171', 1, 3, 3.0, 1.8, 0.5, 2, 5, 14, '2019-09-25 02:33:59'),
(135, 'CAS_1_135', 1, 'CAS', '-70.652438', '-33.417134', 1, 3, 1.0, 2.5, 0.1, 4, 13, 11, '2019-09-25 02:33:59'),
(136, 'CAS_1_136', 1, 'CAS', '-70.652480', '-33.417091', 1, 3, 33.0, 10.0, 1.5, 3, 4, 14, '2019-09-25 02:33:59'),
(137, 'CAS_1_137', 1, 'CAS', '-70.652494', '-33.417077', 1, 3, 13.0, 3.0, 0.5, 4, 13, 11, '2019-09-25 02:33:59'),
(138, 'AIL_1_138', 1, 'AIL', '-70.652112', '-33.416709', 1, 3, 2.0, 1.8, 0.5, 4, 13, 11, '2019-09-25 02:33:59'),
(139, 'CAS_1_139', 1, 'CAS', '-70.652444', '-33.417045', 1, 2, 26.0, 8.0, 1.2, 3, 10, 14, '2019-09-25 02:33:59'),
(140, 'CAS_1_140', 1, 'CAS', '-70.652455', '-33.417034', 1, 3, 38.0, 10.0, 2.0, 3, 10, 10, '2019-09-25 02:33:59'),
(141, 'CAS_1_141', 1, 'CAS', '-70.652465', '-33.417007', 1, 3, 6.0, 2.0, 1.0, 4, 13, 9, '2019-09-25 02:33:59'),
(142, 'CIR_CO_1_142', 1, 'CIR_CO', '-70.652598', '-33.416937', 1, 3, 1.0, 3.0, 0.5, 4, 7, 14, '2019-09-25 02:33:59'),
(143, 'CEL_1_143', 1, 'CEL', '-70.652074', '-33.416745', 1, 3, 34.0, 10.0, 1.5, 3, 10, 10, '2019-09-25 02:33:59'),
(144, 'CIP_ME_1_144', 1, 'CIP_ME', '-70.652562', '-33.417184', 1, 3, 3.0, 1.5, 1.0, 4, 13, 11, '2019-09-25 02:33:59'),
(145, 'CIP_ME_1_145', 1, 'CIP_ME', '-70.652533', '-33.417121', 1, 3, 6.0, 1.8, 0.0, 4, 13, 14, '2019-09-25 02:33:59'),
(146, 'CIP_ME_1_146', 1, 'CIP_ME', '-70.652538', '-33.417099', 1, 1, 3.0, 1.8, 1.0, 4, 13, 19, '2019-09-25 02:33:59'),
(147, 'CIP_ME_1_147', 1, 'CIP_ME', '-70.652542', '-33.417088', 1, 3, 1.0, 1.2, 1.5, 4, 13, 11, '2019-09-25 02:33:59'),
(148, 'CIP_ME_1_148', 1, 'CIP_ME', '-70.652524', '-33.417079', 1, 3, 10.0, 4.0, 2.0, 1, 6, 14, '2019-09-25 02:33:59'),
(149, 'MOR_1_149', 1, 'MOR', '-70.652558', '-33.417006', 1, 3, 1.0, 0.1, 0.1, 4, 7, 19, '2019-09-25 02:34:00'),
(150, 'FUJ_1_150', 1, 'FUJ', '-70.652597', '-33.416953', 1, 3, 1.0, 4.0, 0.0, 4, 13, 17, '2019-09-25 02:34:00'),
(151, 'PAL_CA_1_151', 1, 'PAL_CA', '-70.652658', '-33.416955', 1, 3, 16.0, 5.0, 2.0, 3, 10, 6, '2019-09-25 02:34:00'),
(152, 'FAL_AC_1_152', 1, 'FAL_AC', '-70.652000', '-33.416889', 2, 1, 3.0, 3.0, 0.2, 4, 13, 19, '2019-09-25 02:34:00'),
(153, 'CEL_1_153', 1, 'CEL', '-70.651910', '-33.416884', 2, 3, 2.0, 1.8, 0.5, 4, 13, 11, '2019-09-25 02:34:00'),
(154, 'LIG_1_154', 1, 'LIG', '-70.651825', '-33.416882', 2, 3, 2.0, 1.8, 0.5, 4, 13, 11, '2019-09-25 02:34:00'),
(155, 'CIR_CO_1_155', 1, 'CIR_CO', '-70.651777', '-33.416897', 2, 3, 1.0, 1.8, 0.2, 4, 13, 19, '2019-09-25 02:34:00'),
(156, 'LIG_1_156', 1, 'LIG', '-70.651762', '-33.416878', 2, 1, 4.0, 1.5, 0.2, 4, 13, 19, '2019-09-25 02:34:00'),
(157, 'PEU_EX_1_157', 1, 'PEU_EX', '-70.651899', '-33.416882', 1, 3, 25.0, 4.5, 2.0, 3, 10, 10, '2019-09-25 02:34:00'),
(158, 'CIP_ME_1_158', 1, 'CIP_ME', '-70.651938', '-33.416873', 1, 2, 17.0, 5.0, 1.0, 3, 4, 14, '2019-09-25 02:34:00'),
(159, 'CEL_1_159', 1, 'CEL', '-70.652084', '-33.416868', 1, 1, 20.0, 3.5, 2.0, 3, 1, 16, '2019-09-25 02:34:00'),
(160, 'CEL_1_160', 1, 'CEL', '-70.652068', '-33.416888', 2, 3, 4.0, 2.0, 1.0, 4, 13, 19, '2019-09-25 02:34:00'),
(161, 'CEL_1_161', 1, 'CEL', '-70.652093', '-33.416881', 2, 3, 2.0, 3.2, 0.5, 3, 10, 11, '2019-09-25 02:34:00'),
(162, 'CEL_1_162', 1, 'CEL', '-70.652117', '-33.416868', 2, 3, 1.0, 2.5, 0.1, 4, 13, 19, '2019-09-25 02:34:00'),
(163, 'CEL_1_163', 1, 'CEL', '-70.652145', '-33.416874', 2, 3, 6.0, 3.5, 0.5, 4, 13, 11, '2019-09-25 02:34:00'),
(164, 'AIL_1_164', 1, 'AIL', '-70.652613', '-33.417187', 2, 3, 4.0, 3.5, 0.5, 4, 13, 11, '2019-09-25 02:34:00'),
(165, 'PAL_VE_1_165', 1, 'PAL_VE', '-70.652605', '-33.417164', 2, 3, 6.0, 4.0, 5.0, 4, 13, 11, '2019-09-25 02:34:00'),
(166, 'CEL_1_166', 1, 'CEL', '-70.652590', '-33.417115', 2, 3, 4.0, 4.0, 0.1, 4, 13, 11, '2019-09-25 02:34:00'),
(167, 'PAL_CA_1_167', 1, 'PAL_CA', '-70.652626', '-33.417133', 1, 3, 4.0, 3.0, 0.1, 4, 13, 11, '2019-09-25 02:34:01'),
(168, 'PAL_CA_1_168', 1, 'PAL_CA', '-70.652571', '-33.417110', 2, 3, 4.0, 4.0, 0.1, 4, 13, 11, '2019-09-25 02:34:01'),
(169, 'PAL_1_169', 1, 'PAL', '-70.652607', '-33.417118', 2, 3, 3.0, 2.2, 1.0, 4, 13, 14, '2019-09-25 02:34:01'),
(170, 'NIS_1_170', 1, 'NIS', '-70.652589', '-33.417039', 2, 3, 3.0, 2.2, 0.5, 4, 13, 14, '2019-09-25 02:34:01'),
(171, 'PAL_CA_1_171', 1, 'PAL_CA', '-70.652571', '-33.417100', 1, 3, 16.0, 3.5, 1.0, 4, 13, 17, '2019-09-25 02:34:01'),
(172, 'JAC_1_172', 1, 'JAC', '-70.652652', '-33.417053', 1, 3, 17.0, 5.0, 2.0, 4, 13, 11, '2019-09-25 02:34:01'),
(173, 'FAL_AC_1_173', 1, 'FAL_AC', '-70.652633', '-33.417016', 1, 1, 8.0, 3.5, 1.5, 3, 10, 10, '2019-09-25 02:34:01'),
(174, 'PEU_EX_1_174', 1, 'PEU_EX', '-70.652669', '-33.416978', 1, 3, 40.0, 10.0, 2.0, 3, 10, 10, '2019-09-25 02:34:01'),
(175, 'CIP_ME_1_175', 1, 'CIP_ME', '-70.652032', '-33.417154', 1, 1, 6.0, 3.2, 0.5, 3, 4, 14, '2019-09-25 02:34:01'),
(176, 'CIP_ME_1_176', 1, 'CIP_ME', '-70.652059', '-33.417178', 1, 2, 10.0, 1.0, 0.5, 4, 7, 14, '2019-09-25 02:34:01'),
(177, 'CIP_ME_1_177', 1, 'CIP_ME', '-70.652098', '-33.417224', 1, 3, 2.0, 1.8, 0.1, 4, 13, 11, '2019-09-25 02:34:01'),
(178, 'PAL_CA_1_178', 1, 'PAL_CA', '-70.652137', '-33.417166', 1, 3, 45.0, 10.0, 2.0, 3, 10, 10, '2019-09-25 02:34:01'),
(179, 'CIP_ME_1_179', 1, 'CIP_ME', '-70.652219', '-33.417100', 1, 1, 26.0, 8.0, 0.0, 4, 13, 17, '2019-09-25 02:34:01'),
(180, 'CAS_1_180', 1, 'CAS', '-70.652233', '-33.417068', 1, 3, 39.0, 12.0, 2.0, 3, 4, 14, '2019-09-25 02:34:01'),
(181, 'AIL_1_181', 1, 'AIL', '-70.652207', '-33.416988', 1, 3, 48.0, 10.0, 2.5, 3, 4, 14, '2019-09-25 02:34:01'),
(182, 'FAL_AC_1_182', 1, 'FAL_AC', '-70.652162', '-33.416984', 1, 1, 71.0, 8.0, 2.5, 3, 10, 14, '2019-09-25 02:34:01'),
(183, 'PAL_CA_1_183', 1, 'PAL_CA', '-70.652113', '-33.416943', 1, 3, 3.0, 3.0, 0.1, 4, 13, 11, '2019-09-25 02:34:01'),
(184, 'CIP_ME_1_184', 1, 'CIP_ME', '-70.651995', '-33.417039', 1, 3, 11.0, 5.0, 1.5, 3, 4, 14, '2019-09-25 02:34:02'),
(185, 'CAS_1_185', 1, 'CAS', '-70.652061', '-33.417086', 1, 3, 11.0, 5.0, 1.5, 3, 4, 14, '2019-09-25 02:34:02'),
(186, 'CIP_ME_1_186', 1, 'CIP_ME', '-70.652067', '-33.417091', 1, 3, 41.0, 10.0, 1.0, 3, 10, 6, '2019-09-25 02:34:02'),
(187, 'CAS_1_187', 1, 'CAS', '-70.652070', '-33.417086', 1, 3, 2.0, 3.2, 1.0, 2, 5, 18, '2019-09-25 02:34:02'),
(188, 'FAL_AC_1_188', 1, 'FAL_AC', '-70.652089', '-33.417068', 2, 2, 15.0, 3.5, 1.5, 3, 10, 6, '2019-09-25 02:34:02'),
(189, 'CED_1_189', 1, 'CED', '-70.652116', '-33.417073', 1, 3, 5.0, 0.5, 0.5, 3, 10, 13, '2019-09-25 02:34:02'),
(190, 'PAL_CA_1_190', 1, 'PAL_CA', '-70.652176', '-33.417050', 1, 3, 36.0, 10.0, 2.0, 1, 6, 14, '2019-09-25 02:34:02'),
(191, 'CEL_1_191', 1, 'CEL', '-70.652199', '-33.417044', 1, 3, 28.0, 10.0, 1.0, 3, 10, 14, '2019-09-25 02:34:02'),
(192, 'PAL_VE_1_192', 1, 'PAL_VE', '-70.652186', '-33.417034', 1, 3, 24.0, 9.0, 1.0, 4, 13, 4, '2019-09-25 02:34:02'),
(193, 'CIP_ME_1_193', 1, 'CIP_ME', '-70.652190', '-33.417015', 1, 3, 32.0, 10.0, 2.0, 3, 10, 6, '2019-09-25 02:34:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_especie`
--

CREATE TABLE `tipo_especie` (
  `id_tipoespecie` int(11) NOT NULL,
  `tipo_especie` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_especie`
--

INSERT INTO `tipo_especie` (`id_tipoespecie`, `tipo_especie`) VALUES
(1, 'Introducida'),
(2, 'Nativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_poda`
--

CREATE TABLE `tipo_poda` (
  `id_tipopoda` int(11) NOT NULL,
  `tipo_poda` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_poda`
--

INSERT INTO `tipo_poda` (`id_tipopoda`, `tipo_poda`) VALUES
(1, 'Conducción'),
(2, 'Formación'),
(3, 'Mantención'),
(4, 'No Aplica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `tratamiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id_tratamiento`, `tratamiento`) VALUES
(1, 'Aclareo'),
(2, 'Cabeza de Sauce'),
(3, 'Descabezado'),
(4, 'Direccional'),
(5, 'Eliminación'),
(6, 'Estructural'),
(7, 'Extracción'),
(8, 'Formación'),
(9, 'Liberación'),
(10, 'Limpieza'),
(11, 'Mantención'),
(12, 'Reducción'),
(13, 'Tala');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`),
  ADD KEY `especie_tipoespecie` (`id_tipoespecie`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observaciones`);

--
-- Indices de la tabla `patio`
--
ALTER TABLE `patio`
  ADD PRIMARY KEY (`id_patio`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`n_registro`,`id_registro`),
  ADD KEY `registro_patio` (`id_patio`),
  ADD KEY `registro_propiedad` (`id_propiedad`),
  ADD KEY `registro_estado` (`id_estado`),
  ADD KEY `registro_tipopoda` (`id_tipopoda`),
  ADD KEY `registro_tratamiento` (`id_tratamiento`),
  ADD KEY `registro_observaciones` (`id_observaciones`),
  ADD KEY `registro_especie` (`id_especie`);

--
-- Indices de la tabla `tipo_especie`
--
ALTER TABLE `tipo_especie`
  ADD PRIMARY KEY (`id_tipoespecie`);

--
-- Indices de la tabla `tipo_poda`
--
ALTER TABLE `tipo_poda`
  ADD PRIMARY KEY (`id_tipopoda`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id_observaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `patio`
--
ALTER TABLE `patio`
  MODIFY `id_patio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `n_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT de la tabla `tipo_especie`
--
ALTER TABLE `tipo_especie`
  MODIFY `id_tipoespecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_poda`
--
ALTER TABLE `tipo_poda`
  MODIFY `id_tipopoda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_tipoespecie` FOREIGN KEY (`id_tipoespecie`) REFERENCES `tipo_especie` (`id_tipoespecie`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_especie` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id_especie`),
  ADD CONSTRAINT `registro_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `registro_observaciones` FOREIGN KEY (`id_observaciones`) REFERENCES `observaciones` (`id_observaciones`),
  ADD CONSTRAINT `registro_patio` FOREIGN KEY (`id_patio`) REFERENCES `patio` (`id_patio`),
  ADD CONSTRAINT `registro_propiedad` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id_propiedad`),
  ADD CONSTRAINT `registro_tipopoda` FOREIGN KEY (`id_tipopoda`) REFERENCES `tipo_poda` (`id_tipopoda`),
  ADD CONSTRAINT `registro_tratamiento` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamiento` (`id_tratamiento`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
