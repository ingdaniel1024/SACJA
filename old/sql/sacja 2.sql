-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2016 a las 19:24:30
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sacja`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE IF NOT EXISTS `alergias` (
  `idAlergia` int(10) NOT NULL,
  `alergia` int(11) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `idArchivo` int(10) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `formato` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `propietario` int(10) NOT NULL,
  `usuarioCompartido` int(10) NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciaeventos`
--

CREATE TABLE IF NOT EXISTS `asistenciaeventos` (
  `idEvento` int(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `evento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciareuniones`
--

CREATE TABLE IF NOT EXISTS `asistenciareuniones` (
  `idAsistenciaReuniones` int(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `reunion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociaciones_misiones`
--

CREATE TABLE IF NOT EXISTS `asociaciones_misiones` (
  `idAsociacion` int(10) NOT NULL,
  `nombreAsociacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idUnion` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asociaciones_misiones`
--

INSERT INTO `asociaciones_misiones` (`idAsociacion`, `nombreAsociacion`, `idUnion`) VALUES
(1, 'Asociación de Sonora', 1),
(5, 'Asociación de Baja California', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaclases`
--

CREATE TABLE IF NOT EXISTS `categoriaclases` (
  `idCategoriaClases` int(10) NOT NULL,
  `idClase` int(10) NOT NULL,
  `nombreCategoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoriaclases`
--

INSERT INTO `categoriaclases` (`idCategoriaClases`, `idClase`, `nombreCategoria`) VALUES
(1, 1, 'General'),
(2, 1, 'Descubrimiento Espiritual'),
(3, 1, 'Sirviendo a otros'),
(4, 1, 'Desarrollo de la amistad'),
(5, 1, 'Salud y aptitud física'),
(6, 1, 'Desarrollo del liderazgo'),
(7, 1, 'Estudio de la naturaleza'),
(8, 1, 'Arte de acampar'),
(9, 1, 'Enriqueciendo el estilo de vida'),
(10, 2, 'General'),
(11, 2, 'Descubrimiento Espiritual'),
(12, 2, 'Sirviendo a otros'),
(13, 2, 'Desarrollo de la amistad'),
(14, 2, 'Salud y aptitud física'),
(15, 2, 'Desarrollo del liderazgo'),
(16, 2, 'Estudio de la naturaleza'),
(17, 2, 'Arte de acampar'),
(18, 2, 'Enriqueciendo el estilo de vida'),
(19, 3, 'General'),
(20, 3, 'Descubrimiento Espiritual'),
(21, 3, 'Sirviendo a otros'),
(22, 3, 'Desarrollo de la amistad'),
(23, 3, 'Salud y aptitud física'),
(24, 3, 'Desarrollo del liderazgo'),
(25, 3, 'Estudio de la naturaleza'),
(26, 3, 'Arte de acampar'),
(27, 3, 'Enriqueciendo el estilo de vida'),
(28, 4, 'General'),
(29, 4, 'Descubrimiento Espiritual'),
(30, 4, 'Sirviendo a otros'),
(31, 4, 'Desarrollo de la amistad'),
(32, 4, 'Salud y aptitud física'),
(33, 4, 'Desarrollo del liderazgo'),
(34, 4, 'Estudio de la naturaleza'),
(35, 4, 'Arte de acampar'),
(36, 4, 'Enriqueciendo el estilo de vida'),
(37, 5, 'General'),
(38, 5, 'Descubrimiento espiritual'),
(39, 5, 'Sirviendo a otros'),
(40, 5, 'Desarrollo personal'),
(41, 5, 'Salud y aptitud física'),
(42, 5, 'Desarrollo de organización y liderazgo'),
(43, 5, 'Estudio de la naturaleza'),
(44, 5, 'Arte de acampar'),
(45, 5, 'Enriqueciendo el estilo de vida'),
(46, 6, 'General'),
(47, 6, 'Descubrimiento espiritual'),
(48, 6, 'Sirviendo a otros'),
(49, 6, 'Desarrollo de organización y liderazgo'),
(50, 6, 'Historia de nuestra iglesia'),
(51, 6, 'Desarrollo personal'),
(52, 6, 'Desarrollo de la amistad'),
(53, 6, 'Salud y aptitud física'),
(54, 6, 'Arte de acampar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasespecialidades`
--

CREATE TABLE IF NOT EXISTS `categoriasespecialidades` (
  `idCategoriaEspecialidad` int(10) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoriasespecialidades`
--

INSERT INTO `categoriasespecialidades` (`idCategoriaEspecialidad`, `categoria`) VALUES
(1, 'Doméstica'),
(2, 'Manual'),
(3, 'Vocacional'),
(4, 'Misionera'),
(5, 'Naturaleza'),
(6, 'Agrícola'),
(7, 'Ciencia y Salud'),
(8, 'Recreación'),
(9, 'ADRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `idClase` int(10) NOT NULL,
  `nombreClase` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`idClase`, `nombreClase`) VALUES
(1, 'Amigo'),
(2, 'Compañero'),
(3, 'Explorador'),
(4, 'Orientador'),
(5, 'Viajero'),
(6, 'Guía'),
(7, 'Amigo Avanzado'),
(8, 'Compañero Avanzado'),
(9, 'Explorador Avanzado'),
(10, 'Orientador Avanzado'),
(11, 'Viajero Avanzado'),
(12, 'Guía Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasesterminadas`
--

CREATE TABLE IF NOT EXISTS `clasesterminadas` (
  `idClaseTerminada` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `clase` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipoClub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idClub` int(10) NOT NULL,
  `acreditador` int(10) NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE IF NOT EXISTS `clubes` (
  `idClub` int(10) NOT NULL,
  `nombreClub` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idIglesia` int(11) NOT NULL,
  `director` int(10) NOT NULL,
  `aprobado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`idClub`, `nombreClub`, `tipo`, `idIglesia`, `director`, `aprobado`) VALUES
(4, 'Elisur', 'Conquistadores', 5, 1, 0),
(10, 'Centinelas', 'Conquistadores', 7, 6, 0),
(11, 'Diamantes', 'Conquistadores', 8, 16, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE IF NOT EXISTS `distritos` (
  `idDistrito` int(10) NOT NULL,
  `nombreDistrito` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idAsociacion` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`idDistrito`, `nombreDistrito`, `idAsociacion`) VALUES
(2, 'Del Mayo', '2'),
(5, 'El Florido', '5'),
(6, 'Distrito de San Quintín', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentosclub`
--

CREATE TABLE IF NOT EXISTS `documentosclub` (
  `idDocumento` int(10) NOT NULL,
  `nombreDocumento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `club` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresosclub`
--

CREATE TABLE IF NOT EXISTS `egresosclub` (
  `idEgreso` int(10) NOT NULL,
  `tipoEgreso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `descripcion` int(200) NOT NULL,
  `fecha` date NOT NULL,
  `club` int(10) NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enemergencia`
--

CREATE TABLE IF NOT EXISTS `enemergencia` (
  `idEnEmergencia` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lada` int(4) NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE IF NOT EXISTS `enfermedades` (
  `idEnfermedad` int(10) NOT NULL,
  `enfermedad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `idEspecialidad` int(10) NOT NULL,
  `idCategoriaEspecialidad` int(10) NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`idEspecialidad`, `idCategoriaEspecialidad`, `especialidad`) VALUES
(1, 5, 'Algas Marinas'),
(2, 5, 'Anfibios'),
(3, 5, 'Animales Domésticos'),
(4, 5, 'Arácnidos'),
(5, 5, 'Árboles I'),
(6, 5, 'Árboles II'),
(7, 5, 'Arbustos'),
(8, 5, 'Arenas'),
(9, 5, 'Astronomía I'),
(10, 5, 'Astronomia II'),
(11, 5, 'Aves como mascotas'),
(12, 5, 'Aves Domésticas'),
(13, 5, 'Cactos'),
(14, 5, 'Climatología I'),
(15, 5, 'Climatología II'),
(16, 5, 'Conservación Ambiental'),
(17, 5, 'Cuidado y Adiestramiento de Perros'),
(18, 5, 'Ecología I'),
(19, 5, 'Ecología II'),
(20, 5, 'Eucaliptus'),
(21, 5, 'Flores I'),
(22, 5, 'Flores II'),
(23, 5, 'Fósiles'),
(24, 5, 'Gatos'),
(25, 5, 'Geología I'),
(26, 5, 'Geología II'),
(27, 5, 'Gramíneas'),
(28, 5, 'Helechos'),
(29, 5, 'Hongos'),
(30, 5, 'Huellas de Animales'),
(31, 5, 'Insectos I'),
(32, 5, 'Insectos II'),
(33, 5, 'Inverterbrados Marinos'),
(34, 5, 'Líquenes, Hepáticas y Musgos'),
(35, 5, 'Mamíferos I'),
(36, 5, 'Mamíferos II'),
(37, 5, 'Mamíferos Marinos'),
(38, 5, 'Mamiferos Pequeños como Mascotas'),
(39, 5, 'Mariposas'),
(40, 5, 'Minerales I'),
(41, 5, 'Minerales II'),
(42, 5, 'Moluscos I'),
(43, 5, 'Moluscos II'),
(44, 5, 'Ornitología I'),
(45, 5, 'Ornitología II'),
(46, 5, 'Orquideas'),
(47, 5, 'Orquideas II'),
(48, 5, 'Palmeras'),
(49, 5, 'Peces'),
(50, 5, 'Perros'),
(51, 5, 'Plantas de Interior'),
(52, 5, 'Plantas Silvestres Comestibles'),
(53, 5, 'Reptiles'),
(54, 5, 'Semillas I'),
(55, 5, 'Semillas II'),
(56, 1, 'Acolchado'),
(57, 1, 'Alimentos congelados'),
(58, 1, 'Arte Culinario I'),
(59, 1, 'Arte Culinario II'),
(60, 1, 'Conservación de Alimentos'),
(61, 1, 'Corte y Confección I'),
(62, 1, 'Corte y Confección II'),
(63, 1, 'Costura Básica'),
(64, 1, 'Deshidratación de Alimentos'),
(65, 1, 'Economía Doméstica'),
(66, 1, 'Hierbas Aromáticas'),
(67, 1, 'Lavandería'),
(68, 1, 'Nutrición I'),
(69, 1, 'Nutrición II'),
(70, 1, 'Panificación'),
(71, 1, 'Sastrería'),
(72, 2, 'Aeromodelismo'),
(73, 2, 'Alfarería'),
(74, 2, 'Arte y decoración con plástico'),
(75, 2, 'Arte de Hacer Velas'),
(76, 2, 'Arte en Hilo'),
(77, 2, 'Arte en Masa de Pan'),
(78, 2, 'Artes y Trabajos Indígenas I'),
(79, 2, 'Automodelismo'),
(80, 2, 'Bordados'),
(81, 2, 'Bordado en Punto Cruz'),
(82, 2, 'Cerámica'),
(83, 2, 'Cestería'),
(84, 2, 'Cohetemodelismo I'),
(85, 2, 'Cohetemodelismo II'),
(86, 2, 'Crochet I'),
(87, 2, 'Crochet II'),
(88, 2, 'Decoración de Tortas'),
(89, 2, 'Dibujo y Pintura'),
(90, 2, 'Escultura'),
(91, 2, 'Esmaltado en Cobre I'),
(92, 2, 'Esmaltado en Cobre II'),
(93, 2, 'Estampado con molde'),
(94, 2, 'Fabricación de esteras'),
(95, 2, 'Fabricación y Modelado de Jabón I'),
(96, 2, 'Fabricación y Modelado de Jabón II'),
(97, 2, 'Fotografía'),
(98, 2, 'Laminado'),
(99, 2, 'Letreros y Carteles'),
(100, 2, 'Macramé'),
(101, 2, 'Modelado en Yeso'),
(102, 2, 'Modelismo Ferroviario'),
(103, 2, 'Modelismo Nautico'),
(104, 2, 'Música'),
(105, 2, 'Origami'),
(106, 2, 'Ornamentación Floral'),
(107, 2, 'Pintura sobre Tela'),
(108, 2, 'Pintura sobre Vidrio'),
(109, 2, 'Serigrafía I'),
(110, 2, 'Serigrafía II'),
(111, 2, 'Tallado en Madera'),
(112, 2, 'Tallado en Piedras Preciosas'),
(113, 2, 'Tejido I'),
(114, 2, 'Tejido II'),
(115, 2, 'Titeres I'),
(116, 2, 'Titeres II'),
(117, 2, 'Trabajos en Cuero I'),
(118, 2, 'Trabajos en Cuero II'),
(119, 2, 'Trabajos en Madera'),
(120, 2, 'Trabajos en Metal'),
(121, 2, 'Trabajos en Paño Lenci'),
(122, 2, 'Trabajos en Telar'),
(123, 2, 'Trabajos en Vidrio'),
(124, 2, 'Trenzado I'),
(125, 2, 'Trenzado II'),
(126, 2, 'Papel Mache'),
(127, 3, 'Albañilería'),
(128, 3, 'Arte Cristiano de Vender'),
(129, 3, 'Carpintería '),
(130, 3, 'Computación I'),
(131, 3, 'Computación II '),
(132, 3, 'Comunicaciones I'),
(133, 3, 'Comunicaciones II'),
(134, 3, 'Contabilidad I'),
(135, 3, 'Contabilidad II'),
(136, 3, 'Dactilografía (Mecanografía)'),
(137, 3, 'Electricidad'),
(138, 3, 'Empapelado'),
(139, 3, 'Encuadernación'),
(140, 3, 'Enseñanza'),
(141, 3, 'Evangelización Bíblica'),
(142, 3, 'Imprenta'),
(143, 3, 'Mecánica de Automóviles I'),
(144, 3, 'Mecánica de Automóviles II'),
(145, 3, 'Motores Pequeños '),
(146, 3, 'Peluquería'),
(147, 3, 'Periodismo'),
(148, 3, 'Pintura Exterior de Casas'),
(149, 3, 'Pintura Interior de Casas '),
(150, 3, 'Plomería (Fontanería)'),
(151, 3, 'Radio I'),
(152, 3, 'Radio II'),
(153, 3, 'Radio de Banda Ciudadana'),
(154, 3, 'Radioelectrónica'),
(155, 3, 'Soldadura'),
(156, 3, 'Taquigrafía'),
(157, 3, 'Trabajos en Madera'),
(158, 3, 'Zapateria'),
(159, 4, 'Aventura Para Cristo I'),
(160, 4, 'Aventura Para Cristo II'),
(161, 4, 'Arte de contar Historias'),
(162, 4, 'Civismo Cristiano'),
(163, 4, 'Colportaje'),
(164, 4, 'Etnología Cristiana'),
(165, 4, 'Evangelismo Personal'),
(166, 4, 'Idiomas'),
(167, 4, 'Lenguaje de Señas I'),
(168, 4, 'Lenguaje de Señas II'),
(169, 4, 'Liderazgo de Menores'),
(170, 4, 'Marcar Biblias I'),
(171, 4, 'Marcar Biblias II'),
(172, 4, 'Mayordomía'),
(173, 4, 'Modales Cristianos'),
(174, 4, 'Temperancia'),
(175, 4, 'Testificación de Menores'),
(176, 4, 'Vida Familiar'),
(177, 6, 'Agricultura'),
(178, 6, 'Agricultura de Subsistencia'),
(179, 6, 'Apicultura'),
(180, 6, 'Avicultura'),
(181, 6, 'Cría de Caballos'),
(182, 6, 'Cría de Cabras'),
(183, 6, 'Cría de Ovejas'),
(184, 6, 'Cria de Palomas'),
(185, 6, 'Cultivo de Frutas Pequeñas'),
(186, 6, 'Floricultura'),
(187, 6, 'Fruticultura'),
(188, 6, 'Ganadería'),
(189, 6, 'Horticultura'),
(190, 6, 'Lechería'),
(191, 7, 'Alerta Roja'),
(192, 7, 'Cuidado del Bebé'),
(193, 7, 'Enfermería del Hogar'),
(194, 7, 'Física'),
(195, 7, 'Óptica'),
(196, 7, 'Primeros Auxilios I'),
(197, 7, 'Primeros Auxilios II'),
(198, 7, 'Primeros Auxilios III'),
(199, 7, 'Química'),
(200, 7, 'Resucitación Cardiopulmonar (RCP)'),
(201, 7, 'Rescate Básico'),
(202, 7, 'Salud y Curación'),
(203, 8, 'Acrobacias y equilibrio I'),
(204, 8, 'Acrobacias y equilibrio II'),
(205, 8, 'Andinismo I'),
(206, 8, 'Andinismo II'),
(207, 8, 'Aptitud Física'),
(208, 8, 'Arte de Acampar I'),
(209, 8, 'Arte de Acampar II'),
(210, 8, 'Arte de Acampar III'),
(211, 8, 'Arte de Acampar IV'),
(212, 8, 'Arte de Acampar en Invierno'),
(213, 8, 'Arte de Tirar con Arco I'),
(214, 8, 'Arte de Tirar con Arco II'),
(215, 8, 'Buceo'),
(216, 8, 'Buceo con Escafranda I'),
(217, 8, 'Buceo con Escafranda II'),
(218, 8, 'Caminatas'),
(219, 8, 'Campamentismo'),
(220, 8, 'Carrera en Pista y Campo'),
(221, 8, 'Ciclismo I'),
(222, 8, 'Ciclismo II'),
(223, 8, 'Cometas'),
(224, 8, 'Descenso con sogas I'),
(225, 8, 'Descenso con sogas II'),
(226, 8, 'Descenso con sogas III'),
(227, 8, 'Ejercicios y Marchas I'),
(228, 8, 'Ejercicios y Marchas II'),
(229, 8, 'Equitación'),
(230, 8, 'Esqui Acuatico I'),
(231, 8, 'Esqui Acuatico II'),
(232, 8, 'Excursionismo'),
(233, 8, 'Exploración de cavernas I'),
(234, 8, 'Exploración de cavernas II'),
(235, 8, 'Filatelia I'),
(236, 8, 'Filatelia II'),
(237, 8, 'Fogatas y cocina al aire libre'),
(238, 8, 'Liderazgo al aire libre I'),
(239, 8, 'Liderazgo al aire libre II'),
(240, 8, 'Liderazgo en la naturaleza I'),
(241, 8, 'Liderazgo en la naturaleza II'),
(242, 8, 'Manejo de Canoas I'),
(243, 8, 'Manejo de Canoas II'),
(244, 8, 'Manejo de Kayaks'),
(245, 8, 'Natación I'),
(246, 8, 'Natación II'),
(247, 8, 'Natación III'),
(248, 8, 'Natación IV'),
(249, 8, 'Natación V'),
(250, 8, 'Navegación'),
(251, 8, 'Navegación a vela'),
(252, 8, 'Nudos'),
(253, 8, 'Numismática'),
(254, 8, 'Orientación'),
(255, 8, 'Patinetas'),
(256, 8, 'Pionerismo'),
(257, 8, 'Remo'),
(258, 8, 'Salto desde Tamprolin'),
(259, 8, 'Salvataje'),
(260, 8, 'Salvataje II'),
(261, 8, 'Surfing con vela'),
(262, 8, 'Trepar árboles'),
(263, 8, 'Triatlón I'),
(264, 8, 'Triatlón II'),
(265, 8, 'Vida primitiva'),
(266, 8, 'Preparación de Videos'),
(267, 9, 'Evaluación de la Comunidad'),
(268, 9, 'Servicio a la comunidad'),
(269, 9, 'Desarrollo de la comunidad'),
(270, 9, 'Reasentamiento de Refugiados'),
(271, 9, 'Alfabetizacion'),
(272, 9, 'Alivio del Hambre'),
(273, 9, 'Respuesta a Desastres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidadesclub`
--

CREATE TABLE IF NOT EXISTS `especialidadesclub` (
  `idEspecialidadClub` int(10) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `instructor` int(10) NOT NULL,
  `club` int(10) NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidadesterminadas`
--

CREATE TABLE IF NOT EXISTS `especialidadesterminadas` (
  `idEspecialidadTerminada` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idEspecialidad` int(10) NOT NULL,
  `categoría` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipoClub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idClub` int(10) NOT NULL,
  `instructor` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `idEvento` int(10) NOT NULL,
  `nombreEvento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `inicioEvento` date NOT NULL,
  `finEvento` date NOT NULL,
  `lugarEvento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `precioEvento` int(11) NOT NULL,
  `descripcionEvento` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `organizador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iglesias`
--

CREATE TABLE IF NOT EXISTS `iglesias` (
  `idIglesia` int(10) NOT NULL,
  `nombreIglesia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idDistrito` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `iglesias`
--

INSERT INTO `iglesias` (`idIglesia`, `nombreIglesia`, `idDistrito`) VALUES
(2, 'Universidad de Navojoa', 2),
(5, 'Guaycura', 5),
(7, 'El Pípila', 5),
(8, 'Iglesia San Quintín', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosclub`
--

CREATE TABLE IF NOT EXISTS `ingresosclub` (
  `idIngreso` int(10) NOT NULL,
  `tipoIngreso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `club` int(10) NOT NULL,
  `periodo` int(10) NOT NULL,
  `patrocinador` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librodeoro`
--

CREATE TABLE IF NOT EXISTS `librodeoro` (
  `idLibro` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `periodo` int(10) NOT NULL,
  `club` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `idDirectiva` int(10) NOT NULL,
  `idClub` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`idDirectiva`, `idClub`, `idUsuario`, `cargo`) VALUES
(1, 4, 6, 'Consejero'),
(3, 4, 8, 'Tesorero'),
(4, 4, 9, 'Secretario'),
(5, 4, 10, 'Instructor'),
(6, 4, 11, 'Conquistador'),
(7, 4, 12, 'Conquistador'),
(8, 4, 13, 'Conquistador'),
(9, 4, 14, 'Conquistador'),
(10, 4, 15, 'Secretario'),
(11, 4, 17, 'Conquistador'),
(12, 4, 18, 'Instructor'),
(13, 4, 19, 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticia` int(10) NOT NULL,
  `anunciante` int(10) NOT NULL,
  `mensaje` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tipoDestinatario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idTipoDestinatario` int(10) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `fechaDeNacimiento` date NOT NULL,
  `claseActual` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lada` int(4) NOT NULL,
  `telefono` int(8) NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `idUsuario`, `fechaDeNacimiento`, `claseActual`, `lada`, `telefono`, `ciudad`, `estado`, `pais`) VALUES
(1, 13, '0000-00-00', 'Orientador', 0, 0, '', '', ''),
(2, 11, '0000-00-00', 'Guía', 0, 0, '', '', ''),
(3, 12, '0000-00-00', 'Viajero', 0, 0, '', '', ''),
(4, 14, '0000-00-00', 'Explorador', 0, 0, '', '', ''),
(5, 1, '1994-07-11', '', 642, 1075114, 'Tijuana', 'Baja California', 'México'),
(6, 15, '0000-00-00', '', 0, 0, '', '', ''),
(7, 16, '0000-00-00', '', 0, 0, '', '', ''),
(8, 6, '0000-00-00', '', 0, 0, '', '', ''),
(9, 8, '0000-00-00', '', 0, 0, '', '', ''),
(10, 9, '0000-00-00', '', 0, 0, '', '', ''),
(11, 10, '0000-00-00', '', 0, 0, '', '', ''),
(12, 17, '0000-00-00', 'Orientador', 0, 0, '', '', ''),
(13, 18, '0000-00-00', '', 0, 0, '', '', ''),
(14, 19, '0000-00-00', '', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodosanuales`
--

CREATE TABLE IF NOT EXISTS `periodosanuales` (
  `idPeriodoAnual` int(10) NOT NULL,
  `nombrePeriodo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `estaActivo` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `periodosanuales`
--

INSERT INTO `periodosanuales` (`idPeriodoAnual`, `nombrePeriodo`, `fechaInicio`, `fechaFin`, `estaActivo`) VALUES
(2, 'Periodo Anual 2016', '2016-01-10', '2016-10-10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `idPermiso` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `esConquistador` int(1) NOT NULL,
  `esConsejero` int(1) NOT NULL,
  `esInstructor` int(1) NOT NULL,
  `esSecretario` int(1) NOT NULL,
  `esTesorero` int(1) NOT NULL,
  `esDirector` int(1) NOT NULL,
  `esAsociacion` int(1) NOT NULL,
  `esAdmin` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `idUsuario`, `esConquistador`, `esConsejero`, `esInstructor`, `esSecretario`, `esTesorero`, `esDirector`, `esAsociacion`, `esAdmin`) VALUES
(1, 1, 0, 1, 1, 1, 1, 1, 1, 1),
(2, 6, 0, 1, 1, 1, 0, 1, 0, 0),
(3, 7, 0, 0, 0, 0, 1, 0, 0, 0),
(4, 8, 0, 1, 0, 1, 1, 0, 0, 0),
(5, 9, 0, 0, 1, 0, 0, 0, 0, 0),
(6, 10, 0, 1, 1, 0, 1, 0, 0, 0),
(7, 11, 1, 0, 0, 0, 0, 0, 0, 0),
(8, 12, 1, 0, 0, 0, 0, 0, 0, 0),
(9, 13, 1, 0, 0, 0, 0, 0, 0, 0),
(10, 14, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 15, 0, 0, 0, 1, 0, 0, 0, 0),
(12, 16, 0, 0, 0, 0, 0, 1, 0, 0),
(13, 17, 1, 0, 0, 0, 0, 0, 0, 0),
(14, 18, 0, 0, 0, 0, 1, 0, 0, 0),
(15, 19, 0, 1, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitosclase`
--

CREATE TABLE IF NOT EXISTS `requisitosclase` (
  `idRequisitosClase` int(10) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `esEspecialidad` int(1) NOT NULL,
  `idCategoriaClases` int(10) NOT NULL,
  `opcionesNecesarias` int(2) NOT NULL,
  `opcionesDisponibles` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `requisitosclase`
--

INSERT INTO `requisitosclase` (`idRequisitosClase`, `descripcion`, `esEspecialidad`, `idCategoriaClases`, `opcionesNecesarias`, `opcionesDisponibles`) VALUES
(1, 'Tener un mínimo de 10 años de edad.', 0, 1, 1, 1),
(2, 'Ser miembro activo del Club de Conquistadores.', 0, 1, 1, 1),
(3, 'Saber de memoria y explicar el Voto y la Ley del Conquistador.', 0, 1, 1, 1),
(4, 'Tener un Certificado del Curso del Libro del año en curso.', 0, 1, 1, 1),
(5, 'Leer el libro: "Por la gracia de Dios".', 0, 1, 1, 1),
(6, 'Saber de memoria los libros del Antiguo Testamento y conocer las cinco áreas en las cuales están agrupados. Demostrar habilidad para encontrar cualquiera de ellos.', 0, 2, 1, 1),
(7, 'Memorizar un texto de la Biblia en cada una de las siete categorías mencionadas a continuación:', 0, 2, 1, 1),
(8, 'Saber de memoria y explicar el Salmo 23 o el Salmo 46.', 0, 2, 1, 1),
(9, 'En consulta con tu líder planea en dedicar, por lo menos dos horas, demostrando tu amistad hacia alguien con necesidad en tu comunidad, realizando dos de los siguientes ítems:', 0, 3, 1, 1),
(10, 'Demostrar ser un buen ciudadano en el hogar y en la escuela.', 0, 3, 1, 1),
(11, 'Mencionar diez cualidades para ser un buen amigo y discutir cuatro situaciones diarias cuando pusiste en práctica la Regla de Oro.', 0, 4, 1, 1),
(12, 'Conocer el Himno Nacional de tu país y saber su significado.', 0, 4, 1, 1),
(13, 'Completar lo siguiente:', 0, 5, 1, 1),
(14, 'Aprender los principios de una dieta saludable y participar en un proyecto preparando un cuadro con los grupos básicos de alimentos.', 0, 5, 1, 1),
(15, 'Completar la especialidad de Natación I.', 1, 5, 1, 1),
(16, 'Planear una caminata de 3 horas u 8 km.', 0, 6, 1, 1),
(17, 'Planifique completar un requisito de la sección Estudio de la Naturaleza o Arte de Acampar (De esta Clase) o una Especialidad en Naturaleza.', 0, 6, 1, 1),
(18, 'Completar una de las siguientes especialidades:', 0, 7, 1, 1),
(19, 'Saber los diferentes métodos de purificación del agua y demostrar tu habilidad en construir un refugio. Considerar el significado de Jesús como el agua de la vida y nuestro refugio.', 0, 7, 1, 1),
(20, 'Saber cómo se hace una cuerda y demostrar cómo debemos cuidar correctamente una cuerda. Dar a conocer el uso práctico de los siguientes nudos: Cote o media malla, falso, llano, corredizo, doble lazo, dos medios cotes, ballestrinque, as de guía o potreador, torniquete.', 0, 8, 1, 1),
(21, 'Pernoctar en un campamento un fin de semana.', 0, 8, 1, 1),
(22, 'Aprobar un examen sobre medidas generales de seguridad en campamento.', 0, 8, 1, 1),
(23, 'Armar y desarmar una carpa y hacer una cama de campaña.', 0, 8, 1, 1),
(24, 'Saber diez reglas para realizar caminatas y qué hacer cuando se está perdido.', 0, 8, 1, 1),
(25, 'Aprender las señales de rastro de pista. Ser capaz de diseñar un rastro de 2 Km para que otros puedan seguir la pista, y ser capaz de seguir la misma senda.', 0, 8, 1, 1),
(26, 'Completar una especialidad en Artes Manuales.', 1, 9, 1, 1),
(27, 'Tener 11 años de edad.', 0, 10, 1, 1),
(28, 'Ser miembro activo del Club de Conquistadores.', 0, 10, 1, 1),
(29, 'Aprender o revisar el significado del Voto del Conquistador e ilustrarlo de una manera interesante.', 0, 10, 1, 1),
(30, 'Leer el libro "Por la Gracia de Dios".', 0, 10, 1, 1),
(31, 'Tener un certificado vigente del curso de lectura y escribir por lo menos un párrafo de resumen de uno de los libros.', 0, 10, 1, 1),
(32, 'Memorizar los Libros del Nuevo Testamento y saber las cuatro áreas en que estos libros están agrupados. Demostrar habilidad en encontrar cualquiera de esos libros.', 0, 11, 1, 1),
(33, 'Memorizar un texto de la Biblia en cada una de las siete categorías mencionadas a continuación:', 0, 11, 1, 1),
(34, 'En consulta con su consejero, escoger uno de los siguientes temas y mostrar su conocimiento sobre las enseñanzas de Jesús en una de las siguientes formas: Intercambiando ideas con su consejero, Actividad que integre a todo el grupo, Disertación.', 0, 11, 1, 1),
(35, 'Lea los Evangelios de Mateo y Marcos en cualquier traducción. Comprométase a memorizar dos de los versículos siguientes:', 0, 11, 1, 1),
(36, 'En consulta con tu líder, planee en servir a lo menos 2 horas a la comunidad demostrando una conducta consistente, un compañerismo real hacia una persona.', 0, 12, 1, 1),
(37, 'Pase medio día participando en un proyecto que beneficie a la comunidad o a la iglesia.', 0, 12, 1, 1),
(38, 'Discuta el principio y demuestre el significado del respeto hacia las personas de diferentes culturas y géneros.', 0, 13, 1, 1),
(39, 'Memorice y explique I Corintios 9:24-27.', 0, 14, 1, 1),
(40, 'Discuta con tu líder sobre como las aptitudes físicas y ejercicios regulares ayudan a tener una vida saludable.', 0, 14, 1, 1),
(41, 'Aprenda sobre los maleficios del tabaco en la salud y aptitudes, y escriba su propio voto de compromiso de abstención del uso del tabaco.', 0, 14, 1, 1),
(42, 'Complete la Especialidad de Natación II.', 1, 14, 1, 1),
(43, 'Planee y conduzca un servicio devocional para su grupo.', 0, 15, 1, 1),
(44, 'Ayude a su Unidad o a su Club a planificar una actividad como una fiesta, caminata o un campamento de fin de semana.', 0, 15, 1, 1),
(45, 'Participe en juegos o en una caminata de una hora en la naturaleza.', 0, 16, 1, 1),
(46, 'Complete una de las siguientes Especialidades', 0, 16, 1, 1),
(47, 'Revise el estudio de la Creación, y haga una observación de los siete días de la creación focalizando que fue lo creado en ese día.', 0, 16, 1, 1),
(48, 'Encuentre los 8 puntos cardinales sin la ayuda de una brújula.', 0, 17, 1, 1),
(49, 'Pernoctar dos noches en campamento.', 0, 17, 1, 1),
(50, 'Aprenda o revise los nudos de Amigo. Ate y aprenda el uso práctico de los siguientes nudos: Vuelta de Escota, Margarita, Pescador, Vuelta de Braza, Tensor. Aprenda también a atar y el uso práctico de los cuatro tipos de amarras.', 0, 17, 1, 1),
(51, 'Pase el test de Primeros Auxilios de Compañero.', 0, 17, 1, 1),
(52, 'Complete una de las Especialidades de Artes Manuales antes no realizada.', 0, 18, 1, 1),
(53, 'Tener un mínimo de 12 años de edad.', 0, 19, 1, 1),
(54, 'Ser miembro activo del Club de Conquistadores y de la Sociedad de Jóvenes.', 0, 19, 1, 1),
(55, 'Aprender o repasar el significado de la Ley de los Conquistadores, y demostrar que lo comprende participando en una de las siguientes actividades: diálogo, mesa redonda, composición escrita o proyecto a su elección.', 0, 19, 1, 1),
(56, 'Leer el libro Por la Gracia de Dios", si no lo ha leído antes.', 0, 19, 1, 1),
(57, 'Tener el certificado del Curso de Lectura y escribir un párrafo resumen de cada libro leído.', 0, 19, 1, 1),
(58, 'Familiarizarse con el uso de la Concordancia Bíblica.', 0, 20, 1, 1),
(59, 'Memorizar un texto de la Biblia en cada una de las siete categorías mencionadas a continuación:', 0, 20, 1, 1),
(60, 'Lea los evangelios de Lucas y Juan en cualquier traducción, y discuta con su grupo tres de los siguientes temas:', 0, 20, 1, 1),
(61, 'Elija en consulta con su líder una de las siguientes áreas:', 0, 20, 1, 1),
(62, 'Comparta su entendimiento de cómo Jesús salva individuos usando uno de los sgts métodos:', 0, 20, 1, 1),
(63, 'Memorizar y explicar Proverbios 20:1 y Proverbios 23:29-32.', 0, 20, 1, 1),
(64, 'Familiarizarse con los servicios comunitarios de su área y ayudar en por lo menos uno.', 0, 21, 1, 1),
(65, 'Participar por lo menos en tres programas de la Iglesia.', 0, 21, 1, 1),
(66, 'Participar de un panel o representación hablando sobre el poder cohercitivo de grupo y la influencia sobre sus decisiones.', 0, 22, 1, 1),
(67, 'Hacer una visita a la oficina municipal o visitar a un oficial de la comunidad, explicando cinco maneras en las cuales Ud. podrá cooperar con él.', 0, 22, 1, 1),
(68, 'Completar una de las siguientes actividades, y estipule un Voto en elección de una vida sin alcohol:', 0, 23, 1, 1),
(69, 'Guíe a su club en la apertura de la reunión semanal o en un programa de Escuela Sabática.', 0, 24, 1, 1),
(70, 'Ayuda al plan tu unidad o club a hacer actividades como un proyecto para niños huérfanos, embellecimiento de la comunidad, etc. y llevar a cabo la actividad.', 0, 24, 1, 1),
(71, 'Identificar, Cruz del Sur, Centauro, Orión. Saber el significado espiritual de la constelación Orión como se escribió en los Primeros Escritos.', 0, 25, 1, 1),
(72, 'Completar una de las siguientes especialidades:', 0, 25, 1, 1),
(73, 'Pernoctar dos noches en un campamento. Repasar seis puntos que deben tomarse en cuenta al escoger un buen sitio para acampar. Planear y cocinar dos comidas.', 0, 26, 1, 1),
(74, 'Pase el test de Primeros Auxilios de Explorador.', 0, 26, 1, 1),
(75, 'Explicar lo que es un mapa topográfico, qué espero encontrar en él y sus usos. Identificar por lo menos veinte señales y símbolos que se usan en estos mapas.', 0, 26, 1, 1),
(76, 'Completar una Especialidad en Artes Domésticas o Manuales que no haya aprendido anteriormente.', 1, 27, 1, 1),
(77, 'Tener un mínimo de 13 años de edad.', 0, 28, 1, 1),
(78, 'Memorizar y entender el Lema y Blanco del Joven Adventista.', 0, 28, 1, 1),
(79, 'Ser un miembro activo del Club de Conquistadores.', 0, 28, 1, 1),
(80, 'Seleccione y lea tres libros de la lista del Club de Lectura para menores del año en curso.', 0, 28, 1, 1),
(81, 'Descubrir en un grupo de discusión:', 0, 29, 1, 1),
(82, 'Participe en el programa de marcar la Biblia en la inspiración de la Biblia.', 0, 29, 1, 1),
(83, 'Matricule, a lo menos, 3 personas en un Curso Bíblico por Correspondencia.', 0, 29, 1, 1),
(84, 'Memorizar un texto de la Biblia en cada una de las siete categorías mencionadas a continuación:', 0, 29, 1, 1),
(85, 'Bajo la dirección de su líder, participe en, a lo menos, dos tipos de programas de servicio a la comunidad.', 0, 30, 1, 1),
(86, 'Con la ayuda de un amigo, pase un día completo (o, por lo menos, 8 horas) trabajando en un proyecto para su iglesia, escuela o comunidad.', 0, 30, 1, 1),
(87, 'En una discusión de grupo y un auto examen, verifique sus actitudes en dos de los siguientes tópicos:', 0, 31, 1, 1),
(88, 'Discuta los principios de la salud física. Dé un programa de ejercicios diarios que puede realizar. Escriba y firme un voto de compromiso personal para un programa regular de ejercicios.', 0, 32, 1, 1),
(89, 'Discuta las ventajas naturales de vivir con el estilo del Cristiano Adventista que está de acuerdo con los principios bíblicos.', 0, 32, 1, 1),
(90, 'Asistir, a lo menos, una Junta Directiva de la Iglesia. Prepare un pequeño informe para discusión en su grupo.', 0, 33, 1, 1),
(91, 'Con su grupo, haga planes para, por lo menos, una actividad social a cada trimestre.', 0, 33, 1, 1),
(92, 'Revisar la historia del Diluvio y estudie, por lo menos, 3 fósiles diferentes, explique su origen y relaciónelos con el quebrantamiento de la Ley de Dios.', 0, 34, 1, 1),
(93, 'Complete una Especialidad de la Naturaleza no cumplida anteriormente.', 1, 34, 1, 1),
(94, 'Construir y demostrar el uso de un horno reflector, cocinando algo en él.', 0, 35, 1, 1),
(95, 'Participar en un campamento por dos noches. Ser capaz de empacar su mochila, (punto 6 especialidad de escursioinismo) incluyendo utensilios personales y comida suficiente para su participación en éste campamento.', 0, 35, 1, 1),
(96, 'Pase el test de Primeros Auxilios de Orientador.', 0, 35, 1, 1),
(97, 'Completar una Especialidad en Actividades Misioneras, Vocacionales o Industrias Agrícola Ganadera, que no haya aprendido anteriormente.', 1, 36, 1, 1),
(98, 'Haber cumplido 14 años de edad.', 0, 37, 1, 1),
(99, 'Por medio de la memorización y discusión, explicar el significado del Voto JA.', 0, 37, 1, 1),
(100, 'Ser miembro activo del Club de Conquistadores.', 0, 37, 1, 1),
(101, 'Seleccionar y leer tres libros de tu elección del Club del Libro Juvenil.', 0, 37, 1, 1),
(102, 'Estudiar el trabajo del Espíritu Santo, cómo Él se relaciona con la humanidad y discutir su participación en el crecimiento espiritual.', 0, 38, 1, 1),
(103, 'A través de la discusión y estudio en grupo aumentar tu conocimiento sobre los eventos de los últimos días que culminarán con la Segunda Venida de Cristo.', 0, 38, 1, 1),
(104, 'Por medio de estudio y evidencia bíblica descubrir el verdadero significado de la observancia del sábado.', 0, 38, 1, 1),
(105, 'Memorizar un texto de la Biblia en cada una de las siete categorías mencionadas a continuación:', 0, 38, 1, 1),
(106, 'Como grupo o individualmente, invitar a un amigo para una actividad social de tu iglesia o de tu Campo.', 0, 39, 1, 1),
(107, 'Como Grupo o individualmente, ayudar a organizar y participar en un proyecto de servicio a otros.', 0, 39, 1, 1),
(108, 'Discutir cómo la juventud adventista se relaciona en lo cotidiano con las personas, en situaciones, contactos y asociaciones.', 0, 39, 1, 1),
(109, 'Por medio del estudio personal y discusión en grupo, examinar sus actitudes hacia dos de los siguientes tópicos:', 0, 40, 1, 1),
(110, 'Hacer una lista y discutir las necesidades de los discapacitados y ayudar a planear y participar en una fiesta para ellos.', 0, 40, 1, 1),
(111, 'Completar las siguientes actividades:', 0, 41, 1, 1),
(112, 'Organizar una reunión social sobre salud. Incluya principios de Salud, pequeños discursos, exhibiciones, etc.', 0, 41, 1, 1),
(113, 'Discutir y preparar un organigrama de la iglesia local y hacer una lista de las funciones de los departamentos.', 0, 42, 1, 1),
(114, 'Participar en programas de la iglesia local en dos ocasiones, con dos departamentos de la iglesia.', 0, 42, 1, 1),
(115, 'Cumplir los requisitos 3, 5 y 6 de la especialidad Mayordomía Cristiana.', 0, 42, 1, 1),
(116, 'Completar la especialidad de Ejercicios y Marchas.', 1, 42, 1, 1),
(117, 'Recapitular la historia de Nicodemo y relacionarla con el ciclo de vida de la mariposa o diseñar un ciclo de vida de la oruga o larva dando el significado espiritual.', 0, 43, 1, 1),
(118, 'Completar una especialidad de la naturaleza no conseguida antes.', 1, 43, 1, 1),
(119, 'Participar en grupo de no menos de cuatro personas, incluyendo a un adulto de experiencia como consejero en una caminata de 25 km. Y acampar una noche al aire libre o en carpa. Los planes de esta expedición deben ser un esfuerzo combinado del grupo. Llevar toda la comida que necesitan. Basado en las', 0, 44, 1, 1),
(120, 'Completar una especialidad de recreación que no haya hecho antes.', 1, 44, 1, 1),
(121, 'Pasar una prueba de Primeros Auxilios avanzado.', 0, 44, 1, 1),
(122, 'Completar una especialidad en una de las siguientes áreas: Actividades Misioneras, Salud y Ciencia, Artes Domésticas, Actividades al Aire Libre no conseguida anteriormente.', 1, 45, 1, 1),
(123, 'Tener un mínimo de 15 años de edad.', 0, 46, 1, 1),
(124, 'Ser miembro activo del Club de Conquistadores.', 0, 46, 1, 1),
(125, 'Memorizar y explicar el voto de fidelidad a la Biblia .', 0, 46, 1, 1),
(126, 'Haber leído el libro Palabras de Vida del Gran Maestro.', 0, 46, 1, 1),
(127, 'Tener el certificado del Curso de Lectura para Jóvenes del año en curso, resumirlo en un párrafo', 0, 46, 1, 1),
(128, 'Leer un libro sobre la historia de la Iglesia Adventista, resaltando especialmente a su país.', 0, 46, 1, 1),
(129, 'Leer el libro “Nuestra Herencia”', 0, 46, 1, 1),
(130, 'Explicar cómo puede un cristiano tener los dones espirituales descritos por Pablo a los Corintios.', 0, 47, 1, 1),
(131, 'Estudiar y debatir sobre cómo el servicio del santuario en el Antiguo Testamento señalaba a la cruz y el ministerio personal de Jesús.', 0, 47, 1, 1),
(132, 'Leer y resumir tres historias de pioneros adventistas. Contar estas historias en la reunión del club, en el culto JA o en la Escuela Sabática.', 0, 47, 1, 1),
(133, 'Memorizar un texto de la Biblia en cada una de las siete categorías mencionadas a continuación:', 0, 47, 1, 1),
(134, 'Ayudar a organizar y participar en una de las siguientes actividades:', 0, 48, 1, 1),
(135, 'Participar en un debate sobre Evangelismo Personal, y colocar principios en práctica en una situación real.', 0, 48, 1, 1),
(136, 'Hacer un diagrama denominacional de la organización con detalles especiales sobre la División Sudamericana.', 0, 49, 1, 1),
(137, 'Participar de un curso para consejeros o convención de liderazgo para conquistadores coordinada por su Asociación/Misión o seis reuniones de la directiva de su club.', 0, 49, 1, 1),
(138, 'Planificar y enseñar por lo menos dos requisitos de una especialidad a un grupo de conquistadores.', 0, 49, 1, 1),
(139, 'Conocer fechas y detalles del surgimiento del Club de Conquistadores en tu país.', 0, 50, 1, 1),
(140, 'Trazar el desarrollo de la Iglesia Adventista en tu Unión o país.', 0, 50, 1, 1),
(141, 'Conocer la historia de tu iglesia local.', 0, 50, 1, 1),
(142, 'Examina tus aptitudes hacia dos de los siguientes tópicos por medio de la discusión en grupo e investigación personal:', 0, 51, 1, 1),
(143, 'Asistir a una conferencia o clase y examinar sus actitudes en relación com dos de los siguientes temas:', 0, 52, 1, 1),
(144, 'Hacer una presentación sobre los ocho remedios naturales dados por Dios.', 0, 53, 1, 1),
(145, 'Completar una de las siguientes actividades:', 0, 53, 1, 1),
(146, 'Pernoctar dos noches en un campamento, discutir la clase de equipo que necesitan llevar.', 0, 54, 1, 1),
(147, 'Planear y cocinar al aire libre en forma satisfactoria tres diferentes platos.', 0, 54, 1, 1),
(148, 'Completar un objeto hecho de amarras y cuerdas, como una torre, puentes, etc.', 0, 54, 1, 1),
(149, 'Completar una especialidad que no haya hecho anteriormente y que apunta hacia la maestría en artes recreativas, acuaticas, deportes, vida primitiva o de naturaleza.', 1, 54, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunionlocal`
--

CREATE TABLE IF NOT EXISTS `reunionlocal` (
  `idReunionLocal` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `club` int(10) NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subrequisitos`
--

CREATE TABLE IF NOT EXISTS `subrequisitos` (
  `idSubRequisito` int(10) NOT NULL,
  `idRequisitoClase` int(10) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `esEspecialidad` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subrequisitos`
--

INSERT INTO `subrequisitos` (`idSubRequisito`, `idRequisitoClase`, `descripcion`, `esEspecialidad`) VALUES
(1, 7, 'Grandes Pasajes:  1) Éxodo 20:13-17. 2) Mateo 5:3-12. 3) Salmos 8:5-9.', 0),
(2, 7, 'Salvación:  1) Eclesiastés 12:1. 2) Juan 3:16. 3) Ezequiel 33:11.', 0),
(3, 7, 'Doctrina:  1) Juan 10:10 - 2) c II Timoteo 3:15 - 3) c I Tesalonicenses 4:16', 0),
(4, 7, 'Oración:  1) Mateo 6:9-13 - 2) Marcos 1:35 - 3) I Samuel 12:33', 0),
(5, 7, 'Relaciones:  1) Lucas 2:52 - 2) Lucas 4:16 - 3) Efesios 6:1', 0),
(6, 7, 'Comportamiento:  1) Proverbios 17:22 - 2) Proverbios 12:22 - 3) Filipenses 4:4', 0),
(7, 7, 'Promesa/Alabanza:  1) Salmos 107:1 - 2) Salmos 103:13 - 3) Filipenses 4:19', 0),
(8, 9, 'Visitar a alguien que necesita amistad', 0),
(9, 9, 'Ayudar a alguien con necesidades.', 0),
(10, 9, 'Con la colaboración de otros, dedicar medio día en un proyecto de la escuela o iglesia de ayuda para la comunidad.', 0),
(11, 13, 'Discutir los principios de temperancia en la vida de Daniel o participar en una presentación o escenificación de Daniel 1.', 0),
(12, 13, 'Saber de memoria y explicar Daniel 1:8 y/o firmar el voto adecuado, o crear el propio voto mostrando por qué quiere seguir un estilo de vida en armonía con los verdaderos principios de la temperancia.', 0),
(13, 18, 'Gatos', 1),
(14, 18, 'Perros', 1),
(15, 18, 'Mamíferos', 1),
(16, 18, 'Semillas', 1),
(17, 18, 'Aves como mascotas', 1),
(18, 33, 'Grandes pasajes:  1) Salmos 119:11 - 2) Isaías 43:12 - 3) Mateo 28:19-20', 0),
(19, 33, 'Salvación:  1) Juan 1:1-3, 14 - 2) Lucas 19:10 - 3) Salmos 103:10-12', 0),
(20, 33, 'Doctrina:  1) Isaías 1:18 - 2) Juan 1:12-13 - 3) I Timoteo 6:6-8', 0),
(21, 33, 'Oración:  1) I Samuel 15:22 - 2) Romanos 12:1-2 - 3) I Tesalonicenses 5:15', 0),
(22, 33, 'Relaciones:  1) Efesios 1:8-10 - 2) Deuteronomio 6:5 - 3) Hechos 2:38', 0),
(23, 33, 'Comportamiento:  1) Salmos 34:3-4 - 2) Mateo 6:6 - 3) I Pedro 1:3', 0),
(24, 33, 'Promesa/Alabanza:  1) Salmos 56; 35:7 - 2) Salmos 37:3 - 3) Isaías 35:10 4)', 0),
(25, 34, 'Una de las parábolas de Jesús.', 0),
(26, 34, 'Uno de los milagros de Jesús.', 0),
(27, 34, 'El sermón de la montaña.', 0),
(28, 34, 'Un sermón sobre la segunda venida.', 0),
(29, 35, 'Beatitud Mateo 5:3-12', 0),
(30, 35, 'Oración del Señor Mateo 6:9-13', 0),
(31, 35, '2° Venida de Cristo Mateo 24:4-7, 11-14', 0),
(32, 35, 'Misión del Evangelio Mateo 28:18-20', 0),
(33, 59, 'Grandes Pasajes:  1)I Pedro 1:24-25 2) I Reyes 18:21 3)Mateo 24:37-39', 0),
(34, 59, 'Salvación:  1)Mateo 16:24-27 2)Lucas 14:28, 33 3)Proverbios. 28:13', 0),
(35, 59, 'Doctrina :  1) Hechos 1:9-11 2) Eclesiastes. 12:13, 14 3)I Corintios 6:19-20', 0),
(36, 59, 'Oración:  1)Salmos 05:03 2) Salmos 51:03', 0),
(37, 59, 'Relaciones:  1) Josué 13:34-35 2)Proverbios 19:19 3)Juan 15:13', 0),
(38, 59, 'Comportamiento:  1) Colesenses 3:23 2)Proverbios 22:29 3)Filipenses 4:8', 0),
(39, 59, 'Promesa/Alabanza:  1) Proverbios 3:5, 6 2)Salmos 91 3)I Corintios 2:14', 0),
(40, 60, 'Lucas 11:9-13 - Pedid, buscad, llamad', 0),
(41, 60, 'Lucas 21:25-28 - Señales de la Segunda Venida', 0),
(42, 60, 'Lucas 4:16-19 - La lectura de las Sagradas Escrituras', 0),
(43, 60, 'Juan 13:12-17 - Humildad', 0),
(44, 60, 'Juan 14:1-3 - Promesa del Señor', 0),
(45, 60, 'Juan 15:5-8 - Vid y pámpanos', 0),
(46, 61, 'Juan 3 Nicodemo', 0),
(47, 61, 'Juan 4 La mujer samaritana', 0),
(48, 61, 'Lucas 15 El hijo pródigo.', 0),
(49, 61, 'Lucas 10 El buen samaritano', 0),
(50, 61, 'Lucas 19 Zaqueo', 0),
(51, 62, 'Discusión en grupo con su líder.', 0),
(52, 62, 'Dando una charla en la Sociedad de Jóvenes.', 0),
(53, 62, 'Escribiendo un párrafo sobre ello.', 0),
(54, 62, 'Haciendo una serie de afiches o modelos.', 0),
(55, 62, 'Escribiendo un poema o música.', 0),
(56, 68, 'Participar en una discusión del grupo sobre los efectos del alcohol en nuestro cuerpo.', 0),
(57, 68, 'Ver una presentación audiovisual sobre el alcohol y otras drogas, y discutir su efecto sobre el cuerpo humano.', 0),
(58, 81, '¿Qué es Cristiandad?', 0),
(59, 81, '¿Cuáles son las marcas de un verdadero discípulo?', 0),
(60, 81, 'Las fortalezas que envuelven en convertirse en un Cristiano.', 0),
(61, 84, 'Grandes Pasajes:  1) Salmos 119:105 - 2) Colosenses 3:16', 0),
(62, 84, 'Salvación: 1) Juan 03:17 - 2) Gálatas 06:14 - 3) I Juan 03:01-03', 0),
(63, 84, 'Doctrina: 1) Juan 14:01-03 - 2) Marcos 01:27, 28', 0),
(64, 84, 'Oración: 1) Hebreos 11:06 - 2) Santiago 1:5, 6', 0),
(65, 84, 'Relaciones: 1) Proverbios 18:24 - 2) Efesios 4:32 - 3) I Timoteo 4:12', 0),
(66, 84, 'Comportamiento: 1) Gálatas 06:07 - 2) Mateo 07:12 - 3) I Juan 2:15-17', 0),
(67, 84, 'Promesa/Alabanza: 1) Salmos 145:18 - 2) Salmos 27:1  3) Santiago 1:7', 0),
(68, 87, 'Autoestima', 0),
(69, 87, 'Compañerismo', 0),
(70, 87, 'Amistad', 0),
(71, 87, 'Autocontrol', 0),
(72, 105, 'Grandes Pasajes: 1) Jeremías 15:16 - 2) I Timoteo 2:15 - 3) Génesis 2:2, 3', 0),
(73, 105, 'Salvación:  1) Mateo 11:28-30 - 2) Juan 17:3 - 3) Juan 15:5, 7', 0),
(74, 105, 'Doctrina: 1) Hebreos 11:03 - 2) Juan 6:40 - 3) Apocalipsis 21:1-4', 0),
(75, 105, 'Oración: 1) Marcos 11:25 - 2) I Juan 5:14, 15 - 3) Mateo 21:22', 0),
(76, 105, 'Relaciones; 1) I Corintios 13 - 2) Hebreos 20:24, 25 - 3) Gálatas 6:1, 2', 0),
(77, 105, 'Comportamiento: 1) Gálatas 5:22, 23 - 2) Miqueas 6:8 - 3) Isaías 58:13', 0),
(78, 105, 'Promesa/Alabanza:  1) Romanos 8:28 - 2) Salmos 15:1, 2 - 3) Mateo 24:44', 0),
(79, 109, 'Autoestima', 0),
(80, 109, 'Las relaciones humanas - Padres, familiares y otros.', 0),
(81, 109, 'Ganar y Gastar dinero.', 0),
(82, 109, 'La influencia de los compañeros y del medio ambiente.', 0),
(83, 111, 'Preparar un escrito que explique las razones por las cuales has decidido no fumar o tomar bebidas alcohólicas intoxicantes, basándose en información que haya obtenido de las revistas : vida Feliz, Juventud y otras.', 0),
(84, 111, 'Preparar material visual exponiendo los peligros del tabaco y el alcohol. Redactar y firmar un voto de abstinencia del uso del tabaco y de las bebidas alcohólicas.', 0),
(85, 133, 'Grandes Pasajes: 1) II Timoteo 3:15, 16; 2) Romanos 10:17 3) Daniel 8:14', 0),
(86, 133, 'Salvación: 1) Filipenses. 3:7-9 2) I Corintios 5:7, 8 3) I Corintios 6:19, 20', 0),
(87, 133, 'Doctrina: Mateo 24:24-27 2) Eclesiastés 9:5, 6,10; 3)Hebreos. 4:14-16', 0),
(88, 133, 'Oración: 1) Filipenses 4:6, 7 2) Efesios 3:20, 21 3) Mateo 5:44', 0),
(89, 133, 'Relaciones: 1)Hechos 17:26, 27 2) I Pedro. 4:10 3) I Pedro. 03:15', 0),
(90, 133, 'Comportamiento: 1) Lucas 12:15 2) I Corintios 10:31 3) Santiago 4: 7, 8', 0),
(91, 133, 'Promesa/Alabanza: 1) Salmos 46 2) Salmos 55:22 3) I Corintios 10:13', 0),
(92, 134, 'Hacer una visita de cortesía a una persona enferma.', 0),
(93, 134, 'Adoptar a una persona o familia en necesidad y ayudarlos.', 0),
(94, 134, 'Cualquier otro proyecto de su elección, aprobado por su líder.', 0),
(95, 142, 'Como escoger una carrera o profesión.', 0),
(96, 142, 'Nuestra conducta moral.', 0),
(97, 142, 'El noviazgo y el Sexo.', 0),
(98, 142, 'Como escoger un compañero(a) para la vida.', 0),
(99, 143, 'La importancia de la elección profesional.', 0),
(100, 143, 'Cómo relacionarse con los padres.', 0),
(101, 143, 'La elección de la persona correcta para enamorar.', 0),
(102, 143, 'El plan de Dios para el sexo.', 0),
(103, 145, 'Escribir una poesía o artículo para ser divulgado en una revista, boletín o periódico de la iglesia.', 0),
(104, 145, 'Individualmente o en grupo, organizar y participar en una Carrera Rústica o actividad similar. Presentar anticipadamente su programa de entrenamiento físico para este evento.', 0),
(105, 145, 'Leer las páginas 102-125 del libro “Temperancia” de Elena G. de White, y preparar un trabajo con 10 textos especiales seleccionados de la lectura.', 0),
(106, 145, 'Completar la especialidad de Nutrición.', 1),
(107, 145, 'Liderar un grupo para la especialidad de Cultura Física.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTarea` int(10) NOT NULL,
  `tipoTarea` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) NOT NULL,
  `tituloTarea` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcionTarea` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fechaLimite` date NOT NULL,
  `periodo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodesangre`
--

CREATE TABLE IF NOT EXISTS `tipodesangre` (
  `idTipoDeSangre` int(10) NOT NULL,
  `tipoDeSangre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uniones`
--

CREATE TABLE IF NOT EXISTS `uniones` (
  `idUnion` int(11) NOT NULL,
  `nombreUnion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `uniones`
--

INSERT INTO `uniones` (`idUnion`, `nombreUnion`) VALUES
(1, 'Unión Mexicana del Norte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `sexo`, `correo`, `contrasena`) VALUES
(1, 'Daniel', 'López', 'García', 'masculino', 'daniel@sacja.com', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f'),
(6, 'Gisel Saraí', 'Zazueta', 'Valenzuela', 'femenino', 'gisel@sacja.com', '04b7c4696494b7b3b928a6cb112407814bf39c91'),
(8, 'Wilson', 'Medina', '', 'masculino', 'wilson@sacja.com', 'b2ffdbeb87e8e6331d350b482b328d309bc5a321'),
(9, 'Carlos Daniel', 'Mendoza', 'Ruíz', 'masculino', 'carlos@sacja.com', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64'),
(10, 'Raquel', 'López', 'García', 'femenino', 'raquel@sacja.com', '523fd98c83528188555f43a5a82b4b2e6ea61ebf'),
(11, 'Alexa', 'Villagrana', 'López', 'femenino', 'alexa@sacja.com', 'dce90bef6aa1f62abf5ea08ae5e6b30ba1cb9e6c'),
(12, 'Gustavo', 'Ruíz', 'López', 'masculino', 'gustavo@sacja.com', 'beac5f8171fcde5e2ec734cc5d25d03e7362e8de'),
(13, 'David', 'López', 'González', 'masculino', 'david@sacja.com', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634'),
(14, 'Lizeth', 'López', 'de León', 'femenino', 'lizeth@sacja.com', 'f22f65b7648b39ed9a143ee135e879244f79cc36'),
(15, 'Paulina', 'Bonanni', 'Jerónimo', 'femenino', 'paulina@sacja.com', '0c0da6ec98405b1849eaf04c9be0660c6df40c89'),
(16, 'Jorge Alberto', 'Toloza', 'Hernández', 'masculino', 'toloza@sacja.com', '3262794ceadcbb0c46eee4e6d48fad28163de35c'),
(17, 'Iván', 'Sánchez', 'Domínguez', 'masculino', 'ivan@sacja.com', 'a15f8b81a160b4eebe5c84e9e3b65c87b9b2f18e'),
(18, 'José Alberto', 'López', 'López', 'masculino', 'jose@sacja.com', '4a3487e57d90e2084654b6d23937e75af5c8ee55'),
(19, 'Alfonso', 'López', 'Torres', 'masculino', 'alfonso@sacja.com', 'c90d2c47658527c7269e392e5667d767d36be1af');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE IF NOT EXISTS `vacunas` (
  `idVacuna` int(10) NOT NULL,
  `vacuna` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD PRIMARY KEY (`idAlergia`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idArchivo`);

--
-- Indices de la tabla `asistenciaeventos`
--
ALTER TABLE `asistenciaeventos`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `asociaciones_misiones`
--
ALTER TABLE `asociaciones_misiones`
  ADD PRIMARY KEY (`idAsociacion`);

--
-- Indices de la tabla `categoriaclases`
--
ALTER TABLE `categoriaclases`
  ADD PRIMARY KEY (`idCategoriaClases`);

--
-- Indices de la tabla `categoriasespecialidades`
--
ALTER TABLE `categoriasespecialidades`
  ADD PRIMARY KEY (`idCategoriaEspecialidad`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`idClase`);

--
-- Indices de la tabla `clasesterminadas`
--
ALTER TABLE `clasesterminadas`
  ADD PRIMARY KEY (`idClaseTerminada`);

--
-- Indices de la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`idClub`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`idDistrito`);

--
-- Indices de la tabla `documentosclub`
--
ALTER TABLE `documentosclub`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `egresosclub`
--
ALTER TABLE `egresosclub`
  ADD PRIMARY KEY (`idEgreso`);

--
-- Indices de la tabla `enemergencia`
--
ALTER TABLE `enemergencia`
  ADD PRIMARY KEY (`idEnEmergencia`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`idEnfermedad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `especialidadesclub`
--
ALTER TABLE `especialidadesclub`
  ADD PRIMARY KEY (`idEspecialidadClub`);

--
-- Indices de la tabla `especialidadesterminadas`
--
ALTER TABLE `especialidadesterminadas`
  ADD PRIMARY KEY (`idEspecialidadTerminada`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  ADD PRIMARY KEY (`idIglesia`);

--
-- Indices de la tabla `ingresosclub`
--
ALTER TABLE `ingresosclub`
  ADD PRIMARY KEY (`idIngreso`);

--
-- Indices de la tabla `librodeoro`
--
ALTER TABLE `librodeoro`
  ADD PRIMARY KEY (`idLibro`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`idDirectiva`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `periodosanuales`
--
ALTER TABLE `periodosanuales`
  ADD PRIMARY KEY (`idPeriodoAnual`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermiso`);

--
-- Indices de la tabla `requisitosclase`
--
ALTER TABLE `requisitosclase`
  ADD PRIMARY KEY (`idRequisitosClase`);

--
-- Indices de la tabla `reunionlocal`
--
ALTER TABLE `reunionlocal`
  ADD PRIMARY KEY (`idReunionLocal`);

--
-- Indices de la tabla `subrequisitos`
--
ALTER TABLE `subrequisitos`
  ADD PRIMARY KEY (`idSubRequisito`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idTarea`);

--
-- Indices de la tabla `tipodesangre`
--
ALTER TABLE `tipodesangre`
  ADD PRIMARY KEY (`idTipoDeSangre`);

--
-- Indices de la tabla `uniones`
--
ALTER TABLE `uniones`
  ADD PRIMARY KEY (`idUnion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`idVacuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alergias`
--
ALTER TABLE `alergias`
  MODIFY `idAlergia` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `idArchivo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asistenciaeventos`
--
ALTER TABLE `asistenciaeventos`
  MODIFY `idEvento` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asociaciones_misiones`
--
ALTER TABLE `asociaciones_misiones`
  MODIFY `idAsociacion` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categoriaclases`
--
ALTER TABLE `categoriaclases`
  MODIFY `idCategoriaClases` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `categoriasespecialidades`
--
ALTER TABLE `categoriasespecialidades`
  MODIFY `idCategoriaEspecialidad` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `idClase` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `clasesterminadas`
--
ALTER TABLE `clasesterminadas`
  MODIFY `idClaseTerminada` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clubes`
--
ALTER TABLE `clubes`
  MODIFY `idClub` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `idDistrito` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `documentosclub`
--
ALTER TABLE `documentosclub`
  MODIFY `idDocumento` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `egresosclub`
--
ALTER TABLE `egresosclub`
  MODIFY `idEgreso` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enemergencia`
--
ALTER TABLE `enemergencia`
  MODIFY `idEnEmergencia` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `idEnfermedad` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `idEspecialidad` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=274;
--
-- AUTO_INCREMENT de la tabla `especialidadesclub`
--
ALTER TABLE `especialidadesclub`
  MODIFY `idEspecialidadClub` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidadesterminadas`
--
ALTER TABLE `especialidadesterminadas`
  MODIFY `idEspecialidadTerminada` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEvento` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  MODIFY `idIglesia` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ingresosclub`
--
ALTER TABLE `ingresosclub`
  MODIFY `idIngreso` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `librodeoro`
--
ALTER TABLE `librodeoro`
  MODIFY `idLibro` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `idDirectiva` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `periodosanuales`
--
ALTER TABLE `periodosanuales`
  MODIFY `idPeriodoAnual` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idPermiso` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `requisitosclase`
--
ALTER TABLE `requisitosclase`
  MODIFY `idRequisitosClase` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT de la tabla `reunionlocal`
--
ALTER TABLE `reunionlocal`
  MODIFY `idReunionLocal` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subrequisitos`
--
ALTER TABLE `subrequisitos`
  MODIFY `idSubRequisito` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `idTarea` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipodesangre`
--
ALTER TABLE `tipodesangre`
  MODIFY `idTipoDeSangre` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `uniones`
--
ALTER TABLE `uniones`
  MODIFY `idUnion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `idVacuna` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
