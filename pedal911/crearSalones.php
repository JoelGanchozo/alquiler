<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Registro Salon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/actualizarDatosFondo.png');
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1877f2;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #1c1e21;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .textarea-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            resize: vertical;
            min-height: 100px;
            box-sizing: border-box;
        }

        .btn-danger {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #1877f2;
            color: #ffffff;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #0e5a8a;
        }

        .back-btn {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <h1>Registrar Salon</h1>
        <label for="nombre_salon"><b>Ingresa el nombre del Salon</b></label>
        <input type="text" name="nombre_salon" class="form-control" placeholder="Ingresa el nombre del Salon" />

        <label for="inf_salon"><b>Ingresa la Informacion</b></label>
        <textarea name="inf_salon" class="form-control textarea-control" required placeholder="Ingresa la Informacion"></textarea>

        <label for="precio_salon"><b>Ingresa el Precio</b></label>
        <input type="text" name="precio_salon" class="form-control" placeholder="Ingresa el Precio $" />

        <label for="ubicacion_salon"><b>Ingresa la ubicacion</b></label>
        <input type="text" name="ubicacion_salon" class="form-control" placeholder="Ingresa la ubicacion" />

        <input class="btn btn-danger" type="submit" name="submit" value="Registrarse" />
        <div class="back-btn">
            <button type="button" onclick="window.location.href='./adminSalon.php'" class="btn btn-link">VOLVER</button>
        </div>
    </form>
    
    <?php
    if (isset($_POST['submit'])) {
        require("registroSalon.php");
    }
    ?>

</body>

</html>
