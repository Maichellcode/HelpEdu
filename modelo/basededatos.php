<?php
    class basededatos {
        //consultar
        //eliminar
        public function eliminarestudiantes(){
            require_once "conexion.php";
            $conexion = conexion();
            $id = $_POST['form1'];
            $borrar = "DELETE FROM accestudiantes WHERE id_estudiantes = '$id' ";
            $resultado = mysqli_query($conexion, $borrar);
            if($resultado) {
                return 1;
            } else {
                return 2;
            }
        }

        //actualizar
        public function actualizarestudiantes(){

            require_once "conexion.php";
                $conexion=conexion();
            $id = $_POST['form1'];
            $sql = "SELECT * FROM accestudiantes WHERE id_estudiantes = '$id'";
            $resultado = mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($resultado);
            $datos=array("0" => $ver[0],
                        "1" => $ver[1],
                        "2" => $ver[2],
                        "3" => $ver[3],
                        
            );
            return $datos;
            }


        //agregar
        public function registroestudiantes(){
            require_once "conexion.php";
            $conexion = conexion();
            $nombre = $_POST['form1']; //recibiendo los 
            $apellido = $_POST['form2']; // datos
            $tarjeta = $_POST['form3'];

            $agregar = "INSERT INTO accestudiantes VALUES ('','$nombre','$apellido','$tarjeta')";
            $resultado = mysqli_query($conexion, $agregar);
            if($resultado) {
                return 1;
            } else {
                return 2;
            }
        }
    }
?>
