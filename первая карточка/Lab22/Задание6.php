<?php
function calculateFormula($x, $y) {
    // Проверка логарифма: log(275.18) должен быть определён
    if (log10(275.18) == 0) {
        throw new Exception("Ошибка: логарифм не может быть равен 0!");
    }

    // Проверка модуля (не может быть отрицательным под корнем)
    $absValue = abs($y + $x);
    if ($absValue < 0) {
        throw new Exception("Ошибка: подкоренное выражение sqrt не может быть отрицательным!");
    }

    // Проверка деления на ноль в tg(x) / sin(x + 2)
    if (sin($x + 2) == 0) {
        throw new Exception("Ошибка: деление на ноль при вычислении (tg(x) / sin(x+2))!");
    }

    // Вычисляем формулу
    $a = (((pow($x, 5) + $y * sqrt($absValue)) / log10(275.18)) - pow($x, $y)) + (tan($x) / sin($x + 2));

    return $a;
}

// Если форма отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST['x'];
    $y = $_POST['y'];

    // Проверка, что введены числа
    if (!is_numeric($x) || !is_numeric($y)) {
        echo "Ошибка: введите числовые значения!";
    } else {
        try {
            $result = calculateFormula($x, $y);
            echo "Результат вычислений: " . $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!-- HTML Форма для ввода x и y -->
<form method="post">
    <label>Введите X:</label>
    <input type="text" name="x" required>
    <br>
    <label>Введите Y:</label>
    <input type="text" name="y" required>
    <br>
    <button type="submit">Рассчитать</button>
</form>
