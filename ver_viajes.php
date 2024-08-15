<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Viajeros</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 20px;
        }

        .form-container, .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-container h2, .table-container h2 {
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table-container th {
            background-color: #007bff;
            color: #fff;
        }

        .table-container tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-container tr:hover {
            background-color: #ddd;
        }

        .button-container {
            margin: 20px;
        }

        .button-container a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Botones de navegación -->
        <div class="button-container">
            <a href="index.html">Registrar Viajero</a>
            <a href="registro_v.php">Registro de Viajes</a>
            <a href="ver_viajes.php">Ver Viajes</a>
        </div>

        <!-- Formulario de búsqueda de viajes -->
        <div class="form-container">
            <h2>Buscar Viajes</h2>
            <form action="ver_viajes.php" method="get">
                <label for="destino">Destino:</label>
                <input type="text" id="destino" name="destino" placeholder="Buscar por destino">


                <button type="submit">Buscar</button>
            </form>
        </div>

        <!-- Tabla de viajes -->
        <div class="table-container">
            <h2>Lista de Viajes</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Viajero</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "conccion.php";

                    // Obtener los filtros de búsqueda
                    $destino = isset($_GET['destino']) ? $_GET['destino'] : '';
                    

                    // Construir la consulta SQL
                    $sql = "SELECT viajes.id, CONCAT(viajeros.nombre, ' ', viajeros.apellido) AS viajero, destino, fecha, costo 
                            FROM viajes 
                            JOIN viajeros ON viajes.viajero_id = viajeros.id 
                            WHERE 1";

                    if ($destino) {
                        $sql .= " AND destino LIKE '%$destino%'";
                    }
                    

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['viajero'] . "</td>
                                    <td>" . $row['destino'] . "</td>
                                    <td>" . $row['fecha'] . "</td>
                                    <td>" . $row['costo'] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron viajes</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
