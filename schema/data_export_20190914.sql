-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Set-2019 às 07:49
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum`
--

CREATE TABLE `forum` (
  `id` int(3) NOT NULL,
  `id_secao` int(3) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_bin NOT NULL,
  `imagem` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `forum`
--

INSERT INTO `forum` (`id`, `id_secao`, `nome`, `descricao`, `imagem`) VALUES
(1, 1, 'Origem de Lara Croft', 'Volte às origens de Lara Croft', 'laras1.png'),
(11, 1, 'Cosplay da Laras', 'Tudo sobre cosplay da Lara Croft', 'laras_cosplay1.png'),
(12, 2, 'Tomb Raider', 'Falem sobre o primeiro jogo da série', 'jogo1.png'),
(13, 2, 'Tomb Raider 2', 'Depois do primeiro veio o segundo e não parou mais', 'jogo2.png'),
(14, 2, 'Tomb Raider 3', 'E continua', 'jogo3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(3) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`) VALUES
(1, 'administrador'),
(2, 'padrao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(3) NOT NULL,
  `id_topico` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `id_topico`, `id_usuario`, `nome`, `descricao`, `data_hora`) VALUES
(1, 1, 4, ' ', 'Acredito que sim, baseado na regra do nome que vira sobrenome\r\n\r\n--------------------------------------\r\nMais um sábio ditado', '2019-07-17 23:13:24'),
(9, 1, 6, ' ', 'Sou seu verdadeiro pai, desculpe estar dizendo isso por um fórum, mas a vergonha não me permite olhar em seus olhos. Perdoe-me, querida!\r\n\r\n--------------------------------------\r\nSou seu pai, Lara.', '2019-07-18 00:48:56'),
(10, 16, 6, ' ', 'Não tem solução\r\n\r\n--------------------------------------\r\nSou seu pai, Lara.', '2019-07-18 01:36:08'),
(11, 1, 5, ' ', 'Que lindo, vai virar filme...\r\n\r\n--------------------------------------\r\nMe diga com que Diandra andas', '2019-07-18 01:38:33'),
(12, 17, 2, ' ', 'Escorpião\r\n\r\n--------------------------------------\r\nAntoninha do Deserto', '2019-07-18 02:26:34'),
(13, 17, 6, ' ', 'Pior que não sei\r\n\r\n--------------------------------------\r\nSou seu pai, Lara.', '2019-07-18 02:28:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secao`
--

CREATE TABLE `secao` (
  `id` int(3) NOT NULL,
  `ordem` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `secao`
--

INSERT INTO `secao` (`id`, `ordem`, `nome`, `descricao`) VALUES
(1, 1, 'Laras', 'Todas as Laras que existem por aí        '),
(2, 2, 'Jogos', 'Discussões sobre todos os jogos da franquia, em todos os consoles'),
(3, 3, 'Filmes', 'A ideia de Tomb Raider foi expandida além dos jogos de computador e de consoles, incluindo os filmes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topico`
--

CREATE TABLE `topico` (
  `id` int(3) NOT NULL,
  `id_forum` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `topico`
--

INSERT INTO `topico` (`id`, `id_forum`, `id_usuario`, `nome`, `descricao`, `data_hora`) VALUES
(1, 1, 2, 'Quem é o pai?', 'Seria Pedro de Lara o verdadeiro pai de Lara Croft?', '2019-07-17 10:52:51'),
(2, 14, 2, 'Este é o melhor', 'Muitos consideram este o melhor jogo da série. Você concorda?', '2019-07-17 10:56:05'),
(3, 1, 1, 'E quem é a mãe?', 'Alguém já pensou que a Lara pode ter uma mãe? Nunca ouvi ninguém falando sobre isso. Nem nos jogos, pelo menos nos que joguei, e nem nos filmes. Ou falaram e eu não lembro?', '2019-07-17 17:02:54'),
(4, 1, 1, 'Falando em pais, será que tem irmãos?', 'Quais são os mais propváveis irmãos da Lara?', '2019-07-17 17:14:37'),
(5, 11, 1, 'Teste', 'TESTE', '2019-07-17 17:50:53'),
(6, 11, 1, '2', '2', '2019-07-17 17:52:53'),
(7, 11, 1, '3', '3', '2019-07-17 17:56:25'),
(8, 11, 1, '3', '3', '2019-07-17 17:57:11'),
(9, 11, 1, '4', '4', '2019-07-17 18:03:02'),
(10, 11, 1, 'a', 'a', '2019-07-17 18:05:50'),
(11, 11, 1, '6', '6', '2019-07-17 18:06:02'),
(12, 11, 1, '7', '7', '2019-07-17 18:06:58'),
(13, 11, 1, '8', '8', '2019-07-17 18:31:22'),
(14, 11, 1, '9', '9', '2019-07-17 18:35:38'),
(15, 11, 1, '10', '10', '2019-07-17 18:37:25'),
(16, 14, 1, 'Travamentos', 'Muitos travamentos na versão pra PC. No menu inicial a música trava e entra em loop, com intervalo de 1 segundo. Alguma solução?', '2019-07-17 18:39:10'),
(17, 1, 2, 'Qual o signo da Lara?', 'Acho importante saber', '2019-07-18 02:25:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `id_perfil` int(3) NOT NULL,
  `login` varchar(20) COLLATE utf8_bin NOT NULL,
  `senha` varchar(20) COLLATE utf8_bin NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_inscricao` date NOT NULL,
  `imagem` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `assinatura` varchar(300) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `id_perfil`, `login`, `senha`, `nome`, `data_inscricao`, `imagem`, `assinatura`) VALUES
(1, 1, 'admin', 'admin', 'Administrador', '2019-07-10', 'admin.png', 'Administração'),
(2, 2, 'a', 'a', 'Antonieta', '1970-01-01', 'a.png', 'Antoninha do Deserto'),
(3, 2, 'b', 'b', 'Bilson', '2019-07-17', 'b.png', 'Bilson Bisognin - iphone 23'),
(4, 2, 'c', 'c', 'Carlos', '2019-07-17', 'c.png', 'Mais um sábio ditado'),
(5, 2, 'd', 'd', 'Diandra', '2019-07-17', 'd.png', 'Me diga com que Diandra andas'),
(6, 2, 'pedro_lara', 'p', 'Pedro de Lara', '2019-07-17', 'p.png', 'Sou seu pai, Lara.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_secao` (`id_secao`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topico` (`id_topico`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `secao`
--
ALTER TABLE `secao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_ordem` (`ordem`);

--
-- Índices para tabela `topico`
--
ALTER TABLE `topico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_forum` (`id_forum`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `secao`
--
ALTER TABLE `secao`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `topico`
--
ALTER TABLE `topico`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_3` FOREIGN KEY (`id_secao`) REFERENCES `secao` (`id`);

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_topico`) REFERENCES `topico` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `topico`
--
ALTER TABLE `topico`
  ADD CONSTRAINT `topico_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `topico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
