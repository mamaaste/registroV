<?php
session_start();
include "conccion.php";

// Recuperar las credenciales del formulario
$nombre = $_POST['nombres'];
$pass = md5($_POST['contraseña']); // Encriptar contraseña

// Verificar en la tabla de profesores
$sql_profesor = "SELECT * FROM profesores WHERE email = '$nombre' AND contraseña = '$pass'";
$resultado_profesor = mysqli_query($conn, $sql_profesor);

if (mysqli_num_rows($resultado_profesor) === 1) {
    // Usuario encontrado en profesores
    $row = mysqli_fetch_assoc($resultado_profesor);
    $_SESSION['nombres'] = $row['nombre'];
    $_SESSION['id'] = $row['id'];
    
    // Evaluar el rol basado en el valor de `asig`
    $asig = $row['asig'];
    else {
        header("Location: regis.php");
    } else {
        // Rol desconocido
        header("Location: index.html");
    }
    exit();
} 
?>
