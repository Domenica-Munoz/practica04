<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<?php
include "conexionDB.php";
$cedula = isset($_POST['cedula']) ? trim($_POST['cedula']) : null;
$nombre = isset($_POST['nombre']) ? mb_strtoupper(trim($_POST['nombre']), 'UTF-8') : null;
$apellido = isset($_POST['apellido']) ? mb_strtoupper(trim($_POST['apellido']), 'UTF-8') : null;
$direccion = isset($_POST['direccion']) ? mb_strtoupper(trim($_POST['direccion']), 'UTF-8') : null;
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : null;
$correo = isset($_POST['correo']) ? trim($_POST['correo']) : null;
$password = isset($_POST['password']) ? trim($_POST['password']) : null;
$fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : null;
$rol = " ";
if(isset($_POST["user"])){
$rol="u";
}else if(isset($_POST["admin"])){
        $rol ="a";

    }

$sql = "INSERT INTO usuario(usu_codigo, usu_cedula, usu_nombres, usu_apellidos, usu_direccion, usu_telefono, usu_correo,
                    usu_password, usu_fecha_nacimiento, usu_rol)
                     VALUES (0, '$cedula', '$nombre', '$apellido', '$direccion', '$telefono', '$correo', MD5('$password'), '$fecha'),'$rol'";

if($conn->query($sql) === TRUE){
    echo "<p>Se ha registrado correctamente !!</p>";
}else{
    if($conn->errno == 1062){
        echo "<p class='error'> La persona con la cedula $cedula ya se encuentra registrada. </p>";
    }
    echo "<h1>$conn->errno</h1>";
}
$conn->close();
echo "<a href='../vista/Crear_Usuario.html'> REGRESAR </a>"
?>
</body>

</html>