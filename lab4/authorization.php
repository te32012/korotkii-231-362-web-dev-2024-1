<?php
include 'header.html';
?>
<?php
    $login='ddd';
    $password='010101';
?>
<!doctype html>
<html>
<body>  
    <main>
        <div class="wrapper">
            <div class="cell_at">
                <h1>Авторизация</h1>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <label for="login">Логин:</label>
                    <input type="text" id="login" name="login" required><br><br>
            
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="checkbox" id="rememberme" name="rememberme" value="yes">
                    <label for="rememberme">Запомнить меня</label><br><br>

                    <button class="btn" type="submit">Войти</button>
                    <?php if (isset($_POST['login']) & isset($_POST['password'])) {if ($_POST['login'] == $login & $_POST['password'] == $password) echo "<p style='margin-top: 10px'>Авторизация прошла успешно!</p>";} ?>
                </form> 
            </div> 
        </div>
    </main>
<footer>
    <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
</footer>
</body>

</html>