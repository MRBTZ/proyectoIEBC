<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Misael Rodolfo Batz Tzunún">
		<meta name="theme-color" content="#009688">
		<link rel="shortcut icon" href="<?= media();?>/images/favicon.ico">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
		
		<title><?= $data['page_tag']; ?></title>
	</head>
	<body>
		<section class="material-half-bg">
			<div class="cover"></div>
		</section>
		<section class="login-content">
			<div class="logo">
				<img class="logo1" src="<?= media(); ?>/images/LogoIEBC.png"  alt="">
			</div>
			<div class="login-box">
				<div id="divLoading" >
					<div>
						<img src="<?= media(); ?>/images/loading.svg" alt="Loading">
					</div>
				</div>
				<form class="login-form" name="formLogin" id="formLogin" action="">
					<h3 class="login-head">SISTEMA IEBC</h3>
					
					<div class="form-group">
						<label class="control-label"></label>
						<input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Usuario" autofocus>
						<label class="control-label"></label>
						<input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Contraseña">
					</div>
					
					<div id="alertLogin" class="text-center"></div>
					<br>
					<br>
					<div class="form-group btn-container">
						<button type="submit" class="btn btn-outline-success btn-block">INGRESO</button>
					</div>
					<br>
					<br>
					<div class="form-group btn-container">
						<a class="button background2-left-column" href="<?= base_url(); ?>" class="btn btn-primary">Regresar</a>
					</div>
				</form>
				
				
			</div>
		</section>
		<script>
			const base_url = "<?= base_url(); ?>";
		</script>
		<!-- Essential javascripts for application to work-->
		<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
		<script src="<?= media(); ?>/js/popper.min.js"></script>
		<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
		<script src="<?= media(); ?>/js/fontawesome.js"></script>
		<script src="<?= media(); ?>/js/main.js"></script>
		<!-- The javascript plugin to display page loading on top-->
		<script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
		<script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script>
		<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
	</body>
</html>