-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2016 at 08:50 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.6-1ubuntu1.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `titantrackr`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE IF NOT EXISTS `exercise` (
  `exerciseID` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `muscleGroupID` int(11) NOT NULL,
  `difficulty` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `force` varchar(50) NOT NULL DEFAULT 'Push',
  `pictureUrl` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`exerciseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exerciseID`, `name`, `muscleGroupID`, `difficulty`, `type`, `force`, `pictureUrl`) VALUES
(1, 'Incline Press', 1, 'Beginner', 'Dumbells', 'Push', 'images/content/chest.jpg'),
(2, 'Flat Press', 1, 'Beginner', 'Dumbells', 'Push', 'images/content/chest.jpg'),
(3, 'Flyes', 1, 'Beginner', 'Machine/Dumbells', 'Push', 'images/content/chest.jpg'),
(4, 'Butterfly', 1, 'Beginner', 'Machine', 'Push', 'images/content/chest.jpg'),
(5, 'Cable Crossover', 1, 'Beginner', 'Machine', 'Push', 'images/content/cable-crossover.jpg'),
(6, 'Decline ', 1, 'Intermediate', 'Machine/Dumbells', 'Push', 'images/content/chest.jpg'),
(7, 'Deadlift', 2, 'Intermediate', 'Olympic Bar', 'Pull', 'images/content/deadlift.jpg'),
(8, 'Lat Pulldown', 2, 'Beginner', 'Machine', 'Pull', 'images/content/back.jpg'),
(9, 'Wide Grip Pull-up', 2, 'Intermediate', 'Body Only', 'Pull', 'images/content/widepull-ups.jpg'),
(10, 'Dumbell Bent-over row', 2, 'Beginner', 'Dumbells', 'Pull', 'images/content/bentoverrow.jpg'),
(11, 'Pull-ups', 2, 'Intermediate', 'Body Only', 'Pull', 'images/content/pullups'),
(12, 'Dumbell Bicep Curl', 3, 'Beginner', 'Dumbells', 'Pull', 'images/content/biceps.jpg'),
(13, 'Hammer Curls', 3, 'Beginner', 'Dumbells', 'Pull', 'images/content/hammercurls.jpg'),
(14, 'Machine Preacher Curls', 3, 'Beginner', 'Machine', 'Pull', 'images/content/preachercurls.jpg'),
(15, 'Zottman Curl', 3, 'Beginner', 'Dumbells', 'Pull', 'images/content/zottomancurl.jpg'),
(16, 'Dips', 4, 'Intermediate', 'Body Only', 'Push', 'images/content/dips.jpg'),
(17, 'Machine Triceps Extension', 4, 'Beginner', 'Machine', 'Push', 'images/content/tricepextenstion.jpg'),
(18, 'JM Press', 4, 'Intermediate', 'Olympic Bar/Machine', 'Push', NULL),
(19, 'Triceps Pushdown', 4, 'Intermediate', 'Machine', 'Push', NULL),
(20, 'Arnold Dumbell Press', 5, 'Beginner', 'Dumbells', 'Push', NULL),
(21, 'Machine Shoulder Press', 5, 'Beginner', 'Machine', 'Push', NULL),
(22, 'Barbell Rear Delt Row', 5, 'Intermediate', 'Barbell', 'Push', NULL),
(23, 'Reverse Machine Press', 5, 'Beginner', 'Machine', 'Push', NULL),
(24, 'Lateral Raises', 5, 'Beginner', 'Dumbells', 'Push', NULL),
(25, 'Shrugs', 5, 'Intermediate', 'Dumbells', 'Push', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gymactivity`
--

CREATE TABLE IF NOT EXISTS `gymactivity` (
  `gymActivityID` int(11) NOT NULL AUTO_INCREMENT,
  `workoutExerciseID` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `repititions` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`gymActivityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `gymactivity`
--

INSERT INTO `gymactivity` (`gymActivityID`, `workoutExerciseID`, `username`, `repititions`, `weight`, `time`) VALUES
(96, 2, 'sam123', '24', '20', '360'),
(116, 10, 'sam123', '24', '5', '140'),
(117, 10, 'sam123', '24', '5', '140'),
(118, 10, 'sam123', '24', '5', '140'),
(119, 10, 'sam123', '24', '5', '140'),
(121, 8, 'sam123', '33', '85', '200'),
(123, 8, 'sam123', '15', '80', '120'),
(124, 28, 'ken123', '10', '40', '200'),
(168, 38, 'sam123', '30', '12', '200'),
(169, 38, 'sam123', '30', '12', '200'),
(170, 38, 'sam123', '30', '12', '200');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'test_user', 'test@example.com', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef'),
(2, 'james', 'james@test.com', '0017586bcec6b7575bbdfa42c4a37f1f590fdb55a677b8f2c0f7a9d0e13e58f0e62b1d29524bece74da2e54f8cb7a4e7a1b41b1afc4961438986e3de31a34ae5', '50591f3425cd01bb31605f248c15aa1dedb54ef5f53e6906723fa99058e4ef3ddbfe1ce76d197e9ba35e8e60f82ada12aa21e1936d62478a1a402a111ee74bea'),
(3, 'testing', 'test@test.com', '8c6bf8c9dfdb435a761794adb4eb8481b844a758c05cdb3a197a686d567e9a851a117e9a85e5316f153bf5c0fcbb8c5a39d19c19ceefab97b1a63949b552e122', '0ce73c3b7da61372e0fd614b717c8d172433aff663aeb0c4f2f41de209800f59db55a10a6ddab2e76324f80c31c47c9753f82b757ea38d6609ffb8d9c42f88fe'),
(4, 'sam123', 'sam123@test.com', '5c9e8e7ac052c2756c92405e2f59aafda232c0bf37f848a2523516103f094bc61d8af6270385c7b72f7fd248ef0c99c9f77d5e8c13f5108e54d2bc649d70d7c5', '594ab24b6170ba30ccbd26bc210eb960eb06927ada86dd59c0d3b19ebb043066b70babf0e7310f182459c4da9464defd2d1180e60e5ba52952d607a090e6a4cd'),
(5, 'sambc49@gmail.com', 'sambc49', 'cdce16ddc9e424f0d3c92583d3d37897b4fd1ca5358250757c7064cc434d138905c5a1de794769132782a5e9c8b00641057b6a10b5aaf089fa2f229afbab62df', '5a30f7a1ad18c65d70dd26cf440ed7f0a71ecb4036c6246318cfea338a24746be98a0461cf6321a9b3920ac8fd26fd2651dd8703c5a25a0177a03769bfeacbc5'),
(6, 'samtesting@test.com', 'samtesting', 'd636bf72ffaa74592585f8fea4d0a0630b0330d64df2ab78f58d40062c0a9f2d139778a9ce36ef7ccf7e6e16d54c23a8079ca8dcb559956949e7e92a7aa000a4', '8b3b799bdfb9202b14c91faa8922915d2959fb3125c3d6c5ce7a497d7383dc0d8e9485856005c7f0cd05d22a67439537ff980d6fcf3123ab0d826770a0cae35d'),
(7, 'proojfjd', 'hfjdjd@nsn.com', 'b966b2dcdd37b05c8e5f169a0ee8d15dcd2d5475c6f83604aa4003ff073b2ceeebdad3bad51ba38c02798ffeb7718ee72d4b838a47360b68dc97d398155ef176', '9b2628fe1ba5c12493d547ae936d9204b90a14d9f99ab2c868e8dfaac2c8205aae440d4f5ab8b90e43b289a26a1bd68fe9febaa28190f71863bb1c53f9ae60f8'),
(8, 'mytest', 'mytestemail@mail.com', 'a2a5be6bbdc38135ecb51f9cbee59da8f436245208f534e2adaccf5f3f681de99433dbf329d04fdfc0cf328ffb4434043b910ff463324a8678fb397b252daa94', '504f3ebb8c0bac28bc016d28fbc845aaeace2a6e4b55c26fb1e994e24180dde88a0151d7ebe424554e6e1e09595e9e6e2f9db7e439f2ab05b4700a096a9a79ce'),
(10, 'james123', 'james123@test.com', '69b028293acef865dbef1e14d554a930e70aff187fcf8786089d206313ba28a3803ef5bd99b1d28d1ea04834ef0ce41876e06027274db220622f56e57a9715ad', '39d0b9fdbe34e84451a11993ffd3b126e77521152ae9b05d8f6adf9a4effcb5d44abfe3959842120ec64e47e2463388ce9ec764d71d451cbadecb89b74d6ea16'),
(11, 'rob123', 'rob123@test.com', 'b49260a0c93bc4af310a280ace375fed7a5e009cd3c981de81011861b10ed9a61c3298b4799fde1c34381e11b329f68b246b819a57f9325d07b58ebfba817f30', '73c85a599a470dd5009434dcaa1366a50819826ba90f0219692c3bc3da785583c6868ef408fc8c3a14b9feeb3cbded695bfdf57e571da1b1526bd3645477aecf'),
(12, 'greg123', 'greg123@hotmail.com', '7958446b068940a1877a17e90b20492b44d1ec4715c09e3c43bf7f3551e331c3e5f0016fb0074c753261be607fb716c6997d6cee3ec68ed4e78794f830e708ea', '25b6cf282b045c3a0f6bcc77d8c1d9e81406edc8be1150d7d36cf62367e55fc9bea6e4fac6618a309677b93d4ba7904376fe0085f23c54422a897583cf5bb54a'),
(13, 'sam12345', 'sam12345@test.com', 'b48775e16aaa0b672e9fd389996afacccf70d6d9f2f72bca88bd388d560e9d450652bf38535923e8dd02e3dbf4b7b96efdf2152b097766a28ca56e339e87697d', '21d2203dfad8311200d16b3326112814d19f5091d6d71b28466a504f51c68aa76369ab95b5a3797631a36492a2e76e9ddf90bebb626fc6aea00445dac5be93a5'),
(14, 'nick123', 'nick123@test.com', '9d24a5cec8c9d76f0082fe21bd96b094b75b2120ffc0465cfafeaf59a70d8443a47ff75579548a20edecb49b23a173ea610bed13f8d88aad7f07c188c928c1c5', 'a498b7d3ae034dec96e581e3c58fd02d18fded4339d89ae34819fadbf844d7b9d21fb8867b7ffa6533a826ed43de35f8dae6821c6e38e5f9181544883608284f'),
(15, 'hello123', 'hello123@test.com', '10ed8fb7caaa95611c69be1aa864f5f3e5f39f043454efe6afa4f20536a464403984a6ea94ca6c1e0c2844fe5c16161a686a63b600c57e8773231500dd710790', 'ab9804d4e4289e24a735876cc7ba50180a762dac99c6d19f68c4451a2738a9a65a04eaa6fad753082a48f2631ddc7acd1159235765b10956c457f9390e489959'),
(16, 'lsfnaln', 'nfdn123@test.com', '5979983c5ff155a8f8e6a9acf62acc979d9d96146df77c118b6c218a7b2579a3c2f665a39693248d4f09bc8fb69a0bcc2e8712fe2ebb1dd3d3dbf3d514bbfc08', 'e7dabbcc15d7c7c0f3db4be7308e690754132dc1894fdd8cebe81e3c63e82a47446e5b3aaf892b11d05ec4d9402677a9f35c5092d09780025fd3a6f32c7b1d09'),
(17, 'ken123', 'kengwilliam@hotmail.co.uk', '19da2f0602aac395d1855e6cdf55cf719aa72200b124927aa40edf52751f1559f86401624d47dce94a5f5665906d1eed6b8932256cbd4535a494b861b78ed430', '50403447bb2104e6ec8ea0ed7e2162474b0e2e9ee5f69b7c5f71416b865b888e4b01adacbfceb9bfe2cea8028efe3987fc65363db120279f80417c01f0d8554d'),
(18, 'nick', 'nick@email.com', 'a9fedffe00e5afc6a10fd37055cff5f9f51a3287f74fa2637be9c516171ddebde38a4dd3403251891484963314de5cf85ddc4f84aeaf12f08f711cb5625dce2f', '6dee8a7a77503157f52ea24d0a71aae160799bdee0439917f6ed8ccb1c5b96dbcf9a317c3d311f97520d8e5fe260824f954962380849cd1c37095685f7669f95'),
(19, 'benjiew', 'benjie.ward@williamsf1.com', '9bd38f95905fb512221991e568c4e82666b2805b721fd2373ea6ce6afc9f7fc3e034148347f02dcc7b15bab5630abc784baacc987176fce8db9e69079974e396', 'f659aa8f41875643179246a87808aa802abfb82a3c5045e3eeb3cad0f8c26aa549c0f0a3d5a192bc4808b7081440186be9a31fe401ef651ca72e8a5f8f2b477a');

-- --------------------------------------------------------

--
-- Table structure for table `muscleGroup`
--

CREATE TABLE IF NOT EXISTS `muscleGroup` (
  `muscleGroupID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pictureUrl` varchar(250) NOT NULL,
  PRIMARY KEY (`muscleGroupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `muscleGroup`
--

INSERT INTO `muscleGroup` (`muscleGroupID`, `name`, `pictureUrl`) VALUES
(1, 'Chest', 'images/content/chest.jpg'),
(2, 'Back', 'images/content/back.jpg'),
(3, 'Biceps', 'images/content/biceps.jpg'),
(4, 'Shoulders', 'images/content/shoulders.jpg'),
(5, 'Triceps', 'images/content/triceps.jpg'),
(6, 'Abs', 'images/content/abs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `street` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `county` varchar(250) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `goal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `username`, `password`, `salt`, `title`, `firstname`, `surname`, `address1`, `street`, `city`, `county`, `postcode`, `dob`, `weight`, `height`, `goal`) VALUES
(25, '', '', '0017586bcec6b7575bbdfa42c4a37f1f590fdb55a677b8f2c0f7a9d0e13e58f0e62b1d29524bece74da2e54f8cb7a4e7a1b41b1afc4961438986e3de31a34ae5', '50591f3425cd01bb31605f248c15aa1dedb54ef5f53e6906723fa99058e4ef3ddbfe1ce76d197e9ba35e8e60f82ada12aa21e1936d62478a1a402a111ee74bea', '', '', 'gwilliam', 'Fairfield', 'Aston Munslow', 'Craven Arms', 'Shropshire', 'ST16 3SD', '1991-06-28', 75, 178, 'Strength Training'),
(26, '', '', '3149a699f9378ddf4508b24163a41f4339d46ed765a84f364259f0cd8a78564f837b10d9bd5e0e49ea22a1251f765afbbf45da73af0b24ebd2e689d4cd677f5c', 'salt', '', '', 'gwilliam', 'Fairfield', 'Aston Munslow', 'Craven Arms', 'Shropshire', 'ST16 3SD', '1991-06-28', 75, 178, 'Strength Training'),
(27, '', '', '8c6bf8c9dfdb435a761794adb4eb8481b844a758c05cdb3a197a686d567e9a851a117e9a85e5316f153bf5c0fcbb8c5a39d19c19ceefab97b1a63949b552e122', '0ce73c3b7da61372e0fd614b717c8d172433aff663aeb0c4f2f41de209800f59db55a10a6ddab2e76324f80c31c47c9753f82b757ea38d6609ffb8d9c42f88fe', '', '', 'gwilliam', 'Fairfield', 'Aston Munslow', 'Craven Arms', 'Shropshire', 'ST16 3SD', '1991-06-28', 75, 178, 'Strength Training'),
(28, 'sam123@test.com', 'sam123', '5c9e8e7ac052c2756c92405e2f59aafda232c0bf37f848a2523516103f094bc61d8af6270385c7b72f7fd248ef0c99c9f77d5e8c13f5108e54d2bc649d70d7c5', '594ab24b6170ba30ccbd26bc210eb960eb06927ada86dd59c0d3b19ebb043066b70babf0e7310f182459c4da9464defd2d1180e60e5ba52952d607a090e6a4cd', 'mr', 'Sam', 'Gwilliam', 'Fairfield', 'Aston Munslow', 'Craven Arms', 'Shropshire', 'ST16 3SD', '1991-06-28', 6, 178, 'Strength Training'),
(29, 'mytestemail@mail.com', 'mytest', 'a2a5be6bbdc38135ecb51f9cbee59da8f436245208f534e2adaccf5f3f681de99433dbf329d04fdfc0cf328ffb4434043b910ff463324a8678fb397b252daa94', '504f3ebb8c0bac28bc016d28fbc845aaeace2a6e4b55c26fb1e994e24180dde88a0151d7ebe424554e6e1e09595e9e6e2f9db7e439f2ab05b4700a096a9a79ce', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'jamesdowell@test.com', 'jamesdowell', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '324877399abb74cc2a9fd22a3c5f4d8801f13e3de624bb2d963586f3901faba213309da300d2df824968dbaca3303a66870a771d43e6f49af4709a7252db10a3', 'mr', 'James', 'Dowell', 'Fairfield', 'Stafford street', 'Stafford', 'Staffordshire', 'ST16 3SD', '2014-03-31', 55, 170, 'Weight Loss'),
(35, 'test123@test.com', 'test', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '204ae6163609bc2075badd0c848faf712c484f995ba98d71dd50f080c8c67437346c5c4090e2c2a6a4f7f105c4c67f250ae679c0fe637c3ff3a7c693e65ca902', 'mr', 'Sam', 'lknflnkl', 'nkl', 'nkl', 'nkl', 'nklnkl', 'nlknkl', '2014-03-31', 55, 134, 'Strength Training'),
(38, 'nick@email.com', 'nick', '30b5c8859959cf1972a420e475865e847668615a5e4ceae629db5c56bd4904dffe73fae048a8c6b19ae72ab147348a2148259388818a90f072e63b9fe98150ff', 'deb19e59aab19aa918034d7fb4b1266b0b28b8f93d33dffee656c924d23cedf0d20ae5088a013e385f360edae2a10678e130cf7845d81fa12bdc940406781f9b', '', 'nick', 'nick', 'and', '123fdgdfgd', '123', '<script>alert(', 'abc 123', '2014-04-11', 61, 61, 'Strength Training'),
(39, 'joe@test.com', 'joe123', 'f7d709a8823916db01d592a578d8ecf1e33144eaae8e1b0ab686be72a74b541320912985fbbf63312cd6d39636dfa7efe13b1d647f568666fb135d0a42266f84', '74af6ec60d2fb4db17ab9aaec78a037ef6d2e0e9e58e975b625b746d0a7c9af2ca1d7f08b7cbb705250f340abf0390a683b2593970814714c6d17bf885c5c051', 'mr', 'fg', 'i', 'ikhk', 'k', 'kj', 'nkj', 'gdfsd', '2014-03-31', 55, 154, 'Strength Training'),
(40, 'joe@test.com', 'joe123', 'fde91d6f31c533bceaa2cbc253bd980482583bb432433c71493937db78b2bc0e33043e8e9a0c1f7e5759bbd2f94c31b0697fcff9b565004eeef71e0c75dcfb3a', '642366606ec734728a7a9e7baf522a170b9032f235a03b3ab10fbfe4ad5fb9a251712f7c26e98cfe93e7d20a78e976eea350fc857dc8d5f0a8f15b73b33f580d', 'mr', 'fg', 'i', 'ikhk', 'k', 'kj', 'nkj', 'gdfsd', '2014-03-31', 55, 154, 'Strength Training'),
(42, '', '', '10a027f3eb74e30bf349a91a4842af5147ab55d7a30122c3865e0045284a0882d11e1c011af050075ba31079c33adc232e7a736652ae40edfc5954e2559255b7', 'df4712d5271c7a869b7614b5cee6f8ac42f50dcd8aa14cb081796e280feb50efaf3470f11c989ff659bd6331ff13d4e96218f57a16ae6dad9024d8aea48beb9b', 'mr', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'Choose your goal:'),
(44, 'rob123@test.com', 'rob123', 'b49260a0c93bc4af310a280ace375fed7a5e009cd3c981de81011861b10ed9a61c3298b4799fde1c34381e11b329f68b246b819a57f9325d07b58ebfba817f30', '', '', 'Rob', 'Simpson', 'Brookstone', 'Cannock Road', 'Cannock', 'Staffordshire', 'ST134HG', '2014-04-01', 73, 180, 'Strength Training'),
(45, 'greg123@hotmail.com', 'greg123', '7958446b068940a1877a17e90b20492b44d1ec4715c09e3c43bf7f3551e331c3e5f0016fb0074c753261be607fb716c6997d6cee3ec68ed4e78794f830e708ea', '25b6cf282b045c3a0f6bcc77d8c1d9e81406edc8be1150d7d36cf62367e55fc9bea6e4fac6618a309677b93d4ba7904376fe0085f23c54422a897583cf5bb54a', 'Mr', 'Greg', 'Borg', '4 ', 'Lovell Drive', 'Stafford', 'Staffordshire', 'ST16 3SD', '2014-04-17', 150, 189, 'Weight Loss'),
(46, 'sam12345@test.com', 'sam12345', 'b48775e16aaa0b672e9fd389996afacccf70d6d9f2f72bca88bd388d560e9d450652bf38535923e8dd02e3dbf4b7b96efdf2152b097766a28ca56e339e87697d', '21d2203dfad8311200d16b3326112814d19f5091d6d71b28466a504f51c68aa76369ab95b5a3797631a36492a2e76e9ddf90bebb626fc6aea00445dac5be93a5', 'Mr', 'Sam', 'Gwilliam', 'kjbk', 'bjkbjkb', 'kbkjbkj', 'bjkbkj', 'St163SD', '2014-04-09', 66, 168, ''),
(47, 'nick123@test.com', 'nick123', '9d24a5cec8c9d76f0082fe21bd96b094b75b2120ffc0465cfafeaf59a70d8443a47ff75579548a20edecb49b23a173ea610bed13f8d88aad7f07c188c928c1c5', 'a498b7d3ae034dec96e581e3c58fd02d18fded4339d89ae34819fadbf844d7b9d21fb8867b7ffa6533a826ed43de35f8dae6821c6e38e5f9181544883608284f', 'Mr', 'Nick', 'Patrick', 'hjkh', 'jkhjkhjk', 'hjkhjkh', 'jkhjkh', 'sy79er', '2014-04-15', 55, 187, 'Weight Loss'),
(48, 'hello123@test.com', 'hello123', '10ed8fb7caaa95611c69be1aa864f5f3e5f39f043454efe6afa4f20536a464403984a6ea94ca6c1e0c2844fe5c16161a686a63b600c57e8773231500dd710790', 'ab9804d4e4289e24a735876cc7ba50180a762dac99c6d19f68c4451a2738a9a65a04eaa6fad753082a48f2631ddc7acd1159235765b10956c457f9390e489959', 'Mr', 'gjk', 'gjk', 'jkg', 'jkg', 'jkgjk', 'gjk', 'st163sd', '2014-03-31', 57, 180, 'Weight Loss'),
(49, 'nfdn123@test.com', 'lsfnaln', '5979983c5ff155a8f8e6a9acf62acc979d9d96146df77c118b6c218a7b2579a3c2f665a39693248d4f09bc8fb69a0bcc2e8712fe2ebb1dd3d3dbf3d514bbfc08', 'e7dabbcc15d7c7c0f3db4be7308e690754132dc1894fdd8cebe81e3c63e82a47446e5b3aaf892b11d05ec4d9402677a9f35c5092d09780025fd3a6f32c7b1d09', 'Mr', 'kuh', 'kkj', 'hjkh', 'jk', 'jknjk', 'nkj', 'njknk', '2014-03-31', 67, 189, 'Strength Training'),
(50, 'kengwilliam@hotmail.co.uk', 'ken123', '376d41930cbf9c3a424241acd28bb2d66e0b78fb03e7a1a65c1de123fda3b147c5b7cbea24bb0a0a71c0f9bfd16218819244c91db4ff87789db625cea7abaa3d', 'bdedacd2867ef4adc5714f167ba075fbe8495adfca963a91f9cef2ec9e29bd042d127d02754abdbb8fb8b366b51d75ceb9b14b91d3e2eea7775862ae51134380', '', 'kennio', 'gwilliam', 'fairfield', 'aston munslow', 'craven arms', 'shropshire', 'sy7 9er', '1961-06-17', 60, 170, 'Choose your goal:'),
(51, 'nick@email.com', 'nick', 'cc72c6351a97184d248fa14a1e075a6b1637085a4186bcf7b5b4bd196959138908e87f25ad34261d2834eca412a917ec7332091b235eeb368e74af4fe2d337b8', 'f295c8b72293b5bd6b7d654afb62ccf183d632cf1468baa85d046dbecfdbe40cb152440dba7a43961ec6a394149d606584eba1c5fe0eda4436b287c8c69cad6a', '', 'nick', 'nick', 'and', '123fdgdfgd', '123', '<script>alert(', 'abc 123', '2014-04-11', 61, 61, 'Strength Training'),
(52, 'benjie.ward@williamsf1.com', 'benjiew', '9bd38f95905fb512221991e568c4e82666b2805b721fd2373ea6ce6afc9f7fc3e034148347f02dcc7b15bab5630abc784baacc987176fce8db9e69079974e396', 'f659aa8f41875643179246a87808aa802abfb82a3c5045e3eeb3cad0f8c26aa549c0f0a3d5a192bc4808b7081440186be9a31fe401ef651ca72e8a5f8f2b477a', 'Mr', 'Benjie', 'Ward', '1', '2', '3', '4', 'SL4 5DX', '2015-12-03', 55, 170, 'Strength Training');

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE IF NOT EXISTS `workout` (
  `workoutID` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `workoutType` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`workoutID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`workoutID`, `name`, `workoutType`, `username`) VALUES
(2, '300: Rise of the new you', 'Strength Training', 'sam123'),
(29, 'My first workout', 'Full Body Workout', 'sam123'),
(35, 'Football training', 'Full Body Workout', 'james123'),
(36, 'myworkout', 'Weight Loss', 'ken123'),
(39, 'Arnold Workout', 'Full Body Workout', 'nick'),
(42, 'My new workout', 'Weight Loss', 'sam123');

-- --------------------------------------------------------

--
-- Table structure for table `workoutExercise`
--

CREATE TABLE IF NOT EXISTS `workoutExercise` (
  `workoutExerciseID` int(50) NOT NULL AUTO_INCREMENT,
  `workoutID` int(50) NOT NULL,
  `exerciseID` int(50) NOT NULL,
  PRIMARY KEY (`workoutExerciseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `workoutExercise`
--

INSERT INTO `workoutExercise` (`workoutExerciseID`, `workoutID`, `exerciseID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 1, 6),
(5, 1, 8),
(6, 1, 9),
(7, 1, 3),
(8, 2, 1),
(9, 3, 1),
(10, 2, 5),
(11, 2, 7),
(12, 2, 2),
(13, 1, 16),
(14, 27, 7),
(15, 27, 9),
(16, 27, 1),
(17, 1, 7),
(18, 29, 7),
(19, 29, 8),
(20, 29, 9),
(21, 29, 1),
(22, 29, 2),
(23, 29, 12),
(24, 35, 7),
(25, 35, 8),
(26, 35, 1),
(27, 35, 5),
(28, 36, 8),
(29, 36, 7),
(30, 40, 2),
(31, 40, 8),
(32, 39, 8),
(33, 39, 11),
(34, 39, 7),
(35, 42, 7),
(36, 42, 8),
(37, 42, 1),
(38, 2, 13),
(39, 2, 8),
(40, 42, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
