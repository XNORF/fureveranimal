-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 05:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fureveranimalshelter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(100) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `postcode` int(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `address1`, `address2`, `postcode`, `city`, `state`, `phoneNumber`, `dob`, `image`) VALUES
('A19DW1571', 'Norfirdaus', 'mos.firdaus@gmail.com', '999365f4bc571a8417b3354a1b9e975d', 'Mohamad Norfirdaus', 'Mohamad Sukri', '2-F-6 RECSAM Apartment', 'Jalan Sultan Azlan Shah', 11700, 'Gelugor', 'Pulau Pinang', '0105094392', '2001-05-06', 'aa.png');

-- --------------------------------------------------------

--
-- Table structure for table `adopter`
--

CREATE TABLE `adopter` (
  `id` int(100) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `postcode` int(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `vkey` varchar(50) NOT NULL,
  `verified` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopter`
--

INSERT INTO `adopter` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `address1`, `address2`, `postcode`, `city`, `state`, `phoneNumber`, `dob`, `vkey`, `verified`, `image`) VALUES
(74, 'Norfirdaus', 'mos.firdaus@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Mohamad Norfirdaus', 'Mohamad Sukri', '2-F-6 RECSAM Apartment', 'Jalan Sultan Azlan Shah', 11700, 'Gelugor', 'Pulau Pinang', '0105094392', '2001-05-06', '0fb59a04f60afd57232130e4cfa63010', 1, 'derp hutao.png');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` varchar(100) NOT NULL,
  `adopter` varchar(100) NOT NULL,
  `pet` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `adopter`, `pet`, `date`, `time`, `status`) VALUES
('cus_KaWv1eJSm8L52Z', 'mos.firdaus@gmail.com', 3, '2021-11-23', '12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `date` date NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`date`, `slot`) VALUES
('2021-11-23', 1),
('2021-11-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(100) NOT NULL,
  `type` text NOT NULL,
  `date` date NOT NULL,
  `name` text NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `health` text NOT NULL,
  `story` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `type`, `date`, `name`, `age`, `gender`, `health`, `story`, `image`, `status`) VALUES
(1, 'Cat', '2021-10-20', 'Lily', '5 Months', 'Female', 'None', 'Found as an orphan kitten at 1 months old in an abandoned garage, now Lily is healthy and became an active kitten.', 'lily.jpg', 0),
(2, 'Dog', '2021-10-20', 'Marshmallow', '2 Years', 'Male', 'Slightly allergic to peanuts', 'Marshmallows previous owner dropped him by the shelter because they needed to move to another country. Marshmallow is very talkative and friendly.', 'marshmallow.jpg', 0),
(3, 'Cat', '2021-10-20', 'Nyx', '1 Year', 'Male', 'None', 'Nyx was a stray cat with dirty fur and bad skin condition, he was rescued from the alley. After going through treatments, Nyx eventually recovered from its skin condition and managed to grow its beautiful fur back. Nyx is a little grumpy yet so sweet.', 'nyx.jpg', 1),
(4, 'Dog', '2021-10-22', 'Peanut', '9 Months', 'Female', 'Allergic to fish', 'Peanut was given up by its previous owner due to their busy work life. Peanut is usually calm but can be aggressive when its being playful.', 'peanut.jpg', 0),
(5, 'Cat', '2021-10-15', 'Grey', '1.5 Years', 'Male', 'Sneezes a lot when cold', 'Grey was almost sold by a inhumane pet breeder but FAS came to rescue it in time, and now Grey is safe and loved.', 'grey.jpg', 0),
(6, 'Dog', '2021-10-12', 'King', '10 Months', 'Male', 'Left leg a little weak', 'King was abused by its previous owner and luckily, someone reported the case to the authorities. FAS managed to rescue King in time. King is a couch potato and it is a curious dog too.', 'king.jpg', 0),
(7, 'Cat', '2021-10-08', 'Bailey', '3 Years', 'Female', 'Blind on left eye', 'Bailey was born in FAS and it experienced an unfortunate accident where it was born without an eye on the left. Bailey may not be able to see the world fully but she is full with lively spirit.', 'bailey.jpg', 0),
(8, 'Dog', '2021-10-11', 'Cooper', '2 Years', 'Male', 'Fully Blind', 'Cooper was a stray dog roaming around restaurants in town asking for food. Because of its blindness, Cooper only relied on its hearing and smelling to take care of itself. FAS rescued Cooper at a restaurant. Cooper is an independent and smart dog.', 'cooper.jpeg', 0),
(9, 'Cat', '2021-10-12', 'Luna', '1 Year', 'Female', 'None', 'Luna was once a pet to a wealthy family but the family passed away after their home was burnt into ashes, leaving Luna by itself as only Luna managed to escape. Luna is a reserved and mysterious cat, moreover, it adores stuffed toys.', 'luna.jpg', 0),
(10, 'Dog', '2021-10-19', 'Ian', '8 Months', 'Male', 'None', 'Ian, a mixed breed dog, was found in 2020 starving and wandering alone in Jalan Semarak. A policeman took him to FAS. He is not in a good condition that time due to lack of proper care. But now, he is fat and healthier.', 'ian.jpg', 0),
(11, 'Cat', '2021-10-14', 'Killa', '1.3 Year', 'Female', 'None', 'She was found in an abandoned tree house on the edge of the forest. She was pregnant in that time, so we also saved her kittens too. After two weeks, she getting more cheerful and active.', 'killa.jpg', 0),
(12, 'Dog', '2021-10-15', 'Wolfie', '4 Years', 'Male', 'Deaf', 'He was found in the roadside, almost got hit by a car because he is deaf. The one that save him brought him to us to get a proper care and also to prevent him from wandering alone in the big road.', 'wolfie.jpg', 0),
(13, 'Cat', '2021-10-18', 'Jojo', '4.2 Years', 'Male', 'Disfunction legs', 'He was suffered terrible injuries at his legs because of his old abusive owner. He was found in a small house at the neighbourhood.', 'jojo.jpg', 0),
(14, 'Dog', '2021-10-13', 'Richard', '1.1 Years', 'Male', 'None', 'His owner need to move to London for their business purpose. So they want us to find a new good owner for him. He is a lovely dog and unproblematic one.', 'richard.jpg', 0),
(15, 'Cat', '2021-10-15', 'Cassie', '4 Months', 'Female', 'None', 'Found her when she was still a newborn. She was so thinner. Now, she is more healthier, adorable and clingy.', 'cassie.jpg', 0),
(16, 'Dog', '2021-10-17', 'Fraiser', '5 Years', 'Male', 'Old', 'Found him when he was 4 years old at the abandoned neighbourhood. Because of his looks and lovely nature, everyone even the vet thought he was a Golden Retriever mix. His legacy may well be that, because he was such a nice dog.', 'fraiser.jpg', 0),
(17, 'Cat', '2021-10-14', 'Darcy', '1.8 Years', 'Female', 'None', 'She was an un-spayed, female cat was abandoned by her people. They were moving and rather than taking the cat with them or to the shelter. She wandered around the neighborhood scrounging for water, food and shelter. A neighbor saw her, and rescue her. Now she is beautiful and healthy.', 'darcy.jpg', 0),
(18, 'Dog', '2021-10-19', 'Marius', ' 2.3 Years', 'Male', 'Disfunction legs', 'He was a stray dog. He got rescued because he was got hit by a car. Someone brought him to vet and drop him to us to get a good care.', 'marius.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` varchar(100) NOT NULL,
  `adopter` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `amount` int(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `dated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `adopter`, `type`, `details`, `amount`, `ref`, `dated`) VALUES
('ch_3JvLrMGpwsqBocF81k6YVfyP', 'mos.firdaus@gmail.com', 'Donation', 'Adoption for Nyx', 120, 'cus_KaWv1eJSm8L52Z', '2021-11-13 21:01:32'),
('ch_3JvOtnGpwsqBocF80VbMEbH9', 'mos.firdaus@gmail.com', 'Donation', 'Donation', 103, 'cus_Kaa31gFs17Uxf1', '2021-11-14 00:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adopter` (`adopter`),
  ADD KEY `pet` (`pet`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adopter` (`adopter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopter`
--
ALTER TABLE `adopter`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pet`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`adopter`) REFERENCES `adopter` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`adopter`) REFERENCES `adopter` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
