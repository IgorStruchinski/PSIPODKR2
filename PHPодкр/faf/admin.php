<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Получение данных из таблиц
$customers = $pdo->query("SELECT * FROM Customers")->fetchAll(PDO::FETCH_ASSOC);
$products = $pdo->query("SELECT * FROM Products")->fetchAll(PDO::FETCH_ASSOC);
$orders = $pdo->query("SELECT * FROM Orders")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ Панель</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Админ Панель</h1>

    <form action="logout.php" method="POST" style="margin-bottom: 20px;">
        <button type="submit">Выйти</button>
    </form>

    <h2>Клиенты</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?php echo $customer['customer_id']; ?></td>
            <td><?php echo $customer['name']; ?></td>
            <td><?php echo $customer['email']; ?></td>
            <td><?php echo $customer['phone']; ?></td>
            <td>
                <a href="edit_customer.php?id=<?php echo $customer['customer_id']; ?>">Редактировать</a>
                <a href="delete_customer.php?id=<?php echo $customer['customer_id']; ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form action="add_customer.php" method="POST">
        <h3>Добавить клиента</h3>
        <label for="name">Имя:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="phone">Телефон:</label>
        <input type="text" name="phone" required>
        <button type="submit">Добавить</button>
    </form>

    <h2>Продукты</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Запасы</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['product_id']; ?></td>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['stock']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $product['product_id']; ?>">Редактировать</a>
                <a href="delete_product.php?id=<?php echo $product['product_id']; ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form action="add_product.php" method="POST">
        <h3>Добавить продукт</h3>
        <label for="product_name">Название:</label>
        <input type="text" name="product_name" required>
        <label for="price">Цена:</label>
        <input type="number" step="0.01" name="price" required>
        <label for="stock">Запасы:</label>
        <input type="number" name="stock" required>
        <button type="submit">Добавить</button>
    </form>

    <h2>Заказы</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Клиента</th>
            <th>ID Продукта</th>
            <th>Количество</th>
            <th>Дата заказа</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo $order['order_id']; ?></td>
            <td><?php echo $order['customer_id']; ?></td>
            <td><?php echo $order['product_id']; ?></td>
            <td><?php echo $order['quantity']; ?></td>
            <td><?php echo $order['order_date']; ?></td>
            <td>
                <a href="edit_order.php?id=<?php echo $order['order_id']; ?>">Редактировать</a>
                <a href="delete_order.php?id=<?php echo $order['order_id']; ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form action="add_order.php" method="POST">
        <h3>Добавить заказ</h3>
        <label for="customer_id">ID Клиента:</label>
        <input type="number" name="customer_id" required>
        <label for="product_id">ID Продукта:</label>
        <input type="number" name="product_id" required>
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" required>
        <button type="submit">Добавить</button>
    </form>

    <h2>Дополнительные функции</h2>
    <ul>
        <li><a href="poll.php">Голосование</a></li>
        <li><a href="guestbook.php">Гостевая книга</a></li>
        <li><a href="feedback.php">Обратная связь</a></li>
    </ul>
</body>
</html>