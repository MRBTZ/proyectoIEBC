<?php session_start();?>
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>AsistenciaQR</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="../../Assets/images/favicon.ico">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="../Lector/style.css">
		<style>
		#divvideo{
			 box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
		</style>
    </head>
    <body style="background:#eee">

        <nav class="navbar" style="background:#222d32">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="../Lector/index.php"> <i class="glyphicon glyphicon-qrcode"></i> ASISTENCIA IEBC</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			  <li><a class="navbar-brand" href="../../"> Salir</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a class="navbar-brand" href="../Gen/genqr.php"> Generar QR</a></li>
			</ul>
		  </div>
		</nav>
		<div>
			<br>
			<br>
			<br>
		</div>

       <div class="container">
            <div class="row">
                <div class="col-md-4" style="padding:10px;background:#fff;border-radius: 5px;" id="divvideo">
					<center><p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> Pulse AQUI</p></center>
                    <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>
					<br>
					<br>
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> 
						  Exitoso!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

                </div>
				
                <div class="col-md-8">
                <form action="CheckInOut.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                     <i class="glyphicon glyphicon-qrcode"></i> <label> Validación de Scaner</label> <p id="time"></p>
                    <input type="text" name="maestroID" id="text" placeholder="CODIGO" class="form-control"   autofocus>
                </form>
				<div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                  <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
						<td>Nombre</td>
						<td>Codigo</td>
						<td>Entrada</td>
						<td>Salida</td>
						<td>Fecha</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="base_de_datos_iebc";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
						date_default_timezone_set('America/Guatemala');
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
						//tabla asistencia
                           $sql ="SELECT * FROM asistencia LEFT JOIN maestro ON asistencia.codigoid=maestro.codigo  WHERE fecha='$date'";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['nombres'].','.$row['apellidos'];?></td>
                                <td><?php echo $row['codigoid'];?></td>
                                <td><?php echo $row['entrada'];?></td>
                                <td><?php echo $row['salida'];?></td>
                                <td><?php echo $row['fecha'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>


        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               document.forms[0].submit();
           });
        </script>
		
			<script type="text/javascript">
			var timestamp = '<?=time();?>';
			function updateTime(){
			$('#time').html(Date(timestamp));
			timestamp++;
			}
			$(function(){
			setInterval(updateTime, 1000);
			});
			</script>
			
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script>
		  $(function () {
			$("#example1").DataTable({
				"language": {
           		"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
				},
			  "responsive": true,
			  "autoWidth": false,
			});
		  });
		</script>
		
    </body>
</html>