<?php
session_start();
include 'config.php';

// Проверка, был ли уже голос
if (isset($_SESSION['voted'])) {
    $message = "Вы уже проголосовали.";
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vote = $_POST['vote'];
        // Сохранение голоса в файл
        $file = 'poll_results.txt';
        file_put_contents($file, $vote . PHP_EOL, FILE_APPEND);
        
        $_SESSION['voted'] = true; // Установка флага о голосовании
        $message = "Спасибо за ваш голос!";
    }
}

// Вывод результатов
$results = [];
if (file_exists('poll_results.txt')) {
    $contents = file('poll_results.txt', FILE_IGNORE_NEW_LINES);
    $results = array_count_values($contents);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Голосование</title>
</head>
<body>
    <h1>Голосование</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <form action="" method="POST">
        <label><input type="radio" name="vote" value="Вариант 1" required> Вариант 1</label><br>
        <label><input type="radio" name="vote" value="Вариант 2"> Вариант 2</label><br>
        <label><input type="radio" name="vote" value="Вариант 3"> Вариант 3</label><br>
        <button type="submit">Проголосовать</button>
    </form>

    <h2>Результаты голосования</h2>
    <ul>
        <?php foreach ($results as $option => $count): ?>
            <li><?php echo htmlspecialchars($option) . ': ' . $count; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>