--
-- Base de Dados: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `forum`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

/*CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dtNasc` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;*/

-- --------------------------------------------------------
--
-- Estrutura da tabela `secao`
--

CREATE TABLE IF NOT EXISTS `secao` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `ordem` int(3) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ordem` (`ordem`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------
--
-- Estrutura da tabela `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_secao` int(3) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_bin NOT NULL,
  `imagem` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_secao` (`id_secao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------
--
-- Estrutura da tabela `topico`
--

CREATE TABLE IF NOT EXISTS `topico` (
                                        `id` int(3) NOT NULL AUTO_INCREMENT,
                                        `id_forum` int(3) NOT NULL,
                                        `id_usuario` int(3) NOT NULL,
                                        `nome` varchar(100) COLLATE utf8_bin NOT NULL,
                                        `descricao` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
                                        `data_hora` datetime NOT NULL,
                                        PRIMARY KEY (`id`),
                                        KEY `id_forum` (`id_forum`),
                                        KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------
--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
                                      `id` int(3) NOT NULL AUTO_INCREMENT,
                                      `id_topico` int(3) NOT NULL,
                                      `id_usuario` int(3) NOT NULL,
                                      `nome` varchar(100) COLLATE utf8_bin NOT NULL,
                                      `descricao` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
                                      `data_hora` datetime NOT NULL,
                                      PRIMARY KEY (`id`),
                                      KEY `id_topico` (`id_topico`),
                                      KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------
-- -------------------------------------------------------
--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
                                       `id` int(3) NOT NULL AUTO_INCREMENT,
                                       `nome` varchar(100) COLLATE utf8_bin NOT NULL,
                                       PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------
--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
                                       `id` int(3) NOT NULL AUTO_INCREMENT,
                                       `id_perfil` int(3) NOT NULL,
                                       `login` varchar(20) COLLATE utf8_bin NOT NULL,
                                       `senha` varchar(20) COLLATE utf8_bin NOT NULL,
                                       `nome` varchar(100) COLLATE utf8_bin NOT NULL,
                                       `data_inscricao` date NOT NULL,
                                       `imagem` varchar(100) COLLATE utf8_bin DEFAULT NULL,
                                       `assinatura` varchar(300) COLLATE utf8_bin DEFAULT NULL,
                                       PRIMARY KEY (`id`),
                                       KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;




--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `forum`
--
ALTER TABLE `forum`
    ADD CONSTRAINT `forum_ibfk_3` FOREIGN KEY (`id_secao`) REFERENCES `secao` (`id`);
ALTER TABLE `topico`
    ADD CONSTRAINT `topico_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id`),
    ADD CONSTRAINT `topico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
ALTER TABLE `post`
    ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_topico`) REFERENCES `topico` (`id`),
    ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
ALTER TABLE `usuario`
    ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);
