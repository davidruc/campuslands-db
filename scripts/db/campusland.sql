-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-06-2023 a las 11:47:09
-- Versión del servidor: 8.0.33-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `campusland`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_area`
--

CREATE TABLE `academic_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journeys` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_area`
--

CREATE TABLE `admin_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int NOT NULL,
  `name_area` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campers`
--

CREATE TABLE `campers` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_route` int NOT NULL,
  `id_trainer` int NOT NULL,
  `id_psycologist` int NOT NULL,
  `id_teacher` int NOT NULL,
  `id_level` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapters`
--

CREATE TABLE `chapters` (
  `id` int NOT NULL,
  `id_thematic_units` int NOT NULL,
  `name_chapter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `name_city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_region` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `whatsapp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `name_country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `design_area`
--

CREATE TABLE `design_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `english_skills`
--

CREATE TABLE `english_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_teacher` int NOT NULL,
  `id_location` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journey`
--

CREATE TABLE `journey` (
  `id` int NOT NULL,
  `name_journey` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE `levels` (
  `id` int NOT NULL,
  `name_level` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_level` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `name_location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maint_area`
--

CREATE TABLE `maint_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marketing_area`
--

CREATE TABLE `marketing_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `name_module` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL,
  `id_theme` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optional_topics`
--

CREATE TABLE `optional_topics` (
  `id` int NOT NULL,
  `id_topic` int NOT NULL,
  `id_team` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_camper` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_ref`
--

CREATE TABLE `personal_ref` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE `position` (
  `id` int NOT NULL,
  `name_position` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psychologist`
--

CREATE TABLE `psychologist` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_route` int NOT NULL,
  `id_academic_area_psycologist` int NOT NULL,
  `id_position` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `name_region` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review_skills`
--

CREATE TABLE `review_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_tutor` int NOT NULL,
  `id_location` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routes`
--

CREATE TABLE `routes` (
  `id` int NOT NULL,
  `name_route` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_month` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_skills`
--

CREATE TABLE `software_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_trainer` int NOT NULL,
  `id_location` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soft_skills`
--

CREATE TABLE `soft_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_psychologist` int NOT NULL,
  `id_location` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `id` int NOT NULL,
  `doc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_surname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_surname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eps` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_area` int NOT NULL,
  `id_city` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name_subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_route` int NOT NULL,
  `id_academic_area` int NOT NULL,
  `id_position` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_educators`
--

CREATE TABLE `team_educators` (
  `id` int NOT NULL,
  `name_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_schedule`
--

CREATE TABLE `team_schedule` (
  `id` int NOT NULL,
  `team_name` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_skills` time NOT NULL,
  `check_out_skills` time NOT NULL,
  `check_in_soft` time NOT NULL,
  `check_out_soft` time NOT NULL,
  `check_in_english` time NOT NULL,
  `check_out_english` time NOT NULL,
  `check_in_review` time NOT NULL,
  `check_out_review` time NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thematic_units`
--

CREATE TABLE `thematic_units` (
  `id` int NOT NULL,
  `id_route` int NOT NULL,
  `name_thematics_units` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `themes`
--

CREATE TABLE `themes` (
  `id` int NOT NULL,
  `id_chapter` int NOT NULL,
  `name_theme` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `id_module` int NOT NULL,
  `name_topic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trainers`
--

CREATE TABLE `trainers` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_level` int NOT NULL,
  `id_route` int NOT NULL,
  `id_academic_area` int NOT NULL,
  `id_position` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors`
--

CREATE TABLE `tutors` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_academic_area` int NOT NULL,
  `id_position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `working_info`
--

CREATE TABLE `working_info` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `years_exp` int DEFAULT NULL,
  `months_exp` int DEFAULT NULL,
  `id_work_reference` int NOT NULL,
  `id_personal_ref` int NOT NULL,
  `start_contract` date NOT NULL,
  `end_contract` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_reference`
--

CREATE TABLE `work_reference` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academic_area`
--
ALTER TABLE `academic_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area` (`id_area`),
  ADD KEY `id_staff_academic` (`id_staff`),
  ADD KEY `id_position_academic` (`id_position`),
  ADD KEY `id_journey_academic` (`id_journeys`);

--
-- Indices de la tabla `admin_area`
--
ALTER TABLE `admin_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area_admin` (`id_area`),
  ADD KEY `id_staff_admin` (`id_staff`),
  ADD KEY `id_position_admin` (`id_position`),
  ADD KEY `id_journey_admin` (`id_journey`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `campers`
--
ALTER TABLE `campers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_camper` (`id_journey`),
  ADD KEY `id_level_camper` (`id_level`),
  ADD KEY `id_route_camper` (`id_route`),
  ADD KEY `id_staff_camper` (`id_staff`),
  ADD KEY `id_team_schedule_camper` (`id_team_schedule`),
  ADD KEY `id_trainer_camper` (`id_trainer`);

--
-- Indices de la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thematic_chapter` (`id_thematic_units`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_region` (`id_region`);

--
-- Indices de la tabla `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `design_area`
--
ALTER TABLE `design_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_design` (`id_area`),
  ADD KEY `id_position_design` (`id_position`),
  ADD KEY `id_journey_design` (`id_journey`);

--
-- Indices de la tabla `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_emergency` (`id_staff`);

--
-- Indices de la tabla `english_skills`
--
ALTER TABLE `english_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_english` (`id_journey`),
  ADD KEY `id_location_english` (`id_location`),
  ADD KEY `id_teacher_english` (`id_teacher`),
  ADD KEY `id_team_schedule_english` (`id_team_schedule`),
  ADD KEY `id_subject_english` (`id_subject`);

--
-- Indices de la tabla `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maint_area`
--
ALTER TABLE `maint_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maint_area` (`id_area`),
  ADD KEY `id_staff_maint` (`id_staff`),
  ADD KEY `id_position_maint` (`id_position`),
  ADD KEY `id_journey_maint` (`id_journey`);

--
-- Indices de la tabla `marketing_area`
--
ALTER TABLE `marketing_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marketing_area` (`id_area`),
  ADD KEY `id_staff_marketing` (`id_staff`),
  ADD KEY `id_position_marketing` (`id_position`),
  ADD KEY `id_journey_marketing` (`id_journey`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theme_module` (`id_theme`);

--
-- Indices de la tabla `optional_topics`
--
ALTER TABLE `optional_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camper_optional_topics` (`id_camper`),
  ADD KEY `id_team_schedule_optional_topics` (`id_team`),
  ADD KEY `id_topic_optional_topics` (`id_topic`),
  ADD KEY `id_team_educator_optional_topics` (`id_team_educator`),
  ADD KEY `id_subject_optional_topics` (`id_subject`);

--
-- Indices de la tabla `personal_ref`
--
ALTER TABLE `personal_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `psychologist`
--
ALTER TABLE `psychologist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area_phychologist` (`id_academic_area_psycologist`),
  ADD KEY `id_position_phychologist` (`id_position`),
  ADD KEY `id_route_phychologist` (`id_route`),
  ADD KEY `id_staff_phychologist` (`id_staff`),
  ADD KEY `id_team_educator_phychologist` (`id_team_educator`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_country` (`id_country`);

--
-- Indices de la tabla `review_skills`
--
ALTER TABLE `review_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_review` (`id_journey`),
  ADD KEY `id_location_review` (`id_location`),
  ADD KEY `id_team_schedule_review` (`id_team_schedule`),
  ADD KEY `id_tutor_review` (`id_tutor`);

--
-- Indices de la tabla `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `software_skills`
--
ALTER TABLE `software_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_skills` (`id_journey`),
  ADD KEY `id_location_skills` (`id_location`),
  ADD KEY `id_trainer_skills` (`id_trainer`),
  ADD KEY `id_subject_skills` (`id_subject`);

--
-- Indices de la tabla `soft_skills`
--
ALTER TABLE `soft_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_soft` (`id_journey`),
  ADD KEY `id_location_soft` (`id_location`),
  ADD KEY `id_phychologist_soft` (`id_psychologist`),
  ADD KEY `id_team_schedule_soft` (`id_team_schedule`),
  ADD KEY `id_subject_soft` (`id_subject`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area_staff` (`id_area`),
  ADD KEY `id_city` (`id_city`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area_teacher` (`id_academic_area`),
  ADD KEY `id_position_teacher` (`id_position`),
  ADD KEY `id_route_teacher` (`id_route`),
  ADD KEY `id_staff_teacher` (`id_staff`),
  ADD KEY `id_team_educator_teacher` (`id_team_educator`);

--
-- Indices de la tabla `team_educators`
--
ALTER TABLE `team_educators`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `team_schedule`
--
ALTER TABLE `team_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_team` (`id_journey`);

--
-- Indices de la tabla `thematic_units`
--
ALTER TABLE `thematic_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_route_thematic` (`id_route`);

--
-- Indices de la tabla `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chapter_themes` (`id_chapter`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_module_topic` (`id_module`);

--
-- Indices de la tabla `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_trainer` (`id_staff`),
  ADD KEY `id_position_trainer` (`id_position`),
  ADD KEY `id_academic_area_trainer` (`id_academic_area`),
  ADD KEY `id_level_trainer` (`id_level`),
  ADD KEY `id_route_trainer` (`id_route`),
  ADD KEY `id_team_educator_trainer` (`id_team_educator`);

--
-- Indices de la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area_tutor` (`id_academic_area`),
  ADD KEY `id_position_tutor` (`id_position`),
  ADD KEY `id_staff_tutor` (`id_staff`);

--
-- Indices de la tabla `working_info`
--
ALTER TABLE `working_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_work` (`id_staff`),
  ADD KEY `id_work_reference` (`id_work_reference`),
  ADD KEY `id_personal_ref` (`id_personal_ref`);

--
-- Indices de la tabla `work_reference`
--
ALTER TABLE `work_reference`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academic_area`
--
ALTER TABLE `academic_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `admin_area`
--
ALTER TABLE `admin_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campers`
--
ALTER TABLE `campers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `design_area`
--
ALTER TABLE `design_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `english_skills`
--
ALTER TABLE `english_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `journey`
--
ALTER TABLE `journey`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maint_area`
--
ALTER TABLE `maint_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marketing_area`
--
ALTER TABLE `marketing_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `optional_topics`
--
ALTER TABLE `optional_topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_ref`
--
ALTER TABLE `personal_ref`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `position`
--
ALTER TABLE `position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `psychologist`
--
ALTER TABLE `psychologist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `review_skills`
--
ALTER TABLE `review_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `software_skills`
--
ALTER TABLE `software_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `soft_skills`
--
ALTER TABLE `soft_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_educators`
--
ALTER TABLE `team_educators`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_schedule`
--
ALTER TABLE `team_schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `thematic_units`
--
ALTER TABLE `thematic_units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `working_info`
--
ALTER TABLE `working_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `work_reference`
--
ALTER TABLE `work_reference`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academic_area`
--
ALTER TABLE `academic_area`
  ADD CONSTRAINT `id_academic_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_journey_academic` FOREIGN KEY (`id_journeys`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_academic` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_academic` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `admin_area`
--
ALTER TABLE `admin_area`
  ADD CONSTRAINT `id_area_admin` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_journey_admin` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_admin` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_admin` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `campers`
--
ALTER TABLE `campers`
  ADD CONSTRAINT `id_journey_camper` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_level_camper` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_camper` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_camper` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_camper` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedule` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_trainer_camper` FOREIGN KEY (`id_trainer`) REFERENCES `trainers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `id_thematic_chapter` FOREIGN KEY (`id_thematic_units`) REFERENCES `thematic_units` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `id_region` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `contact_info`
--
ALTER TABLE `contact_info`
  ADD CONSTRAINT `id_staff` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `design_area`
--
ALTER TABLE `design_area`
  ADD CONSTRAINT `id_design_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_journey_design` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_design` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_design` FOREIGN KEY (`id_area`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `id_staff_emergency` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `english_skills`
--
ALTER TABLE `english_skills`
  ADD CONSTRAINT `id_journey_english` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_english` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_english` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_teacher_english` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_english` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedule` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `maint_area`
--
ALTER TABLE `maint_area`
  ADD CONSTRAINT `id_journey_maint` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_maint_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_maint` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_maint` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `marketing_area`
--
ALTER TABLE `marketing_area`
  ADD CONSTRAINT `id_journey_marketing` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_marketing_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_marketing` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_marketing` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `id_theme_module` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `optional_topics`
--
ALTER TABLE `optional_topics`
  ADD CONSTRAINT `id_camper_optional_topics` FOREIGN KEY (`id_camper`) REFERENCES `campers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_optional_topics` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_optional_topics` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_optional_topics` FOREIGN KEY (`id_team`) REFERENCES `team_schedule` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_topic_optional_topics` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `psychologist`
--
ALTER TABLE `psychologist`
  ADD CONSTRAINT `id_academic_area_phychologist` FOREIGN KEY (`id_academic_area_psycologist`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_phychologist` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_phychologist` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_phychologist` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_phychologist` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `id_country` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `review_skills`
--
ALTER TABLE `review_skills`
  ADD CONSTRAINT `id_journey_review` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_review` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_review` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedule` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_tutor_review` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `software_skills`
--
ALTER TABLE `software_skills`
  ADD CONSTRAINT `id_journey_skills` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_skills` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_skills` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_trainer_skills` FOREIGN KEY (`id_trainer`) REFERENCES `trainers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `soft_skills`
--
ALTER TABLE `soft_skills`
  ADD CONSTRAINT `id_journey_soft` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_soft` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_phychologist_soft` FOREIGN KEY (`id_psychologist`) REFERENCES `psychologist` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_soft` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_soft` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedule` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `id_area_staff` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_city` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `id_academic_area_teacher` FOREIGN KEY (`id_academic_area`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_position_teacher` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_teacher` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_teacher` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_teacher` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `team_schedule`
--
ALTER TABLE `team_schedule`
  ADD CONSTRAINT `id_journey_team` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `thematic_units`
--
ALTER TABLE `thematic_units`
  ADD CONSTRAINT `id_route_thematic` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `id_chapter_themes` FOREIGN KEY (`id_chapter`) REFERENCES `chapters` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `id_module_topic` FOREIGN KEY (`id_module`) REFERENCES `modules` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `id_academic_area_trainer` FOREIGN KEY (`id_academic_area`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_level_trainer` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_trainer` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_trainer` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_trainer` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_trainer` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `id_academic_area_tutor` FOREIGN KEY (`id_academic_area`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_tutor` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_tutor` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `working_info`
--
ALTER TABLE `working_info`
  ADD CONSTRAINT `id_personal_ref` FOREIGN KEY (`id_personal_ref`) REFERENCES `personal_ref` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_work` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_work_reference` FOREIGN KEY (`id_work_reference`) REFERENCES `work_reference` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

USE campusland;
SELECT * FROM areas;

SELECT id AS "identificador", name_module AS "module_name", start_date AS "date_start",  end_date AS "date_end",  description AS "details",duration_days AS "days_duration", id_theme AS "fk_theme" FROM modules;

SELECT id AS "identificador", id_area AS "fk_area", id_staff AS "fk_staff", id_position AS "fk_posicion", id_journey AS "fk_journeys" FROM admin_area;

SELECT id AS "id", name_city AS "city", id_region AS "fk_region" FROM cities;

SELECT id AS "id", whatsapp AS "contact", instagram AS "ig", linkedin AS "li", email AS "email",  address AS "direction", cel_number AS "phone", id_staff AS "fk_staff" FROM contact_info;

SELECT id AS "id", name_country AS "country" FROM countries;

SELECT id AS "id", id_staff AS "fk_staff", years_exp AS "experience_Y", months_exp AS "experience_M" , id_work_reference AS "fk_work_reference" , id_personal_ref AS "fk_personal_ref", start_contract AS "start_contract", end_contract AS "end_contract" FROM working_info;

SELECT id AS "id", name_route AS "route_name",  start_date AS "Start_date",  end_date AS "End_date",  description AS "details",  duration_month AS "duration"  FROM routes;

INSERT INTO topics(id, name_topic, start_date, end_date, description,duration_days,id_module) VALUES (:identificador, :topic_name, :date_start, :date_end, :details,:days_duration, :fk_module);

SELECT id AS "identificador", name_area AS "nombre_area" FROM areas WHERE id =:identificador;

SELECT id AS "identificador", id_area AS "fk_area", id_staff AS "fk_staff", id_position AS "fk_posicion", id_journey AS "fk_journeys" FROM academic_area WHERE id=:identificador;

SELECT academic_area.id AS "id", 
academic_area.id_area AS "fk_area", 
areas.name_area AS "area_name",
academic_area.id_staff AS "fk_staff",
staff.first_name AS "staff_first_name",
academic_area.id_position AS "fk_posicion", 
position.name_position AS "name_position",
academic_area.id_journey AS "fk_journeys",
journey.name_journey AS "name_journey"
FROM academic_area
INNER JOIN areas ON academic_area.id_area = areas.id
INNER JOIN staff ON academic_area.id_staff = staff.id
INNER JOIN position ON position.name_position = position.id
INNER JOIN journey ON journey.name_journey = journey.id;

SELECT cities.id AS "id",
name_city AS "city",
cities.id_region AS "fk_region",
regions.name_region AS "name_region_fk"
FROM cities
INNER JOIN regions ON cities.id_region = regions.id;

SELECT admin_area.id AS "identificador",
 admin_area.id_area AS "fk_area",
 areas.name_area AS "fk_name_area",
 admin_area.id_staff AS "fk_staff",
 staff.first_name AS "fk_first_name",
 staff.first_surname AS "fk_first_surname",
 admin_area.id_position AS "fk_posicion",
 position.name_position AS "fk_name_position",
 admin_area.id_journey AS "fk_journeys",
 journey.name_journey AS "fk_name_journey"
 FROM admin_area
 INNER JOIN areas ON admin_area.id_area = areas.id
 INNER JOIN staff ON admin_area.id_staff = staff.id
 INNER JOIN position ON admin_area.id_position = position.id
 INNER JOIN journey ON admin_area.id_journey = journey.id;

SELECT chapters.id AS "id",
chapters.name_chapter AS "chapter_name",
chapters.start_date AS "Start_date",
chapters.end_date AS "End_date",
chapters.description AS "details",
chapters.duration_days AS "duration",
chapters.id_thematic_units AS "fk_thematic_units",
thematic_units.name_thematics_units AS "fk_name_thematics_units"
FROM chapters 
INNER JOIN thematic_units ON chapters.id_thematic_units = thematic_units.id;

SELECT contact_info.id AS "id",
contact_info.whatsapp AS "contact",
contact_info.instagram AS "ig",
contact_info.linkedin AS "li",
contact_info.email AS "email",
contact_info.address AS "direction",
contact_info.cel_number AS "phone",
contact_info.id_staff AS "fk_staff",
staff.first_name AS "fk_first_name",
staff.first_surname AS "fk_first_surname"
FROM contact_info
INNER JOIN staff ON contact_info.id_staff = staff.id;

SELECT emergency_contact.id AS "id",
emergency_contact.cel_number AS "phone",
emergency_contact.relationship AS "relation",
emergency_contact.full_name AS "complete_name",
emergency_contact.email AS "email",
emergency_contact.id_staff AS "fk_staff",
staff.first_name AS "fk_first_name",
staff.first_surname AS "fk_first_surname"
FROM emergency_contact
INNER JOIN staff ON emergency_contact.id_staff = staff.id;

SELECT modules.id AS "identificador",
modules.name_module AS "module_name",
modules.start_date AS "date_start",
modules.end_date AS "date_end",
modules.description AS "details",
modules.duration_days AS "days_duration",
modules.id_theme AS "fk_theme",
themes.name_theme AS "fk_name_theme"
FROM modules
INNER JOIN themes ON modules.id_theme = themes.id;

SELECT regions.id AS "id",
regions.name_region AS "region",
regions.id_country AS "fk_country",
countries.name_country AS "country_name_fk"
FROM regions
INNER JOIN countries ON regions.id_country = countries.id;

SELECT staff.id AS "id",
staff.doc AS "documento",
staff.first_name AS "f_name",
staff.second_name AS "s_name" ,
staff.first_surname AS "f_surname" ,
staff.second_surname AS "s_surname",
staff.eps AS "eps",
staff.id_area AS "fk_area",
areas.name_area AS "fk_name_area",
staff.id_city AS "fk_city",
cities.name_city AS "fk_city_name"
FROM staff
INNER JOIN areas ON staff.id_area = areas.id
INNER JOIN cities ON staff.id_city = cities.id;

SELECT thematic_units.id AS "id",
thematic_units.name_thematics_units AS "thematics_units",
thematic_units.start_date AS "Start_date",
thematic_units.end_date AS "End_date",
thematic_units.description AS "details",
thematic_units.duration_days AS "duration",
thematic_units.id_route AS fk_route,
routes.name_route AS "fk_route_name"
FROM thematic_units
INNER JOIN routes ON thematic_units.id_route = routes.id;

SELECT themes.id AS "id",
themes.name_theme AS "theme_names",
themes.start_date AS "start_D",
themes.end_date AS "end_D",
themes.description AS "description",
themes.duration_days AS "days_duration",
themes.id_chapter AS "fk_chapter",
chapters.name_chapter AS "fk_chapter_name"
FROM themes
INNER JOIN chapters ON themes.id_chapter = chapters.id;


SELECT topics.id AS "identificador",
topics.name_topic AS "topic_name",
topics.start_date AS "date_start",
topics.end_date AS "date_end",
topics.description AS "details",
topics.duration_days AS "days_duration",
topics.id_module AS "fk_module",
modules.name_module AS "fk_module_name"
FROM topics
INNER JOIN modules ON topics.id_module = modules.id;

SELECT tutors.id AS "id",
tutors.id_staff AS "fk_staff",
staff.first_name AS "f_name",
staff.second_name AS "s_name", 
tutors.id_academic_area AS "fk_academic_area",
areas.name_area AS "fk_name_area",
tutors.id_position AS "fk_position",
position.name_position AS "fk_position_name"
FROM tutors
INNER JOIN staff ON tutors.id_staff = staff.id
INNER JOIN areas ON  tutors.id_academic_area = areas.id
INNER JOIN position ON tutors.id_position = position.id;

SELECT working_info.id AS "id",
working_info.years_exp AS "experience_Y",
working_info.months_exp AS "experience_M" ,
working_info.start_contract AS "start_contract",
working_info.end_contract AS "end_contract",
working_info.id_staff AS "fk_staff",
staff.first_name AS "fk_first_name",
working_info.id_work_reference AS "fk_work_reference",
work_reference.full_name AS "fk_full_name_wref",
working_info.id_personal_ref AS "fk_personal_ref",
personal_ref.full_name AS "fk_full_name_pref"
FROM working_info
INNER JOIN staff ON working_info.id_staff = staff.id
INNER JOIN work_reference ON working_info.id_work_reference = work_reference.id
INNER JOIN personal_ref ON working_info.id_personal_ref = personal_ref.id



