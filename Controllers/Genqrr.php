<?php 
	
	class Genqrr extends Controllers{
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
		
		public function Genqrr()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Genqrr";
			$data['page_title'] = "Generador  <small>  Sistema IEBC  </small> ";
			$data['page_name'] = "Genqrr";
			$data['page_functions_js'] = "functions_genqrr.js";
			$this->views->getView($this,"genqrr",$data);
		}
	}
?>