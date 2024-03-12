<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

// Incluir el archivo de conexión a la base de datos
require("connect_db.php");

// Obtener el ID del salón a editar (suponiendo que se pasa como parámetro en la URL)
$idEditar = (isset($_GET['id'])) ? $_GET['id'] : $_SESSION['id'];

// Consulta SQL para obtener los datos del salón
$sql = "SELECT * FROM salones WHERE id_salones = $idEditar";

// Ejecutar la consulta
$ressql = mysqli_query($mysqli, $sql);

// Verificar si la consulta fue exitosa
if ($ressql) {
    // Obtener los datos del salón
    $row = mysqli_fetch_assoc($ressql);

    // Verificar si se encontraron resultados
    if ($row) {
        $id_salones = $row['id_salones'];
        $nombre_salon = $row['nombre_salon'];
        $inf_salon = $row['inf_salon'];
        $precio_salon = $row['precio_salon'];
        $ubicacion_salon = $row['ubicacion_salon'];
    } else {
        echo "No se encontraron resultados para el ID: $idEditar";
        exit();
    }
} else {
    echo "Error en la consulta: " . mysqli_error($mysqli);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Actualizar Datos</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-<tu-integridad>" crossorigin="anonymous" />

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

        <!-- Navbar -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class=""><a href="admin.php"><i class="fas fa-home"></i></a></li>
                        </ul>

                        <form action="#" class="navbar-search form-inline" style="margin-top:6px">
                            <!-- Formulario de búsqueda -->
                        </form>
                        <ul class="nav pull-right">
                            <li>
                                <a>
                                    <p class="fa fa-user fa-lg fa-fw"></p>Bienvenido
                                    <strong><?php echo $_SESSION['user']; ?></strong>
                                </a>
                            </li>
                            <li><a href="desconectar.php">Cerrar Sesión</a></li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div>
            </div><!-- /navbar-inner -->
        </div>

        <!-- Cuerpo del documento -->
        <div class="row">
            <div class="span12">
                <div class="caption">
                    <h2> Actualizar datos salones</h2>
                    <div class="well well-small">
                        <hr class="soft" />
                        <h4>Edición de usuarios</h4>
                        <div class="row-fluid">
                            <form action="ejecutaactualizar.php" method="post">
                                Id_salones<br><input type="text" name="id_salones" value="<?php echo $id_salones ?>" readonly="readonly"><br>
                                Nombre<br> <input type="text" name="nombre_salon" value="<?php echo $nombre_salon ?>"><br>
                                Información<br> <input type="text" name="inf_salon" value="<?php echo $inf_salon ?>"><br>
                                Precio<br> <input type="text" name="precio_salon" value="<?php echo $precio_salon ?>"><br>
                                Ubicación<br> <input type="text" name="ubicacion_salon" value="<?php echo $ubicacion_salon ?>"><br>

                                <br>
                                <input type="submit" value="Guardar" class="btn btn-success btn-primary">
                                <a href="adminSalon.php" class="btn btn-default">Volver</a>
                            </form>
                        </div>
                        <div class="span8">
                            <!-- Contenido adicional -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <hr class="soften" />
        <footer class="footer">
            <center>
                <p>&copy; Joel Ganchozo</p>
            </center>
        </footer>
    </div><!-- /container -->

</body>

</html>
