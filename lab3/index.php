<?php
$title = 'Короткий Иван Михайлович 231-362';
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
            <ul><li>
                <a href="<?php
                    $name = 'Главная';
                    $link = 'index.php';
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
       <div class="text">
        <h1>Кошачий приют "Забота"</h1>
           <p>Кошачий приют "Забота" дает дом для кошек, которые потеряли хозяев - наша миссия найти дом каждому питомцу:<br><br>
           <?php foreach ($array as $n => $row) {
                echo  ' ' .($n + 1) . '.' .' '. $row . "<br>\r\n";
            } ?>
           </p></div>
        
        <div class="image-container">
        <?php echo '<img src="cat'.(date('s')% 2 + 1).'.jpg" alt="My photo"'?>
        </div>
        
        
    </main>
    <footer>
        <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
    </footer>
</body>
 
</html>