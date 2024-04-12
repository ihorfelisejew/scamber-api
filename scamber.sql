-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 12 2024 р., 11:03
-- Версія сервера: 8.0.30
-- Версія PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `scamber`
--

-- --------------------------------------------------------

--
-- Структура таблиці `BodyTypes`
--

CREATE TABLE `BodyTypes` (
  `type_id` int NOT NULL,
  `name_of_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `BodyTypes`
--

INSERT INTO `BodyTypes` (`type_id`, `name_of_type`) VALUES
(1, 'Седан'),
(2, 'Хетчбек'),
(3, 'Універсал'),
(4, 'Купе'),
(5, 'Кабріолет'),
(6, 'Спорткар'),
(7, 'Позашляховик'),
(8, 'Пікап');

-- --------------------------------------------------------

--
-- Структура таблиці `Cars`
--

CREATE TABLE `Cars` (
  `car_id` int NOT NULL,
  `price` int NOT NULL,
  `body_type_id` int DEFAULT NULL,
  `manufacture_id` int NOT NULL,
  `car_model` varchar(30) NOT NULL,
  `year_of_manufacture` year NOT NULL,
  `complete_set` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `car_mileage` int NOT NULL,
  `car_number` varchar(12) NOT NULL,
  `VIN_code` varchar(2000) NOT NULL,
  `color` varchar(30) NOT NULL,
  `engine_type_id` int NOT NULL,
  `engine_capacity` double NOT NULL,
  `gearbox_id` int DEFAULT NULL,
  `drive_id` int DEFAULT NULL,
  `fuel_consumption` double NOT NULL,
  `other_desc` varchar(5000) NOT NULL,
  `client_id` int DEFAULT NULL,
  `offered_for_sale` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Cars`
--

INSERT INTO `Cars` (`car_id`, `price`, `body_type_id`, `manufacture_id`, `car_model`, `year_of_manufacture`, `complete_set`, `car_mileage`, `car_number`, `VIN_code`, `color`, `engine_type_id`, `engine_capacity`, `gearbox_id`, `drive_id`, `fuel_consumption`, `other_desc`, `client_id`, `offered_for_sale`) VALUES
(1, 52000, 1, 8, 'A6', 2019, 'Quattro', 30000, 'КІ1524АВ', '1HGCM82633A400001', 'White', 1, 2.5, 1, 1, 10.5, 'Автомобіль в досить хорошому стані', 2, 1),
(2, 25000, 1, 12, '6', 2020, 'Executive+', 39000, 'АТ4534МВ', '1HGCM82633A400251', 'Dark Night', 1, 2, 1, 3, 8.5, 'Салон в чудовому стані, зовнішньо пошкоджень немає, в ДТП не був', 6, 1),
(3, 19200, 1, 2, 'Fusion', 2019, 'Trend+', 72000, 'АІ2634МХ', '1HGCM82633A400267', 'Blue Night', 1, 1.6, 1, 1, 7.5, 'Автомобіль в чудовому стані, в ДТП не був', 11, 1),
(4, 18350, 1, 15, 'Octavia A7', 2019, 'Elegance', 190000, 'ВХ4535НМ', '1HGCM826843A400956', 'Black', 1, 1.5, 2, 1, 5.5, 'Є декілька царапин ззаді та слідів експлуатації в салоні', NULL, 1),
(5, 58888, 1, 16, 'Charger', 2016, 'Sport+', 69000, 'КІ3434АВ', '1HKMM82968A400874', 'White', 1, 4, 1, 2, 12.5, 'Чудове авто, прослужило 2 роки і жодної проблеми', 14, 1),
(6, 38800, 7, 14, 'XC60', 2020, 'Momentum Pro', 115000, 'АІ4834КЛ', '1HHCM84856A400974', 'Black', 1, 2, 2, 3, 9.5, 'В ДТП не був. Салон в досить хорошому стані, не зважаючи на пробіг', 8, 1),
(7, 24777, 7, 3, 'CR-V', 2016, 'Execute+', 39000, 'ВХ7654АТ', '1HGCM82633A547289', 'Dark Red', 1, 2.36, 2, 3, 10.5, 'Автомобіль в чудовому стані', 10, 1),
(8, 22999, 1, 3, 'Accord', 2019, 'Executive+', 43000, 'ВМ4535МВ', '1HGCM82633A400451', 'Black', 1, 2, 1, 1, 7.5, 'Акційна ціна!!! на обмін 26000$. Максимальна комплектація!', 14, 1),
(9, 20900, 1, 11, 'Sportage', 2021, 'Sport+', 55000, 'СЕ7844КІ', '1HGCM82633A400845', 'White', 1, 1.6, 2, 3, 10.5, 'Авто в гарному стані, один власник, їздила дівчина', 2, 1),
(10, 42900, 7, 1, 'RAV4', 2021, 'Live', 19000, 'АВ1595НК', '1HGCM82633A400871', 'White', 1, 2.49, 1, 1, 9.5, 'Із салону виїхала 22.02.22р, на гарантії, вся історія на тойоті. Додатково встановлено мітку, замок на акп, захист двигуна, сітка радіаторі, оригінальні коврики.', NULL, 1),
(12, 12500, 2, 8, 'A4', 2012, 'S-Line', 277000, 'АВ5484ІЕ', 'WAUZZZ8K2DA098856', 'Білий', 3, 2, 2, 1, 8, 'Продам надійне , економне обслужене авто\nКузов без дтп і підкрасів 100%\nПробіг не кручений-оригінал 100%\nХодова обслужена,тихеньнька, мякенька\nДвигун масла не бере, не димить\nЕкологія вся на місці\nПо коробці зауважень нема\nЗамінено:\nмасло і усі фільтра двигун\nмасло і фільтр коробка\nгальмівні диски з колодками\nклімат заправлений\nЕкологія уся на місці\nСервісна і чеки по обслуговуванню\nТри ключі\nДва комплекта гуми на титанах( зима ще мінімум на три сезона, літо точно на сезон-два)\nАвто першого клієнта\nТорг невеликий біля капоту\nБільше інформації по телефону\nХто шукає авто щоб тільки заправляти і їздити, а не вкладати в обслуговування , Вам сюди)', 3, 1),
(20, 16900, 7, 10, 'Tuscon', 2017, 'Outroadmax', 96000, 'СА 9929 СК', 'KM8J3CA49HU474382', 'Сірий', 1, 2, 2, 3, 12.5, 'Тут має бути опис', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `CarShowrooms`
--

CREATE TABLE `CarShowrooms` (
  `showroom_id` int NOT NULL,
  `name_of_showroom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `showroom_phone_number` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `director_id` int NOT NULL,
  `house_number` int NOT NULL,
  `street_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `CarShowrooms`
--

INSERT INTO `CarShowrooms` (`showroom_id`, `name_of_showroom`, `showroom_phone_number`, `director_id`, `house_number`, `street_id`) VALUES
(1, 'Scamber', '+380 (68)-845-35-17', 1, 14, 3),
(2, 'Elite Cars', '+380 (95)-745-35-17', 2, 15, 14),
(3, 'Scamber', '+380 (68)-645-35-17', 3, 56, 5),
(4, 'Comfort Cars', '+380 (97)-748-35-17', 4, 25, 16),
(5, 'Scamber', '+380 (68)-848-35-17', 5, 37, 10),
(6, 'Elite Cars', '+380 (65)-948-35-17', 6, 43, 18);

-- --------------------------------------------------------

--
-- Структура таблиці `CarsInParkingLots`
--

CREATE TABLE `CarsInParkingLots` (
  `id` int NOT NULL,
  `car_id` int NOT NULL,
  `parking_lot_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `CarsInParkingLots`
--

INSERT INTO `CarsInParkingLots` (`id`, `car_id`, `parking_lot_id`) VALUES
(1, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `CarsInShowroom`
--

CREATE TABLE `CarsInShowroom` (
  `id` int NOT NULL,
  `car_id` int NOT NULL,
  `showroom_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `CarsInShowroom`
--

INSERT INTO `CarsInShowroom` (`id`, `car_id`, `showroom_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3);

-- --------------------------------------------------------

--
-- Структура таблиці `Cities`
--

CREATE TABLE `Cities` (
  `city_id` int NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Cities`
--

INSERT INTO `Cities` (`city_id`, `city`) VALUES
(1, 'Хмельницький'),
(2, 'Івано-Франківськ'),
(3, 'Вінниця'),
(4, 'Дніпро'),
(5, 'Донецьк'),
(6, 'Житомир'),
(7, 'Запоріжжя'),
(8, 'Київ'),
(9, 'Кропивницький'),
(10, 'Луганськ'),
(11, 'Луцьк'),
(12, 'Львів'),
(13, 'Миколаїв'),
(14, 'Одеса'),
(15, 'Полтава'),
(16, 'Рівне'),
(17, 'Суми'),
(18, 'Тернопіль'),
(19, 'Ужгород'),
(20, 'Харків'),
(21, 'Херсон'),
(22, 'Черкаси'),
(23, 'Чернівці'),
(24, 'Чернігів');

-- --------------------------------------------------------

--
-- Структура таблиці `Clients`
--

CREATE TABLE `Clients` (
  `client_id` int NOT NULL,
  `clients_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `passport_number` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `series` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `identification_code` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Clients`
--

INSERT INTO `Clients` (`client_id`, `clients_name`, `last_name`, `phone_number`, `email`, `login`, `password`, `date_of_birth`, `passport_number`, `series`, `date_of_issue`, `identification_code`) VALUES
(1, 'Микола', 'Михайленко', '+380501234567', 'mykola0515@gmail.com', 'ivan_myhailenko', 'password123', '1990-05-15', 'AA123456', 'AB', '2010-12-05', '1234567890'),
(2, 'Марія', 'Колісніченко', '+380671234567', 'maria0821@gmail.com', 'maria_kolishichenko', 'pass456', '1985-08-21', 'BC789012', 'CD', '2008-07-10', '0987654321'),
(3, 'Олександр', 'Шевченко', '+380631234567', 'alex0209@gmail.com', 'alex_shevchenko', 'securepwd', '1992-02-09', 'DE345678', 'EF', '2015-03-18', '5432109876'),
(4, 'Тетяна', 'Микуленко', '+380991234567', 'tetiana3011@gmail.com', 'tetiana_mk', 'tetpass', '1988-11-30', 'FG456789', 'GH', '2012-09-25', '7654321098'),
(5, 'Андрій', 'Коваль', '+380661234567', 'andrew0703@gmail.com', 'andrew_koval', 'pass789', '1995-07-03', 'HI567890', 'IJ', '2016-11-14', '9876543210'),
(6, 'Олена', 'Шевченко', '+380961234567', 'olena0418@gmail.com', 'olena_sheva', 'olena_pass', '1984-04-18', 'JK678901', 'KL', '2007-06-22', '0123456789'),
(7, 'Сергій', 'Мельник', '+380501234567', 'sergei1208@gmail.com', 'sergei_m', 'pass1234', '1993-12-08', 'LM789012', 'MN', '2018-02-09', '8765432109'),
(8, 'Наталія', 'Павленко', '+380671234567', 'nataliapavlenko@gmail.com', 'natalia_p', 'password567', '1987-09-14', 'NO890123', 'OP', '2013-04-30', '2345678901'),
(9, 'Михайло', 'Козак', '+380631234567', 'mikhailkozak@gmail.com', 'mikhail_k', 'mikhailpass', '1991-01-26', 'PQ901234', 'QR', '2009-10-11', '8901234567'),
(10, 'Юлія', 'Лисенко', '+380991234567', 'yulialysenko@gmail.com', 'yulia_l', 'passyulia', '1986-06-07', 'RS012345', 'ST', '2014-07-17', '3456789012'),
(11, 'Павло', 'Тимченко', '+380661234567', 'pavlotymchenko@gmail.com', 'pavlo_t', 'securepass', '1994-03-02', 'TU123456', 'UV', '2017-05-28', '9012345678'),
(12, 'Вікторія', 'Семенова', '+380961234567', 'viktoriasemenova@gmail.com', 'viktoria_s', 'passviktoria', '1989-10-19', 'WX234567', 'XY', '2011-01-02', '6789012345'),
(13, 'Роман', 'Петришин', '+380501234567', 'romanpetryshyn@gmail.com', 'roman_p', 'passroman', '1996-04-12', 'YZ345678', 'ZA', '2019-08-05', '4567890123'),
(14, 'Андрій', 'Мороз', '+380671234567', 'andrii0827@gmail.com', 'andrii_m', 'passwordad', '1983-08-27', 'AB456789', 'BC', '2006-03-15', '7890123456'),
(15, 'Артем', 'Кравець', '+380631234567', 'artemkravets@gmail.com', 'artem_k', 'passartem', '1997-02-20', 'CD567890', 'DE', '2020-12-08', '5678901234'),
(16, 'Людмила', 'Білоус', '+380991234567', 'lyudmilabylous@gmail.com', 'lyudmila_b', 'passlyudmila', '1980-07-10', 'EF678901', 'FG', '2005-05-23', '2345678901'),
(18, 'Ольга', 'Ковальчук', '+380961234567', 'olgakoval@gmail.com', 'olga_k', 'passolga', '1998-06-14', 'IJ901234', 'JK', '2016-02-28', '6789012345');

-- --------------------------------------------------------

--
-- Структура таблиці `Drives`
--

CREATE TABLE `Drives` (
  `drive_id` int NOT NULL,
  `name_of_drive` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Drives`
--

INSERT INTO `Drives` (`drive_id`, `name_of_drive`) VALUES
(1, 'Передній привід'),
(2, 'Задній привід'),
(3, 'Повний привід');

-- --------------------------------------------------------

--
-- Структура таблиці `EngineType`
--

CREATE TABLE `EngineType` (
  `engine_id` int NOT NULL,
  `type_of_engine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `EngineType`
--

INSERT INTO `EngineType` (`engine_id`, `type_of_engine`) VALUES
(1, 'Бензин'),
(2, 'Газ'),
(3, 'Дизель'),
(4, 'Електро'),
(5, 'Гібрид');

-- --------------------------------------------------------

--
-- Структура таблиці `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `Gearboxes`
--

CREATE TABLE `Gearboxes` (
  `gearbox_id` int NOT NULL,
  `name_of_gearbox` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Gearboxes`
--

INSERT INTO `Gearboxes` (`gearbox_id`, `name_of_gearbox`) VALUES
(1, 'Автомат'),
(2, 'Механічна'),
(3, 'Варіатор');

-- --------------------------------------------------------

--
-- Структура таблиці `HistoryOfBuyingAndSellingCars`
--

CREATE TABLE `HistoryOfBuyingAndSellingCars` (
  `operation_id` int NOT NULL,
  `date_of_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `car_id` int NOT NULL,
  `showroom_id` int NOT NULL,
  `client_id` int NOT NULL,
  `manager_id` int DEFAULT NULL,
  `contract_amount` int NOT NULL,
  `type_of_contract_id` int NOT NULL,
  `contract` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `HistoryOfBuyingAndSellingCars`
--

INSERT INTO `HistoryOfBuyingAndSellingCars` (`operation_id`, `date_of_registration`, `car_id`, `showroom_id`, `client_id`, `manager_id`, `contract_amount`, `type_of_contract_id`, `contract`) VALUES
(1, '2019-10-17 14:23:33', 9, 3, 2, 11, 21000, 1, NULL),
(2, '2020-06-11 16:21:43', 5, 1, 14, 7, 59000, 1, NULL),
(3, '2021-05-07 12:25:51', 5, 1, 7, 8, 60000, 2, NULL),
(4, '2021-07-14 13:36:23', 3, 1, 11, 7, 18500, 1, NULL),
(6, '2021-09-08 18:00:07', 9, 3, 12, 11, 21000, 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `Manufactures`
--

CREATE TABLE `Manufactures` (
  `manufacture_id` int NOT NULL,
  `name_of_manufacture` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Manufactures`
--

INSERT INTO `Manufactures` (`manufacture_id`, `name_of_manufacture`, `phone_number`, `email`) VALUES
(1, 'Toyota', '+380501234567', 'toyota@gmail.com'),
(2, 'Ford', '+380671234567', 'ford@gmail.com'),
(3, 'Honda', '+380631234567', 'honda@gmail.com'),
(4, 'Chevrolet', '+380991234567', 'chevrolet@gmail.com'),
(5, 'Volkswagen', '+380661234567', 'vw@gmail.com'),
(6, 'BMW', '+380961234567', 'bmw@gmail.com'),
(7, 'Mercedes-Benz', '+380931234567', 'mercedes@gmail.com'),
(8, 'Audi', '+380681234567', 'audi@gmail.com'),
(9, 'Nissan', '+380971234567', 'nissan@gmail.com'),
(10, 'Hyundai', '+380631234567', 'hyundai@gmail.com'),
(11, 'Kia', '+380501234567', 'kia@gmail.com'),
(12, 'Mazda', '+380931234567', 'mazda@gmail.com'),
(13, 'Subaru', '+380671234567', 'subaru@gmail.com'),
(14, 'Volvo', '+380661234567', 'volvo@gmail.com'),
(15, 'Skoda', '+380687459685', 'skodaua@gmail.com'),
(16, 'Dodge', '+380958746598', 'dodgeua@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `OrderProcessing`
--

CREATE TABLE `OrderProcessing` (
  `order_id` int NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_last_name` varchar(50) NOT NULL,
  `client_contacts` varchar(30) NOT NULL,
  `order__detail` varchar(2000) DEFAULT NULL,
  `acceptance_status` tinyint(1) NOT NULL DEFAULT '0',
  `execution_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `OrderProcessing`
--

INSERT INTO `OrderProcessing` (`order_id`, `client_name`, `client_last_name`, `client_contacts`, `order__detail`, `acceptance_status`, `execution_status`) VALUES
(1, 'Михайло', 'Василенко', '+380687458465', 'Деталі краще уточнити по телефону', 1, 1),
(3, 'Іван', 'Михайленко', 'ivanmyhailenko@gmail.com', 'Очікую вашої відповіді на пошту', 1, 0),
(4, 'Микола', 'Димиденко', '+380957459856', 'Хотів би замовити Audi Q5 2015 року, в хорошому стані, бюджет не важливий ', 0, 0),
(5, 'Василь', 'Коліщенко', '@kolishchenko222', 'Очікую вашого повідомлення', 1, 0),
(15, 'Микола', 'Шевченко', '+380681758468', 'Деталі по телефону', 1, 1),
(16, 'Петро', 'Василько', '+380957486958', 'Всі деталі по телефону', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `ParkingLots`
--

CREATE TABLE `ParkingLots` (
  `parking_id` int NOT NULL,
  `house_number` int NOT NULL,
  `street_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `ParkingLots`
--

INSERT INTO `ParkingLots` (`parking_id`, `house_number`, `street_id`) VALUES
(1, 25, 1),
(2, 14, 6),
(3, 8, 9),
(4, 18, 13),
(5, 35, 17),
(6, 4, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `PhotoOfCar`
--

CREATE TABLE `PhotoOfCar` (
  `photo_id` int NOT NULL,
  `car_id` int NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблиці `Positions`
--

CREATE TABLE `Positions` (
  `position_id` int NOT NULL,
  `name_of_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Positions`
--

INSERT INTO `Positions` (`position_id`, `name_of_position`) VALUES
(1, 'Директор автосалону'),
(2, 'Менеджер з продажу автомобілів'),
(3, 'Фінансовий менеджер'),
(4, 'Майстер сервісу'),
(5, 'Менеджер з послуг післяпродажного обслуговування'),
(6, 'Адміністратор автосалону'),
(7, 'Менеджер із запасних частин'),
(8, 'Технік-механік'),
(9, 'Менеджер з маркетингу'),
(10, 'Ресепшен (приймальник автосервісу)');

-- --------------------------------------------------------

--
-- Структура таблиці `Rating`
--

CREATE TABLE `Rating` (
  `rating_id` int NOT NULL,
  `type_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Rating`
--

INSERT INTO `Rating` (`rating_id`, `type_rating`) VALUES
(1, 0.5),
(2, 1),
(3, 1.5),
(4, 2),
(5, 2.5),
(6, 3),
(7, 3.5),
(8, 4),
(9, 4.5),
(10, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `Reviews`
--

CREATE TABLE `Reviews` (
  `review_id` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `showroom_id` int NOT NULL,
  `content` varchar(2000) NOT NULL,
  `rating_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Reviews`
--

INSERT INTO `Reviews` (`review_id`, `client_id`, `showroom_id`, `content`, `rating_id`) VALUES
(1, 2, 1, 'Автосалон працює на вищому рівні! Облуговування топ', 10),
(2, 18, 1, 'Просто шикарно! Щей знижку зробили', 10),
(3, 5, 3, 'Все чудово! Автомобіль приїхав в строк! Так щей свій зміг продати за шикарною ціною', 9),
(4, 11, 1, 'Автомобіль дуже затримався. Я все розумію, всі обставини, проте осадок залишився', 7);

-- --------------------------------------------------------

--
-- Структура таблиці `Streets`
--

CREATE TABLE `Streets` (
  `street_id` int NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `city_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Streets`
--

INSERT INTO `Streets` (`street_id`, `street_name`, `city_id`) VALUES
(1, 'Вовчинецька', 1),
(2, 'Галицька', 1),
(3, 'Незалежності', 1),
(4, 'Січових Стрільців', 1),
(5, 'Проспект Миру', 2),
(6, 'Соборна', 2),
(7, 'Гагаріна', 2),
(8, 'Кам\'янецька', 2),
(9, 'Вулиця Личаківська', 12),
(10, 'Проспект Свободи', 12),
(11, 'Вулиця Шевченка', 12),
(12, 'Вулиця Руська', 12),
(13, 'Юності', 1),
(14, 'Коновальця', 1),
(15, 'Тернопільська', 2),
(16, 'Староконстянтинівське шосе', 2),
(17, 'Окружна', 12),
(18, 'Івана Виговського', 12);

-- --------------------------------------------------------

--
-- Структура таблиці `TypesOfContract`
--

CREATE TABLE `TypesOfContract` (
  `contract_type_id` int NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `TypesOfContract`
--

INSERT INTO `TypesOfContract` (`contract_type_id`, `type_name`) VALUES
(1, 'Купівля авто'),
(2, 'Продаж авто');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `Workers`
--

CREATE TABLE `Workers` (
  `worker_id` int NOT NULL,
  `name_of_worker` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `position_id` int NOT NULL,
  `showroom_id` int NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `Workers`
--

INSERT INTO `Workers` (`worker_id`, `name_of_worker`, `last_name`, `phone_number`, `email`, `appointment_date`, `date_of_birth`, `position_id`, `showroom_id`, `login`, `password`) VALUES
(1, 'Андрій', 'Коваль', '+380980123456', 'andriykoval@gmail.com', '2018-11-12', '1992-06-25', 1, 1, 'andriykvl34', 'andrii2506'),
(2, 'Марина', 'Петренко', '+380981234567', 'marinaptr@gmail.com', '2019-05-06', '1987-12-10', 1, 2, 'marinaptr12', 'marina1012'),
(3, 'Сергій', 'Іванов', '+380982345678', 'serhiyivnv@gmail.com', '2019-07-08', '1985-09-18', 1, 3, 'serhiyivnv4321', 'serhiy1809'),
(4, 'Ольга', 'Козлова', '+380983456789', 'olgakozlova@gmail.com', '2019-08-02', '1990-03-03', 1, 4, 'olgakozlova1234', 'olga0303'),
(5, 'Дмитро', 'Лисенко', '+380984567890', 'dmitrolsnk@gmail.com', '2019-08-11', '1983-07-20', 1, 5, 'dmitrolsnk56', 'dmitro2007'),
(6, 'Наталія', 'Мельник', '+380985678901', 'nataliamlnk@gmail.com', '2019-08-21', '1988-02-15', 1, 6, 'nataliamlnk78', 'natalia1502'),
(7, 'Віталій', 'Шевченко', '+380977611223', 'vitaliyshnko@gmail.com', '2019-09-18', '1992-08-15', 2, 1, 'vitaliyshnko', 'shnko1508'),
(8, 'Юлія', 'Ковальчук', '+380958745334', 'yuliakoval@gmail.com', '2019-09-20', '1987-04-20', 2, 1, 'yuliakoval', 'yuliakoval0420'),
(10, 'Олексій', 'Павленко', '+380956685556', 'oleksiy@gmail.com', '2020-03-09', '1990-02-25', 6, 1, 'alekspavl', 'alekspavl01234'),
(11, 'Тетяна', 'Мельникова', '+380675855667', 'tetiana@gmail.com', '2020-06-10', '1983-06-05', 2, 3, '', ''),
(12, 'Ігор', 'Сергієнко', '+380954966778', 'igorsergienko@gmail.com', '2020-07-08', '1988-01-30', 6, 3, 'igorsergienko', 'igorsgk3001');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `BodyTypes`
--
ALTER TABLE `BodyTypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Індекси таблиці `Cars`
--
ALTER TABLE `Cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `body_type_id` (`body_type_id`),
  ADD KEY `manufacture_id` (`manufacture_id`),
  ADD KEY `gearbox_id` (`gearbox_id`),
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `engine_type_id` (`engine_type_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Індекси таблиці `CarShowrooms`
--
ALTER TABLE `CarShowrooms`
  ADD PRIMARY KEY (`showroom_id`),
  ADD KEY `street_id` (`street_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Індекси таблиці `CarsInParkingLots`
--
ALTER TABLE `CarsInParkingLots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `parking_lot_id` (`parking_lot_id`);

--
-- Індекси таблиці `CarsInShowroom`
--
ALTER TABLE `CarsInShowroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `showroom_id` (`showroom_id`);

--
-- Індекси таблиці `Cities`
--
ALTER TABLE `Cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Індекси таблиці `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Індекси таблиці `Drives`
--
ALTER TABLE `Drives`
  ADD PRIMARY KEY (`drive_id`);

--
-- Індекси таблиці `EngineType`
--
ALTER TABLE `EngineType`
  ADD PRIMARY KEY (`engine_id`);

--
-- Індекси таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Індекси таблиці `Gearboxes`
--
ALTER TABLE `Gearboxes`
  ADD PRIMARY KEY (`gearbox_id`);

--
-- Індекси таблиці `HistoryOfBuyingAndSellingCars`
--
ALTER TABLE `HistoryOfBuyingAndSellingCars`
  ADD PRIMARY KEY (`operation_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `showroom_id` (`showroom_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `type_of_contract_id` (`type_of_contract_id`);

--
-- Індекси таблиці `Manufactures`
--
ALTER TABLE `Manufactures`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `OrderProcessing`
--
ALTER TABLE `OrderProcessing`
  ADD PRIMARY KEY (`order_id`);

--
-- Індекси таблиці `ParkingLots`
--
ALTER TABLE `ParkingLots`
  ADD PRIMARY KEY (`parking_id`),
  ADD KEY `street_id` (`street_id`);

--
-- Індекси таблиці `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Індекси таблиці `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Індекси таблиці `PhotoOfCar`
--
ALTER TABLE `PhotoOfCar`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Індекси таблиці `Positions`
--
ALTER TABLE `Positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Індекси таблиці `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Індекси таблиці `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `showroom_id` (`showroom_id`),
  ADD KEY `rating_id` (`rating_id`);

--
-- Індекси таблиці `Streets`
--
ALTER TABLE `Streets`
  ADD PRIMARY KEY (`street_id`),
  ADD KEY `streets_ibfk_1` (`city_id`);

--
-- Індекси таблиці `TypesOfContract`
--
ALTER TABLE `TypesOfContract`
  ADD PRIMARY KEY (`contract_type_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Індекси таблиці `Workers`
--
ALTER TABLE `Workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `id` (`worker_id`),
  ADD KEY `showroom_id` (`showroom_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `BodyTypes`
--
ALTER TABLE `BodyTypes`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `Cars`
--
ALTER TABLE `Cars`
  MODIFY `car_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблиці `CarShowrooms`
--
ALTER TABLE `CarShowrooms`
  MODIFY `showroom_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `CarsInParkingLots`
--
ALTER TABLE `CarsInParkingLots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `CarsInShowroom`
--
ALTER TABLE `CarsInShowroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `Cities`
--
ALTER TABLE `Cities`
  MODIFY `city_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблиці `Clients`
--
ALTER TABLE `Clients`
  MODIFY `client_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблиці `Drives`
--
ALTER TABLE `Drives`
  MODIFY `drive_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `EngineType`
--
ALTER TABLE `EngineType`
  MODIFY `engine_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `Gearboxes`
--
ALTER TABLE `Gearboxes`
  MODIFY `gearbox_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `HistoryOfBuyingAndSellingCars`
--
ALTER TABLE `HistoryOfBuyingAndSellingCars`
  MODIFY `operation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `Manufactures`
--
ALTER TABLE `Manufactures`
  MODIFY `manufacture_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `OrderProcessing`
--
ALTER TABLE `OrderProcessing`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблиці `ParkingLots`
--
ALTER TABLE `ParkingLots`
  MODIFY `parking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `PhotoOfCar`
--
ALTER TABLE `PhotoOfCar`
  MODIFY `photo_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `Positions`
--
ALTER TABLE `Positions`
  MODIFY `position_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблиці `Rating`
--
ALTER TABLE `Rating`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблиці `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `Streets`
--
ALTER TABLE `Streets`
  MODIFY `street_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблиці `TypesOfContract`
--
ALTER TABLE `TypesOfContract`
  MODIFY `contract_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `Workers`
--
ALTER TABLE `Workers`
  MODIFY `worker_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `Cars`
--
ALTER TABLE `Cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`body_type_id`) REFERENCES `BodyTypes` (`type_id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`gearbox_id`) REFERENCES `Gearboxes` (`gearbox_id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`drive_id`) REFERENCES `Drives` (`drive_id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `cars_ibfk_4` FOREIGN KEY (`manufacture_id`) REFERENCES `Manufactures` (`manufacture_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `cars_ibfk_5` FOREIGN KEY (`engine_type_id`) REFERENCES `EngineType` (`engine_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `CarShowrooms`
--
ALTER TABLE `CarShowrooms`
  ADD CONSTRAINT `carshowrooms_ibfk_1` FOREIGN KEY (`street_id`) REFERENCES `Streets` (`street_id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `carshowrooms_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `Workers` (`worker_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `CarsInParkingLots`
--
ALTER TABLE `CarsInParkingLots`
  ADD CONSTRAINT `carsinparkinglots_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `Cars` (`car_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `carsinparkinglots_ibfk_2` FOREIGN KEY (`parking_lot_id`) REFERENCES `ParkingLots` (`parking_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `CarsInShowroom`
--
ALTER TABLE `CarsInShowroom`
  ADD CONSTRAINT `carsinshowroom_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `Cars` (`car_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `carsinshowroom_ibfk_2` FOREIGN KEY (`showroom_id`) REFERENCES `CarShowrooms` (`showroom_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `HistoryOfBuyingAndSellingCars`
--
ALTER TABLE `HistoryOfBuyingAndSellingCars`
  ADD CONSTRAINT `historyofbuyingandsellingcars_ibfk_1` FOREIGN KEY (`showroom_id`) REFERENCES `CarShowrooms` (`showroom_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historyofbuyingandsellingcars_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `Clients` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historyofbuyingandsellingcars_ibfk_3` FOREIGN KEY (`type_of_contract_id`) REFERENCES `TypesOfContract` (`contract_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historyofbuyingandsellingcars_ibfk_4` FOREIGN KEY (`manager_id`) REFERENCES `Workers` (`worker_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `historyofbuyingandsellingcars_ibfk_5` FOREIGN KEY (`car_id`) REFERENCES `Cars` (`car_id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `ParkingLots`
--
ALTER TABLE `ParkingLots`
  ADD CONSTRAINT `parkinglots_ibfk_1` FOREIGN KEY (`street_id`) REFERENCES `Streets` (`street_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `PhotoOfCar`
--
ALTER TABLE `PhotoOfCar`
  ADD CONSTRAINT `photoofcar_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `Cars` (`car_id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`rating_id`) REFERENCES `Rating` (`rating_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `Clients` (`client_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`showroom_id`) REFERENCES `CarShowrooms` (`showroom_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `Streets`
--
ALTER TABLE `Streets`
  ADD CONSTRAINT `streets_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `Cities` (`city_id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `Workers`
--
ALTER TABLE `Workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `Positions` (`position_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `workers_ibfk_2` FOREIGN KEY (`showroom_id`) REFERENCES `CarShowrooms` (`showroom_id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
