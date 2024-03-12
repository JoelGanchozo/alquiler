<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Proyecto Academias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/registroFondo.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;  
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            width: 400px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        h1 {
            color: #4285f4;
            text-align: center;
        }

        label {
            font-size: 16px;
            color: #ffffff;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #000000;
            margin-bottom: 15px;
        }

        .btn-danger {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff3547;
            color: #ffffff;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #ff1f2b;
        }

        .message {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
        }

        .message a {
            color: #ff3547;
        }
        .back-btn {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <h1>Registro</h1>
        <label for="realname"><b>Ingresa tu nombre</b></label>
        <input type="text" name="realname" class="form-control" placeholder="Ingresa tu nombre" />

        <label for="nick"><b>Ingresa tu email</b></label>
        <input type="text" name="nick" class="form-control" required placeholder="Ingresa Correo Electronico" />

        <label for="pass"><b>Ingresa tu Password</b></label>
        <input type="password" name="pass" class="form-control" placeholder="Ingresa contraseña" />

        <label for="rpass"><b>Repite tu contraseña</b></label>
        <input type="password" name="rpass" class="form-control" required placeholder="Repite contraseña" />

        <input class="btn btn-danger" type="submit" name="submit" value="Registrarse" />
        <p class="message">¿Ya te has registrado? <a href="./login.html">Iniciar Sesión</a></p>
        <div class="back-btn">
            <button type="button" onclick="window.location.href='./principal.html'">VOLVER</button>
        </div>
    </form>
    
    <?php
    if (isset($_POST['submit'])) {
        require("registro.php");
    }
    ?>

</body>

</html>
