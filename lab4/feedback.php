<?php
include 'header.html';
?>
<?php
    if (isset($_GET['N'])) {$name =$_GET['N'];} else {$name='';}
    if (isset($_GET['E'])) {$email =$_GET['E'];} else {$email='';}
    if (isset($_GET['S'])) {$source =$_GET['S'];} else {$source='';}

?>
<!doctype html>
<html>

<body>
    <main>
        <div class="cell_fb">     
            <h1>Форма обратной связи</h1>
            <form action="home.php" method="POST">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" value="<?=$name ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?=$email ?>" required><br><br>

            <label>Откуда узнали о нас:</label>
                <label for="radio1">
                <input type="radio" name="source" id="advertising" value="advertising" <?php if ($source == 'advertising') echo "checked" ?>> Интернет
                </label>
                <label for="radio2">
                <input type="radio" name="source" id="friends" value="friends" <?php if ($source == 'friends') echo "checked" ?>> От друзей
                </label><br><br>

            <label for="type">Тип обращения:</label>
            <select id="type" name="category">
                <option value="complaint">Жалоба</option>
                <option value="propose">Предложение</option>
            </select><br><br>

            <label for="message">Cообщение:</label>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <label for="attachment">Вложения:</label>
            <input type="file" id="attachment" name="attachment"><br><br>

            <input type="checkbox" id="consent" name="consent" value="yes">
            <label for="consent">Даю согласие на обработку персональных данных</label><br><br>

            <button class="btn" type="submit">Отправить</button>
            </form>
            </div>  
    </main>
<footer>
    <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
</footer>
</body>

</html>