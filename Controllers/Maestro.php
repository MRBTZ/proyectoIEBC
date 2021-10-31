<?php 
	
	class Maestro extends Controllers

{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(4);//permisos en base al modulo :P
		}
		
		public function Maestro()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Maestro";
			$data['page_title'] = "MAESTRO  <small>  Sistema IEBC  </small> ";
			$data['page_name'] = "maestro";
			$data['page_functions_js'] = "functions_maestro.js";
			$this->views->getView($this,"maestro",$data);
		}


		/*-------------------------------------------------------------------------------------------------*/
		// extracion de cursos para las listas
		/*-------------------------------------------------------------------------------------------------*/
		public function getCurso()
		{
			$arrData = $this->model->selectCursos();
			
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}


		/*-------------------------------------------------------------------------------------------------*/
		// Colocar el boton de activo e inactivo enla data tables
		/*-------------------------------------------------------------------------------------------------*/
		public function getSelectCursos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectCursos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
						$htmlOptions .= '<option value="'.$arrData[$i]['idcurso'].'">'.$arrData[$i]['cursos'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
		
		
		public function setMaestro()
		{
			if($_POST){	
				
				
				if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtDirección']) ||  empty($_POST['txtCodigo']) || empty($_POST['listCursoid']) || empty($_POST['listStatus']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
					}else{ 
					
					$idUsuario = intval($_POST['idUsuario']);/*:p*/
					$strIdentificacion = strClean($_POST['txtIdentificacion']);
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intTelefono = intval(strClean($_POST['txtTelefono']));
					$strDireccion = ucwords(strClean($_POST['txtDirección']));
					$strCodigo = strClean($_POST['txtCodigo']);
					$intCursoId = intval(strClean($_POST['listCursoid']));
					$intStatus = intval(strClean($_POST['listStatus']));
					
					//$request_user = "";
					
					if($idUsuario == 0)
					{
						$option = 1;
						
						if($_SESSION['permisosMod']['w']){
							$request_user = $this->model->insertMaestro($strIdentificacion,
																					$strNombre, 
																					$strApellido, 
																					$intTelefono, 
																					$strDireccion,
																					$strCodigo,
																					$intCursoId,  
																					$intStatus);
						}
						}else{
						$option = 2;
						
						if($_SESSION['permisosMod']['u']){
							$request_user = $this->model->updateMaestro($idUsuario,
																					$strIdentificacion,
																					$strNombre, 
																					$strApellido, 
																					$intTelefono, 
																					$strDireccion,
																					$strCodigo,
																					$intCursoId,  
																					$intStatus);
						}
						
					}
					
					if($request_user > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
						}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! la identificación ya existe, ingrese otro.');		
						}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		
		/*-------------------------------------------------------------------------------------------------*/
		// consulta a la bd a la data tables
		/*-------------------------------------------------------------------------------------------------*/
		public function getMaestro()
		{
			if($_SESSION['permisosMod']['r']){
				
				$arrData = $this->model->selectMaestro();
				for ($i=0; $i < count($arrData); $i++) {
					
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					
					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
						}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}
					
					
					if($_SESSION['permisosMod']['r']){
						
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idmaestro'].')" title="Ver estudiante"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo('.$arrData[$i]['idmaestro'].')" title="Editar Estudiante"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){

						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idmaestro'].')" title="Eliminar estudiante"><i class="far fa-trash-alt"></i></button>';
		
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		

		/*-------------------------------------------------------------------------------------------------*/
		// consulta a la bd para el modal de visualizacion
		/*-------------------------------------------------------------------------------------------------*/
		public function getMaestros($idpersona)
		{
			if($_SESSION['permisosMod']['r']){
				$idusuario = intval($idpersona);
				if($idusuario > 0)
				{
					$arrData = $this->model->selectMaestros($idusuario);
					
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
						}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		
		
		
		
		/*-------------------------------------------------------------------------------------------------*/
		// Eliminar estudiante
		/*-------------------------------------------------------------------------------------------------*/ 
		public function delMaestro()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdpersona = intval($_POST['idUsuario']);
					$requestDelete = $this->model->deleteMaestro($intIdpersona);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
						}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		
		
		
		
	}// fin de la clase
?>