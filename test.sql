-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 10:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdates`
--

CREATE TABLE `bookingdates` (
  `book_id` int(64) NOT NULL,
  `book_dates` varchar(255) DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookingdates`
--

INSERT INTO `bookingdates` (`book_id`, `book_dates`, `return_date`) VALUES
(2, '2023-04-30', '2023-04-29'),
(4, '2023-04-29', NULL),
(5, '2023-04-29', NULL),
(6, '2023-04-29', NULL),
(7, '2023-04-29', NULL),
(8, '2023-04-29', NULL),
(9, '2023-04-29', NULL),
(10, '2023-04-29', NULL),
(11, '2023-04-29', NULL),
(12, '2023-04-29', NULL),
(13, '2023-04-29', NULL),
(14, '2023-04-30', NULL),
(15, '2023-04-30', NULL),
(16, '2023-04-30', NULL),
(17, '2023-04-30', NULL),
(18, '2023-04-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `id` int(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(64) NOT NULL,
  `hour` int(64) NOT NULL,
  `rate` int(64) NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `chance` varchar(255) NOT NULL,
  `car_id_labor` int(64) NOT NULL,
  `transaction_id` int(64) NOT NULL,
  `transaction_user_id` int(64) NOT NULL,
  `transact_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`id`, `name`, `price`, `hour`, `rate`, `encoder`, `chance`, `car_id_labor`, `transaction_id`, `transaction_user_id`, `transact_category`) VALUES
(1, 'Replace CV joint', 2, 2, 2, '', '1', 8, 21, 43, 'UNDERCHASSIS WORK'),
(2, 'Check Engine Light On', 2, 2, 2, '', '1', 8, 30, 43, 'ELECTRICAL SERVICES'),
(3, 'EGR and Intake Manifold cleaning', 2, 2, 2, '', '1', 7, 31, 42, 'MAJOR WORK'),
(4, 'Replace CV joint', 2, 2, 2, '', '1', 7, 31, 42, 'UNDERCHASSIS WORK'),
(5, 'Top Overhaul', 2, 2, 2, '', '1', 7, 31, 42, 'MAJOR WORK'),
(6, 'Replace Rack and pinion', 2, 2, 2, '', '1', 10, 32, 38, 'UNDERCHASSIS WORK'),
(7, 'Check Engine Light On', 2, 2, 2, '', '1', 7, 33, 42, 'ELECTRICAL SERVICES'),
(8, 'Aircon Cleaning', 2, 2, 2, '', '1', 7, 33, 42, 'AIRCON SERVICES'),
(9, 'Replace Evaporator Rear', 2, 2, 2, '', '1', 7, 33, 42, 'AIRCON SERVICES'),
(10, 'Inspect clutch system', 2, 2, 2, '', '1', 7, 33, 42, 'PREVENTIVE MAINTENANCE SERVICE'),
(11, 'Check Engine Light On', 2, 2, 2, '', '1', 7, 33, 42, 'ELECTRICAL SERVICES'),
(12, 'Check Engine Light On', 2, 2, 2, '', '1', 7, 33, 42, 'ELECTRICAL SERVICES'),
(13, 'FULL SCANNING', 2, 2, 2, '', '1', 7, 33, 42, 'ELECTRICAL SERVICES'),
(14, 'Aircon Cleaning', 2, 2, 2, '', '1', 7, 33, 42, 'AIRCON SERVICES'),
(15, 'Repacked CV joint Bearing', 2, 2, 2, '', '1', 7, 33, 42, 'MAJOR WORK'),
(16, 'Replace Ball Joint', 2, 2, 2, '', '1', 7, 33, 42, 'UNDERCHASSIS WORK'),
(17, 'EGR and Intake Manifold cleaning', 2, 2, 2, '', '1', 7, 33, 42, 'MAJOR WORK'),
(18, 'EGR and Intake Manifold cleaning', 2, 2, 2, '', '1', 7, 33, 42, 'MAJOR WORK'),
(19, 'Radiator Cleaning', 2, 2, 2, '', '1', 7, 34, 42, 'COOLING SYSTEM RESTORATION'),
(20, 'Replace Ball Joint', 2, 2, 2, '', '1', 7, 35, 42, 'UNDERCHASSIS WORK'),
(21, 'EGR and Intake Manifold cleaning', 2, 2, 2, '', '1', 7, 35, 42, 'MAJOR WORK'),
(22, 'Abs, airbag, electrical power steering etc.', 2, 2, 2, '', '1', 7, 35, 42, 'ELECTRICAL SERVICES'),
(23, 'Check Engine Light On', 2, 2, 2, '', '1', 10, 36, 38, 'ELECTRICAL SERVICES'),
(24, 'EGR and Intake Manifold cleaning', 2, 2, 2, '', '1', 10, 36, 38, 'MAJOR WORK'),
(25, 'General Overhaul', 2, 2, 2, '', '1', 10, 36, 38, 'MAJOR WORK');

-- --------------------------------------------------------

--
-- Table structure for table `cardata`
--

CREATE TABLE `cardata` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `useremail` varchar(128) NOT NULL,
  `userphone` varchar(24) NOT NULL,
  `plateid` int(64) NOT NULL,
  `carbrand` varchar(255) NOT NULL,
  `carmodel` varchar(255) NOT NULL,
  `carmanufacturer` varchar(255) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `cartype` varchar(255) NOT NULL,
  `carserialnumber` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cardata`
--

INSERT INTO `cardata` (`id`, `username`, `useremail`, `userphone`, `plateid`, `carbrand`, `carmodel`, `carmanufacturer`, `dt`, `cartype`, `carserialnumber`) VALUES
(10, '', '', '21312', 38, 'Maserati', 'motohub', 'FORD MOTOLITE', '2023-04-17 08:55:24', 'limos', '2323'),
(9, '', '', '2003', 43, 'TOYOTA', 'TOYOTA', 'FORD MOTOLITE', '2023-04-16 20:59:08', 'Sedan', '123456'),
(8, '', '', '21312', 43, 'VIOS', 'Mustang', 'LAMBORGHINI70', '2023-04-16 18:02:33', 'sedan', '2323'),
(7, '', '', '21312', 42, 'VIOS', 'MOTOROLA', 'PHUB PHILIPPINES', '2023-04-16 06:07:06', 'Sedan', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `car_brand`
--

CREATE TABLE `car_brand` (
  `car_brand_id` int(64) NOT NULL,
  `car_brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `car_brand`
--

INSERT INTO `car_brand` (`car_brand_id`, `car_brand_name`) VALUES
(1, 'TOYOTA1'),
(2, 'motolite'),
(3, 'motorite'),
(4, 'vios'),
(5, 'masera'),
(6, 'battery');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `car_model_id` int(64) NOT NULL,
  `car_model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`car_model_id`, `car_model_name`) VALUES
(1, 'lamborghinis'),
(2, 'lambor'),
(3, 'Sedan');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `car_type_id` int(64) NOT NULL,
  `car_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`car_type_id`, `car_type_name`) VALUES
(1, 'Sedan'),
(2, 'Limo'),
(3, 'limos'),
(4, 'asd'),
(5, 'asda'),
(6, 'asd1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Oil'),
(2, 'Filter');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(64) NOT NULL,
  `employee_fname` varchar(255) NOT NULL,
  `employee_lname` varchar(255) NOT NULL,
  `employee_gender` varchar(255) NOT NULL,
  `employee_phone` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_hired_date` date NOT NULL,
  `employee_job` varchar(255) NOT NULL,
  `employee_province` varchar(255) NOT NULL,
  `employee_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_lname`, `employee_gender`, `employee_phone`, `employee_email`, `employee_hired_date`, `employee_job`, `employee_province`, `employee_city`) VALUES
(19, 'Edralyn Capales', 'Tado', 'Male', '09678143832', 'cesarsdio@gmail.com', '2023-03-25', 'manager', 'Batangas', 'Lemery'),
(20, 'Trish', 'Montiagodo', 'Female', '09678143832', 'trishia@gmail.com', '2023-03-28', 'Manager', 'Bataan', 'Hermosa'),
(23, 'Cesar', 'Sidon', 'Male', '093232', 'cesar_sidon@yahoo.com', '2023-04-18', 'manager', 'Basilan', 'Lamitan');

-- --------------------------------------------------------

--
-- Table structure for table `expense_table`
--

CREATE TABLE `expense_table` (
  `expense_id` int(64) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_price` int(64) NOT NULL,
  `expense_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expense_table`
--

INSERT INTO `expense_table` (`expense_id`, `expense_name`, `expense_price`, `expense_date`) VALUES
(1, 'Coffee', 3400, '2023-03-05'),
(3, 'Coffee', 2500, '2023-03-18'),
(4, 'Mango shake', 5000, '2023-04-19'),
(5, 'Flipflop', 10000, '2025-04-10'),
(6, 'Papapya', 2500, '2023-04-17'),
(7, 'Popcorn', 8700, '2023-04-17'),
(8, 'cake', 5000, '2023-04-17'),
(9, 'COCONUT', 50, '2023-04-18'),
(10, 'Chocolate', 300, '2023-04-18'),
(11, 'cheese cake', 2500, '2023-04-17'),
(12, 'Meatloaf', 30000, '2023-04-18'),
(13, 'MILK', 3000, '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `parts_table`
--

CREATE TABLE `parts_table` (
  `item_id` int(64) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_price` int(64) NOT NULL,
  `item_amount` int(64) NOT NULL,
  `item_total` int(64) NOT NULL,
  `item_status` varchar(254) NOT NULL,
  `item_buyer` varchar(255) NOT NULL,
  `item_car_id` int(64) NOT NULL,
  `item_transaction_id` int(64) NOT NULL,
  `item_user_id` int(64) NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp(),
  `item_transaction_sched` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parts_table`
--

INSERT INTO `parts_table` (`item_id`, `item_name`, `item_category`, `item_price`, `item_amount`, `item_total`, `item_status`, `item_buyer`, `item_car_id`, `item_transaction_id`, `item_user_id`, `dt`, `item_transaction_sched`) VALUES
(1, 'Spark plug', 'Filter', 2500, 3, 7500, '', '', 8, 30, 43, '2023-04-16', '2023-04-17'),
(2, 'Spark plug', 'Filter', 5000, 3, 9999, '', '', 7, 31, 42, '2023-04-16', '2023-04-17'),
(3, 'air purifier', 'Filter', 25, 1, 25, 'Approved', 'Michelle Gumabao', 0, 0, 1, '2023-04-16', '2023-04-17'),
(4, 'shell oil ', '', 1233, 9, 11097, 'Approved', 'Jackson', 0, 0, 1, '2023-04-16', '2023-04-17'),
(5, 'shell oil ', '', 1233, 1, 1233, 'Approved', 'Ferd', 0, 0, 1, '2023-04-16', '2023-04-17'),
(6, 'air purifier', 'Filter', 25, 1, 25, 'Approved', 'tad0', 0, 0, 1, '2023-04-17', '2023-04-17'),
(7, 'air filter', 'Filter', 3000, 25, 75000, '', '', 10, 32, 38, '2023-04-17', '2023-04-18'),
(8, 'air purifier', 'Filter', 2500, 3, 7500, '', '', 7, 34, 42, '2023-04-17', '2023-04-20'),
(9, 'Spark plug', 'Filter', 250, 6, 1500, '', '', 7, 35, 42, '2023-04-18', '2023-04-19'),
(10, 'air filter', 'Filter', 2500, 2, 5000, 'Pending', 'June Cesar Dublan', 0, 0, 38, '2023-04-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `p_id` int(64) NOT NULL,
  `p_product_code` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `p_qty_stock` int(64) NOT NULL,
  `p_on_hand` int(64) NOT NULL,
  `p_price` int(64) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `p_supplier` varchar(255) NOT NULL,
  `p_date_stock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`p_id`, `p_product_code`, `p_name`, `p_description`, `p_qty_stock`, `p_on_hand`, `p_price`, `p_category`, `p_supplier`, `p_date_stock`) VALUES
(13, '180089323', 'Spark plug', 'green lgihts', 250, 100, 2500, 'Filter', 'Shell', '2023-02-26'),
(14, '8700', 'shell oil ', 'asd', 55, 0, 1233, 'Parts', 'Petron', '2023-03-24'),
(16, '1800823', 'air purifier', 'car', 22, 7, 25, 'Filter', 'Petron', '2023-03-25'),
(17, '1800823', 'air filter', '2', 1, 10, 2500, 'Filter', 'Petron', '2023-03-25'),
(18, '4422', 'gas tank', 'sad', 22, 20, 2500, 'Filter', 'Petron', '2023-03-25'),
(23, '7777', 'Pluma Oil', 'mabug at', 2, 250, 300, 'Oil', 'Petron', '2023-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_jd` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` int(64) NOT NULL,
  `service_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_jd`, `service_name`, `service_price`, `service_category`) VALUES
(7, 'Replace transmission fluid/gear oil', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(10, 'Inspect and clean brake lining and drum', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(11, 'Inspect and clean brake pads and disk', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(12, 'Inspect steering wheel, linkage and gear box', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(13, 'Inspect Front and Rear suspension', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(14, 'Inspect and test battery health', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(15, 'Inspect clutch system', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(16, 'Inspect Front and Rear suspension', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(17, 'Inspect air conditioning system', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(18, 'Inspect/Replace Drive Belt', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(19, 'Engine Detailing', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(20, 'Fluid flushing', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(21, 'FULL ENGINE SCANNING', 100, 'PREVENTIVE MAINTENANCE SERVICE'),
(22, 'Aircon Cleaning', 100, 'AIRCON SERVICES'),
(23, 'Replace Compressor', 100, 'AIRCON SERVICES'),
(24, 'Replace Evaporator Front', 100, 'AIRCON SERVICES'),
(25, 'Replace Evaporator Rear', 100, 'AIRCON SERVICES'),
(26, 'Replace Condenser', 100, 'AIRCON SERVICES'),
(27, 'Replace Auxiliary fan', 100, 'AIRCON SERVICES'),
(28, 'Replace Expansion Valve Front', 100, 'AIRCON SERVICES'),
(29, 'Replace Expansion Valve Back', 100, 'AIRCON SERVICES'),
(30, 'Replace Filter Drier', 100, 'AIRCON SERVICES'),
(31, 'Replace High Pressure Switch', 100, 'AIRCON SERVICES'),
(32, 'Flushing AC system', 100, 'AIRCON SERVICES'),
(34, 'Check Engine Light On', 100, 'ELECTRICAL SERVICES'),
(35, 'FULL SCANNING', 100, 'ELECTRICAL SERVICES'),
(36, 'Abs, airbag, electrical power steering etc.', 100, 'ELECTRICAL SERVICES'),
(37, 'EGR and Intake Manifold cleaning', 100, 'MAJOR WORK'),
(38, 'Intake Manifold cleaning', 100, 'MAJOR WORK'),
(39, 'Replace Timing Belt', 100, 'MAJOR WORK'),
(40, 'Turbo Cleaning', 100, 'MAJOR WORK'),
(41, 'Replace Turbo Actuator', 100, 'MAJOR WORK'),
(42, 'Replace Tensioner Bearing', 100, 'MAJOR WORK'),
(43, 'Replace Clutch Kit', 100, 'MAJOR WORK'),
(44, 'Valve Clearance Setting', 100, 'MAJOR WORK'),
(45, 'Replace Valve Cover Gasket', 100, 'MAJOR WORK'),
(46, 'Top Overhaul', 100, 'MAJOR WORK'),
(47, 'General Overhaul', 100, 'MAJOR WORK'),
(48, 'Replace Transmission', 100, 'MAJOR WORK'),
(49, 'Replace Radiator', 100, 'MAJOR WORK'),
(50, 'Repacked Wheel Bearing', 100, 'MAJOR WORK'),
(51, 'Repacked CV joint Bearing', 100, 'MAJOR WORK'),
(52, 'Replace Ball Joint', 100, 'UNDERCHASSIS WORK'),
(53, 'Replace Stabilizer Link', 100, 'UNDERCHASSIS WORK'),
(54, 'Replace Shock Absorber', 100, 'UNDERCHASSIS WORK'),
(55, 'Replace Tie Rod', 100, 'UNDERCHASSIS WORK'),
(56, 'Replace Rack End', 100, 'UNDERCHASSIS WORK'),
(57, 'Replace Rack and pinion', 100, 'UNDERCHASSIS WORK'),
(58, 'Replace Wheel Bearing', 100, 'UNDERCHASSIS WORK'),
(59, 'Replace CV joint', 100, 'UNDERCHASSIS WORK'),
(60, 'Replace Engine Support', 100, 'UNDERCHASSIS WORK'),
(61, 'Replace Transmission Support', 100, 'UNDERCHASSIS WORK'),
(62, 'Radiator Cleaning', 100, 'COOLING SYSTEM RESTORATION'),
(63, 'Coolant Flushing', 100, 'COOLING SYSTEM RESTORATION'),
(64, 'Inspect/Replace Water Pump', 100, 'COOLING SYSTEM RESTORATION'),
(65, 'Inspect/Replace Thermostat', 100, 'COOLING SYSTEM RESTORATION'),
(66, 'Inspect/Replace Radiator Hose', 100, 'COOLING SYSTEM RESTORATION'),
(67, 'Inspect/Replace Auxiliary Fan', 100, 'COOLING SYSTEM RESTORATION'),
(68, 'Silicon oil Refill', 100, 'COOLING SYSTEM RESTORATION'),
(76, 'Replace Evaporator Rear', 0, 'AIRCON SERVICES'),
(78, 'Repacked CV joint Bearing', 9009, 'MAJOR WORK'),
(79, '', 300, 'MAJOR WORK');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `service_id` int(64) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`service_id`, `service_name`) VALUES
(1, 'PREVENTIVE MAINTENANCE SERVICE'),
(2, 'AIRCON SERVICES'),
(3, 'ELECTRICAL SERVICES'),
(4, 'MAJOR WORK'),
(5, 'UNDERCHASSIS WORK'),
(6, 'COOLING SYSTEM RESTORATION'),
(207, 'CHASSIS WORK'),
(210, 'CHASSIS100');

-- --------------------------------------------------------

--
-- Table structure for table `service_job`
--

CREATE TABLE `service_job` (
  `job_id` int(64) NOT NULL,
  `job_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_job`
--

INSERT INTO `service_job` (`job_id`, `job_role`) VALUES
(23, 'Mechanicd'),
(29, 'Manager'),
(31, 'tampins'),
(36, 'Hooker'),
(40, 'RAWRRAWR'),
(41, 'Mechanics'),
(42, 'Steak'),
(43, '2023-04-13'),
(44, 'Steak11'),
(45, 'Calamnsi'),
(46, 'Mechans');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(64) NOT NULL,
  `s_city` varchar(255) NOT NULL,
  `s_company_name` varchar(255) NOT NULL,
  `s_phone` varchar(255) NOT NULL,
  `s_province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_city`, `s_company_name`, `s_phone`, `s_province`) VALUES
(18, 'Ibajay', 'Petron', '09120914372', 'Aklan'),
(34, 'Buenavista', 'Shell', '09120914372', 'Agusan del Norte');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `id` int(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(64) NOT NULL,
  `hour` int(64) NOT NULL,
  `rate` int(64) NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `chance` varchar(255) NOT NULL,
  `car_id_labor` int(64) NOT NULL,
  `transaction_id` int(64) NOT NULL,
  `transaction_user_id` int(64) NOT NULL,
  `transact_category` varchar(255) NOT NULL,
  `worker` varchar(255) NOT NULL,
  `transact_dt` date NOT NULL DEFAULT current_timestamp(),
  `transaction_sched` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction_table`
--

INSERT INTO `transaction_table` (`id`, `name`, `price`, `hour`, `rate`, `encoder`, `chance`, `car_id_labor`, `transaction_id`, `transaction_user_id`, `transact_category`, `worker`, `transact_dt`, `transaction_sched`) VALUES
(28, 'EGR and Intake Manifold cleaning', 2500, 2, 2, 'Trish', '2', 8, 30, 43, 'MAJOR WORK', '', '2023-04-16', '2023-04-17'),
(29, 'EGR and Intake Manifold cleaning', 25555, 2, 2, 'Cesar', '2', 7, 31, 42, 'MAJOR WORK', '', '2023-04-16', '2023-04-17'),
(30, 'Top Overhaul', 339, 2, 2, 'Edralyn Capales', '2', 7, 31, 42, 'MAJOR WORK', '', '2023-04-16', '2023-04-17'),
(31, 'Replace CV joint', 2233, 22, 12, 'Cesar', '2', 7, 31, 42, 'UNDERCHASSIS WORK', '', '2023-04-16', '2023-04-17'),
(32, 'Replace Ball Joint', 6666, 2, 22, 'Trish', '2', 10, 32, 38, 'UNDERCHASSIS WORK', '', '2023-04-17', '2023-04-18'),
(33, 'Radiator Cleaning', 3555, 2, 2, 'Edralyn Capales', '2', 7, 34, 42, 'COOLING SYSTEM RESTORATION', '', '2023-04-17', '2023-04-20'),
(34, 'Abs, airbag, electrical power steering etc.', 2500, 2, 2, 'Trish', '2', 7, 35, 42, 'ELECTRICAL SERVICES', '', '2023-04-18', '2023-04-19'),
(35, 'Replace Ball Joint', 25500, 2, 2, 'Edralyn Capales', '2', 7, 35, 42, 'UNDERCHASSIS WORK', '', '2023-04-18', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `transacttable`
--

CREATE TABLE `transacttable` (
  `transid` int(64) NOT NULL,
  `custid` int(64) NOT NULL,
  `carid` int(64) NOT NULL,
  `numofitem` int(64) NOT NULL,
  `cashtotal` int(64) NOT NULL,
  `transactidid` int(64) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `transact_sched` date DEFAULT NULL,
  `transact_schedinfo` varchar(255) NOT NULL,
  `transdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `moneytotal` int(64) NOT NULL,
  `numofmaterials` int(64) NOT NULL,
  `transact1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transacttable`
--

INSERT INTO `transacttable` (`transid`, `custid`, `carid`, `numofitem`, `cashtotal`, `transactidid`, `status`, `payment`, `payment_type`, `transact_sched`, `transact_schedinfo`, `transdate`, `moneytotal`, `numofmaterials`, `transact1`) VALUES
(30, 43, 8, 2, 20000, 0, 'Completed', '', '', '2023-04-17', '6-7 am', '2023-04-17 05:51:15', 0, 0, '10000'),
(31, 42, 7, 3, 50000, 0, 'Completed', '', '', '2023-04-17', 'KULOP NALA DAI', '2023-04-17 06:04:57', 0, 0, '43127'),
(32, 38, 10, 1, 80000, 0, 'Completed', '', '', '2023-04-18', '6-7 am', '2023-04-17 08:55:38', 0, 0, '77555'),
(33, 42, 7, 0, 0, 0, 'Pending', '', 'Gcash', '2023-04-18', '6-7 am', '2023-04-18 00:01:21', 0, 0, '123123'),
(34, 42, 7, 1, 10100, 0, 'Completed', '', '', '2023-04-20', '2500', '2023-04-18 00:03:33', 0, 0, '10099'),
(35, 42, 7, 2, 30000, 0, 'Completed', '', '', '2023-04-19', '2500', '2023-04-18 16:12:31', 0, 0, '29500'),
(36, 38, 10, 0, 0, 0, 'Pending', '', 'Gcash', '2023-04-19', '6-7 am', '2023-04-18 17:36:44', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userage` int(64) NOT NULL,
  `usergender` varchar(255) NOT NULL,
  `userbirthdate` date DEFAULT NULL,
  `userprovince` varchar(255) NOT NULL,
  `usercity` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `phone`, `email`, `useremail`, `password`, `userage`, `usergender`, `userbirthdate`, `userprovince`, `usercity`, `user_type`) VALUES
(1, 'admin', 'June Cesar', 'Sidon', '1', 'cesar_sidon5@gmail.com', 'cesar_sidon@yahoo.com', '$2y$10$5KNKuiv/uKqX1P/h/kpEvObi.P0jjXzRgAledeufyG4m/UofcUy8e', 0, '', NULL, '', '', 'admin'),
(38, 'tawyun1433', 'June Cesar', 'Dublan', '3213', 'tawyun@gmail.com', '', '$2y$10$H8iHP4cbTObCEsJq0XpVJutiTDu9RrYfthUWziC.FlrBn/pj036ki', 0, '', NULL, '', '', ''),
(42, 'miracle', 'Miraculous', 'Monster', '12345678912', 'cesar_sidon123@yahoo.com', '', '$2y$10$7SsM8.BnY/2Zs8vk./scueMepqqjHrJSKdQv.Sy83RVKI4iF4GqVa', 0, '', NULL, '', '', ''),
(43, 'rengie123', 'Rengie', 'rans', '09665566677', 'rengietad@gmail.com', '', '$2y$10$ZoCF7dAXXhoRW1tnfWidb.lM0CYalsLgxUxHG0ekCfLBf7Xxqxi46', 0, '', NULL, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdates`
--
ALTER TABLE `bookingdates`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardata`
--
ALTER TABLE `cardata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`car_brand_id`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`car_model_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`car_type_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `expense_table`
--
ALTER TABLE `expense_table`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `parts_table`
--
ALTER TABLE `parts_table`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_jd`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_job`
--
ALTER TABLE `service_job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transacttable`
--
ALTER TABLE `transacttable`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdates`
--
ALTER TABLE `bookingdates`
  MODIFY `book_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cardata`
--
ALTER TABLE `cardata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `car_brand_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `car_model_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `car_type_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `expense_table`
--
ALTER TABLE `expense_table`
  MODIFY `expense_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `parts_table`
--
ALTER TABLE `parts_table`
  MODIFY `item_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `p_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_jd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `service_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `service_job`
--
ALTER TABLE `service_job`
  MODIFY `job_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transacttable`
--
ALTER TABLE `transacttable`
  MODIFY `transid` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
