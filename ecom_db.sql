-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 18, 2021 at 12:04 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Phone'),
(3, 'Camera'),
(4, 'Laptop'),
(7, 'Accessories'),
(8, 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(89, 30, '5J658223V1399304T', 'COMPLETED', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_short_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_image`, `product_short_description`) VALUES
(18, 'iPhone 12 Pro Max ', 1, 740, 100, 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition with the possibility of a few light hair marks. It will NOT come in its original packaging but will include a certified cable and UL approved power adapter. Headsets, SIM card and manual are NOT included. 5G speed. A14 Bionic, the fastest chip in a smartphone. An edge-to-edge OLED display. Ceramic Shield with four times better drop performance. And Night mode on every camera. iPhone 12 has it all.', 'img-1.jpg', 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition.'),
(19, 'Samsung A9', 1, 999, 100, 'Contour Cut Camera Design\r\nThe real metal finish on the main camera adds unity to the design and accentuates the luxury of the haze texture. It’s an iconic new camera design made to turn heads.\r\n\r\nHigh Resolution\r\nGet amazingly clear, high-quality photos with the large 64MP sensor. Even in dark situations, it takes in plenty of light to get the rich image quality. It’s all in the details. Galaxy S21 5G operates in conjunction with a Sony image sensor.\r\n\r\nSpace Zoom\r\nWith Hybrid Optic Zoom and enhanced Super Resolution you can zoom up to 30X2 with clarity and precision.3 And the new Zoom Lock helps stabilize your shots.\r\n\r\n8K Video\r\nGet cinema quality video in the palm of your hands. Capture incredible detail in 8K resolution with super smooth action at 24 frames per second.', 'img-2.jpeg', 'Samsung Galaxy S21 5G Android smartphone. Announced Jan 2021. Features 6.2″ display, Exynos 2100.'),
(20, 'GoPro HERO 9', 3, 400, 10, 'More resolution.\r\nShoot stunning 5K video that maintains serious detail even when zooming in and capturing 14.7MP frame grabs. Also records in 4K, 2.7K, 1440p and 1080p.\r\n\r\nMore pixels.\r\nCapture crisp, pro-quality 20MP photos—and use SuperPhoto to make sure you get the shot.\r\n\r\nMax Lens Mod\r\nThe new Max Lens Mod delivers unbreakable Max HyperSmooth stabilization and Max SuperView, Our widest-angle perspective yet.', 'GoPro-HERO-9-Review.jpeg', 'Includes Free Extra Battery + Free 64GB SD Card,\r\nwhile supplies last.'),
(21, 'Surface Pro X    ', 4, 1799, 20, 'With Microsoft SQ® 1 and new Microsoft SQ® 2 chipsets, blazing-fast LTE connectivity,³ our thinnest Surface features two USB-C® ports and a stunning, virtually edge-to-edge 13” touchscreen, plus new choice of colors.⁶ Surface Pro X Keyboard and rechargeable Surface Slim Pen sold separately.*\r\n\r\nOur promise to Surface customers\r\nMicrosoft Store offers 60-day returns on Surface products plus free expert help, digital workshops, and remote learning opportunities. Our online associates will provide free personal assistance to help you get the right Surface for your needs.**', 'surfface.jpeg', 'The 2-in-1 laptop with always-on LTE, & new Microsoft SQ® 2 processors, 13” touchscreen, & all-day battery life.'),
(22, 'Razer Blade 15', 4, 2000, 10, 'More power:The 10th Gen Intel Core i7-10750H processor provides the ultimate level of performance with up to 5.0 GHz max turbo and 6 cores.\r\nRay-tracing: The NVIDIA GeForce RTX 2060 is powered by the NVIDIA Turing GPU architecture and brings cinematic-quality rendering to the most visually intense games.\r\nMore frames: Incredible performance paired with the fast 144Hz 15. 6\" full HD thin bezel display helps edge out the win.\r\nThin and compact: The CNC aluminum unibody frame houses incredible performance in the most compact footprint possible, while remaining remarkably durable and just 0.78\" thin.\r\nReady to connect: Fully loaded with Wi-Fi 6, Gigabit Ethernet, Thunderbolt 3, USB type-A and type-C ports, and HDMI, for a desktop-class experience\r\nMake it yours: Customize the backlight color of the keyboard with Razer Chroma, and expand the memory and storage, making the Razer Blade 15 uniquely yours.', 'razer.jpeg', 'Get Razer Blade 15 now'),
(23, 'Hyper X Cloud II ', 7, 150, 100, 'The HyperX Cloud was built to be an ultra-comfortable gaming headset with amazing sound. We put a lot of thought into the details of our HyperX signature memory foam, the premium leatherette, clamping force, and weight distribution to create a headset that’s comfortable through long gaming sessions. It’s no wonder that it’s become the preferred gaming headset for millions of gamers. Whether you want to focus on the competition or relax with some of your favorite games, there’s a Cloud that’s perfect for you.', 'hyperx.jpeg', 'If there was one thing holding back the HyperX Cloud Flight from claiming the number one spot.'),
(24, 'Green Shirt', 8, 10, 100, 'A shirt is a cloth garment for the upper body (from the neck to the waist). ... In British English, a shirt is more specifically a garment with a collar, sleeves with cuffs, and a full vertical opening with buttons or snaps (North Americans would call that a \"dress shirt\", a specific type of collared shirt).', 'green-shirt.jpeg', 'Get in style today with TosTinh'),
(25, 'iPhone 12 Pro Max ', 1, 740, 100, 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition with the possibility of a few light hair marks. It will NOT come in its original packaging but will include a certified cable and UL approved power adapter. Headsets, SIM card and manual are NOT included. 5G speed. A14 Bionic, the fastest chip in a smartphone. An edge-to-edge OLED display. Ceramic Shield with four times better drop performance. And Night mode on every camera. iPhone 12 has it all.', 'img-1.jpg', 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition.'),
(26, 'Samsung A9', 1, 999, 100, 'Contour Cut Camera Design\r\nThe real metal finish on the main camera adds unity to the design and accentuates the luxury of the haze texture. It’s an iconic new camera design made to turn heads.\r\n\r\nHigh Resolution\r\nGet amazingly clear, high-quality photos with the large 64MP sensor. Even in dark situations, it takes in plenty of light to get the rich image quality. It’s all in the details. Galaxy S21 5G operates in conjunction with a Sony image sensor.\r\n\r\nSpace Zoom\r\nWith Hybrid Optic Zoom and enhanced Super Resolution you can zoom up to 30X2 with clarity and precision.3 And the new Zoom Lock helps stabilize your shots.\r\n\r\n8K Video\r\nGet cinema quality video in the palm of your hands. Capture incredible detail in 8K resolution with super smooth action at 24 frames per second.', 'img-2.jpeg', 'Samsung Galaxy S21 5G Android smartphone. Announced Jan 2021. Features 6.2″ display, Exynos 2100.'),
(27, 'GoPro HERO 9', 3, 400, 10, 'More resolution.\r\nShoot stunning 5K video that maintains serious detail even when zooming in and capturing 14.7MP frame grabs. Also records in 4K, 2.7K, 1440p and 1080p.\r\n\r\nMore pixels.\r\nCapture crisp, pro-quality 20MP photos—and use SuperPhoto to make sure you get the shot.\r\n\r\nMax Lens Mod\r\nThe new Max Lens Mod delivers unbreakable Max HyperSmooth stabilization and Max SuperView, Our widest-angle perspective yet.', 'GoPro-HERO-9-Review.jpeg', 'Includes Free Extra Battery + Free 64GB SD Card,\r\nwhile supplies last.'),
(28, 'Surface Pro X    ', 4, 1799, 20, 'With Microsoft SQ® 1 and new Microsoft SQ® 2 chipsets, blazing-fast LTE connectivity,³ our thinnest Surface features two USB-C® ports and a stunning, virtually edge-to-edge 13” touchscreen, plus new choice of colors.⁶ Surface Pro X Keyboard and rechargeable Surface Slim Pen sold separately.*\r\n\r\nOur promise to Surface customers\r\nMicrosoft Store offers 60-day returns on Surface products plus free expert help, digital workshops, and remote learning opportunities. Our online associates will provide free personal assistance to help you get the right Surface for your needs.**', 'surfface.jpeg', 'The 2-in-1 laptop with always-on LTE, & new Microsoft SQ® 2 processors, 13” touchscreen, & all-day battery life.'),
(29, 'Razer Blade 15', 4, 2000, 10, 'More power:The 10th Gen Intel Core i7-10750H processor provides the ultimate level of performance with up to 5.0 GHz max turbo and 6 cores.\r\nRay-tracing: The NVIDIA GeForce RTX 2060 is powered by the NVIDIA Turing GPU architecture and brings cinematic-quality rendering to the most visually intense games.\r\nMore frames: Incredible performance paired with the fast 144Hz 15. 6\" full HD thin bezel display helps edge out the win.\r\nThin and compact: The CNC aluminum unibody frame houses incredible performance in the most compact footprint possible, while remaining remarkably durable and just 0.78\" thin.\r\nReady to connect: Fully loaded with Wi-Fi 6, Gigabit Ethernet, Thunderbolt 3, USB type-A and type-C ports, and HDMI, for a desktop-class experience\r\nMake it yours: Customize the backlight color of the keyboard with Razer Chroma, and expand the memory and storage, making the Razer Blade 15 uniquely yours.', 'razer.jpeg', 'Get Razer Blade 15 now'),
(30, 'Hyper X Cloud II ', 7, 150, 100, 'The HyperX Cloud was built to be an ultra-comfortable gaming headset with amazing sound. We put a lot of thought into the details of our HyperX signature memory foam, the premium leatherette, clamping force, and weight distribution to create a headset that’s comfortable through long gaming sessions. It’s no wonder that it’s become the preferred gaming headset for millions of gamers. Whether you want to focus on the competition or relax with some of your favorite games, there’s a Cloud that’s perfect for you.', 'hyperx.jpeg', 'If there was one thing holding back the HyperX Cloud Flight from claiming the number one spot.'),
(31, 'Green Shirt', 8, 10, 100, 'A shirt is a cloth garment for the upper body (from the neck to the waist). ... In British English, a shirt is more specifically a garment with a collar, sleeves with cuffs, and a full vertical opening with buttons or snaps (North Americans would call that a \"dress shirt\", a specific type of collared shirt).', 'green-shirt.jpeg', 'Get in style today with TosTinh'),
(32, 'iPhone 12 Pro Max ', 1, 740, 100, 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition with the possibility of a few light hair marks. It will NOT come in its original packaging but will include a certified cable and UL approved power adapter. Headsets, SIM card and manual are NOT included. 5G speed. A14 Bionic, the fastest chip in a smartphone. An edge-to-edge OLED display. Ceramic Shield with four times better drop performance. And Night mode on every camera. iPhone 12 has it all.', 'img-1.jpg', 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition.'),
(33, 'Samsung A9', 1, 999, 100, 'Contour Cut Camera Design\r\nThe real metal finish on the main camera adds unity to the design and accentuates the luxury of the haze texture. It’s an iconic new camera design made to turn heads.\r\n\r\nHigh Resolution\r\nGet amazingly clear, high-quality photos with the large 64MP sensor. Even in dark situations, it takes in plenty of light to get the rich image quality. It’s all in the details. Galaxy S21 5G operates in conjunction with a Sony image sensor.\r\n\r\nSpace Zoom\r\nWith Hybrid Optic Zoom and enhanced Super Resolution you can zoom up to 30X2 with clarity and precision.3 And the new Zoom Lock helps stabilize your shots.\r\n\r\n8K Video\r\nGet cinema quality video in the palm of your hands. Capture incredible detail in 8K resolution with super smooth action at 24 frames per second.', 'img-2.jpeg', 'Samsung Galaxy S21 5G Android smartphone. Announced Jan 2021. Features 6.2″ display, Exynos 2100.'),
(34, 'GoPro HERO 9', 3, 400, 10, 'More resolution.\r\nShoot stunning 5K video that maintains serious detail even when zooming in and capturing 14.7MP frame grabs. Also records in 4K, 2.7K, 1440p and 1080p.\r\n\r\nMore pixels.\r\nCapture crisp, pro-quality 20MP photos—and use SuperPhoto to make sure you get the shot.\r\n\r\nMax Lens Mod\r\nThe new Max Lens Mod delivers unbreakable Max HyperSmooth stabilization and Max SuperView, Our widest-angle perspective yet.', 'GoPro-HERO-9-Review.jpeg', 'Includes Free Extra Battery + Free 64GB SD Card,\r\nwhile supplies last.'),
(35, 'Surface Pro X    ', 4, 1799, 20, 'With Microsoft SQ® 1 and new Microsoft SQ® 2 chipsets, blazing-fast LTE connectivity,³ our thinnest Surface features two USB-C® ports and a stunning, virtually edge-to-edge 13” touchscreen, plus new choice of colors.⁶ Surface Pro X Keyboard and rechargeable Surface Slim Pen sold separately.*\r\n\r\nOur promise to Surface customers\r\nMicrosoft Store offers 60-day returns on Surface products plus free expert help, digital workshops, and remote learning opportunities. Our online associates will provide free personal assistance to help you get the right Surface for your needs.**', 'surfface.jpeg', 'The 2-in-1 laptop with always-on LTE, & new Microsoft SQ® 2 processors, 13” touchscreen, & all-day battery life.'),
(36, 'Razer Blade 15', 4, 2000, 10, 'More power:The 10th Gen Intel Core i7-10750H processor provides the ultimate level of performance with up to 5.0 GHz max turbo and 6 cores.\r\nRay-tracing: The NVIDIA GeForce RTX 2060 is powered by the NVIDIA Turing GPU architecture and brings cinematic-quality rendering to the most visually intense games.\r\nMore frames: Incredible performance paired with the fast 144Hz 15. 6\" full HD thin bezel display helps edge out the win.\r\nThin and compact: The CNC aluminum unibody frame houses incredible performance in the most compact footprint possible, while remaining remarkably durable and just 0.78\" thin.\r\nReady to connect: Fully loaded with Wi-Fi 6, Gigabit Ethernet, Thunderbolt 3, USB type-A and type-C ports, and HDMI, for a desktop-class experience\r\nMake it yours: Customize the backlight color of the keyboard with Razer Chroma, and expand the memory and storage, making the Razer Blade 15 uniquely yours.', 'razer.jpeg', 'Get Razer Blade 15 now'),
(37, 'Hyper X Cloud II ', 7, 150, 100, 'The HyperX Cloud was built to be an ultra-comfortable gaming headset with amazing sound. We put a lot of thought into the details of our HyperX signature memory foam, the premium leatherette, clamping force, and weight distribution to create a headset that’s comfortable through long gaming sessions. It’s no wonder that it’s become the preferred gaming headset for millions of gamers. Whether you want to focus on the competition or relax with some of your favorite games, there’s a Cloud that’s perfect for you.', 'hyperx.jpeg', 'If there was one thing holding back the HyperX Cloud Flight from claiming the number one spot.'),
(38, 'Green Shirt', 8, 10, 100, 'A shirt is a cloth garment for the upper body (from the neck to the waist). ... In British English, a shirt is more specifically a garment with a collar, sleeves with cuffs, and a full vertical opening with buttons or snaps (North Americans would call that a \"dress shirt\", a specific type of collared shirt).', 'green-shirt.jpeg', 'Get in style today with TosTinh'),
(39, 'iPhone 12 Pro Max ', 1, 740, 100, 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition with the possibility of a few light hair marks. It will NOT come in its original packaging but will include a certified cable and UL approved power adapter. Headsets, SIM card and manual are NOT included. 5G speed. A14 Bionic, the fastest chip in a smartphone. An edge-to-edge OLED display. Ceramic Shield with four times better drop performance. And Night mode on every camera. iPhone 12 has it all.', 'img-1.jpg', 'This iPhone 12 is Certified Refurbished. It is 100% functional and in near perfect cosmetic condition.'),
(40, 'Samsung A9', 1, 999, 100, 'Contour Cut Camera Design\r\nThe real metal finish on the main camera adds unity to the design and accentuates the luxury of the haze texture. It’s an iconic new camera design made to turn heads.\r\n\r\nHigh Resolution\r\nGet amazingly clear, high-quality photos with the large 64MP sensor. Even in dark situations, it takes in plenty of light to get the rich image quality. It’s all in the details. Galaxy S21 5G operates in conjunction with a Sony image sensor.\r\n\r\nSpace Zoom\r\nWith Hybrid Optic Zoom and enhanced Super Resolution you can zoom up to 30X2 with clarity and precision.3 And the new Zoom Lock helps stabilize your shots.\r\n\r\n8K Video\r\nGet cinema quality video in the palm of your hands. Capture incredible detail in 8K resolution with super smooth action at 24 frames per second.', 'img-2.jpeg', 'Samsung Galaxy S21 5G Android smartphone. Announced Jan 2021. Features 6.2″ display, Exynos 2100.'),
(41, 'GoPro HERO 9', 3, 400, 10, 'More resolution.\r\nShoot stunning 5K video that maintains serious detail even when zooming in and capturing 14.7MP frame grabs. Also records in 4K, 2.7K, 1440p and 1080p.\r\n\r\nMore pixels.\r\nCapture crisp, pro-quality 20MP photos—and use SuperPhoto to make sure you get the shot.\r\n\r\nMax Lens Mod\r\nThe new Max Lens Mod delivers unbreakable Max HyperSmooth stabilization and Max SuperView, Our widest-angle perspective yet.', 'GoPro-HERO-9-Review.jpeg', 'Includes Free Extra Battery + Free 64GB SD Card,\r\nwhile supplies last.'),
(42, 'Surface Pro X    ', 4, 1799, 20, 'With Microsoft SQ® 1 and new Microsoft SQ® 2 chipsets, blazing-fast LTE connectivity,³ our thinnest Surface features two USB-C® ports and a stunning, virtually edge-to-edge 13” touchscreen, plus new choice of colors.⁶ Surface Pro X Keyboard and rechargeable Surface Slim Pen sold separately.*\r\n\r\nOur promise to Surface customers\r\nMicrosoft Store offers 60-day returns on Surface products plus free expert help, digital workshops, and remote learning opportunities. Our online associates will provide free personal assistance to help you get the right Surface for your needs.**', 'surfface.jpeg', 'The 2-in-1 laptop with always-on LTE, & new Microsoft SQ® 2 processors, 13” touchscreen, & all-day battery life.'),
(43, 'Razer Blade 15', 4, 2000, 10, 'More power:The 10th Gen Intel Core i7-10750H processor provides the ultimate level of performance with up to 5.0 GHz max turbo and 6 cores.\r\nRay-tracing: The NVIDIA GeForce RTX 2060 is powered by the NVIDIA Turing GPU architecture and brings cinematic-quality rendering to the most visually intense games.\r\nMore frames: Incredible performance paired with the fast 144Hz 15. 6\" full HD thin bezel display helps edge out the win.\r\nThin and compact: The CNC aluminum unibody frame houses incredible performance in the most compact footprint possible, while remaining remarkably durable and just 0.78\" thin.\r\nReady to connect: Fully loaded with Wi-Fi 6, Gigabit Ethernet, Thunderbolt 3, USB type-A and type-C ports, and HDMI, for a desktop-class experience\r\nMake it yours: Customize the backlight color of the keyboard with Razer Chroma, and expand the memory and storage, making the Razer Blade 15 uniquely yours.', 'razer.jpeg', 'Get Razer Blade 15 now'),
(44, 'Hyper X Cloud II ', 7, 150, 100, 'The HyperX Cloud was built to be an ultra-comfortable gaming headset with amazing sound. We put a lot of thought into the details of our HyperX signature memory foam, the premium leatherette, clamping force, and weight distribution to create a headset that’s comfortable through long gaming sessions. It’s no wonder that it’s become the preferred gaming headset for millions of gamers. Whether you want to focus on the competition or relax with some of your favorite games, there’s a Cloud that’s perfect for you.', 'hyperx.jpeg', 'If there was one thing holding back the HyperX Cloud Flight from claiming the number one spot.'),
(45, 'Green Shirt', 8, 10, 100, 'A shirt is a cloth garment for the upper body (from the neck to the waist). ... In British English, a shirt is more specifically a garment with a collar, sleeves with cuffs, and a full vertical opening with buttons or snaps (North Americans would call that a \"dress shirt\", a specific type of collared shirt).', 'green-shirt.jpeg', 'Get in style today with TosTinh');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_title`, `product_price`, `product_quantity`) VALUES
(1, 31, '89', 'Green Shirt', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` text NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(7, '50% discount', 'artem-beliaikin-cE8cwN2A2-c-unsplash.jpg'),
(8, 'Gift', 'tamanna-rumee-oH8IotAXu7M-unsplash.jpg'),
(9, 'Clothes Sales', 'sale-clothes.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(4, 'admin', 'admin@tostinh.com', '123'),
(5, 'thean', 'thean@tostinh.cpm', '123'),
(6, 'seth', 'seth@tostinh.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
