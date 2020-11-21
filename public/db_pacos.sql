-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 20:12:41
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pacos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `Nombre`) VALUES
(1, 'Heladeria'),
(2, 'Panaderia'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catplatos`
--

CREATE TABLE `catplatos` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Foto` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catplatos`
--

INSERT INTO `catplatos` (`id`, `Descripcion`, `Foto`, `id_restaurante`) VALUES
(1, 'Comida rapida', 17, 9),
(3, 'Verduras y mas', 19, 9),
(4, 'Bebidas', 20, 9),
(5, 'Tacos', 21, 9),
(6, 'Pan de dulce', 21, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catxrest`
--

CREATE TABLE `catxrest` (
  `id_Cat` int(11) NOT NULL,
  `id_Rest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `Departamento` int(11) DEFAULT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `Departamento`, `Nombre`) VALUES
(1, 1, 'Antioquia'),
(2, 2, 'Medellí'),
(3, 3, 'Abejorral'),
(4, 4, 'Abriaqu?\r'),
(5, 5, 'Alejandrí'),
(6, 6, 'Amag?\r'),
(7, 7, 'Amalfi'),
(8, 8, 'Andes'),
(9, 9, 'Angelópoli'),
(10, 10, 'Angostura'),
(11, 11, 'Anor?\r'),
(12, 12, 'Santafé de Antioqui'),
(13, 13, 'Anza'),
(14, 14, 'Apartad?\r'),
(15, 15, 'Arboletes'),
(16, 16, 'Argelia'),
(17, 17, 'Armenia'),
(18, 18, 'Barbosa'),
(19, 19, 'Belmira'),
(20, 20, 'Bello'),
(21, 21, 'Betania'),
(22, 22, 'Betulia'),
(23, 23, 'Ciudad Bolíva'),
(24, 24, 'Briceñ'),
(25, 25, 'Buritic?\r'),
(26, 26, 'Cácere'),
(27, 27, 'Caicedo'),
(28, 28, 'Caldas'),
(29, 29, 'Campamento'),
(30, 30, 'Cañasgorda'),
(31, 31, 'Caracol?\r'),
(32, 32, 'Caramanta'),
(33, 33, 'Carepa'),
(34, 34, 'El Carmen de Viboral'),
(35, 35, 'Carolina'),
(36, 36, 'Caucasia'),
(37, 37, 'Chigorod?\r'),
(38, 38, 'Cisneros'),
(39, 39, 'Cocorn?\r'),
(40, 40, 'Concepció'),
(41, 41, 'Concordia'),
(42, 42, 'Copacabana'),
(43, 43, 'Dabeiba'),
(44, 44, 'Don Matía'),
(45, 45, 'Ebéjic'),
(46, 46, 'El Bagre'),
(47, 47, 'Entrerrios'),
(48, 48, 'Envigado'),
(49, 49, 'Fredonia'),
(50, 50, 'Frontino'),
(51, 51, 'Giraldo'),
(52, 52, 'Girardota'),
(53, 53, 'Gómez Plat'),
(54, 54, 'Granada'),
(55, 55, 'Guadalupe'),
(56, 56, 'Guarne'),
(57, 57, 'Guatap?\r'),
(58, 58, 'Heliconia'),
(59, 59, 'Hispania'),
(60, 60, 'Itagui'),
(61, 61, 'Ituango'),
(62, 62, 'Jardí'),
(63, 63, 'Jeric?\r'),
(64, 64, 'La Ceja'),
(65, 65, 'La Estrella'),
(66, 66, 'La Pintada'),
(67, 67, 'La Unió'),
(68, 68, 'Liborina'),
(69, 69, 'Maceo'),
(70, 70, 'Marinilla'),
(71, 71, 'Montebello'),
(72, 72, 'Murind?\r'),
(73, 73, 'Mutat?\r'),
(74, 74, 'Nariñ'),
(75, 75, 'Necocl?\r'),
(76, 76, 'Nech?\r'),
(77, 77, 'Olaya'),
(78, 78, 'Peño'),
(79, 79, 'Peque'),
(80, 80, 'Pueblorrico'),
(81, 81, 'Puerto Berrí'),
(82, 82, 'Puerto Nare'),
(83, 83, 'Puerto Triunfo'),
(84, 84, 'Remedios'),
(85, 85, 'Retiro'),
(86, 86, 'Rionegro'),
(87, 87, 'Sabanalarga'),
(88, 88, 'Sabaneta'),
(89, 89, 'Salgar'),
(90, 90, 'San Andrés de Cuerqu?\r'),
(91, 91, 'San Carlos'),
(92, 92, 'San Francisco'),
(93, 93, 'San Jerónim'),
(94, 94, 'San José de La Monta?\r'),
(95, 95, 'San Juan de Urab?\r'),
(96, 96, 'San Luis'),
(97, 97, 'San Pedro'),
(98, 98, 'San Pedro de Uraba'),
(99, 99, 'San Rafael'),
(100, 100, 'San Roque'),
(101, 101, 'San Vicente'),
(102, 102, 'Santa Bárbar'),
(103, 103, 'Santa Rosa de Osos'),
(104, 104, 'Santo Domingo'),
(105, 105, 'El Santuario'),
(106, 106, 'Segovia'),
(107, 107, 'Sonson'),
(108, 108, 'Sopetrá'),
(109, 109, 'Támesi'),
(110, 110, 'Taraz?\r'),
(111, 111, 'Tarso'),
(112, 112, 'Titirib?\r'),
(113, 113, 'Toledo'),
(114, 114, 'Turbo'),
(115, 115, 'Uramita'),
(116, 116, 'Urrao'),
(117, 117, 'Valdivia'),
(118, 118, 'Valparaís'),
(119, 119, 'Vegach?\r'),
(120, 120, 'Venecia'),
(121, 121, 'Vigía del Fuert'),
(122, 122, 'Yal?\r'),
(123, 123, 'Yarumal'),
(124, 124, 'Yolomb?\r'),
(125, 125, 'Yond?\r'),
(126, 126, 'Zaragoza'),
(127, 127, 'Atlántic'),
(128, 128, 'Barranquilla'),
(129, 129, 'Baranoa'),
(130, 130, 'Campo de La Cruz'),
(131, 131, 'Candelaria'),
(132, 132, 'Galapa'),
(133, 133, 'Juan de Acosta'),
(134, 134, 'Luruaco'),
(135, 135, 'Malambo'),
(136, 136, 'Manat?\r'),
(137, 137, 'Palmar de Varela'),
(138, 138, 'Pioj?\r'),
(139, 139, 'Polonuevo'),
(140, 140, 'Ponedera'),
(141, 141, 'Puerto Colombia'),
(142, 142, 'Repeló'),
(143, 143, 'Sabanagrande'),
(144, 144, 'Sabanalarga'),
(145, 145, 'Santa Lucí'),
(146, 146, 'Santo Tomá'),
(147, 147, 'Soledad'),
(148, 148, 'Suan'),
(149, 149, 'Tubar?\r'),
(150, 150, 'Usiacur?\r'),
(151, 151, 'Bogotá, D.C'),
(152, 152, 'Bogotá, D.C'),
(153, 153, 'Bolíva'),
(154, 154, 'Cartagena'),
(155, 155, 'Ach?\r'),
(156, 156, 'Altos del Rosario'),
(157, 157, 'Arenal'),
(158, 158, 'Arjona'),
(159, 159, 'Arroyohondo'),
(160, 160, 'Barranco de Loba'),
(161, 161, 'Calamar'),
(162, 162, 'Cantagallo'),
(163, 163, 'Cicuco'),
(164, 164, 'Córdob'),
(165, 165, 'Clemencia'),
(166, 166, 'El Carmen de Bolíva'),
(167, 167, 'El Guamo'),
(168, 168, 'El Peñ?\r'),
(169, 169, 'Hatillo de Loba'),
(170, 170, 'Magangu?\r'),
(171, 171, 'Mahates'),
(172, 172, 'Margarita'),
(173, 173, 'María La Baj'),
(174, 174, 'Montecristo'),
(175, 175, 'Mompó'),
(176, 176, 'Morales'),
(177, 177, 'Noros?\r'),
(178, 178, 'Pinillos'),
(179, 179, 'Regidor'),
(180, 180, 'Río Viej'),
(181, 181, 'San Cristóba'),
(182, 182, 'San Estanislao'),
(183, 183, 'San Fernando'),
(184, 184, 'San Jacinto'),
(185, 185, 'San Jacinto del Cauca'),
(186, 186, 'San Juan Nepomuceno'),
(187, 187, 'San Martín de Lob'),
(188, 188, 'San Pablo'),
(189, 189, 'Santa Catalina'),
(190, 190, 'Santa Rosa'),
(191, 191, 'Santa Rosa del Sur'),
(192, 192, 'Simit?\r'),
(193, 193, 'Soplaviento'),
(194, 194, 'Talaigua Nuevo'),
(195, 195, 'Tiquisio'),
(196, 196, 'Turbaco'),
(197, 197, 'Turban?\r'),
(198, 198, 'Villanueva'),
(199, 199, 'Zambrano'),
(200, 200, 'Boyac?\r'),
(201, 201, 'Tunja'),
(202, 202, 'Almeida'),
(203, 203, 'Aquitania'),
(204, 204, 'Arcabuco'),
(205, 205, 'Belé'),
(206, 206, 'Berbeo'),
(207, 207, 'Betéitiv'),
(208, 208, 'Boavita'),
(209, 209, 'Boyac?\r'),
(210, 210, 'Briceñ'),
(211, 211, 'Buenavista'),
(212, 212, 'Busbanz?\r'),
(213, 213, 'Caldas'),
(214, 214, 'Campohermoso'),
(215, 215, 'Cerinza'),
(216, 216, 'Chinavita'),
(217, 217, 'Chiquinquir?\r'),
(218, 218, 'Chiscas'),
(219, 219, 'Chita'),
(220, 220, 'Chitaraque'),
(221, 221, 'Chivat?\r'),
(222, 222, 'Ciéneg'),
(223, 223, 'Cómbit'),
(224, 224, 'Coper'),
(225, 225, 'Corrales'),
(226, 226, 'Covarachí'),
(227, 227, 'Cubar?\r'),
(228, 228, 'Cucaita'),
(229, 229, 'Cuítiv'),
(230, 230, 'Chíquiz'),
(231, 231, 'Chivor'),
(232, 232, 'Duitama'),
(233, 233, 'El Cocuy'),
(234, 234, 'El Espino'),
(235, 235, 'Firavitoba'),
(236, 236, 'Floresta'),
(237, 237, 'Gachantiv?\r'),
(238, 238, 'Gameza'),
(239, 239, 'Garagoa'),
(240, 240, 'Guacamayas'),
(241, 241, 'Guateque'),
(242, 242, 'Guayat?\r'),
(243, 243, 'Güic?\r'),
(244, 244, 'Iza'),
(245, 245, 'Jenesano'),
(246, 246, 'Jeric?\r'),
(247, 247, 'Labranzagrande'),
(248, 248, 'La Capilla'),
(249, 249, 'La Victoria'),
(250, 250, 'La Uvita'),
(251, 251, 'Villa de Leyva'),
(252, 252, 'Macanal'),
(253, 253, 'Marip?\r'),
(254, 254, 'Miraflores'),
(255, 255, 'Mongua'),
(256, 256, 'Mongu?\r'),
(257, 257, 'Moniquir?\r'),
(258, 258, 'Motavita'),
(259, 259, 'Muzo'),
(260, 260, 'Nobsa'),
(261, 261, 'Nuevo Coló'),
(262, 262, 'Oicat?\r'),
(263, 263, 'Otanche'),
(264, 264, 'Pachavita'),
(265, 265, 'Páe'),
(266, 266, 'Paipa'),
(267, 267, 'Pajarito'),
(268, 268, 'Panqueba'),
(269, 269, 'Pauna'),
(270, 270, 'Paya'),
(271, 271, 'Paz de Rí'),
(272, 272, 'Pesca'),
(273, 273, 'Pisba'),
(274, 274, 'Puerto Boyac?\r'),
(275, 275, 'Quípam'),
(276, 276, 'Ramiriqu?\r'),
(277, 277, 'Ráquir'),
(278, 278, 'Rondó'),
(279, 279, 'Saboy?\r'),
(280, 280, 'Sáchic'),
(281, 281, 'Samac?\r'),
(282, 282, 'San Eduardo'),
(283, 283, 'San José de Par'),
(284, 284, 'San Luis de Gaceno'),
(285, 285, 'San Mateo'),
(286, 286, 'San Miguel de Sema'),
(287, 287, 'San Pablo de Borbur'),
(288, 288, 'Santana'),
(289, 289, 'Santa Marí'),
(290, 290, 'Santa Rosa de Viterbo'),
(291, 291, 'Santa Sofí'),
(292, 292, 'Sativanorte'),
(293, 293, 'Sativasur'),
(294, 294, 'Siachoque'),
(295, 295, 'Soat?\r'),
(296, 296, 'Socot?\r'),
(297, 297, 'Socha'),
(298, 298, 'Sogamoso'),
(299, 299, 'Somondoco'),
(300, 300, 'Sora'),
(301, 301, 'Sotaquir?\r'),
(302, 302, 'Sorac?\r'),
(303, 303, 'Susacó'),
(304, 304, 'Sutamarchá'),
(305, 305, 'Sutatenza'),
(306, 306, 'Tasco'),
(307, 307, 'Tenza'),
(308, 308, 'Tiban?\r'),
(309, 309, 'Tibasosa'),
(310, 310, 'Tinjac?\r'),
(311, 311, 'Tipacoque'),
(312, 312, 'Toca'),
(313, 313, 'Togü'),
(314, 314, 'Tópag'),
(315, 315, 'Tota'),
(316, 316, 'Tunungu?\r'),
(317, 317, 'Turmequ?\r'),
(318, 318, 'Tuta'),
(319, 319, 'Tutaz?\r'),
(320, 320, 'Umbita'),
(321, 321, 'Ventaquemada'),
(322, 322, 'Viracach?\r'),
(323, 323, 'Zetaquira'),
(324, 324, 'Caldas'),
(325, 325, 'Manizales'),
(326, 326, 'Aguadas'),
(327, 327, 'Anserma'),
(328, 328, 'Aranzazu'),
(329, 329, 'Belalcáza'),
(330, 330, 'Chinchin?\r'),
(331, 331, 'Filadelfia'),
(332, 332, 'La Dorada'),
(333, 333, 'La Merced'),
(334, 334, 'Manzanares'),
(335, 335, 'Marmato'),
(336, 336, 'Marquetalia'),
(337, 337, 'Marulanda'),
(338, 338, 'Neira'),
(339, 339, 'Norcasia'),
(340, 340, 'Pácor'),
(341, 341, 'Palestina'),
(342, 342, 'Pensilvania'),
(343, 343, 'Riosucio'),
(344, 344, 'Risaralda'),
(345, 345, 'Salamina'),
(346, 346, 'Saman?\r'),
(347, 347, 'San Jos?\r'),
(348, 348, 'Supí'),
(349, 349, 'Victoria'),
(350, 350, 'Villamarí'),
(351, 351, 'Viterbo'),
(352, 352, 'Caquet?\r'),
(353, 353, 'Florencia'),
(354, 354, 'Albania'),
(355, 355, 'Belén de Los Andaquie'),
(356, 356, 'Cartagena del Chair?\r'),
(357, 357, 'Curillo'),
(358, 358, 'El Doncello'),
(359, 359, 'El Paujil'),
(360, 360, 'La Montañit'),
(361, 361, 'Milá'),
(362, 362, 'Morelia'),
(363, 363, 'Puerto Rico'),
(364, 364, 'San José del Fragu'),
(365, 365, 'San Vicente del Caguá'),
(366, 366, 'Solano'),
(367, 367, 'Solita'),
(368, 368, 'Valparaís'),
(369, 369, 'Cauca'),
(370, 370, 'Popayá'),
(371, 371, 'Almaguer'),
(372, 372, 'Argelia'),
(373, 373, 'Balboa'),
(374, 374, 'Bolíva'),
(375, 375, 'Buenos Aires'),
(376, 376, 'Cajibí'),
(377, 377, 'Caldono'),
(378, 378, 'Caloto'),
(379, 379, 'Corinto'),
(380, 380, 'El Tambo'),
(381, 381, 'Florencia'),
(382, 382, 'Guachen?\r'),
(383, 383, 'Guapi'),
(384, 384, 'Inz?\r'),
(385, 385, 'Jambal?\r'),
(386, 386, 'La Sierra'),
(387, 387, 'La Vega'),
(388, 388, 'Lópe'),
(389, 389, 'Mercaderes'),
(390, 390, 'Miranda'),
(391, 391, 'Morales'),
(392, 392, 'Padilla'),
(393, 393, 'Paez'),
(394, 394, 'Patí'),
(395, 395, 'Piamonte'),
(396, 396, 'Piendam?\r'),
(397, 397, 'Puerto Tejada'),
(398, 398, 'Purac?\r'),
(399, 399, 'Rosas'),
(400, 400, 'San Sebastiá'),
(401, 401, 'Santander de Quilichao'),
(402, 402, 'Santa Rosa'),
(403, 403, 'Silvia'),
(404, 404, 'Sotara'),
(405, 405, 'Suáre'),
(406, 406, 'Sucre'),
(407, 407, 'Timbí'),
(408, 408, 'Timbiqu?\r'),
(409, 409, 'Toribio'),
(410, 410, 'Totor?\r'),
(411, 411, 'Villa Rica'),
(412, 412, 'Cesar'),
(413, 413, 'Valledupar'),
(414, 414, 'Aguachica'),
(415, 415, 'Agustín Codazz'),
(416, 416, 'Astrea'),
(417, 417, 'Becerril'),
(418, 418, 'Bosconia'),
(419, 419, 'Chimichagua'),
(420, 420, 'Chiriguan?\r'),
(421, 421, 'Curuman?\r'),
(422, 422, 'El Copey'),
(423, 423, 'El Paso'),
(424, 424, 'Gamarra'),
(425, 425, 'Gonzále'),
(426, 426, 'La Gloria'),
(427, 427, 'La Jagua de Ibirico'),
(428, 428, 'Manaure'),
(429, 429, 'Pailitas'),
(430, 430, 'Pelaya'),
(431, 431, 'Pueblo Bello'),
(432, 432, 'Río de Or'),
(433, 433, 'La Paz'),
(434, 434, 'San Alberto'),
(435, 435, 'San Diego'),
(436, 436, 'San Martí'),
(437, 437, 'Tamalameque'),
(438, 438, 'Córdob'),
(439, 439, 'Monterí'),
(440, 440, 'Ayapel'),
(441, 441, 'Buenavista'),
(442, 442, 'Canalete'),
(443, 443, 'Ceret?\r'),
(444, 444, 'Chim?\r'),
(445, 445, 'Chin?\r'),
(446, 446, 'Ciénaga de Or'),
(447, 447, 'Cotorra'),
(448, 448, 'La Apartada'),
(449, 449, 'Lorica'),
(450, 450, 'Los Córdoba'),
(451, 451, 'Momil'),
(452, 452, 'Montelíban'),
(453, 453, 'Moñito'),
(454, 454, 'Planeta Rica'),
(455, 455, 'Pueblo Nuevo'),
(456, 456, 'Puerto Escondido'),
(457, 457, 'Puerto Libertador'),
(458, 458, 'Purísim'),
(459, 459, 'Sahagú'),
(460, 460, 'San Andrés Sotavent'),
(461, 461, 'San Antero'),
(462, 462, 'San Bernardo del Viento'),
(463, 463, 'San Carlos'),
(464, 464, 'San José de Ur'),
(465, 465, 'San Pelayo'),
(466, 466, 'Tierralta'),
(467, 467, 'Tuchí'),
(468, 468, 'Valencia'),
(469, 469, 'Cundinamarca'),
(470, 470, 'Agua de Dios'),
(471, 471, 'Albá'),
(472, 472, 'Anapoima'),
(473, 473, 'Anolaima'),
(474, 474, 'Arbeláe'),
(475, 475, 'Beltrá'),
(476, 476, 'Bituima'),
(477, 477, 'Bojac?\r'),
(478, 478, 'Cabrera'),
(479, 479, 'Cachipay'),
(480, 480, 'Cajic?\r'),
(481, 481, 'Caparrap?\r'),
(482, 482, 'Caqueza'),
(483, 483, 'Carmen de Carupa'),
(484, 484, 'Chaguan?\r'),
(485, 485, 'Chí'),
(486, 486, 'Chipaque'),
(487, 487, 'Choach?\r'),
(488, 488, 'Chocont?\r'),
(489, 489, 'Cogua'),
(490, 490, 'Cota'),
(491, 491, 'Cucunub?\r'),
(492, 492, 'El Colegio'),
(493, 493, 'El Peñ?\r'),
(494, 494, 'El Rosal'),
(495, 495, 'Facatativ?\r'),
(496, 496, 'Fomeque'),
(497, 497, 'Fosca'),
(498, 498, 'Funza'),
(499, 499, 'Fúquen'),
(500, 500, 'Fusagasug?\r'),
(501, 501, 'Gachala'),
(502, 502, 'Gachancip?\r'),
(503, 503, 'Gachet?\r'),
(504, 504, 'Gama'),
(505, 505, 'Girardot'),
(506, 506, 'Granada'),
(507, 507, 'Guachet?\r'),
(508, 508, 'Guaduas'),
(509, 509, 'Guasca'),
(510, 510, 'Guataqu?\r'),
(511, 511, 'Guatavita'),
(512, 512, 'Guayabal de Siquima'),
(513, 513, 'Guayabetal'),
(514, 514, 'Gutiérre'),
(515, 515, 'Jerusalé'),
(516, 516, 'Juní'),
(517, 517, 'La Calera'),
(518, 518, 'La Mesa'),
(519, 519, 'La Palma'),
(520, 520, 'La Peñ'),
(521, 521, 'La Vega'),
(522, 522, 'Lenguazaque'),
(523, 523, 'Macheta'),
(524, 524, 'Madrid'),
(525, 525, 'Manta'),
(526, 526, 'Medina'),
(527, 527, 'Mosquera'),
(528, 528, 'Nariñ'),
(529, 529, 'Nemocó'),
(530, 530, 'Nilo'),
(531, 531, 'Nimaima'),
(532, 532, 'Nocaima'),
(533, 533, 'Venecia'),
(534, 534, 'Pacho'),
(535, 535, 'Paime'),
(536, 536, 'Pandi'),
(537, 537, 'Paratebueno'),
(538, 538, 'Pasca'),
(539, 539, 'Puerto Salgar'),
(540, 540, 'Pul?\r'),
(541, 541, 'Quebradanegra'),
(542, 542, 'Quetame'),
(543, 543, 'Quipile'),
(544, 544, 'Apulo'),
(545, 545, 'Ricaurte'),
(546, 546, 'San Antonio del Tequendama'),
(547, 547, 'San Bernardo'),
(548, 548, 'San Cayetano'),
(549, 549, 'San Francisco'),
(550, 550, 'San Juan de Río Sec'),
(551, 551, 'Sasaima'),
(552, 552, 'Sesquil?\r'),
(553, 553, 'Sibat?\r'),
(554, 554, 'Silvania'),
(555, 555, 'Simijaca'),
(556, 556, 'Soacha'),
(557, 557, 'Sop?\r'),
(558, 558, 'Subachoque'),
(559, 559, 'Suesca'),
(560, 560, 'Supat?\r'),
(561, 561, 'Susa'),
(562, 562, 'Sutatausa'),
(563, 563, 'Tabio'),
(564, 564, 'Tausa'),
(565, 565, 'Tena'),
(566, 566, 'Tenjo'),
(567, 567, 'Tibacuy'),
(568, 568, 'Tibirita'),
(569, 569, 'Tocaima'),
(570, 570, 'Tocancip?\r'),
(571, 571, 'Topaip?\r'),
(572, 572, 'Ubal?\r'),
(573, 573, 'Ubaque'),
(574, 574, 'Villa de San Diego de Ubate'),
(575, 575, 'Une'),
(576, 576, '?tica'),
(577, 577, 'Vergara'),
(578, 578, 'Vian?\r'),
(579, 579, 'Villagóme'),
(580, 580, 'Villapinzó'),
(581, 581, 'Villeta'),
(582, 582, 'Viot?\r'),
(583, 583, 'Yacop?\r'),
(584, 584, 'Zipacó'),
(585, 585, 'Zipaquir?\r'),
(586, 586, 'Choc?\r'),
(587, 587, 'Quibd?\r'),
(588, 588, 'Acand?\r'),
(589, 589, 'Alto Baudo'),
(590, 590, 'Atrato'),
(591, 591, 'Bagad?\r'),
(592, 592, 'Bahía Solan'),
(593, 593, 'Bajo Baud?\r'),
(594, 594, 'Bojaya'),
(595, 595, 'El Cantón del San Pabl'),
(596, 596, 'Carmen del Darien'),
(597, 597, 'Cértegu'),
(598, 598, 'Condoto'),
(599, 599, 'El Carmen de Atrato'),
(600, 600, 'El Litoral del San Juan'),
(601, 601, 'Istmina'),
(602, 602, 'Jurad?\r'),
(603, 603, 'Llor?\r'),
(604, 604, 'Medio Atrato'),
(605, 605, 'Medio Baud?\r'),
(606, 606, 'Medio San Juan'),
(607, 607, 'Nóvit'),
(608, 608, 'Nuqu?\r'),
(609, 609, 'Río Ir'),
(610, 610, 'Río Quit'),
(611, 611, 'Riosucio'),
(612, 612, 'San José del Palma'),
(613, 613, 'Sip?\r'),
(614, 614, 'Tad?\r'),
(615, 615, 'Unguí'),
(616, 616, 'Unión Panamerican'),
(617, 617, 'Huila'),
(618, 618, 'Neiva'),
(619, 619, 'Acevedo'),
(620, 620, 'Agrado'),
(621, 621, 'Aipe'),
(622, 622, 'Algeciras'),
(623, 623, 'Altamira'),
(624, 624, 'Baraya'),
(625, 625, 'Campoalegre'),
(626, 626, 'Colombia'),
(627, 627, 'Elía'),
(628, 628, 'Garzó'),
(629, 629, 'Gigante'),
(630, 630, 'Guadalupe'),
(631, 631, 'Hobo'),
(632, 632, 'Iquira'),
(633, 633, 'Isnos'),
(634, 634, 'La Argentina'),
(635, 635, 'La Plata'),
(636, 636, 'Nátag'),
(637, 637, 'Oporapa'),
(638, 638, 'Paicol'),
(639, 639, 'Palermo'),
(640, 640, 'Palestina'),
(641, 641, 'Pital'),
(642, 642, 'Pitalito'),
(643, 643, 'Rivera'),
(644, 644, 'Saladoblanco'),
(645, 645, 'San Agustí'),
(646, 646, 'Santa Marí'),
(647, 647, 'Suaza'),
(648, 648, 'Tarqui'),
(649, 649, 'Tesalia'),
(650, 650, 'Tello'),
(651, 651, 'Teruel'),
(652, 652, 'Timan?\r'),
(653, 653, 'Villavieja'),
(654, 654, 'Yaguar?\r'),
(655, 655, 'La Guajira'),
(656, 656, 'Riohacha'),
(657, 657, 'Albania'),
(658, 658, 'Barrancas'),
(659, 659, 'Dibulla'),
(660, 660, 'Distracció'),
(661, 661, 'El Molino'),
(662, 662, 'Fonseca'),
(663, 663, 'Hatonuevo'),
(664, 664, 'La Jagua del Pilar'),
(665, 665, 'Maicao'),
(666, 666, 'Manaure'),
(667, 667, 'San Juan del Cesar'),
(668, 668, 'Uribia'),
(669, 669, 'Urumita'),
(670, 670, 'Villanueva'),
(671, 671, 'Magdalena'),
(672, 672, 'Santa Marta'),
(673, 673, 'Algarrobo'),
(674, 674, 'Aracataca'),
(675, 675, 'Ariguan?\r'),
(676, 676, 'Cerro San Antonio'),
(677, 677, 'Chivolo'),
(678, 678, 'Ciénag'),
(679, 679, 'Concordia'),
(680, 680, 'El Banco'),
(681, 681, 'El Piño'),
(682, 682, 'El Reté'),
(683, 683, 'Fundació'),
(684, 684, 'Guamal'),
(685, 685, 'Nueva Granada'),
(686, 686, 'Pedraza'),
(687, 687, 'Pijiño del Carme'),
(688, 688, 'Pivijay'),
(689, 689, 'Plato'),
(690, 690, 'Puebloviejo'),
(691, 691, 'Remolino'),
(692, 692, 'Sabanas de San Angel'),
(693, 693, 'Salamina'),
(694, 694, 'San Sebastián de Buenavist'),
(695, 695, 'San Zenó'),
(696, 696, 'Santa Ana'),
(697, 697, 'Santa Bárbara de Pint'),
(698, 698, 'Sitionuevo'),
(699, 699, 'Tenerife'),
(700, 700, 'Zapayá'),
(701, 701, 'Zona Bananera'),
(702, 702, 'Meta'),
(703, 703, 'Villavicencio'),
(704, 704, 'Acacía'),
(705, 705, 'Barranca de Upí'),
(706, 706, 'Cabuyaro'),
(707, 707, 'Castilla la Nueva'),
(708, 708, 'Cubarral'),
(709, 709, 'Cumaral'),
(710, 710, 'El Calvario'),
(711, 711, 'El Castillo'),
(712, 712, 'El Dorado'),
(713, 713, 'Fuente de Oro'),
(714, 714, 'Granada'),
(715, 715, 'Guamal'),
(716, 716, 'Mapiripá'),
(717, 717, 'Mesetas'),
(718, 718, 'La Macarena'),
(719, 719, 'Uribe'),
(720, 720, 'Lejanía'),
(721, 721, 'Puerto Concordia'),
(722, 722, 'Puerto Gaitá'),
(723, 723, 'Puerto Lópe'),
(724, 724, 'Puerto Lleras'),
(725, 725, 'Puerto Rico'),
(726, 726, 'Restrepo'),
(727, 727, 'San Carlos de Guaroa'),
(728, 728, 'San Juan de Arama'),
(729, 729, 'San Juanito'),
(730, 730, 'San Martí'),
(731, 731, 'Vistahermosa'),
(732, 732, 'Nariñ'),
(733, 733, 'Pasto'),
(734, 734, 'Albá'),
(735, 735, 'Aldana'),
(736, 736, 'Ancuy?\r'),
(737, 737, 'Arboleda'),
(738, 738, 'Barbacoas'),
(739, 739, 'Belé'),
(740, 740, 'Buesaco'),
(741, 741, 'Coló'),
(742, 742, 'Consaca'),
(743, 743, 'Contadero'),
(744, 744, 'Córdob'),
(745, 745, 'Cuaspud'),
(746, 746, 'Cumbal'),
(747, 747, 'Cumbitara'),
(748, 748, 'Chachagü'),
(749, 749, 'El Charco'),
(750, 750, 'El Peño'),
(751, 751, 'El Rosario'),
(752, 752, 'El Tablón de Góm'),
(753, 753, 'El Tambo'),
(754, 754, 'Funes'),
(755, 755, 'Guachucal'),
(756, 756, 'Guaitarilla'),
(757, 757, 'Gualmatá'),
(758, 758, 'Iles'),
(759, 759, 'Imué'),
(760, 760, 'Ipiales'),
(761, 761, 'La Cruz'),
(762, 762, 'La Florida'),
(763, 763, 'La Llanada'),
(764, 764, 'La Tola'),
(765, 765, 'La Unió'),
(766, 766, 'Leiva'),
(767, 767, 'Linares'),
(768, 768, 'Los Andes'),
(769, 769, 'Magü'),
(770, 770, 'Mallama'),
(771, 771, 'Mosquera'),
(772, 772, 'Nariñ'),
(773, 773, 'Olaya Herrera'),
(774, 774, 'Ospina'),
(775, 775, 'Francisco Pizarro'),
(776, 776, 'Policarpa'),
(777, 777, 'Potos?\r'),
(778, 778, 'Providencia'),
(779, 779, 'Puerres'),
(780, 780, 'Pupiales'),
(781, 781, 'Ricaurte'),
(782, 782, 'Roberto Payá'),
(783, 783, 'Samaniego'),
(784, 784, 'Sandon?\r'),
(785, 785, 'San Bernardo'),
(786, 786, 'San Lorenzo'),
(787, 787, 'San Pablo'),
(788, 788, 'San Pedro de Cartago'),
(789, 789, 'Santa Bárbar'),
(790, 790, 'Santacruz'),
(791, 791, 'Sapuyes'),
(792, 792, 'Taminango'),
(793, 793, 'Tangua'),
(794, 794, 'San Andres de Tumaco'),
(795, 795, 'Túquerre'),
(796, 796, 'Yacuanquer'),
(797, 797, 'Norte de Santander'),
(798, 798, 'Cúcut'),
(799, 799, 'Abrego'),
(800, 800, 'Arboledas'),
(801, 801, 'Bochalema'),
(802, 802, 'Bucarasica'),
(803, 803, 'Cácot'),
(804, 804, 'Cachir?\r'),
(805, 805, 'Chinácot'),
(806, 806, 'Chitag?\r'),
(807, 807, 'Convenció'),
(808, 808, 'Cucutilla'),
(809, 809, 'Durania'),
(810, 810, 'El Carmen'),
(811, 811, 'El Tarra'),
(812, 812, 'El Zulia'),
(813, 813, 'Gramalote'),
(814, 814, 'Hacar?\r'),
(815, 815, 'Herrá'),
(816, 816, 'Labateca'),
(817, 817, 'La Esperanza'),
(818, 818, 'La Playa'),
(819, 819, 'Los Patios'),
(820, 820, 'Lourdes'),
(821, 821, 'Mutiscua'),
(822, 822, 'Ocañ'),
(823, 823, 'Pamplona'),
(824, 824, 'Pamplonita'),
(825, 825, 'Puerto Santander'),
(826, 826, 'Ragonvalia'),
(827, 827, 'Salazar'),
(828, 828, 'San Calixto'),
(829, 829, 'San Cayetano'),
(830, 830, 'Santiago'),
(831, 831, 'Sardinata'),
(832, 832, 'Silos'),
(833, 833, 'Teorama'),
(834, 834, 'Tib?\r'),
(835, 835, 'Toledo'),
(836, 836, 'Villa Caro'),
(837, 837, 'Villa del Rosario'),
(838, 838, 'Quindio'),
(839, 839, 'Armenia'),
(840, 840, 'Buenavista'),
(841, 841, 'Calarca'),
(842, 842, 'Circasia'),
(843, 843, 'Córdob'),
(844, 844, 'Filandia'),
(845, 845, 'Génov'),
(846, 846, 'La Tebaida'),
(847, 847, 'Montenegro'),
(848, 848, 'Pijao'),
(849, 849, 'Quimbaya'),
(850, 850, 'Salento'),
(851, 851, 'Risaralda'),
(852, 852, 'Pereira'),
(853, 853, 'Apí'),
(854, 854, 'Balboa'),
(855, 855, 'Belén de Umbr?\r'),
(856, 856, 'Dosquebradas'),
(857, 857, 'Guátic'),
(858, 858, 'La Celia'),
(859, 859, 'La Virginia'),
(860, 860, 'Marsella'),
(861, 861, 'Mistrat?\r'),
(862, 862, 'Pueblo Rico'),
(863, 863, 'Quinchí'),
(864, 864, 'Santa Rosa de Cabal'),
(865, 865, 'Santuario'),
(866, 866, 'Santander'),
(867, 867, 'Bucaramanga'),
(868, 868, 'Aguada'),
(869, 869, 'Albania'),
(870, 870, 'Aratoca'),
(871, 871, 'Barbosa'),
(872, 872, 'Barichara'),
(873, 873, 'Barrancabermeja'),
(874, 874, 'Betulia'),
(875, 875, 'Bolíva'),
(876, 876, 'Cabrera'),
(877, 877, 'California'),
(878, 878, 'Capitanejo'),
(879, 879, 'Carcas?\r'),
(880, 880, 'Cepit?\r'),
(881, 881, 'Cerrito'),
(882, 882, 'Charal?\r'),
(883, 883, 'Charta'),
(884, 884, 'Chima'),
(885, 885, 'Chipat?\r'),
(886, 886, 'Cimitarra'),
(887, 887, 'Concepció'),
(888, 888, 'Confines'),
(889, 889, 'Contratació'),
(890, 890, 'Coromoro'),
(891, 891, 'Curit?\r'),
(892, 892, 'El Carmen de Chucur?\r'),
(893, 893, 'El Guacamayo'),
(894, 894, 'El Peñ?\r'),
(895, 895, 'El Playó'),
(896, 896, 'Encino'),
(897, 897, 'Enciso'),
(898, 898, 'Floriá'),
(899, 899, 'Floridablanca'),
(900, 900, 'Galá'),
(901, 901, 'Gambita'),
(902, 902, 'Giró'),
(903, 903, 'Guaca'),
(904, 904, 'Guadalupe'),
(905, 905, 'Guapot?\r'),
(906, 906, 'Guavat?\r'),
(907, 907, 'Güeps'),
(908, 908, 'Hato'),
(909, 909, 'Jesús Mar?\r'),
(910, 910, 'Jordá'),
(911, 911, 'La Belleza'),
(912, 912, 'Landázur'),
(913, 913, 'La Paz'),
(914, 914, 'Lebríj'),
(915, 915, 'Los Santos'),
(916, 916, 'Macaravita'),
(917, 917, 'Málag'),
(918, 918, 'Matanza'),
(919, 919, 'Mogotes'),
(920, 920, 'Molagavita'),
(921, 921, 'Ocamonte'),
(922, 922, 'Oiba'),
(923, 923, 'Onzaga'),
(924, 924, 'Palmar'),
(925, 925, 'Palmas del Socorro'),
(926, 926, 'Páram'),
(927, 927, 'Piedecuesta'),
(928, 928, 'Pinchote'),
(929, 929, 'Puente Nacional'),
(930, 930, 'Puerto Parra'),
(931, 931, 'Puerto Wilches'),
(932, 932, 'Rionegro'),
(933, 933, 'Sabana de Torres'),
(934, 934, 'San André'),
(935, 935, 'San Benito'),
(936, 936, 'San Gil'),
(937, 937, 'San Joaquí'),
(938, 938, 'San José de Mirand'),
(939, 939, 'San Miguel'),
(940, 940, 'San Vicente de Chucur?\r'),
(941, 941, 'Santa Bárbar'),
(942, 942, 'Santa Helena del Opó'),
(943, 943, 'Simacota'),
(944, 944, 'Socorro'),
(945, 945, 'Suaita'),
(946, 946, 'Sucre'),
(947, 947, 'Surat?\r'),
(948, 948, 'Tona'),
(949, 949, 'Valle de San Jos?\r'),
(950, 950, 'Véle'),
(951, 951, 'Vetas'),
(952, 952, 'Villanueva'),
(953, 953, 'Zapatoca'),
(954, 954, 'Sucre'),
(955, 955, 'Sincelejo'),
(956, 956, 'Buenavista'),
(957, 957, 'Caimito'),
(958, 958, 'Coloso'),
(959, 959, 'Corozal'),
(960, 960, 'Coveña'),
(961, 961, 'Chalá'),
(962, 962, 'El Roble'),
(963, 963, 'Galeras'),
(964, 964, 'Guaranda'),
(965, 965, 'La Unió'),
(966, 966, 'Los Palmitos'),
(967, 967, 'Majagual'),
(968, 968, 'Morroa'),
(969, 969, 'Ovejas'),
(970, 970, 'Palmito'),
(971, 971, 'Sampué'),
(972, 972, 'San Benito Abad'),
(973, 973, 'San Juan de Betulia'),
(974, 974, 'San Marcos'),
(975, 975, 'San Onofre'),
(976, 976, 'San Pedro'),
(977, 977, 'San Luis de Sinc?\r'),
(978, 978, 'Sucre'),
(979, 979, 'Santiago de Tol?\r'),
(980, 980, 'Tolú Viej'),
(981, 981, 'Tolima'),
(982, 982, 'Ibagu?\r'),
(983, 983, 'Alpujarra'),
(984, 984, 'Alvarado'),
(985, 985, 'Ambalema'),
(986, 986, 'Anzoátegu'),
(987, 987, 'Armero'),
(988, 988, 'Ataco'),
(989, 989, 'Cajamarca'),
(990, 990, 'Carmen de Apical?\r'),
(991, 991, 'Casabianca'),
(992, 992, 'Chaparral'),
(993, 993, 'Coello'),
(994, 994, 'Coyaima'),
(995, 995, 'Cunday'),
(996, 996, 'Dolores'),
(997, 997, 'Espinal'),
(998, 998, 'Falan'),
(999, 999, 'Flandes'),
(1000, 1000, 'Fresno'),
(1001, 1001, 'Guamo'),
(1002, 1002, 'Herveo'),
(1003, 1003, 'Honda'),
(1004, 1004, 'Icononzo'),
(1005, 1005, 'Lérid'),
(1006, 1006, 'Líban'),
(1007, 1007, 'Mariquita'),
(1008, 1008, 'Melgar'),
(1009, 1009, 'Murillo'),
(1010, 1010, 'Natagaima'),
(1011, 1011, 'Ortega'),
(1012, 1012, 'Palocabildo'),
(1013, 1013, 'Piedras'),
(1014, 1014, 'Planadas'),
(1015, 1015, 'Prado'),
(1016, 1016, 'Purificació'),
(1017, 1017, 'Rioblanco'),
(1018, 1018, 'Roncesvalles'),
(1019, 1019, 'Rovira'),
(1020, 1020, 'Saldañ'),
(1021, 1021, 'San Antonio'),
(1022, 1022, 'San Luis'),
(1023, 1023, 'Santa Isabel'),
(1024, 1024, 'Suáre'),
(1025, 1025, 'Valle de San Juan'),
(1026, 1026, 'Venadillo'),
(1027, 1027, 'Villahermosa'),
(1028, 1028, 'Villarrica'),
(1029, 1029, 'Valle del Cauca'),
(1030, 1030, 'Cali'),
(1031, 1031, 'Alcal?\r'),
(1032, 1032, 'Andalucí'),
(1033, 1033, 'Ansermanuevo'),
(1034, 1034, 'Argelia'),
(1035, 1035, 'Bolíva'),
(1036, 1036, 'Buenaventura'),
(1037, 1037, 'Guadalajara de Buga'),
(1038, 1038, 'Bugalagrande'),
(1039, 1039, 'Caicedonia'),
(1040, 1040, 'Calima'),
(1041, 1041, 'Candelaria'),
(1042, 1042, 'Cartago'),
(1043, 1043, 'Dagua'),
(1044, 1044, 'El Águil'),
(1045, 1045, 'El Cairo'),
(1046, 1046, 'El Cerrito'),
(1047, 1047, 'El Dovio'),
(1048, 1048, 'Florida'),
(1049, 1049, 'Ginebra'),
(1050, 1050, 'Guacar?\r'),
(1051, 1051, 'Jamund?\r'),
(1052, 1052, 'La Cumbre'),
(1053, 1053, 'La Unió'),
(1054, 1054, 'La Victoria'),
(1055, 1055, 'Obando'),
(1056, 1056, 'Palmira'),
(1057, 1057, 'Pradera'),
(1058, 1058, 'Restrepo'),
(1059, 1059, 'Riofrí'),
(1060, 1060, 'Roldanillo'),
(1061, 1061, 'San Pedro'),
(1062, 1062, 'Sevilla'),
(1063, 1063, 'Toro'),
(1064, 1064, 'Trujillo'),
(1065, 1065, 'Tulu?\r'),
(1066, 1066, 'Ulloa'),
(1067, 1067, 'Versalles'),
(1068, 1068, 'Vijes'),
(1069, 1069, 'Yotoco'),
(1070, 1070, 'Yumbo'),
(1071, 1071, 'Zarzal'),
(1072, 1072, 'Arauca'),
(1073, 1073, 'Arauca'),
(1074, 1074, 'Arauquita'),
(1075, 1075, 'Cravo Norte'),
(1076, 1076, 'Fortul'),
(1077, 1077, 'Puerto Rondó'),
(1078, 1078, 'Saravena'),
(1079, 1079, 'Tame'),
(1080, 1080, 'Casanare'),
(1081, 1081, 'Yopal'),
(1082, 1082, 'Aguazul'),
(1083, 1083, 'Chameza'),
(1084, 1084, 'Hato Corozal'),
(1085, 1085, 'La Salina'),
(1086, 1086, 'Man?\r'),
(1087, 1087, 'Monterrey'),
(1088, 1088, 'Nunchí'),
(1089, 1089, 'Orocu?\r'),
(1090, 1090, 'Paz de Ariporo'),
(1091, 1091, 'Pore'),
(1092, 1092, 'Recetor'),
(1093, 1093, 'Sabanalarga'),
(1094, 1094, 'Sácam'),
(1095, 1095, 'San Luis de Palenque'),
(1096, 1096, 'Támar'),
(1097, 1097, 'Tauramena'),
(1098, 1098, 'Trinidad'),
(1099, 1099, 'Villanueva'),
(1100, 1100, 'Putumayo'),
(1101, 1101, 'Mocoa'),
(1102, 1102, 'Coló'),
(1103, 1103, 'Orito'),
(1104, 1104, 'Puerto Así'),
(1105, 1105, 'Puerto Caicedo'),
(1106, 1106, 'Puerto Guzmá'),
(1107, 1107, 'Leguízam'),
(1108, 1108, 'Sibundoy'),
(1109, 1109, 'San Francisco'),
(1110, 1110, 'San Miguel'),
(1111, 1111, 'Santiago'),
(1112, 1112, 'Valle del Guamuez'),
(1113, 1113, 'Villagarzó'),
(1114, 1114, 'Archipiélago de San Andr?\r'),
(1115, 1115, 'San André'),
(1116, 1116, 'Providencia'),
(1117, 1117, 'Amazonas'),
(1118, 1118, 'Leticia'),
(1119, 1119, 'El Encanto'),
(1120, 1120, 'La Chorrera'),
(1121, 1121, 'La Pedrera'),
(1122, 1122, 'La Victoria'),
(1123, 1123, 'Miriti - Paran?\r'),
(1124, 1124, 'Puerto Alegrí'),
(1125, 1125, 'Puerto Arica'),
(1126, 1126, 'Puerto Nariñ'),
(1127, 1127, 'Puerto Santander'),
(1128, 1128, 'Tarapac?\r'),
(1129, 1129, 'Guainí'),
(1130, 1130, 'Inírid'),
(1131, 1131, 'Barranco Minas'),
(1132, 1132, 'Mapiripana'),
(1133, 1133, 'San Felipe'),
(1134, 1134, 'Puerto Colombia'),
(1135, 1135, 'La Guadalupe'),
(1136, 1136, 'Cacahual'),
(1137, 1137, 'Pana Pana'),
(1138, 1138, 'Morichal'),
(1139, 1139, 'Guaviare'),
(1140, 1140, 'San José del Guaviar'),
(1141, 1141, 'Calamar'),
(1142, 1142, 'El Retorno'),
(1143, 1143, 'Miraflores'),
(1144, 1144, 'Vaupé'),
(1145, 1145, 'Mit?\r'),
(1146, 1146, 'Caruru'),
(1147, 1147, 'Pacoa'),
(1148, 1148, 'Taraira'),
(1149, 1149, 'Papunaua'),
(1150, 1150, 'Yavarat?\r'),
(1151, 1151, 'Vichada'),
(1152, 1152, 'Puerto Carreñ'),
(1153, 1153, 'La Primavera'),
(1154, 1154, 'Santa Rosalí'),
(1155, 1155, 'Cumaribo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientxrest`
--

CREATE TABLE `clientxrest` (
  `idClient` int(11) NOT NULL,
  `idRest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configrest`
--

CREATE TABLE `configrest` (
  `Iva` int(11) NOT NULL,
  `NumeFactIni` int(11) NOT NULL,
  `NumeFactFin` int(11) NOT NULL,
  `ResolDian` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `Restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `Pais` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `Pais`, `Nombre`) VALUES
(1, 1, 'Antioquia'),
(2, 1, 'Antioquia'),
(3, 1, 'Antioquia'),
(4, 1, 'Antioquia'),
(5, 1, 'Antioquia'),
(6, 1, 'Antioquia'),
(7, 1, 'Antioquia'),
(8, 1, 'Antioquia'),
(9, 1, 'Antioquia'),
(10, 1, 'Antioquia'),
(11, 1, 'Antioquia'),
(12, 1, 'Antioquia'),
(13, 1, 'Antioquia'),
(14, 1, 'Antioquia'),
(15, 1, 'Antioquia'),
(16, 1, 'Antioquia'),
(17, 1, 'Antioquia'),
(18, 1, 'Antioquia'),
(19, 1, 'Antioquia'),
(20, 1, 'Antioquia'),
(21, 1, 'Antioquia'),
(22, 1, 'Antioquia'),
(23, 1, 'Antioquia'),
(24, 1, 'Antioquia'),
(25, 1, 'Antioquia'),
(26, 1, 'Antioquia'),
(27, 1, 'Antioquia'),
(28, 1, 'Antioquia'),
(29, 1, 'Antioquia'),
(30, 1, 'Antioquia'),
(31, 1, 'Antioquia'),
(32, 1, 'Antioquia'),
(33, 1, 'Antioquia'),
(34, 1, 'Antioquia'),
(35, 1, 'Antioquia'),
(36, 1, 'Antioquia'),
(37, 1, 'Antioquia'),
(38, 1, 'Antioquia'),
(39, 1, 'Antioquia'),
(40, 1, 'Antioquia'),
(41, 1, 'Antioquia'),
(42, 1, 'Antioquia'),
(43, 1, 'Antioquia'),
(44, 1, 'Antioquia'),
(45, 1, 'Antioquia'),
(46, 1, 'Antioquia'),
(47, 1, 'Antioquia'),
(48, 1, 'Antioquia'),
(49, 1, 'Antioquia'),
(50, 1, 'Antioquia'),
(51, 1, 'Antioquia'),
(52, 1, 'Antioquia'),
(53, 1, 'Antioquia'),
(54, 1, 'Antioquia'),
(55, 1, 'Antioquia'),
(56, 1, 'Antioquia'),
(57, 1, 'Antioquia'),
(58, 1, 'Antioquia'),
(59, 1, 'Antioquia'),
(60, 1, 'Antioquia'),
(61, 1, 'Antioquia'),
(62, 1, 'Antioquia'),
(63, 1, 'Antioquia'),
(64, 1, 'Antioquia'),
(65, 1, 'Antioquia'),
(66, 1, 'Antioquia'),
(67, 1, 'Antioquia'),
(68, 1, 'Antioquia'),
(69, 1, 'Antioquia'),
(70, 1, 'Antioquia'),
(71, 1, 'Antioquia'),
(72, 1, 'Antioquia'),
(73, 1, 'Antioquia'),
(74, 1, 'Antioquia'),
(75, 1, 'Antioquia'),
(76, 1, 'Antioquia'),
(77, 1, 'Antioquia'),
(78, 1, 'Antioquia'),
(79, 1, 'Antioquia'),
(80, 1, 'Antioquia'),
(81, 1, 'Antioquia'),
(82, 1, 'Antioquia'),
(83, 1, 'Antioquia'),
(84, 1, 'Antioquia'),
(85, 1, 'Antioquia'),
(86, 1, 'Antioquia'),
(87, 1, 'Antioquia'),
(88, 1, 'Antioquia'),
(89, 1, 'Antioquia'),
(90, 1, 'Antioquia'),
(91, 1, 'Antioquia'),
(92, 1, 'Antioquia'),
(93, 1, 'Antioquia'),
(94, 1, 'Antioquia'),
(95, 1, 'Antioquia'),
(96, 1, 'Antioquia'),
(97, 1, 'Antioquia'),
(98, 1, 'Antioquia'),
(99, 1, 'Antioquia'),
(100, 1, 'Antioquia'),
(101, 1, 'Antioquia'),
(102, 1, 'Antioquia'),
(103, 1, 'Antioquia'),
(104, 1, 'Antioquia'),
(105, 1, 'Antioquia'),
(106, 1, 'Antioquia'),
(107, 1, 'Antioquia'),
(108, 1, 'Antioquia'),
(109, 1, 'Antioquia'),
(110, 1, 'Antioquia'),
(111, 1, 'Antioquia'),
(112, 1, 'Antioquia'),
(113, 1, 'Antioquia'),
(114, 1, 'Antioquia'),
(115, 1, 'Antioquia'),
(116, 1, 'Antioquia'),
(117, 1, 'Antioquia'),
(118, 1, 'Antioquia'),
(119, 1, 'Antioquia'),
(120, 1, 'Antioquia'),
(121, 1, 'Antioquia'),
(122, 1, 'Antioquia'),
(123, 1, 'Antioquia'),
(124, 1, 'Antioquia'),
(125, 1, 'Antioquia'),
(126, 1, 'Antioquia'),
(127, 1, 'Atlántic'),
(128, 1, 'Atlántic'),
(129, 1, 'Atlántic'),
(130, 1, 'Atlántic'),
(131, 1, 'Atlántic'),
(132, 1, 'Atlántic'),
(133, 1, 'Atlántic'),
(134, 1, 'Atlántic'),
(135, 1, 'Atlántic'),
(136, 1, 'Atlántic'),
(137, 1, 'Atlántic'),
(138, 1, 'Atlántic'),
(139, 1, 'Atlántic'),
(140, 1, 'Atlántic'),
(141, 1, 'Atlántic'),
(142, 1, 'Atlántic'),
(143, 1, 'Atlántic'),
(144, 1, 'Atlántic'),
(145, 1, 'Atlántic'),
(146, 1, 'Atlántic'),
(147, 1, 'Atlántic'),
(148, 1, 'Atlántic'),
(149, 1, 'Atlántic'),
(150, 1, 'Atlántic'),
(151, 1, 'Bogotá D.C'),
(152, 1, 'Bogotá D.C'),
(153, 1, 'Bolíva'),
(154, 1, 'Bolíva'),
(155, 1, 'Bolíva'),
(156, 1, 'Bolíva'),
(157, 1, 'Bolíva'),
(158, 1, 'Bolíva'),
(159, 1, 'Bolíva'),
(160, 1, 'Bolíva'),
(161, 1, 'Bolíva'),
(162, 1, 'Bolíva'),
(163, 1, 'Bolíva'),
(164, 1, 'Bolíva'),
(165, 1, 'Bolíva'),
(166, 1, 'Bolíva'),
(167, 1, 'Bolíva'),
(168, 1, 'Bolíva'),
(169, 1, 'Bolíva'),
(170, 1, 'Bolíva'),
(171, 1, 'Bolíva'),
(172, 1, 'Bolíva'),
(173, 1, 'Bolíva'),
(174, 1, 'Bolíva'),
(175, 1, 'Bolíva'),
(176, 1, 'Bolíva'),
(177, 1, 'Bolíva'),
(178, 1, 'Bolíva'),
(179, 1, 'Bolíva'),
(180, 1, 'Bolíva'),
(181, 1, 'Bolíva'),
(182, 1, 'Bolíva'),
(183, 1, 'Bolíva'),
(184, 1, 'Bolíva'),
(185, 1, 'Bolíva'),
(186, 1, 'Bolíva'),
(187, 1, 'Bolíva'),
(188, 1, 'Bolíva'),
(189, 1, 'Bolíva'),
(190, 1, 'Bolíva'),
(191, 1, 'Bolíva'),
(192, 1, 'Bolíva'),
(193, 1, 'Bolíva'),
(194, 1, 'Bolíva'),
(195, 1, 'Bolíva'),
(196, 1, 'Bolíva'),
(197, 1, 'Bolíva'),
(198, 1, 'Bolíva'),
(199, 1, 'Bolíva'),
(200, 1, 'Boyac?\r'),
(201, 1, 'Boyac?\r'),
(202, 1, 'Boyac?\r'),
(203, 1, 'Boyac?\r'),
(204, 1, 'Boyac?\r'),
(205, 1, 'Boyac?\r'),
(206, 1, 'Boyac?\r'),
(207, 1, 'Boyac?\r'),
(208, 1, 'Boyac?\r'),
(209, 1, 'Boyac?\r'),
(210, 1, 'Boyac?\r'),
(211, 1, 'Boyac?\r'),
(212, 1, 'Boyac?\r'),
(213, 1, 'Boyac?\r'),
(214, 1, 'Boyac?\r'),
(215, 1, 'Boyac?\r'),
(216, 1, 'Boyac?\r'),
(217, 1, 'Boyac?\r'),
(218, 1, 'Boyac?\r'),
(219, 1, 'Boyac?\r'),
(220, 1, 'Boyac?\r'),
(221, 1, 'Boyac?\r'),
(222, 1, 'Boyac?\r'),
(223, 1, 'Boyac?\r'),
(224, 1, 'Boyac?\r'),
(225, 1, 'Boyac?\r'),
(226, 1, 'Boyac?\r'),
(227, 1, 'Boyac?\r'),
(228, 1, 'Boyac?\r'),
(229, 1, 'Boyac?\r'),
(230, 1, 'Boyac?\r'),
(231, 1, 'Boyac?\r'),
(232, 1, 'Boyac?\r'),
(233, 1, 'Boyac?\r'),
(234, 1, 'Boyac?\r'),
(235, 1, 'Boyac?\r'),
(236, 1, 'Boyac?\r'),
(237, 1, 'Boyac?\r'),
(238, 1, 'Boyac?\r'),
(239, 1, 'Boyac?\r'),
(240, 1, 'Boyac?\r'),
(241, 1, 'Boyac?\r'),
(242, 1, 'Boyac?\r'),
(243, 1, 'Boyac?\r'),
(244, 1, 'Boyac?\r'),
(245, 1, 'Boyac?\r'),
(246, 1, 'Boyac?\r'),
(247, 1, 'Boyac?\r'),
(248, 1, 'Boyac?\r'),
(249, 1, 'Boyac?\r'),
(250, 1, 'Boyac?\r'),
(251, 1, 'Boyac?\r'),
(252, 1, 'Boyac?\r'),
(253, 1, 'Boyac?\r'),
(254, 1, 'Boyac?\r'),
(255, 1, 'Boyac?\r'),
(256, 1, 'Boyac?\r'),
(257, 1, 'Boyac?\r'),
(258, 1, 'Boyac?\r'),
(259, 1, 'Boyac?\r'),
(260, 1, 'Boyac?\r'),
(261, 1, 'Boyac?\r'),
(262, 1, 'Boyac?\r'),
(263, 1, 'Boyac?\r'),
(264, 1, 'Boyac?\r'),
(265, 1, 'Boyac?\r'),
(266, 1, 'Boyac?\r'),
(267, 1, 'Boyac?\r'),
(268, 1, 'Boyac?\r'),
(269, 1, 'Boyac?\r'),
(270, 1, 'Boyac?\r'),
(271, 1, 'Boyac?\r'),
(272, 1, 'Boyac?\r'),
(273, 1, 'Boyac?\r'),
(274, 1, 'Boyac?\r'),
(275, 1, 'Boyac?\r'),
(276, 1, 'Boyac?\r'),
(277, 1, 'Boyac?\r'),
(278, 1, 'Boyac?\r'),
(279, 1, 'Boyac?\r'),
(280, 1, 'Boyac?\r'),
(281, 1, 'Boyac?\r'),
(282, 1, 'Boyac?\r'),
(283, 1, 'Boyac?\r'),
(284, 1, 'Boyac?\r'),
(285, 1, 'Boyac?\r'),
(286, 1, 'Boyac?\r'),
(287, 1, 'Boyac?\r'),
(288, 1, 'Boyac?\r'),
(289, 1, 'Boyac?\r'),
(290, 1, 'Boyac?\r'),
(291, 1, 'Boyac?\r'),
(292, 1, 'Boyac?\r'),
(293, 1, 'Boyac?\r'),
(294, 1, 'Boyac?\r'),
(295, 1, 'Boyac?\r'),
(296, 1, 'Boyac?\r'),
(297, 1, 'Boyac?\r'),
(298, 1, 'Boyac?\r'),
(299, 1, 'Boyac?\r'),
(300, 1, 'Boyac?\r'),
(301, 1, 'Boyac?\r'),
(302, 1, 'Boyac?\r'),
(303, 1, 'Boyac?\r'),
(304, 1, 'Boyac?\r'),
(305, 1, 'Boyac?\r'),
(306, 1, 'Boyac?\r'),
(307, 1, 'Boyac?\r'),
(308, 1, 'Boyac?\r'),
(309, 1, 'Boyac?\r'),
(310, 1, 'Boyac?\r'),
(311, 1, 'Boyac?\r'),
(312, 1, 'Boyac?\r'),
(313, 1, 'Boyac?\r'),
(314, 1, 'Boyac?\r'),
(315, 1, 'Boyac?\r'),
(316, 1, 'Boyac?\r'),
(317, 1, 'Boyac?\r'),
(318, 1, 'Boyac?\r'),
(319, 1, 'Boyac?\r'),
(320, 1, 'Boyac?\r'),
(321, 1, 'Boyac?\r'),
(322, 1, 'Boyac?\r'),
(323, 1, 'Boyac?\r'),
(324, 1, 'Caldas'),
(325, 1, 'Caldas'),
(326, 1, 'Caldas'),
(327, 1, 'Caldas'),
(328, 1, 'Caldas'),
(329, 1, 'Caldas'),
(330, 1, 'Caldas'),
(331, 1, 'Caldas'),
(332, 1, 'Caldas'),
(333, 1, 'Caldas'),
(334, 1, 'Caldas'),
(335, 1, 'Caldas'),
(336, 1, 'Caldas'),
(337, 1, 'Caldas'),
(338, 1, 'Caldas'),
(339, 1, 'Caldas'),
(340, 1, 'Caldas'),
(341, 1, 'Caldas'),
(342, 1, 'Caldas'),
(343, 1, 'Caldas'),
(344, 1, 'Caldas'),
(345, 1, 'Caldas'),
(346, 1, 'Caldas'),
(347, 1, 'Caldas'),
(348, 1, 'Caldas'),
(349, 1, 'Caldas'),
(350, 1, 'Caldas'),
(351, 1, 'Caldas'),
(352, 1, 'Caquet?\r'),
(353, 1, 'Caquet?\r'),
(354, 1, 'Caquet?\r'),
(355, 1, 'Caquet?\r'),
(356, 1, 'Caquet?\r'),
(357, 1, 'Caquet?\r'),
(358, 1, 'Caquet?\r'),
(359, 1, 'Caquet?\r'),
(360, 1, 'Caquet?\r'),
(361, 1, 'Caquet?\r'),
(362, 1, 'Caquet?\r'),
(363, 1, 'Caquet?\r'),
(364, 1, 'Caquet?\r'),
(365, 1, 'Caquet?\r'),
(366, 1, 'Caquet?\r'),
(367, 1, 'Caquet?\r'),
(368, 1, 'Caquet?\r'),
(369, 1, 'Cauca'),
(370, 1, 'Cauca'),
(371, 1, 'Cauca'),
(372, 1, 'Cauca'),
(373, 1, 'Cauca'),
(374, 1, 'Cauca'),
(375, 1, 'Cauca'),
(376, 1, 'Cauca'),
(377, 1, 'Cauca'),
(378, 1, 'Cauca'),
(379, 1, 'Cauca'),
(380, 1, 'Cauca'),
(381, 1, 'Cauca'),
(382, 1, 'Cauca'),
(383, 1, 'Cauca'),
(384, 1, 'Cauca'),
(385, 1, 'Cauca'),
(386, 1, 'Cauca'),
(387, 1, 'Cauca'),
(388, 1, 'Cauca'),
(389, 1, 'Cauca'),
(390, 1, 'Cauca'),
(391, 1, 'Cauca'),
(392, 1, 'Cauca'),
(393, 1, 'Cauca'),
(394, 1, 'Cauca'),
(395, 1, 'Cauca'),
(396, 1, 'Cauca'),
(397, 1, 'Cauca'),
(398, 1, 'Cauca'),
(399, 1, 'Cauca'),
(400, 1, 'Cauca'),
(401, 1, 'Cauca'),
(402, 1, 'Cauca'),
(403, 1, 'Cauca'),
(404, 1, 'Cauca'),
(405, 1, 'Cauca'),
(406, 1, 'Cauca'),
(407, 1, 'Cauca'),
(408, 1, 'Cauca'),
(409, 1, 'Cauca'),
(410, 1, 'Cauca'),
(411, 1, 'Cauca'),
(412, 1, 'Cesar'),
(413, 1, 'Cesar'),
(414, 1, 'Cesar'),
(415, 1, 'Cesar'),
(416, 1, 'Cesar'),
(417, 1, 'Cesar'),
(418, 1, 'Cesar'),
(419, 1, 'Cesar'),
(420, 1, 'Cesar'),
(421, 1, 'Cesar'),
(422, 1, 'Cesar'),
(423, 1, 'Cesar'),
(424, 1, 'Cesar'),
(425, 1, 'Cesar'),
(426, 1, 'Cesar'),
(427, 1, 'Cesar'),
(428, 1, 'Cesar'),
(429, 1, 'Cesar'),
(430, 1, 'Cesar'),
(431, 1, 'Cesar'),
(432, 1, 'Cesar'),
(433, 1, 'Cesar'),
(434, 1, 'Cesar'),
(435, 1, 'Cesar'),
(436, 1, 'Cesar'),
(437, 1, 'Cesar'),
(438, 1, 'Córdob'),
(439, 1, 'Córdob'),
(440, 1, 'Córdob'),
(441, 1, 'Córdob'),
(442, 1, 'Córdob'),
(443, 1, 'Córdob'),
(444, 1, 'Córdob'),
(445, 1, 'Córdob'),
(446, 1, 'Córdob'),
(447, 1, 'Córdob'),
(448, 1, 'Córdob'),
(449, 1, 'Córdob'),
(450, 1, 'Córdob'),
(451, 1, 'Córdob'),
(452, 1, 'Córdob'),
(453, 1, 'Córdob'),
(454, 1, 'Córdob'),
(455, 1, 'Córdob'),
(456, 1, 'Córdob'),
(457, 1, 'Córdob'),
(458, 1, 'Córdob'),
(459, 1, 'Córdob'),
(460, 1, 'Córdob'),
(461, 1, 'Córdob'),
(462, 1, 'Córdob'),
(463, 1, 'Córdob'),
(464, 1, 'Córdob'),
(465, 1, 'Córdob'),
(466, 1, 'Córdob'),
(467, 1, 'Córdob'),
(468, 1, 'Córdob'),
(469, 1, 'Cundinamarca'),
(470, 1, 'Cundinamarca'),
(471, 1, 'Cundinamarca'),
(472, 1, 'Cundinamarca'),
(473, 1, 'Cundinamarca'),
(474, 1, 'Cundinamarca'),
(475, 1, 'Cundinamarca'),
(476, 1, 'Cundinamarca'),
(477, 1, 'Cundinamarca'),
(478, 1, 'Cundinamarca'),
(479, 1, 'Cundinamarca'),
(480, 1, 'Cundinamarca'),
(481, 1, 'Cundinamarca'),
(482, 1, 'Cundinamarca'),
(483, 1, 'Cundinamarca'),
(484, 1, 'Cundinamarca'),
(485, 1, 'Cundinamarca'),
(486, 1, 'Cundinamarca'),
(487, 1, 'Cundinamarca'),
(488, 1, 'Cundinamarca'),
(489, 1, 'Cundinamarca'),
(490, 1, 'Cundinamarca'),
(491, 1, 'Cundinamarca'),
(492, 1, 'Cundinamarca'),
(493, 1, 'Cundinamarca'),
(494, 1, 'Cundinamarca'),
(495, 1, 'Cundinamarca'),
(496, 1, 'Cundinamarca'),
(497, 1, 'Cundinamarca'),
(498, 1, 'Cundinamarca'),
(499, 1, 'Cundinamarca'),
(500, 1, 'Cundinamarca'),
(501, 1, 'Cundinamarca'),
(502, 1, 'Cundinamarca'),
(503, 1, 'Cundinamarca'),
(504, 1, 'Cundinamarca'),
(505, 1, 'Cundinamarca'),
(506, 1, 'Cundinamarca'),
(507, 1, 'Cundinamarca'),
(508, 1, 'Cundinamarca'),
(509, 1, 'Cundinamarca'),
(510, 1, 'Cundinamarca'),
(511, 1, 'Cundinamarca'),
(512, 1, 'Cundinamarca'),
(513, 1, 'Cundinamarca'),
(514, 1, 'Cundinamarca'),
(515, 1, 'Cundinamarca'),
(516, 1, 'Cundinamarca'),
(517, 1, 'Cundinamarca'),
(518, 1, 'Cundinamarca'),
(519, 1, 'Cundinamarca'),
(520, 1, 'Cundinamarca'),
(521, 1, 'Cundinamarca'),
(522, 1, 'Cundinamarca'),
(523, 1, 'Cundinamarca'),
(524, 1, 'Cundinamarca'),
(525, 1, 'Cundinamarca'),
(526, 1, 'Cundinamarca'),
(527, 1, 'Cundinamarca'),
(528, 1, 'Cundinamarca'),
(529, 1, 'Cundinamarca'),
(530, 1, 'Cundinamarca'),
(531, 1, 'Cundinamarca'),
(532, 1, 'Cundinamarca'),
(533, 1, 'Cundinamarca'),
(534, 1, 'Cundinamarca'),
(535, 1, 'Cundinamarca'),
(536, 1, 'Cundinamarca'),
(537, 1, 'Cundinamarca'),
(538, 1, 'Cundinamarca'),
(539, 1, 'Cundinamarca'),
(540, 1, 'Cundinamarca'),
(541, 1, 'Cundinamarca'),
(542, 1, 'Cundinamarca'),
(543, 1, 'Cundinamarca'),
(544, 1, 'Cundinamarca'),
(545, 1, 'Cundinamarca'),
(546, 1, 'Cundinamarca'),
(547, 1, 'Cundinamarca'),
(548, 1, 'Cundinamarca'),
(549, 1, 'Cundinamarca'),
(550, 1, 'Cundinamarca'),
(551, 1, 'Cundinamarca'),
(552, 1, 'Cundinamarca'),
(553, 1, 'Cundinamarca'),
(554, 1, 'Cundinamarca'),
(555, 1, 'Cundinamarca'),
(556, 1, 'Cundinamarca'),
(557, 1, 'Cundinamarca'),
(558, 1, 'Cundinamarca'),
(559, 1, 'Cundinamarca'),
(560, 1, 'Cundinamarca'),
(561, 1, 'Cundinamarca'),
(562, 1, 'Cundinamarca'),
(563, 1, 'Cundinamarca'),
(564, 1, 'Cundinamarca'),
(565, 1, 'Cundinamarca'),
(566, 1, 'Cundinamarca'),
(567, 1, 'Cundinamarca'),
(568, 1, 'Cundinamarca'),
(569, 1, 'Cundinamarca'),
(570, 1, 'Cundinamarca'),
(571, 1, 'Cundinamarca'),
(572, 1, 'Cundinamarca'),
(573, 1, 'Cundinamarca'),
(574, 1, 'Cundinamarca'),
(575, 1, 'Cundinamarca'),
(576, 1, 'Cundinamarca'),
(577, 1, 'Cundinamarca'),
(578, 1, 'Cundinamarca'),
(579, 1, 'Cundinamarca'),
(580, 1, 'Cundinamarca'),
(581, 1, 'Cundinamarca'),
(582, 1, 'Cundinamarca'),
(583, 1, 'Cundinamarca'),
(584, 1, 'Cundinamarca'),
(585, 1, 'Cundinamarca'),
(586, 1, 'Choc?\r'),
(587, 1, 'Choc?\r'),
(588, 1, 'Choc?\r'),
(589, 1, 'Choc?\r'),
(590, 1, 'Choc?\r'),
(591, 1, 'Choc?\r'),
(592, 1, 'Choc?\r'),
(593, 1, 'Choc?\r'),
(594, 1, 'Choc?\r'),
(595, 1, 'Choc?\r'),
(596, 1, 'Choc?\r'),
(597, 1, 'Choc?\r'),
(598, 1, 'Choc?\r'),
(599, 1, 'Choc?\r'),
(600, 1, 'Choc?\r'),
(601, 1, 'Choc?\r'),
(602, 1, 'Choc?\r'),
(603, 1, 'Choc?\r'),
(604, 1, 'Choc?\r'),
(605, 1, 'Choc?\r'),
(606, 1, 'Choc?\r'),
(607, 1, 'Choc?\r'),
(608, 1, 'Choc?\r'),
(609, 1, 'Choc?\r'),
(610, 1, 'Choc?\r'),
(611, 1, 'Choc?\r'),
(612, 1, 'Choc?\r'),
(613, 1, 'Choc?\r'),
(614, 1, 'Choc?\r'),
(615, 1, 'Choc?\r'),
(616, 1, 'Choc?\r'),
(617, 1, 'Huila'),
(618, 1, 'Huila'),
(619, 1, 'Huila'),
(620, 1, 'Huila'),
(621, 1, 'Huila'),
(622, 1, 'Huila'),
(623, 1, 'Huila'),
(624, 1, 'Huila'),
(625, 1, 'Huila'),
(626, 1, 'Huila'),
(627, 1, 'Huila'),
(628, 1, 'Huila'),
(629, 1, 'Huila'),
(630, 1, 'Huila'),
(631, 1, 'Huila'),
(632, 1, 'Huila'),
(633, 1, 'Huila'),
(634, 1, 'Huila'),
(635, 1, 'Huila'),
(636, 1, 'Huila'),
(637, 1, 'Huila'),
(638, 1, 'Huila'),
(639, 1, 'Huila'),
(640, 1, 'Huila'),
(641, 1, 'Huila'),
(642, 1, 'Huila'),
(643, 1, 'Huila'),
(644, 1, 'Huila'),
(645, 1, 'Huila'),
(646, 1, 'Huila'),
(647, 1, 'Huila'),
(648, 1, 'Huila'),
(649, 1, 'Huila'),
(650, 1, 'Huila'),
(651, 1, 'Huila'),
(652, 1, 'Huila'),
(653, 1, 'Huila'),
(654, 1, 'Huila'),
(655, 1, 'La Guajira'),
(656, 1, 'La Guajira'),
(657, 1, 'La Guajira'),
(658, 1, 'La Guajira'),
(659, 1, 'La Guajira'),
(660, 1, 'La Guajira'),
(661, 1, 'La Guajira'),
(662, 1, 'La Guajira'),
(663, 1, 'La Guajira'),
(664, 1, 'La Guajira'),
(665, 1, 'La Guajira'),
(666, 1, 'La Guajira'),
(667, 1, 'La Guajira'),
(668, 1, 'La Guajira'),
(669, 1, 'La Guajira'),
(670, 1, 'La Guajira'),
(671, 1, 'Magdalena'),
(672, 1, 'Magdalena'),
(673, 1, 'Magdalena'),
(674, 1, 'Magdalena'),
(675, 1, 'Magdalena'),
(676, 1, 'Magdalena'),
(677, 1, 'Magdalena'),
(678, 1, 'Magdalena'),
(679, 1, 'Magdalena'),
(680, 1, 'Magdalena'),
(681, 1, 'Magdalena'),
(682, 1, 'Magdalena'),
(683, 1, 'Magdalena'),
(684, 1, 'Magdalena'),
(685, 1, 'Magdalena'),
(686, 1, 'Magdalena'),
(687, 1, 'Magdalena'),
(688, 1, 'Magdalena'),
(689, 1, 'Magdalena'),
(690, 1, 'Magdalena'),
(691, 1, 'Magdalena'),
(692, 1, 'Magdalena'),
(693, 1, 'Magdalena'),
(694, 1, 'Magdalena'),
(695, 1, 'Magdalena'),
(696, 1, 'Magdalena'),
(697, 1, 'Magdalena'),
(698, 1, 'Magdalena'),
(699, 1, 'Magdalena'),
(700, 1, 'Magdalena'),
(701, 1, 'Magdalena'),
(702, 1, 'Meta'),
(703, 1, 'Meta'),
(704, 1, 'Meta'),
(705, 1, 'Meta'),
(706, 1, 'Meta'),
(707, 1, 'Meta'),
(708, 1, 'Meta'),
(709, 1, 'Meta'),
(710, 1, 'Meta'),
(711, 1, 'Meta'),
(712, 1, 'Meta'),
(713, 1, 'Meta'),
(714, 1, 'Meta'),
(715, 1, 'Meta'),
(716, 1, 'Meta'),
(717, 1, 'Meta'),
(718, 1, 'Meta'),
(719, 1, 'Meta'),
(720, 1, 'Meta'),
(721, 1, 'Meta'),
(722, 1, 'Meta'),
(723, 1, 'Meta'),
(724, 1, 'Meta'),
(725, 1, 'Meta'),
(726, 1, 'Meta'),
(727, 1, 'Meta'),
(728, 1, 'Meta'),
(729, 1, 'Meta'),
(730, 1, 'Meta'),
(731, 1, 'Meta'),
(732, 1, 'Nariñ'),
(733, 1, 'Nariñ'),
(734, 1, 'Nariñ'),
(735, 1, 'Nariñ'),
(736, 1, 'Nariñ'),
(737, 1, 'Nariñ'),
(738, 1, 'Nariñ'),
(739, 1, 'Nariñ'),
(740, 1, 'Nariñ'),
(741, 1, 'Nariñ'),
(742, 1, 'Nariñ'),
(743, 1, 'Nariñ'),
(744, 1, 'Nariñ'),
(745, 1, 'Nariñ'),
(746, 1, 'Nariñ'),
(747, 1, 'Nariñ'),
(748, 1, 'Nariñ'),
(749, 1, 'Nariñ'),
(750, 1, 'Nariñ'),
(751, 1, 'Nariñ'),
(752, 1, 'Nariñ'),
(753, 1, 'Nariñ'),
(754, 1, 'Nariñ'),
(755, 1, 'Nariñ'),
(756, 1, 'Nariñ'),
(757, 1, 'Nariñ'),
(758, 1, 'Nariñ'),
(759, 1, 'Nariñ'),
(760, 1, 'Nariñ'),
(761, 1, 'Nariñ'),
(762, 1, 'Nariñ'),
(763, 1, 'Nariñ'),
(764, 1, 'Nariñ'),
(765, 1, 'Nariñ'),
(766, 1, 'Nariñ'),
(767, 1, 'Nariñ'),
(768, 1, 'Nariñ'),
(769, 1, 'Nariñ'),
(770, 1, 'Nariñ'),
(771, 1, 'Nariñ'),
(772, 1, 'Nariñ'),
(773, 1, 'Nariñ'),
(774, 1, 'Nariñ'),
(775, 1, 'Nariñ'),
(776, 1, 'Nariñ'),
(777, 1, 'Nariñ'),
(778, 1, 'Nariñ'),
(779, 1, 'Nariñ'),
(780, 1, 'Nariñ'),
(781, 1, 'Nariñ'),
(782, 1, 'Nariñ'),
(783, 1, 'Nariñ'),
(784, 1, 'Nariñ'),
(785, 1, 'Nariñ'),
(786, 1, 'Nariñ'),
(787, 1, 'Nariñ'),
(788, 1, 'Nariñ'),
(789, 1, 'Nariñ'),
(790, 1, 'Nariñ'),
(791, 1, 'Nariñ'),
(792, 1, 'Nariñ'),
(793, 1, 'Nariñ'),
(794, 1, 'Nariñ'),
(795, 1, 'Nariñ'),
(796, 1, 'Nariñ'),
(797, 1, 'Norte de Santander'),
(798, 1, 'Norte de Santander'),
(799, 1, 'Norte de Santander'),
(800, 1, 'Norte de Santander'),
(801, 1, 'Norte de Santander'),
(802, 1, 'Norte de Santander'),
(803, 1, 'Norte de Santander'),
(804, 1, 'Norte de Santander'),
(805, 1, 'Norte de Santander'),
(806, 1, 'Norte de Santander'),
(807, 1, 'Norte de Santander'),
(808, 1, 'Norte de Santander'),
(809, 1, 'Norte de Santander'),
(810, 1, 'Norte de Santander'),
(811, 1, 'Norte de Santander'),
(812, 1, 'Norte de Santander'),
(813, 1, 'Norte de Santander'),
(814, 1, 'Norte de Santander'),
(815, 1, 'Norte de Santander'),
(816, 1, 'Norte de Santander'),
(817, 1, 'Norte de Santander'),
(818, 1, 'Norte de Santander'),
(819, 1, 'Norte de Santander'),
(820, 1, 'Norte de Santander'),
(821, 1, 'Norte de Santander'),
(822, 1, 'Norte de Santander'),
(823, 1, 'Norte de Santander'),
(824, 1, 'Norte de Santander'),
(825, 1, 'Norte de Santander'),
(826, 1, 'Norte de Santander'),
(827, 1, 'Norte de Santander'),
(828, 1, 'Norte de Santander'),
(829, 1, 'Norte de Santander'),
(830, 1, 'Norte de Santander'),
(831, 1, 'Norte de Santander'),
(832, 1, 'Norte de Santander'),
(833, 1, 'Norte de Santander'),
(834, 1, 'Norte de Santander'),
(835, 1, 'Norte de Santander'),
(836, 1, 'Norte de Santander'),
(837, 1, 'Norte de Santander'),
(838, 1, 'Quindio'),
(839, 1, 'Quindio'),
(840, 1, 'Quindio'),
(841, 1, 'Quindio'),
(842, 1, 'Quindio'),
(843, 1, 'Quindio'),
(844, 1, 'Quindio'),
(845, 1, 'Quindio'),
(846, 1, 'Quindio'),
(847, 1, 'Quindio'),
(848, 1, 'Quindio'),
(849, 1, 'Quindio'),
(850, 1, 'Quindio'),
(851, 1, 'Risaralda'),
(852, 1, 'Risaralda'),
(853, 1, 'Risaralda'),
(854, 1, 'Risaralda'),
(855, 1, 'Risaralda'),
(856, 1, 'Risaralda'),
(857, 1, 'Risaralda'),
(858, 1, 'Risaralda'),
(859, 1, 'Risaralda'),
(860, 1, 'Risaralda'),
(861, 1, 'Risaralda'),
(862, 1, 'Risaralda'),
(863, 1, 'Risaralda'),
(864, 1, 'Risaralda'),
(865, 1, 'Risaralda'),
(866, 1, 'Santander'),
(867, 1, 'Santander'),
(868, 1, 'Santander'),
(869, 1, 'Santander'),
(870, 1, 'Santander'),
(871, 1, 'Santander'),
(872, 1, 'Santander'),
(873, 1, 'Santander'),
(874, 1, 'Santander'),
(875, 1, 'Santander'),
(876, 1, 'Santander'),
(877, 1, 'Santander'),
(878, 1, 'Santander'),
(879, 1, 'Santander'),
(880, 1, 'Santander'),
(881, 1, 'Santander'),
(882, 1, 'Santander'),
(883, 1, 'Santander'),
(884, 1, 'Santander'),
(885, 1, 'Santander'),
(886, 1, 'Santander'),
(887, 1, 'Santander'),
(888, 1, 'Santander'),
(889, 1, 'Santander'),
(890, 1, 'Santander'),
(891, 1, 'Santander'),
(892, 1, 'Santander'),
(893, 1, 'Santander'),
(894, 1, 'Santander'),
(895, 1, 'Santander'),
(896, 1, 'Santander'),
(897, 1, 'Santander'),
(898, 1, 'Santander'),
(899, 1, 'Santander'),
(900, 1, 'Santander'),
(901, 1, 'Santander'),
(902, 1, 'Santander'),
(903, 1, 'Santander'),
(904, 1, 'Santander'),
(905, 1, 'Santander'),
(906, 1, 'Santander'),
(907, 1, 'Santander'),
(908, 1, 'Santander'),
(909, 1, 'Santander'),
(910, 1, 'Santander'),
(911, 1, 'Santander'),
(912, 1, 'Santander'),
(913, 1, 'Santander'),
(914, 1, 'Santander'),
(915, 1, 'Santander'),
(916, 1, 'Santander'),
(917, 1, 'Santander'),
(918, 1, 'Santander'),
(919, 1, 'Santander'),
(920, 1, 'Santander'),
(921, 1, 'Santander'),
(922, 1, 'Santander'),
(923, 1, 'Santander'),
(924, 1, 'Santander'),
(925, 1, 'Santander'),
(926, 1, 'Santander'),
(927, 1, 'Santander'),
(928, 1, 'Santander'),
(929, 1, 'Santander'),
(930, 1, 'Santander'),
(931, 1, 'Santander'),
(932, 1, 'Santander'),
(933, 1, 'Santander'),
(934, 1, 'Santander'),
(935, 1, 'Santander'),
(936, 1, 'Santander'),
(937, 1, 'Santander'),
(938, 1, 'Santander'),
(939, 1, 'Santander'),
(940, 1, 'Santander'),
(941, 1, 'Santander'),
(942, 1, 'Santander'),
(943, 1, 'Santander'),
(944, 1, 'Santander'),
(945, 1, 'Santander'),
(946, 1, 'Santander'),
(947, 1, 'Santander'),
(948, 1, 'Santander'),
(949, 1, 'Santander'),
(950, 1, 'Santander'),
(951, 1, 'Santander'),
(952, 1, 'Santander'),
(953, 1, 'Santander'),
(954, 1, 'Sucre'),
(955, 1, 'Sucre'),
(956, 1, 'Sucre'),
(957, 1, 'Sucre'),
(958, 1, 'Sucre'),
(959, 1, 'Sucre'),
(960, 1, 'Sucre'),
(961, 1, 'Sucre'),
(962, 1, 'Sucre'),
(963, 1, 'Sucre'),
(964, 1, 'Sucre'),
(965, 1, 'Sucre'),
(966, 1, 'Sucre'),
(967, 1, 'Sucre'),
(968, 1, 'Sucre'),
(969, 1, 'Sucre'),
(970, 1, 'Sucre'),
(971, 1, 'Sucre'),
(972, 1, 'Sucre'),
(973, 1, 'Sucre'),
(974, 1, 'Sucre'),
(975, 1, 'Sucre'),
(976, 1, 'Sucre'),
(977, 1, 'Sucre'),
(978, 1, 'Sucre'),
(979, 1, 'Sucre'),
(980, 1, 'Sucre'),
(981, 1, 'Tolima'),
(982, 1, 'Tolima'),
(983, 1, 'Tolima'),
(984, 1, 'Tolima'),
(985, 1, 'Tolima'),
(986, 1, 'Tolima'),
(987, 1, 'Tolima'),
(988, 1, 'Tolima'),
(989, 1, 'Tolima'),
(990, 1, 'Tolima'),
(991, 1, 'Tolima'),
(992, 1, 'Tolima'),
(993, 1, 'Tolima'),
(994, 1, 'Tolima'),
(995, 1, 'Tolima'),
(996, 1, 'Tolima'),
(997, 1, 'Tolima'),
(998, 1, 'Tolima'),
(999, 1, 'Tolima'),
(1000, 1, 'Tolima'),
(1001, 1, 'Tolima'),
(1002, 1, 'Tolima'),
(1003, 1, 'Tolima'),
(1004, 1, 'Tolima'),
(1005, 1, 'Tolima'),
(1006, 1, 'Tolima'),
(1007, 1, 'Tolima'),
(1008, 1, 'Tolima'),
(1009, 1, 'Tolima'),
(1010, 1, 'Tolima'),
(1011, 1, 'Tolima'),
(1012, 1, 'Tolima'),
(1013, 1, 'Tolima'),
(1014, 1, 'Tolima'),
(1015, 1, 'Tolima'),
(1016, 1, 'Tolima'),
(1017, 1, 'Tolima'),
(1018, 1, 'Tolima'),
(1019, 1, 'Tolima'),
(1020, 1, 'Tolima'),
(1021, 1, 'Tolima'),
(1022, 1, 'Tolima'),
(1023, 1, 'Tolima'),
(1024, 1, 'Tolima'),
(1025, 1, 'Tolima'),
(1026, 1, 'Tolima'),
(1027, 1, 'Tolima'),
(1028, 1, 'Tolima'),
(1029, 1, 'Valle del Cauca'),
(1030, 1, 'Valle del Cauca'),
(1031, 1, 'Valle del Cauca'),
(1032, 1, 'Valle del Cauca'),
(1033, 1, 'Valle del Cauca'),
(1034, 1, 'Valle del Cauca'),
(1035, 1, 'Valle del Cauca'),
(1036, 1, 'Valle del Cauca'),
(1037, 1, 'Valle del Cauca'),
(1038, 1, 'Valle del Cauca'),
(1039, 1, 'Valle del Cauca'),
(1040, 1, 'Valle del Cauca'),
(1041, 1, 'Valle del Cauca'),
(1042, 1, 'Valle del Cauca'),
(1043, 1, 'Valle del Cauca'),
(1044, 1, 'Valle del Cauca'),
(1045, 1, 'Valle del Cauca'),
(1046, 1, 'Valle del Cauca'),
(1047, 1, 'Valle del Cauca'),
(1048, 1, 'Valle del Cauca'),
(1049, 1, 'Valle del Cauca'),
(1050, 1, 'Valle del Cauca'),
(1051, 1, 'Valle del Cauca'),
(1052, 1, 'Valle del Cauca'),
(1053, 1, 'Valle del Cauca'),
(1054, 1, 'Valle del Cauca'),
(1055, 1, 'Valle del Cauca'),
(1056, 1, 'Valle del Cauca'),
(1057, 1, 'Valle del Cauca'),
(1058, 1, 'Valle del Cauca'),
(1059, 1, 'Valle del Cauca'),
(1060, 1, 'Valle del Cauca'),
(1061, 1, 'Valle del Cauca'),
(1062, 1, 'Valle del Cauca'),
(1063, 1, 'Valle del Cauca'),
(1064, 1, 'Valle del Cauca'),
(1065, 1, 'Valle del Cauca'),
(1066, 1, 'Valle del Cauca'),
(1067, 1, 'Valle del Cauca'),
(1068, 1, 'Valle del Cauca'),
(1069, 1, 'Valle del Cauca'),
(1070, 1, 'Valle del Cauca'),
(1071, 1, 'Valle del Cauca'),
(1072, 1, 'Arauca'),
(1073, 1, 'Arauca'),
(1074, 1, 'Arauca'),
(1075, 1, 'Arauca'),
(1076, 1, 'Arauca'),
(1077, 1, 'Arauca'),
(1078, 1, 'Arauca'),
(1079, 1, 'Arauca'),
(1080, 1, 'Casanare'),
(1081, 1, 'Casanare'),
(1082, 1, 'Casanare'),
(1083, 1, 'Casanare'),
(1084, 1, 'Casanare'),
(1085, 1, 'Casanare'),
(1086, 1, 'Casanare'),
(1087, 1, 'Casanare'),
(1088, 1, 'Casanare'),
(1089, 1, 'Casanare'),
(1090, 1, 'Casanare'),
(1091, 1, 'Casanare'),
(1092, 1, 'Casanare'),
(1093, 1, 'Casanare'),
(1094, 1, 'Casanare'),
(1095, 1, 'Casanare'),
(1096, 1, 'Casanare'),
(1097, 1, 'Casanare'),
(1098, 1, 'Casanare'),
(1099, 1, 'Casanare'),
(1100, 1, 'Putumayo'),
(1101, 1, 'Putumayo'),
(1102, 1, 'Putumayo'),
(1103, 1, 'Putumayo'),
(1104, 1, 'Putumayo'),
(1105, 1, 'Putumayo'),
(1106, 1, 'Putumayo'),
(1107, 1, 'Putumayo'),
(1108, 1, 'Putumayo'),
(1109, 1, 'Putumayo'),
(1110, 1, 'Putumayo'),
(1111, 1, 'Putumayo'),
(1112, 1, 'Putumayo'),
(1113, 1, 'Putumayo'),
(1114, 1, 'Archipiélago de San Andr?\r'),
(1115, 1, 'Archipiélago de San Andr?\r'),
(1116, 1, 'Archipiélago de San Andr?\r'),
(1117, 1, 'Amazonas'),
(1118, 1, 'Amazonas'),
(1119, 1, 'Amazonas'),
(1120, 1, 'Amazonas'),
(1121, 1, 'Amazonas'),
(1122, 1, 'Amazonas'),
(1123, 1, 'Amazonas'),
(1124, 1, 'Amazonas'),
(1125, 1, 'Amazonas'),
(1126, 1, 'Amazonas'),
(1127, 1, 'Amazonas'),
(1128, 1, 'Amazonas'),
(1129, 1, 'Guainí'),
(1130, 1, 'Guainí'),
(1131, 1, 'Guainí'),
(1132, 1, 'Guainí'),
(1133, 1, 'Guainí'),
(1134, 1, 'Guainí'),
(1135, 1, 'Guainí'),
(1136, 1, 'Guainí'),
(1137, 1, 'Guainí'),
(1138, 1, 'Guainí'),
(1139, 1, 'Guaviare'),
(1140, 1, 'Guaviare'),
(1141, 1, 'Guaviare'),
(1142, 1, 'Guaviare'),
(1143, 1, 'Guaviare'),
(1144, 1, 'Vaupé'),
(1145, 1, 'Vaupé'),
(1146, 1, 'Vaupé'),
(1147, 1, 'Vaupé'),
(1148, 1, 'Vaupé'),
(1149, 1, 'Vaupé'),
(1150, 1, 'Vaupé'),
(1151, 1, 'Vichada'),
(1152, 1, 'Vichada'),
(1153, 1, 'Vichada'),
(1154, 1, 'Vichada'),
(1155, 1, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reserv`
--

CREATE TABLE `detalle_reserv` (
  `id` int(11) NOT NULL,
  `id_Plato` int(11) NOT NULL,
  `precio` double NOT NULL,
  `cant` int(11) NOT NULL,
  `Subtotal` double NOT NULL,
  `Sub_desc` double NOT NULL,
  `Sub_Iva` double NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_reserv`
--

INSERT INTO `detalle_reserv` (`id`, `id_Plato`, `precio`, `cant`, `Subtotal`, `Sub_desc`, `Sub_Iva`, `id_reserva`) VALUES
(1, 18, 200, 1, 4, 2, 14, 2),
(2, 18, 400, 2, 4, 2, 14, 1),
(3, 20, 1000, 2, 10, 5, 35, 1),
(4, 19, 600, 2, 6, 3, 21, 1),
(5, 18, 400, 2, 4, 2, 14, 1),
(6, 20, 1000, 2, 10, 5, 35, 1),
(7, 19, 600, 2, 6, 3, 21, 1),
(8, 18, 400, 2, 4, 2, 14, 1),
(9, 20, 1000, 2, 10, 5, 35, 1),
(10, 19, 600, 2, 6, 3, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empxrestaurante`
--

CREATE TABLE `empxrestaurante` (
  `id_Rest` int(11) NOT NULL,
  `id_Emp` int(11) NOT NULL,
  `Tipo` bit(1) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotosvidlugar`
--

CREATE TABLE `fotosvidlugar` (
  `idRest` int(11) NOT NULL,
  `id_Foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotosvidlugar`
--

INSERT INTO `fotosvidlugar` (`idRest`, `id_Foto`) VALUES
(8, 13),
(8, 14),
(9, 15),
(9, 16),
(10, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoxplato`
--

CREATE TABLE `fotoxplato` (
  `id_FotoVid` int(11) NOT NULL,
  `id_Plato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotoxplato`
--

INSERT INTO `fotoxplato` (`id_FotoVid`, `id_Plato`) VALUES
(22, 1),
(23, 4),
(24, 5),
(25, 6),
(26, 7),
(27, 10),
(28, 12),
(29, 14),
(30, 16),
(31, 17),
(34, 18),
(35, 19),
(36, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_vid`
--

CREATE TABLE `foto_vid` (
  `id` int(11) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Principal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foto_vid`
--

INSERT INTO `foto_vid` (`id`, `Url`, `Principal`) VALUES
(2, 'C:\\xampp\\tmp\\phpB8FD.tmp', 0),
(3, 'fotospacos/6cktnXyBC4r4z7dF795uFh1hvidocP8KFnLnuBdr.jpeg', 0),
(4, 'fotospacos/oxafvtVuRbyLSu2Ea7w6ffAlELsSeWhPNzHHG046.jpeg', 1),
(5, 'fotospacos/EgyEzkFkrrbBrP1FFJa3U5Mbupbe959vSMDy7N1G.jpeg', 0),
(6, 'fotospacos/2MHaBLJ3Nq9pFe9pQwcliyGLYc6EjTzM5HZvzS52.jpeg', 1),
(7, 'fotospacos/mUeVqPkrEIBD5FQPJdhUXMVfWFfQwdSJDX6P0XWU.jpeg', 0),
(8, 'fotospacos/v90sEjtb1avogqckiIQM3O9kQ5BiRtAokHRRJcZF.jpeg', 1),
(9, 'fotospacos/lXGAyZ9pBRKjgRmGoET3efbSSHwP1Xf1LUlAH380.jpeg', 0),
(10, 'fotospacos/w6r6T2Wznn3AAlHF5HAHDOncgC2EMH1bZ2h4xwao.jpeg', 1),
(11, 'fotospacos/aDoZG6AfyEHxIECQdZraYvW0AuQJKQOqIqEVE8eU.jpeg', 0),
(12, 'fotospacos/ENAdMK5UH6VEUfQW4wgSxSSm1PHhgHeH9R2h0oWO.jpeg', 1),
(13, 'fotospacos/3TakaPJXKvUNvmBx70xYq7MTcf309Aou2gBmJIK5.jpeg', 0),
(14, 'fotospacos/6OKTdWwRU8h2NVOFQXG3EJPqzhTK1BHDS3Xyg8IO.jpeg', 1),
(15, 'fotospacos/wkDkY6rHYAmLek8RduYz5CnAyAZ1TXAzdpJ1hrUe.jpeg', 0),
(16, 'fotospacos/LBaaliejwX4xZgOKY2PkzzA69hciHCRQJgfdmqaT.jpeg', 1),
(17, 'fotospacos/categorias/XtP6qGauraVpDC2Qfi4ldEm9siraQJzZZMqTA02r.png', 2),
(19, 'fotospacos/categorias/P4oYSbpv8gdKR2cU6zdIpJ5CllNy7xfGB051vqbF.jpeg', 2),
(20, 'fotospacos/categorias/9jNxLmtU4KC8c2XTHfLGfC7rbis88OymLaMbsGB6.jpeg', 2),
(21, 'fotospacos/categorias/1d5Dw3FkcvYNlc66rLbUoE21yhsSWNTt4oHnxZhI.jpeg', 2),
(22, 'fotospacos/comidas/1aT6C4lKUklZMPRrfpcNGUwK3n9dX5pH4yOLZjXK.jpeg', 3),
(23, '9Sitio de comida4BebidasJugo de mora2000leche, mora, hielofotospacos/comidas/CO3UzT77K95kPGUQWdn4aXNwaDicovMwcozLPfcG.jpeg', 3),
(24, '9Sitio de comida4BebidasJugo de piña2000piña, hielo, lechefotospacos/comidas/kvnIlM3xFlyUOInTalFrRyXcojbcV1qepXodmIBv.jpeg', 3),
(25, '9Sitio de comida4Bebidasgaseosa manzana2500postobon sabor manzanafotospacos/comidas/DgMlEmiAfBVqvW73bQUEqOpZS9EN1hw2E37Wzja1.jpeg', 3),
(26, '9Sitio de comida4Bebidasagua mineral5000agua mineralfotospacos/comidas/fmx57tZxVEJTgfF0Y8wzVu1R1JPOnkmLbZWnlNH3.jpeg', 3),
(27, '4BebidasJugo Hit3 sabores(mora, naranja, mandarina)fotospacos/comidas/qqvZAFGRZSGaiDGJZ6UWsYAgfGqAhnqqxyA0NzWL.jpeg', 3),
(28, 'fotospacos/comidas/jbeyPT7ST7BNBasPzqnhfnv7DywwHp2PZXgkZnLH.jpeg', 3),
(29, 'fotospacos/comidas/6AvzvE67j75YGVD8ZeMJVMdaofSUN7hc6voRHR2I.png', 3),
(30, 'fotospacos/comidas/U12Oy93qEomQSpL9ICPzXAPfMSNZb9yaQDKKoBKK.jpeg', 3),
(31, 'fotospacos/comidas/HIfCoSh3GNPINzDM3U7k5ZZ2rLnR1haW8ItIQD7n.png', 3),
(32, 'fotospacos/14FStDiQCGZBIQc2znVwnxjGUADZ5Td9enlXz2zq.png', 0),
(33, 'fotospacos/bDeEt4o0zZ2tR0sl4vjXMiKPETINfib0lHUM5vEc.jpeg', 1),
(34, 'fotospacos/comidas/M4kO1Jgb4TsI3AngQUkgDv6C65kL9pADaPxKFmC0.jpeg', 3),
(35, 'fotospacos/comidas/DvQenu4jF49dGo0bzObQbJ8EU9TQs4Gc7CTz3srV.jpeg', 3),
(36, 'fotospacos/comidas/3L8bZgD2qfyOY3XwLRMoI7DyoK3p3XIREBSeon38.jpeg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `DIa_Ini` varchar(255) NOT NULL,
  `Hora_APert` time NOT NULL,
  `Hora_cierre` time NOT NULL,
  `Dia_cierre` varchar(255) NOT NULL,
  `id_pacos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `DIa_Ini`, `Hora_APert`, `Hora_cierre`, `Dia_cierre`, `id_pacos`) VALUES
(1, 'Domingo', '08:00:00', '20:30:00', 'Domingo', 2),
(2, 'Domingo', '07:00:00', '19:00:00', 'domingo', 3),
(3, 'Lunes', '11:00:00', '21:00:00', 'Lunes', 4),
(4, 'Domingo', '07:07:00', '21:07:00', 'sabado', 5),
(5, 'Domingo', '08:16:00', '20:17:00', 'martes', 6),
(6, 'Lunes', '07:58:00', '20:58:00', 'Viernes', 8),
(7, 'Domingo', '07:42:00', '20:00:00', 'Sabado', 9),
(8, 'Domingo', '10:13:00', '21:13:00', 'sabado', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioxrest`
--

CREATE TABLE `horarioxrest` (
  `idRest` int(11) NOT NULL,
  `idHor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarioxrest`
--

INSERT INTO `horarioxrest` (`idRest`, `idHor`) VALUES
(8, 6),
(9, 7),
(10, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `Remitente` int(11) NOT NULL,
  `Destinatario` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `Puestos` int(11) NOT NULL,
  `Restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `numero`, `Puestos`, `Restaurante`) VALUES
(3, 1, 6, 8),
(4, 2, 4, 8),
(7, 3, 3, 8),
(8, 4, 2, 8),
(9, 1, 4, 10),
(10, 2, 6, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `Nombre`) VALUES
(1, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int(11) NOT NULL,
  `Categoria` int(11) NOT NULL,
  `Nombre` varchar(110) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` float NOT NULL,
  `cant` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `Categoria`, `Nombre`, `Descripcion`, `Precio`, `cant`) VALUES
(1, 4, 'malteada de naranja', 'naranjas, crema de leche, leche, crema chantilly', 2000, 1),
(2, 4, 'Jugo de mora', 'leche, mora, hielo', 2000, 1),
(3, 4, 'Jugo de mora', 'leche, mora, hielo', 2000, 1),
(4, 4, 'Jugo de mora', 'leche, mora, hielo', 2000, 1),
(5, 4, 'Jugo de piña', 'piña, hielo, leche', 2000, 1),
(6, 4, 'gaseosa manzana', 'postobon sabor manzana', 2500, 1),
(7, 4, 'agua mineral', 'agua mineral', 5000, 1),
(8, 4, 'Jugo Hit', '3 sabores(mora, naranja, mandarina)', 2000, 1),
(9, 4, 'Jugo Hit', '3 sabores(mora, naranja, mandarina)', 2000, 1),
(10, 4, 'Jugo Hit', '3 sabores(mora, naranja, mandarina)', 2000, 1),
(11, 4, 'comida', 'ingedientes de la comida', 200, 1),
(12, 4, 'comida', 'ingedientes de la comida', 200, 1),
(13, 4, 'otra comid', 'sus ingredientes', 3455, 1),
(14, 4, 'otra comid', 'sus ingredientes', 3455, 1),
(16, 1, 'Hamburguesas de patacon', 'Platano verde, carne, lechuga, tomate, pan bimbo', 8000, 1),
(17, 1, 'Hamburguesa Normal', 'pan bimbo, cebolla, lechuga, tomate, carne, salsas', 8000, 1),
(18, 6, 'Glaseados', 'harina de trigo, glaseado de sabores, con queso al interior', 200, 1),
(19, 6, 'con bocadillo', 'bocadillo de guayaba, harina de trigo, azucar morena', 300, 1),
(20, 6, 'chocodulce', 'chocolate, harina de maiz, chispas, horneado, crujiente', 500, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platosxrest`
--

CREATE TABLE `platosxrest` (
  `id_Rest` int(11) NOT NULL,
  `id_Plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platosxrest`
--

INSERT INTO `platosxrest` (`id_Rest`, `id_Plat`) VALUES
(9, 1),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(9, 14),
(9, 15),
(9, 16),
(9, 17),
(10, 18),
(10, 19),
(10, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoplato`
--

CREATE TABLE `promoplato` (
  `id` int(11) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Fecha_ini` datetime NOT NULL,
  `Fecha_Fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promorest`
--

CREATE TABLE `promorest` (
  `id` int(11) NOT NULL,
  `Valor` int(11) DEFAULT NULL,
  `Porcentaje` int(11) DEFAULT NULL,
  `Fecha_ini` datetime NOT NULL,
  `Fecha_fin` datetime NOT NULL,
  `Tipo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoxplato`
--

CREATE TABLE `promoxplato` (
  `id_Plato` int(11) NOT NULL,
  `id_PromoP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `id` int(11) NOT NULL,
  `Url` varchar(200) DEFAULT 'Falta red social',
  `Icono` varchar(255) DEFAULT NULL,
  `Tipo` int(11) DEFAULT 0,
  `id_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`id`, `Url`, `Icono`, `Tipo`, `id_restaurante`) VALUES
(1, '3152092557', NULL, 2, 0),
(2, 'pantolima', NULL, 1, 0),
(3, 'pantolima', NULL, 3, 0),
(4, 'pantolima', NULL, 4, 0),
(5, 'pantolima1234', NULL, 5, 0),
(6, 'pantolima1234', NULL, 6, 0),
(7, 'veronacafe', NULL, 1, 0),
(8, 'veronacafe', NULL, 1, 0),
(9, 'veronacafe', NULL, 1, 0),
(10, 'veronacafe', NULL, 3, 0),
(11, 'veronacafe', NULL, 3, 0),
(12, 'veronacafe', NULL, 3, 0),
(13, 'veronacafe', NULL, 4, 0),
(14, 'veronacafe', NULL, 4, 0),
(15, 'verona.cafe.com', NULL, 5, 0),
(16, 'url de facebook', NULL, 1, 0),
(17, 'url de twitter', NULL, 3, 0),
(18, 'prueba url facebook', NULL, 1, 6),
(19, 'prueba url twitter', NULL, 3, 6),
(20, 'prueba url instagram', NULL, 4, 6),
(21, 'prueba url sitio web', NULL, 5, 6),
(22, 'prueba url youtube', NULL, 6, 6),
(23, 'prueba url facebook', NULL, 1, 6),
(24, 'prueba url twitter', NULL, 3, 6),
(25, 'prueba url instagram', NULL, 4, 6),
(26, 'prueba url sitio web', NULL, 5, 6),
(27, 'prueba url youtube', NULL, 6, 6),
(28, 'facebook url', NULL, 1, 7),
(29, '101010101', NULL, 2, 7),
(30, 'twitter url', NULL, 3, 7),
(31, 'instagram url', NULL, 4, 7),
(32, 'sitio web url', NULL, 5, 7),
(33, 'youtube url', NULL, 6, 7),
(34, 'facebook', NULL, 1, 8),
(35, '12012034', NULL, 2, 8),
(36, 'twitter', NULL, 3, 8),
(37, 'instagram', NULL, 4, 8),
(38, 'sitio web.com', NULL, 5, 8),
(39, 'youtube', NULL, 6, 8),
(56, 'facebook.com', 'https://www.flaticon.es/svg/static/icons/svg/174/174848.svg', 1, 9),
(57, '2020202', 'https://www.flaticon.es/svg/static/icons/svg/174/174879.svg', 2, 9),
(58, 'twitter.com', 'https://www.flaticon.es/svg/static/icons/svg/174/174876.svg', 3, 9),
(59, 'instagram.com', 'https://www.flaticon.es/svg/static/icons/svg/174/174855.svg', 4, 9),
(60, 'sitioweb.com', 'https://www.flaticon.es/svg/static/icons/svg/174/174844.svg', 5, 9),
(61, 'youtube.com', 'https://www.flaticon.es/svg/static/icons/svg/174/174883.svg', 6, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redesxrest`
--

CREATE TABLE `redesxrest` (
  `id_Rest` int(11) NOT NULL,
  `id_Redes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `redesxrest`
--

INSERT INTO `redesxrest` (`id_Rest`, `id_Redes`) VALUES
(8, 30),
(8, 34),
(8, 35),
(8, 38),
(8, 39),
(9, 56),
(9, 57),
(9, 58),
(9, 59),
(9, 60),
(9, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_Restaurante` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Mesa` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_Ini` time NOT NULL,
  `Hora_Fin` time NOT NULL,
  `Cant_Personas` int(11) NOT NULL,
  `informacionAdc` varchar(255) DEFAULT NULL,
  `total` double NOT NULL,
  `total_desc` double NOT NULL,
  `total_iva` double NOT NULL,
  `Detalle_Reserv` int(11) DEFAULT 0,
  `pagado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_Restaurante`, `id_Usuario`, `id_Mesa`, `Fecha`, `Hora_Ini`, `Hora_Fin`, `Cant_Personas`, `informacionAdc`, `total`, `total_desc`, `total_iva`, `Detalle_Reserv`, `pagado`) VALUES
(1, 10, 1, 9, '2020-11-10', '06:36:13', '08:36:13', 3, 'Escribirme a whatsApp si algo sale mal: aquí 1234567890', 2000, 500, 100, 1, 1),
(2, 10, 1, 10, '2020-11-11', '11:07:00', '00:07:00', 5, 'Avisarme cuándo todo este listo', 2000, 150, 100, 1, 1),
(3, 10, 1, 9, '2020-12-31', '12:00:00', '13:00:00', 3, 'informacion adicional', 2000, 150, 100, 0, 1),
(4, 10, 1, 10, '2020-11-11', '13:32:00', '14:32:00', 6, 'informacion adicional', 2000, 150, 100, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id` int(11) NOT NULL,
  `Restaurante` int(11) NOT NULL,
  `id_comida` int(11) NOT NULL DEFAULT 0,
  `Usuario` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `reseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id`, `Restaurante`, `id_comida`, `Usuario`, `hora`, `fecha`, `reseña`) VALUES
(1, 10, 0, 1, '08:10:40', '2020-11-18', 'Esta es la segunda reseña que tendrá este sitio, ya que es uno de los mas completos para pruebas que tengo'),
(2, 10, 0, 1, '08:10:45', '2020-11-18', 'Hago una tercera reseña que tendrá este sitio, ya que es uno de los mas completos para pruebas que tengo'),
(3, 10, 0, 1, '08:16:46', '2020-11-18', 'Como prueba hago una cuarta reseña que tendrá este sitio, ya que es uno de los mas completos para pruebas que tengo'),
(4, 9, 0, 3, '11:33:48', '2020-11-20', 'Esta es la segunda reseña que tendrá este sitio, ya que es uno de los mas completos para pruebas que tengo'),
(5, 9, 0, 3, '11:53:42', '2020-11-20', 'Otra reseña para testear el responsive'),
(6, 10, 0, 3, '06:04:16', '2020-11-20', 'Vsjsjbdbdhd'),
(7, 10, 19, 1, '11:29:12', '2020-11-21', 'Aquí la reseña de la comida, opinas sobre esta comida y tu experiencia con esta'),
(8, 10, 19, 1, '12:14:35', '2020-11-21', 'hey'),
(9, 10, 19, 1, '12:14:35', '2020-11-21', 'hey'),
(10, 10, 19, 1, '12:14:35', '2020-11-21', 'hey'),
(11, 10, 19, 1, '12:14:35', '2020-11-21', 'hey'),
(12, 10, 19, 1, '12:14:35', '2020-11-21', 'hey'),
(13, 10, 19, 1, '12:14:35', '2020-11-21', 'hey'),
(14, 10, 19, 1, '12:14:35', '2020-11-21', 'hey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(170) NOT NULL,
  `categoria` int(11) NOT NULL,
  `Direccion` varchar(170) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `BarrioVere` varchar(100) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  `Nit` int(11) NOT NULL,
  `DigVer` int(11) NOT NULL,
  `domicilios` tinyint(1) NOT NULL DEFAULT 0,
  `reservas` tinyint(1) NOT NULL DEFAULT 0,
  `ordenes` tinyint(1) NOT NULL DEFAULT 0,
  `FotoPerfil` int(11) DEFAULT NULL,
  `FotoPortada` int(11) DEFAULT NULL,
  `Capacidad` int(11) NOT NULL,
  `Promo` int(11) DEFAULT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nombre`, `categoria`, `Direccion`, `Telefono`, `email`, `BarrioVere`, `pais`, `Ciudad`, `Nit`, `DigVer`, `domicilios`, `reservas`, `ordenes`, `FotoPerfil`, `FotoPortada`, `Capacidad`, `Promo`, `Descripcion`, `id_usuario`, `tipo_restaurante`) VALUES
(8, 'Heladeria Central', 1, 'calle 8 #2-10 A sur', '202020220', 'mail@gmail.com', 'Centro', 'Colombia', 1, 123456789, 1, 0, 1, 0, 13, 14, 12, NULL, 'Vendemos los mejores helados, pero no lo decimos nosotros, lo dicen los demás, mira lo que dicen', 2, 0),
(9, 'Sitio de comida', 1, 'Isnos-Huila', '3152092557', 'mail@gmail.com', 'centro', 'Colombia', 1, 23456, 3, 1, 0, 0, 15, 16, 23, NULL, 'Aquí la descripción de mi sitio', 1, 0),
(10, 'Pan Tolima', 2, 'calle 8 #2-10 A sur', '3152092557', 'mail@gmail.com', 'Emiro barrera', 'Colombia', 1, 23456745, 4, 0, 1, 0, 16, 16, 12, NULL, 'vendemos gran variedad de pan, con el mejor y autentico sabor del tolima', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporedes`
--

CREATE TABLE `tiporedes` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiporedes`
--

INSERT INTO `tiporedes` (`id`, `Nombre`) VALUES
(1, 'facebook'),
(2, 'whatsapp'),
(3, 'twitter'),
(4, 'instagram'),
(5, 'sitio web'),
(6, 'youtube');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `tipo` tinyint(1) NOT NULL,
  `ciudad` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `direccion`, `email`, `contrasena`, `password`, `telefono`, `tipo`, `ciudad`, `updated_at`, `created_at`) VALUES
(1, 'ricardo', NULL, NULL, 'danieliles18@gmail.com', '12345678', '$2y$10$0CnVcPFP3ZdLqD8lkEfIT.YFBVcl0adYRDUHv9PY1vxJcYphDUWh.', NULL, 1, NULL, '2020-11-05 14:42:58', '2020-11-05 14:42:58'),
(2, 'Daniel Iles', NULL, NULL, 'daniel@gmail.com', '12345678', '$2y$10$N2M92lx/lqyokCM6haJNG.3IFX04IQLwjMHyOJSEwIFtqhmLWEhea', NULL, 1, NULL, '2020-11-05 23:51:20', '2020-11-05 23:51:20'),
(3, 'Ricardo', 'Iles Iles', NULL, 'ricardo@mail.com', 'ricardomail', '$2y$10$UfrrJUSUeV0BHf1N7W4qxOup82mw9d7PCGcq8OdjZhtWtTRf/cXiW', '3152092557', 0, 1, '2020-11-09 19:38:27', '2020-11-09 19:38:27'),
(4, 'Prueba responsive', NULL, NULL, 'prueba@gmail.com', '12345678', '$2y$10$/y.D0qwYVB7qt0xYuy1XTOYCTjKSPONFqx4uAs0jzqDHYypMrTfam', NULL, 1, NULL, '2020-11-19 19:13:54', '2020-11-19 19:13:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catplatos`
--
ALTER TABLE `catplatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CatPlatos_fk0` (`Foto`),
  ADD KEY `catxrest` (`id_restaurante`);

--
-- Indices de la tabla `catxrest`
--
ALTER TABLE `catxrest`
  ADD PRIMARY KEY (`id_Cat`,`id_Rest`),
  ADD KEY `CatxRest_fk1` (`id_Rest`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depto` (`Departamento`);

--
-- Indices de la tabla `clientxrest`
--
ALTER TABLE `clientxrest`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `ClientxRest_fk1` (`idRest`);

--
-- Indices de la tabla `configrest`
--
ALTER TABLE `configrest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configRest_fk0` (`Restaurante`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pais` (`Pais`);

--
-- Indices de la tabla `detalle_reserv`
--
ALTER TABLE `detalle_reserv`
  ADD PRIMARY KEY (`id`,`id_Plato`) USING BTREE,
  ADD KEY `idplatos_fk0` (`id_Plato`);

--
-- Indices de la tabla `empxrestaurante`
--
ALTER TABLE `empxrestaurante`
  ADD PRIMARY KEY (`id_Rest`,`id_Emp`),
  ADD KEY `EmpxRestaurante_fk1` (`id_Emp`);

--
-- Indices de la tabla `fotosvidlugar`
--
ALTER TABLE `fotosvidlugar`
  ADD PRIMARY KEY (`idRest`,`id_Foto`),
  ADD KEY `FotosVidLugar_fk1` (`id_Foto`);

--
-- Indices de la tabla `fotoxplato`
--
ALTER TABLE `fotoxplato`
  ADD PRIMARY KEY (`id_FotoVid`,`id_Plato`),
  ADD KEY `id_Plato` (`id_Plato`);

--
-- Indices de la tabla `foto_vid`
--
ALTER TABLE `foto_vid`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarioxrest`
--
ALTER TABLE `horarioxrest`
  ADD PRIMARY KEY (`idRest`,`idHor`),
  ADD KEY `HorarioxRest_fk1` (`idHor`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Mensajes_fk0` (`Remitente`),
  ADD KEY `Mensajes_fk1` (`Destinatario`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`,`Restaurante`),
  ADD KEY `Mesas_fk0` (`Restaurante`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Platos_fk0` (`Categoria`);

--
-- Indices de la tabla `platosxrest`
--
ALTER TABLE `platosxrest`
  ADD PRIMARY KEY (`id_Rest`,`id_Plat`),
  ADD KEY `id_Plat` (`id_Plat`);

--
-- Indices de la tabla `promoplato`
--
ALTER TABLE `promoplato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promorest`
--
ALTER TABLE `promorest`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promoxplato`
--
ALTER TABLE `promoxplato`
  ADD PRIMARY KEY (`id_Plato`),
  ADD KEY `PromoxPlato_fk1` (`id_PromoP`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indices de la tabla `redesxrest`
--
ALTER TABLE `redesxrest`
  ADD PRIMARY KEY (`id_Rest`,`id_Redes`),
  ADD KEY `id_Redes` (`id_Redes`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Reservas_fk0` (`id_Restaurante`),
  ADD KEY `Reservas_fk1` (`id_Usuario`),
  ADD KEY `Reservas_fk2` (`id_Mesa`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Reseñas_fk0` (`Restaurante`),
  ADD KEY `Reseñas_fk1` (`Usuario`),
  ADD KEY `id_comida` (`id_comida`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Restaurantes_fk0` (`Ciudad`),
  ADD KEY `Restaurantes_fk1` (`FotoPerfil`),
  ADD KEY `Restaurantes_fk2` (`FotoPortada`),
  ADD KEY `Restaurantes_fk3` (`Promo`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `tiporedes`
--
ALTER TABLE `tiporedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_fk0` (`ciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catplatos`
--
ALTER TABLE `catplatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1156;

--
-- AUTO_INCREMENT de la tabla `configrest`
--
ALTER TABLE `configrest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1156;

--
-- AUTO_INCREMENT de la tabla `detalle_reserv`
--
ALTER TABLE `detalle_reserv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `foto_vid`
--
ALTER TABLE `foto_vid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `promoplato`
--
ALTER TABLE `promoplato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promorest`
--
ALTER TABLE `promorest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tiporedes`
--
ALTER TABLE `tiporedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catplatos`
--
ALTER TABLE `catplatos`
  ADD CONSTRAINT `CatPlatos_fk0` FOREIGN KEY (`Foto`) REFERENCES `foto_vid` (`id`),
  ADD CONSTRAINT `catxrest` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `catxrest`
--
ALTER TABLE `catxrest`
  ADD CONSTRAINT `CatxRest_fk0` FOREIGN KEY (`id_Cat`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `CatxRest_fk1` FOREIGN KEY (`id_Rest`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `depto` FOREIGN KEY (`Departamento`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `clientxrest`
--
ALTER TABLE `clientxrest`
  ADD CONSTRAINT `ClientxRest_fk0` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ClientxRest_fk1` FOREIGN KEY (`idRest`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `configrest`
--
ALTER TABLE `configrest`
  ADD CONSTRAINT `configRest_fk0` FOREIGN KEY (`Restaurante`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `pais` FOREIGN KEY (`Pais`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `detalle_reserv`
--
ALTER TABLE `detalle_reserv`
  ADD CONSTRAINT `idplatos_fk0` FOREIGN KEY (`id_Plato`) REFERENCES `platos` (`id`);

--
-- Filtros para la tabla `empxrestaurante`
--
ALTER TABLE `empxrestaurante`
  ADD CONSTRAINT `EmpxRestaurante_fk0` FOREIGN KEY (`id_Rest`) REFERENCES `restaurantes` (`id`),
  ADD CONSTRAINT `EmpxRestaurante_fk1` FOREIGN KEY (`id_Emp`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `fotosvidlugar`
--
ALTER TABLE `fotosvidlugar`
  ADD CONSTRAINT `FotosVidLugar_fk0` FOREIGN KEY (`idRest`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FotosVidLugar_fk1` FOREIGN KEY (`id_Foto`) REFERENCES `foto_vid` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `fotoxplato`
--
ALTER TABLE `fotoxplato`
  ADD CONSTRAINT `Fotoxplato_fk0` FOREIGN KEY (`id_FotoVid`) REFERENCES `foto_vid` (`id`),
  ADD CONSTRAINT `Fotoxplato_fk1` FOREIGN KEY (`id_Plato`) REFERENCES `platos` (`id`);

--
-- Filtros para la tabla `horarioxrest`
--
ALTER TABLE `horarioxrest`
  ADD CONSTRAINT `HorarioxRest_fk0` FOREIGN KEY (`idRest`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `HorarioxRest_fk1` FOREIGN KEY (`idHor`) REFERENCES `horario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `Mensajes_fk0` FOREIGN KEY (`Remitente`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Mensajes_fk1` FOREIGN KEY (`Destinatario`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `Mesas_fk0` FOREIGN KEY (`Restaurante`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `Platos_fk0` FOREIGN KEY (`Categoria`) REFERENCES `catplatos` (`id`);

--
-- Filtros para la tabla `platosxrest`
--
ALTER TABLE `platosxrest`
  ADD CONSTRAINT `PlatosxRest_fk0` FOREIGN KEY (`id_Rest`) REFERENCES `restaurantes` (`id`),
  ADD CONSTRAINT `PlatosxRest_fk1` FOREIGN KEY (`id_Plat`) REFERENCES `platos` (`id`);

--
-- Filtros para la tabla `promoxplato`
--
ALTER TABLE `promoxplato`
  ADD CONSTRAINT `PromoxPlato_fk0` FOREIGN KEY (`id_Plato`) REFERENCES `platos` (`id`),
  ADD CONSTRAINT `PromoxPlato_fk1` FOREIGN KEY (`id_PromoP`) REFERENCES `promoplato` (`id`);

--
-- Filtros para la tabla `redes`
--
ALTER TABLE `redes`
  ADD CONSTRAINT `Redes_fk0` FOREIGN KEY (`Tipo`) REFERENCES `tiporedes` (`id`),
  ADD CONSTRAINT `redes_ibfk_1` FOREIGN KEY (`Tipo`) REFERENCES `tiporedes` (`id`);

--
-- Filtros para la tabla `redesxrest`
--
ALTER TABLE `redesxrest`
  ADD CONSTRAINT `RedesxRest_fk0` FOREIGN KEY (`id_Rest`) REFERENCES `restaurantes` (`id`),
  ADD CONSTRAINT `RedesxRest_fk1` FOREIGN KEY (`id_Redes`) REFERENCES `redes` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `Reservas_fk0` FOREIGN KEY (`id_Restaurante`) REFERENCES `restaurantes` (`id`),
  ADD CONSTRAINT `Reservas_fk1` FOREIGN KEY (`id_Usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Reservas_fk2` FOREIGN KEY (`id_Mesa`) REFERENCES `mesas` (`id`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `Reseñas_fk0` FOREIGN KEY (`Restaurante`) REFERENCES `restaurantes` (`id`),
  ADD CONSTRAINT `Reseñas_fk1` FOREIGN KEY (`Usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `Restaurantes_fk0` FOREIGN KEY (`Ciudad`) REFERENCES `ciudades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Restaurantes_fk1` FOREIGN KEY (`FotoPerfil`) REFERENCES `foto_vid` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Restaurantes_fk2` FOREIGN KEY (`FotoPortada`) REFERENCES `foto_vid` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Restaurantes_fk3` FOREIGN KEY (`Promo`) REFERENCES `promorest` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`ciudad`) REFERENCES `ciudades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
