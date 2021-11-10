<?php

class AsistenciaModel extends Mysql
	{
		
		
		public function __construct()
		{
			parent::__construct();
		}	

		public function selectAsistencia()
		{
			/*$whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and p.idpersona != 1 ";
			}*/
			$sql = "SELECT m.nombres, m.apellidos,a.codigoid,a.entrada,a.salida,a.fecha,a.status  
			FROM asistencia a 
			INNER JOIN maestro m
			ON a.codigoid = m.codigo
			"/*.$whereAdmin*/;
			$request = $this->select_all($sql);
			return $request;
		}

	}


?>