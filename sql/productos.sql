-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 11:20 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
