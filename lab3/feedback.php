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
            <li>
                <a href="<?php
                    $name = 'Вход';
                    $link = 'authorization.php';
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
            </ul>
        </nav>
    </header>
    <main>
        <div class="cell_fb">
            <h1>Форма обратной связи</h1>
            <form action="https://httpbin.org/post" method="POST">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label>Откуда узнали о нас:</label>
            <input type="radio" id="internet" name="source" value="internet">
            <label for="internet">Интернет</label>
            <input type="radio" id="friends" name="source" value="friends">
            <label for="friends">От друзей</label><br><br>

            <label for="type">Тип обращения:</label>
            <select id="type" name="type">
            <option value="complaint">Жалоба</option>
            <option value="proposal">Предложение</option>
            </select><br><br>

            <label for="message">Cообщение:</label>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <label for="attachment">Вложения:</label>
            <input type="file" id="attachment" name="attachment"><br><br>

            <input type="checkbox" id="consent" name="consent" value="yes">
            <label for="consent">Даю согласие на обработку персональных данных</label><br><br>

            <button type="submit">Отправить</button>
            </form>
         </div>  
    </main>
    <footer>
        <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
    </footer>
</body>
</html>