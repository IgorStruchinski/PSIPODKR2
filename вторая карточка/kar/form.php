<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказ бесплатного звонка</title>
</head>
<body>
    <h2>Заказать бесплатный звонок</h2>
    <form action="process.php" method="POST">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Телефон:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="comment">Комментарий:</label>
        <textarea id="comment" name="comment"></textarea><br><br>

        <input type="submit" value="Заказать звонок">
    </form>
</body>
</html>
