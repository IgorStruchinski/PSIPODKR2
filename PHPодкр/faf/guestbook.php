<?php
session_start();

// Обработка добавления сообщения
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $entry = "$name: $message" . PHP_EOL;
    
    // Сохранение в файл
    file_put_contents('guestbook.txt', $entry, FILE_APPEND);
}

// Чтение сообщений
$messages = [];
if (file_exists('guestbook.txt')) {
    $messages = file('guestbook.txt', FILE_IGNORE_NEW_LINES);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
    <h1>Гостевая книга</h1>

    <form action="" method="POST">
        <label for="name">Имя:</label>
        <input type="text" name="name" required>
        <label for="message">Сообщение:</label>
        <textarea name="message" required></textarea>
        <button type="submit">Добавить сообщение</button>
    </form>

    <h2>Сообщения</h2>
    <ul>
        <?php foreach ($messages as $msg): ?>
            <li><?php echo htmlspecialchars($msg); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>