<?php 
	
	class Api extends Controllers{
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
		
		public function Api()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Api";
			$data['page_title'] = "API  <small>  Sistema IEBC  </small> ";
			$data['page_name'] = "api";
			$data['page_functions_js'] = "functions_api.js";
			$this->views->getView($this,"api",$data);
		}
	}
?>