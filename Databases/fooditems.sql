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
(75, 'Bruschetta naanza', '7.99', 350, 'Parea Mediterranean Cuisine' 'Gzowski');
(76, 'Pepperoni naanza', '9.99', 500, 'Parea Mediterranean Cuisine' 'Gzowski');
(77, 'Canadian naanza', '9.99', 540, 'Parea Mediterranean Cuisine' 'Gzowski');
(78, 'Greek naanza', '8.99', 360, 'Parea Mediterranean Cuisine' 'Gzowski');
(79, 'Craft Your Own Naanza', '8.99', 00, 'Parea Mediterranean Cuisine' 'Gzowski');
(80, 'Caesar wrap or salad', '7.99', 330, 'Parea Mediterranean Cuisine' 'Gzowski');
(81, 'Chicken parmesan sandwich', '10.99', 710, 'Parea Mediterranean Cuisine' 'Gzowski');
(82, 'Meatball sandwich', '9.99', 740, 'Parea Mediterranean Cuisine' 'Gzowski');
(83, 'Pesto grilled vegetable panini', '7.99', 510, 'Parea Mediterranean Cuisine' 'Gzowski');
(84, 'Chicken shawarma', '8.99', 350, 'Parea Mediterranean Cuisine' 'Gzowski');
(85, 'Craft Your Own Salad or Wrap', '7.99', 00, 'Parea Mediterranean Cuisine' 'Gzowski');

(85, 'Big breakfast', '8.99', 950, 'Grill & Co Breakfast' 'Otonabee');
(86, 'Bacon or sausage breakfast sandwich', '4.99', 390, 'Grill & Co Breakfast' 'Otonabee');
(87, 'Egg & cheese breakfast sandwich', '4.19', 290, 'Grill & Co Breakfast' 'Otonabee');
(88, 'Field roast plant based sandwich', '8.99', 470, 'Grill & Co Breakfast' 'Otonabee');
(89, 'Western sandwich', '6.29', 420, 'Grill & Co Breakfast' 'Otonabee');
(90, 'BLT on a bagel', '7.49', 460, 'Grill & Co Breakfast' 'Otonabee');
(91, 'Add coffee & hashbrowns', '4.10', 470, 'Grill & Co Breakfast' 'Otonabee');
(92, 'Western sandwich', '6.29', 470, 'Grill & Co Breakfast' 'Otonabee');
(93, 'Add coffee & hashbrowns', '4.10', 490, 'Grill & Co Breakfast' 'Otonabee');
(94, 'Side of hashbrown', '2.99', 490, 'Grill & Co Breakfast' 'Otonabee');
(95, 'Plain bagel', '2.29', 280, 'Grill & Co Breakfast' 'Otonabee');
(96, 'Multigrain bagel', '2.29', 300, 'Grill & Co Breakfast' 'Otonabee');
(97, 'Bagel with cream cheese', '3.29', 410, 'Grill & Co Breakfast' 'Otonabee');
(98, 'Upgrade any breakfast sandwich to a bagel', '1.29', 300, 'Grill & Co Breakfast' 'Otonabee');

(99, 'North burger', '8.99', 580, 'Grill & Co Lunch & Dinner' 'Otonabee');
(100, 'Great one', '8.49', 520, 'Grill & Co Lunch & Dinner' 'Otonabee');
(101, 'Canuck', '7.79', 520, 'Grill & Co Lunch & Dinner' 'Otonabee');
(102, 'The gardener', '7.69', 440, 'Grill & Co Lunch & Dinner' 'Otonabee');
(103, 'Lightlife burger', '8.49', 540, 'Grill & Co Lunch & Dinner' 'Otonabee');
(104, 'Northern fried chicken', '8.59', 520, 'Grill & Co Lunch & Dinner' 'Otonabee');
(105, 'Tragically chick', '8.59', 350, 'Grill & Co Lunch & Dinner' 'Otonabee');
(106, 'By the bay', '8.49', 580, 'Grill & Co Lunch & Dinner' 'Otonabee');
(107, 'Love me tenders', '7.89', 380, 'Grill & Co Lunch & Dinner' 'Otonabee');
(108, 'Regular fries', '3.49', 420, 'Grill & Co Lunch & Dinner' 'Otonabee');
(109, 'Large fries', '3.99', 560, 'Grill & Co Lunch & Dinner' 'Otonabee');
(110, 'Sweet potato fries', '4.49', 690, 'Grill & Co Lunch & Dinner' 'Otonabee');
(111, 'Poutine', '6.49', 730, 'Grill & Co Lunch & Dinner' 'Otonabee');
(112, 'Onion rings', '4.99', 480, 'Grill & Co Lunch & Dinner' 'Otonabee');
(113, 'Gravy', '1.35', 70, 'Grill & Co Lunch & Dinner' 'Otonabee');
(114, 'Coleslaw', '1.99', 70, 'Grill & Co Lunch & Dinner' 'Otonabee');
(115, 'Combo', '5.00', 70, 'Grill & Co Lunch & Dinner' 'Otonabee');

(116, 'Classic slice + fountain pop', '6.99', 600, 'Pizza Pizza' 'Otonabee');
(117, 'Classic slice + fountain pop + bag of chips', '7.99', 510, 'Pizza Pizza' 'Otonabee');
(118, 'Any 2 classic slice', '8.69', 600, 'Pizza Pizza' 'Otonabee');
(119, 'Add dip', '1.29', 350, 'Pizza Pizza' 'Otonabee');
(120, 'Classic slices', '4.79', 70, 'Pizza Pizza' 'Otonabee');
(121, 'Specialty slices', '4.99', 600, 'Pizza Pizza' 'Otonabee');
(122, 'Campus combo', '26.99', 880, 'Pizza Pizza' 'Otonabee');
(123, 'XL 16” classic pizza', '20.99', 680, 'Pizza Pizza' 'Otonabee');
(124, 'XL 16” specialty pizza', '22.99', 900, 'Pizza Pizza' 'Otonabee');
(125, '10” gluten free pizza', '13.99', 240, 'Pizza Pizza' 'Otonabee');

(126, 'Chopd Caesar', '11.29', 620, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(127, 'Chopd Greek', '11.29', 620, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(128, 'Chopd southwest', '11.29', 580, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(129, 'Chopd chickp', '10.99', 600, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(130, 'Create Your Own Wrap or Salad', '11.29', 620, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(131, 'Add Halal chicken', '2.99', 140, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(132, 'Add falafel ball', '2.79', 210, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(133, 'Add whole boiled egg', '1.99', 70, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(134, 'White tortilla', '0', 280, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');
(135, 'Whole wheat tortilla', '0', 280, 'Chopd & Wrapd Bowls & Wraps', 'Lady Eaton');

(136, 'Big breakfast', '10.99', 640, 'Chefs Table Breakfast', 'Lady Eaton');
(137, 'BLT sandwich', '7.59', 380, 'Chefs Table Breakfast', 'Lady Eaton');
(138, 'Breakfast sandwich', '6.49', 340, 'Chefs Table Breakfast', 'Lady Eaton');
(139, 'Without protein', '5.99', 270, 'Chefs Table Breakfast', 'Lady Eaton');
(140, 'Breakfast wrap', '7.29', 680, 'Chef Table Breakfast', 'Lady Eaton');
(141, 'GLT sandwich', '5.99', 390, 'Chef Table Breakfast', 'Lady Eaton');
(142, 'Veggie bagel supreme', '5.99', 470, 'Chef Table Breakfast', 'Lady Eaton');
(143, 'Toasted bagel', '2.49', 350, 'Chef Table Breakfast', 'Lady Eaton');
(144, 'Guac toast', '3.79', 440, 'Chef Table Breakfast', 'Lady Eaton');
(145, 'Toasted bagel', '3.79', 440, 'Chef Table Breakfast', 'Lady Eaton');
(146, '2 triangle hash browns', '2.29', 290, 'Chef Table Breakfast', 'Lady Eaton');
(147, 'Side of toast', '2.29', 220, 'Chef Table Breakfast', 'Lady Eaton');
(148, 'Add guac and hummus', '1.79', 270, 'Chef Table Breakfast', 'Lady Eaton');
(149, 'Add bacon or sausage', '2.09', 70, 'Chef Table Breakfast', 'Lady Eaton');
(150, 'Add cheese', '2.09', 80, 'Chef Table Breakfast', 'Lady Eaton');
(151, 'Upgrade to bagel', '2.09', 80, 'Chef Table Breakfast', 'Lady Eaton');

(152, 'Chicken twister wrap', '10.49', 710, 'Chef Table Lunch & Dinner' 'Lady Eaton');
(153, 'Love me tenders', '9.49', 300, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(154, 'Plant-based lightlife burger', '8.99', 530, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(155, 'Jalapeno popper grilled cheese', '9.29', 720, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(156, 'Grilled cheese', '5.79', 470, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(157, 'BLT sandwich', '7.59', 380, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(158, 'Veggie Bagel Supreme', '5.99', 470, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(159, 'Guac toast', '3.79', 440, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(160, 'GLT sandwich', '5.99', 390, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(161, 'Toasted bagel', '2.49', 350, 'Chef Table Lunch & Dinner', 'Lady Eaton');
(162, 'with cheese or cream cheese', '3.49', 370, 'Chef Table Lunch & Dinner', 'Lady Eaton');

(163, 'Ham + pineapple pizza', '7.99', 500, 'San Marzano', 'Lady Eaton');
(164, 'Margherita pizza', '7.49', 520, 'San Marzano', 'Lady Eaton');
(165, 'Pepperoni pizza', '7.49', 510, 'San Marzano', 'Lady Eaton');
(166, 'Veggie deluxe pizza', '7.99', 500, 'San Marzano', 'Lady Eaton');
(167, 'Mozzarella pizza', '7.29', 470, 'San Marzano', 'Lady Eaton');
(168, 'Ham + pineapple pizza', '7.99', 500, 'San Marzano', 'Lady Eaton');
(169, 'Diavolo pizza', '9.29', 640, 'San Marzano', 'Lady Eaton');
(170, 'Sauce + mozza + 2 toppings', '7.59', 640, 'San Marzano', 'Lady Eaton');
(171, 'Each individual topping', '1.59', 00, 'San Marzano', 'Lady Eaton');
(172, 'Sauce + mozza + 2 toppings', '7.59', 640, 'San Marzano', 'Lady Eaton');
(173, 'Kale Caesar salad', '5.99', 170, 'San Marzano', 'Lady Eaton');
(174, 'Roasted red pepper salad', '5.59', 250, 'San Marzano', 'Lady Eaton');
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
