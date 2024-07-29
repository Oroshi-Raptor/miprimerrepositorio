<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
    $tarifa_noche = $_POST['tarifa_noche'];

    // Validar los datos
    if (empty($nombre) || empty($ubicacion) || $habitaciones_disponibles <= 0 || $tarifa_noche <= 0) {
        echo "Por favor complete todos los campos correctamente.";
    } else {
        // Preparar la consulta SQL
        $sql = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";

        // Usar una declaración preparada para mayor seguridad
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);

        if ($stmt->execute()) {
            echo "Hotel registrado con éxito.";
        } else {
            echo "Error al registrar el hotel: " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
}
?>
