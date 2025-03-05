<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM Customers WHERE customer_id = ?");
    $stmt->execute([$id]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать клиента</title>
</head>
<body>
    <h1>Редактировать клиента</h1>
    <form action="update_customer.php" method="POST">
        <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']; ?>">
        <label for="name">Имя:</label>
        <input type="text" name="name" value="<?php echo $customer['name']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $customer['email']; ?>" required>
        <label for="phone">Телефон:</label>
        <input type="text" name="phone" value="<?php echo $customer['phone']; ?>" required>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>