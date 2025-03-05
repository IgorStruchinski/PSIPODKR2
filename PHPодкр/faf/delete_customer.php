<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM Customers WHERE customer_id = ?");
    if ($stmt->execute([$id])) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Ошибка при удалении клиента.";
    }
}
?>