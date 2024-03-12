<?php
session_start(); // Inicia la sesión si no está iniciada

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario de la sesión si está disponible
    $User = isset($_SESSION['user']) ? $_SESSION['user'] : "Usuario no identificado";

    // Obtener los datos del formulario
    $Nombre_solicitante = $User;
    $Salon = $_POST['Salon'];
    $Fecha_hora = $_POST['Fecha_hora'];
    $Categoria_plato = $_POST['Categoria_plato'];
    $Tipo_proteina = $_POST['Tipo_proteina'];
    $Tipo_bebida = $_POST['Tipo_bebida'];
    $Cantidad_platos = $_POST['Cantidad_platos'];
    $Estremes = $_POST['Estremes']; // Changed variable name
 
 

	require("connect_db.php");

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO platos VALUES('','$Nombre_solicitante', '$Salon', '$Fecha_hora','$Categoria_plato','$Tipo_proteina','$Tipo_bebida','$Cantidad_platos','$Estremes')");
				//echo 'Se ha registrado con exito';
				echo '<script language="javascript">alert("Registrado correctamente, escribir al numero 0967094959 para coordinar tiempo de preparacion");
    window.history.back();
</script>';
				
			}
			
		
	
?>

