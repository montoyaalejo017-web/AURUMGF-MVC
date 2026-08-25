-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-08-2026 a las 22:41:01
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `idBooking` int NOT NULL,
  `Num_Booking` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `Check_in` date DEFAULT NULL,
  `CheckInTime` varchar(10) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `Check_out` date DEFAULT NULL,
  `CheckOutTime` varchar(10) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `idClient` int DEFAULT NULL,
  `idLodging` int NOT NULL,
  `StatusB` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`idBooking`, `Num_Booking`, `Check_in`, `CheckInTime`, `Check_out`, `CheckOutTime`, `idClient`, `idLodging`, `StatusB`) VALUES
(1, 'RES875226', '2025-06-26', '03:00pm', '2025-06-28', '12:00pm', 3, 1, 1),
(2, 'RES702650', '2025-06-19', '03:00pm', '2025-06-21', '12:00pm', 4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkin`
--

CREATE TABLE `checkin` (
  `idCheckIn` int NOT NULL,
  `idClient` int NOT NULL,
  `idLodging` int NOT NULL,
  `CheckIn` date DEFAULT NULL,
  `CheckInTime` varchar(10) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `CheckOut` date DEFAULT NULL,
  `CheckOutTime` varchar(10) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `idPaymentDetail` int NOT NULL,
  `StatusCI` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `checkin`
--

INSERT INTO `checkin` (`idCheckIn`, `idClient`, `idLodging`, `CheckIn`, `CheckInTime`, `CheckOut`, `CheckOutTime`, `idPaymentDetail`, `StatusCI`) VALUES
(1, 1, 1, '2025-06-18', '03:00pm', '2025-06-20', '12:00pm', 1, 1),
(2, 2, 2, '2025-06-19', '03:00pm', '2025-06-21', '12:00pm', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `idClient` int NOT NULL,
  `Document` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `Names` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Lastnames` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Phone` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Adults` tinyint DEFAULT NULL,
  `Minors` tinyint DEFAULT NULL,
  `idTypeDocument` int NOT NULL,
  `StatusC` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`idClient`, `Document`, `Names`, `Lastnames`, `Email`, `Phone`, `Adults`, `Minors`, `idTypeDocument`, `StatusC`) VALUES
(1, '1000898636', 'Miguel', 'Mejia', 'mejia@gmail.com', '3232322545', 2, 0, 1, 1),
(2, '43222090', 'Luisa ', 'Taborda', 'luisafer@gmail.com', '3044179634', 2, 1, 1, 1),
(3, 'N3C40500', 'Santiago', 'Vayuno', 'patrocla27@gamil.com', '4548521561', 2, 2, 3, 1),
(4, '442551254145', 'Diego', 'Lopez', 'patrocla@gamil.com', '3044179634', 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direct_payments`
--

CREATE TABLE `direct_payments` (
  `idDirectP` int NOT NULL,
  `idCheckIn` int DEFAULT NULL,
  `idClient` int DEFAULT NULL,
  `idLodging` int DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,3) DEFAULT NULL,
  `AmountPaid` decimal(10,3) DEFAULT NULL,
  `RemainingAmount` decimal(10,3) DEFAULT NULL,
  `idPaymentDetail` int NOT NULL,
  `idPaymentMethod` int DEFAULT NULL,
  `Num_Transaction` varchar(10) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `StatusDP` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `direct_payments`
--

INSERT INTO `direct_payments` (`idDirectP`, `idCheckIn`, `idClient`, `idLodging`, `PaymentDate`, `TotalAmount`, `AmountPaid`, `RemainingAmount`, `idPaymentDetail`, `idPaymentMethod`, `Num_Transaction`, `StatusDP`) VALUES
(1, 1, 1, 1, '2025-06-18', 616.000, 445.000, 555.000, 1, 5, 'COP836127', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lodging`
--

CREATE TABLE `lodging` (
  `idLodging` int NOT NULL,
  `Num_Lodging` varchar(10) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `StatusL` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `lodging`
--

INSERT INTO `lodging` (`idLodging`, `Num_Lodging`, `StatusL`) VALUES
(1, 'Cabaña 1', 3),
(2, 'Cabaña 2', 1),
(3, 'Cabaña 3', 2),
(4, 'Cabaña 3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `idPaymentMethod` int NOT NULL,
  `Method` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `paymentmethod`
--

INSERT INTO `paymentmethod` (`idPaymentMethod`, `Method`) VALUES
(1, 'Bank transfer'),
(2, 'PSE'),
(3, 'Cash'),
(4, 'Debit card'),
(5, 'Credit card');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments_bookings`
--

CREATE TABLE `payments_bookings` (
  `idPaymentB` int NOT NULL,
  `idBooking` int DEFAULT NULL,
  `idPaymentDetail` int NOT NULL,
  `PaymentDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,3) DEFAULT NULL,
  `AmountPaid` decimal(10,3) DEFAULT NULL,
  `RemainingAmount` decimal(10,3) DEFAULT NULL,
  `idPaymentMethod` int DEFAULT NULL,
  `Num_Transaction` varchar(10) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `idClient` int DEFAULT NULL,
  `StatusPB` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `payments_bookings`
--

INSERT INTO `payments_bookings` (`idPaymentB`, `idBooking`, `idPaymentDetail`, `PaymentDate`, `TotalAmount`, `AmountPaid`, `RemainingAmount`, `idPaymentMethod`, `Num_Transaction`, `idClient`, `StatusPB`) VALUES
(1, 1, 1, '2025-06-27', 555.000, 222.000, 111.000, 1, 'COP985229', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_details`
--

CREATE TABLE `payment_details` (
  `idPaymentDetail` int NOT NULL,
  `ServiceDescription` varchar(250) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `RatePerPerson` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `payment_details`
--

INSERT INTO `payment_details` (`idPaymentDetail`, `ServiceDescription`, `RatePerPerson`) VALUES
(1, 'Exclusiva cabaña para máximo 4 personas con jacuzzi, senderos privados, estación gourmet de café, vino o champaña, bebidas selectas y barril asador con carnes y acompañamientos servidos a solicitud en recepción.', 230.500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int NOT NULL,
  `rolDescription` varchar(30) COLLATE utf8mb3_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rolDescription`) VALUES
(1, 'Administrador'),
(2, 'Recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typedocument`
--

CREATE TABLE `typedocument` (
  `idTypeDocument` int NOT NULL,
  `Description` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `typedocument`
--

INSERT INTO `typedocument` (`idTypeDocument`, `Description`) VALUES
(1, 'CC'),
(2, 'TI'),
(3, 'DNI'),
(4, 'Passport'),
(5, 'PPT'),
(6, 'PEP'),
(7, 'CE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `Document` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `Names` varchar(70) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Lastnames` varchar(70) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Phone` varchar(30) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Address` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Gender` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Username` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `idTypeDocument` int DEFAULT NULL,
  `idRol` int NOT NULL,
  `StatusU` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `Document`, `Names`, `Lastnames`, `Email`, `Phone`, `Address`, `Gender`, `Birthdate`, `Username`, `Password`, `idTypeDocument`, `idRol`, `StatusU`) VALUES
(1, '1193594736', 'Alejandro', 'Montoya', 'alex17@gmail.com', '3044179634', 'Robledo', 'Masculino', '2003-10-17', 'Alex17', 'a6be05f0475806bf9506c338b4488cd9eb7c06ba', 1, 1, 1),
(3, '11143564876', 'Angie ', 'Zamudio', 'patrocla97@gamil.com', '32145678998', 'Calazans', 'Female', '2025-06-18', 'Patrocla97', '9c0da057c95bae35aa776c679ca752ffeb46128c', 1, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idBooking`),
  ADD KEY `idClient` (`idClient`,`idLodging`),
  ADD KEY `idLodging` (`idLodging`);

--
-- Indices de la tabla `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`idCheckIn`),
  ADD KEY `idClient` (`idClient`,`idLodging`,`idPaymentDetail`),
  ADD KEY `idLodging` (`idLodging`),
  ADD KEY `idPaymentDetail` (`idPaymentDetail`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `Document` (`Document`),
  ADD KEY `idTypeDocument` (`idTypeDocument`);

--
-- Indices de la tabla `direct_payments`
--
ALTER TABLE `direct_payments`
  ADD PRIMARY KEY (`idDirectP`),
  ADD KEY `idCheckIn` (`idCheckIn`,`idClient`,`idLodging`,`idPaymentDetail`,`idPaymentMethod`),
  ADD KEY `idLodging` (`idLodging`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idPaymentDetail` (`idPaymentDetail`),
  ADD KEY `idPaymentMethod` (`idPaymentMethod`);

--
-- Indices de la tabla `lodging`
--
ALTER TABLE `lodging`
  ADD PRIMARY KEY (`idLodging`);

--
-- Indices de la tabla `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`idPaymentMethod`);

--
-- Indices de la tabla `payments_bookings`
--
ALTER TABLE `payments_bookings`
  ADD PRIMARY KEY (`idPaymentB`),
  ADD KEY `idBooking` (`idBooking`,`idPaymentDetail`,`idPaymentMethod`,`idClient`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idPaymentDetail` (`idPaymentDetail`),
  ADD KEY `idPaymentMethod` (`idPaymentMethod`);

--
-- Indices de la tabla `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`idPaymentDetail`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `typedocument`
--
ALTER TABLE `typedocument`
  ADD PRIMARY KEY (`idTypeDocument`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `Document` (`Document`),
  ADD KEY `idTypeDocument` (`idTypeDocument`,`idRol`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `booking`
--
ALTER TABLE `booking`
  MODIFY `idBooking` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `checkin`
--
ALTER TABLE `checkin`
  MODIFY `idCheckIn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `idClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direct_payments`
--
ALTER TABLE `direct_payments`
  MODIFY `idDirectP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lodging`
--
ALTER TABLE `lodging`
  MODIFY `idLodging` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `idPaymentMethod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `payments_bookings`
--
ALTER TABLE `payments_bookings`
  MODIFY `idPaymentB` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `idPaymentDetail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `typedocument`
--
ALTER TABLE `typedocument`
  MODIFY `idTypeDocument` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`idLodging`) REFERENCES `lodging` (`idLodging`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`idLodging`) REFERENCES `lodging` (`idLodging`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkin_ibfk_3` FOREIGN KEY (`idPaymentDetail`) REFERENCES `payment_details` (`idPaymentDetail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`idTypeDocument`) REFERENCES `typedocument` (`idTypeDocument`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direct_payments`
--
ALTER TABLE `direct_payments`
  ADD CONSTRAINT `direct_payments_ibfk_1` FOREIGN KEY (`idLodging`) REFERENCES `lodging` (`idLodging`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `direct_payments_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `direct_payments_ibfk_3` FOREIGN KEY (`idPaymentDetail`) REFERENCES `payment_details` (`idPaymentDetail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `direct_payments_ibfk_4` FOREIGN KEY (`idPaymentMethod`) REFERENCES `paymentmethod` (`idPaymentMethod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `payments_bookings`
--
ALTER TABLE `payments_bookings`
  ADD CONSTRAINT `payments_bookings_ibfk_1` FOREIGN KEY (`idBooking`) REFERENCES `booking` (`idBooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_bookings_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_bookings_ibfk_3` FOREIGN KEY (`idPaymentDetail`) REFERENCES `payment_details` (`idPaymentDetail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_bookings_ibfk_4` FOREIGN KEY (`idPaymentMethod`) REFERENCES `paymentmethod` (`idPaymentMethod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idTypeDocument`) REFERENCES `typedocument` (`idTypeDocument`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
