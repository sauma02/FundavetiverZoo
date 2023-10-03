-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 07:46 PM
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
-- Database: `funzoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(2555) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(5, 'Titulo_pestaña', 'FunZoo - Sin animo de lucro', 0x313639323531313734375f66756e7a6f6f5f6c6f676f2d72656d6f766562672d707265766965772e706e67),
(6, 'Titulo_nav_bar', 'FunZoo - Sin animo de lucro', 0x313639323531323736335f6c6f676f5f66756e7a6f6f5f322d72656d6f766562672d707265766965772e706e67),
(7, 'Imagen_body_inicial', 'Imagen de body inicial', 0x313639323531333239385f62726f73687572655f66756e5f7a6f6f5f312d312d72656d6f766562672d707265766965772e706e67),
(8, 'Titulo_body', 'FunZoo', ''),
(9, 'titulo2_funzoo', 'Porque no hay lugar como el hogar', ''),
(10, 'Mision', 'Nuestra MISIÓN es mejorar el bienestar de los animales callejeros en riesgo, acabando con la crueldad y negligencia hacia ellos, con la cría descontrolada y el abandono de los mismos a través de rescates, tratamientos veterinarios, y brindándoles una rehabilitación física, con la oportunidad de un hogar y una familia. Con un grupo de personas profesionales podemos realizar esterilizaciones, rescates y adopciones de perros y gatos logrando cambiar la actitud de las personas en favor del bienestar animal, y concientizar cada día mas a quienes se van uniendo a esta labor. Llegar al punto en que se perciba a los animales como seres que sienten y como compañeros en nuestra vida.', ''),
(11, 'Vision', 'Es nuestra VISIÓN posicionarnos como una de las mejores fundaciones y ser reconocidos a nivel nacional por nuestras labores a favor de los animales, en especial perros y gatos en estado de abandono, extraviados o maltratados. Contaremos con la infraestructura necesaria ( albergue, clínica ) para mejorar nuestros servicios de ayuda a animales desprotejidos, capacitaremos continuamente el personal para mejorar sus habilidades en el cuidado de los animales y formaremos coalición con otras organizaciones de protección animal.', ''),
(12, 'Objetivos', 'Defender y velar por la proteccion de los animales, haciendo valer las leyes de protección animal existentes. Denunciar las irregularidades que tengan que ver con la tenencia de animales. Desarrollar proyectos con la finalidad de bienestar animal y realizar actividades para financiar los fines sociales de nuestra entidad. Promoveremos el respeto a todo ser viviente y sus derechos a tener una vida digna. Realizar campañas anti abandono, de concienciación ciudadana, de esterilización en los colegios y barrios de la ciudad, Fomentar el buen trato a los animales y el medio ambiente', 0x313639323539363836315f6761746f79706572726f2d72656d6f766562672d707265766965772e706e67),
(13, 'FunZoo nosotros', '', 0x313639323539373938385f66756e7a6f6f33332d72656d6f766562672d707265766965772e706e67),
(14, 'Servicios extra', 'Manejo de animales peligrosos. Insumos y elementos necesarios. Limpieza, desinfección y control de plagas. Sistema de registro y control de actividades. Manejo y control de enfermedades zoonoticas que puedan afectar la salud publica municipal. Manejo de plan integral de residuos y disposición final, contando además con conceptos favorables de la dirección territorial de salud de caldas ( DTSC ). Contamos con un área de 153 hectáreas con unas instalaciones aptas para especies como: felinos, caninos, ovinos, equinos y fauna. Garantizamos personal profesional idóneo en veterinaria o áreas afines, cuidadores permanentes para prestar una atención integral inmediata necesarios para agilizar el servicio y urgencias presentadas a las necesidades. ', 0x313639323630343031355f6c6f676f5f66756e7a6f6f5f322d72656d6f766562672d707265766965772e706e67),
(15, 'Donacion', 'Si quieres apoyar esta gran mision, te invito a que te pongas en contacto con nosotros para hacer tu donaciones o incluso para adoptar a uno de nuestros peluditos, es muy facil, te dejamos un boton para que puedas comuncarte directamente con nosotros. En la parte de abajo encontraras nuestras redes sociales y el boton para comunicarte con nuestro whatsapp, te esperamos.', ''),
(16, 'Numero_WP', '3215740916', 0x313639323630353139315f77702e706e67),
(17, 'Finca Palmira', 'Norcasia - Caldas', ''),
(18, 'Correo', 'funzoo2022@hotmail.com', ''),
(19, 'Facebook', '', ''),
(20, 'Bus redes', '', 0x313639323630363735335f62757372656465732d72656d6f766562672d707265766965772e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `entradas`
--

INSERT INTO `entradas` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(3, 'Imagen1', 'Aqui va la imagen 1', 0x313639323530343131355f31393432372d31333836373330352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `portafolio`
--

CREATE TABLE `portafolio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(2555) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `portafolio`
--

INSERT INTO `portafolio` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(4, 'oficina', 'Oficina principal', 0x313639323531343038385f6f666963696e612e6a7067),
(5, 'Casa operarios', 'Residencia de los operarios', 0x313639323531343832335f63617361206f7065726172696f732e6a7067),
(6, 'Cuarto de aseo', 'Cuarto de implementos de aseo', 0x313639323531353337305f63756172746f206465206173656f2e6a7067),
(7, 'Centro canino', 'Centro de adopcion canino', 0x313639323538343836385f63656e74726f2063616e6f6e696f2061646f702e6a7067),
(8, 'Centro adopcion felino', 'Centro de adopcion felinos', 0x313639323539313438365f63656e74726f2061646f702066656c692e6a7067),
(9, 'Sala cirugia', 'Sala cirugía', 0x313639323539313533315f73616c6120636972756769612e6a7067),
(10, 'Sala interna cirugia1', 'Sala interna cirugía n°1', 0x313639323539313731365f73616c6120636972756720696e74312e6a7067),
(11, 'Sala interna cirugia2', 'Sala interna cirugía n°2', 0x313639323539313732395f73616c6120636972756720696e74322e6a7067),
(12, 'Sala interna cirugia3', 'Sala interna cirugía n°3', 0x313639323539313734325f73616c6120636972756720696e74332e6a7067),
(13, 'Oficina movil', 'Este bus es nuestra oficina movil', 0x313639323539313931395f6f666963696e616d6f76696c2e6a7067),
(14, 'FunZoo movil', 'Vehículo apto para la recolección de los animales  Contando con todos los implementos necesarios para dicha actividad los animales son trasladados en jaulas aptas según su tamaño aireadas cada uno por separado tanto caninos como felinos. Son transportados en un vehículo solo para ellos con buena ventilación  Contamos con 153 hectáreas disponibles para ellos ', 0x313639323539323438345f7665686963756c6f20646520726573636174652e6a7067),
(15, 'Zona de felinos -machos ', 'cuentan con un área de 5 metros por 5 metros por 3 metros de alto dormitorios y comederos en plástico de fácil limpieza y desinfección ', 0x313639323539333831335f66656c696e6f20636f6d69656e646f2e6a7067),
(16, 'Zona felino', '', 0x313639323539343033395f66656c696e6f20636f6d69656e646f322e6a7067),
(17, 'Zona de felinos- hembras ', 'Cuentan con un área de 5 metros por 5 metros por 3 metros de alto enchapados en cerámica piso y paredes. Los dormitorios son de plásticos de fácil limpieza y desinfección ', 0x313639323539343038365f66656c696e6f20636f6d69656e646f332e6a7067),
(18, 'Zona de felinos- hembras', '', 0x313639323539343339365f6761746f2068656d62726120636f6d69656e646f322e6a7067),
(19, 'Zona de felinos- hembras', '', 0x313639323539343931305f6761616174612e6a7067),
(20, 'Zona de recreación de felinos', '', 0x313639323539343438345f72656372656163696f6e2066656c696e6f732e6a7067),
(21, 'Hospedaje animales', ' Caninos- hembras cuentan con un área de 3 hectáreas en un encierro en malla y tubería galvanizada donde tienen 30 casetas de dormitorios de 5 metros por 2.50 metros enchapadas en cerámica piso y paredes para que duerman donde quieran  Cada encierro con cuatro bebederos con agua potable', 0x313639323539343534305f68656374617265617333322e6a7067),
(22, 'Encierro 1', '', 0x313639323539343632365f656e63696572726f312e6a7067),
(23, 'Enicerro 2', '', 0x313639323539343635345f656e69636572726f322e6a7067),
(24, 'Cerca 1', 'Los caninos - machos cuentan con un encierro de 3 hectáreas en malla y tubería galvanizada donde tienen 30 casetas de dormitorios de 5 metros por 2.50 metros enchapadas en cerámica piso y paredes ', 0x313639323539343733395f43657263612e6a7067),
(25, 'Bebederos', 'Cada encierro con cuatro bebederos con agua potable', 0x313639323539343937375f626562656465726f2e6a7067),
(26, 'Zona perros', '', 0x313639323539353033345f706572726f20656e2062616c646f73612e6a7067),
(27, 'Zona de grama', 'Cuentan con su zona de grama', 0x313639323539353134385f6772616d612e6a7067),
(28, 'Zona comun', 'Cuentan con su zona de grama', 0x313639323539353233365f6365737065642e6a7067),
(29, 'Zona de piscina', 'Cuentan con su zona de grama', 0x313639323539353331375f50697363696e6120706572726f732e6a7067),
(30, 'Zona de equinos', 'Contamos con un área de 6 hectáreas para pastoreo para equinos bovinos y mulares ', 0x313639323539353336305f5a6f6e6120657175696e6f732e6a7067),
(31, 'AREA DE CUARENTENA ', 'Con el fin de garantizar el estatus sanitario en las instalaciones FUNDAVETIVER ZOO, se hace necesario la observación constante de los animales nuevos que entran a dichos predios, por ello se reciben  en esta área donde estarán albergados en un lapso de una semana o más tiempo si es necesario hasta estar en óptimas condiciones para convivir con el resto de animales, allí se les realizará examen físico, toma de constantes fisiológicas, la realización de tratamientos y planes terapéuticos según se requieran. Posteriormente cuando se evidencie animales sanos son incluidos a los encierros pertinentes, donde se les garantizará alimentación, agua potable a voluntad y seguimiento médico veterinario.   Como medida de control de las patologías, se hace necesario realizar examen médico veterinario, y diligenciar en el registro evolución de cada animal.  El área de cuarentena cuenta con 100 casetas, en donde se lleva un seguimiento a los animales y también se le brindará alimentación adecuada y agua potable a disposición. ', 0x313639323539353439395f63756172656e74656e612e6a7067),
(32, 'ZONA DE CUARENTENA', '', 0x313639323539353634315f63756172656e74656e61322e6a7067),
(33, 'ZONA DE CUARENTENA', '', 0x313639323539353636385f63756172656e74656e61332e6a7067),
(34, 'Zona de maternas ', '', 0x313639323539353639355f4d415445524e41532e6a7067),
(35, 'Zona de maternas', '', 0x313639323539353733325f4d415445524e4153322e6a7067),
(36, 'Zona de maternas', '', 0x313639323539353833375f6d617465726e6173332e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(2555) NOT NULL,
  `icono` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `titulo`, `descripcion`, `icono`) VALUES
(2, 'Recogida', 'Servicio de recogida', 'fa-solid fa-bus fa-beat'),
(3, 'Oficina', 'Oficinas fisicas', 'fa-solid fa-building fa-bounce'),
(4, 'Consultorio', 'Contamos con nuestro consultorio', 'fa-solid fa-shield-dog fa-flip'),
(5, 'Enfermeria', 'Contamos con lo necesario para la primera respuesta', 'fa-solid fa-house-chimney-medical fa-shake'),
(6, 'Quirófano', 'Sala de quirófano', 'fa-solid fa-syringe fa-bounce'),
(7, 'Piscina', 'Para la diversion de nuestros animalitos', 'fa-solid fa-water-ladder fa-fade'),
(8, 'Bodegas', 'Zonas de almacenaje', 'fa-solid fa-warehouse fa-fade'),
(9, 'Sala de recuperación.', 'Para el descanso de nuestros peludos pacientes', 'fa-solid fa-bed-pulse fa-beat'),
(10, 'Área de cuarentenas', 'Areas especializadas para evitar propagaciones', 'fa-solid fa-biohazard fa-spin'),
(11, 'Zonas de recreación', 'Para mantener activos a nuestros amiguitos', 'fa-regular fa-face-laugh-squint fa-bounce'),
(12, 'Atención veterinaria', 'Tenemos nuestro equipo de expertos preparado para cualquier problema', 'fa-solid fa-user-doctor fa-flip'),
(13, 'Esterilizaciones', 'Servicio de esterilización', 'fa-solid fa-crosshairs fa-spin fa-spin-reverse'),
(14, 'Protocolos de desparasitación', 'Al ser rescatados, necesitan de una buena desparasitación', 'fa-solid fa-worm fa-beat-fade'),
(15, 'Exámenes físicos', 'Exmanes generales para determinar el estado de nuestros animalitos', 'fa-solid fa-stethoscope fa-bounce'),
(16, 'Planes terapéuticos', 'Para cuando sean requeridos', 'fa-solid fa-clipboard-user fa-beat'),
(17, 'Suministro de vitaminas', 'Gran suministro de medicamentos y vitaminas esenciales', 'fa-solid fa-pills fa-shake');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idrol` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `idrol`, `id`) VALUES
('Sauma02', 'super', 1, 1),
('Sauma03', 'supergamo123', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`,`idrol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
