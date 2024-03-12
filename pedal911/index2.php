<?php
    session_start();
    if (@!$_SESSION['user']) {
        header("Location:index.php");
    } elseif ($_SESSION['rol'] == 1) {
        header("Location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Selección Plato</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="shortcut icon" href="assets/ico/favicon.ico">
<link rel="stylesheet" href="./style.css">

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        padding: 20px;
        background-image: url('images/fondo1.png');
        transition: background-color 0.5s ease;
    }

    .contai {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        color: #1877f2;
        margin-bottom: 20px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    select,
    input[type="number"] {
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #1877f2;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #1659a1;
    }
</style>

<?php
require("connect_db.php");
$sql = "SELECT nombre_salon FROM salones";

// Ejecutar la consulta
$query = mysqli_query($mysqli, $sql);
?>

</head>
<body>

<?php
include("include/menu.php");
?>

<div class="contai">
    <h2>Seleccione el tipo de menú:</h2>
<br></br>
    <div class="col-md-4">
    <h3>Salon que desea reservar</h3>

    <form method="post" action="registroPlato.php" id="formulario">
        <select for="Salon" class="selector success" id="ubicacion" name="Salon">
            <?php
            // Comprobar si se encontraron resultados
            if (mysqli_num_rows($query) > 0) {
                // Construir las opciones del selector
                while ($fila = mysqli_fetch_array($query)) {
                    echo '<option value="' . $fila["nombre_salon"] . '">' . $fila["nombre_salon"] . '</option>';
                }
            } else {
                echo '<option value="">No hay salones disponibles</option>';
            }
            ?>
        </select>
 </div>
            <div class="col-md-4">
                <h3>Fecha y Hora</h3>
            <input type="datetime-local" id="Fecha_hora" name="Fecha_hora">
            </div>

            <div class="col-md-4">
                <h3>Categoría de plato</h3>
                <select for="Categoria_plato" name="Categoria_plato">
                    <option value="Asado">Asado</option>
                    <option value="Estofado">Estofado</option>
                    <option value="Vaporera">Al vapor</option>
                </select>
            </div>

            <div class="col-md-4">
                <h3>Tipo de proteína</h3>
                <select for="Tipo_proteina" name="Tipo_proteina">
                    <option value="Carne de Res">Carne de Res (30 gms) * plato</option>
                    <option value="Filete de Pollo">Pechuga de Pollo (45 gms) * plato</option>
                    <option value="Camarones">Camarones (20 gms) * plato</option>
                </select>
            </div>

            <div class="col-md-4">
                <h3>Tipo de bebida</h3>
                <select for="Tipo_bebida" name="Tipo_bebida">
                    <option value="Coca Cola">Coca Cola personal (250 ml)</option>
                    <option value="Limonada">Vaso de limonada</option>
                    <option value="Jugo de Mora">Vaso de jugo de mora</option>
                    <option value="Sifrut">Sifut personal (250 ml)</option>
                    <option value="Agua">Botella de agua</option>
                </select>
            </div>
       
       
    <div class="col-md-6">
    <h3>Cantidad de Platos</h3>
    <input for="Cantidad_platos" type="number"name="Cantidad_platos" min="1" max="50" required>
</div>

<div class="col-md-6">
    <h3>Desea comensal?</h3>
    <select for="Estremes" name="Estremes">
        <option value="No desea"></option>
        <option value="Tostado">Tostado con chicharrón</option>
        <option value="Frutas">Porción de fruta</option>
        <option value="Helado">Porción de Helado</option>
    </select>
</div>
<br>
</br>


<input class="btn btn-danger" type="submit" name="submit" value="Enviar" />
</form>
<?php
if (isset($_POST['submit'])) {
    require("registroPlato.php");
}
?>

<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>
<center><p>&copy; Copyright Joel Ganchozo <br/><br/></p></center>
 </footer>
</div>

<script>

function validarCantidad() {
    var cantidadInput = document.getElementById("Platos_solicitados");
    var Platos_solicitados = parseInt(cantidadInput.value);

    if (Platos_solicitados < 1 || Platos_solicitados > 50) {
        cantidadInput.setCustomValidity("La cantidad debe ser un número entre 1 y 50.");
    } else {
        cantidadInput.setCustomValidity("");
    }
}

window.onload = function() {
    validarCantidad();
};
</script>

</body>
</html>
