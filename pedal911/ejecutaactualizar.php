<?php
// Incluir el archivo de conexión a la base de datos
require("connect_db.php");

// Verificar si el método de envío de la petición es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_salones = $_POST["id_salones"];
    $nombre_salon = $_POST["nombre_salon"];
    $inf_salon = $_POST["inf_salon"];
    $precio_salon = $_POST["precio_salon"];
    $ubicacion_salon = $_POST["ubicacion_salon"];

    // Verificar si la conexión a la base de datos es exitosa
    if ($mysqli->connect_error) {
        // Si hay un error de conexión, mostrar un mensaje de error y terminar el script
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Consulta SQL para actualizar los datos del salón
    $sql = "UPDATE salones SET nombre_salon='$nombre_salon', inf_salon='$inf_salon', precio_salon='$precio_salon', ubicacion_salon='$ubicacion_salon' WHERE id_salones='$id_salones'";

    // Ejecutar la consulta
    $result = mysqli_query($mysqli, $sql);

    // Verificar si la consulta falló
    if ($result === false) {
        // Si la consulta falló, mostrar un mensaje de error
        echo '<script>alert("ERROR EN PROCESAMIENTO, NO SE ACTUALIZARON LOS DATOS: ' . mysqli_error($mysqli) . '")</script> ';
    } else {
        // Si la consulta fue exitosa, verificar si se actualizaron filas en la tabla
        if (mysqli_affected_rows($mysqli) == 0) {
            // Si no se actualizaron filas en la tabla, realizar la segunda consulta
            extract($_POST);
            $sentencia = "UPDATE login SET user='$user', password='$pass', email='$email', pasadmin='$pasadmin' WHERE id='$id'";
            $resent = mysqli_query($mysqli, $sentencia);

            if ($resent) {
                // Si la segunda consulta fue exitosa, mostrar un mensaje de éxito y redirigir al usuario
                echo '<script>alert("REGISTRO ACTUALIZADO")</script>';
                echo "<script>location.href='admin.php'</script>";
            } else {
                // Si la segunda consulta falló, mostrar un mensaje de error
                echo '<script>alert("ERROR EN PROCESAMIENTO, NO SE ACTUALIZARON LOS DATOS")</script>';
            }
        } else {
            // Si la primera consulta fue exitosa y se actualizaron filas en la tabla, mostrar un mensaje de éxito y redirigir al usuario
            echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
            echo "<script>location.href='adminSalon.php'</script>";
        }
    }
}
?>