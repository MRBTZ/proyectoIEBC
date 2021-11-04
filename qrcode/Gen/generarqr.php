<?php
$texto = $_POST["texto"];
 if (file_exists("phpqrcode/qrlib.php")){
   require "phpqrcode/qrlib.php";

   $ruta_qr = "img/"."imgpractqr.png";

   $tamaño = 10; // 33  * 10 = 330px
   $level = "Q"; // L, M, Q, H
   $framSize = 3;

   QRcode::png($texto, $ruta_qr, $level, $tamaño, $framSize);

   if (file_exists($ruta_qr)){
     $error=0;
     $mensaje="Archivo QR, generado";

   }

 } else {
  $error=1;
  $mensaje = "No existe la librería";
 }

 $resp=[
   "error"=>$error,
   "mensaje"=>$mensaje,
   "datos"=>$ruta_qr
 ];

 echo json_encode($resp);
?>
