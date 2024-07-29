<?php
session_start();

// Validar y obtener los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $price = $_POST['price'];

    // Añadir el paquete al carrito
    $_SESSION['cart'][] = [
        'destination' => $destination,
        'date' => $date,
        'price' => $price
    ];

    header('Location: view_cart.php');
    exit;
}
?>
