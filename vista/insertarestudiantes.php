<?php
require_once "./librerias.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta Estudiantes</title>
    <style>
        body {
            background-image: url("https://www.facebook.com/p/Imagenes-Bonitas-de-Flores-100070536969870/");
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            text-transform: capitalize;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: border 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #0066cc;
            outline: none;
        }

        button {
            margin-top: 25px;
            padding: 10px 25px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #004c99;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>formulario de registro</h2>

    <label for="nombre">nombre</label>
    <input type="text" id="nombre" placeholder="ingresa tu nombre...">

    <label for="apellido">apellido</label>
    <input type="text" id="apellido" placeholder="ingresa tu apellido...">

    <label for="tarjeta">numero documento</label>
    <input type="text" id="tarjeta" placeholder="1234...">

    <button onclick="registrohtml()">registrar estudiante</button>
</div>

<script>
function registrohtml(){
    cadena = "form1=" + $('#nombre').val() +
             "&form2=" + $('#apellido').val() +
             "&form3=" + $('#tarjeta').val();

    $.ajax({
        type: "POST",
        url: "../controlador/registroestudiante.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alert("registro exitoso en base de datos");
            } else if (r == 2) {
                alert("ups, hubo un problema");
            }
        }
    });
}
</script>

</body>
</html>
