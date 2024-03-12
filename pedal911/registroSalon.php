<?php
	$nombre_salon=$_POST['nombre_salon'];
	$inf_salon=$_POST['inf_salon'];
	$precio_salon= $_POST['precio_salon'];
	$ubicacion_salon=$_POST['ubicacion_salon'];

	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checknombre_salon=mysqli_query($mysqli,"SELECT * FROM salones WHERE nombre_salon='$nombre_salon'");
	$check_salon=mysqli_num_rows($checknombre_salon);
			if($check_salon>0){
				echo ' <script language="javascript">alert("Atencion, el salon ya esta registrado, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO salones VALUES('','$nombre_salon','$inf_salon','$precio_salon','$ubicacion_salon')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Salon registrado con éxito");</script> ';
				
			}
			
		
	
?>
