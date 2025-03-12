<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление термина</title>
</head>
<body>
    <h1>Добавить термин к изображению</h1>

    <form method="POST">
        <h2>Форма 1: Добавление термина к изображению 1</h2>
        <input type="hidden" name="id_image" value="1">
        <label for="termin1">Термин:</label>
        <input type="text" name="termin" id="termin1" required>
        <button type="submit" name="submit">Добавить</button>
    </form>

    <form method="POST">
        <h2>Форма 2: Добавление термина к изображению 2</h2>
        <input type="hidden" name="id_image" value="2">
        <label for="termin2">Термин:</label>
        <input type="text" name="termin" id="termin2" required>
        <button type="submit" name="submit">Добавить</button>
    </form>

    <?php
    // Подключение к базе данных
    $host = 'localhost';
    $db = 'lab5';
    $user = 'user'; // Укажи свое имя пользователя
    $pass = 'user'; // Укажи свой пароль

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Добавление нового термина к изображению
        if (isset($_POST['submit'])) {
            $id_image = $_POST['id_image'];
            $termin = $_POST['termin'];
            addTerm($id_image, $termin);
        }

    } catch (PDOException $e) {
        echo 'Ошибка подключения: ' . $e->getMessage();
    }

    // Функция добавления термина
    function addTerm($id_image, $termin) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO terms (id_image, termin) VALUES (?, ?)");
        $stmt->execute([$id_image, $termin]);
        echo "Термин '$termin' добавлен к изображению с ID '$id_image'! 🌟<br>";
    }
    ?>
</body>
</html>
