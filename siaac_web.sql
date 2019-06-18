# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : siaac_web


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `siaac_web`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `siaac_web`;

#
# Structure for the `estado` table : 
#

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_color` varchar(15) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`estado_id`),
  UNIQUE KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `estado_civil` table : 
#

DROP TABLE IF EXISTS `estado_civil`;

CREATE TABLE `estado_civil` (
  `estadocivil_id` int(11) NOT NULL AUTO_INCREMENT,
  `estadocivil_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estadocivil_id`),
  UNIQUE KEY `estadocivil_id` (`estadocivil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `genero` table : 
#

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL AUTO_INCREMENT,
  `genero_nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`genero_id`),
  UNIQUE KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `institucion` table : 
#

DROP TABLE IF EXISTS `institucion`;

CREATE TABLE `institucion` (
  `institucion_id` int(11) NOT NULL AUTO_INCREMENT,
  `institucion_nombre` varchar(250) DEFAULT NULL,
  `institucion_direccion` varchar(250) DEFAULT NULL,
  `institucion_telefono` varchar(50) DEFAULT NULL,
  `institucion_fechacreacion` date DEFAULT NULL,
  `institucion_logo` varchar(150) DEFAULT NULL,
  `institucion_ubicacion` varchar(150) DEFAULT NULL,
  `institucion_distrito` varchar(150) DEFAULT NULL,
  `institucion_zona` varchar(50) DEFAULT NULL,
  `institucion_slogan` varchar(250) DEFAULT NULL,
  `institucion_departamento` varchar(150) DEFAULT NULL,
  `institucion_codigo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`institucion_id`),
  UNIQUE KEY `institucion_id` (`institucion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `administrativo` table : 
#

DROP TABLE IF EXISTS `administrativo`;

CREATE TABLE `administrativo` (
  `administrativo_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `estadocivil_id` int(11) DEFAULT NULL,
  `institucion_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `administrativo_nombre` varchar(50) DEFAULT NULL,
  `administrativo_apellidos` varchar(50) DEFAULT NULL,
  `administrativo_fechanac` date DEFAULT NULL,
  `administrativo_email` varchar(55) DEFAULT NULL,
  `administrativo_edad` int(11) DEFAULT NULL,
  `administrativo_ci` varchar(50) DEFAULT NULL,
  `administrativo_extci` varchar(15) DEFAULT NULL,
  `administrativo_codigo` varchar(50) DEFAULT NULL,
  `administrativo_direccion` varchar(50) DEFAULT NULL,
  `administrativo_telefono` varchar(50) DEFAULT NULL,
  `administrativo_celular` varchar(50) DEFAULT NULL,
  `administrativo_cargo` varchar(50) DEFAULT NULL,
  `administrativo_foto` varchar(250) DEFAULT NULL,
  `administrativo_fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`administrativo_id`),
  UNIQUE KEY `administrativo_id` (`administrativo_id`),
  KEY `fk_estadocivil_administrativo` (`estadocivil_id`),
  KEY `fk_estado_administrativo` (`estado_id`),
  KEY `fk_genero_administrativo` (`genero_id`),
  KEY `fk_institucion` (`institucion_id`),
  CONSTRAINT `fk_estadocivil_administrativo` FOREIGN KEY (`estadocivil_id`) REFERENCES `estado_civil` (`estadocivil_id`),
  CONSTRAINT `fk_estado_administrativo` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_genero_administrativo` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`),
  CONSTRAINT `fk_institucion` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`institucion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `area_carrera` table : 
#

DROP TABLE IF EXISTS `area_carrera`;

CREATE TABLE `area_carrera` (
  `areacarrera_id` int(11) NOT NULL AUTO_INCREMENT,
  `areacarrera_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`areacarrera_id`),
  UNIQUE KEY `areacarrera_id` (`areacarrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `area_materia` table : 
#

DROP TABLE IF EXISTS `area_materia`;

CREATE TABLE `area_materia` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_nombre` varchar(100) DEFAULT NULL,
  `area_fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`area_id`),
  UNIQUE KEY `area_id` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Structure for the `aula` table : 
#

DROP TABLE IF EXISTS `aula`;

CREATE TABLE `aula` (
  `aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `aula_nombre` varchar(150) DEFAULT NULL,
  `aula_descripcion` varchar(250) DEFAULT NULL,
  `aula_capacidad` int(11) DEFAULT NULL,
  `aula_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`aula_id`),
  UNIQUE KEY `aula_id` (`aula_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `carrera` table : 
#

DROP TABLE IF EXISTS `carrera`;

CREATE TABLE `carrera` (
  `carrera_id` int(11) NOT NULL AUTO_INCREMENT,
  `areacarrera_id` int(11) DEFAULT NULL,
  `carrera_nombre` varchar(150) DEFAULT NULL,
  `carrera_nombreinterno` varchar(150) DEFAULT NULL,
  `carrera_codigo` varchar(50) DEFAULT NULL,
  `carrera_nivel` varchar(50) DEFAULT NULL,
  `carrera_modalidad` varchar(50) DEFAULT NULL,
  `carrera_plan` varchar(50) DEFAULT NULL,
  `carrera_fechacreacion` date DEFAULT NULL,
  `carrera_codaprod` varchar(50) DEFAULT NULL,
  `carrera_matricula` float DEFAULT NULL,
  `carrera_mensualidad` float DEFAULT NULL,
  `carrera_tiempoestudio` varchar(50) DEFAULT NULL,
  `carrera_cargahoraria` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`carrera_id`),
  UNIQUE KEY `carrera_id` (`carrera_id`),
  KEY `fk_area_carrera` (`areacarrera_id`),
  CONSTRAINT `fk_area_carrera` FOREIGN KEY (`areacarrera_id`) REFERENCES `area_carrera` (`areacarrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Structure for the `categoria_egreso` table : 
#

DROP TABLE IF EXISTS `categoria_egreso`;

CREATE TABLE `categoria_egreso` (
  `id_categr` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_categr` varchar(50) NOT NULL,
  `descrip_categr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `categoria_ingreso` table : 
#

DROP TABLE IF EXISTS `categoria_ingreso`;

CREATE TABLE `categoria_ingreso` (
  `id_cating` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_cating` varchar(50) NOT NULL,
  `descrip_cating` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cating`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `ci_session` table : 
#

DROP TABLE IF EXISTS `ci_session`;

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `estudiante` table : 
#

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `estudiante_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `estadocivil_id` int(11) DEFAULT NULL,
  `estudiante_nombre` varchar(50) DEFAULT NULL,
  `estudiante_apellidos` varchar(75) DEFAULT NULL,
  `estudiante_fechanac` date DEFAULT NULL,
  `estudiante_edad` int(11) DEFAULT NULL,
  `estudiante_ci` varchar(50) DEFAULT NULL,
  `estudiante_extci` varchar(50) DEFAULT NULL,
  `estudiante_codigo` varchar(20) DEFAULT NULL,
  `estudiante_direccion` varchar(150) DEFAULT NULL,
  `estudiante_telefono` varchar(50) DEFAULT NULL,
  `estudiante_celular` varchar(50) DEFAULT NULL,
  `estudiante_foto` varchar(250) DEFAULT NULL,
  `estudiante_lugarnac` varchar(50) DEFAULT NULL,
  `estudiante_nacionalidad` varchar(50) DEFAULT NULL,
  `estudiante_establecimiento` varchar(150) DEFAULT NULL,
  `estudiante_distrito` varchar(150) DEFAULT NULL,
  `estudiante_apoderado` varchar(150) DEFAULT NULL,
  `apoderado_foto` varchar(250) DEFAULT NULL,
  `estudiante_apodireccion` varchar(150) DEFAULT NULL,
  `estudiante_apoparentesco` varchar(50) DEFAULT NULL,
  `estudiante_apotelefono` varchar(50) DEFAULT NULL,
  `estudiante_nit` varchar(50) DEFAULT NULL,
  `estudiante_razon` varchar(150) DEFAULT NULL,
  `estudiante_email` varchar(55) NOT NULL,
  PRIMARY KEY (`estudiante_id`),
  UNIQUE KEY `estudiante_id` (`estudiante_id`),
  KEY `fk_estadocivil_estudiante` (`estadocivil_id`),
  KEY `fk_estado_estudiante` (`estado_id`),
  KEY `fk_genero_estudiante` (`genero_id`),
  CONSTRAINT `fk_estadocivil_estudiante` FOREIGN KEY (`estadocivil_id`) REFERENCES `estado_civil` (`estadocivil_id`),
  CONSTRAINT `fk_estado_estudiante` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_genero_estudiante` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `gestion` table : 
#

DROP TABLE IF EXISTS `gestion`;

CREATE TABLE `gestion` (
  `gestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `gestion_descripcion` int(11) DEFAULT NULL,
  `gestion_semestre` int(11) DEFAULT NULL,
  `gestion_inicio` date DEFAULT NULL,
  `gestion_fin` date DEFAULT NULL,
  `gestion_estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gestion_id`),
  UNIQUE KEY `gestion_id` (`gestion_id`),
  KEY `fk_estado_gestion` (`estado_id`),
  CONSTRAINT `fk_estado_gestion` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `plan_academico` table : 
#

DROP TABLE IF EXISTS `plan_academico`;

CREATE TABLE `plan_academico` (
  `planacad_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `planacad_nombre` varchar(100) DEFAULT NULL,
  `planacad_codigo` varchar(100) DEFAULT NULL,
  `planacad_titmodalidad` varchar(50) DEFAULT NULL,
  `planacad_cantgestion` int(11) DEFAULT NULL,
  PRIMARY KEY (`planacad_id`),
  KEY `fk_estado_plan` (`estado_id`),
  KEY `fk_plan_carrera` (`carrera_id`),
  CONSTRAINT `fk_estado_plan` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_plan_carrera` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Structure for the `nivel` table : 
#

DROP TABLE IF EXISTS `nivel`;

CREATE TABLE `nivel` (
  `nivel_id` int(11) NOT NULL AUTO_INCREMENT,
  `planacad_id` int(11) DEFAULT NULL,
  `nivel_descripcion` varchar(150) DEFAULT NULL,
  `nivel_color` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nivel_id`),
  UNIQUE KEY `nivel_id` (`nivel_id`),
  KEY `nivel_fk` (`planacad_id`),
  CONSTRAINT `nivel_fk` FOREIGN KEY (`planacad_id`) REFERENCES `plan_academico` (`planacad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

#
# Structure for the `paralelo` table : 
#

DROP TABLE IF EXISTS `paralelo`;

CREATE TABLE `paralelo` (
  `paralelo_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `paralelo_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`paralelo_id`),
  UNIQUE KEY `paralelo_id` (`paralelo_id`),
  KEY `fk_estado_paralelo` (`estado_id`),
  CONSTRAINT `fk_estado_paralelo` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `turno` table : 
#

DROP TABLE IF EXISTS `turno`;

CREATE TABLE `turno` (
  `turno_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `turno_nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`turno_id`),
  UNIQUE KEY `turno_id` (`turno_id`),
  KEY `fk_estado_turno` (`estado_id`),
  CONSTRAINT `fk_estado_turno` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  `usuario_email` varchar(50) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  `usuario_clave` varchar(255) DEFAULT NULL,
  `usuario_imagen` varchar(100) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `tipousuario_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `inscripcion` table : 
#

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion` (
  `inscripcion_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `gestion_id` int(11) DEFAULT NULL,
  `estudiante_id` int(11) DEFAULT NULL,
  `paralelo_id` int(11) DEFAULT NULL,
  `nivel_id` int(11) DEFAULT NULL,
  `turno_id` int(11) DEFAULT NULL,
  `inscripcion_fecha` date DEFAULT NULL,
  `inscripcion_hora` time DEFAULT NULL,
  `inscripcion_fechainicio` date DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`inscripcion_id`),
  UNIQUE KEY `inscripcion_id` (`inscripcion_id`),
  KEY `fk_estudiante_inscripcion` (`estudiante_id`),
  KEY `fk_gestion_inscripcion` (`gestion_id`),
  KEY `fk_nivel_inscripcion` (`nivel_id`),
  KEY `fk_paralelo_inscripcion` (`paralelo_id`),
  KEY `fk_turno_inscripcion` (`turno_id`),
  KEY `fk_usuario_incripcion` (`usuario_id`),
  KEY `carrera_id` (`carrera_id`),
  CONSTRAINT `fk_estudiante_inscripcion` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`estudiante_id`),
  CONSTRAINT `fk_gestion_inscripcion` FOREIGN KEY (`gestion_id`) REFERENCES `gestion` (`gestion_id`),
  CONSTRAINT `fk_nivel_inscripcion` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`nivel_id`),
  CONSTRAINT `fk_paralelo_inscripcion` FOREIGN KEY (`paralelo_id`) REFERENCES `paralelo` (`paralelo_id`),
  CONSTRAINT `fk_turno_inscripcion` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`),
  CONSTRAINT `fk_usuario_incripcion` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `matricula` table : 
#

DROP TABLE IF EXISTS `matricula`;

CREATE TABLE `matricula` (
  `matricula_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion_id` int(11) DEFAULT NULL,
  `matricula_fechapago` date DEFAULT NULL,
  `matricula_horapago` time DEFAULT NULL,
  `matricula_fechalimite` date DEFAULT NULL,
  `matricula_monto` float DEFAULT NULL,
  `matricula_descuento` float DEFAULT NULL,
  `matricula_total` float DEFAULT NULL,
  PRIMARY KEY (`matricula_id`),
  UNIQUE KEY `matricula_id` (`matricula_id`),
  KEY `fk_matricula_inscripcion` (`inscripcion_id`),
  CONSTRAINT `fk_matricula_inscripcion` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`inscripcion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `kardex_economico` table : 
#

DROP TABLE IF EXISTS `kardex_economico`;

CREATE TABLE `kardex_economico` (
  `kardexeco_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `kardexeco_matricula` float DEFAULT NULL,
  `kardexeco_mensualidad` float DEFAULT NULL,
  `kardexeco_nummens` int(11) DEFAULT NULL,
  `kardexeco_observacion` varchar(250) DEFAULT NULL,
  `kardexeco_fecha` date DEFAULT NULL,
  `kardexeco_hora` time DEFAULT NULL,
  PRIMARY KEY (`kardexeco_id`),
  UNIQUE KEY `kardexeco_id` (`kardexeco_id`),
  KEY `fk_cardexeco_inscripcion` (`inscripcion_id`),
  KEY `fk_estado_kardex` (`estado_id`),
  CONSTRAINT `fk_cardexeco_inscripcion` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`inscripcion_id`),
  CONSTRAINT `fk_estado_kardex` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `mensualidad` table : 
#

DROP TABLE IF EXISTS `mensualidad`;

CREATE TABLE `mensualidad` (
  `mensualidad_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `kardexeco_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `mensualidad_numero` int(11) DEFAULT NULL,
  `mensualidad_montoparcial` float DEFAULT NULL,
  `mensualidad_descuento` float DEFAULT NULL,
  `mensualidad_montototal` float DEFAULT NULL,
  `mensualidad_fechalimite` date DEFAULT NULL,
  `mensualidad_mora` int(11) DEFAULT NULL,
  `mensualidad_montocancelado` float DEFAULT NULL,
  `mensualidad_saldo` float DEFAULT NULL,
  `mensualidad_fechapago` date DEFAULT NULL,
  `mensualidad_horapago` time DEFAULT NULL,
  `mensualidad_nombre` varchar(150) DEFAULT NULL,
  `mensualidad_ci` varchar(50) DEFAULT NULL,
  `mensualidad_glosa` varchar(150) DEFAULT NULL,
  `mensualidad_numrec` int(11) DEFAULT NULL,
  `mensualidad_mes` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`mensualidad_id`),
  UNIQUE KEY `mensualidad_id` (`mensualidad_id`),
  KEY `fk_estado_mensualidad` (`estado_id`),
  KEY `fk_kardexacad_mensualidad` (`kardexeco_id`),
  KEY `fk_usuario_mensualidad` (`usuario_id`),
  CONSTRAINT `fk_estado_mensualidad` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_kardexacad_mensualidad` FOREIGN KEY (`kardexeco_id`) REFERENCES `kardex_economico` (`kardexeco_id`),
  CONSTRAINT `fk_usuario_mensualidad` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Structure for the `factura` table : 
#

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_id` int(11) DEFAULT NULL,
  `mensualidad_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `factura_fechaventa` date DEFAULT NULL,
  `factura_fecha` date DEFAULT NULL,
  `factura_hora` time DEFAULT NULL,
  `factura_subtotaltotal` float DEFAULT NULL,
  `factura_ice` float DEFAULT NULL,
  `factura_exento` float DEFAULT NULL,
  `factura_descuento` float DEFAULT NULL,
  `factura_total` float DEFAULT NULL,
  `factura_numero` float DEFAULT NULL,
  `factura_autorizacion` varchar(30) DEFAULT NULL,
  `factura_llave` varchar(250) DEFAULT NULL,
  `factura_fechalimite` date DEFAULT NULL,
  `factura_codigocontrol` varchar(50) DEFAULT NULL,
  `factura_leyenda1` varchar(250) DEFAULT NULL,
  `factura_leyenda2` varchar(250) DEFAULT NULL,
  `factura_nit` bigint(20) DEFAULT NULL,
  `factura_razonsocial` varchar(150) DEFAULT NULL,
  `factura_nitemisor` bigint(20) DEFAULT NULL,
  `factura_sucursal` varchar(150) DEFAULT NULL,
  `factura_sfc` varchar(20) DEFAULT NULL,
  `factura_actividad` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`factura_id`),
  UNIQUE KEY `factura_id` (`factura_id`),
  KEY `fk_factura_matricula` (`matricula_id`),
  KEY `fk_relationship_34` (`mensualidad_id`),
  CONSTRAINT `fk_factura_matricula` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`matricula_id`),
  CONSTRAINT `fk_relationship_34` FOREIGN KEY (`mensualidad_id`) REFERENCES `mensualidad` (`mensualidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `detalle_factura` table : 
#

DROP TABLE IF EXISTS `detalle_factura`;

CREATE TABLE `detalle_factura` (
  `detalle_id` int(11) NOT NULL AUTO_INCREMENT,
  `factura_id` int(11) DEFAULT NULL,
  `detalle_descripcion` varchar(250) DEFAULT NULL,
  `detalle_cantidad` float DEFAULT NULL,
  `detalle_precio` float DEFAULT NULL,
  `detalle_subtotal` float DEFAULT NULL,
  `detalle_descuento` float DEFAULT NULL,
  `detalle_totalfinal` float DEFAULT NULL,
  `detalle_caracteristicas` text,
  PRIMARY KEY (`detalle_id`),
  UNIQUE KEY `detalle_id` (`detalle_id`),
  KEY `fk_detalle_factura` (`factura_id`),
  CONSTRAINT `fk_detalle_factura` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`factura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `docente` table : 
#

DROP TABLE IF EXISTS `docente`;

CREATE TABLE `docente` (
  `docente_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `docente_nombre` varchar(50) DEFAULT NULL,
  `docente_apellidos` varchar(50) DEFAULT NULL,
  `docente_fechanac` date DEFAULT NULL,
  `docente_edad` int(11) DEFAULT NULL,
  `docente_ci` varchar(50) DEFAULT NULL,
  `docente_extci` varchar(15) DEFAULT NULL,
  `docente_codigo` varchar(50) DEFAULT NULL,
  `docente_direccion` varchar(50) DEFAULT NULL,
  `docente_telefono` varchar(50) DEFAULT NULL,
  `docente_celular` varchar(50) DEFAULT NULL,
  `docente_titulo` varchar(50) DEFAULT NULL,
  `docente_especialidad` varchar(50) DEFAULT NULL,
  `docente_foto` varchar(50) DEFAULT NULL,
  `docente_email` varchar(50) DEFAULT NULL,
  `estadocivil_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`docente_id`),
  UNIQUE KEY `docente_id` (`docente_id`),
  KEY `fk_estado_docente` (`estado_id`),
  KEY `fk_genero_docente` (`genero_id`),
  CONSTRAINT `fk_estado_docente` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_genero_docente` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `egresos` table : 
#

DROP TABLE IF EXISTS `egresos`;

CREATE TABLE `egresos` (
  `egreso_id` int(11) NOT NULL AUTO_INCREMENT,
  `egreso_numero` int(11) NOT NULL,
  `usuario_id` varchar(55) NOT NULL,
  `egreso_categoria` text NOT NULL,
  `egreso_nombre` varchar(150) DEFAULT NULL,
  `egreso_monto` float DEFAULT NULL,
  `egreso_moneda` varchar(10) DEFAULT NULL,
  `egreso_concepto` varchar(250) DEFAULT NULL,
  `egreso_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`egreso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `periodo` table : 
#

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `periodo_id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_nombre` varchar(100) DEFAULT NULL,
  `periodo_horainicio` time DEFAULT NULL,
  `periodo_horafin` time DEFAULT NULL,
  PRIMARY KEY (`periodo_id`),
  UNIQUE KEY `periodo_id` (`periodo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `horario` table : 
#

DROP TABLE IF EXISTS `horario`;

CREATE TABLE `horario` (
  `horario_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL,
  `horario_desde` time DEFAULT NULL,
  `horario_hasta` time DEFAULT NULL,
  PRIMARY KEY (`horario_id`),
  UNIQUE KEY `horario_id` (`horario_id`),
  KEY `fk_estado_horario` (`estado_id`),
  KEY `fk_periodo_horario` (`periodo_id`),
  CONSTRAINT `fk_estado_horario` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_periodo_horario` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`periodo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `materia` table : 
#

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `materia_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) DEFAULT NULL,
  `nivel_id` int(11) DEFAULT NULL,
  `mat_materia_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `materia_nombre` varchar(100) DEFAULT NULL,
  `materia_alias` varchar(100) DEFAULT NULL,
  `materia_codigo` varchar(50) DEFAULT NULL,
  `materia_horas` float DEFAULT NULL,
  `materia_hp` int(11) DEFAULT NULL,
  `materia_ht` int(11) DEFAULT NULL,
  `materia_th` int(11) DEFAULT NULL,
  `materia_cyp` int(11) DEFAULT NULL,
  `materia_cys` int(11) DEFAULT NULL,
  `materia_vtt` int(11) DEFAULT NULL,
  `materia_ctp` int(11) DEFAULT NULL,
  `materia_estapa1` int(11) DEFAULT NULL,
  `materia_estapa2` int(11) DEFAULT NULL,
  `materia_estapa3` int(11) DEFAULT NULL,
  `materia_estapa4` int(11) DEFAULT NULL,
  `materia_numareas` int(11) DEFAULT NULL,
  `materia_notainstancia` int(11) DEFAULT NULL,
  `materia_notaaprobado` int(11) DEFAULT NULL,
  `materia_maxima` int(11) DEFAULT NULL,
  `materia_calificacion1` varchar(20) DEFAULT NULL,
  `materia_ponderado1` int(11) DEFAULT NULL,
  `materia_calificacion2` varchar(20) DEFAULT NULL,
  `materia_ponderado2` int(11) DEFAULT NULL,
  `materia_calificacion3` varchar(20) DEFAULT NULL,
  `materia_ponderado3` int(11) DEFAULT NULL,
  `materia_calificacion4` varchar(20) DEFAULT NULL,
  `materia_ponderado4` int(11) DEFAULT NULL,
  `materia_ponderado5` varchar(20) DEFAULT NULL,
  `materia_calificacion5` int(11) DEFAULT NULL,
  `materia_calificacion6` varchar(20) DEFAULT NULL,
  `materia_ponderado6` int(11) DEFAULT NULL,
  `materia_calificacion7` varchar(20) DEFAULT NULL,
  `materia_ponderado7` int(11) DEFAULT NULL,
  PRIMARY KEY (`materia_id`),
  UNIQUE KEY `materia_id` (`materia_id`),
  KEY `fk_area_materia` (`area_id`),
  KEY `fk_estado_materia` (`estado_id`),
  KEY `fk_nivel_materia` (`nivel_id`),
  CONSTRAINT `fk_area_materia` FOREIGN KEY (`area_id`) REFERENCES `area_materia` (`area_id`),
  CONSTRAINT `fk_estado_materia` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_nivel_materia` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`nivel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

#
# Structure for the `grupo` table : 
#

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `grupo_id` int(11) NOT NULL AUTO_INCREMENT,
  `horario_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `gestion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `aula_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `grupo_nombre` varchar(150) DEFAULT NULL,
  `grupo_descripcion` varchar(150) DEFAULT NULL,
  `grupo_horanicio` time DEFAULT NULL,
  `grupo_horafin` time DEFAULT NULL,
  PRIMARY KEY (`grupo_id`),
  UNIQUE KEY `grupo_id` (`grupo_id`),
  KEY `fk_aula_grupo` (`aula_id`),
  KEY `fk_docente_grupo` (`docente_id`),
  KEY `fk_grupo_gestion` (`gestion_id`),
  KEY `fk_grupo_materia` (`materia_id`),
  KEY `fk_horario_grupo` (`horario_id`),
  KEY `fk_usuario_grupo` (`usuario_id`),
  CONSTRAINT `fk_aula_grupo` FOREIGN KEY (`aula_id`) REFERENCES `aula` (`aula_id`),
  CONSTRAINT `fk_docente_grupo` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`docente_id`),
  CONSTRAINT `fk_grupo_gestion` FOREIGN KEY (`gestion_id`) REFERENCES `gestion` (`gestion_id`),
  CONSTRAINT `fk_grupo_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`materia_id`),
  CONSTRAINT `fk_horario_grupo` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`horario_id`),
  CONSTRAINT `fk_usuario_grupo` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `grupo_inscripcion` table : 
#

DROP TABLE IF EXISTS `grupo_inscripcion`;

CREATE TABLE `grupo_inscripcion` (
  `grupoins_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupoins_fecha` date DEFAULT NULL,
  `grupoins_hora` time DEFAULT NULL,
  `grupo_id` int(11) NOT NULL,
  `inscripcion_id` int(11) NOT NULL,
  PRIMARY KEY (`grupoins_id`),
  KEY `fk_grupoins_grupo` (`grupo_id`),
  KEY `fk_grupoins_inscripcion` (`inscripcion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `ingresos` table : 
#

DROP TABLE IF EXISTS `ingresos`;

CREATE TABLE `ingresos` (
  `ingreso_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso_numero` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ingreso_categoria` text NOT NULL,
  `ingreso_nombre` varchar(150) DEFAULT NULL,
  `ingreso_monto` float DEFAULT NULL,
  `ingreso_moneda` varchar(10) DEFAULT NULL,
  `ingreso_concepto` varchar(250) DEFAULT NULL,
  `ingreso_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ingreso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `kardex_academico` table : 
#

DROP TABLE IF EXISTS `kardex_academico`;

CREATE TABLE `kardex_academico` (
  `kardexacad_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion_id` int(11) DEFAULT NULL,
  `kardexacad_notfinal1` int(11) DEFAULT NULL,
  `kardexacad_notfinal2` int(11) DEFAULT NULL,
  `kardexacad_notfinal3` int(11) DEFAULT NULL,
  `kardexacad_notfinal4` int(11) DEFAULT NULL,
  `kardexacad_notfinal5` int(11) DEFAULT NULL,
  `kardexacad_notfinal` int(11) DEFAULT NULL,
  `kardexacad_estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kardexacad_id`),
  UNIQUE KEY `kardexacad_id` (`kardexacad_id`),
  KEY `fk_cardexacad_inscripcion` (`inscripcion_id`),
  CONSTRAINT `fk_cardexacad_inscripcion` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`inscripcion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `materia_asignada` table : 
#

DROP TABLE IF EXISTS `materia_asignada`;

CREATE TABLE `materia_asignada` (
  `materiaasig_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `kardexacad_id` int(11) DEFAULT NULL,
  `materiaasig_nombre` varchar(150) DEFAULT NULL,
  `materiaasig_codigo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`materiaasig_id`),
  UNIQUE KEY `materiaasig_id` (`materiaasig_id`),
  KEY `fk_estado_materiaasig` (`estado_id`),
  KEY `fk_kardex_materia` (`kardexacad_id`),
  CONSTRAINT `fk_estado_materiaasig` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_kardex_materia` FOREIGN KEY (`kardexacad_id`) REFERENCES `kardex_academico` (`kardexacad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `nota` table : 
#

DROP TABLE IF EXISTS `nota`;

CREATE TABLE `nota` (
  `nota_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `materiaasig_id` int(11) DEFAULT NULL,
  `nota_aistencia` int(11) DEFAULT NULL,
  `nota_trabinv` int(11) DEFAULT NULL,
  `nota_dps` int(11) DEFAULT NULL,
  `nota_pruebprac` int(11) DEFAULT NULL,
  `nota_pruebbim` int(11) DEFAULT NULL,
  `nota_puntajetot` int(11) DEFAULT NULL,
  `nota_numbimestre` int(11) DEFAULT NULL,
  `nota_pond1_mat` int(11) DEFAULT NULL,
  `nota_pond2_mat` int(11) DEFAULT NULL,
  `nota_pond3_mat` int(11) DEFAULT NULL,
  `nota_pond4_mat` int(11) DEFAULT NULL,
  `nota_pond5_mat` int(11) DEFAULT NULL,
  `nota_pond6_mat` int(11) DEFAULT NULL,
  `nota_pond7_ma` int(11) DEFAULT NULL,
  `nota_fec_registrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nota_bimestre` int(11) DEFAULT NULL,
  `nota_notafinal` int(11) DEFAULT NULL,
  PRIMARY KEY (`nota_id`),
  UNIQUE KEY `nota_id` (`nota_id`),
  KEY `fk_estado_nota` (`estado_id`),
  KEY `fk_nota_materia` (`materiaasig_id`),
  CONSTRAINT `fk_estado_nota` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_nota_materia` FOREIGN KEY (`materiaasig_id`) REFERENCES `materia_asignada` (`materiaasig_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `parametros` table : 
#

DROP TABLE IF EXISTS `parametros`;

CREATE TABLE `parametros` (
  `parametro_id` int(11) NOT NULL,
  `parametro_numrecegr` int(11) DEFAULT NULL,
  `parametro_numrecing` int(11) DEFAULT NULL,
  `parametro_copiasfact` int(11) DEFAULT NULL,
  `parametro_tipoimpresora` varchar(20) DEFAULT NULL,
  `parametro_numcuotas` int(11) DEFAULT NULL,
  `parametro_montomax` float(9,3) DEFAULT NULL,
  `parametro_diasgracia` int(11) DEFAULT NULL,
  `parametro_diapago` int(11) DEFAULT NULL,
  `parametro_periododias` int(11) DEFAULT NULL,
  `parametro_interes` int(11) DEFAULT NULL,
  `parametro_tituldoc` varchar(150) NOT NULL,
  PRIMARY KEY (`parametro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `rol` table : 
#

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `rol_nombre` varchar(250) DEFAULT NULL,
  `rol_descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`rol_id`),
  UNIQUE KEY `rol_id` (`rol_id`),
  KEY `fk_estado_rol` (`estado_id`),
  CONSTRAINT `fk_estado_rol` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_aula` table : 
#

DROP TABLE IF EXISTS `tipo_aula`;

CREATE TABLE `tipo_aula` (
  `tipoaula_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoaula_descripcion` varchar(55) NOT NULL,
  PRIMARY KEY (`tipoaula_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_usuario` table : 
#

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `tipousuario_id` int(11) NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `tipousuario_descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for the `estado_civil` table  (LIMIT 0,500)
#

INSERT INTO `estado_civil` (`estadocivil_id`, `estadocivil_descripcion`) VALUES 
  (1,'CASADO(A)'),
  (2,'SOLTERO(A)'),
  (3,'DIVORCIADO(A)');
COMMIT;

#
# Data for the `estado` table  (LIMIT 0,500)
#

INSERT INTO `estado` (`estado_id`, `estado_descripcion`, `estado_color`, `estado_tipo`) VALUES 
  (1,'ACTIVO','#ffffff',1),
  (2,'INACTIVO','#ff0000',1),
  (3,'PENDIENTE','#ff8000',2),
  (4,'CANCELADO','#00ff00',2);
COMMIT;

#
# Data for the `genero` table  (LIMIT 0,500)
#

INSERT INTO `genero` (`genero_id`, `genero_nombre`) VALUES 
  (1,'HOMBRE'),
  (2,'MUJER');
COMMIT;

#
# Data for the `institucion` table  (LIMIT 0,500)
#

INSERT INTO `institucion` (`institucion_id`, `institucion_nombre`, `institucion_direccion`, `institucion_telefono`, `institucion_fechacreacion`, `institucion_logo`, `institucion_ubicacion`, `institucion_distrito`, `institucion_zona`, `institucion_slogan`, `institucion_departamento`, `institucion_codigo`) VALUES 
  (1,'UNIVERSIDAD','21 DE MAYO','74555444','0000-00-00','1549563685.png','COCHABAMBA-BOLIVIA','','VILLA UNO','la mejor U !!!','COCHABAMBA','');
COMMIT;

#
# Data for the `administrativo` table  (LIMIT 0,500)
#

INSERT INTO `administrativo` (`administrativo_id`, `estado_id`, `estadocivil_id`, `institucion_id`, `genero_id`, `administrativo_nombre`, `administrativo_apellidos`, `administrativo_fechanac`, `administrativo_email`, `administrativo_edad`, `administrativo_ci`, `administrativo_extci`, `administrativo_codigo`, `administrativo_direccion`, `administrativo_telefono`, `administrativo_celular`, `administrativo_cargo`, `administrativo_foto`, `administrativo_fechareg`) VALUES 
  (1,1,1,1,2,'Maria Antonieta','Nieves','0000-00-00','mara@anto.com',NULL,'5662214','ORU','Mar799','21 de abril','44445555','77745552','','','2019-02-04 22:02:19');
COMMIT;

#
# Data for the `area_carrera` table  (LIMIT 0,500)
#

INSERT INTO `area_carrera` (`areacarrera_id`, `areacarrera_nombre`) VALUES 
  (1,'TECNOLOGIA'),
  (2,'Telecomunicaciones'),
  (3,'Salud'),
  (4,'Recursos Hidricos'),
  (5,'Agrícola y Pecuaria');
COMMIT;

#
# Data for the `area_materia` table  (LIMIT 0,500)
#

INSERT INTO `area_materia` (`area_id`, `area_nombre`, `area_fechareg`) VALUES 
  (1,'tecnologia','2019-02-05 00:00:00'),
  (2,'Ciencias Sociales','2019-01-24 20:00:00'),
  (3,'Lenguaje','2019-01-24 20:00:00'),
  (4,'Programacion','2019-01-24 20:00:00'),
  (5,'Bases de Datos','2019-01-24 20:00:00'),
  (6,'Telecomunicaciones','2019-01-24 20:00:00'),
  (7,'Botanica','2019-01-24 20:00:00'),
  (8,'Biologia','2019-01-24 20:00:00'),
  (9,'Matemáticas','2019-01-24 20:00:00'),
  (10,'Salud','2019-01-24 20:00:00'),
  (11,'Psicologia','2019-01-24 20:00:00'),
  (12,'Quimica','2019-01-24 20:00:00'),
  (13,'Ciencias Naturales','2019-01-24 20:00:00');
COMMIT;

#
# Data for the `aula` table  (LIMIT 0,500)
#

INSERT INTO `aula` (`aula_id`, `aula_nombre`, `aula_descripcion`, `aula_capacidad`, `aula_tipo`) VALUES 
  (1,'AULA 402','laboratorio de computo',30,'1');
COMMIT;

#
# Data for the `carrera` table  (LIMIT 0,500)
#

INSERT INTO `carrera` (`carrera_id`, `areacarrera_id`, `carrera_nombre`, `carrera_nombreinterno`, `carrera_codigo`, `carrera_nivel`, `carrera_modalidad`, `carrera_plan`, `carrera_fechacreacion`, `carrera_codaprod`, `carrera_matricula`, `carrera_mensualidad`, `carrera_tiempoestudio`, `carrera_cargahoraria`) VALUES 
  (1,1,'Sistemas','sistemas','Sis1212','4','semestral','plan','0000-00-00','sis2010',0,0,'0',NULL),
  (2,4,'Perforación de Pozos','Perforación de Pozos','PDP-654','Técnico Superior','Presencial','que es plan?','2020-10-04','que es?',100,300,'7',NULL),
  (3,3,'Medicina Intermedia','Medicina a nivel TECNICO suerior','MED-432','INTERMEDIO','Presencial','Modular','2011-11-23','nn',350,200,'6',NULL),
  (4,3,'Conocimiento de Llamadas en Comunicacion','Tecnico en Reparacion y Mantenimiento de celulares','CLC','Tecnico Medio','Presencial','Modular','2010-01-15','nn',300,100,'5',NULL),
  (5,1,'Tecnico en Anteojos','Tecnicos en Anteojos','TAN','Tecnico Medio','Presencial','Modular','2001-05-13','nn',250,150,'6',NULL),
  (6,3,'Proteinas para los humanos','Proteinas','PPH','Técnico Superior','Presencial','Modular','2011-11-15','nn',100,200,'6',NULL),
  (7,1,'Manejo de CPUS','Operador de PCS','OPCS','Técnico Basico','Presencial','Modular','2014-04-10','nn',50,150,'3',NULL),
  (8,4,'Manejo de Cristales','Operador de Cristales','OPC','Técnico Superior','Presencial','Modular','2000-12-12','nn',100,150,'6',NULL),
  (9,4,'LLenado Vasos','LLenado Vasos','LLVS','Técnico Superior','Presencial','Modular','0000-00-00',NULL,0,0,'0',NULL),
  (10,3,'Envases Descartables','Envases Descartables','ENVDES','tecnico','Presencial','Modular','2010-02-15',NULL,50,50,'6',NULL),
  (11,4,'Carrera de Prueba','Carrera de Prueba','aa','','','','0000-00-00',NULL,0,0,'0',NULL),
  (12,4,'Prueba Carrera 2','Prueba Carrera 2','PC2','Técnico Superior','Semi precencial','Plan prueba 2','2017-02-15',NULL,150,100,'6',NULL),
  (13,4,'Carrera Prueba 3','Carrera Prueba 3','CP 3','Técnico Superior','Presencial','Modular','2011-02-15',NULL,150,50,'15',NULL),
  (14,1,'Técnico Operador de computadoras','Conocimiento de Tecnologías de Computación','TOC-345','Técnico','Semi precencial','que es plan?','2020-07-08','no se que es',250,100,'6',NULL),
  (15,5,'Viticultura y Enología con Mención en Viticultura','Viticultura y Enología con Mención en Viticultura','VEMV','Técnico Superior','Semestral',NULL,'2009-05-01',NULL,150,100,'6 Semestres','3600');
COMMIT;

#
# Data for the `categoria_egreso` table  (LIMIT 0,500)
#

INSERT INTO `categoria_egreso` (`id_categr`, `categoria_categr`, `descrip_categr`) VALUES 
  (1,'PAGO A PROVEEDOR','-'),
  (2,'REFRIGERIOS','-'),
  (3,'SALIDA','');
COMMIT;

#
# Data for the `categoria_ingreso` table  (LIMIT 0,500)
#

INSERT INTO `categoria_ingreso` (`id_cating`, `categoria_cating`, `descrip_cating`) VALUES 
  (1,'PAGO POR SERVICIOS',''),
  (2,'PAGO POR MEMBRESIA','');
COMMIT;

#
# Data for the `ci_session` table  (LIMIT 0,500)
#

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES 
  ('alqeqq2l2okc7op8opbfh712otd6ueu4','127.0.0.1',1550174960,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303137343935333B),
  ('6as1mi3uq838hu0igf4472f52tm4472c','127.0.0.1',1550176568,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303137363332373B),
  ('8liuhc4k1opo6q169uhrhh6gi0lgosj1','127.0.0.1',1550177124,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303137373038353B),
  ('fgr4bu8r52l22qrhci4ecv3ldfvq7353','127.0.0.1',1550179229,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303137373939393B),
  ('maatl75uquqij111v1agpgqtl9ncbinf','127.0.0.1',1550179735,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303137393730303B),
  ('0o772cmq7vgohk83jh796ib2k14qgkb1','127.0.0.1',1550183287,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303138303032323B),
  ('b02uatfvp2gtuanc07vh8fj4qd0mq8e2','127.0.0.1',1550184022,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303138333834323B),
  ('es9iq8aersrleav84kg06meipe5hknpt','127.0.0.1',1550228963,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303232383933333B),
  ('ona8ht5i1d15k2gbmaskemibub9ec5ca','127.0.0.1',1550235709,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303233353534323B),
  ('4lqavgllq2mbkopmg45sjas7chhp762e','127.0.0.1',1550236767,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303233363530303B),
  ('rnpq9oca37gipcvq2pmbjpu26fbrvidi','127.0.0.1',1550237700,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303233373638343B),
  ('cg693p1bf5tuf2lhs4gufr9npcitl9a0','127.0.0.1',1550239323,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303233393034333B),
  ('cec136n1915q78r1u51uha87g19m4alk','127.0.0.1',1550239866,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303233393537353B),
  ('66g9f27b0cv3lm710h52oabc2vuhqcmf','127.0.0.1',1550240003,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303233393838353B),
  ('tmk8c2fn3pbv68us5u6hqoui5c672uh7','127.0.0.1',1550240937,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303234303338333B),
  ('9tg4l0ciqjrq3v6pbci7pcvbq31fetn6','127.0.0.1',1550241145,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303234303936363B),
  ('rf430ksdp5ehrcain3h225qsg3jt3fsh','127.0.0.1',1550242985,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303234323938343B),
  ('c5khvga50cvljbno75aseo8a945lavbi','127.0.0.1',1550255447,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303235353432353B6C6F676765645F696E7C613A31333A7B733A31333A227573756172696F5F6C6F67696E223B733A333A22616C65223B733A31303A227573756172696F5F6964223B733A313A2231223B733A31343A227573756172696F5F6E6F6D627265223B733A393A22416C656A616E64726F223B733A393A2265737461646F5F6964223B733A313A2231223B733A31343A227469706F7573756172696F5F6964223B733A313A2231223B733A31343A227573756172696F5F696D6167656E223B733A31343A22313534393332383037342E706E67223B733A31333A227573756172696F5F656D61696C223B733A31343A22616C656A6F406D61696C2E636F6D223B733A31333A227573756172696F5F636C617665223B733A33323A226236333039393030373565383463656534633133306334636438366630653530223B733A353A227468756D62223B733A32303A22313534393332383037345F7468756D622E706E67223B733A333A22726F6C223B733A31333A2241444D494E4953545241444F52223B733A383A2273656D6573747265223B733A313A2231223B733A373A2267657374696F6E223B733A313A2231223B733A31303A2267657374696F6E5F6964223B733A313A2231223B7D),
  ('61asnm37c1c9ipk87bvnrl6md260olei','127.0.0.1',1550256523,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303235363135393B),
  ('o2469jdt56k4vafurq86h6uhjfms1k3j','127.0.0.1',1550267220,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303236363935393B),
  ('u5dt118s8kvpf8jf1qmo4a1vebr566hu','127.0.0.1',1550267768,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303236373239313B),
  ('2h7u92c60rc51qj200ufuqrf8jrdd6ft','127.0.0.1',1550268482,0x5F5F63695F6C6173745F726567656E65726174657C693A313535303236383339393B);
COMMIT;

#
# Data for the `estudiante` table  (LIMIT 0,500)
#

INSERT INTO `estudiante` (`estudiante_id`, `estado_id`, `genero_id`, `estadocivil_id`, `estudiante_nombre`, `estudiante_apellidos`, `estudiante_fechanac`, `estudiante_edad`, `estudiante_ci`, `estudiante_extci`, `estudiante_codigo`, `estudiante_direccion`, `estudiante_telefono`, `estudiante_celular`, `estudiante_foto`, `estudiante_lugarnac`, `estudiante_nacionalidad`, `estudiante_establecimiento`, `estudiante_distrito`, `estudiante_apoderado`, `apoderado_foto`, `estudiante_apodireccion`, `estudiante_apoparentesco`, `estudiante_apotelefono`, `estudiante_nit`, `estudiante_razon`, `estudiante_email`) VALUES 
  (1,1,1,2,'evo','morales','1959-05-02',NULL,'755554','ORU','evo667','casa blanca','4259594','76959520','1549371388.jpg','orinoca','Boliviano','kinder','8','Alvaro Lineras','1549371389.jpg','casa blanca','pareja','4750855','75993254','Ayma SRL','evo@pueblo.com'),
  (2,1,1,1,'lionel','messi ','1986-06-15',NULL,'7555112','LPZ','lio557','c. 31 de octubre','4249180','76952324','1550062799.png','rosario','argentino','barca','78','papa messi','1550062801.png','barcelona','padre','47451215','11222254','messi SRL','mesi@mesi.com');
COMMIT;

#
# Data for the `gestion` table  (LIMIT 0,500)
#

INSERT INTO `gestion` (`gestion_id`, `estado_id`, `gestion_descripcion`, `gestion_semestre`, `gestion_inicio`, `gestion_fin`, `gestion_estado`) VALUES 
  (1,1,1,1,'2019-02-04','2019-06-30','0');
COMMIT;

#
# Data for the `plan_academico` table  (LIMIT 0,500)
#

INSERT INTO `plan_academico` (`planacad_id`, `estado_id`, `carrera_id`, `planacad_nombre`, `planacad_codigo`, `planacad_titmodalidad`, `planacad_cantgestion`) VALUES 
  (1,1,1,'plan 300','190205151626','licenciatura',NULL),
  (2,1,3,'Plan Academico para Medicina Intermedia','PA-MEDINT','Tecnico Superior en MEdicina Intermedia',3),
  (3,1,2,'Plan Academico #2','190204113045','Tecnico medio en Perforacion de Pozos',NULL),
  (4,1,1,'Plan Academico para Tecnico de Comp','190206113506','TecnicoOperador de Computadoras',NULL),
  (5,1,4,'Celulares','190206114016','Tecnico en Reparacion y mantenimiento de Celulares',NULL),
  (6,1,5,'Plan para Tecnico en Anteojos','190206122029','TEcnico en Creacion y MAntenimiento de Ante ojos',NULL),
  (7,1,6,'Proteinas para los Humanos','190206122526','Tecnico En Proteinas para los Humanos',NULL),
  (8,1,7,'Plan para Manejo de CPUS','190206143114','Conocimiento de Manejo de CPUS',NULL),
  (9,1,8,'Plan Academico para Manejo de Cristales','PA-MC','Tecnico Superior en Manejo de Cristales',NULL),
  (10,1,9,'Plan llenado de Vasos','PLLV','Tecnico Medio en llenado de Vasos',NULL),
  (11,1,9,'llenado de Vasos 2','LLV2','Es para el llenado de Vasos',NULL),
  (12,1,10,'Plan para Envases Decartables','PENVDESC','tecnico en reciclado de Plasticos',NULL),
  (13,1,10,'Plan para Envases Decartables 2','PENVDESC 2','tecnicoen plan para envases descartables',NULL),
  (14,1,9,'Llenado de Vasos 9','LLV9','Titulo llenado de vasos 9',NULL),
  (15,1,3,'Plan para Medicina Intermedia','PMI','Tecnico Medio en Medicina',NULL),
  (16,1,13,'Plan para Carrera Prueba 3','PPCP 3','Tecnico Superios en Prueba 3',NULL),
  (17,1,15,'Viticultura','190214112453','Técnico Superior en Viticultura y Enología con men',NULL);
COMMIT;

#
# Data for the `nivel` table  (LIMIT 0,500)
#

INSERT INTO `nivel` (`nivel_id`, `planacad_id`, `nivel_descripcion`, `nivel_color`) VALUES 
  (1,2,'Nivel 1','#568925'),
  (2,2,'Nivel 2','#452589'),
  (3,2,'Nivel 3','#456523'),
  (4,2,'Nivel 4','#456523'),
  (5,2,'Nivel 5','#342435'),
  (6,8,'Plan Nivel 1','#357c6a'),
  (7,8,'Plan Nivel 2','#123456'),
  (8,8,'Plan NIvel 3','#656734'),
  (9,8,'Plan NIvel 4','#545673'),
  (10,8,'Plan Nivel 5','#545654'),
  (11,8,'Plan Nivel 6','#123098'),
  (12,8,'Plan Nivel 7','#876434'),
  (13,8,'Plan Nivel 8','#434562'),
  (14,8,'PLan Nivel 9','#253658'),
  (15,7,'Plan NIvel Humanos 1','#235678'),
  (16,7,'Plan Nivel Humanos 2','#458521'),
  (17,2,'Nivel 6','#356245'),
  (18,7,'Plan Nimve Humaos 3','#325645'),
  (19,6,'Nateojos 1','#674523'),
  (20,9,'Nivel1C','#345654'),
  (21,9,'Nivel 2C','#345343'),
  (22,9,'Nivel 3C','#458563'),
  (23,2,'Nivel 7','#541452'),
  (24,16,'Nivel P3-1','#457877'),
  (25,16,'Nivel P3-2','#368975'),
  (26,11,'LLV2 N-1','#325685'),
  (27,9,'Nivel 4C','#6b60d2'),
  (28,17,'Primer Semestre','#73baa8'),
  (29,17,'Segundo Semestre','#fb7e33'),
  (30,17,'Tercer Semestre','#c78f67'),
  (31,17,'Cuarto Semestre','#75f935'),
  (32,17,'Quinto Semestre','#75f935'),
  (33,17,'Sexto Semestre','#6442ec');
COMMIT;

#
# Data for the `paralelo` table  (LIMIT 0,500)
#

INSERT INTO `paralelo` (`paralelo_id`, `estado_id`, `paralelo_descripcion`) VALUES 
  (1,1,'paralelo'),
  (2,NULL,'para le'),
  (3,1,'para le');
COMMIT;

#
# Data for the `turno` table  (LIMIT 0,500)
#

INSERT INTO `turno` (`turno_id`, `estado_id`, `turno_nombre`) VALUES 
  (1,1,'DIURNO');
COMMIT;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_login`, `usuario_clave`, `usuario_imagen`, `estado_id`, `tipousuario_id`) VALUES 
  (1,'Alejandro','alejo@mail.com','ale','b630990075e84cee4c130c4cd86f0e50','1549328074.png',1,1);
COMMIT;

#
# Data for the `inscripcion` table  (LIMIT 0,500)
#

INSERT INTO `inscripcion` (`inscripcion_id`, `usuario_id`, `gestion_id`, `estudiante_id`, `paralelo_id`, `nivel_id`, `turno_id`, `inscripcion_fecha`, `inscripcion_hora`, `inscripcion_fechainicio`, `carrera_id`) VALUES 
  (2,1,1,1,1,1,1,'0000-00-00','00:00:00','0000-00-00',1),
  (5,1,1,2,1,1,1,'0000-00-00','10:05:00','0000-00-00',NULL);
COMMIT;

#
# Data for the `matricula` table  (LIMIT 0,500)
#

INSERT INTO `matricula` (`matricula_id`, `inscripcion_id`, `matricula_fechapago`, `matricula_horapago`, `matricula_fechalimite`, `matricula_monto`, `matricula_descuento`, `matricula_total`) VALUES 
  (2,2,'0000-00-00','00:00:00','0000-00-00',0,0,0);
COMMIT;

#
# Data for the `kardex_economico` table  (LIMIT 0,500)
#

INSERT INTO `kardex_economico` (`kardexeco_id`, `inscripcion_id`, `estado_id`, `kardexeco_matricula`, `kardexeco_mensualidad`, `kardexeco_nummens`, `kardexeco_observacion`, `kardexeco_fecha`, `kardexeco_hora`) VALUES 
  (1,2,1,0,123,3,'','0000-00-00','00:00:00');
COMMIT;

#
# Data for the `mensualidad` table  (LIMIT 0,500)
#

INSERT INTO `mensualidad` (`mensualidad_id`, `estado_id`, `kardexeco_id`, `usuario_id`, `mensualidad_numero`, `mensualidad_montoparcial`, `mensualidad_descuento`, `mensualidad_montototal`, `mensualidad_fechalimite`, `mensualidad_mora`, `mensualidad_montocancelado`, `mensualidad_saldo`, `mensualidad_fechapago`, `mensualidad_horapago`, `mensualidad_nombre`, `mensualidad_ci`, `mensualidad_glosa`, `mensualidad_numrec`, `mensualidad_mes`) VALUES 
  (2,4,1,1,1,123,0,123,'2019-03-11',0,12,111,'2019-02-07','19:02:32','carlos','','',0,'ENERO2019'),
  (11,4,1,1,1,111,0,111,'2019-03-11',0,50,61,'2019-02-07','19:02:40','mario','','',0,'ENERO2019'),
  (12,4,1,1,1,61,0,61,'2019-03-11',0,61,0,'2019-02-11','16:53:49','','','',0,'ENERO2019'),
  (13,4,1,1,2,123,0,123,'2019-04-22',0,123,0,'2019-02-08','21:30:12','','','',NULL,'FEBRERO2019'),
  (14,4,1,1,3,123,0,123,'2019-05-23',0,100,23,'2019-02-08','21:33:20','','','',NULL,'MARZO2019'),
  (15,3,1,1,3,23,0,23,'2019-05-23',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MARZO2019');
COMMIT;

#
# Data for the `factura` table  (LIMIT 0,500)
#

INSERT INTO `factura` (`factura_id`, `matricula_id`, `mensualidad_id`, `estado_id`, `venta_id`, `factura_fechaventa`, `factura_fecha`, `factura_hora`, `factura_subtotaltotal`, `factura_ice`, `factura_exento`, `factura_descuento`, `factura_total`, `factura_numero`, `factura_autorizacion`, `factura_llave`, `factura_fechalimite`, `factura_codigocontrol`, `factura_leyenda1`, `factura_leyenda2`, `factura_nit`, `factura_razonsocial`, `factura_nitemisor`, `factura_sucursal`, `factura_sfc`, `factura_actividad`) VALUES 
  (1,2,2,1,1425,'2018-12-20','2018-12-20','09:21:49',20,0,0,0,20,8646,'269401800105650','XV#8M8dN]8JBUSm@Sh7I{PW2{[Q@\Z%@$a3h{K=@%rLm7KnNZ9MT%G2_INgR95R','2019-05-30','32-E7-A7-2F-BF','\"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SER? SANCIONADO DE ACUERDO A LEY.\"','Ley N? 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.',0,'NO DEFINIDO',3723545019,'Casa Matriz','01','VENTA AL POR MENOR DE ALIMENTOS, BEBIDAS Y TABACO EN ALMACENES ESPECIALIZADOS'),
  (2,2,2,1,1428,'2018-12-20','2018-12-20','09:37:18',28.5,0,0,0,28.5,8647,'269401800105650','XV#8M8dN]8JBUSm@Sh7I{PW2{[Q@\Z%@$a3h{K=@%rLm7KnNZ9MT%G2_INgR95R','2019-05-30','82-33-06-8D-C5','\"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SER? SANCIONADO DE ACUERDO A LEY.\"','Ley N? 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.',162288,'RODRIGUEZ',3723545019,'Casa Matriz','01','VENTA AL POR MENOR DE ALIMENTOS, BEBIDAS Y TABACO EN ALMACENES ESPECIALIZADOS'),
  (3,2,2,1,1439,'2018-12-20','2018-12-20','10:26:07',54.3,0,0,0,54.3,8648,'269401800105650','XV#8M8dN]8JBUSm@Sh7I{PW2{[Q@\Z%@$a3h{K=@%rLm7KnNZ9MT%G2_INgR95R','2019-05-30','EA-7E-E6-41-72','\"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SER? SANCIONADO DE ACUERDO A LEY.\"','Ley N? 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.',0,'no definido',3723545019,'Casa Matriz','01','VENTA AL POR MENOR DE ALIMENTOS, BEBIDAS Y TABACO EN ALMACENES ESPECIALIZADOS'),
  (4,2,2,1,1441,'2018-12-20','2018-12-20','10:33:58',150.5,0,0,0,150.5,8649,'269401800105650','XV#8M8dN]8JBUSm@Sh7I{PW2{[Q@\Z%@$a3h{K=@%rLm7KnNZ9MT%G2_INgR95R','2019-05-30','3C-A1-A0-13-03','\"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SER? SANCIONADO DE ACUERDO A LEY.\"','Ley N? 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.',357944010,'FERRUFINO',3723545019,'Casa Matriz','01','VENTA AL POR MENOR DE ALIMENTOS, BEBIDAS Y TABACO EN ALMACENES ESPECIALIZADOS');
COMMIT;

#
# Data for the `docente` table  (LIMIT 0,500)
#

INSERT INTO `docente` (`docente_id`, `estado_id`, `genero_id`, `docente_nombre`, `docente_apellidos`, `docente_fechanac`, `docente_edad`, `docente_ci`, `docente_extci`, `docente_codigo`, `docente_direccion`, `docente_telefono`, `docente_celular`, `docente_titulo`, `docente_especialidad`, `docente_foto`, `docente_email`, `estadocivil_id`) VALUES 
  (2,1,1,'JUAN','PEREZ','1989-02-17',NULL,'78125252','POT','JUA1860','','','','','','','jua@per.com',2);
COMMIT;

#
# Data for the `egresos` table  (LIMIT 0,500)
#

INSERT INTO `egresos` (`egreso_id`, `egreso_numero`, `usuario_id`, `egreso_categoria`, `egreso_nombre`, `egreso_monto`, `egreso_moneda`, `egreso_concepto`, `egreso_fecha`) VALUES 
  (1,2,'1','REFRIGERIOS','mario escobar',400,'Bs','pasajes','2019-02-12 10:47:11'),
  (2,3,'1','REFRIGERIOS','juan',2.5,'Bs','pancito','2019-02-12 11:34:51');
COMMIT;

#
# Data for the `materia` table  (LIMIT 0,500)
#

INSERT INTO `materia` (`materia_id`, `area_id`, `nivel_id`, `mat_materia_id`, `estado_id`, `materia_nombre`, `materia_alias`, `materia_codigo`, `materia_horas`, `materia_hp`, `materia_ht`, `materia_th`, `materia_cyp`, `materia_cys`, `materia_vtt`, `materia_ctp`, `materia_estapa1`, `materia_estapa2`, `materia_estapa3`, `materia_estapa4`, `materia_numareas`, `materia_notainstancia`, `materia_notaaprobado`, `materia_maxima`, `materia_calificacion1`, `materia_ponderado1`, `materia_calificacion2`, `materia_ponderado2`, `materia_calificacion3`, `materia_ponderado3`, `materia_calificacion4`, `materia_ponderado4`, `materia_ponderado5`, `materia_calificacion5`, `materia_calificacion6`, `materia_ponderado6`, `materia_calificacion7`, `materia_ponderado7`) VALUES 
  (1,1,1,NULL,1,'FISICA','fisica','fis123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (2,1,1,NULL,1,'CALCULO','calculo','cal123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (3,8,1,NULL,1,'Introduccion a la MGI','MGI','MED-IMGI',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (4,8,1,NULL,1,'Morfofisiologia I','MORFO','MED-MORFO',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (5,3,1,NULL,1,'INGLES I','ING','MED-ING',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (6,3,1,NULL,1,'Educacion Fisica','EDU','MED-EFIS',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (7,8,1,NULL,1,'Periodo lectivo','LECTIV','MED-PLECT',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (8,8,2,3,1,'Promocion de Salud','PSALUD','MED-PSALUD',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (9,8,2,4,1,'Morfofisiologia II','MORFOII','MED-MORFOII',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (10,3,2,5,1,'Ingles II','ING II','MED-ING II',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (11,8,2,6,1,'Educacion Fisica II','EDU II','MED-EDU II',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (13,8,2,NULL,1,'Informática Medica','INF','MED-INF',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (14,8,3,11,1,'Educacion Fisica III','EDU III','MED-EDU III',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (15,10,3,8,1,'Prevencion en Salud','PREVSAL','MED-PREVSAL',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (16,8,3,9,1,'Morfofisiologia III','MORFO III','MED-MORFO III',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (17,3,3,10,1,'Ingles III','ING II','MED-ING III',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (18,11,3,15,1,'Psicologia Medica I','PSICO I','MED-PSICO I',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (20,10,4,NULL,1,'Medicina Interna','MEDINT','MED-MEDINT',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (21,12,4,16,1,'Farmacologia I','FARMA I','MED-FARMA I',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (22,3,4,17,1,'Ingles IV','ING IV','MED-ING IV',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (23,10,4,14,1,'Educacion Fisica IV','EDU IV','MED-EDU IV',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (24,11,4,18,1,'Psiquiatria','PSIQUI','MED-PSIQUI',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (25,8,5,23,1,'Educacion Fisica V','EDU V','MED-EDU V',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (26,3,5,22,1,'Ingles V','ING V','MED-ING V',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (27,10,5,20,1,'Medicina de Desastre','MEDES','MED-DESAS',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (28,10,5,20,1,'Ortopedia','ORTOP','MED-ORTOP',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (29,10,5,20,1,'Urologia','UROLOG','MED-UROLOG',NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,'',0,'',0,'',0,'',0,'',0,'',0),
  (30,1,15,NULL,1,'Lectura de Proteinas','Lectura de Proteinas','LP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (31,8,16,31,1,'Lectura de Proteinas II','Proteinas II','LP II',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (32,8,15,NULL,1,'Humanos Limpios I','Computacion I','BIO100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (33,8,16,32,1,'Humanos limpios II','Computacion II','Compu II',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (34,8,18,NULL,1,'Simiologia 1','Conocimiento Humano 1','CH 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (35,8,18,33,1,'Humanos Limpios 3','Limpieza 3','HL 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (36,10,15,NULL,1,'Uso de Verduras 1','Verduras 1','LP 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (37,10,16,36,1,'Uso de Verduras 2','Verduras 2','UV 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (38,10,18,37,1,'Uso de Verduras 3','Verduras 3','UV 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (39,5,15,NULL,1,'Cereales Buenos 1','Cereales','C 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (40,1,16,39,1,'Cereales Buenos 2','cereales 2','CB 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (41,12,20,NULL,1,'Cristales 1','Cristales 1','C1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (42,9,17,9,1,'Satelites1','Algebra 500','AL-500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (43,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (45,10,24,NULL,1,'Materia Prueba3 1','Materia Prueba 31','MP31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (46,1,26,NULL,1,'LLenado Vasos2 1','LLenado Vasos 2-1','LLV2-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (47,9,28,NULL,1,'Matemática Aplicada a enología','Matemática Aplicada a enología','MAT - 100',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (48,12,28,NULL,1,'Quimica Aplicada a Enología','Quimica Aplicada a Enología','QMC - 100',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (49,8,28,NULL,1,'Biologia de la Vida','Biologia de la Vida','BIO - 100',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (50,7,28,NULL,1,'Botanica Aplicada','Botanica Aplicada','BOA - 100',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (51,13,28,NULL,1,'Sistemas computacionales vitivinicolas','Sistemas computacionales vitivinicolas','COM - 100',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (52,3,28,NULL,1,'Ingles Técnico','Ingles Técnico','ING - 100',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (53,12,24,NULL,1,'prueba nombre','prueba nombre','PA',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (54,9,29,47,1,'Fisica aplicada a enologia','Fisica aplicada a enologia','Fis- 200',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (55,12,29,48,1,'Enoquimica','Enoquimica','ENO - 200',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (56,13,29,50,1,'Edafologia Viticola','Edafologia Viticola','EDA - 200',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (57,2,29,50,1,'Microbiologia Vitivinicola','Microbiologia Vitivinicola','MIV - 200',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (58,9,29,49,1,'Fisiologia Viticola','Fisiologia Viticola','FIV - 200',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (59,8,29,49,1,'Sistemas de Conduccion y Podas','Sistemas de Conduccion y Podas','BIO - 200',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (60,10,30,55,1,'Enologia I','Enologia I','ENO - 300',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (61,9,30,57,1,'Viticultura I','Viticultura I','VIT - 300',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (62,10,30,56,1,'Maquinaria Viticula','Maquinaria Viticula','MAV - 300',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (63,9,30,55,1,'Maquinaria Enologica','Maquinaria Enologica','MAE - 300',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (64,10,30,59,1,'Climatologia de la Vida','Climatologia de la Vida','CLV - 300',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (65,10,30,54,1,'Formacion y Organizacion Vitivinicola','Formacion y Organizacion Vitivinicola','FOV - 300',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (66,3,31,60,1,'Proceso de Elaboracion de Vino y Destilacion de Singani','Proceso de Elaboracion de Vino y Destilacion de Singani','PVS - 400',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (67,10,31,62,1,'Manejo de la cadena productiva U.V. y S. (uva, vino y singani)','Manejo de la cadena productiva U.V. y S. (uva, vino y singani)','MCP - 400',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (68,10,31,61,1,'Economia Vitivinicola','Economia Vitivinicola','EVT - 400',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (69,10,31,65,1,'Extension Vitivinicola','Extension Vitivinicola','EXV - 400',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (70,8,31,64,1,'Sistema de Riego','Sistema de Riego','SIR - 400',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (71,10,31,61,1,'Laboratorio de Plagas y Enfermedades  Viticolas','Laboratorio de Plagas y Enfermedades  Viticolas','LPE - 400',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (72,10,31,64,1,'Calidad, seguridad y Medio Ambiente','Calidad, seguridad y Medio Ambiente','CSM - 400',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (73,8,32,66,1,'Manejo de Insumos Enologicos','Manejo de Insumos Enologicos','MIE - 500',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (74,11,32,70,1,'Diseños Experimentales','Diseños Experimentales','DIE - 500',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (75,11,32,67,1,'Tecnologia Agroindustrial','Tecnologia Agroindustrial','TEA - 500',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (76,11,32,67,1,'Emprendimientos Productivos','Emprendimientos Productivos','EMP - 500',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (77,11,32,71,1,'Sanidad Viticola','Sanidad Viticola','SAV - 500',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (78,10,32,NULL,1,'Taller de Modalidad de Graduacion I','Taller de Modalidad de Graduacion I','TAG - 500',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (79,11,33,77,1,'Viticultura II','Viticultura II','VIT - 600',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (80,11,33,76,1,'Manejo de Viñedos','Manejo de Viñedos','MVI - 600',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (81,12,33,75,1,'Cosecha y poscosecha','Cosecha y poscosecha','COP - 600',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (82,10,33,77,1,'Manejo Integrado de Plagas y Enfermedades','Manejo Integrado de Plagas y Enfermedades','MIP - 600',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (83,10,33,76,1,'Planificacion y Proyectos','Planificacion y Proyectos','PPV - 600',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (84,12,33,74,1,'Manejo de Uvas de Mesa','Manejo de Uvas de Mesa','NUM - 600',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (85,11,33,78,1,'Taller de Modalidad II','Taller de Modalidad II','TAG - 600',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
COMMIT;

#
# Data for the `periodo` table  (LIMIT 0,500)
#

INSERT INTO `periodo` (`periodo_id`, `periodo_nombre`, `periodo_horainicio`, `periodo_horafin`) VALUES 
  (1,'1','06:45:00','08:15:00'),
  (2,'123`','08:15:00','09:45:00');
COMMIT;

#
# Data for the `horario` table  (LIMIT 0,500)
#

INSERT INTO `horario` (`horario_id`, `estado_id`, `periodo_id`, `horario_desde`, `horario_hasta`) VALUES 
  (1,1,1,'06:45:00','09:45:00');
COMMIT;

#
# Data for the `grupo` table  (LIMIT 0,500)
#

INSERT INTO `grupo` (`grupo_id`, `horario_id`, `docente_id`, `gestion_id`, `usuario_id`, `aula_id`, `materia_id`, `grupo_nombre`, `grupo_descripcion`, `grupo_horanicio`, `grupo_horafin`) VALUES 
  (1,1,2,1,1,1,1,'grupo1','primero','06:45:00','09:45:00');
COMMIT;

#
# Data for the `grupo_inscripcion` table  (LIMIT 0,500)
#

INSERT INTO `grupo_inscripcion` (`grupoins_id`, `grupoins_fecha`, `grupoins_hora`, `grupo_id`, `inscripcion_id`) VALUES 
  (1,NULL,NULL,1,2);
COMMIT;

#
# Data for the `ingresos` table  (LIMIT 0,500)
#

INSERT INTO `ingresos` (`ingreso_id`, `ingreso_numero`, `usuario_id`, `ingreso_categoria`, `ingreso_nombre`, `ingreso_monto`, `ingreso_moneda`, `ingreso_concepto`, `ingreso_fecha`) VALUES 
  (1,2,1,'PAGO POR SERVICIOS','mario escobar',51,'Bs','amistad','2019-02-12 11:27:12'),
  (2,3,1,'PAGO POR SERVICIOS','ariel',10,'Bs','no se quien es','2019-02-12 11:30:54');
COMMIT;

#
# Data for the `parametros` table  (LIMIT 0,500)
#

INSERT INTO `parametros` (`parametro_id`, `parametro_numrecegr`, `parametro_numrecing`, `parametro_copiasfact`, `parametro_tipoimpresora`, `parametro_numcuotas`, `parametro_montomax`, `parametro_diasgracia`, `parametro_diapago`, `parametro_periododias`, `parametro_interes`, `parametro_tituldoc`) VALUES 
  (1,3,3,3,'NORMAL',1,1000.000,14,2,7,0,'');
COMMIT;

#
# Data for the `tipo_aula` table  (LIMIT 0,500)
#

INSERT INTO `tipo_aula` (`tipoaula_id`, `tipoaula_descripcion`) VALUES 
  (1,'Laboratorio');
COMMIT;

#
# Data for the `tipo_usuario` table  (LIMIT 0,500)
#

INSERT INTO `tipo_usuario` (`tipousuario_id`, `estado_id`, `tipousuario_descripcion`) VALUES 
  (1,1,'ADMINISTRADOR'),
  (2,1,'ADMINISTRATIVO'),
  (3,1,'DOCENTE'),
  (4,1,'ESTUDIANTE'),
  (5,1,'SUPER');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;