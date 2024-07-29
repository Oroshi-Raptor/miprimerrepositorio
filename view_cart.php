<?php
session_start();

// Función para eliminar un paquete del carrito
function removeFromCart($index) {
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexar el array
    }
}

// Procesar la eliminación de un paquete si se ha solicitado
if (isset($_GET['remove'])) {
    removeFromCart($_GET['remove']);
    header('Location: view_cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Carrito</title>
</head>
<body>
    <h1>Carrito de Compra</h1>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['destination']); ?> - <?php echo htmlspecialchars($item['date']); ?> - $<?php echo htmlspecialchars($item['price']); ?>
                    <a href="view_cart.php?remove=<?php echo $index; ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php">Agregar más paquetes</a>
</body>
</html>
