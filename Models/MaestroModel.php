<?php 
	
	class MaestroModel extends Mysql
	{
		
		private $intIdMaestro;
		private $strIdentificacion;
		private $strNombre; 
		private $strApellido; 
		private $intTelefono; 
		private $strDireccion;
		private $strCodigo;
		private $intCursoId;
		private $intStatus; 

		
		public function __construct()
		{
			parent::__construct();
		}	
		
		/*-------------------------------------------------------------------------------------------------*/
		// extracion de cursos para las listas
		/*-------------------------------------------------------------------------------------------------*/
        public function selectCursos()
		{
			
            $whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and idrol != 1 ";
			}
            
			//EXTRAE ROLE
			$sql = "SELECT * FROM curso WHERE status != 0".$whereAdmin;
			$request = $this->select_all($sql);
			return $request;
			
		}
		
		/*-------------------------------------------------------------------------------------------------*/
		// almacenar y actualizar los datos en la base de datos
		/*-------------------------------------------------------------------------------------------------*/
		public function insertMaestro(string $identificacion, string $nombre, string $apellido, int $telefono,  string $direccion, string $codigo, int $icursoid, int $status)
		{
			
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strDireccion = $direccion;
			$this->strCiclo = $codigo;
			$this->intCursoId = $icursoid;
			$this->intStatus = $status;
			
			$return = 0;
			
			$sql = "SELECT * FROM maestro WHERE 
			identificacion = '{$this->strIdentificacion}' ";
			$request = $this->select_all($sql);
			
			
			if(empty($request))
			{
				$query_insert  = "INSERT INTO maestro(identificacion,nombres,apellidos,telefono,direccion,codigo,cursoid,status) 
				VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strIdentificacion,
									$this->strNombre,
									$this->strApellido,
									$this->intTelefono,
									$this->strDireccion,
									$this->strCiclo,
									$this->intCursoId,
									$this->intStatus);
				
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
		public function selectMaestro()
		{
			$whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and p.idpersona != 1 "; //verificar el funcionamientode esta funcion
			}
			$sql = "SELECT m.idmaestro,m.identificacion,m.nombres,m.apellidos,m.telefono,m.direccion, m.codigo, c.cursos, m.status 
			FROM maestro m 
			INNER JOIN curso c
			ON m.cursoid = c.idcurso
			WHERE m.status != 0".$whereAdmin;
			$request = $this->select_all($sql);
			return $request;
		}
		
		/*-------------------------------------------------------------------------------------------------*/
		// consulta a la bd para el modal de visualizacion
		/*-------------------------------------------------------------------------------------------------*/
		public function selectMaestros(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idmaestro, identificacion, nombres, apellidos, telefono, direccion, codigo, cursoid, status
			FROM maestro
			WHERE idmaestro = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
		
		/*-------------------------------------------------------------------------------------------------*/
		// actualizacion de datos desde el modal
		/*-------------------------------------------------------------------------------------------------*/ 
		public function updateMaestro(int $idUsuario, string $identificacion, string $nombre, string $apellido, int $telefono,  string $direccion, string $codigo, int $icursoid, int $status)
		{
			
			$this->intIdMaestro = $idUsuario;
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strDireccion = $direccion;
			$this->strCiclo = $codigo;
			$this->intCursoId = $icursoid;
			$this->intStatus = $status;
			
			
			$sql = "SELECT * FROM maestro WHERE identificacion = '$this->strIdentificacion'  AND idmaestro != $this->intIdMaestro ";
			$request = $this->select_all($sql);
			
			if(empty($request))
			{
				$sql = "UPDATE maestro SET identificacion=?, nombres=?, apellidos=?, telefono=?, direccion=?, codigo=?, cursoid=?, status=? 
				WHERE idmaestro = $this->intIdMaestro ";
				$arrData = array($this->strIdentificacion,
									$this->strNombre,
									$this->strApellido,
									$this->intTelefono,
									$this->strDireccion,
									$this->strCiclo,
									$this->intCursoId,
									$this->intStatus);
				$request = $this->update($sql,$arrData);
				
				}else{
				$request = "exist";
			}
			return $request;
			
		}
		
		
		
		/*-------------------------------------------------------------------------------------------------*/
		// Eliminar maestro
		/*-------------------------------------------------------------------------------------------------*/ 
		public function deleteMaestro(int $intIdpersona)
		{
			$this->intIdMaestro = $intIdpersona;
			$sql = "UPDATE maestro SET status = ? WHERE idmaestro = $this->intIdMaestro ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		
		
		
		
	}//fin de la clase
?>