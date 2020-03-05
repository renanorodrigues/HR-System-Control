-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 27-Jul-2019 às 12:00
-- Versão do servidor: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaldo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE `profiles` (
  `id_profile` int(4) UNSIGNED ZEROFILL NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `profile_page` varchar(255) NOT NULL,
  `profile_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id_profile`, `profile_name`, `profile_page`, `profile_desc`) VALUES
(0001, 'Administrador', 'admin.php', ''),
(0002, 'Funcionário', 'employee.php', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_cpf` varchar(30) NOT NULL,
  `user_rg` varchar(50) NOT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_cellphone` varchar(50) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_birth` date DEFAULT NULL,
  `profile_id` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_fullname`, `user_password`, `user_cpf`, `user_rg`, `user_phone`, `user_cellphone`, `user_address`, `user_birth`, `profile_id`) VALUES
(001, 'Evaldo', 'Evaldo Parente Filho', '$2y$10$30qGVDHQaQ6lYZLDaTVvz.F75vzvGakaf4v8i5Q9BkI.gT1/s2PYO', '655.451.547-78', '5004765057-8', '8532722488', '85989514553', NULL, '1954-06-26', 0001),
(003, 'Rafaela', 'Rafaela dos Santos Chagas', '$2y$10$j/4LujW9eFfL0HF6CumiIOFt/3FAJNfORRD8rhigc4iJZyC.FbeLm', '646.781.445-12', '54965511541511', '(85) 3114-5451', '(85) 96154-5151', 'Avenida Imperador de Santana, 988', '1978-07-28', 0002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id_profile`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
