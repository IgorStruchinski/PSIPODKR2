<?php
session_start(); // Начинаем сессию

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $comment = htmlspecialchars($_POST['comment']);

    // Сохраняем данные в сессии
    $_SESSION['phone'] = $phone;
    $_SESSION['comment'] = $comment;

    // Форматируем данные для записи в файл
    $data = "Телефон: $phone\nКомментарий: $comment\n\n";

    // Записываем данные в файл 1.txt
    file_put_contents('1.txt', $data, FILE_APPEND);

    echo "Спасибо, $name! Ваш запрос успешно отправлен.";
    echo "<br><a href='page2.php'>Перейти на страницу 2</a>"; // Ссылка на страницу 2
} else {
    echo "Ошибка: неверный метод запроса.";
}
?>