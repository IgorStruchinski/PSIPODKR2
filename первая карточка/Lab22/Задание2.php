<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Периметр квадрата</title>
</head>
<body>

    <h2>Вычисление периметра квадрата</h2>

    <form method="post">
        <label for="side">Введите сторону квадрата (a):</label>
        <input type="number" name="side" id="side" required>
        <button type="submit">Рассчитать</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = floatval($_POST["side"]);

        if ($a > 0) {
            $perimeter = 4 * $a;
            echo "<p>Периметр квадрата: <strong>$perimeter</strong></p>";
        } else {
            echo "<p style='color: red;'>Ошибка: введите положительное число.</p>";
        }
    }
    ?>

</body>
</html>
