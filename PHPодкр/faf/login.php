<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Простой пример проверки (в реальной жизни используйте хеширование паролей)
    if ($username === 'admin' && $password === 'password') {
        // Установить сессии
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Установить cookie на 1 час
        setcookie('username', $username, time() + 3600, "/");
        
        header("Location: admin.php");
        exit();
    } else {
        $error = "Неправильное имя пользователя или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
    <h1>Вход в админ-панель</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" required>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
        <button type="submit">Войти</button>
    </form>
</body>
</html>