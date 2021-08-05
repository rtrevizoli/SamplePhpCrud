-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Ago-2021 às 14:41
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tray-homework-php-test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sale`
--

CREATE TABLE `sale` (
  `Sale_Id` int(11) NOT NULL,
  `Sale_Vendor_Id` int(11) NOT NULL,
  `Sale_Value` double NOT NULL,
  `Sale_Date` date NOT NULL,
  `Sale_Status_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sale`
--

INSERT INTO `sale` (`Sale_Id`, `Sale_Vendor_Id`, `Sale_Value`, `Sale_Date`, `Sale_Status_Id`) VALUES
(2, 2, 50, '2021-08-02', 1),
(3, 3, 80, '2021-07-04', 1),
(4, 3, 50, '2021-07-30', 1),
(5, 3, 30, '2021-08-05', 1),
(6, 3, 900, '2021-08-03', 1),
(7, 7, 1000, '2021-08-05', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `User_Password` varchar(70) NOT NULL,
  `User_Role_Id` int(1) NOT NULL,
  `User_Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`User_Id`, `User_Email`, `User_Name`, `User_Password`, `User_Role_Id`, `User_Created`) VALUES
(1, 'rtrevizoli@yahoo.com.br', 'Rafael Trevizoli', 'teste123', 1, '2021-08-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendor`
--

CREATE TABLE `vendor` (
  `Vendor_Id` int(11) NOT NULL,
  `Vendor_Name` varchar(50) NOT NULL,
  `Vendor_Email` varchar(70) NOT NULL,
  `Vendor_Phone` varchar(15) NOT NULL,
  `Vendor_Sales` int(30) NOT NULL,
  `Vendor_Status_Id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendor`
--

INSERT INTO `vendor` (`Vendor_Id`, `Vendor_Name`, `Vendor_Email`, `Vendor_Phone`, `Vendor_Sales`, `Vendor_Status_Id`) VALUES
(1, 'Fernando', 'ftrevizoli@gmail.com', '12992567087', 1000, 1),
(2, 'Mark', 'motto@mdo.com', '12992567087', 500, 1),
(3, 'Zaramir', 'zjunes@bol.com', '12992567087', 700, 1),
(4, 'Larry the Bird', 'lnoi@twitter.com', '12997112910', 200, 1),
(6, 'Zezinho', 'zjadeson@gmail.com', '12992567087', 0, 1),
(7, 'Ana Flavia', 'trevizoliana@gmail.com', '12997112910', 0, 1),
(8, 'Machado', 'mAxe@ig.com', '12992567087', 0, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Sale_Id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- Índices para tabela `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`Vendor_Id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sale`
--
ALTER TABLE `sale`
  MODIFY `Sale_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendor`
--
ALTER TABLE `vendor`
  MODIFY `Vendor_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
