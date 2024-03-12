<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif ($_SESSION['rol']==2) {
	header("Location:index2.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Joel Ganchozo">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body data-offset="40" background="images/actualizarDatosFondo.png" style="background-attachment: fixed">
<div class="container">
<header class="header">
<div class="row">
	<?php
	include("include/cabecera.php");
	?>
</div>
</header>

  <!-- Navbar
    ================================================== -->

<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li class=""><a href="admin.php">ADMINISTRAR USUARIOS</a></li>
		</ul>
		<ul class="nav">
			<li class=""><a href="adminSalon.php">ADMINISTRAR SALONES</a></li>
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="desconectar.php"> Cerrar Cesión </a></li>			 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">	
	<div class="span12">
		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de Pedidos pendientes</h2>		

		<div class="well well-small">
	
		<div class="row-fluid">
		
			<?php
				require("connect_db.php");
				$sql=("SELECT * FROM platos");
	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$query=mysqli_query($mysqli,$sql);

				echo "<table border='2'; class='table table-hover';>";
					echo "<tr class='warning'>";
						echo "<td>Id_factura</td>";
						echo "<td>Cliente</td>";
						echo "<td>Salon</td>";
						echo "<td>Fecha y Hora</td>";
						echo "<td>Tipo de coccion</td>";
						echo "<td>Tipo de Proteina</td>";
						echo "<td>Tipo de bebida</td>";
						echo "<td>Cantidad de plato a preparar</td>";
						echo "<td>Estremes</td>";
					echo "</tr>";

			    
				?>
				
				<?php 
					while($arreglo=mysqli_fetch_array($query)){
						echo "<tr class='success'>";
							echo "<td>$arreglo[0]</td>";
							echo "<td>$arreglo[1]</td>";
							echo "<td>$arreglo[2]</td>";
							echo "<td>$arreglo[3]</td>";
							echo "<td>$arreglo[4]</td>";
                            echo "<td>$arreglo[5]</td>";
                            echo "<td>$arreglo[6]</td>";
                            echo "<td>$arreglo[7]</td>";
							echo "<td>$arreglo[8]</td>";

							echo "<td><a href='actualizarSalones.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";
							echo "<td><a href='adminSalon.php?id_salones=$arreglo[0]&id_salonesborrar=2'><img src='images/eliminar.png' class='img-rounded'/></a></td>";
							

							
						echo "</tr>";
					}

					echo "</table>";


						extract($_GET);
						if(@$id_salonesborrar==2){
			
							$sqlborrar="DELETE FROM salones WHERE id_salones=$id_salones";
							$resborrar=mysqli_query($mysqli,$sqlborrar);
							echo '<script>alert("REGISTRO ELIMINADO")</script> ';
							//header('Location: proyectos.php');
							echo "<script>location.href='adminSalon.php'</script>";
						}

				?>
			
		</div>	
  </body>
</html>