<?php
include "conccion.php";

// Obtener datos del formulario
$viajero_id = $_POST['viajero_id'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$costo = $_POST['costo'];

// Insertar datos en la tabla viajes
$sql = "INSERT INTO viajes (viajero_id, destino, fecha, costo) VALUES ('$viajero_id', '$destino', '$fecha', '$costo')";

if ($conn->query($sql) === TRUE) {
    echo "Viaje registrado con éxito.";
    header("location:registro_v.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
