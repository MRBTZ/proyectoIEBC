<?php 
	
	class Estudiantess extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(3);
		}
		
		public function Estudiantess()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Estudiantes";
			$data['page_title'] = "ESTUDIANTES  <small>  Sistema IEBC  </small> ";
			$data['page_name'] = "estudiantes";
			$data['page_functions_js'] = "functions_estudiantess.js";
			$this->views->getView($this,"estudiantess",$data);
		}
		//extraer los datos de la base de datos 
		public function getGrado()
		{
			$arrData = $this->model->selectGrado();
			
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}
		
		public function getSelectGrado()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectGrado();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
						$htmlOptions .= '<option value="'.$arrData[$i]['idgrado'].'">'.$arrData[$i]['grado'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
		
		
		public function setEstudiante()
		{
			if($_POST){	
				
				
				if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtDirección']) || empty($_POST['txtNombreE']) || empty($_POST['txtApellidoE']) || empty($_POST['txtFecha']) || empty($_POST['txtCiclo']) || empty($_POST['listPapeleria']) || empty($_POST['txtDescripcion']) || empty($_POST['listGradoid']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
					}else{ 
					
					$idUsuario = intval($_POST['idUsuario']);/*:p*/
					$strIdentificacion = strClean($_POST['txtIdentificacion']);
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intTelefono = intval(strClean($_POST['txtTelefono']));
					$strDireccion = ucwords(strClean($_POST['txtDirección']));
					
					$strNombreE = ucwords(strClean($_POST['txtNombreE']));
					$strApellidoE = ucwords(strClean($_POST['txtApellidoE']));
					$strFecha = strClean($_POST['txtFecha']);
					$intCiclo = intval(strClean($_POST['txtCiclo']));
					$intPapeleria = intval(strClean($_POST['listPapeleria']));
					$strDescripcion = ucwords(strClean($_POST['txtDescripcion']));
					$intGradoId = intval(strClean($_POST['listGradoid']));
					
					//$request_user = "";
					
					if($idUsuario == 0)
					{
						$option = 1;
						
						if($_SESSION['permisosMod']['w']){
							$request_user = $this->model->insertEstudiantes($strIdentificacion,
							$strNombre, 
							$strApellido, 
							$intTelefono, 
							$strDireccion,
							$strNombreE, 
							$strApellidoE,
							$strFecha,
							$intCiclo,
							$intPapeleria, 
							$strDescripcion, 
							$intGradoId);
						}
						}else{
						$option = 2;
						
						if($_SESSION['permisosMod']['u']){
							$request_user = $this->model->updateEstudiantes($idUsuario,
							$strIdentificacion,
							$strNombre, 
							$strApellido, 
							$intTelefono, 
							$strDireccion,
							$strNombreE, 
							$strApellidoE,
							$strFecha,
							$intCiclo,
							$intPapeleria, 
							$strDescripcion,
							$intGradoId );
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
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
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
		public function getEstudiantes()
		{
			if($_SESSION['permisosMod']['r']){
				
				$arrData = $this->model->selectEstudiantes();
				for ($i=0; $i < count($arrData); $i++) {
					
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					
					if($arrData[$i]['papeleria'] == 1)
					{
						$arrData[$i]['papeleria'] = '<span class="badge badge-success">Completo</span>';
						}else{
						$arrData[$i]['papeleria'] = '<span class="badge badge-danger">Incompleto</span>';
					}
					
					
					if($_SESSION['permisosMod']['r']){
						
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idestudiante'].')" title="Ver estudiante"><i class="far fa-eye"></i></button>';
					}
					///////////////////////////////////////////////////////////////////////////
					if($_SESSION['permisosMod']['u']){
						/*if(($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
							($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idestudiante'] != 1) ){
						/*-----------------------------------------------------------*/
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo('.$arrData[$i]['idestudiante'].')" title="Editar Estudiante"><i class="fas fa-pencil-alt"></i></button>';
						/*}else{
							$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
						}*/
					}
					///////////////////////////////////////////////////////////////////////////
					if($_SESSION['permisosMod']['d']){
						/*if(($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
							($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idestudiante'] != 1) and
							($_SESSION['userData']['idestudiante'] != $arrData[$i]['idestudiante'] )
							){
						/*-----------------------------------------------------------*/
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idestudiante'].')" title="Eliminar estudiante"><i class="far fa-trash-alt"></i></button>';
						/*}else{
							$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
						}*/
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
		public function getEstudiante($idpersona)
		{
			if($_SESSION['permisosMod']['r']){
				$idusuario = intval($idpersona);
				if($idusuario > 0)
				{
					$arrData = $this->model->selectEstudiante($idusuario);
					
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
		public function delEstudiante()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdpersona = intval($_POST['idUsuario']);
					$requestDelete = $this->model->deleteEstudiante($intIdpersona);
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