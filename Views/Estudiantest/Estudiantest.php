<?php 
    headerAdmin($data); 
    getModal('modalEstudiantest',$data);
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

        
      
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableEstudiantest">
                      <thead>
                        <tr>
                          <!--<th>ID</th>-->
                          <!--<th>Identificación</th>-->
                          <!--<th>Nombres Encargado</th>-->
                          <!--<th>Apellidos Encargado</th>-->
                          <th>Nombres Estudiante</th>
                          <th>Apellidos Estudiante</th>
                          <th>Teléfono</th>
                          <th>Dirección</th>
                          <th>Fecha de nacimiento</th>
                          <th>Papeleria</th>
                          <!--<th>Descripción</th>-->
                          <!--<th>Grado</th>-->
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
 

    </main>
<?php footerAdmin($data); ?>
    