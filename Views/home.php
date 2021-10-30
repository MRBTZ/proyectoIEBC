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
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/tarjetas.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    
    <title><?= $data['page_tag']; ?></title>
  </head>
  <body>

  <div class="typewriter-effect">
              <div class="text" id="typewriter-text"></div>
  </div>

  <div class="container">



	<div class="card">
		<div class="left-column background1-left-column">
			<h6>Control de asistencias</h6>
			<h2>QR</h2>
			<i class="fas fa-qrcode"></i>			
		</div>

		<div class="right-column">
      <a class="button background2-left-column" href="<?= base_url(); ?>/asistencia" class="btn btn-primary">INGRESAR</a>
		</div>

	</div>

	<div class="card">
		<div class="left-column background2-left-column">
			<h6>sistema IEBC</h6>
			<h2>Ingreso</h2>
			<i class="fas fa-sign-in-alt"></i>			
		</div>

		<div class="right-column">
			<a class="button background2-left-column" href="<?= base_url(); ?>/login" class="btn btn-primary">INGRESAR</a>
		</div>
		
	</div>
</div>

         

    <script>
        const base_url = "<?= base_url(); ?>";
    </script>

    <script src="<?= media(); ?>/js/estilos_css.js"></script>
    <script src="<?= media();?>/js/fontawesome.js"></script>
 
  </body>