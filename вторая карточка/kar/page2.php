<?php
session_start(); // Начинаем сессию

// Получаем данные из сессии
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : 'Не указан';
$comment = isset($_SESSION['comment']) ? $_SESSION['comment'] : 'Не указан';

// Выводим информацию
echo "<h2>Данные пользователя</h2>";
echo "<p>Телефон: $phone</p>";
echo "<p>Комментарий: $comment</p>";

// Выводим идентификатор сессии
echo "<p>ID сессии: " . session_id() . "</p>";

// Читаем данные из файла 1.txt
if (file_exists('1.txt')) {
    $fileData = file_get_contents('1.txt');
    echo "<h3>Данные из файла:</h3>";
    echo "<pre>$fileData</pre>"; // Выводим данные в теге pre для форматирования
} else {
    echo "<p>Файл данных не найден.</p>";
}
?>