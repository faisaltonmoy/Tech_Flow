-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 02:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_flow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'Tonmoy', '170204025'),
(2, 'Atanu', '170204003');

-- --------------------------------------------------------

--
-- Table structure for table `after_order`
--

CREATE TABLE `after_order` (
  `id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `after_order`
--

INSERT INTO `after_order` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `name`, `image`, `status`) VALUES
(1, 'ROG Strix G15', 'ROG.jpg', 1),
(3, 'HP-Pavilion-Gaming-15', 'HP-Pavilion-Gaming-15-Feature.jpg', 1),
(4, 'MSI', 'MSI.jpg', 1),
(25, 'Atanu', 'HP-Pavilion-Gaming-15-Feature.jpg', 0),
(47, 'Acer Nitro 5', 'acernitro5an515-44featured.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `catagories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagories`, `status`) VALUES
(5, 'Desktop', 1),
(6, 'Laptop', 1),
(7, 'Accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_hints`
--

CREATE TABLE `chatbot_hints` (
  `Id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `reply` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot_hints`
--

INSERT INTO `chatbot_hints` (`Id`, `question`, `reply`) VALUES
(1, 'Hi', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `time`) VALUES
(21, 'Atanu', '170204003@aust.edu', '0123456789745', 'Having some issue when add some  product in cart .... plz this', '2021-04-17 22:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `added_on` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Id`, `message`, `added_on`, `type`) VALUES
(15, 'Hello', '2021-04-13 01:18:14', 'user'),
(16, 'Sorry not be able to understand you', '2021-04-13 01:18:14', 'bot'),
(17, 'hi', '2021-04-13 01:18:19', 'user'),
(18, 'Hello', '2021-04-13 01:18:19', 'bot');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `message`, `status`) VALUES
(1, 'Stay Home Stay Safe. Happy Shopping.', 0),
(5, 'We will be remain close during the lockdown. Due online store and door to door delivery will be available maintaining safe distance. Stay Home Stay Safe. Happy Shopping.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `time`) VALUES
(1, 1, 28, 1, 16200, '2021-03-26 17:00:00'),
(2, 2, 27, 1, 3250, '2021-03-26 18:29:54'),
(3, 3, 28, 2, 16200, '2021-03-26 21:01:07'),
(4, 4, 27, 1, 3250, '2021-03-26 22:49:52'),
(5, 5, 27, 3, 3250, '2021-03-26 23:23:47'),
(6, 5, 28, 1, 16200, '2021-03-26 23:23:47'),
(7, 6, 27, 4, 3250, '2021-03-27 00:55:00'),
(8, 6, 28, 2, 16200, '2021-03-27 00:55:00'),
(9, 7, 28, 3, 16200, '2021-03-27 21:44:08'),
(10, 8, 63, 1, 16700, '2021-03-30 04:47:05'),
(11, 9, 49, 1, 9880, '2021-03-30 13:34:41'),
(12, 9, 28, 1, 16200, '2021-03-30 13:34:41'),
(13, 10, 53, 1, 3250, '2021-04-12 00:37:31'),
(14, 11, 29, 1, 10850, '2021-04-12 00:44:41'),
(15, 12, 38, 1, 3399, '2021-04-12 00:50:43'),
(16, 13, 58, 2, 4700, '2021-04-12 01:44:10'),
(17, 14, 49, 1, 9880, '2021-04-12 01:45:07'),
(18, 15, 54, 1, 750, '2021-04-13 18:29:06'),
(23, 19, 30, 1, 4099, '2021-04-14 00:40:37'),
(24, 20, 27, 1, 3250, '2021-04-14 00:46:50'),
(25, 21, 40, 1, 2000, '2021-04-14 01:34:54'),
(26, 22, 35, 1, 251000, '2021-04-14 02:02:27'),
(27, 23, 52, 1, 2150, '2021-04-14 02:10:22'),
(28, 24, 64, 1, 205000, '2021-04-15 15:58:42'),
(29, 25, 64, 1, 205000, '2021-04-16 22:36:38'),
(30, 26, 64, 1, 205000, '2021-04-17 03:15:12'),
(31, 26, 60, 1, 14000, '2021-04-17 03:15:12'),
(32, 27, 65, 1, 195000, '2021-04-17 03:17:15'),
(33, 28, 32, 2, 103900, '2021-04-17 03:19:09'),
(34, 29, 64, 1, 205000, '2021-04-17 04:20:14'),
(35, 29, 70, 2, 110000, '2021-04-17 04:20:14'),
(36, 30, 63, 1, 16700, '2021-04-17 04:23:32'),
(37, 31, 64, 1, 205000, '2021-04-17 04:54:43'),
(38, 31, 72, 2, 110000, '2021-04-17 04:54:43'),
(39, 32, 65, 1, 195000, '2021-04-17 04:56:40'),
(40, 33, 64, 1, 205000, '2021-04-17 05:39:44'),
(41, 33, 73, 2, 110000, '2021-04-17 05:39:44'),
(42, 34, 64, 1, 205000, '2021-04-17 05:56:13'),
(43, 34, 74, 1, 110000, '2021-04-17 05:56:13'),
(44, 35, 65, 1, 195000, '2021-04-17 05:58:10'),
(45, 36, 64, 1, 205000, '2021-04-17 21:55:40'),
(46, 36, 75, 2, 110000, '2021-04-17 21:55:40'),
(47, 36, 30, 1, 4099, '2021-04-17 21:55:40'),
(48, 37, 65, 1, 195000, '2021-04-17 21:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_user_info`
--

CREATE TABLE `order_user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_user_info`
--

INSERT INTO `order_user_info` (`id`, `name`, `email`, `address`, `city`, `state`, `zip`, `payment_type`, `total_price`, `payment_status`, `order_status`, `time`) VALUES
(12, 'Sadman', 'Sadman@gmail.com', '121 ibrahimpur,kafrul', 'Dhaka', 'DHK', '1206', 'cod', 3399, 'Pending', 1, '2021-04-12 00:50:43'),
(13, 'Anwar', 'anwar@gmail.com', '215ajxcvajxdbaj', 'Dhaka', 'DHK', '5456', 'cod', 9400, 'Pending', 1, '2021-04-12 01:44:10'),
(14, 'Anwar', 'anwar@gmail.com', '5s45s4fs', 'adasdas', 'asdasd', '54564', 'cod', 9880, 'Pending', 1, '2021-04-12 01:45:07'),
(15, 'Faisal', 'asfafsasf@gmail.com', 'gsgsd', 'sdsdg', 'sdfsdf', '2415', 'cod', 16950, 'Pending', 1, '2021-04-13 18:29:06'),
(16, 'Faisal', 'asfafsasf@gmail.com', 'asdasd', 'sdas', 'asdas', '2566', 'cod', 145530, 'Pending', 1, '2021-04-14 00:31:06'),
(17, 'Faisal', 'asfafsasf@gmail.com', 'fas', 'sda', 'ada', '2032', 'cod', 101822, 'Pending', 1, '2021-04-14 00:35:25'),
(18, 'Faisal', 'asfafsasf@gmail.com', 'SasA', 'Sas', 'asasa', '3453', 'cod', 3185, 'Pending', 1, '2021-04-14 00:37:05'),
(19, 'Faisal', 'asfafsasf@gmail.com', 'hgfss', 'sfasdfada', 'adasd', 'aada', 'cod', 4099, 'Pending', 3, '2021-04-14 00:40:37'),
(20, 'Faisal', 'asfafsasf@gmail.com', 'fsdfsadf', 'sfsdf', 'sfsd', '5200', 'cod', 3250, 'Pending', 3, '2021-04-14 00:46:50'),
(36, 'Atanu', '170204003@aust.edu', '204 no college road', 'Narayanganj', 'Nhs', '1400', 'cod', 429099, 'Success', 5, '2021-04-17 21:55:40'),
(37, 'Dipok Chahar', '170203015@aust.edu', '116 no love road', 'Dhaka', 'Dhs', '2500', 'cod', 195000, 'Pending', 1, '2021-04-17 21:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catagories_id` int(11) NOT NULL,
  `sub_catagories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `long_desc` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catagories_id`, `sub_catagories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `long_desc`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(27, 7, 18, 'Razor DeathAdder', 3500, 3250, 18, '36694798_Razer DeathAdder V2.jpg', 'A quick resposive mouse', 'A quick resposive mouse with 6400 DPI and it has multiple color glowing', 0, 'Razor DeathAdder', 'Mouse,Razor DeathAdder', 'Mouse,Razor DeathAdder', 1),
(28, 5, 11, 'Ryzen 5 3600 Processor', 17000, 16200, 8, '77328780_ryzen-5-3600-228x228.jpg', 'AMD Ryzen 5 3600 Processor Speed: 3.6GHz up to 4.2GHz\r\n,Cache: 35MB C-6 T-12', 'Speed: 3.6GHz up to 4.2GHz\r\n,Cache: L2: 3MB, L3: 32MB\r\n,Cores-6 & Threads-12\r\n,Memory Speed: 3200MHz', 1, 'AMD Ryzen 5 3600 Processor', 'AMD R5 3600', 'AMD, R5-3600, Processor', 1),
(29, 5, 11, 'SAMSUNG 22\" 75Hz Full HD IPS LED Monitor', 11000, 10850, 21, '78884594_lf22t350fhnxza-228x228.jpg', 'SAMSUNG LF22T350FHW 22\" 75Hz Full HD IPS LED Monitor', 'AMD Radeon FreeSync\r\n,Max 75Hz Refresh Rate\r\n,3-sided border-less screen\r\n,Full technicolor experience', 1, 'SAMSUNG 22\" 75Hz Monitor', 'SAMSUNG 22\" 75Hz Full HD IPS LED Monitor', 'SAMSUNG, 75Hz, Monitor', 1),
(30, 7, 17, 'Razer BlackShark V2', 5200, 4099, 3, '28898552_razerkraken.jpg', 'Razer BlackShark V2 Surrounded Sound', '7.1 Surround Sound,\r\nCustom-Tuned 40 mm Drivers\r\n,Bendable Cardioid Microphone', 0, 'Razer BlackShark V2', 'Razer BlackShark V2, 7.1 Surround Sound,', 'Razer,V2', 1),
(31, 5, 11, 'Aigo DarkFlash DLM21 Tempered Glass Micro ATX Gaming Casing', 3000, 2950, 8, '25868796_darkflash-dlm21-3-500x500.jpg', '240mm Water-Cooler Compatible, Tempered Glass', '240mm Water-Cooler Compatible\r\n, USB 3.0 Ready\r\n, Thermal Solution\r\n, Fine Ventilation Performance', 0, 'Aigo DarkFlash DLM21 Micro ATX Gaming Casing', '', 'DarkFlash, Micro ATX', 1),
(32, 6, 12, 'HP Pavilion Gaming 15', 110100, 103900, 6, '77373226_Hp Pavilion Gaming.jpg', 'IntelÂ® Coreâ„¢ i5-10300H Processor\r\n    8 GB DDR4-2933 SDRAM (1 x 8 GB)\r\n    512 GB PCIeÂ® NVMeâ„¢ TLC M.2 SSD', 'IntelÂ® Coreâ„¢ i5-10300H Processor\r\n    8 GB DDR4-2933 SDRAM (1 x 8 GB)\r\n    512 GB PCIeÂ® NVMeâ„¢ TLC M.2 SSD\r\n    NVIDIAÂ® GeForceÂ® GTX 1650 (4 GB GDDR6 dedicated)\r\n    15.6â€³ diagonal FHD, 144 Hz, IPS, anti-glare, micro-edge, WLED-backlit, 250 nits, 45% NTSC (1920 x 1080)\r\n    Windows 10 Home\r\n    2 Years HP Official Warranty', 1, 'HP Pavilion Gaming 15', '', 'HP, Gaming, Laptop', 1),
(33, 7, 18, 'Logitech M720 TRIATHLON Multi Device Bluetooth Mouse', 6200, 5099, 7, '15836518_Logitech M720.jpg', 'Effortless Multi-Computer Workflow  BT Mouse', 'Effortless Multi-Computer Workflow\r\n, Hyper-Fast Scrolling\r\n , Easy-Switch Technology\r\n Durable, Sculpted Design', 0, 'Logitech M720 TRIATHLON', 'Effortless Multi-Computer Workflow\r\n, Hyper-Fast Scrolling', 'Logitech, Mouse', 1),
(34, 7, 19, 'Logitech K400 Plus', 3200, 3000, 2, '41659697_logitechk400.jpg', 'Logitech K400 Plus Keyboard', 'Type : Wireless 33ft\r\n, Dimensions: 5.5 x 13.95 x 0.93 in\r\n, Weight: 1.02 ounces', 0, 'Logitech K400 Plus', 'Logitech K400 Plus , Wireless 33ft', 'Logitech, Keyboard', 1),
(35, 6, 16, 'Dell Alienware Area-51M R2', 260350, 251000, 1, '90938425_alienware-area.jpg', '10th Gen IntelÂ® Coreâ„¢ i7 10700K (8-Core, 16MB Cache, 3.8GHz to 5.1GHz w/Turbo Boost Max 3.0)', '10th Gen IntelÂ® Coreâ„¢ i7 10700K (8-Core, 16MB Cache, 3.8GHz to 5.1GHz w/Turbo Boost Max 3.0)\r\n    32GB Dual Channel DDR4 at 2933MHz; up to 64GB\r\n    1TB RAID 0 (2x 512GB NVMe M.2 PCIe SSDs)\r\n    NVIDIAÂ® GeForceÂ® RTX 2070 SUPERâ„¢ 8GB GDDR6\r\n    17.3â€³ FHD (1920 x 1080) 300Hz 3ms 300-nits 100% sRGB color gamut + Tobii Eyetracking technology\r\n    Windows 10 Home Single Language 64bit\r\n    2 Year Dell Official Warranty', 0, 'Dell Alienware Area-51M R2', '', 'Dell, Alienware, Laptop', 1),
(36, 5, 11, 'Gigabyte Z590 VISION G Intel 10th and 11th Gen ATX Motherboard', 27000, 26100, 2, '77377074_z590-vision-g-500x500.jpg', 'Supports 10th and 11th Gen Intel Core Series Processors', 'Supports 10th and 11th Gen Intel Core Series Processors\r\n, Smart Fan 6\r\n, 4 Ultra-Fast NVMe PCIe\r\n, Effective Cooling Solution', 1, 'Gigabyte Z590', 'Supports 10th and 11th Gen Intel Core Series Processors', 'Gigabyte, ATX Motherboard', 1),
(37, 6, 13, 'Acer Aspire 7', 130900, 123900, 3, '27984329_aspire.jpg', 'IntelÂ® Coreâ„¢ i5 9th Gen processor (6 MB Smart Cache, 1.6 GHz up to 3.4 GHz)', 'IntelÂ® Coreâ„¢ i5 9th Gen processor (6 MB Smart Cache, 1.6 GHz up to 3.4 GHz)\r\n    16 GB RAM\r\n    512GB SSD\r\n    Nvidia GeForce GTX 1660 Ti\r\n    15.6â€³ Full HD 1920 x 1080, high-brightness Acer ComfyViewâ„¢ LEDbacklit LCD\r\n    2 Year Acer Official Warranty', 0, 'Acer Aspire 7', '', 'Acer,Laptop', 1),
(38, 7, 18, 'ASUS P507 ROG Gladius II Core USB Gaming Mouse Black', 3500, 3399, 7, '45521726_ASUS P507 ROG Gladius.jpg', 'Gaming-grade PAW3327 optical sensor', 'ROG-exclusive push-fit switch-socket design\r\n, Intuitive ASUS Armoury II\r\n, Classic ROG Gladius ergonomics\r\n, Gaming-grade PAW3327 optical sensor', 1, 'ASUS P507 ROG Gladius II Core', 'ROG-exclusive push-fit switch-socket design\r\n, Intuitive ASUS Armoury II', 'ROG, Mouse', 1),
(39, 5, 11, 'Lian Li LANCOOL 215 RGB ATX Gaming Case (Black)', 6700, 6200, 5, '96142010_lancool-215-rgb-228x228.jpg', 'RGB ATX, Mesh panel-intakes spanning the front panel', 'Two pre-installed 200MM RGB fans and a 120MM fan\r\n, Mesh panel- intakes spanning the front panel\r\n, Honeycomb vents enable efficient', 0, 'Lian Li LANCOOL 215 RGB ATX Gaming Case', 'Mesh panel- intakes spanning the front panel\r\n, Honeycomb vents enable efficient', 'Lian Li, RGB ATX', 1),
(40, 7, 17, 'Edifier H840', 2100, 2000, 10, '68699558_edifier.jpg', 'Blue Color', 'Frequency: 20Hzï½ž20kHz\r\n, Impedance: 32Î©\r\n, Cable Length: 2.0m', 0, 'Edifier H840', 'Impedance: 32Î©\r\n, Cable Length: 2.0m', 'Headphone,Edifier', 1),
(41, 7, 19, 'GIGABYTE K-85 Gaming Mechanical Blue Keyboard', 6000, 5800, 7, '49653859_gigabyte85gaming.jpg', 'Mechanical Keyboard', 'Type: Mechanical\r\nBacklight: 16.8M Full Spectrum RGB\r\nSwitch Type: Blueability', 0, 'GIGABYTE K-85 Mechanical Keyboard', '', 'Mechanical, Keyboard', 1),
(42, 5, 11, 'MSI MAG CORELIQUID 360R AIO RGB Liquid CPU Cooler', 12500, 12100, 2, '95292243_msi-coreliquid-360r-228x228.jpg', 'Rotatable Blockhead\r\n, Radiator Pump Design', 'Rotatable Blockhead\r\n, Radiator Pump Design\r\n, High Thermal Dissipation\r\n, Pump Motor Resonance Elimination', 0, 'MSI MAG CORELIQUID 360R AIO RGB Liquid CPU Cooler', 'Rotatable Blockhead\r\n, Radiator Pump Design', 'MSI, CPU Cooler', 1),
(43, 7, 17, 'Xiaomi Haylou T19', 2700, 2550, 15, '95884003_xiomihylou.jpg', 'Up to 30hr battery life', 'Up to 30hr battery life\r\n, Operation range: 10m\r\n, Bluetooth 5.0', 1, 'Xiaomi Haylou T19', '', 'Xiaomi, TWS', 1),
(44, 5, 11, 'NZXT H710i Mid-Tower RGB Gaming Casing', 14500, 14000, 3, '32549817_nzxt_h710i-228x228.jpg', 'USB 3.1 Gen 2-compatible USB-C,Four Aer F120mm fans', 'USB 3.1 Gen 2-compatible USB-C\r\n, NZXT CAM\r\n, Four Aer F120mm fans\r\n, Smart Device V2', 0, 'NZXT H710i Mid-Tower RGB Gaming Casing', '', 'NZXT, Micro ATX', 1),
(45, 5, 11, 'Gigabyte 8GB DDR4 2666MHz Heatsink Desktop Ram', 4000, 3700, 4, '82960923_8gb-228x228.png', '8GB, DDR4-2666 MHz', 'Capacity: 8GB\r\n, Frequency: DDR4-2666 MHz\r\n, Timing:16-16-16-35\r\n, Voltage:1.2V', 0, 'Gigabyte 8GB DDR4 2666MHz', '', 'Gigabyte, RAM', 1),
(46, 7, 18, 'A4tech OP-620D 2X Click Optical Mouse', 350, 299, 25, '71538903_a4tech.jpg', 'Wired, Symmetric', 'Type: Wired\r\n, rgonomic Design: Symmetric\r\n, Sensor: Optical\r\n#Resolution: 1000 DPI', 0, 'A4tech Optical Mouse', 'A4tech Optical Mouse', 'A4tech, Mouse', 1),
(47, 6, 14, 'Apple MacBook Pro 13.3-Inch Retina', 135000, 133500, 3, '65816114_apple.jpg', 'Apple M1 chip with 8-core CPU and 8-core GPU,16GB,1TB', 'Apple M1 chip with 8-core CPU and 8-core GPU\r\n,16GB RAM\r\n,1TB SSD\r\n,13.3-inch 2560x1600 LED-backlit Retina Display', 1, 'Apple MacBook Pro 13.3-Inch Retina', '', 'Apple M1, MacBook Pro', 1),
(48, 6, 16, 'MSI Stealth GS75 10SF', 268, 258, 4, '76083498_MSI GS Series GS75 Stealth(1).jpg', 'IntelÂ® Coreâ„¢ i7-10875H Processor,16GB DDR4 (8GB*2) 2666MHz, 1TB', 'IntelÂ® Coreâ„¢ i7-10875H Processor\r\n    16GB DDR IV (8GB*2) 2666MHz Ram\r\n    1TB NVMe PCIe Gen3x4 SSD\r\n    NVIDIAÂ® GeForce RTXâ„¢ 2070 With Max-Q Design, 8GB GDDR6\r\n    17.3â€³ FHD (1920*1080), 240Hz Thin Bezel, close to 100%Srgb\r\n    Windows 10 Home\r\n    2 Years MSI Warranty', 0, 'MSI Stealth GS75 10SF', '', 'MSI , Laptop', 1),
(49, 7, 19, 'Razer Huntsman', 10000, 9880, 9, '59991764_razorhuntsman.jpg', 'Onboard Memory, Standard Bottom Row Layou', 'Onboard Memory, Standard Bottom Row Layou\r\n, 100 million keystroke lifespan\r\n, Doubleshot PBT Keycaps\r\n, Razer Linear Optical Switch', 0, 'Razer Huntsman', '', 'Razer, Keyboard', 1),
(50, 5, 11, 'Asus TUF Gaming H470-Pro Wi-Fi 10th Gen ATX Motherboard', 16200, 16000, 4, '39481654_b550-a-pro-500x500.jpg', 'Build in Intel Socket 1200 for 10th Gen Intel Core, Pent Gold and Celeron Processors', 'Build in Intel Socket 1200 for 10th Gen Intel Core, Pent Gold and Celeron Processors\r\n, Next-gen connectivity\r\n, Made for online gaming', 0, 'Asus TUF Gaming ATX Motherboard', '', 'Asus, Motherboard', 1),
(51, 5, 9, 'Apple iMac 21.5-inch 4K Retina Display', 151000, 148500, 2, '94683695_appleimac.jpg', '3.6GHz quad-core 8th-Gen Intel Core i3 Processor', '3.6GHz quad-core 8th-Gen Intel Core i3 Processor\r\n,8GB RAM + 256GB SSD\r\n,Retina 4K 4096 x 2304 P3 display\r\n,Radeon Pro 555X 2GB Graphics', 0, 'Apple iMac 21.5-inch 4K Retina Display', '', 'Apple, iMac', 1),
(52, 7, 17, 'A4Tech Bloody G350 RGB', 2200, 2150, 4, '13530375_a4techbloody.jpg', '7.1 Virtual Sound', '7.1 Virtual Sound\r\n, Single-Directional Mic\r\n, Braided Tangle-Free Cable', 0, 'A4Tech Bloody G350 RGB', '', 'A4Tech, Headphone', 1),
(53, 7, 20, 'SanDisk Ixpand Mini 64GB', 3400, 3250, 18, '81870362_sandisk.jpg', 'Capacity 64GB', 'Capacity 64GB\r\n, Shoot photo/ video with direct save to iXpand Mini\r\n, Directly to the iXpand', 0, 'SanDisk Ixpand Mini 64GB', '', 'SanDisk, 64GB Pendrive', 1),
(54, 7, 20, 'Apacer AH360 64GB USB', 800, 750, 21, '83677967_apacer.jpg', 'Capacity 64GB', 'Capacity 64GB\r\n,Interface USB 3.1 Gen 1\r\n,Weight 6.7g', 0, 'Apacer AH360 64GB USB', '', 'Apacer , 64GB USB, Pendrive', 1),
(55, 5, 11, 'AMD Ryzen 9 5900X Processor', 55000, 53500, 3, '38047516_r5-5600x-001-228x228.jpg', 'Speed: 3.7GHz Up to 4.8GHz\r\n, L2 Cache: 6MB, L3 Cache: 64MB C-12 T-24', 'Speed: 3.7GHz Up to 4.8GHz\r\n, L2 Cache: 6MB, L3 Cache: 64MB\r\n, Cores: 12, Threads: 24\r\n, Up to 3200MHz DDR4', 1, 'AMD Ryzen 9 5900X Processor', '', 'AMD, R9, Processor', 1),
(56, 6, 12, 'HP OMEN 15', 152900, 149000, 5, '73039520_Hp-omen-15.jpg', 'AMD Ryzenâ„¢ 7 4800H Processor ,16 GB DDR4-3200 SDRAM (2 x 8 GB)\r\n1 TB PCIe', 'AMD Ryzenâ„¢ 7 4800H Processor\r\n    16 GB DDR4-3200 SDRAM (2 x 8 GB)\r\n    1 TB PCIeÂ® NVMeâ„¢ M.2 SSD\r\n    NVIDIAÂ® GeForce RTXâ„¢ 2060 (6 GB GDDR6 dedicated)\r\n    15.6â€³ FHD (1920 x 1080), 144 Hz, 7 ms response time, IPS, micro-edge, anti-glare, 300 nits, 72% NTSC\r\n    Windows 10 Home\r\n    2 Years HP Official Warranty', 0, 'HP OMEN 15', '', 'HP, OMEN', 1),
(57, 5, 11, 'Samsung 970 EVO Plus 500GB NVMe M.2 SSD', 9000, 8700, 5, '45260753_970-evo-plus-228x228.jpg', 'Capacity 500GB', 'Capacity 500GB\r\n, Form Factor M.2 (2280)\r\n, PCIe Gen 3.0 x 4, NVMe 1.3\r\n, Samsung V-NAND 3-bit MLC', 1, 'Samsung 970 EVO Plus 500GB NVMe M.2 SSD', '', 'Samsung, NVMe M.2, SSD', 1),
(58, 5, 11, 'G.Skill Trident Z RGB 8GB DDR4 3200MHz Gaming Desktop RAM', 5000, 4700, 8, '40149753_trident-z-rgb-8gb-1-228x228.jpg', 'XMP 2.0 Support\r\n, Full Range RGB Support', 'XMP 2.0 Support\r\n, Full Range RGB Support\r\n, Exceptionally Engineered\r\n, Trident Z Means Overclocking', 1, 'G.Skill Trident Z RGB 8GB DDR4 3200MHz RAM', '', 'G.Skill, Trident Z, RAM', 1),
(59, 6, 12, 'Asus TUF Dash F15 FX516PM', 162000, 155500, 2, '57333990_Asus Tuf.jpg', 'IntelÂ® Coreâ„¢ i7-11370H Processor 3.3 GHz, 4 cores\r\n    8GB DDR4 3200mhz (1 x 8GB)\r\n    512GB PCIeÂ® NVMeâ„¢ M.2 SSD', 'IntelÂ® Coreâ„¢ i7-11370H Processor 3.3 GHz, 4 cores\r\n    8GB DDR4 3200mhz (1 x 8GB)\r\n    512GB PCIeÂ® NVMeâ„¢ M.2 SSD\r\n    NVIDIA GeForce RTX 3060 6GB GDDR6\r\n    15.6â€³ FHD 144Hz IPS Level Anti-Glare 1920*1080 and 250 nits\r\n    Windows 10 Home\r\n    2 Years Asus Official Warranty', 0, 'Asus TUF Dash F15 FX516PM', '', 'Asus TUF, Laptop', 1),
(60, 5, 11, 'Intel 10th Gen Core i5-10400F Processor', 14500, 14000, 7, '76176475_i5-10400-1-228x228.jpg', 'Clock Speed:2.90 GHz up to 4.30 GHz', 'Clock Speed:2.90 GHz up to 4.30 GHz\r\n# Cores-6 & Threads-12\r\n# 12 MB SmartCache\r\n# Memory Types: DDR4-2666', 0, 'Intel 10th Gen Core i5-10400F Processor', '', 'Intel, 10th Gen, i5-10400F, Processor', 1),
(61, 0, 0, 'Corsair CV450 450Watt 80 Plus Bronze Certified Power Supply', 3700, 3500, 4, '32529714_cv450-228x228.jpg', '80 PLUS Bronze certified', '80 PLUS Bronze certified\r\n# 88% Ultra-Efficient, Compact design\r\n# Continuous, Reliable Output\r\n# Low-noise Operation, Stealth Mode', 0, 'Corsair CV450 450Watt 80 Plus Bronze Certified Power Supply', '', 'Corsair, CV450, 80 Plus Bronze, Power Supply', 1),
(62, 6, 15, 'Lenovo Legion 5', 159000, 145500, 2, '31475427_legion-5.jpg', 'AMD Ryzen 7 4800H Processor', 'AMD Ryzen 7 4800H Processor\r\n    16GB (2*8GB) SO-DIMM DDR4-3200 Ram\r\n    512GB SSD M.2 2280 PCIe NVMe\r\n    NVIDIA GeForce RTX 2060 6GB GDDR6\r\n    15.6â€³ FHD (1920Ã—1080) IPS 300nits Anti-glare, 144Hz, 100% sRGB, Dolby Vision\r\n    Windows 10 Home\r\n    2 Years Lenovo Premium Warranty', 0, 'Lenovo Legion 5', '', 'Lenovo, Legion, Laptop', 1),
(63, 5, 11, 'Zotac Gaming GeForce GTX 1650 Super 4GB GDDR6 Twin Fan Graphics Card', 17000, 16700, 4, '98174169_geforce-gtx-1650-super-228x228.jpg', 'Super Compact', 'Super Compact\r\n# 4K and HDR Read\r\n# Dual Fan\r\n# FireStorm Utility', 0, 'Zotac Gaming GeForce GTX 1650 Super 4GB GDDR6', '', 'Zotac,  GTX 1650 Super, 4GB GDDR6', 1),
(64, 6, 12, 'Asus ROG Strix Scar III', 21900, 205000, 4, '38889507_Asus ROG Strix Scar III.png', 'IntelÂ® Coreâ„¢ i7-9750H Processor\r\n    16GB DDR4 2666MHz Ram\r\n    PCIE NVME 512GB M.2 SSD + 1TB HDD', 'IntelÂ® Coreâ„¢ i7-9750H Processor\r\n    16GB DDR4 2666MHz Ram\r\n    PCIE NVME 512GB M.2 SSD + 1TB HDD\r\n    NVIDIA GeForce RTX 2070 GDDR6 8GB\r\n    15.6-inch Full HD (1920Ã—1080) IPS-level panel, 240Hz, 3ms, 100% sRGB\r\n    Windows 10 Home\r\n    2 Years Asus Global Warranty', 0, 'Asus ROG Strix Scar III', '', 'Asus, ROG Strix, Scar III', 1),
(65, 6, 12, 'Razer Blade 15', 200000, 195000, 5, '16410324_blade-15-base-model-core-i7-10th-gen-2-500x500.jpg', 'Core i7 10th Gen 512GB SSD RTX 2060 6GB Graphics 15.6', 'Model: Razer Blade 15 Base Model Core i7 10th Gen\r\nIntel Core i7-10750H Processor (12M Cache, 2.60 GHz up to 5.00 GHz)\r\n16GB DDR4 Ram +512GB SSD\r\nNVIDIA RTX 2060 6GB Graphics\r\n15.6\" FHD(1920 x 1080), 144Hz Display', 0, 'Razer Blade 15', 'Razer Blade 15', 'Razer Blade 15', 1),
(75, 6, 12, 'Acer Nitro 7', 113000, 110000, 4, '17368186_acer-nitro-7-an715-51-510a-laptop-2-500x500.jpg', '9th Gen Core i5 (256GB SSD + 1TB HDD) 15.6\"', 'Model: Acer Nitro 7 AN715-51 510A\r\nIntel 9th Gen Core i5 9300H Processor 8M Cache, up to 4.10 GHz\r\n8 GB DDR4 Ram\r\n256GB SSD + 1TB HDD\r\nGTX 1660 Ti 6GB Graphics', 1, 'Acer Nitro 7', 'Acer Nitro 7', 'Acer Nitro 7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagories`
--

CREATE TABLE `sub_catagories` (
  `id` int(11) NOT NULL,
  `catagories_id` int(11) NOT NULL,
  `sub_catagories` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_catagories`
--

INSERT INTO `sub_catagories` (`id`, `catagories_id`, `sub_catagories`, `status`) VALUES
(8, 5, 'Gaming PC', 1),
(9, 5, 'Mac PC', 1),
(10, 5, 'Brand PC', 1),
(11, 5, 'Desktop Components', 1),
(12, 6, 'Gaming', 1),
(13, 6, 'Ultrabook', 1),
(14, 6, 'Mac book', 1),
(15, 6, 'Surface book', 1),
(16, 6, 'Premium', 1),
(17, 7, 'Headphone', 1),
(18, 7, 'Mouse', 1),
(19, 7, 'Keyboard', 1),
(20, 7, 'Pendrive', 1),
(23, 5, 'Sound Box', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_sign_up`
--

CREATE TABLE `user_sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sign_up`
--

INSERT INTO `user_sign_up` (`id`, `name`, `email`, `password`) VALUES
(1, 'Faisal', 'asfafsasf@gmail.com', '781e5e245d69b566979b86e28d23f2c7'),
(4, 'Mahin', '170204006@gmail.com', '0b0670210172f1640a6b45847a2c2a7b'),
(5, 'Tonmoy', '170204025@gmail.com', '4cebabba8a332d99b0ffe02f893583a4'),
(6, 'Sadman', 'Sadman@gmail.com', 'd964173dc44da83eeafa3aebbee9a1a0'),
(7, 'Anwar', 'anwar@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(9, 'Sakib', '170204026@aust.edu', 'eb62f6b9306db575c2d596b1279627a4'),
(18, 'Atanu', '170204003@aust.edu', '56ff030f6a4adf775d170d345d36d555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `after_order`
--
ALTER TABLE `after_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_user_info`
--
ALTER TABLE `order_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_catagories`
--
ALTER TABLE `sub_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sign_up`
--
ALTER TABLE `user_sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `after_order`
--
ALTER TABLE `after_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_user_info`
--
ALTER TABLE `order_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sub_catagories`
--
ALTER TABLE `sub_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_sign_up`
--
ALTER TABLE `user_sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
