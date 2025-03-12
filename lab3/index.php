<?php
$title = 'Короткий Иван Михайлович 239-362';
$array = array('Маруся', 'Люча', 'Хонг', 'Расл');
$name = 'Главная';
$link = 'index.php';
$current_page = true;
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
                echo  ' ' .($n + 1) . '.' .' '. $row . "<br>";
            } ?>
           </p></div>
        
        <div class="image-container">
        <?php echo '<img src="cat'.(2).'.jpg" alt="My photo"'?>
        </div>
        <div class="image-container">
        <?php echo '<img src="cat'.(1).'.jpg" alt="My photo"'?>
        </div>
        

        
    </main>
    <footer>
        <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
    </footer>
</body>
 
</html>