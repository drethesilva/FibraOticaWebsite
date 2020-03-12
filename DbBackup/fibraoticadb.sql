-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Mar-2020 às 02:42
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fibraoticadb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudobackoffice`
--

CREATE TABLE `conteudobackoffice` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `typeContent` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudobackoffice`
--

INSERT INTO `conteudobackoffice` (`id`, `nome`, `descricao`, `typeContent`) VALUES
(41, 'Horas Abertura Meo - alerta', ' ', 0),
(40, 'Esclarecimento acessos GRP e AddOnTV envio de SMS', ' ', 0),
(39, 'Clientes classe net igual a 100', ' ', 0),
(38, 'Auto ConfiguraÃ§Ã£o', 'Outubro 2019', 0),
(42, 'Quick Guide', 'Pre Registo', 0),
(43, 'SMS de Atividades Executadas em Field Force', ' ', 0),
(44, 'AlteraÃ§Ãµes de box para VTV', 'AtualizaÃ§Ã£o processo', 1),
(45, 'BLU - ConfiguraÃ§Ã£o Base', 'ZTE ZXHN H298N_V1.2', 1),
(46, 'cliente ausente ser obrigatÃ³rio em todas as intervenÃ§Ãµes', ' ', 1),
(47, 'Cliente Media room', ' ValidaÃ§Ã£o dados Ã¡rea cliente', 1),
(48, 'Emparelhamento do comando da VBox com a TV', ' ', 1),
(58, 'Live Mobile apk', 'http://127.0.0.1/FibraOtica/FibraOticaWebsite/Files/livemobilev33 (1).apk', 1),
(59, 'Manual de preenchimento de guia de intervenÃ§Ã£o', '2015', 1),
(60, 'Manual SeguranÃ§a_Rev02.pdf', 'http://127.0.0.1/FibraOtica/FibraOticaWebsite/Files/Manual SeguranÃ§a_Rev02.pdf', 1),
(61, 'MigraÃ§Ã£o plataforma TV', 'Processo VTV', 1),
(62, 'Os IP e pass ONT Dst VDF', ' ', 1),
(63, 'Regras de ligaÃ§Ã£o de Box VTV por WiFi', ' ', 1),
(64, 'report cliente ausente ef', ' ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudoexcell`
--

CREATE TABLE `conteudoexcell` (
  `id` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Problema` text NOT NULL,
  `Idade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudoexcell`
--

INSERT INTO `conteudoexcell` (`id`, `Nome`, `Problema`, `Idade`) VALUES
(12, 'Miguel Boavida', 'Testar Golo', 17),
(11, 'Luis Boavida', 'Queria Trabalhar', 18),
(13, 'Luis Boavida', 'Queria Trabalhar', 18),
(14, 'Miguel Boavida', 'Testar Golo', 17),
(15, 'Luis Boavida', 'Queria Trabalhar', 18),
(16, 'Miguel Boavida', 'Testar Golo', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficheirosconteudobackoffice`
--

CREATE TABLE `ficheirosconteudobackoffice` (
  `id` int(11) NOT NULL,
  `idconteudo` int(11) NOT NULL,
  `nomedoficheiro` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ficheirosconteudobackoffice`
--

INSERT INTO `ficheirosconteudobackoffice` (`id`, `idconteudo`, `nomedoficheiro`) VALUES
(60, 62, '60.odt'),
(59, 61, '59.odt'),
(47, 44, '47.odt'),
(46, 43, '46.odt'),
(45, 42, '45.pdf'),
(44, 41, '44.odt'),
(49, 46, '49.odt'),
(48, 45, '48.pdf'),
(41, 38, '41.pptx'),
(58, 59, '52.pdf'),
(51, 48, '51.odt'),
(50, 47, '50.odt'),
(43, 40, '43.odt'),
(42, 39, '42.odt'),
(61, 63, '61.odt'),
(62, 64, '62.xlsx');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersadmin`
--

CREATE TABLE `usersadmin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usersadmin`
--

INSERT INTO `usersadmin` (`id`, `email`, `password`) VALUES
(1, 'luis2.128.b80@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersgeral`
--

CREATE TABLE `usersgeral` (
  `id` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usersgeral`
--

INSERT INTO `usersgeral` (`id`, `password`) VALUES
(1, 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userstecnico`
--

CREATE TABLE `userstecnico` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `Nome` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `userstecnico`
--

INSERT INTO `userstecnico` (`id`, `email`, `password`, `Nome`) VALUES
(13, 'luis.128.b@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'Luis Boavida'),
(14, 'luis3.128.b80@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'Miguel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conteudobackoffice`
--
ALTER TABLE `conteudobackoffice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conteudoexcell`
--
ALTER TABLE `conteudoexcell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ficheirosconteudobackoffice`
--
ALTER TABLE `ficheirosconteudobackoffice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idconteudo` (`idconteudo`);

--
-- Indexes for table `usersadmin`
--
ALTER TABLE `usersadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersgeral`
--
ALTER TABLE `usersgeral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userstecnico`
--
ALTER TABLE `userstecnico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conteudobackoffice`
--
ALTER TABLE `conteudobackoffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `conteudoexcell`
--
ALTER TABLE `conteudoexcell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ficheirosconteudobackoffice`
--
ALTER TABLE `ficheirosconteudobackoffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `usersadmin`
--
ALTER TABLE `usersadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usersgeral`
--
ALTER TABLE `usersgeral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userstecnico`
--
ALTER TABLE `userstecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
