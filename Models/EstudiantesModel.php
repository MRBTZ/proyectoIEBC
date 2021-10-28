<?php 

	class EstudiantesModel extends Mysql
	{

		private $intIdEstudiante;
		private $strIdentificacion;
		private $strNombre; 
		private $strApellido; 
		private $intTelefono; 
		private $strDireccion;
		private $strNombreE;
		private $strApellidoE;
		private $strFecha;
		private $intCiclo;
		private $intGradoId;
		private $intPapeleria; 
		private $strDescripcion;

		public function __construct()
		{
			parent::__construct();
		}	

        public function selectGrado()
		{
			
            $whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and idrol != 1 ";
			}
            
			//EXTRAE ROLES
			$sql = "SELECT * FROM grado WHERE status != 0".$whereAdmin;
			$request = $this->select_all($sql);
			return $request;

		}


		public function insertEstudiantes(string $identificacion, string $nombre, string $apellido, int $telefono,  string $direccion, string $nombresES, string $apellidoES, string $fecha, int $ciclo, int $papeleria, string $desc, int $gradoid)
		{

			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strDireccion = $direccion;
			$this->strNombresE = $nombresES;
			$this->strApellidosE = $apellidoES;
			$this->strFecha = $fecha;
			$this->intCiclo = $ciclo;
			$this->intPapeleria = $papeleria;
			$this->strDescripcion = $desc;
			$this->intGradoId = $gradoid;

			$return = 0;

			$sql = "SELECT * FROM estudiante WHERE 
							identificacion = '{$this->strIdentificacion}' ";
			$request = $this->select_all($sql);


			if(empty($request))
			{
				$query_insert  = "INSERT INTO estudiante(identificacion,nombres,apellidos,telefono,direccion,nombresE,apellidosE,fechaN,ciclo,papeleria,descripcionP,gradoid) 
								  VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strIdentificacion,
									$this->strNombre,
									$this->strApellido,
									$this->intTelefono,
									$this->strDireccion,
									$this->strNombresE,
									$this->strApellidosE,
									$this->strFecha,
									$this->intCiclo,
									$this->intPapeleria,
									$this->strDescripcion,
									$this->intGradoId);

	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}



	}//fin de la clase
 ?>