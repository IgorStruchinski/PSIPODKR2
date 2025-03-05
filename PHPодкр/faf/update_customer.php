<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['customer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE Customers SET name = ?, email = ?, phone = ? WHERE customer_id = ?");
    if ($stmt->execute([$name, $email, $phone, $id])) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Ошибка при обновлении клиента.";
    }
}
?>