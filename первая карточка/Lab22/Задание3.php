<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вывод имени и фамилии</title>
</head>
<body>

    <h2>Вывод Фамилии и Имени</h2>

    <?php
    // Укажите свой номер варианта (n)
    $n = 18;

    // Вычисляем, сколько раз вывести (n + 5)
    $count = $n + 5;

    // Фамилия и Имя
    $surname = "Стручинский";
    $name = "Игорь";

    // Выводим n+5 раз с помощью цикла for
    for ($i = 1; $i <= $count; $i++) {
        echo "<p>$i. $surname $name</p>";
    }
    ?>

</body>
</html>
