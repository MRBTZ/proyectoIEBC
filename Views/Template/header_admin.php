<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Sistema de registro de estudiantes y maestros IEBC.">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Misael Rodolfo Batz Tzunún">
		<meta name="theme-color" content="#009688">
		<link rel="shortcut icon" href="<?= media();?>/images/favicon.ico">
		<title><?= $data['page_tag'] ?></title>
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap-select.min.css"> 
		<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
		
	</head>
	<!--cambio del ejerco del sirbar-->
	<body class="app sidebar-mini pace-running sidenav-toggled">
		<div id="divLoading" >
			<div>
				<img src="<?= media(); ?>/images/loading.svg" alt="Loading">
			</div>
		</div>
		<!-- Navbar-->
		<header class="app-header">
			<!--<a class="app-header__logo" href="<?= base_url(); ?>/dashboard">Sistema IEBC</a>-->
			<!-- Sidebar toggle button<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>-->
			
			<!-- Navbar Right Menu-->
			<ul class="app-nav">
				<!-- User Menu-->
				<li class="dropdown"><a class="app-nav__item" href="<?= base_url(); ?>/respaldo.php" ><i class="fas fa-download"> Backup</i></a>
					

				<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fas fa-sign-out-alt"></i> Salir</a>
					<ul class="dropdown-menu settings-menu dropdown-menu-right">
						<!--<li><a class="dropdown-item" href="<?= base_url(); ?>/opciones"><i class="fa fa-cog fa-lg"></i> Ajustes</a></li>-->
						<li><a class="dropdown-item" href="<?= base_url(); ?>/usuarios/perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
						<li><a class="dropdown-item" href="<?= base_url(); ?>/logout"><i class="fa fa-sign-out fa-lg"></i> Exit</a></li>
					</ul>
				</li>

			</ul>
		</header>
	<?php require_once("nav_admin.php"); ?> 	