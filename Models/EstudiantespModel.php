<?php 
	
	class EstudiantespModel extends Mysql
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
		
		
		/*-------------------------------------------------------------------------------------------------*/
		// consulta a la bd a la data tables
		/*-------------------------------------------------------------------------------------------------*/
		public function selectEstudiantes()
		{
			$whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and p.idpersona != 1 ";
			}
			$sql = "SELECT e.idestudiante,e.identificacion,e.nombres,e.apellidos,e.telefono,e.direccion, e.nombresE, e.apellidosE, e.fechaN, e.papeleria, e.descripcionP,g.grado 
			FROM estudiante e 
			INNER JOIN grado g
			ON e.gradoid = g.idgrado
			WHERE e.gradoid = 1".$whereAdmin;
			$request = $this->select_all($sql);
			return $request;
		}
		
		/*-------------------------------------------------------------------------------------------------*/
		// consulta a la bd para el modal de visualizacion
		/*-------------------------------------------------------------------------------------------------*/
		public function selectEstudiante(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idestudiante, identificacion, nombres, apellidos, telefono, direccion, nombresE, apellidosE, fechaN, ciclo, papeleria, descripcionP,gradoid
			FROM estudiante
			WHERE idestudiante = $this->intIdUsuario and gradoid = 1 ";
			$request = $this->select($sql);
			return $request;
		}
		
		/*-------------------------------------------------------------------------------------------------*/
		// actualizacion de datos desde el modal
		/*-------------------------------------------------------------------------------------------------*/ 
		public function updateEstudiantes(int $idUsuario, string $identificacion, string $nombre, string $apellido, int $telefono,  string $direccion, string $nombresES, string $apellidoES, string $fecha, int $ciclo, int $papeleria, string $desc, int $gradoid)
		{
			
			$this->intIdEstudiante = $idUsuario;
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
			
			
			$sql = "SELECT * FROM estudiante WHERE identificacion = '$this->strIdentificacion'  AND idestudiante != $this->intIdEstudiante ";
			$request = $this->select_all($sql);
			
			if(empty($request))
			{
				$sql = "UPDATE estudiante SET identificacion=?, nombres=?, apellidos=?, telefono=?, direccion=?, nombresE=?, apellidosE=?, fechaN=?, ciclo=?, papeleria=?, descripcionP=?, gradoid=? 
				WHERE idestudiante = $this->intIdEstudiante ";
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
				$request = $this->update($sql,$arrData);
				
				}else{
				$request = "exist";
			}
			return $request;
			
		}
		
		
		
		/*-------------------------------------------------------------------------------------------------*/
		// Eliminar estudiante
		/*-------------------------------------------------------------------------------------------------*/ 
		public function deleteEstudiante(int $intIdpersona)
		{
			$this->intIdEstudiante = $intIdpersona;
			$sql = "UPDATE estudiante SET gradoid = ? WHERE idestudiante = $this->intIdEstudiante ";
			$arrData = array(4);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		
		
		
		
	}//fin de la clase
?>