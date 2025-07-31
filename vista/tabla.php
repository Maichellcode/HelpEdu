<?php
require_once "../modelo/conexion.php";

$conexion = conexion();

$sql = "SELECT * FROM accestudiantes";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Estudiantes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url("https://mail.google.com/mail/u/0?ui=2&ik=6a59cb09d0&attid=0.1&permmsgid=msg-a:r3567569778895708041&th=1985e45a71df5445&view=fimg&fur=ip&permmsgid=msg-a:r3567569778895708041&sz=s0-l75-ft&attbid=ANGjdJ9kH3-G23JHXEf7zSe7S-u1KtXK579cK-XZZMltJ-Yv0PZ7fZ22PfvdKGILLZ8VFKFziHzeeCrlE73b313U0X7RR0aO6SMsnMkYVVPQoTfdEeikSpQwwwLGxZM&disp=emb&realattid=ii_mdqrlxsi0&zw");
            background-size: cover;
            backgraund-position: cover;
            margin: 0;
            padding: 0;

        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .formulario {
            width: 50%;
            margin: 20px;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .formulario label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .formulario input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .formulario input[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        .formulario button {
            padding: 10px 20px;
            background-color: #0077b6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .formulario button:hover {
            background-color: #005f8a;
        }

        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #457b9d;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        td button {
            padding: 6px 12px;
            margin: 2px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .eliminar {
            background-color: #e63946;
            color: white;
        }

        .editar {
            background-color: #2a9d8f;
            color: white;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #888;
            background-color: #eee;
            margin-top: 50px;
        }
    </style>
</head>
<body>



<div class="formulario">

<h2>HelpEdu</h2>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" placeholder="Ingresa tu nombre...">

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" placeholder="Ingresa tu apellido...">

    <label for="tarjeta">Número de Documento</label>
    <input type="text" id="tarjeta-ti" placeholder="1234...">

    <label for="telefono">Telefono</label>
    <input type="text" id="telefono" placeholder="example= 3116265801">

    <label for="curso">Curso</label>
    <input type="text" id="curso" placeholder="">

    <label for="grupo">Grupo</label>
    <input type="text" id="grupo" placeholder="">

    <button onclick="actualizarestudiantes()">Actualizar Estudiante</button>
</div>

<h2>Datos Registrados</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tarjeta</th>
        <th>telefono</th>
        <th>curso</th>
        <th>grupo</th>

        <th colspan="2">Opciones</th>
    </tr>

  
   <?php while ($ver = mysqli_fetch_row($resultado)) { ?>
    <tr>
        <td><?php echo $ver[0]; ?></td>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>


        <td>
            <button class="eliminar" onclick="eliminarestudiante('<?php echo $ver[0]; ?>')">Eliminar</button>
        </td>
        <td>
            <button class="editar" onclick="editarestudiantes('<?php echo $ver[0]; ?>')">Editar</button>
        </td>
    </tr>
<?php } ?>

</table>

<footer>
    HelpEdu - © 2025
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function eliminarestudiante(id) {
    const cadena = "form1=" + id;
    $.ajax({
        type: "POST",
        url: "../controlador/eliminarestudiantes.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alert("Eliminado exitosamente");
                location.reload();
            } else if (r == 2) {
                alert("Ups, hubo un problema");
            }
        }
    });
}

function editarestudiantes(id) {
    const cadena = "form1=" + id;
    $.ajax({
        type: "POST",
        url: "../controlador/actualizarestudiantes.php",
        data: cadena,
        success: function(r) {
            const dato = jQuery.parseJSON(r);
            $('#id').val(dato[0]);
            $('#nombre').val(dato[1]);
            $('#apellido').val(dato[2]);
            $('#tarjeta').val(dato[3]);
        }
    });
}

function actualizarestudiantes() {
    const id = $('#id').val().trim();
    const nombre = $('#nombre').val().trim();
    const apellido = $('#apellido').val().trim();
    const tarjeta = $('#tarjeta').val().trim();

    if (id === "") {
        alert("Debes seleccionar un estudiante para actualizar.");
        return;
    }
    if (nombre === "" || apellido === "" || tarjeta === "") {
        alert("Todos los campos son obligatorios.");
        return;
    }

    const cadena = "form1=" + id +
                   "&form2=" + nombre +
                   "&form3=" + apellido +
                   "&form4=" + tarjeta;

    $.ajax({
        type: "POST",
        url: "../controlador/guardarestudiante.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alert("Estudiante actualizado correctamente.");
                location.reload();
            } else if (r == 2) {
                alert("Ocurrió un error al actualizar.");
            }
        }
    });
}
</script>

</body>
</html>
