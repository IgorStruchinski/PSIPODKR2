<?php
session_start();

// Обработка обратной связи
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $entry = "Email: $email, Сообщение: $feedback" . PHP_EOL;

    // Сохранение в файл
    file_put_contents('feedback.txt', $entry, FILE_APPEND);
    $message = "Спасибо за ваш отзыв!";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обратная связь</title>
</head>
<body>
    <h1>Обратная связь</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="feedback">Сообщение:</label>
        <textarea name="feedback" required></textarea>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>