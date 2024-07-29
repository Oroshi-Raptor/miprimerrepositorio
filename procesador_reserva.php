<?php
include 'config.php';

// Simulación de datos de reserva (se pueden obtener de formularios, pero aquí los definimos manualmente)
$reservas = [
    ['id_cliente' => 1, 'fecha_reserva' => '2024-08-01', 'id_vuelo' => 1, 'id_hotel' => 1],
    ['id_cliente' => 2, 'fecha_reserva' => '2024-08-02', 'id_vuelo' => 2, 'id_hotel' => 2],
    ['id_cliente' => 3, 'fecha_reserva' => '2024-08-03', 'id_vuelo' => 3, 'id_hotel' => 3],
    ['id_cliente' => 4, 'fecha_reserva' => '2024-08-04', 'id_vuelo' => 4, 'id_hotel' => 4],
    ['id_cliente' => 5, 'fecha_reserva' => '2024-08-05', 'id_vuelo' => 5, 'id_hotel' => 5],
    ['id_cliente' => 6, 'fecha_reserva' => '2024-08-06', 'id_vuelo' => 1, 'id_hotel' => 2],
    ['id_cliente' => 7, 'fecha_reserva' => '2024-08-07', 'id_vuelo' => 2, 'id_hotel' => 3],
    ['id_cliente' => 8, 'fecha_reserva' => '2024-08-08', 'id_vuelo' => 3, 'id_hotel' => 4],
    ['id_cliente' => 9, 'fecha_reserva' => '2024-08-09', 'id_vuelo' => 4, 'id_hotel' => 5],
    ['id_cliente' => 10, 'fecha_reserva' => '2024-08-10', 'id_vuelo' => 5, 'id_hotel' => 1],
];

foreach ($reservas as $reserva) {
    $id_cliente = $reserva['id_cliente'];
    $fecha_reserva = $reserva['fecha_reserva'];
    $id_vuelo = $reserva['id_vuelo'];
    $id_hotel = $reserva['id_hotel'];

    // Preparar la consulta SQL para insertar reserva
    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)";

    // Usar una declaración preparada para mayor seguridad
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

    if ($stmt->execute()) {
        echo "Reserva registrada con éxito.<br>";
    } else {
        echo "Error al registrar la reserva: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>
