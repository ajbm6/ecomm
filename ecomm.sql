-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 03:25 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecomm`
--
DROP DATABASE `ecomm`;
CREATE DATABASE IF NOT EXISTS `ecomm` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ecomm`;

-- ---------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptops', '2014-11-07 23:42:46', '2014-11-07 23:42:46'),
(2, 'Desktop PC', '2014-11-07 23:43:58', '2014-11-07 23:43:58'),
(3, 'Smart Phones', '2014-11-07 23:44:13', '2014-11-07 23:44:13'),
(4, 'Tablets', '2014-11-07 23:44:31', '2014-11-07 23:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_08_064928_create_categories_table', 1),
('2014_11_09_065720_create_products_table', 2),
('2014_12_08_003133_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dell Laptop', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dolore delectus cum explicabo ipsa nemo!', '17999.75', 1, 'img/products/2014-11-21-160510-laptop-upload.jpg', '2014-11-21 08:05:10', '2014-11-21 08:05:10'),
(2, 2, 'Dell Desktop', 'Commodi perspiciatis, odit repudiandae voluptatem laborum magni explicabo quo? Commodi dolorum saepe ipsa ratione fuga!', '10999.75', 1, 'img/products/2014-11-21-160633-desktop-upload.jpg', '2014-11-21 08:06:33', '2014-11-21 08:06:33'),
(3, 2, 'Gateway Desktop', 'Ratione voluptates dolores magni molestias tempore, architecto qui, nulla doloribus, explicabo voluptatum earum atque ad.', '11999.75', 1, 'img/products/2014-11-21-160849-desktop-upload.jpg', '2014-11-21 08:08:49', '2014-11-21 08:08:49'),
(4, 1, 'HP Laptop', 'Non, nesciunt? Perferendis sit quis, blanditiis eos voluptate sed assumenda, dolorem dignissimos eaque aspernatur impedit.', '18499.75', 1, 'img/products/2014-11-21-160958-laptop-upload.jpg', '2014-11-21 08:09:58', '2014-11-21 08:09:58'),
(5, 3, 'HTC One', 'Similique tempore asperiores, quos ratione laudantium consequatur suscipit veritatis distinctio, aspernatur iure soluta accusantium architecto.', '22499.75', 1, 'img/products/2014-11-21-161113-smartphone-upload.jpg', '2014-11-21 08:11:13', '2014-11-21 08:11:13'),
(6, 3, 'Galaxy S4', 'At libero nobis eius, voluptas inventore, adipisci molestiae consectetur magnam fuga, repudiandae asperiores praesentium recusandae.', '34999.75', 1, 'img/products/2014-11-21-161149-smartphone-upload.jpg', '2014-11-21 08:11:49', '2014-11-21 08:11:49'),
(7, 1, 'Acer Laptop', 'Sequi ex vitae laborum, voluptas error quibusdam, amet voluptate eius odio doloribus, veritatis ullam omnis?', '14499.75', 1, 'img/products/2014-11-21-161224-laptop-upload.jpg', '2014-11-21 08:12:24', '2014-11-21 08:12:24'),
(8, 4, 'iPad', 'This is an awesome iPad. It can do everything and you should buy it.', '53499.75', 1, 'img/products/2014-11-21-161556-tablet-upload.jpg', '2014-11-21 08:15:56', '2014-11-21 08:15:56'),
(9, 1, 'Sager Laptop', 'Recusandae nostrum tenetur exercitationem, quos ea earum. Nulla veniam ea obcaecati voluptatem explicabo, recusandae. Voluptatem.', '15999.75', 1, 'img/products/2014-11-21-161721-laptop-upload.jpg', '2014-11-21 08:17:21', '2014-11-21 08:17:21'),
(10, 4, 'Nexus 7', 'Dolore consectetur maxime, nobis quisquam molestias, cumque quia at perferendis ad enim laboriosam pariatur, dolorem!', '26499.75', 1, 'img/products/2014-11-21-161855-tablet-upload.jpg', '2014-11-21 08:18:55', '2014-11-21 08:18:55'),
(11, 2, 'Alienware Desktop', 'Reiciendis quam voluptatibus deleniti dolorem consectetur odio omnis, facilis repellat, corporis porro id necessitatibus fugiat?', '36490.75', 1, 'img/products/2014-11-21-162015-desktop-upload.jpg', '2014-11-21 08:20:15', '2014-11-21 08:20:15'),
(12, 1, 'Dell Ultrabook', 'Deleniti repellendus tempora officiis odit aut deserunt quo ut in. Labore perferendis excepturi, voluptas tempore!', '19499.75', 1, 'img/products/2014-11-21-163654-laptop-upload.jpg', '2014-11-21 08:36:54', '2014-11-21 08:36:54'),
(13, 4, 'Nexus 10', 'This is an awesome product, with a lot of great features. You''ll likely be able to use this for many years to come.', '29499.75', 1, 'img/products/2014-11-21-163754-tablet-upload.jpg', '2014-11-21 08:37:54', '2014-11-21 08:37:54'),
(14, 1, 'Toshiba Laptop', 'This is an awesome product, with a lot of great features. You''ll likely be able to use this for many years to come.', '16999.75', 1, 'img/products/2014-11-21-163853-laptop-upload.jpg', '2014-11-21 08:38:53', '2014-11-21 08:38:53'),
(15, 2, 'Asus Desktop', 'This is an awesome product, with a lot of great features. You''ll likely be able to use this for many years to come.', '11499.75', 1, 'img/products/2014-11-21-164006-desktop-upload.jpg', '2014-11-21 08:40:06', '2014-11-21 08:40:06'),
(16, 1, 'Macbook Pro', 'This is an awesome product, with a lot of great features. You''ll likely be able to use this for many years to come.', '55499.75', 1, 'img/products/2014-11-21-164053-laptop-upload.jpg', '2014-11-21 08:40:53', '2014-11-21 08:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `telephone`, `admin`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Ranie', 'Santos', 'ransan32@yahoo.com', '$2y$10$oBH7EfUp6H3bs5p2jM5RYOuUUsjPBuVoN/mAh.IesK630EtA3BUvG', '09871234567', 1, '2014-12-07 16:48:13', '2014-12-07 16:48:13', NULL),
(2, 'Elijah', 'Jacinto', 'ej@yahoo.com', '$2y$10$PkVri7gmk/JXsAUBGHnVKOGR0hWvTGrITwiErlbhoId8tO6M6PTce', '09091234567', 0, '2014-12-07 19:09:55', '2014-12-07 19:23:47', 'aWKkQEURqZTmhb8R7IOxUCojPZc0haOfb4y6AS0KHTm4l5t6pjLAcNmb0Cor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
