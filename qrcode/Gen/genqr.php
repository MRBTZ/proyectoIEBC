<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Generador QR</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="../../Assets/images/favicon.ico">

		<!-- DataTables -->
		<link rel="stylesheet" href="../Lector/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../Lector/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="../Lector/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Lector/style.css">
    </head>
    <body class="row justify-content-center align-items-center vh-100" >
    <!--Barra del Lector-->
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../Gen/genqr.php"> <i class="glyphicon glyphicon-qrcode"></i> GENERADOR IEBC</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="navbar-brand" href="../../"> Salir</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="navbar-brand" href="../Lector/index.php"> Lector QR</a></li>
          </ul>
        </div>
      </nav>

      <div>
        <br>
        <br>
        <br>
      </div>
      
      <div class="container" id="conteiner1" >
        <div class="row">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Generador QR</h3>
            </div>
            <div class="tile-body">
              <input  class="form-control" type="text" id="texto_usuario" value="">
              <br clear="all">
              <button type="button" id="enviar" class="btn btn-primary" onclick="javascript:enviar_texto();"> Generar</button>
              <a class="btn btn-info" href="img/imgpractqr.png" download="QR.png">Descargar</a>
              <br clear="all"><br clear="all">
              <div class="qrimagen" id="cont_img" >
              </div>
              <a class="btn btn-link"  href="../Gen/genqr.php">Recargar</a>
            </div>
          </div>
        </div>
      </div>

      <script src="../Lector/plugins/jquery/jquery.min.js"></script>
      <script src="../Lector/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="../Lector/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="../Lector/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../Lector/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../Lector/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    </body>

    <script src="jquery-2.1.3.js"></script>
    <!--Captura del codigo QR-->
    <script>
    function enviar_texto() {
        $.ajax({
          url: "generarqr.php",
          type: "POST",
          data: "texto="+document.getElementById("texto_usuario").value,
          success: function(resp){
            datos= JSON.parse(resp);
            //alert(datos.mensaje);
            $("#cont_img").html("<img src='"+datos.datos+"'>")
          }
        })
      }
    </script>

</html>





