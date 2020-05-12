SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE IF NOT EXISTS `floresde_sarom` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `floresde_sarom`;

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `card` (`id`, `mensagem`) VALUES
(1, 'oi, sou sua primeira mensagem'),
(2, 'oi, sou sua segunda mensagem');

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `cat` (`id`, `cat`) VALUES
(1, 'Flores'),
(2, 'Presentes'),
(3, 'Cestas');

CREATE TABLE IF NOT EXISTS `comprador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `cpf` int(11) NOT NULL,
  `ddd` text COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `rua` text COLLATE utf8_unicode_ci NOT NULL,
  `no` int(10) NOT NULL,
  `comp` text COLLATE utf8_unicode_ci NOT NULL,
  `dist` text COLLATE utf8_unicode_ci NOT NULL,
  `cep` int(10) NOT NULL,
  `cidade` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` text COLLATE utf8_unicode_ci NOT NULL,
  `pais` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `comprador` (`id`, `nome`, `cpf`, `ddd`, `tel`, `email`, `rua`, `no`, `comp`, `dist`, `cep`, `cidade`, `estado`, `pais`) VALUES
(1, 'nome', 1165656526, '\r\n22', 31313131, 'asdas@asdasd.com', 'ruasudasd', 444, 'fasf', 'dasdas', 4555550, 'sssseeee', 'ddddd', 'brasi'),
(2, 'nome', 1165656526, '\r\n22', 31313131, 'asdas@asdasd.com', 'ruasudasd', 444, 'fasf', 'dasdas', 4555550, 'sssseeee', 'ddddd', 'brasi'),
(3, 'nome', 1165656526, '\r\n22', 31313131, 'asdas@asdasd.com', 'ruasudasd', 444, 'fasf', 'dasdas', 4555550, 'sssseeee', 'ddddd', 'brasi');

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8_unicode_ci,
  `valor` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `cr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cd` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `dist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distrito` text COLLATE utf8_unicode_ci NOT NULL,
  `val` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `dist` (`id`, `distrito`, `val`) VALUES
(1, 'bairro', '50.55');

CREATE TABLE IF NOT EXISTS `encomenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cd` int(11) DEFAULT NULL,
  `prd` text COLLATE utf8_unicode_ci,
  `msg` int(11) DEFAULT NULL,
  `card` int(11) DEFAULT NULL,
  `compra` date DEFAULT NULL,
  `entrega` date DEFAULT NULL,
  `hora` text COLLATE utf8_unicode_ci,
  `nome` text COLLATE utf8_unicode_ci,
  `rua` text COLLATE utf8_unicode_ci,
  `no` int(10) DEFAULT NULL,
  `comp` text COLLATE utf8_unicode_ci,
  `dist` text COLLATE utf8_unicode_ci,
  `cep` int(10) DEFAULT NULL,
  `cidade` text COLLATE utf8_unicode_ci,
  `estado` text COLLATE utf8_unicode_ci,
  `pais` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `encomenda` (`id`, `cd`, `prd`, `msg`, `card`, `compra`, `entrega`, `hora`, `nome`, `rua`, `no`, `comp`, `dist`, `cep`, `cidade`, `estado`, `pais`) VALUES
(1, 1, '1,2,3', 1, 1, '0000-00-00', '0000-00-00', '15:55', 'asdas', 'dd', 2, 'dd', 'dd', 5555000, 'ddd', 'dd', 'dd'),
(2, 1, '1,2,3', 1, 1, '0000-00-00', '0000-00-00', '15:55', 'asdas', 'dd', 2, 'dd', 'dd', 5555000, 'ddd', 'dd', 'dd');

CREATE TABLE IF NOT EXISTS `frete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bairro` text COLLATE utf8_unicode_ci,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` text COLLATE utf8_unicode_ci,
  `cat` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `login` text COLLATE utf8_unicode_ci,
  `senha` text COLLATE utf8_unicode_ci,
  `tipo` text COLLATE utf8_unicode_ci,
  `cpf` int(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `login` (`id`, `nome`, `email`, `login`, `senha`, `tipo`, `cpf`) VALUES
(1, 'Samuel Caldas', 'samuel.caldas@gmail.com', 'samuel.caldas', '347dba5988f8e51a6e463459e0f5b347', '0', 2147483647);

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8_unicode_ci,
  `valor` double DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `l_desc` text COLLATE utf8_unicode_ci,
  `tag` text COLLATE utf8_unicode_ci,
  `cat` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `sl` (`id`, `url`) VALUES
(1, 'contato.php');
