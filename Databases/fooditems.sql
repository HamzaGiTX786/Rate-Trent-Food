-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2022 at 09:13 PM
-- Server version: 10.4.26-MariaDB
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamzasalimattarwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `itemid` int(100) NOT NULL,
  `itemname` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `calories` int(100) NOT NULL,
  `cafe` varchar(1000) NOT NULL,
  `building` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`itemid`, `itemname`, `price`, `calories`, `cafe`, `building`) VALUES
(1, 'Halal quarter pound burger', '11.29', 420, 'Grill House Lunch & Dinner', 'Champlain'),
(2, 'Love me tenders', '9.49', 300, 'Grill House Lunch & Dinner', 'Champlain');
(3, 'Chicken twister wrap', '10.49', 710, 'Grill House Lunch & Dinner' 'Champlain');
(4, 'Morning star burger', '10.49', 390, 'Grill House Lunch & Dinner' 'Champlain');
(5, 'Crispy chicken burger', '11.29', 320, 'Grill House Lunch & Dinner' 'Champlain');
(6, 'Grilled chicken burger', '11.29', 490 , 'Grill House Lunch & Dinner' 'Champlain');
(7, 'Triple decker clubhouse', '10.49', 440, 'Grill House Lunch & Dinner' 'Champlain');
(8, 'BLT sandwich', '7.59', 380, 'Grill House Lunch & Dinner' 'Champlain');
(9, 'GLT sandwich', '5.99', 390, 'Grill House Lunch & Dinner' 'Champlain');
(10, 'Coleslaw', '1.99', 100, 'Grill House Lunch & Dinner' 'Champlain');
(11, 'French fries', '3.70', 450, 'Grill House Lunch & Dinner' 'Champlain');
(12, 'Onion rings', '3.79', 460, 'Grill House Lunch & Dinner' 'Champlain');
(13, 'Poutine', '7.59', 720, 'Grill House Lunch & Dinner' 'Champlain');
(14, 'Add bacon', '2.09', 450, 'Grill House Lunch & Dinner' 'Champlain');
(15, 'Add cheese', '2.09', 450, 'Grill House Lunch & Dinner' 'Champlain');
(16, 'Gravy', '1.59', 450, 'Grill House Lunch & Dinner' 'Champlain');
(17, 'Combo', '1.59', 450, 'Grill House Lunch & Dinner' 'Champlain');

(18, 'Big breakfast', '10.99', 450, 'Grill House Breakfast' 'Champlain');
(19, 'BLT sandwich', '7.59', 450, 'Grill House Breakfast' 'Champlain');
(20, 'Breakfast sandwich', '6.49', 450, 'Grill House Breakfast' 'Champlain');
(21, 'Breakfast wrap', '7.29', 680, 'Grill House Breakfast' 'Champlain');
(22, 'Healthy start', '10.79', 270, 'Grill House Breakfast' 'Champlain');
(23, 'Western', '6,59', 270, 'Grill House Breakfast' 'Champlain');
(24, 'GLT sandwich', '5.99', 390, 'Grill House Breakfast' 'Champlain');
(25, 'Veggie bagel supreme ', '5.99', 470, 'Grill House Breakfast' 'Champlain');
(26, 'Toasted bagel', '2.49', 350, 'Grill House Breakfast' 'Champlain');
(27, 'with cheese or cream cheese', '3.49', 370, 'Grill House Breakfast' 'Champlain');
(28, 'Guac toast', '3.79', 270, 'Grill House Breakfast' 'Champlain');
(29, '2 triangle hash browns', '2.29', 290, 'Grill House Breakfast' 'Champlain');
(30, 'Side of toast', '2.29', 220, 'Grill House Breakfast' 'Champlain');
(31, 'Add guac and hummus', '1.79', 270, 'Grill House Breakfast' 'Champlain');
(32, 'Add bacon or sausage', '2.09', 70, 'Grill House Breakfast' 'Champlain');
(33, 'Add cheese', '2.09', 80, 'Grill House Breakfast' 'Champlain');
(34, 'Upgrade to bagel', '2.09', 80, 'Grill House Breakfast' 'Champlain');

(35, 'Create Your Own Bowl', '9.99', 80, 'Revolution Noodle' 'Champlain');
(36, 'Roasted chicken Thai noodle bowl', '10.49', 80, 'Revolution Noodle' 'Champlain');
(37, 'Vegetarian tofu noodle bowl', '10.49', 80, 'Revolution Noodle' 'Champlain');
(38, 'Beef pho bowl ', '10.49', 80, 'Revolution Noodle' 'Champlain');
(39, 'Add shrimp', '3.00', 0, 'Revolution Noodle' 'Champlain');
(40, 'Add beef', '2.00', 0, 'Revolution Noodle' 'Champlain');
(41, 'Add chicken', '2.00', 0, 'Revolution Noodle' 'Champlain');
(42, 'Add pork', '2.00', 0, 'Revolution Noodle' 'Champlain');
(43, 'Add tofu ', '1.00', 0, 'Revolution Noodle' 'Champlain');
(44, 'Add egg', '1.00', 0, 'Revolution Noodle' 'Champlain');

(45, 'Mexican chicken & sweet potato', '10.99', 810, 'El Diablito Taqueria' 'Champlain');
(46, 'Chipotle pulled pork', '10.99', 720, 'El Diablito Taqueria' 'Champlain');
(47, 'Breaded haddock', '10.99', 590, 'El Diablito Taqueria' 'Champlain');
(48, 'Spicy beef', '10.99', 780, 'El Diablito Taqueria' 'Champlain');
(49, 'Black bean & sweet potato', '10.99', 790, 'El Diablito Taqueria' 'Champlain');
(50, 'Fiesta tofu', '10.99', 910, 'El Diablito Taqueria' 'Champlain');
(51, 'Add cheese', '2.09', 0, 'El Diablito Taqueria' 'Champlain');
(52, 'Add guac', '1.49', 0, 'El Diablito Taqueria' 'Champlain');
(53, 'Make it a crunchwrap', '0.79', 0, 'El Diablito Taqueria' 'Champlain');
(54, 'Create Your Own Tacos, Burrito or Burrito Bow', '10.99', 0, 'El Diablito Taqueria' 'Champlain');
(55, 'Quesadilla with protein', '11.29', 0, 'El Diablito Taqueria' 'Champlain');
(56, 'Veggie Quesadilla', '8.99', 0, 'El Diablito Taqueria' 'Champlain');
(57, 'Make it a crunchwrap', '0.79', 0, 'El Diablito Taqueria' 'Champlain');
(58, 'Make it a crunchwrap', '0.79', 0, 'El Diablito Taqueria' 'Champlain');

(59, 'BAMM burger', '10.49', 780, 'The Local Grill' 'Gzowski');
(60, '“The Gzowski” hot southern chicken sandwich', '10.49', 840, 'The Local Grill' 'Gzowski');
(61, 'Korean-style chicken burger', '10.49', 670, 'The Local Grill' 'Gzowski');
(62, 'Black bean burger', '10.49', 540, 'The Local Grill' 'Gzowski');
(63, 'Fish & chips', '12.99', 1300, 'The Local Grill' 'Gzowski');
(64, 'Chipotle BBQ pulled pork sandwich', '8.49', 690, 'The Local Grill' 'Gzowski');
(65, 'California club', '10.49', 530, 'The Local Grill' 'Gzowski');
(66, 'Swiss cheddar grilled cheese', '7.99', 510, 'The Local Grill' 'Gzowski');
(67, 'Apple brie grilled cheese', '7.89', 560, 'The Local Grill' 'Gzowski');
(68, 'Pesto grilled vegetable sandwich', '6.99', 440, 'The Local Grill' 'Gzowski');
(69, 'Local chicken wings', '8.49', 1100, 'The Local Grill' 'Gzowski');
(70, '1 lb of tender', '12.99', 1100, 'The Local Grill' 'Gzowski');
(71, 'Fries', '3.79', 190, 'The Local Grill' 'Gzowski');
(72, 'Poutine', '7.59', 340, 'The Local Grill' 'Gzowski');
(73, 'Sweet potato fries', '4.99', 430, 'The Local Grill' 'Gzowski');
(73, 'Sweet potato poutine', '8.79', 590, 'The Local Grill' 'Gzowski');
(74, 'Onion rings', '3.79', 500, 'The Local Grill' 'Gzowski');

(74, 'Four cheese naanza', '8.99', 470, 'Parea Mediterranean Cuisine' 'Gzowski');
(75, 'Bruschetta naan’za', '7.99', 350, 'Parea Mediterranean Cuisine' 'Gzowski');
(76, 'Pepperoni naan’za', '9.99', 500, 'Parea Mediterranean Cuisine' 'Gzowski');
(77, 'Canadian naan’za', '9.99', 540, 'Parea Mediterranean Cuisine' 'Gzowski');
(78, 'Greek naan’za', '8.99', 360, 'Parea Mediterranean Cuisine' 'Gzowski');
(79, 'Craft Your Own Naan’za', '8.99', 00, 'Parea Mediterranean Cuisine' 'Gzowski');
(80, 'Caesar wrap or salad', '7.99', 330, 'Parea Mediterranean Cuisine' 'Gzowski');
(81, 'Chicken parmesan sandwich', '10.99', 710, 'Parea Mediterranean Cuisine' 'Gzowski');
(82, 'Meatball sandwich', '9.99', 740, 'Parea Mediterranean Cuisine' 'Gzowski');
(83, 'Pesto grilled vegetable panini', '7.99', 510, 'Parea Mediterranean Cuisine' 'Gzowski');
(84, 'Chicken shawarma', '8.99', 350, 'Parea Mediterranean Cuisine' 'Gzowski');
(85, 'Craft Your Own Salad or Wrap', '7.99', 00, 'Parea Mediterranean Cuisine' 'Gzowski');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `itemid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
