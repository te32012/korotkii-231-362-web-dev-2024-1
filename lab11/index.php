
<?php
 

function outNumAsLink( $x ) // функция ВЫВОДИТ ЧИСЛО КАК ССЫЛКУ
{
    if( $x<=9 ){
        echo '<a href="?content='.$x;
        if( isset($_GET['html_type']) ) // если параметр content был передан в скрипт
            echo '&html_type='.$_GET['html_type']; // добавляем в ссылку второй параметр
        echo '"> '.$x.'</a>';
    }
    else
        echo $x;
}
 
function outTableForm($number)
{
    echo "<table border='1'>";
    for ($i = 2; $i <= 9; $i++) {
        echo "<tr>";
        echo "<td>";
        echo outNumAsLink($number);
        echo "</td>";
        echo "<td>x</td>";
        echo "<td>";
        echo outNumAsLink($i);
        echo "</td>";
        echo "<td>=</td>";
        $product = $number * $i;
        echo "<td>";
        echo outNumAsLink($product);
        echo"</td>";
        echo "</tr>";
    }
    echo "</table>";
} 

function outDivForm ($number)
{
    echo "<div style='display: flex; flex-wrap: wrap;width: 100px;'>";
    for ($i = 2; $i <= 9; $i++) {
        echo "<div style='width: 80px; border: 1px solid #000; padding: 5px;'>";
        echo "<p>";
        echo outNumAsLink($number);
        echo "<a> x </a>";
        echo outNumAsLink($i);
        echo "<a> = </a>";
        $product = $number * $i;
        echo outNumAsLink($product);
        echo "</p>";
        echo "</div>";
    }
    echo "</div>";
    
} 

?><html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Короткий Иван Михайлович 239-362 - lab11</title>   
</head>
<body>
    
    <header>
        <img src="mospolytech_logo_white.png" alt="Логотип">
        <nav>
        <?php 
            $selectedNumber = isset($_GET['content']) ? 'content='.$_GET['content'] : '';
            $selectType = isset($_GET['html_type']) ? $_GET['html_type'] : '';
        ?>
        <a href="?html_type=TABLE<?= '&'.$selectedNumber?>" class="<?= ($selectType == 'TABLE') ? 'selected' : '' ?>">Табличная верстка</a>
        <a href="?html_type=DIV<?= '&'.$selectedNumber?>" class="<?= ($selectType == 'DIV') ? 'selected' : '' ?>">Блочная верстка</a>
        </nav>
    </header>
    <div class="container">
    <aside>
    <?php
            if( isset($_GET['html_type']) ) // если параметр content был передан в скрипт
                echo '<a href="?html_type='.$_GET['html_type'].'"'; // добавляем в ссылку второй параметр
            else
                echo '<a href="/"'; // начало ссылки ВСЯ ТАБЛИЦА УМНОЖНЕНИЯ

            if( !isset($_GET['content']) ) // если в скрипт НЕ был передан параметр content
                echo ' class="selected"'; // ссылка выделяется через CSS-класс
            echo '>Вся таблица умножения</a><br>'; // конец ссылки
            for( $i=2; $i<=9; $i++ ) // цикл со счетчиком от 2 до 9 включительно
            {
                echo '<a href="?content='.$i; // начало ссылки
                if( isset($_GET['html_type']) ) // если параметр content был передан в скрипт
                    echo '&html_type='.$_GET['html_type']; // добавляем в ссылку второй параметр
                echo '" ';
                // если в скрипт был передан параметр content
                // и параметр равен значению счетчика
                if( isset($_GET['content']) && $_GET['content']==$i )
                    echo ' class="selected"'; // ссылка выделяется через CSS-класс
                echo '>Таблица умножения на ';
                echo $i.'</a><br>'; // конец ссылки
            }
        ?>
    </aside>
    <main>
        
        <?php
            if (!isset($_GET['html_type']) || $_GET['html_type']== 'TABLE' ){
                if( !isset($_GET['content']) ){
                    for($number=2; $number<=9; $number++){outTableForm($number);}
                }
                else{outTableForm(intval($_GET['content']));}
            }
            else{
                if( !isset($_GET['content']) ){
                    for($number=2; $number<=9; $number++){outDivForm($number);}
                }
                else{outDivForm(intval($_GET['content']));}
            }
        ?>
    </main>
    </div>

    

    <footer>
        <?php
            if( !isset($_GET['html_type']) || $_GET['html_type']== 'TABLE' )
                $s='Табличная верстка. '; // строка с информацией
            else
                $s='Блочная верстка. ';
            if( !isset($_GET['content']) )
                $s.='Таблица умножения полностью. ';
            else
                $s='Столбец таблицы умножения на '.$_GET['content']. '. ';
            echo $s.'<br>'.date('d.Y.M h:i:s'); 
        ?>
    </footer>
</body>
</html>