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

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_color` varchar(15) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`estado_id`),
  UNIQUE KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `estado_civil` table : 
#

CREATE TABLE `estado_civil` (
  `estadocivil_id` int(11) NOT NULL AUTO_INCREMENT,
  `estadocivil_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estadocivil_id`),
  UNIQUE KEY `estadocivil_id` (`estadocivil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `genero` table : 
#

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL AUTO_INCREMENT,
  `genero_nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`genero_id`),
  UNIQUE KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `institucion` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `administrativo` table : 
#

CREATE TABLE `administrativo` (
  `administrativo_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `estadocivil_id` int(11) DEFAULT NULL,
  `institucion_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `administrativo_nombre` varchar(50) DEFAULT NULL,
  `administrativo_apellidos` varchar(50) DEFAULT NULL,
  `administrativo_fechanac` date DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `area_carrera` table : 
#

CREATE TABLE `area_carrera` (
  `areacarrera_id` int(11) NOT NULL AUTO_INCREMENT,
  `areacarrera_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`areacarrera_id`),
  UNIQUE KEY `areacarrera_id` (`areacarrera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `area_materia` table : 
#

CREATE TABLE `area_materia` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_nombre` varchar(100) DEFAULT NULL,
  `area_fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`area_id`),
  UNIQUE KEY `area_id` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `aula` table : 
#

CREATE TABLE `aula` (
  `aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `aula_nombre` varchar(150) DEFAULT NULL,
  `aula_descripcion` varchar(250) DEFAULT NULL,
  `aula_capacidad` int(11) DEFAULT NULL,
  `aula_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`aula_id`),
  UNIQUE KEY `aula_id` (`aula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `estudiante` table : 
#

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
  PRIMARY KEY (`estudiante_id`),
  UNIQUE KEY `estudiante_id` (`estudiante_id`),
  KEY `fk_estadocivil_estudiante` (`estadocivil_id`),
  KEY `fk_estado_estudiante` (`estado_id`),
  KEY `fk_genero_estudiante` (`genero_id`),
  CONSTRAINT `fk_estadocivil_estudiante` FOREIGN KEY (`estadocivil_id`) REFERENCES `estado_civil` (`estadocivil_id`),
  CONSTRAINT `fk_estado_estudiante` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_genero_estudiante` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `gestion` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `carrera` table : 
#

CREATE TABLE `carrera` (
  `carrera_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion_id` int(11) DEFAULT NULL,
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
  `carrera_nummeses` int(11) DEFAULT NULL,
  PRIMARY KEY (`carrera_id`),
  UNIQUE KEY `carrera_id` (`carrera_id`),
  KEY `fk_area_carrera` (`areacarrera_id`),
  KEY `fk_carrera_inscripcion` (`inscripcion_id`),
  CONSTRAINT `fk_area_carrera` FOREIGN KEY (`areacarrera_id`) REFERENCES `area_carrera` (`areacarrera_id`),
  CONSTRAINT `fk_carrera_inscripcion` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`inscripcion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `plan_academico` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `nivel` table : 
#

CREATE TABLE `nivel` (
  `nivel_id` int(11) NOT NULL AUTO_INCREMENT,
  `planacad_id` int(11) DEFAULT NULL,
  `nivel_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`nivel_id`),
  UNIQUE KEY `nivel_id` (`nivel_id`),
  KEY `nivel_fk` (`planacad_id`),
  CONSTRAINT `nivel_fk` FOREIGN KEY (`planacad_id`) REFERENCES `plan_academico` (`planacad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `paralelo` table : 
#

CREATE TABLE `paralelo` (
  `paralelo_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `paralelo_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`paralelo_id`),
  UNIQUE KEY `paralelo_id` (`paralelo_id`),
  KEY `fk_estado_paralelo` (`estado_id`),
  CONSTRAINT `fk_estado_paralelo` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `turno` table : 
#

CREATE TABLE `turno` (
  `turno_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `turno_nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`turno_id`),
  UNIQUE KEY `turno_id` (`turno_id`),
  KEY `fk_estado_turno` (`estado_id`),
  CONSTRAINT `fk_estado_turno` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  `usuario_email` varchar(50) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  `usuario_clave` date DEFAULT NULL,
  `usuario_imagen` longblob,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `inscripcion` table : 
#

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
  PRIMARY KEY (`inscripcion_id`),
  UNIQUE KEY `inscripcion_id` (`inscripcion_id`),
  KEY `fk_estudiante_inscripcion` (`estudiante_id`),
  KEY `fk_gestion_inscripcion` (`gestion_id`),
  KEY `fk_nivel_inscripcion` (`nivel_id`),
  KEY `fk_paralelo_inscripcion` (`paralelo_id`),
  KEY `fk_turno_inscripcion` (`turno_id`),
  KEY `fk_usuario_incripcion` (`usuario_id`),
  CONSTRAINT `fk_estudiante_inscripcion` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`estudiante_id`),
  CONSTRAINT `fk_gestion_inscripcion` FOREIGN KEY (`gestion_id`) REFERENCES `gestion` (`gestion_id`),
  CONSTRAINT `fk_nivel_inscripcion` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`nivel_id`),
  CONSTRAINT `fk_paralelo_inscripcion` FOREIGN KEY (`paralelo_id`) REFERENCES `paralelo` (`paralelo_id`),
  CONSTRAINT `fk_turno_inscripcion` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`),
  CONSTRAINT `fk_usuario_incripcion` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `matricula` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `kardex_economico` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `mensualidad` table : 
#

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
  `mensualidad_fechapago` date DEFAULT NULL,
  `mensualidad_horapago` time DEFAULT NULL,
  `mensualidad_nombre` varchar(150) DEFAULT NULL,
  `mensualidad_ci` varchar(50) DEFAULT NULL,
  `mensualidad_glosa` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`mensualidad_id`),
  UNIQUE KEY `mensualidad_id` (`mensualidad_id`),
  KEY `fk_estado_mensualidad` (`estado_id`),
  KEY `fk_kardexacad_mensualidad` (`kardexeco_id`),
  KEY `fk_usuario_mensualidad` (`usuario_id`),
  CONSTRAINT `fk_estado_mensualidad` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_kardexacad_mensualidad` FOREIGN KEY (`kardexeco_id`) REFERENCES `kardex_economico` (`kardexeco_id`),
  CONSTRAINT `fk_usuario_mensualidad` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `factura` table : 
#

CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_id` int(11) DEFAULT NULL,
  `mensualidad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`factura_id`),
  UNIQUE KEY `factura_id` (`factura_id`),
  KEY `fk_factura_matricula` (`matricula_id`),
  KEY `fk_relationship_34` (`mensualidad_id`),
  CONSTRAINT `fk_factura_matricula` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`matricula_id`),
  CONSTRAINT `fk_relationship_34` FOREIGN KEY (`mensualidad_id`) REFERENCES `mensualidad` (`mensualidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `detalle_factura` table : 
#

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
  PRIMARY KEY (`docente_id`),
  UNIQUE KEY `docente_id` (`docente_id`),
  KEY `fk_estado_docente` (`estado_id`),
  KEY `fk_genero_docente` (`genero_id`),
  CONSTRAINT `fk_estado_docente` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_genero_docente` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `periodo` table : 
#

CREATE TABLE `periodo` (
  `periodo_id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_nombre` varchar(100) DEFAULT NULL,
  `periodo_horainicio` time DEFAULT NULL,
  `periodo_horafin` time DEFAULT NULL,
  PRIMARY KEY (`periodo_id`),
  UNIQUE KEY `periodo_id` (`periodo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `horario` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `materia` table : 
#

CREATE TABLE `materia` (
  `materia_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) DEFAULT NULL,
  `nivel_id` int(11) DEFAULT NULL,
  `mat_materia_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `materia_nombre` varchar(100) DEFAULT NULL,
  `materia_alias` varchar(100) DEFAULT NULL,
  `materia_codigo` varchar(50) DEFAULT NULL,
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
  KEY `fk_requisito_materia` (`mat_materia_id`),
  CONSTRAINT `fk_area_materia` FOREIGN KEY (`area_id`) REFERENCES `area_materia` (`area_id`),
  CONSTRAINT `fk_estado_materia` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_nivel_materia` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`nivel_id`),
  CONSTRAINT `fk_requisito_materia` FOREIGN KEY (`mat_materia_id`) REFERENCES `materia` (`materia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `grupo` table : 
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `kardex_academico` table : 
#

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
# Structure for the `rol` table : 
#

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

CREATE TABLE `tipo_aula` (
  `tipoaula_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoaula_descripcion` varchar(55) NOT NULL,
  PRIMARY KEY (`tipoaula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;