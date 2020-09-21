-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para almacen2019
CREATE DATABASE IF NOT EXISTS `almacen2019` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `almacen2019`;

-- Volcando estructura para tabla almacen2019.cajas
CREATE TABLE IF NOT EXISTS `cajas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `material` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `contenido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `color` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `alto` double NOT NULL DEFAULT 0,
  `ancho` double NOT NULL DEFAULT 0,
  `profundidad` double NOT NULL DEFAULT 0,
  `fecha_alta` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Contiene la informacion de las cajas';

-- Volcando datos para la tabla almacen2019.cajas: ~6 rows (aproximadamente)
DELETE FROM `cajas`;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` (`id`, `codigo`, `material`, `contenido`, `color`, `alto`, `ancho`, `profundidad`, `fecha_alta`) VALUES
	(98, 'CA008', 'Acero', 'Harpoon', '#000000', 10, 10, 10, '2019-11-29'),
	(102, 'CA010', 'Aluminio', 'Carabinas', '#00ff00', 10, 10, 10, '2019-11-29'),
	(103, 'CA009', 'DSAQW', '12312', '#000000', 10, 10, 10, '2019-11-30'),
	(105, 'CA099', 'ASDA', 'asDAS', '#000000', 10, 10, 10, '2019-12-19'),
	(106, 'CA098', 'ASDAS', 'aiJSDA', '#000000', 10, 10, 10, '2019-12-03'),
	(107, 'CA078', 'ASDAS', 'ASDA', '#000000', 10, 10, 10, '2019-12-18');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.cajasbackup
CREATE TABLE IF NOT EXISTS `cajasbackup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `material` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `contenido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `color` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `alto` double NOT NULL,
  `ancho` double NOT NULL,
  `profundidad` double NOT NULL,
  `fecha_alta` date NOT NULL,
  `id_estanteria` int(11) NOT NULL,
  `leja` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `FK_cajasbackup_estanterias` (`id_estanteria`),
  CONSTRAINT `FK_cajasbackup_estanterias` FOREIGN KEY (`id_estanteria`) REFERENCES `estanterias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Cajas que han sido dadas de baja';

-- Volcando datos para la tabla almacen2019.cajasbackup: ~3 rows (aproximadamente)
DELETE FROM `cajasbackup`;
/*!40000 ALTER TABLE `cajasbackup` DISABLE KEYS */;
INSERT INTO `cajasbackup` (`id`, `codigo`, `material`, `contenido`, `color`, `alto`, `ancho`, `profundidad`, `fecha_alta`, `id_estanteria`, `leja`, `fecha_salida`) VALUES
	(98, 'CA004', 'asd', 'Asdas', '#0000a0', 10, 10, 10, '2019-11-29', 63, 2, '2019-11-28'),
	(101, 'CA012', 'Acero', 'Escoba', '#804000', 4, 4, 4, '2019-11-29', 62, 2, '2019-11-28'),
	(102, 'CA003', 'Veneno', 'Furros', '#ff0080', 10, 10, 10, '2019-11-29', 62, 4, '2019-11-29'),
	(103, 'CA001', 'Acero', 'Hola', '#000000', 10, 10, 10, '2019-11-26', 63, 1, '2019-11-29');
/*!40000 ALTER TABLE `cajasbackup` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.conf
CREATE TABLE IF NOT EXISTS `conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CIF` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `empresa` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `telefono` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `web` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `localidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `responsable` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `huecosPasillo` int(11) DEFAULT 10,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CIF` (`CIF`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Contiene la configuracion del sitio';

-- Volcando datos para la tabla almacen2019.conf: ~0 rows (aproximadamente)
DELETE FROM `conf`;
/*!40000 ALTER TABLE `conf` DISABLE KEYS */;
INSERT INTO `conf` (`id`, `CIF`, `empresa`, `codigo`, `nombre`, `telefono`, `email`, `web`, `direccion`, `localidad`, `responsable`, `huecosPasillo`) VALUES
	(2, '23121234R', 'Tizex', 20, 'AlziJos', '654123789', 'alzijos@tizex.com', 'www.tizex/almacenes/alzijos.com', 'Nicolas Nº23', 'Alzira', 'Manuel Serrano', 10);
/*!40000 ALTER TABLE `conf` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.estanterias
CREATE TABLE IF NOT EXISTS `estanterias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_lejas` int(11) NOT NULL DEFAULT 0,
  `n_posi` int(11) NOT NULL DEFAULT 0,
  `n_lejasOcupadas` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `material` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `fecha_alta` date NOT NULL,
  `id_pasillo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `n_posi_id_pasillo` (`n_posi`,`id_pasillo`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `pasillo` (`id_pasillo`),
  CONSTRAINT `pasillo` FOREIGN KEY (`id_pasillo`) REFERENCES `pasillo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Contiene info estanterias\r\n';

-- Volcando datos para la tabla almacen2019.estanterias: ~3 rows (aproximadamente)
DELETE FROM `estanterias`;
/*!40000 ALTER TABLE `estanterias` DISABLE KEYS */;
INSERT INTO `estanterias` (`id`, `n_lejas`, `n_posi`, `n_lejasOcupadas`, `codigo`, `material`, `fecha_alta`, `id_pasillo`) VALUES
	(62, 5, 1, 5, 'ES001', 'Acero', '2019-11-25', 1),
	(63, 5, 2, 0, 'ES002', 'Acero', '2019-11-29', 1),
	(64, 4, 2, 1, 'ES003', 'Acero', '2019-11-29', 2);
/*!40000 ALTER TABLE `estanterias` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.estanteriasbackup
CREATE TABLE IF NOT EXISTS `estanteriasbackup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_leja` int(11) NOT NULL,
  `n_posi` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `material` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `fecha_alta` date NOT NULL,
  `id_pasillo` int(11) NOT NULL DEFAULT 0,
  `fecha_salida` date NOT NULL,
  `motivo` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `n_posi_id_pasillo` (`n_posi`,`id_pasillo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Contiene las estanterias retiradas';

-- Volcando datos para la tabla almacen2019.estanteriasbackup: ~0 rows (aproximadamente)
DELETE FROM `estanteriasbackup`;
/*!40000 ALTER TABLE `estanteriasbackup` DISABLE KEYS */;
/*!40000 ALTER TABLE `estanteriasbackup` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.ocupacion
CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cajas` int(11) NOT NULL DEFAULT 0,
  `id_estanterias` int(11) NOT NULL DEFAULT 0,
  `n_leja` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_estanterias_n_leja` (`id_estanterias`,`n_leja`),
  UNIQUE KEY `id_cajas` (`id_cajas`),
  CONSTRAINT `id_cajas-ocupacion` FOREIGN KEY (`id_cajas`) REFERENCES `cajas` (`id`),
  CONSTRAINT `id_estanteria_ocupacion` FOREIGN KEY (`id_estanterias`) REFERENCES `estanterias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='tabla intermedia entre cajas y estanterias';

-- Volcando datos para la tabla almacen2019.ocupacion: ~6 rows (aproximadamente)
DELETE FROM `ocupacion`;
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
INSERT INTO `ocupacion` (`id`, `id_cajas`, `id_estanterias`, `n_leja`) VALUES
	(106, 98, 62, 1),
	(110, 102, 64, 1),
	(111, 103, 62, 2),
	(112, 105, 62, 3),
	(113, 106, 62, 4),
	(114, 107, 62, 5);
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.pasillo
CREATE TABLE IF NOT EXISTS `pasillo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letra` set('A','B') COLLATE utf8mb4_spanish_ci NOT NULL,
  `huecosOcupados` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `letra` (`letra`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='informacion de los pasillos y sus huecos\r\n';

-- Volcando datos para la tabla almacen2019.pasillo: ~2 rows (aproximadamente)
DELETE FROM `pasillo`;
/*!40000 ALTER TABLE `pasillo` DISABLE KEYS */;
INSERT INTO `pasillo` (`id`, `letra`, `huecosOcupados`) VALUES
	(1, 'A', 2),
	(2, 'B', 1);
/*!40000 ALTER TABLE `pasillo` ENABLE KEYS */;

-- Volcando estructura para tabla almacen2019.root
CREATE TABLE IF NOT EXISTS `root` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='informacion del administrador';

-- Volcando datos para la tabla almacen2019.root: ~0 rows (aproximadamente)
DELETE FROM `root`;
/*!40000 ALTER TABLE `root` DISABLE KEYS */;
INSERT INTO `root` (`id`, `user`, `pass`) VALUES
	(2, 'root', '*AEA73029F4DC11A88BA257A99DC751663BD0A4CB');
/*!40000 ALTER TABLE `root` ENABLE KEYS */;

-- Volcando estructura para disparador almacen2019.cajasBackups
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `cajasBackups` BEFORE DELETE ON `cajas` FOR EACH ROW BEGIN

INSERT INTO cajasbackup (id,codigo,material,
contenido,color,alto,
ancho,profundidad,fecha_alta,
id_estanteria,leja,fecha_salida)

SELECT NULL,old.codigo,old.material,
old.contenido,old.color,old.alto,
old.ancho,old.profundidad,old.fecha_alta, 
es.id, o.n_leja, CURDATE()

FROM estanterias es
LEFT JOIN ocupacion o
ON o.id_cajas = old.id
WHERE o.id_estanterias = es.id 
LIMIT 1;

UPDATE estanterias 
SET n_lejasOcupadas = n_lejasOcupadas - 1 
WHERE id = (SELECT id_estanterias FROM ocupacion WHERE id_cajas = old.id);

DELETE FROM ocupacion WHERE id_cajas = old.id;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador almacen2019.devolucion
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `devolucion` AFTER INSERT ON `cajas` FOR EACH ROW BEGIN IF ('CA012' = NEW.codigo) THEN UPDATE estanterias SET n_lejasOcupadas = n_lejasOcupadas + 1 WHERE id = 62; INSERT INTO ocupacion VALUES(NULL,new.id,62,2); DELETE FROM cajasbackup WHERE codigo = new.codigo; END IF; END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
