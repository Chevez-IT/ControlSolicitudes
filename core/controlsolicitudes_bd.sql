-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2023 a las 12:30:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlsolicitudes_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` varchar(10) NOT NULL,
  `picture_apps` varchar(255) NOT NULL,
  `names_apps` varchar(50) NOT NULL,
  `surnames_apps` varchar(50) NOT NULL,
  `phone_apps` varchar(10) NOT NULL,
  `position_apps` varchar(50) NOT NULL,
  `company_id_apps` varchar(4) NOT NULL,
  `creator_id_apps` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status_apps` enum('Online','Offline','Expecting') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `company_id` varchar(4) NOT NULL,
  `name_comp` varchar(255) NOT NULL,
  `person_contact_comp` varchar(255) NOT NULL,
  `phone_contact_comp` varchar(10) NOT NULL,
  `mail_contact_compan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status_comp` enum('Online','Offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` varchar(12) NOT NULL,
  `request_id_conv` varchar(10) NOT NULL,
  `applicant_id_conv` varchar(10) NOT NULL,
  `generalmin_id_conv` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_conv` enum('Online','Offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_admins`
--

CREATE TABLE `general_admins` (
  `generalmin_id` varchar(10) NOT NULL,
  `picture_generalmin` varchar(255) NOT NULL,
  `names_generalmin` varchar(50) NOT NULL,
  `surnames_generalmin` varchar(50) NOT NULL,
  `phone_generalmin` varchar(10) NOT NULL,
  `creador_id_generalmin` varchar(10) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status_generalmin` enum('Online','Offline','Expecting') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `message_id` varchar(12) NOT NULL,
  `conversation_id_msg` varchar(12) NOT NULL,
  `text_msg` text NOT NULL,
  `sender_id_msg` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_msg` enum('Sent','Received','Read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `request_id` varchar(10) NOT NULL,
  `area_req` varchar(255) NOT NULL,
  `person_contact_req` varchar(255) NOT NULL,
  `phone_contact_req` varchar(10) NOT NULL,
  `type_req` varchar(255) NOT NULL,
  `type_support_req` varchar(255) NOT NULL,
  `datetime_req` datetime NOT NULL,
  `delivery_datetime_req` date NOT NULL,
  `purpose_req` text NOT NULL,
  `details_req` text NOT NULL,
  `ref_sources_req` varchar(255) NOT NULL,
  `applicant_id_req` varchar(10) NOT NULL,
  `admin_id_req` varchar(10) DEFAULT NULL,
  `comments_admin_req` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status_req` enum('Accepted','Rejected','Expecting','In progress','Already done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` varchar(4) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `super admins`
--

CREATE TABLE `super admins` (
  `supermin_id` varchar(10) NOT NULL,
  `picture_supermin` varchar(255) NOT NULL,
  `name_supermin` varchar(50) NOT NULL,
  `surnames_supermin` varchar(50) NOT NULL,
  `phone_supermin` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status_supermin` enum('Online','Offline','Expecting') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` varchar(5) NOT NULL,
  `profile_id_user` varchar(8) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `rol_id_user` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status_user` enum('Online','Offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `company_id_apps` (`company_id_apps`),
  ADD KEY `creator_id` (`creator_id_apps`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indices de la tabla `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`),
  ADD KEY `request_id_conv` (`request_id_conv`),
  ADD KEY `applicant_id_conv` (`applicant_id_conv`),
  ADD KEY `generalmin_id_conv` (`generalmin_id_conv`);

--
-- Indices de la tabla `general_admins`
--
ALTER TABLE `general_admins`
  ADD PRIMARY KEY (`generalmin_id`),
  ADD KEY `creador_id_generalmin` (`creador_id_generalmin`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id_msg` (`sender_id_msg`),
  ADD KEY `conv_id_msg` (`conversation_id_msg`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `applicant_id_req` (`applicant_id_req`),
  ADD KEY `admin_id_req` (`admin_id_req`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `super admins`
--
ALTER TABLE `super admins`
  ADD PRIMARY KEY (`supermin_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mail_user` (`mail_user`),
  ADD KEY `rol_id_user` (`rol_id_user`),
  ADD KEY `profile_id_user` (`profile_id_user`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `companies_applicants` FOREIGN KEY (`company_id_apps`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generaladmins_applicants` FOREIGN KEY (`creator_id_apps`) REFERENCES `general_admins` (`generalmin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `applicants_conversations` FOREIGN KEY (`applicant_id_conv`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generaladmins_conversations` FOREIGN KEY (`generalmin_id_conv`) REFERENCES `general_admins` (`generalmin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_conversations` FOREIGN KEY (`request_id_conv`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `general_admins`
--
ALTER TABLE `general_admins`
  ADD CONSTRAINT `superadmins_generaladminis` FOREIGN KEY (`creador_id_generalmin`) REFERENCES `super admins` (`supermin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `applicants_messages` FOREIGN KEY (`sender_id_msg`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conversations_messages` FOREIGN KEY (`conversation_id_msg`) REFERENCES `conversations` (`conversation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generaladmins_messages` FOREIGN KEY (`sender_id_msg`) REFERENCES `general_admins` (`generalmin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `applicants_requests` FOREIGN KEY (`applicant_id_req`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generaladmins` FOREIGN KEY (`admin_id_req`) REFERENCES `general_admins` (`generalmin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `applicants_users` FOREIGN KEY (`profile_id_user`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generaladmins_users` FOREIGN KEY (`profile_id_user`) REFERENCES `general_admins` (`generalmin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_users` FOREIGN KEY (`rol_id_user`) REFERENCES `roles` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `superadmins_users` FOREIGN KEY (`profile_id_user`) REFERENCES `super admins` (`supermin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
