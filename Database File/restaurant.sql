-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 02:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(300) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `username`, `pass`) VALUES
(1, 'Ahmed Alashi', 'ahmed_alashi', 'b35c32222ac8d3bb0ef436350e44c35c94af9863'),
(2, 'Mohammed Abo Sido', 'mohammed_sido', '5014460353bdc3d424ea3133074976c04ddbba6f');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `description` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'مأكولات بحرية', 'يتم استهلاك العديد من أنواع الأسماك كغذاء في جميع المناطق تقريبًا حول العالم. لطالما كانت الأسماك مصدرًا مهمًا للبروتين والمواد المغذية الأخرى للإنسان عبر التاريخ.'),
(2, 'وجبات اللحوم', 'اللحم لحم حيواني يؤكل كغذاء. لقد اصطاد البشر وقتلوا الحيوانات من أجل اللحوم منذ عصور ما قبل التاريخ. أتاح ظهور الحضارة تدجين الحيوانات مثل الدجاج والأغنام والأرانب والخنازير والماشية.'),
(3, 'عصائر طبيعية', 'العصير مشروب يُصنع من استخلاص أو ضغط السائل الطبيعي الموجود في الفاكهة والخضروات. يمكن أن يشير أيضًا إلى السوائل المنكهة بالمركزات أو مصادر الغذاء البيولوجية الأخرى ، مثل اللحوم أو المأكولات البحرية ، مثل عصير البطلينوس.'),
(4, 'طعام نباتي', 'الخضار هي أجزاء من النباتات التي يستهلكها الإنسان أو الحيوانات الأخرى كغذاء. لا يزال المعنى الأصلي شائع الاستخدام ويتم تطبيقه على النباتات بشكل جماعي للإشارة إلى جميع المواد النباتية الصالحة للأكل ، بما في ذلك الزهور والفواكه والسيقان والأوراق والجذور والبذور.'),
(5, 'الحلويات', 'الحلويات – حلو هي الأغذية الحلوة التي تحوي غالباً على سكر في مكوناتها.'),
(6, 'منتجات الألبان', 'منتجات الألبان هي الأطعمة المحضّرة من حليب الثدييات. منتجات الألبان عبارة عن غذاء مرتفع الطاقة. وتُعرف العملية المستخدمة لإنتاج منتجات الألبان بإنتاج الحليب. مصادر الحليب الذي يستهلكه البشر هو البقر في الدرجة الأولى، تليه الماعز والقطاس والخروف والخيول والجمال وغيرها من الثدييات.'),
(7, 'السكاكر', 'السكاكر أو الحلويات هي مجموعة المواد الغذائية الغنية بالسكر. وتكون هذه المواد في الاستخدام الحديث غنية بالمحليات الصناعية أيضا. عموما، السكاكر فقيرة في القيمة الغذائية ولكن غنية في السعرات الحرارية. وعلى وجه الخصوص كانت السكاكر المصنعة من الشوكولاتة تصنـّع للاستخدام العسكري نظرا للنسبة العالية من ال');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(100) NOT NULL,
  `meal_category` int(100) NOT NULL,
  `meal_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `meal_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `meal_price` int(100) NOT NULL,
  `meal_image` text CHARACTER SET latin1 NOT NULL,
  `meal_keywords` text CHARACTER SET utf8 NOT NULL,
  `meal_discount` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `meal_category`, `meal_name`, `meal_type`, `meal_price`, `meal_image`, `meal_keywords`, `meal_discount`) VALUES
(1, 2, 'همبرغر', 'normal', 110, 'hamburger.jpg', 'Hamburger Meat Meal Chicken Kofta همبرغر كفتة لحم دجاج وجبة', '0.00'),
(2, 2, 'صدر دجاج', 'normal', 70, 'chest.jpg', 'Chicken Chest Meal Meat صدر دجاج وجبة', '50.00'),
(3, 1, 'ماكيريل', 'discount', 110, 'fish.jpg', 'Fish Meal Mackerel ماكيريل سمك وجبة', '15.00'),
(4, 2, 'شاورما', 'discount', 50, 'shawarma.jpg', 'Shawarma Meat Meal Chicken Beef شاورما دجاج لحمة وجبة', '10.00'),
(5, 1, 'سلمون', 'normal', 120, 'salmon.jpg', 'Alaskan salmon Meal Fish الاسكا سلمون سمك وجبة', '0.00'),
(6, 1, 'سردين', 'normal', 100, 'sardines.jpg', 'Sardines Fish Meal سمك سردين وجبة', '0.00'),
(7, 3, 'عنب', 'normal', 45, 'grape-juice.jpg', 'Grape Juice Fruits عصير عنب فواكه فاكهة', '0.00'),
(8, 3, 'مانجا', 'normal', 55, 'mango.jpg', 'Mango Juice Fruits Fruit مانجا عصير فواكة فاكهة', '0.00'),
(9, 3, 'برتقال', 'discount', 65, 'orange.jpg', 'Orange Juice Fruits Fruit برتقال عصير فواكه فاكهة', '25.00'),
(10, 3, 'رمان', 'discount', 120, 'pomegranate.jpg', 'pomegranate juice fruit رمان عصير فواكه فاكهة', '50.00'),
(11, 3, 'تفاح', 'discount', 130, 'apple.jpg', 'Apple Juice Fruit تفاح عصير فواكه فاكهة', '40.00'),
(12, 4, 'ملوخيا', 'discount', 110, 'mlokhia.jpg', 'ملوخيا ملوخية خضار خضراوات اكل نباتي طعام نباتي vegetarian vegetables mlokhia', '10.00'),
(13, 5, 'بقلاوة', 'discount', 60, 'beqlawa.jpg', 'Beqlawa Sweets Candy بقلاوة حلويات حلو', '20.00'),
(14, 5, 'كنافة', 'discount', 90, 'konafa.jpg', 'Konafa Sweets Candy كنافة حلويات حلو', '15.00'),
(15, 5, 'ليالي لبنان', 'normal', 40, 'lyalilebanon.jpg', 'ليالي لبنان حلويات حلو Sweets Sweet Candy Lyali Lebnan', '0.00'),
(19, 1, 'سلطعون', 'discount', 120, 'crab.jpg', 'Saltaaon Crab Fish Food Meal سلطعون سمك Seafood', '5.00'),
(20, 1, 'رنجة', 'discount', 110, 'herring.jpg', 'Herring Fish Food Meal رنجة سمك Seafood', '8.00'),
(21, 1, 'تونة', 'normal', 95, 'tuna.jpg', 'Tuna Fish Food Meal تونة سمك Seafood', '0.00'),
(22, 4, 'فطائر سبانخ', 'normal', 90, 'spinach.jpg', 'سبانخ فطيرة خضار خضراوات اكل نباتي طعام نباتي vegetarian vegetables Spinach', '0.00'),
(23, 4, 'سمبوسك بالخضار', 'normal', 75, 'smbosa.jpg', 'سمبوسك سمبوسا خضار خضراوات اكل نباتي طعام نباتي vegetarian vegetables Smbosa Smbosek', '0.00'),
(24, 7, 'جيلي', 'discont', 15, 'jelly.jpg', 'جيلي سكاكر Sweet Jelly', '10.00'),
(25, 2, 'كباب', 'normal', 95, 'kebab.jpg', 'Kebab Meal Meat Quick Food كباب كفتة', '0.00'),
(26, 4, 'معكرونة', 'normal', 65, 'pasta.jpg', 'Pasta Vegetarian Vegetables معكرونة خضار', '0.00'),
(27, 4, 'بيتزا', 'normal', 75, 'pizza.jpg', 'بيتزا هت طعام نباتي نبات خضار Pizza', '0.00'),
(28, 1, 'بلوطي', 'normal', 120, 'balloti.jpg', 'Seafood Fish Meal بلوطي Balloti سمك طعام بحري', '0.00'),
(29, 7, 'مصاصة', 'discont', 25, 'lollipop.jpg', 'مصاصة سكاكر Sweet lollipop', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(300) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `username`, `pass`) VALUES
(1, 'Mohammed Alashi', 'mohammed_alashi', '7cf309d44c36ca9e99e1699a708b32ad4e43bf2d'),
(2, 'Abdullah Alashi', 'abdullah_alashi', 'd31a87da3b37696265e9aa3c97f4b722e900f260'),
(3, 'Khaled Alashi', 'khaled_alashi', 'ad0eb2bd0c843726ff6985bdbadaa5b34f8e2305');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `mealCategory_FK1` (`meal_category`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `mealCategory_FK1` FOREIGN KEY (`meal_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
