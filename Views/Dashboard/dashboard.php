<?php headerAdmin($data); ?>
<main class="app-content">
	<div class="app-title">
        <div>
			<h1><!--<i class="fa fa-dashboard"></i>--><?= $data['page_title'] ?></h1>
		</div>
        <ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Inicio</a></li>
		</ul>
	</div>
	<div class="row">
        <div class="col-md-12">
			<div class="tile">
				<div class="div">
	          		<h1><i class="fas fa-download"></i></i> Respaldo de información</h1>
	          		<p>En este módulo, se puede crear copias de seguridad de la información desde la base de datos al equipo, dando clic en la imagen del establecimiento.</p>
        		</div>
			</div>


			<div id= "centrador" >
				<a href="<?= base_url(); ?>/respaldo.php"><img id="logoimg"src="<?= media();?>/images/LogoIEBC.png"></a>
			</div>
		</div>
	</div>

</main>
<?php footerAdmin($data); ?>
