-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Dez-2018 às 20:49
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mssg` text NOT NULL,
  `cdate` date NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`mid`, `name`, `mobile`, `email`, `mssg`, `cdate`) VALUES
(3, 'Judas', '+5592991408932', 'judas@gmail.com', 'tem gente que ganha respeito de judas no quesito de traiÃ§Ã£o.', '2018-12-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordrs`
--

DROP TABLE IF EXISTS `ordrs`;
CREATE TABLE IF NOT EXISTS `ordrs` (
  `myid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `ordr` varchar(200) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `sts` varchar(20) NOT NULL,
  `cdate` date NOT NULL,
  PRIMARY KEY (`myid`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordrs`
--

INSERT INTO `ordrs` (`myid`, `uid`, `img`, `name`, `mobile`, `email`, `addr`, `ordr`, `pr`, `sts`, `cdate`) VALUES
(28, 3, 'images/99.jpg', 'dddd', '+4354354', 'dd@gmail.com', 'sdsdefd', 'Photoshop', '$100', 'Pendente', '2017-10-16'),
(27, 3, 'images/11.jpg', 'dd done', '+64143434', 'dd@gmail.com', 'dd new order Taxes America', 'CSS ', '$200', 'Despachado', '2017-10-16'),
(26, 2, 'images/11.jpg', 'David ', '+374341', 'david@gmail.com', 'My new NY Address David America', 'CSS ', '$200', 'Despachado', '2017-10-16'),
(42, 4, 'images/23.jpg', 'thelsandro', '', 'thelsandro.antunes@gmail.com', '', 'Advanced', 'R$500', 'Pending', '2018-12-19'),
(43, 6, 'images/43.jpg', 'maria', '', 'maria@hotmail.com', '', 'DragÃ£os de Ã‰ter', 'R$ 37', 'Pending', '2018-12-20'),
(31, 2, 'images/11.jpg', 'rr', 'rr', 'rr', 'rrr', 'CSS ', '$200', 'Pendente', '2017-10-19'),
(34, 2, 'images/16.jpg', 'jj', '+54135441', 'jj@example.com', 'fdfdsffs', 'Blogger', '$200', 'Pendente', '2017-10-19'),
(35, 1, 'images/15.jpg', 'admin', '+55555555', 'admin@example.com', 'customerbehalf link access ', 'PHP ', '$400', 'Dispatched', '2017-10-19'),
(36, 4, 'images/01.jpg', 'thelsandro', '+559839483989', 'thelsandro.antunes@gmail.com', '', '1808', 'R$45', 'Dispatched', '2018-12-18'),
(37, 4, 'images/01.jpg', 'thelsandro', '', 'thelsandro.antunes@gmail.com', '', '1808', 'R$45', 'Pendente', '2018-12-18'),
(38, 4, 'images/25.jpg', 'thelsandro', '', 'thelsandro.antunes@gmail.com', '', 'Ad HTML ', 'R$300', 'Pendente', '2018-12-18'),
(39, 4, 'images/23.jpg', 'thelsandro', '', 'thelsandro.antunes@gmail.com', '', 'Advanced', 'R$500', 'Despachado', '2018-12-18'),
(40, 4, 'images/07.jpg', 'thelsandro', '+559839483989', 'thelsandro.antunes@gmail.com', '', 'O Rei do Inverno', 'R$43', 'Cancelled', '2018-12-19'),
(41, 4, 'images/04.jpg', 'thelsandro', '+551187871212', 'thelsandro.antunes@gmail.com', 'TARUMÃƒ', 'O Jardim das AfliÃ§Ãµes', 'R$89', 'Pending', '2018-12-19'),
(44, 6, 'images/06.jpg', 'maria', '', 'maria@hotmail.com', '', 'O Mï¿½nimo que vocï¿½ precisa saber para nï¿½o ser um Idiota', 'R$115', 'Pending', '2018-12-20'),
(45, 5, 'images/05.jpg', 'santos', '', 'santos@hotmail.com', '', 'O Imbecil Coletivo', 'R$85', 'Pending', '2018-12-20'),
(46, 5, 'images/15.jpg', 'santos', '', 'santos@hotmail.com', '', 'PHP ', 'R$210', 'Pending', '2018-12-20'),
(47, 5, 'images/04.jpg', 'santos', '', 'santos@hotmail.com', '', 'O Jardim das AfliÃ§Ãµes', 'R$89', 'Pending', '2018-12-20'),
(48, 5, 'images/43.jpg', 'santos', '', 'santos@hotmail.com', '', 'DragÃ£os de Ã‰ter', 'R$ 37', 'Pending', '2018-12-20'),
(49, 5, 'images/08.jpg', 'santos', '', 'santos@hotmail.com', '', 'O Inimigo de Deus', 'R$49', 'Pending', '2018-12-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `des` varchar(150) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `cdate` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`pid`, `img`, `name`, `des`, `pr`, `cdate`) VALUES
(23, 'images/18.jpg', 'novo produto', 'teste', 'R$ 400', '2017-10-16'),
(15, 'images/14.jpg', 'JavaScript', 'best JS courses', 'R$200', '2017-19-12'),
(16, 'images/15.jpg', 'PHP ', 'PHP training courses', 'R$210', '2018-12-19'),
(13, 'images/12.jpg', 'HTML Course', 'best courses in urdu Hindi', 'R$200', '2017-10-16'),
(18, 'images/16.jpg', 'Blogger', 'Blogger course', 'R$250', '2017-10-16'),
(12, 'images/11.jpg', 'CSS ', 'Learn Cascading Style with project in Urdu Hidni', 'R$170', '2018-12-19'),
(25, 'images/23.jpg', 'Advanced', 'JavaScrip Advanced Curses', 'R$500', '2017-10-19'),
(26, 'images/25.jpg', 'Ad HTML ', 'Learn new HTML course', 'R$300', '2017-10-19'),
(28, 'images/01.jpg', '1808', 'Autor: Laurentino Gomes', 'R$45', '2018-12-19'),
(30, 'images/02.jpg', '1822', 'Laurentino Gomes', 'R$43', ''),
(32, 'images/03.jpg', '1889', 'Laurentino Gomes', 'R$47', ''),
(34, 'images/04.jpg', 'O Jardim das AfliÃ§Ãµes', 'Olavo de Carvalho', 'R$89', '2018-19-12'),
(36, 'images/05.jpg', 'O Imbecil Coletivo', 'Olavo de Carvalho', 'R$85', ''),
(37, 'images/06.jpg', 'O Mínimo que você precisa saber para não ser um Idiota', 'Olavo de Carvalho', 'R$115', ''),
(39, 'images/06.jpg', 'Excalibur', 'Bernard Cornwell', 'R$42', ''),
(41, 'images/07.jpg', 'O Rei do Inverno', 'Bernard Cornwell', 'R$43', ''),
(43, 'images/08.jpg', 'O Inimigo de Deus', 'Bernard Cornwell', 'R$49', ''),
(45, 'images/43.jpg', 'DragÃ£os de Ã‰ter', 'Rafael Draccon', 'R$ 37', '2018-12-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$ujej4UpRJsbf3ETJRrqg8uQ7pBv4HX5w77dho8cD9t8zVK/zt75Na', '2018-12-20 14:34:28'),
(6, 'maria', 'maria@hotmail.com', '$2y$10$VNd5Q6O3KhjGdkGoNBs6vu0VunmqHqe14Kl2TKig9b9VrFclTquc.', '2018-12-20 15:40:10'),
(5, 'santos', 'santos@hotmail.com', '$2y$10$cmad41OsbnKNO6IxAMG1Ie7wiyvZg2RIUGR8IJjlEP.1A0/NB.aOC', '2018-12-20 14:33:00'),
(4, 'thelsandro', 'thelsandro.antunes@gmail.com', '$2y$10$oRC4FqM9vNHQliWZuRQGBuMpSh8bzvmMysncSPK8Gqo5cfY2rem9W', '2018-12-17 19:23:34'),
(7, 'mateus', 'mateus@exemplo.com', '$2y$10$C6BWcpLMMjbC2uvSCij51uAvLf4fMEuvJ5kTlQI/Njs1bGau29F0i', '2018-12-20 15:44:56'),
(8, 'telsson', 'tellson@gmail.com', '$2y$10$c1/c9yI6lBEEvzPFEqfSJ.MXY6935KVLoMMFedO44BUsIqJ2RzMbm', '2018-12-20 16:07:32'),
(9, 'teste', 'teste@exemplo.com', '$2y$10$7A0ah2ztCPdGtqCX1ymbyuVH1QQlWqC.bN62YzYCRvAsto/F7w2ei', '2018-12-20 19:22:43'),
(10, 'teste2', 'teste2@gmail.com', '$2y$10$q.ShOR6wYsAdx6.Zni5iWeYJ6uy47//jXRGi9gQ78Fj8MNDJ57xu2', '2018-12-20 19:24:52'),
(11, 'teste3', 'teste3@hotmail.com', '$2y$10$e/cO1xrse8Ogn4Di/zU0iOP76flAmRm1m8E9A.q5mP0zxopKz2klq', '2018-12-20 19:30:49'),
(12, '1234', '13@hotmaldfk.com', '$2y$10$rDrGE9JcHOdbuw1LGPY0luCE.mCMxezojoS60wi53s7/duPIIKK/e', '2018-12-20 19:33:00'),
(13, 'teste5', 'testtttt@gmail.com', '$2y$10$.TDaZYgYd9Hte7ACDyBh4.J0h9eFUPIdUBVf.e8/pIB7mKzBtejJ2', '2018-12-20 19:37:21'),
(14, 'maisteste', 'adm@vaivai.com', '$2y$10$kYVR67Z9XrUntHOwaztOIOucREalIGD/uGzl1frzoiKRlAwLMbWRK', '2018-12-20 20:24:10'),
(15, 'aaaa', 'a@hotmail.com', '$2y$10$i7rgW3mcDAH//ldTDY6GpOIOTeSMH3h8fISl4RlE5NgECWvWehCBu', '2018-12-20 20:28:16'),
(16, 'testeasdfasf', 'teststestta@gmila.com', '$2y$10$olumvWGji/Xz.IoG2ZKxVehUSHtjcsmj/rHO6d5KNjngF7GIbm3Gm', '2018-12-20 20:32:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
