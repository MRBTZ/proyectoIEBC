<?php

	//define("BASE_URL", "http://localhost/Proyectos/IEBC");
	const BASE_URL = "http://localhost/Proyectos/IEBC";
	//const BASE_URL = "https://192.168.1.49/Proyectos/IEBC";
	//const BASE_URL = "https://iebcchotaweb.000webhostapp.com";
	//const BASE_URL = "http://iebcchotaweb.000webhostapp.com";

	//Zona horaria
	date_default_timezone_set('America/Guatemala');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	//const DB_NAME = "id17831441_base_de_datos_iebc";
	const DB_NAME = "base_de_datos_iebc";
	//const DB_USER = "id17831441_iebcmich";
	const DB_USER = "root";
	//const DB_PASSWORD = "Hc1#ZY\GE*/=lqmG";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "Q";

	//Datos envio de correo
	const NOMBRE_REMITENTE = "Sistema IEBC";
	const EMAIL_REMITENTE = "no-reply@iebc.com";
	const NOMBRE_EMPESA = "SISTEMA IEBC";
	const WEB_EMPRESA = "https://www.facebook.com/ibchotcaj1";







 ?>
