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
  PRIMARY KEY (`id`),
  KEY `id_secao` (`id_secao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------




--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `forum`
--
ALTER TABLE `forum`
    ADD CONSTRAINT `forum_ibfk_3` FOREIGN KEY (`id_secao`) REFERENCES `secao` (`id`);
