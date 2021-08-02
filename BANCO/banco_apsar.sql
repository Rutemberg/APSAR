-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14-Mar-2018 às 17:10
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1028886_bancoapsar`
--
CREATE DATABASE IF NOT EXISTS `id1028886_bancoapsar` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id1028886_bancoapsar`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `perfil` varchar(50) COLLATE utf8_bin NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(14) COLLATE utf8_bin NOT NULL,
  `datanascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `email`, `senha`, `perfil`, `nome`, `cpf`, `sexo`, `datanascimento`) VALUES
(14, 'Ricardo@email.com', '', '1', 'Ricardo Gomes', '11111111111', 'masculino', '2016-11-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `matricula` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nome`, `cpf`, `email`, `dataNascimento`, `sexo`, `matricula`) VALUES
(86, 'Manoel', '811.074.156-83', 'Manoel@email.com', '2016-11-28', 'masculino', '798954546456789'),
(87, 'Carlao', '811.074.156-83', 'Carlao@email.com', '2016-11-28', 'masculino', '798954546456789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividadesadaptadas`
--

CREATE TABLE `atividadesadaptadas` (
  `idatividadesAdaptadas` int(11) NOT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `descricao` varchar(500) COLLATE utf8_bin NOT NULL,
  `arquivoAtividadesAdaptadas` varchar(500) COLLATE utf8_bin NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `visualizado` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT 'Nao',
  `disciplina` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `atividadesadaptadas`
--

INSERT INTO `atividadesadaptadas` (`idatividadesAdaptadas`, `id_professor`, `descricao`, `arquivoAtividadesAdaptadas`, `nome`, `visualizado`, `disciplina`) VALUES
(1, NULL, 'Atividade voltada para os alunos que tem dificuldades para a realização de deveres da disciplina de artes                                                                                ', '1480535092583f2c3445e0f.pdf', 'A ARTE NOS OLHOS DE QUEM VÊ?', 'Sim', 'Arte'),
(4, NULL, 'Atividade para a cooperação entre colegas', '14808036635843454f4ee72.pdf', 'Atividade interescolar', 'Sim', 'Língua Portuguesa'),
(5, NULL, 'Atividade para apresentar, onde o principal objetivo é trabalhar a cooperação entre os alunos                ', '1480803767584345b7afead.jpg', 'Dinâmicas de apresentação ', 'Sim', 'Língua Portuguesa'),
(9, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sodales enim eu elit ultrices, vel mollis felis maximus. Nunc ornare nibh vitae viverra consectetur. Nam tristique convallis odio, luctus molestie mi. Quisque vitae tincidunt felis. Sed eget sodales arcu. Mauris.\r\n\r\n', '148172808358516053b2b4f.jpg', 'A ARTE DO MUNDO CONTEMPORÂNEO', 'Sim', 'Arte'),
(10, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sodales enim eu elit ultrices, vel mollis felis maximus. Nunc ornare nibh vitae viverra consectetur. Nam tristique convallis odio, luctus molestie mi. Quisque vitae tincidunt felis. Sed eget sodales arcu. Mauris.\r\n\r\n', '148172859258516250ab682.jpg', 'O INÍCIO DA LINGUA', 'Sim', 'Língua Portuguesa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `idcoordenador` int(11) NOT NULL,
  `nome` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dataNascimento` date NOT NULL,
  `qualificacoes` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`idcoordenador`, `nome`, `cpf`, `email`, `senha`, `dataNascimento`, `qualificacoes`, `sexo`, `perfil`) VALUES
(4, 'Marcos Antonio', '22222222222', 'marcos@email.com', '', '2016-11-21', 'Superior em Psicanalise', 'masculino', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id_diagnostico` int(11) NOT NULL,
  `arquivo` varchar(200) COLLATE utf8_bin NOT NULL,
  `id_Aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `diagnostico`
--

INSERT INTO `diagnostico` (`id_diagnostico`, `arquivo`, `id_Aluno`) VALUES
(28, '148080287358434239ecd2a.pdf', 86);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `cep` varchar(8) COLLATE utf8_bin NOT NULL,
  `uf` varchar(50) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(50) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(100) COLLATE utf8_bin NOT NULL,
  `logradouro` varchar(100) COLLATE utf8_bin NOT NULL,
  `complemento` varchar(100) COLLATE utf8_bin NOT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idCoordenador` int(11) DEFAULT NULL,
  `idAdministrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `cep`, `uf`, `cidade`, `bairro`, `logradouro`, `complemento`, `idAluno`, `idProfessor`, `idCoordenador`, `idAdministrador`) VALUES
(137, '7222195', 'PA', 'Ceilandia', 'Ceilandia Norte', '11', 'Casa do caralho', NULL, NULL, NULL, 14),
(138, '72225198', 'PR', 'Sobradinho', 'Sobradinho Sul', '45', 'Casa Grande', NULL, NULL, 4, NULL),
(139, '7222192', 'PA', 'Marabas', 'Las corunha', '0a11', 'Hotel beramar', NULL, 6, NULL, NULL),
(141, '7222192', 'DF', 'Lago Sul', 'Ceilandia Norte', '21, Casa', 'Casa', NULL, 7, NULL, NULL),
(143, '7222192', 'DF', 'Lago Sul', 'Lago Sul', '21, Casa', 'Casa', NULL, 8, NULL, NULL),
(167, '7222192', 'PI', 'Lago Sul', 'Lago Sul', '21, Casa', 'Casa', 86, NULL, NULL, NULL),
(168, '7222192', 'DF', 'Lago Sul', 'Lago Sul', '21, Casa', 'Casa', 87, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idprofessor` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `disciplina` varchar(50) COLLATE utf8_bin NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` varchar(30) COLLATE utf8_bin NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idprofessor`, `nome`, `cpf`, `email`, `senha`, `disciplina`, `dataNascimento`, `sexo`, `perfil`) VALUES
(6, 'Gilberto Gomes', '12345678909', 'Gil@email.com', '', 'Língua Portuguesa', '2016-11-21', 'masculino', 3),
(7, 'Gilberto', '433.914.337-52', 'Rut@email', '123', 'Língua Portuguesa', '2016-11-26', 'masculino', 3),
(8, 'Zeca', '843.211.459-61', 'Zeca@email.com', '', 'Arte', '2016-11-27', 'masculino', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `idresultado` int(11) NOT NULL,
  `parecer` varchar(500) COLLATE utf8_bin NOT NULL,
  `id_atividadesAdaptadas` int(11) NOT NULL,
  `id_Professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `resultado`
--

INSERT INTO `resultado` (`idresultado`, `parecer`, `id_atividadesAdaptadas`, `id_Professor`) VALUES
(14, 'Atividade muito boa !', 1, 8),
(15, 'Você tem o direito de falar o que pensa, mas não tem o direito de julgar quem não conhece.', 5, 7),
(16, 'A grandeza vem não quando as coisas sempre vão bem para você, mas a grandeza vem quando você é realmente testado, quando você sofre alguns golpes, algumas decepções, quando a tristeza chega. Porque apenas se você esteve nos mais profundos vales você poderá um dia saber o quão magnífico é se estar no topo da mais alta montanha.\r\n- Richard Mil', 4, 7),
(17, 'Não adianta ter expectativas de um futuro melhor se continuarmos com as mesmas atitudes daquele passado que nos desagradou.', 5, 6),
(18, 'O que você pensa sobre mim não vai mudar quem eu sou, mas pode mudar o meu conceito sobre você.', 4, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `idTelefone` int(11) NOT NULL,
  `ddi` varchar(3) COLLATE utf8_bin NOT NULL,
  `ddd` varchar(2) COLLATE utf8_bin NOT NULL,
  `numero` varchar(12) COLLATE utf8_bin NOT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `idAdministrador` int(11) DEFAULT NULL,
  `idCoordenador` int(11) DEFAULT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`idTelefone`, `ddi`, `ddd`, `numero`, `idAluno`, `idAdministrador`, `idCoordenador`, `idProfessor`) VALUES
(1, '055', '61', '33751970', NULL, 14, NULL, NULL),
(2, '11', '61', '33724545', NULL, NULL, 4, NULL),
(4, '55', '87', '92554787', NULL, NULL, NULL, 6),
(6, '55', '61', '3375-1790', NULL, NULL, NULL, 7),
(8, '55', '61', '3375-1790', NULL, NULL, NULL, 8),
(32, '55', '61', '3375-1790', 86, NULL, NULL, NULL),
(33, '55', '61', '3375-1790', 87, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`);

--
-- Indexes for table `atividadesadaptadas`
--
ALTER TABLE `atividadesadaptadas`
  ADD PRIMARY KEY (`idatividadesAdaptadas`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Indexes for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`idcoordenador`);

--
-- Indexes for table `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id_diagnostico`),
  ADD KEY `id_Aluno` (`id_Aluno`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `idProfessor` (`idProfessor`),
  ADD KEY `idCoordenadora` (`idCoordenador`),
  ADD KEY `idAdministrador` (`idAdministrador`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idprofessor`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`idresultado`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`idTelefone`),
  ADD KEY `idAluno` (`idAluno`,`idAdministrador`,`idCoordenador`,`idProfessor`),
  ADD KEY `idAdministrador` (`idAdministrador`),
  ADD KEY `idCoordenador` (`idCoordenador`),
  ADD KEY `idProfessor` (`idProfessor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `atividadesadaptadas`
--
ALTER TABLE `atividadesadaptadas`
  MODIFY `idatividadesAdaptadas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coordenador`
--
ALTER TABLE `coordenador`
  MODIFY `idcoordenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `idprofessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `idresultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `idTelefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividadesadaptadas`
--
ALTER TABLE `atividadesadaptadas`
  ADD CONSTRAINT `atividadesadaptadas_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`idprofessor`);

--
-- Limitadores para a tabela `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`id_Aluno`) REFERENCES `aluno` (`idAluno`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fkAdministrador` FOREIGN KEY (`idAdministrador`) REFERENCES `administrador` (`idadministrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkAluno` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkCoordenador` FOREIGN KEY (`idCoordenador`) REFERENCES `coordenador` (`idcoordenador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkProfessor` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idprofessor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefone_ibfk_2` FOREIGN KEY (`idAdministrador`) REFERENCES `administrador` (`idadministrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefone_ibfk_3` FOREIGN KEY (`idCoordenador`) REFERENCES `coordenador` (`idcoordenador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefone_ibfk_4` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idprofessor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
