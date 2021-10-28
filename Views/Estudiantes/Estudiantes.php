<?php 
    headerAdmin($data); 
    getModal('modalEstudiantes',$data);
?>
  <main class="app-content">    
      <div class="app-title">
        <div>
            <h1><!--<i class="fas fa-user-tag"></i>--> <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" ><!--<i class="fas fa-plus-circle"></i>--> Nuevo</button>
              <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/estudiantes"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

        <div class="row">
          
          <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fas fa-tasks fa-3x"></i>
              <div class="info">
                <h4>PRIMERO</h4>
                <p><b>5</b></p>
                <br>
                <a href="<?= base_url(); ?>/estudiantes1" class="btn btn-primary">CONSULTA  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
          <div class="col-md-4">
            <div class="widget-small info"><i class="icon fas fa-tasks fa-3x"></i>
              <div class="info">
                <h4>SEGUNDO</h4>
                <p><b>25</b></p>
                <br>
                <a href="<?= base_url(); ?>/estudiantes2" class="btn btn-info">CONSULTA  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
          <div class="col-md-4" >
            <div class="widget-small danger"><i class="icon fas fa-tasks fa-3x"></i>
              <div class="info">
                <h4>TERCERO</h4>
                <p><b>10</b></p>
                <br>
                <a href="<?= base_url(); ?>/estudiantes3" class="btn btn-danger">CONSULTA  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php } ?>

        </div>

        
        <!--
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableUsuarios">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Email</th>
                          <th>Teléfono</th>
                          <th>Rol</th>
                          <th>Status</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Carlos</td>
                          <td>Henández</td>
                          <td>carlos@info.com</td>
                          <td>78542155</td>
                          <td>Administrador</td>
                          <td>Activo</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
                -->

    </main>
<?php footerAdmin($data); ?>
    