<?php 
    headerAdmin($data); 
    getModal('modalEstudiantesp',$data);
?>
<main class="app-content">    
	<div class="app-title">
        <div>
            <h1><!--<i class="fas fa-user-tag"></i>--> <?= $data['page_title'] ?>
				
			</h1>
		</div>
        <ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>/estudiantes"><?= $data['page_title'] ?></a></li>
		</ul>
	</div>
	
	
		<div class="tile-body">
			<div class="div">
          		<h1><i class="fab fa-whatsapp"></i> MENSAJERIA</h1>
          		<p>En este módulo se puede contactar al director del establecimiento para poder resolver alguna duda que tenga.</p>
        	</div>
			
		</div>

	
	<div class="container">
		<a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=50248293194&text=IEBC!%20En%20que%20te%20puedo%20ayudar." target="_blank" class="btn btn-primary">Mensaje</a>

	</div>
	
	
</main>
<?php footerAdmin($data); ?>
