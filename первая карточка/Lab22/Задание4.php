<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сортировка массива</title>
</head>
<body>

    <h2>Введите 7 целых чисел</h2>

    <form method="post">
        <?php
        for ($i = 0; $i < 7; $i++) {
            echo "Число " . ($i + 1) . ": <input type='text' name='numbers[]' required><br>";
        }
        ?>
        <br>
        <input type="submit" name="sort" value="Сортировать">
    </form>

    <?php
    if (isset($_POST['sort'])) {
        $numbers = $_POST['numbers'];
        $valid = true;

        // Проверяем, что все введённые данные — целые числа
        foreach ($numbers as $num) {
            if (!ctype_digit($num) && (!is_numeric($num) || intval($num) != $num)) {
                $valid = false;
                break;
            }
        }

        if ($valid) {
            // Преобразуем в целые числа и сортируем по убыванию
            $numbers = array_map('intval', $numbers);
            rsort($numbers);

            echo "<h3>Отсортированный массив (по убыванию):</h3>";
            echo "<p>" . implode(", ", $numbers) . "</p>";
        } else {
            echo "<p style='color:red;'>Ошибка! Введите только целые числа.</p>";
        }
    }
    ?>

</body>
</html>
