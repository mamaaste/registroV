<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Viajes</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        
        .form-container h2 {
            margin-bottom: 20px;
        }
        
        .form-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        
        .form-container input, .form-container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registro de Viajes</h2>
        <form action="verificarv.php" method="post">
            <label for="viajero_id">Viajero:</label>
            <select id="viajero_id" name="viajero_id" required>
                <?php
                // Conectar a la base de datos y obtener la lista de viajeros
                include "conccion.php";
                
                $result = $conn->query("SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM viajeros");
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombre_completo'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay viajeros disponibles</option>";
                }
                ?>
            </select>
            
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" required>
            
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            
            <label for="costo">Costo:</label>
            <input type="number" id="costo" name="costo" step="0.01" required>
            
            <button type="submit">Registrar Viaje</button>
            <button onclick="location.href='index.html '">Registro de Viajero</button>
            <button onclick="location.href='ver_viajes.php'">Ver Viajes</button>
        </form>
    </div>
</body>
</html>
