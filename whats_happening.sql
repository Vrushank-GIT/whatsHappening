-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2024 at 08:52 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whats_happening`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventTypeID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `EventDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SubmitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EventTitle` varchar(100) NOT NULL,
  `EventImage` varchar(50) NOT NULL,
  `EventDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventTypeID`, `GroupID`, `EventDate`, `SubmitDate`, `EventTitle`, `EventImage`, `EventDesc`) VALUES
(1, 5, 1, '2024-02-26 00:32:23', '2024-01-04 00:32:23', 'Support Spay and Neuter Day', 'files/images/events/animal1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer iaculis eleifend facilisis. Vestibulum interdum dolor ac nisi eleifend blandit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras volutpat convallis enim eget auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus dignissim mattis orci, malesuada tempus dolor ullamcorper eget. Pellentesque consequat condimentum ligula sed luctus. Sed vel dolor et sapien gravida fringilla sed eu tortor. Quisque pharetra in ipsum nec vehicula. Nam interdum facilisis ligula nec vestibulum.'),
(2, 3, 6, '2024-02-27 00:35:22', '2024-01-11 00:35:22', 'Come Skate on the Oval', 'files/images/events/skate3.jpg', 'Cras lobortis justo felis, a sollicitudin nibh sagittis ac. Maecenas vitae consectetur dolor. Phasellus rhoncus dolor quis lectus commodo congue. Etiam ac convallis nisl. Quisque at leo vel orci tincidunt maximus vitae vel leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ex ex, dignissim a tortor vitae, iaculis aliquam libero. Donec ullamcorper enim nunc, eu ornare metus ornare sed. In in fringilla sapien. Nam iaculis accumsan aliquam. Aenean ac lobortis ex, ut egestas tellus. Etiam neque libero, tempor sed nisi at, egestas eleifend felis. In efficitur nulla quis aliquam pretium. Praesent at diam quis odio rhoncus pellentesque.\r\n'),
(3, 3, 8, '2024-02-28 00:35:22', '2024-01-16 00:35:22', 'Learn to Ski', 'files/images/events/ski6.jpg', 'Donec rutrum elementum diam ac tincidunt. Ut ut velit quis lectus pharetra feugiat a a lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam efficitur dui eget congue congue. Suspendisse tempus, turpis a pellentesque lobortis, dui massa consequat odio, in tincidunt massa ipsum et urna. Suspendisse sapien magna, hendrerit a turpis sed, finibus bibendum ex. Nulla ac sapien aliquam, dignissim metus non, pretium lectus. Sed ac dui non dui venenatis feugiat. Cras viverra bibendum erat, ac vehicula nisl porttitor non. Aliquam quis molestie tortor. Aenean elit libero, ullamcorper vitae tincidunt ac, posuere in ipsum. Duis id feugiat nisi. Donec vestibulum et libero eget pellentesque. Pellentesque ex dui, fermentum at facilisis non, vestibulum vel est. Nunc maximus, felis eu cursus rhoncus, nisi erat pharetra tellus, quis condimentum ligula massa iaculis arcu. Etiam vehicula lacinia scelerisque.\r\n'),
(4, 4, 2, '2024-02-29 00:35:22', '2024-02-02 00:35:22', 'Food/Wine Pairing', 'files/images/events/food1.jpg', 'Aliquam erat volutpat. Praesent condimentum orci erat, eu dapibus velit sagittis id. Ut euismod nec justo in elementum. Fusce consequat lobortis massa at scelerisque. Proin convallis aliquam diam, quis vestibulum leo sagittis vel. Pellentesque tempor nunc eget tempor porttitor. Aliquam finibus ex pellentesque nisi scelerisque congue. Nunc sollicitudin eleifend condimentum. Etiam convallis faucibus consectetur. In pharetra commodo mattis. Integer aliquam diam malesuada est feugiat, non posuere nibh tincidunt. Proin ultrices eleifend arcu nec dictum. Etiam sodales commodo nisi, id molestie nunc volutpat a.\r\n'),
(5, 2, 3, '2024-03-02 00:35:22', '2024-02-19 00:35:22', 'Exhibition of Local Dance', 'files/images/events/dance1.jpg', 'Cras dictum mi nec turpis rutrum, a lacinia nibh aliquam. Cras sed volutpat risus. Proin id purus aliquet, consectetur nunc ac, venenatis mauris. Donec ornare auctor sem at sodales. Proin at commodo ipsum, non fermentum nisl. Sed vitae orci vitae sem fermentum mattis a sit amet diam. Integer turpis urna, finibus at lorem quis, posuere dapibus lacus. Suspendisse consequat nulla tincidunt, scelerisque sem non, congue ante. Pellentesque faucibus commodo condimentum. Pellentesque lobortis et mi tempor mattis. Phasellus eu viverra arcu, vitae dapibus purus.\r\n'),
(6, 5, 4, '2024-03-09 00:35:22', '2024-02-21 00:35:22', 'Local Bands compete to raise funds for national competition ', 'files/images/events/music1.jpg', 'Cras dictum mi nec turpis rutrum, a lacinia nibh aliquam. Cras sed volutpat risus. Proin id purus aliquet, consectetur nunc ac, venenatis mauris. Donec ornare auctor sem at sodales. Proin at commodo ipsum, non fermentum nisl. Sed vitae orci vitae sem fermentum mattis a sit amet diam. Integer turpis urna, finibus at lorem quis, posuere dapibus lacus. Suspendisse consequat nulla tincidunt, scelerisque sem non, congue ante. Pellentesque faucibus commodo condimentum. Pellentesque lobortis et mi tempor mattis. Phasellus eu viverra arcu, vitae dapibus purus.\r\n'),
(7, 5, 1, '2024-06-02 23:35:22', '2024-02-19 00:35:22', 'Meet, Greet and Adapt Day', 'files/images/events/animal3.jpg', 'Nullam dignissim, mi aliquet feugiat tristique, leo ipsum luctus metus, ut dignissim est lectus at magna. Phasellus ultrices egestas sapien, a viverra ex gravida vel. Proin id viverra metus, eu scelerisque turpis. Cras odio ex, gravida ac mauris sed, aliquet aliquam neque. Maecenas viverra hendrerit urna, sit amet dapibus diam tempus sagittis. Nam vel tristique lectus. Nullam vel felis sem. In sodales mauris at turpis posuere hendrerit. Mauris ornare lacus vitae iaculis pretium. Nam nec dolor malesuada, ultricies lacus scelerisque, pulvinar enim. Nulla sagittis metus non velit placerat porta. Nunc aliquam finibus fringilla. Nulla commodo egestas tellus, et tincidunt erat tempor finibus.\r\n'),
(8, 5, 5, '2024-06-25 23:35:22', '2024-02-15 00:35:22', 'Auction of local art to support local artists', 'files/images/events/art1.jpg', 'Cras dictum mi nec turpis rutrum, a lacinia nibh aliquam. Cras sed volutpat risus. Proin id purus aliquet, consectetur nunc ac, venenatis mauris. Donec ornare auctor sem at sodales. Proin at commodo ipsum, non fermentum nisl. Sed vitae orci vitae sem fermentum mattis a sit amet diam. Integer turpis urna, finibus at lorem quis, posuere dapibus lacus. Suspendisse consequat nulla tincidunt, scelerisque sem non, congue ante. Pellentesque faucibus commodo condimentum. Pellentesque lobortis et mi tempor mattis. Phasellus eu viverra arcu, vitae dapibus purus.\r\n'),
(9, 1, 4, '2024-07-29 23:50:10', '2024-02-18 00:50:10', 'Spring concert', 'files/images/events/music2.jpg', 'Nullam dignissim, mi aliquet feugiat tristique, leo ipsum luctus metus, ut dignissim est lectus at magna. Phasellus ultrices egestas sapien, a viverra ex gravida vel. Proin id viverra metus, eu scelerisque turpis. Cras odio ex, gravida ac mauris sed, aliquet aliquam neque. Maecenas viverra hendrerit urna, sit amet dapibus diam tempus sagittis. Nam vel tristique lectus. Nullam vel felis sem. In sodales mauris at turpis posuere hendrerit. Mauris ornare lacus vitae iaculis pretium. Nam nec dolor malesuada, ultricies lacus scelerisque, pulvinar enim. Nulla sagittis metus non velit placerat porta. Nunc aliquam finibus fringilla. Nulla commodo egestas tellus, et tincidunt erat tempor finibus.\r\n'),
(10, 4, 2, '2024-06-30 23:50:10', '2024-02-20 00:50:10', 'Spring Hamper - Get Yours', 'files/images/events/food7.jpg', 'Cras lobortis justo felis, a sollicitudin nibh sagittis ac. Maecenas vitae consectetur dolor. Phasellus rhoncus dolor quis lectus commodo congue. Etiam ac convallis nisl. Quisque at leo vel orci tincidunt maximus vitae vel leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ex ex, dignissim a tortor vitae, iaculis aliquam libero. Donec ullamcorper enim nunc, eu ornare metus ornare sed. In in fringilla sapien. Nam iaculis accumsan aliquam. Aenean ac lobortis ex, ut egestas tellus. Etiam neque libero, tempor sed nisi at, egestas eleifend felis. In efficitur nulla quis aliquam pretium. Praesent at diam quis odio rhoncus pellentesque.\r\n'),
(11, 1, 3, '2024-03-26 14:30:00', '2024-03-12 00:32:13', 'Zoomba Zoomba Zoomba', 'files/images/events/music2.jpg', 'vbasdvbashdbvashdbvhdsbvbhasdv'),
(12, 2, 12, '2024-04-22 14:05:00', '2024-04-05 23:07:38', 'Drift car Show', 'files/images/events/ski6.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)');

-- --------------------------------------------------------

--
-- Table structure for table `eventtypes`
--

CREATE TABLE `eventtypes` (
  `EventTypeID` int(11) NOT NULL,
  `TypeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventtypes`
--

INSERT INTO `eventtypes` (`EventTypeID`, `TypeName`) VALUES
(1, 'Music'),
(2, 'Art+Culture'),
(3, 'Sports'),
(4, 'Food'),
(5, 'Fund Raiser');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` int(11) NOT NULL,
  `GroupName` varchar(100) NOT NULL,
  `GroupImage` varchar(50) NOT NULL,
  `GroupType` varchar(100) NOT NULL,
  `GroupDesc` text NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `ContactEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `GroupName`, `GroupImage`, `GroupType`, `GroupDesc`, `ContactName`, `ContactEmail`) VALUES
(1, 'Human Society', 'files/images/Groups/HumanSociety.jpg', 'Animal Shelter', 'Nullam id pellentesque ante. Vestibulum in convallis mauris.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem. Curabitur eleifend maximus finibus. Phasellus sagittis porttitor augue ut commodo.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem. ', 'Petra Barn', 'pb@hs.com'),
(2, 'Eat Local', 'files/images/events/skate3.jpg', 'files/images/Groups/EatLocal.jpg', 'Aenean odio ante, efficitur vel porttitor id, imperdiet ut urna. Ut tincidunt nibh sapien, nec interdum eros fringilla in. Cras accumsan rutrum arcu ac congue. Integer finibus velit eu elementum rutrum.', 'Joe Farm', 'joe@farms.com'),
(3, 'Dance NS', 'files/images/Groups/DanceNS.jpg', 'Dance for Youth', 'Sed sit amet urna sed nisl lobortis pharetra sit amet at nulla. Nulla euismod elit in mauris dignissim auctor. Aenean a diam non turpis mollis auctor ac quis est.', 'Ami Glen', 'ami@NSD.com'),
(4, 'Youth Band', 'files/images/Groups/YouthBand.jpg', 'Promotes Local School Bands', 'Ut ligula metus, pretium non dapibus dictum, rutrum at magna. Pellentesque et lorem in diam pharetra cursus eget et ex. Integer finibus velit eu elementum rutrum.', 'Drum Trumpet', 'DT@band.com'),
(5, 'Nocturne Association', 'files/images/Groups/Nocturne.jpg', 'Showcasing and supporting local art', 'Quisque vel rutrum est. Donec in turpis nec enim tincidunt eleifend vel eu nunc.Varius eget gravida eu, ullamcorper vitae sem.', 'P Blue', 'pb@nocturne.com'),
(6, 'Outdoor Skating Group', 'files/images/Groups/Outdoor_Skate.jpg', 'Organizes outdoor skating', 'Nunc vel commodo sapien. Phasellus ac enim sit amet ligula congue scelerisque sit amet quis tellus.Ut tincidunt nibh sapien, nec interdum eros fringilla in. ', 'Blade Fast', 'bf@rink.com'),
(7, 'NS Soccer Association', 'files/images/Groups/NS_Soccer.jpg', 'Organzies youth soccer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consequat, est et posuere maximus, magna arcu dapibus justo, ac congue dui dui sed tellus. Aliquam bibendum efficitur lacinia. Quisque ac pellentesque turpis', 'Soca Foot', 'soca@soccer.com'),
(8, 'NS Ski School', 'files/images/Groups/NS_Ski.jpg', 'Downhill skiing', 'Aliquam consequat, est et posuere maximus, magna arcu dapibus justo.', 'SK Downing', 'sk@hill.com'),
(11, 'Halifax Jazz Festival', 'files/images/events/music6.jpg', 'Annual Music Festival', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie leo non turpis ultricies, et facilisis mi ullamcorper. Cras tempor ligula quis augue volutpat, et tristique tellus accumsan. Nunc at tellus felis. Nam lacus metus, aliquet non vehicula maximus, lobortis sed ipsum. Nulla pellentesque consectetur pellentesque. Quisque sit amet pretium neque. Donec sagittis magna sed cursus molestie.', 'B.Major', 'major@jazz.ca'),
(12, 'NS Car Show', 'files/images/events/ski2.jpg', 'Car Festival', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'P. Vroom', 'vroom@nscarshow.ca');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `AccountID` int(11) NOT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`AccountID`, `GroupID`, `Username`, `Password`) VALUES
(1, 1, 'humanS', 'abc123'),
(2, 2, 'locals', 'abc123'),
(3, 3, 'dancer', 'abc123'),
(4, 4, 'bands', 'abc123'),
(5, 5, 'noctume', 'abc123'),
(6, 6, 'skate', 'abc123'),
(7, 7, 'soccer', 'abc123'),
(8, 8, 'skiNS', 'abc123'),
(11, 11, 'jazzyB', 'abc123'),
(12, 12, 'carNS', '$2y$10$qSN81LKzh13E5g3dmWeFeOmxrWcTHDH7RfrQBdtBP4gTLGEQHhWc6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `EventTypeID` (`EventTypeID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- Indexes for table `eventtypes`
--
ALTER TABLE `eventtypes`
  ADD PRIMARY KEY (`EventTypeID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `GroupID` (`GroupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `eventtypes`
--
ALTER TABLE `eventtypes`
  MODIFY `EventTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`EventTypeID`) REFERENCES `eventtypes` (`EventTypeID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
