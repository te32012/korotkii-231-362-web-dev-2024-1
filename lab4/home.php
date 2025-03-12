<?php
include 'header.html';
?>
<!doctype html>
<html>

<body>
    <main>
        <div class="cell_fb">
            <h1>Форма обратной связи</h1>
            <?php  
            echo '<p> Здравствуйте, '.$_POST['name'].'</p>'; //выводим ФИО
            if ($_POST['category'] == 'propose'){ //проверяем тип обращения
                    echo '<p>Спасибо за ваше предложение:</p>';
                    echo '<p>'.$_POST['message'].'</p>';//вывод текста сообщения
            }else{
                    echo '<p>Мы рассмотрим Вашу жалобу:</p>';
                    echo '<p>'.$_POST['message'].'</p>';
            }
            ?>
            <br>
            <?php
            if (isset($_POST['attachment']) & $_POST['attachment'] != '') echo 'Вы приложили следующий файл: '.$_POST['attachment'];
            ?>
            <br><br>
            <button class="btn">
            <?php
            echo '<a href="feedback.php?N='.$_POST['name'].'&E='.$_POST['email'].'&S='.$_POST['source'].'">Заполнить снова</a>';
            ?>
            </button>
        </div>  
    </main>
<footer>
    <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
</footer>
</body>

</html>