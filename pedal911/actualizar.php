<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión si no está autenticado
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
                    <h2> Actualizar datos registrados</h2>
                    <div class="well well-small">
                        <hr class="soft" />
                        <h4>Edición de usuarios</h4>
                        <div class="row-fluid">
                            <?php
                            // Extraer datos del usuario a editar
                            extract($_GET);
                            require("connect_db.php");

                            // Verificar si el usuario tiene permisos para editar
                            if (!isset($_SESSION['id'])) {
                                echo "No tienes permisos para editar este usuario.";
                                exit();
                            }

                            $idUsuario = $_SESSION['id'];
                            $rolUsuario = $_SESSION['rol'];

                            // Obtener el ID del usuario a editar (suponiendo que se pasa como parámetro en la URL)
                            $idEditar = (isset($_GET['id']) && $rolUsuario == 1) ? $_GET['id'] : $idUsuario;

                            // Verificar si el usuario tiene el rol de administrador (id 1) o está editando su propio perfil
                            if ($rolUsuario == 1 || $idUsuario == $idEditar) {
                                $sql = "SELECT * FROM login WHERE id = $idEditar";

                                // Ejecutar la consulta
                                $ressql = mysqli_query($mysqli, $sql);

                                if ($ressql) {
                                    $row = mysqli_fetch_assoc($ressql);

                                    if ($row) {
                                        $id = $row['id'];
                                        $user = $row['user'];
                                        $password = $row['password'];
                                        $email = $row['email'];
                                        $pasadmin = $row['pasadmin'];
                                    } else {
                                        echo "No se encontraron resultados para el ID: $idEditar";
                                        exit();
                                    }
                                } else {
                                    echo "Error en la consulta: " . mysqli_error($mysqli);
                                    exit();
                                }
                            } else {
                                echo "No tienes permisos para editar este usuario.";
                                exit();
                            }
                            ?>

                            <form action="ejecutaactualizar.php" method="post">
                                Id<br><input type="text" name="id" value="<?php echo $id ?>" readonly="readonly"><br>
                                Usuario<br> <input type="text" name="user" value="<?php echo $user ?>"><br>
                                Password usuario<br> <input type="text" name="pass" value="<?php echo $password ?>"><br>
                                Correo usuario<br> <input type="text" name="email" value="<?php echo $email ?>"><br>
                                Password administrador<br> <input type="text" name="pasadmin" value="<?php echo $pasadmin ?>"><br>

                                <br>
                                <input type="submit" value="Guardar" class="btn btn-success btn-primary">
                                    <a href="admin.php" class="btn btn-default">Volver</a>
                                </div>
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

    