<?php 

	class Estudiantes extends Controllers{
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

		public function Estudiantes()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Estudiantes";
			$data['page_title'] = "ESTUDIANTES  <small>  Sistema IEBC  </small> ";
			$data['page_name'] = "estudiantes";
			$data['page_functions_js'] = "functions_estudiantes.js";
			$this->views->getView($this,"estudiantes",$data);
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
					$idUsuario = intval($_POST['idUsuario']);
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
						/*$option = 2;
						
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
																				$intGradoId,
																				$intPapeleria, 
																				$strDescripcion );
						}*/

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

		//datos de la data tables
		public function getEstudiantes()
		{
			$arrData = $this->model->selectEstudiantes();
			dep($arrData);
		}





    }// fin de la clase
?>