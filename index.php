<?php

session_start();

// Iniciar el carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function generarNotificacion($mensaje) {
    echo "<div class='notification'>{$mensaje}</div>";
}

// Simulación de notificaciones al acceder a la página
$notificaciones = [
    'Descubre la majestuosidad de China este verano! Viaja a China y sumérgete en su cultura milenaria. Salida el 28 de julio de 2024.',
    '¡Magia familiar en Orlando, USA! Disfruta de la diversión sin límites en Orlando. Salida el 10 de julio de 2024.',
    'Explora la historia antigua y la belleza de Grecia en diciembre de 2025. Embárcate en un viaje único a la cuna de la civilización occidental.'
];
$notificacionAleatoria = $notificaciones[array_rand($notificaciones)];

// Simulación de paquetes turísticos disponibles
$paquetes = [
    ["destino" => "China", "fecha" => "2024-07-28"],
    ["destino" => "Orlando, Usa", "fecha" => "2024-07-10"],
    ["destino" => "Grecia", "fecha" => "2025-12-02"],
    ["destino" => "Italia", "fecha" => "2025-02-016"],
    ["destino" => "Jerusalen", "fecha" => "2025-11-25"],
];
<script src="guardar_sesion.js"></script>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" search-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Agencia de Viajes</title>
</head>
<body>
    <div class="search-container">
        <input type="text" id="destination" placeholder="Destino">
        <input type="date" id="travel-date">
        <button onclick="search()">Buscar</button>
        <a href="form.php"><button onclick="location.href='form.php';">Registrar Viaje</button></a>
    </div>
    <div id="results-container">
        <!-- Los resultados de la búsqueda se mostrarán aquí -->
    </div>
    <div id="notifications-container">
        <?php generarNotificacion($notificacionAleatoria); ?>
    </div>

    <div id="package-list">
        <h2>Paquetes Turísticos Disponibles</h2>
        <ul>
            <?php foreach ($paquetes as $paquete): ?>
                <li><?php echo "{$paquete['destino']} - {$paquete['fecha']}"; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modal-text"></p>
        </div>
    </div>

    <script>
        const paquetes = <?php echo json_encode($paquetes); ?>;
    </script>
    <script src="search.js"></script>

    <h1>Agregar Paquete al Carrito</h1>
    <form action="add_to_cart.php" method="POST">
        <label for="destination">Destino:</label>
        <input type="text" id="destination" name="destination" required>
        <label for="date">Fecha:</label>
        <input type="date" id="date" name="date" required>
        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" required>
        <button type="submit">Agregar al Carrito</button>
    </form>
    <a href="view_cart.php">Ver Carrito</a>
</body>
</html>

