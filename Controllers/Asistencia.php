<?php
	class Asistencia extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(4);
		}
		
		public function Asistencia()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Asistencia";
			$data['page_title'] = "ASISTENCIA  <small>  Sistema IEBC  </small> ";
			$data['page_name'] = "asistencia";
			$data['page_functions_js'] = "functions_asistencia.js";
			$this->views->getView($this,"asistencia",$data);
		}
		//extracion de asistencia desde la bas de datos
		public function getAsistencia()
		{
			if($_SESSION['permisosMod']['r']){
				
				$arrData = $this->model->selectAsistencia();

				for ($i=0; $i < count($arrData); $i++) {
					
					
					if($arrData[$i]['status'] == 0)
					{
						$arrData[$i]['status'] = '<span class="badge badge-danger">No Asistió</span>';
						}else{
						$arrData[$i]['status'] = '<span class="badge badge-success">Asistió</span>';
					}
					
					
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


	}//fin de la clase
?>