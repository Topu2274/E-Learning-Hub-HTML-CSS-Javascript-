-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 06:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category`, `title`, `author`, `details`, `img`, `link`) VALUES
(1, 'ieee', 'Demystifying Deep Learning: An Introduction to the Mathematics of Neural Networks', 'Douglas J. Santry', 'Discover how to train Deep Learning models by learning how to build real Deep Learning software libraries and verification software!', 'https://m.media-amazon.com/images/I/61DFCcm5BkL._AC_UL480_FMwebp_QL65_.jpg', 'https://www.amazon.com/s?k=Demystifying+Deep+Learning%3A+An+Introduction+to+the+Mathematics+of+Neural+Networks'),
(2, 'ieee', 'Fundamentals of Computational Intelligence: Neural Networks, Fuzzy Systems, and Evolutionary Computation', 'James M. Keller, Derong Liu, David B. Fogel', 'Provides an in-depth and even treatment of the three pillars of computational intelligence and how they relate to one another.', 'https://m.media-amazon.com/images/I/610eoF2CX4L._SY466_.jpg', 'https://www.amazon.com/Fundamentals-Computational-Intelligence-Evolutionary-Computation/dp/1119214343/ref=sr_1_1?dib=eyJ2IjoiMSJ9.9tNNI_JV5C_IlrCNKkCOmA.1wHIymH3r13YaM7CwysKLNzEPJoap6AwwmDFHJ48MQI&dib_tag=se&keywords=Fundamentals+of+Computational+Intellig'),
(3, 'ieee', 'Engineered to Speak: Helping You Create and Deliver Engaging Technical Presentations', 'Alexa S. Chilcutt, Adam J. Brooks', 'Learn how to create and deliver engaging presentations in the technical domain.', 'https://m.media-amazon.com/images/I/51SS4izvlSL._SY466_.jpg', 'https://www.amazon.com/Engineered-Speak-Process-Driven-Professional-Communication/dp/1119474965/ref=sr_1_1?crid=24MWHH97T6NVR&dib=eyJ2IjoiMSJ9.GPlRKxCQyY6hIzoogmf86Q.1DCDCAPxZ79u66yd_-OvZ3-dUsInSh-TZ59xVUihO9Y&dib_tag=se&keywords=Engineered+to+Speak%3A+He'),
(4, 'ai', 'Artificial Intelligence: A Modern Approach', 'Stuart Russell, Peter Norvig', 'A comprehensive book on AI theory and applications.', 'https://m.media-amazon.com/images/I/61nHC3YWZlL._SL1360_.jpg', 'https://www.amazon.com/Artificial-Intelligence-Modern-Approach/dp/0136042597'),
(5, 'ai', 'The Hundred-Page Machine Learning Book', 'Andriy Burkov', 'A concise introduction to machine learning concepts.', 'https://m.media-amazon.com/images/I/41uPjEenkFL.jpg', 'https://www.amazon.com/Hundred-Page-Machine-Learning-Book/dp/199957950X'),
(6, 'ai', 'Deep Learning', 'Ian Goodfellow, Yoshua Bengio, Aaron Courville', 'An in-depth book on deep learning algorithms and applications.', 'https://m.media-amazon.com/images/I/61AA6wv7ieL._SY445_SX342_.jpg', 'https://www.amazon.com/Deep-Learning-Adaptive-Computation-Machine/dp/0262035618'),
(7, 'math', 'Advanced Engineering Mathematics', 'Erwin Kreyszig', 'A widely used book covering various aspects of engineering mathematics, including differential equations, linear algebra, and vector calculus.', 'https://m.media-amazon.com/images/I/51cacwzYscL._SY445_SX342_.jpg', 'https://www.amazon.com/Advanced-Engineering-Mathematics-Erwin-Kreyszig/dp/0470458364'),
(8, 'math', 'Higher Engineering Mathematics', 'B.S. Grewal', 'This book provides a thorough foundation in mathematics for engineers, covering calculus, matrices, differential equations, and more.', 'https://m.media-amazon.com/images/I/51BdEyV75pL._SY445_SX342_.jpg', 'https://www.amazon.com/Higher-Engineering-Mathematics-B-S-Grewal/dp/8193328493'),
(9, 'math', 'Engineering Mathematics', 'K.A. Stroud', 'A step-by-step approach to solving mathematical problems for engineering students, covering algebra, trigonometry, and calculus.', 'https://m.media-amazon.com/images/I/516jVcqoLQL._SX342_SY445_.jpg', 'https://www.amazon.com/Engineering-Mathematics-K-Stroud/dp/1137031204'),
(10, 'networking', 'Computer Networking: A Top-Down Approach', 'James F. Kurose, Keith W. Ross', 'A comprehensive introduction to networking, covering layered architectures, protocols, and modern networking technologies.', 'https://m.media-amazon.com/images/I/41PRw50Qa-L._SX342_SY445_.jpg', 'https://www.amazon.com/Computer-Networking-Top-Down-Approach-7th/dp/0133594149'),
(11, 'networking', 'Data Communications and Networking', 'Behrouz A. Forouzan', 'An essential book on data communications, covering network protocols, TCP/IP, and network security concepts.', 'https://m.media-amazon.com/images/I/51Q4FQblduL._SX342_SY445_.jpg', 'https://www.amazon.com/Data-Communications-Networking-5th-Behrouz/dp/0073376221'),
(12, 'networking', 'Computer Networks', 'Andrew S. Tanenbaum, David J. Wetherall', 'A detailed guide to networking principles, explaining protocols, architectures, and real-world networking challenges.', 'https://m.media-amazon.com/images/I/41bdzcfQKbL._SX342_SY445_.jpg', 'https://www.amazon.com/Computer-Networks-5th-Andrew-Tanenbaum/dp/0132126958'),
(13, 'robotics', 'Introduction to Autonomous Robots', 'Nikolaus Correll, Bradley Hayes, and David Wettergreen', 'A comprehensive introduction to the fundamental concepts of robotics, including perception, control, and planning.', 'https://m.media-amazon.com/images/I/717FEAdg3dL._SY385_.jpg', 'https://www.amazon.com/Introduction-Autonomous-Robots-Mechanisms-Algorithms/dp/0262047551/ref=sr_1_1?dib=eyJ2IjoiMSJ9.j4fGxV_qWI2OfGJAG2HM7PdBW4t9KoP1nN6XBCZcR_bazFJkGDteNtUMfUZlN48hxEbVy7Am-VAZ8CkhZiGQ3JKv5sjCbyRKIn1E4Qkv1jWgiAioU7yD5qShCR_YoBEM1NncuZMpa'),
(14, 'robotics', 'Robot Modeling and Control', 'Mark W. Spong, Seth Hutchinson, M. Vidyasagar', 'An essential resource for learning about kinematics, dynamics, and control of robotic systems.', 'https://m.media-amazon.com/images/I/71GsoV1YIsL._SY466_.jpg', 'https://www.amazon.com/Robot-Modeling-Control-Mark-Spong/dp/1119523990/ref=sr_1_1?crid=24TN9F40TUHKM&dib=eyJ2IjoiMSJ9.4AwfhMvsDEzQeofI34yuSl-wP_J-1GlJ00HVQ5dl-Vf9YAt46e5rrwbMA8FmKmlFVXHtL3sGadLo0y8DdNXnQtTh4ctJm_-1tJ9Ubh96xl6WaubQJ9onV2B-Bs8rVAl61hxziwwTn'),
(15, 'robotics', 'Probabilistic Robotics', 'Sebastian Thrun, Wolfram Burgard, Dieter Fox', 'A leading book on the probabilistic methods used in robotic perception and decision-making.', 'https://m.media-amazon.com/images/I/41KlEnTbxHL._SX342_SY445_.jpg', 'https://www.amazon.com/Probabilistic-Robotics-INTELLIGENT-ROBOTICS-AUTONOMOUS/dp/0262201623/ref=sr_1_1?crid=EB1VW5K2REC7&dib=eyJ2IjoiMSJ9.qwwDlERdIBCdn3lqPSWwp13VgHy8ISFSaM_TfkEZoJANSlhjqr8ebE300kT-BN6wIcmHqMmadcMVnXn45-fO1-CWkWB7XHZExy0UQ-X5LmncVIsRd2bN-'),
(16, 'machine-learning', 'Machine Learning: A Probabilistic Perspective', 'Kevin P. Murphy', 'A comprehensive guide to probabilistic approaches in ML.', 'https://m.media-amazon.com/images/I/61NfFcHXGxL._SY385_.jpg', 'https://www.amazon.com/Machine-Learning-Probabilistic-Perspective-Computation/dp/0262018020'),
(17, 'machine-learning', 'Deep Learning', 'Ian Goodfellow, Yoshua Bengio, Aaron Courville', 'A foundational book on deep learning concepts and applications.', 'https://m.media-amazon.com/images/I/A10G+oKN3LL._SL1500_.jpg', 'https://www.amazon.com/Deep-Learning-Adaptive-Computation-Machine/dp/0262035618'),
(18, 'machine-learning', 'Pattern Recognition and Machine Learning', 'Christopher M. Bishop', 'An essential resource on statistical pattern recognition and ML.', 'https://m.media-amazon.com/images/I/61ECBlvkBCL._SY445_SX342_.jpg', 'https://www.amazon.com/Pattern-Recognition-Learning-Information-Statistics/dp/0387310738'),
(19, 'programming', 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'A must-read book for software engineers that covers best practices in writing clean and maintainable code.', 'https://m.media-amazon.com/images/I/51E2055ZGUL._SY425_.jpg', 'https://www.amazon.com/Clean-Code-Handbook-Software-Craftsmanship/dp/0132350882'),
(20, 'programming', 'The Pragmatic Programmer: Your Journey To Mastery', 'Andrew Hunt, David Thomas', 'A classic book that teaches essential software development principles and best practices.', 'https://m.media-amazon.com/images/I/41as+WafrFL.jpg', 'https://www.amazon.com/Pragmatic-Programmer-journey-mastery-Anniversary/dp/0135957052'),
(21, 'programming', 'You Don\'t Know JS', 'Kyle Simpson', 'An in-depth exploration of JavaScript, covering core concepts and advanced techniques.', 'https://m.media-amazon.com/images/I/51WIKlio9qL.jpg', 'https://www.amazon.com/You-Dont-Know-JS-Book/dp/B08CJD6L58');

-- --------------------------------------------------------

--
-- Table structure for table `saved_books`
--

CREATE TABLE `saved_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_books`
--

INSERT INTO `saved_books` (`id`, `user_id`, `book_id`, `saved_at`) VALUES
(18, 3, 13, '2025-03-13 17:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','teacher','admin') NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Dhruba', 'dd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin', '2025-03-12 10:36:02'),
(3, 'Student', 'student@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'student', '2025-03-12 11:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_books`
--
ALTER TABLE `saved_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `saved_books`
--
ALTER TABLE `saved_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saved_books`
--
ALTER TABLE `saved_books`
  ADD CONSTRAINT `saved_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `saved_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
