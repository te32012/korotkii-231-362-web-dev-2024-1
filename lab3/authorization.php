<?php
$title = 'Короткий Иван Михайлович л-3';
$array = array('Маруся', 'Люча', 'Хонг', 'Расл');
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>
  
<body>
    <header>
        <nav>
            <ul>
            <li>
                <a href="<?php
                    $name = 'Главная';
                    $link = 'index.php';
                    $current_page = false;

                    echo $link;

                    ?>">
                    <?php
                    if ($current_page) {
                        echo '<span class="selected_menu">' . $name . '</span>';
                    } else {
                        echo $name;
                    }
                    ?>
                </a>
            </li>
           
            <li>
                <a href="<?php
                    $name = 'Обратная связь';
                    $link = 'feedback.php';
                    $current_page = false;

                    echo $link;

                    ?>">
                    <?php
                    if ($current_page) {
                        echo '<span class="selected_menu">' . $name . '</span>';
                    } else {
                        echo $name;
                    }
                    ?>
                </a>
            </li>
            <li>
                <a href="<?php
                    $name = 'Вход';
                    $link = 'authorization.php';
                    $current_page = true;

                    echo $link;

                    ?>">
                    <?php
                    if ($current_page) {
                        echo '<span class="selected_menu">' . $name . '</span>';
                    } else {
                        echo $name;
                    }
                    ?>
                </a>
            </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="wrapper">
            <div class="cell_at">
                <h1>Авторизация</h1>
                <form action="https://httpbin.org/post" method="POST" enctype="multipart/form-data">
                    <label for="login">Логин:</label>
                    <input type="text" id="login" name="login" required><br><br>
            
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="checkbox" id="rememberme" name="rememberme" value="yes">
                    <label for="rememberme">Запомнить меня</label><br><br>

                    <button type="submit">Войти</button>
                </form> 
            </div> 
        </div>
    </main>
    <footer>
        <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
    </footer>
</body>
</html>