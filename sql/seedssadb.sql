-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 11:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seedssadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admon`
--

CREATE TABLE `admon` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `admon`
--

INSERT INTO `admon` (`id`, `usuario`, `clave`) VALUES
(1, 'manuela', 'f253f1df4064ae810d5b48a995fb5c9e2bccf785847e4d686297fc11dfc985c69df0a92398151c20690e8746d07b4026c9f9');

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `num` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
(52, '1', 'eNE6RrJ2d7ZhSiTuxO1zovBKPIDAVa', 6, 23, 1, 1800.00, 25.00, 0.00, '2023-11-03 07:51:58'),
(54, '0', 'uTlqQSm7pPfZsk8FB0Nr62G5nbW3RD', 0, 22, 1, 2500.00, 0.00, 0.00, '2023-11-03 10:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `historialpedidos`
--

CREATE TABLE `historialpedidos` (
  `id` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `num` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `historialpedidos`
--

INSERT INTO `historialpedidos` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
(37, '1', 'QiGRAWXN35mBkFhTwjCrMg6EltfZ91', 0, 44, 1, 30.00, 0.00, 0.00, '2023-11-03 10:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `publico` text NOT NULL,
  `objetivo` text NOT NULL,
  `necesario` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `tipo`, `nombre`, `descripcion`, `publico`, `objetivo`, `necesario`, `precio`, `descuento`, `envio`, `imagen`, `fecha`) VALUES
(22, '0', 'Yoga sensible al trauma', 'Es una práctica terapéutica para sanar las heridas emocionales. Es un recurso para sanar la relación contigo misma, conocerte y analizar nuestras decisiones personales. El curso tiene una duración de 10 semanas.', 'A mujeres, a partir de 15 años en adelante.', 'Lograr una conexión espiritual y plenitud con uno mismo mediante técnicas especializadas del yoga.', 'Tapete de yoga y ropa comoda para los cursos.', 2500.00, 0.00, 0.00, 'yoga-sensible-al-trauma.jpg', '2023-10-28'),
(23, '0', 'Reconectar con mi sexualidad', 'Imagina reconectar con tu sexualidad, desde un lugar amable y sensible. Esto es posible, desde la comodidad de tu casa te acompañaremos para aclarar tus dudas. Podrás experimentar técnicas que pueden ser recursos para tu autocuidado y tu placer sexual. El curso tiene una duración de 8 semanas.', 'A mujeres, 18 años en adelante.', 'Mediante el taller se espera que logres resolver tus dudas respecto a tu sexualidad, al igual que experimentar técnicas en las cuales puedas encontrar tus gustos para tu placer sexual e igualmente considerando nuestro autocuidado.', 'Lugar en donde te sientas cómoda para tomar las sesiones ya que el curso es virtual.', 1800.00, 25.00, 0.00, 'reconectar-con-mi-sexualidad.jpg', '2023-11-01'),
(27, '1', 'Medias de red delgada', 'Medias de red delgada, color negro y con borde superior de encaje. Talla: Unitalla. ', '', '', '', 100.00, 0.00, 0.00, 'medias-de-red-delgada.jpg', '2023-11-01'),
(28, '1', 'Lubricante sabor cereza', 'Lubricante con agradable sabor a cereza, hecho a base de agua, compatible con el latex y es hipoalergénico.', '', '', '', 15.00, 0.00, 0.00, 'lubricante-sabor-cereza.jpg', '2023-10-31'),
(29, '1', 'Lubricante sabor chocolate', 'Lubricante con agradable sabor a chocolate, hecho a base de agua, compatible con el latex y es hipoalergénico.', '', '', '', 15.00, 0.00, 0.00, 'lubricante-sabor-chocolate.jpg', '2023-10-30'),
(30, '1', 'Lubricante sabor chicle', 'Lubricante con agradable sabor a chicle, hecho a base de agua, compatible con el latex y es hipoalergénico.', '', '', '', 15.00, 0.00, 0.00, 'lubricante-sabor-chicle.jpg', '2023-10-30'),
(31, '1', 'Lubricante sabor mango', 'Lubricante con agradable sabor a mango, hecho a base de agua, compatible con el latex y es hipoalergénico.', '', '', '', 15.00, 0.00, 0.00, 'lubricante-sabor-mango.jpg', '2023-10-29'),
(32, '1', 'Lubricante sabor sandía', 'Lubricante con agradable sabor a sandía, hecho a base de agua, compatible con el latex y es hipoalergénico.', '', '', '', 15.00, 0.00, 0.00, 'lubricante-sabor-sandia.jpg', '2023-10-30'),
(33, '1', 'Lubricante sabor piña colada', 'Lubricante con agradable sabor a piña colada, hecho a base de agua, compatible con el latex y es hipoalergénico.', '', '', '', 15.00, 0.00, 0.00, 'lubricante-sabor-pina-colada.jpg', '2023-10-30'),
(34, '1', 'Pequeña bala vibradora', 'Diviertete un poco más con el vibrador personal Sey Egg Silver con diferentes niveles de vibración aumentado la estimulación.\r-\n\r-\nDestaca también por ser muy discreto y ser de fácil limpieza, se recomienda limpiar con toallitas desinfectantes o lavar con agua y jabón después de cada uso.', '', '', '', 200.00, 0.00, 0.00, 'pequena-bala-vibradora.jpg', '2023-10-30'),
(35, '1', 'Bullet Vibrador', 'El masajeador personal Sey Bullet Red mide 5,7 cm de largo y 1,6 cm de grosor para brindar una estimulación satisfactoria. Asimismo, su especial diseño de bala logra un índice de vibración cómodo y placentero tanto para mujeres como para hombres debido a su afinidad con la anatomía del cuerpo. Incluye pilas y es fácil de limpiar.', '', '', '', 150.00, 0.00, 0.00, 'bullet-vibrador.jpg', '2023-10-30'),
(36, '1', 'Aceite para masaje sabor chocolate', 'Con LovLub Hot Kiss Aceite de Masaje Sabor Chocolate de 60ml podrás crear una atmósfera especial, donde el aroma y el sabor juegan un papel importante.\r-\n\r-\nAplica en cualquier parte de tu cuerpo para sentir la sensación de calor en tu piel. Por si fuera poco, también podrás disfrutar de su exquisito sabor porque es 100-% comestible. El aceite actúa elevando suavemente la temperatura de la piel mediante la fricción.\r-\n\r-\nEs muy ligero y no irrita ni mancha la ropa.', '', '', '', 115.00, 0.00, 0.00, 'aceite-para-masaje-sabor-chocolate.jpg', '2023-10-30'),
(37, '1', 'Aceite para masaje sabor fresa wiki', 'Con LovLub Hot Kiss Aceite de Masaje Sabor Fresa-Kiwi de 60ml podrás crear una atmósfera especial, donde el aroma y el sabor juegan un papel importante.\r-\n-\r-\n\r-\n-\r-\nAplica en cualquier parte de tu cuerpo para sentir la sensación de calor en tu piel. Por si fuera poco, también podrás disfrutar de su exquisito sabor porque es 100--% comestible. El aceite actúa elevando suavemente la temperatura de la piel mediante la fricción.\r-\n-\r-\n\r-\n-\r-\nEs muy ligero y no irrita ni mancha la ropa.', '', '', '', 115.00, 0.00, 0.00, 'aceite-para-masaje-sabor-fresa-wiki.jpg', '2023-10-30'),
(38, '1', 'Aceite para masaje sabor piña colada', 'Con LovLub Hot Kiss Aceite de Masaje Sabor Piña Colada de 60ml podrás crear una atmósfera especial, donde el aroma y el sabor juegan un papel importante.\r-\n-\r-\n\r-\n-\r-\nAplica en cualquier parte de tu cuerpo para sentir la sensación de calor en tu piel. Por si fuera poco, también podrás disfrutar de su exquisito sabor porque es 100--% comestible. El aceite actúa elevando suavemente la temperatura de la piel mediante la fricción.\r-\n-\r-\n\r-\n-\r-\nEs muy ligero y no irrita ni mancha la ropa.', '', '', '', 115.00, 0.00, 0.00, 'aceite-para-masaje-sabor-pina-colada.jpg', '2023-10-30'),
(39, '1', 'Medias de red gruesa', 'Medias de red delgada, color negro y con borde superior de encaje. Talla: Unitalla. ', '', '', '', 100.00, 0.00, 0.00, 'medias-de-red-gruesa.jpg', '2023-10-30'),
(40, '1', 'Lubricante Anal', 'Toma provecho de este Lubricante Anal Xtasi Sin Dolor Con Benzocaína Anestésica.\r-\nEs ideal para la relajación y estimulación del recto, ayuda a lograr penetraciones más placenteras.\r-\nContiene un anestésico local externop que facilita la desensibilación.', '', '', '', 99.00, 0.00, 0.00, 'lubricante-anal.jpg', '2023-10-30'),
(41, '1', 'Bolas Eróticas', '¿Quieres empezar a experimentar y no sabes por donde empezar-? Esta es tu mejor opción.\r-\nLas Bolas Eróticas hechas de un material seguro, resistente al agua, anti-alérico e impermeable.\r-\nDiseñado especialmente para ir poco a poco y disfrutar del momento, tu defines tus limites.', '', '', '', 300.00, 0.00, 0.00, 'bolas-eroticas.jpg', '2023-10-30'),
(42, '1', 'Bolas Kegel', 'Con Bolas Kegel aparte de estimular y aumentar el placer, funciona también para ejercitar los músculos del suelo pélvico mediante ejercicios de Kegel, tensar los músculos de las piernas, permitir un progreso continuo y garantizar la vitalidad de los músculos del suelo pélvico.\r-\n\r-\nTiene buena elasticidad, material suave para evitar irritaciones', '', '', '', 250.00, 0.00, 0.00, 'bolas-kegel.jpg', '2023-10-30'),
(43, '1', 'Vibrador Cerdito', 'Probablemente el vibrador más lindo que vear pero te va a sorprender su función.\r-\nNuestro Vibrador We Love Cerdito es un gran estimulante para las mujeres ya que su lengua vibradora con diferentes frecuencias y modos puede hacerte llegar hasta donde te imagines. Puedes usarlo vaginal, anal y en los pezones.', '', '', '', 120.00, 0.00, 0.00, 'vibrador-cerdito.jpg', '2023-10-30'),
(44, '1', 'Combo lubricante + condones', 'Paquete con 2 condones texturizados y un lubricante de sabor sopresa de 10 ml.\r-\nNo pierdas la oportunidad de experimentar con este paquete y aumentar el placer en tu momento de pasión.', '', '', '', 30.00, 0.00, 0.00, 'combo-lubricante-+-condones.jpg', '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `codpos` varchar(10) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `clave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `direccion`, `colonia`, `ciudad`, `estado`, `codpos`, `pais`, `clave`) VALUES
(6, 'Judithsita', 'Narvaez', 'Gonzalez', 'al02943484@tecmilenio.mx', 'Chinchorro', 'Cancún', 'Supermanzana 32', 'Quintana Roo', '77508', 'Mexico', '9d989d03f69ca62864332e1200a23a8ae6f51589b3111770d461d0dbcad170ccd2b65fed3b4493978aa79ba1513278fc90d3add76ba6308f5c88a659ba24fd7c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admon`
--
ALTER TABLE `admon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historialpedidos`
--
ALTER TABLE `historialpedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admon`
--
ALTER TABLE `admon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `historialpedidos`
--
ALTER TABLE `historialpedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
