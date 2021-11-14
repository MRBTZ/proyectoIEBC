

CREATE TABLE `asistencia` (
  `idasistencia` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigoid` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `entrada` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `salida` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fecha` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idasistencia`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO asistencia VALUES
("25","gstst65474","14:35:27 PM","14:35:51 PM","2021-11-13","1"),
("26","sy8732674","14:35:41 PM","15:26:38 PM","2021-11-13","1"),
("27","gstst65474","14:40:07 PM","","2021-11-12","0"),
("28","gstst65474","15:25:59 PM","","2021-11-13","0");




CREATE TABLE `curso` (
  `idcurso` bigint(20) NOT NULL AUTO_INCREMENT,
  `cursos` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO curso VALUES
("1","Matemáticas","1"),
("2","Comunicación y Lenguaje","1"),
("3","Ciencias Naturales ","1"),
("4","Ciencias Sociales ","1"),
("5","Ingles ","1"),
("6","Kiche","1"),
("7","Musica ","1"),
("8","Artes Plasticas ","1"),
("9","Emprendimiento ","1"),
("10","Hogar","1"),
("11","Educación Fisica","1"),
("12","Computación ","1");




CREATE TABLE `estudiante` (
  `idestudiante` bigint(20) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombresE` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidosE` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fechaN` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ciclo` bigint(20) NOT NULL,
  `papeleria` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcionP` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `gradoid` bigint(20) NOT NULL,
  PRIMARY KEY (`idestudiante`),
  KEY `gradoid` (`gradoid`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`gradoid`) REFERENCES `grado` (`idgrado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO estudiante VALUES
("30","4343674367436","Marvin","Batz","44354354","Toto","Maria","Gutierrez","2019-10-07","2022","2","Carta De Recomendaicon","3"),
("31","4565467546756","Gustavo Alberto","Lopez Tohom","86458743","Ciudad","Alberto","Lopez","1999-10-11","2021","2","El Tavo Es Un Marica Ajajajajaj","1");




CREATE TABLE `grado` (
  `idgrado` bigint(20) NOT NULL AUTO_INCREMENT,
  `grado` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idgrado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO grado VALUES
("1","Primero","1"),
("2","Segundo","1"),
("3","Tercero","1"),
("4","Opcion ","1");




CREATE TABLE `maestro` (
  `idmaestro` bigint(20) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(13) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cursoid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmaestro`),
  KEY `cursoid` (`cursoid`),
  CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO maestro VALUES
("10","3124564544886","Roberto","Chaclan","31255668","Chotacaj","gstst65474","1","1"),
("11","6458764587645","Eugenia","Cutz","64564564","Paqui","sy8732674","5","1");




CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO modulo VALUES
("1","Dashboard","Dashboard","1"),
("2","Usuarios","Usuarios del sistema","1"),
("3","Alumnos","Estudiantes del establecimiento","1"),
("4","Maestros","Personal docente","1"),
("5","SMS","mensajes de textos para maestros","1");




CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idpermiso`),
  KEY `rolid` (`rolid`),
  KEY `moduloid` (`moduloid`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO permisos VALUES
("138","2","1","1","1","1","1"),
("139","2","2","1","1","1","1"),
("140","2","3","1","1","1","1"),
("141","2","4","1","1","1","1"),
("142","2","5","1","1","1","1"),
("153","5","1","1","1","1","1"),
("154","5","2","1","1","1","1"),
("155","5","3","1","1","1","1"),
("156","5","4","1","1","1","1"),
("157","5","5","1","1","1","1"),
("163","3","1","1","1","1","1"),
("164","3","2","1","1","1","1"),
("165","3","3","1","0","1","1"),
("166","3","4","0","0","1","1"),
("167","3","5","0","0","1","1"),
("183","1","1","1","1","1","1"),
("184","1","2","1","1","1","1"),
("185","1","3","1","1","1","1"),
("186","1","4","1","1","1","1"),
("187","1","5","1","1","1","1"),
("188","6","1","0","0","0","0"),
("189","6","2","1","1","1","1"),
("190","6","3","0","1","1","1"),
("191","6","4","0","0","0","0"),
("192","6","5","0","0","0","0"),
("198","4","1","1","1","1","1"),
("199","4","2","0","1","1","1"),
("200","4","3","1","0","1","1"),
("201","4","4","0","1","1","1"),
("202","4","5","0","1","1","1");




CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idpersona`),
  KEY `rolid` (`rolid`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO persona VALUES
("1","admin","Admin","Admin","123","admin@admin.com","8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918","CF","Misael","Guatemala","","1","2021-10-10 02:28:53","1"),
("2","1234567896321","Misael Rodolfo","Batz Tzunun","41706394","mrbtzjp@gmail.com","8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92","","","","","3","2021-10-10 02:31:00","1"),
("11","1234567895544","Jose","Gutierrez","14784564","jose@gmail.com","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","","","","","4","2021-11-09 11:47:22","1"),
("12","8743874387438","Omar","Arreaga","54675465","omar@gmail.com","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","","","","","4","2021-11-13 15:30:58","1");




CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


INSERT INTO rol VALUES
("1","Acceso Total","Acceso a todo el sistema","1"),
("2","Director","Encargado del sistema","1"),
("3","Secretaria","Encargada de los registros","1"),
("4","Maestros","Personal docente","1"),
("5","Invitados","Colaborador","1"),
("6","Ing","zg","0");


