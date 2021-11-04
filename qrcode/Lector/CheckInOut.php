<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="base_de_datos_iebc";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['maestroID'])){

		date_default_timezone_set('America/Guatemala');
        
        $maestroID =$_POST['maestroID'];
		$date = date('Y-m-d');
		$time = date('H:i:s A');
		//tabla estudents
		$sql = "SELECT * FROM maestro WHERE codigo = '$maestroID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'No se puede encontrar el QR ' . $maestroID;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['codigo'];

				$sql ="SELECT * FROM asistencia WHERE codigoid='$id' AND fecha='$date' AND status='0'";
				$query=$conn->query($sql);

				if($query->num_rows>0){
				$sql = "UPDATE asistencia SET salida ='$time', status='1' WHERE codigoid='$maestroID' AND fecha='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'Ingreso de salida: '.$row['nombres'].' '.$row['apellidos'];
			}else{
					$sql = "INSERT INTO asistencia(codigoid,entrada,fecha,status) VALUES('$maestroID','$time','$date','0')";
					if($conn->query($sql) ===TRUE){
					 $_SESSION['success'] = 'Ingreso de entrada: '.$row['nombres'].' '.$row['apellidos'];
			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Escanee su código QR';
}
header("location: index.php");
	   
$conn->close();
?>