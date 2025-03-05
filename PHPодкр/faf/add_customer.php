<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("INSERT INTO Customers (name, email, phone) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $phone])) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Ошибка при добавлении клиента.";
    }
}
?>