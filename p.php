/<?php
include "conccion.php";
$pass = md5("hola123");
$sql = $conn->query("INSERT INTO administracion(nombre,apellido,email,fechaD,telefono,contraseña) VALUES
 ('nelson','maas','nelson@gmail.com',' ','58098744','$pass')");

header('Location: index.html')

?>