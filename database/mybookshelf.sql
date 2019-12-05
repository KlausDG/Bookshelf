-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Dez-2019 às 01:53
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybookshelf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id_author`, `nome`) VALUES
(1, 'Neil Gaiman'),
(2, 'Patrick Rothfuss'),
(3, 'Carlos Ruiz Zafón'),
(4, 'Andri Snaer Magnason');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_category` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(6) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_category`, `nome`) VALUES
(1, 'HQ'),
(2, 'Livro'),
(3, 'Manga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colecao_de_usuario`
--

DROP TABLE IF EXISTS `colecao_de_usuario`;
CREATE TABLE IF NOT EXISTS `colecao_de_usuario` (
  `id_colecao` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_colecao`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condicao`
--

DROP TABLE IF EXISTS `condicao`;
CREATE TABLE IF NOT EXISTS `condicao` (
  `id_condition` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_condition`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `condicao`
--

INSERT INTO `condicao` (`id_condition`, `nome`) VALUES
(1, 'Lacrado'),
(2, 'Muito Bom'),
(3, 'Bom'),
(4, 'MÃ©dio'),
(5, 'Ruim'),
(6, 'PÃ©ssimo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

DROP TABLE IF EXISTS `editora`;
CREATE TABLE IF NOT EXISTS `editora` (
  `id_publisher` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_publisher`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id_publisher`, `nome`) VALUES
(1, 'Morro Branco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatus_leitura`
--

DROP TABLE IF EXISTS `estatus_leitura`;
CREATE TABLE IF NOT EXISTS `estatus_leitura` (
  `id_reading_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_reading_status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `estatus_leitura`
--

INSERT INTO `estatus_leitura` (`id_reading_status`, `nome`) VALUES
(1, 'Lido'),
(2, 'Lendo'),
(6, 'NÃ£o Lido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genre`, `nome`) VALUES
(1, 'AÃ§Ã£o'),
(2, 'AdaptaÃ§Ã£o'),
(3, 'Alternativo'),
(4, 'Antologia'),
(5, 'AntropomÃ³rfico'),
(6, 'Artes Marciais'),
(7, 'Auto Ajuda'),
(8, 'Autobiografia'),
(9, 'Aventura'),
(10, 'Biografia'),
(11, 'ClÃ¡ssico'),
(12, 'Conto de Fadas'),
(13, 'Crime'),
(14, 'Crimes Reais'),
(15, 'Drama'),
(16, 'Educacional'),
(17, 'Entrando na Maioridade'),
(18, 'ErÃ³tico'),
(19, 'Espada e FeitiÃ§aria'),
(20, 'EspiÃµes'),
(21, 'Europeu'),
(22, 'Fantasia'),
(23, 'Faroeste'),
(24, 'FicÃ§Ã£o CientÃ­Â­fica'),
(25, 'FicÃ§Ã£o HistÃ³rica'),
(26, 'Gore'),
(27, 'Graphic novel'),
(28, 'Guerra'),
(29, 'HistÃ³ria Alternativa'),
(30, 'HistÃ³rias Curtas'),
(31, 'Humor'),
(32, 'Infantil'),
(33, 'Jovem Adulto'),
(34, 'Juvenil'),
(35, 'LGBTQ'),
(36, 'Lobisomens'),
(37, 'Militar'),
(38, 'MistÃ©rio'),
(39, 'Mitologia'),
(40, 'NÃ£o-FicÃ§Ã£o'),
(41, 'Paranormal'),
(42, 'Poesia'),
(43, 'Policial'),
(44, 'PÃ³s-Apocaliptico'),
(45, 'Protagonista Feminina'),
(46, 'Pulp'),
(47, 'Religioso'),
(48, 'Romance'),
(49, 'SÃ¡tira'),
(50, 'Steampunk'),
(51, 'Super-HerÃ³is'),
(52, 'Suspense'),
(53, 'Terror'),
(54, 'Vampiros'),
(55, 'Video Games'),
(56, 'Zumbis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ilustrador`
--

DROP TABLE IF EXISTS `ilustrador`;
CREATE TABLE IF NOT EXISTS `ilustrador` (
  `id_illustrator` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_illustrator`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `ilustrador`
--

INSERT INTO `ilustrador` (`id_illustrator`, `nome`) VALUES
(1, 'Não se aplica.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lingua`
--

DROP TABLE IF EXISTS `lingua`;
CREATE TABLE IF NOT EXISTS `lingua` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `lingua`
--

INSERT INTO `lingua` (`id_language`, `nome`) VALUES
(4, 'PortuguÃªs'),
(5, 'InglÃªs'),
(6, 'Espanhol');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE IF NOT EXISTS `livro` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `title_original` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `id_illustrator` int(11) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `nr_pages` smallint(6) DEFAULT NULL,
  `image_cover` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descri` varchar(6553) COLLATE latin1_general_ci DEFAULT NULL,
  `id_publisher` int(11) DEFAULT NULL,
  `id_category` tinyint(4) DEFAULT NULL,
  `retail_price` decimal(15,2) DEFAULT NULL,
  `purchased_price` decimal(15,2) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `start_reading_date` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `finished_reading_date` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `id_reading_status` tinyint(4) DEFAULT NULL,
  `id_condition` tinyint(4) DEFAULT NULL,
  `for_sale` tinyint(1) DEFAULT NULL,
  `preco_venda` decimal(15,2) DEFAULT NULL,
  `link_amazon` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `id_language` int(11) DEFAULT NULL,
  `id_collection` int(11) DEFAULT NULL,
  `id_tipo_capa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  KEY `id_category` (`id_category`),
  KEY `id_author` (`id_author`),
  KEY `id_collection` (`id_collection`),
  KEY `id_condition` (`id_condition`),
  KEY `id_illustrator` (`id_illustrator`),
  KEY `id_language` (`id_language`),
  KEY `id_publisher` (`id_publisher`),
  KEY `id_reading_status` (`id_reading_status`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_book`, `title`, `title_original`, `id_author`, `id_illustrator`, `publish_date`, `nr_pages`, `image_cover`, `descri`, `id_publisher`, `id_category`, `retail_price`, `purchased_price`, `purchase_date`, `start_reading_date`, `finished_reading_date`, `id_reading_status`, `id_condition`, `for_sale`, `preco_venda`, `link_amazon`, `id_language`, `id_collection`, `id_tipo_capa`) VALUES
(41, 'A IlusÃ£o do Tempo', 'TÃ­makistan', 4, 1, '2017-07-12', 320, '4A11B6E4-C18C-101B-6AE5-84FFFB695C93', 'Quando as coisas nÃ£o vÃ£o nada bem e os economistas preveem uma enorme crise financeira, a famÃ­lia de VitÃ³ria â€“ assim como o resto do mundo â€“ decide se esconder em suas misteriosas caixas pretas Ã  espera de tempos melhores. No entanto, apÃ³s vÃ¡rios anos, a caixa de VitÃ³ria se abre e a menina se vÃª em uma cidade em ruÃ­nas.\r\n\r\nSem rumo, ela caminha por prÃ©dios e ruas tomadas por florestas e animais selvagens, atÃ© chegar Ã  uma casa onde crianÃ§as se reÃºnem em torno de uma senhora para ouvir a histÃ³ria de um rei ganancioso que conquistou o mundo, mas desejava conquistar o tempo. Para poupar sua bela princesa dos dias escuros e sombrios, normais ou sem valor, ele a coloca em uma caixa mÃ¡gica transparente como cristal, mas feita de uma seda de teia de aranha tÃ£o densa que o prÃ³prio tempo nÃ£o consegue penetrar.\r\n\r\nVitÃ³ria aos poucos percebe uma conexÃ£o entre sua prÃ³pria histÃ³ria e a do reino mÃ¡gico. Junto com seus novos amigos, ela precisa encontrar uma forma de consertar o mundo antes que seja tarde demais.\r\n\r\nVencedor do Icelandic Literary Award\r\nVencedor do Icelandic Booksellerâ€™s Award\r\nVencedor do West Nordic Childrenâ€™s Book Award', 1, 2, '39.90', '16.03', '2018-07-02', NULL, NULL, 6, 2, 1, '25.00', 'https://www.amazon.com.br/Ilus%C3%A3o-Tempo-Andri-Snaer-Magnason/dp/8592795060/ref=sr_1_1?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&keywords=A+Ilus%C3%A3o+do+Tempo&qid=1575465809&sr=8-1', 4, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_em_colecao`
--

DROP TABLE IF EXISTS `livro_em_colecao`;
CREATE TABLE IF NOT EXISTS `livro_em_colecao` (
  `id_lec` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_lec`),
  KEY `id_book` (`id_book`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_genero`
--

DROP TABLE IF EXISTS `livro_genero`;
CREATE TABLE IF NOT EXISTS `livro_genero` (
  `id_bg` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  PRIMARY KEY (`id_bg`),
  KEY `id_book` (`id_book`),
  KEY `id_genre` (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `livro_genero`
--

INSERT INTO `livro_genero` (`id_bg`, `id_book`, `id_genre`) VALUES
(10, 41, 22),
(11, 41, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `privilegio`
--

DROP TABLE IF EXISTS `privilegio`;
CREATE TABLE IF NOT EXISTS `privilegio` (
  `id_privilege` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_privilege`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `privilegio`
--

INSERT INTO `privilegio` (`id_privilege`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saga`
--

DROP TABLE IF EXISTS `saga`;
CREATE TABLE IF NOT EXISTS `saga` (
  `id_collection` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_collection`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_capa`
--

DROP TABLE IF EXISTS `tipo_capa`;
CREATE TABLE IF NOT EXISTS `tipo_capa` (
  `id_tipo_capa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_tipo_capa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `tipo_capa`
--

INSERT INTO `tipo_capa` (`id_tipo_capa`, `nome`) VALUES
(1, 'Capa CartÃ£o'),
(2, 'Capa Comum'),
(3, 'Capa Dura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `pwd` varchar(999) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `address` json NOT NULL,
  `privileges_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `privileges_id` (`privileges_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `username`, `pwd`, `name`, `birthdate`, `phone`, `address`, `privileges_id`) VALUES
(1, 'KlausDG', '$2y$10$2gR.Vc3z5wBxZT2YfKRcnO8p6Q4.mx.botAA7igAsbl/nnxf8SyuW', 'Klaus Dieter Galm', '1988-11-21', '(55)98143-2111', '{\"UF\": \"RS\", \"CEP\": \"97105-450\", \"Rua\": \"Villa Lobos\", \"Cidade\": \"Santa Maria\", \"Bairro:\": \"Camobi\", \"Número\": 80}', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categoria` (`id_category`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `autor` (`id_author`),
  ADD CONSTRAINT `livro_ibfk_3` FOREIGN KEY (`id_collection`) REFERENCES `saga` (`id_collection`),
  ADD CONSTRAINT `livro_ibfk_4` FOREIGN KEY (`id_condition`) REFERENCES `condicao` (`id_condition`),
  ADD CONSTRAINT `livro_ibfk_5` FOREIGN KEY (`id_illustrator`) REFERENCES `ilustrador` (`id_illustrator`),
  ADD CONSTRAINT `livro_ibfk_6` FOREIGN KEY (`id_language`) REFERENCES `lingua` (`id_language`),
  ADD CONSTRAINT `livro_ibfk_7` FOREIGN KEY (`id_publisher`) REFERENCES `editora` (`id_publisher`),
  ADD CONSTRAINT `livro_ibfk_8` FOREIGN KEY (`id_reading_status`) REFERENCES `estatus_leitura` (`id_reading_status`);

--
-- Limitadores para a tabela `livro_genero`
--
ALTER TABLE `livro_genero`
  ADD CONSTRAINT `livro_genero_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `livro` (`id_book`),
  ADD CONSTRAINT `livro_genero_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genero` (`id_genre`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`privileges_id`) REFERENCES `privilegio` (`id_privilege`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
