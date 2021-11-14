<?php headerAdmin($data); ?>
<main class="app-content">
	<div class="app-title">
        <div>
			<h1><!--<i class="fa fa-dashboard"></i>--><?= $data['page_title'] ?></h1>
		</div>
        <ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>/genqrr">Generador</a></li>
		</ul>
	</div>
	<div class="row">
        <div class="col-md-12">
			<div class="tile">
				<div class="div">
	          		<p>En este módulo, se puede crear codigos QR del maestro para la asistencia.</p>
        		</div>

        	

				            <div class="col-md-12">
				              <input  class="form-control col-md-2 " type="text" id="texto_usuario" value="">
				              <br clear="all">
				              <button type="button" id="enviar" class="btn btn-primary" onclick="javascript:enviar_texto();"> Generar</button>
				              <a class="btn btn-info" href="<?= base_url(); ?>/qrcode/Gen/img/imgpractqr.png" download="QR.png">Descargar</a>
				              <br clear="all"><br clear="all">
				              <div class="qrimagen" id="cont_img" >
				              </div>
				              <a class="btn btn-link"  href="<?= base_url(); ?>/genqrr">Recargar</a>
				            </div>

				       
			</div>
		</div>
	</div>

</main>
<?php footerAdmin($data); ?>
