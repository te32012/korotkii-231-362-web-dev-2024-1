<?php
$array = array('Маруся', 'Люча', 'Хонг', 'Расл');
?>
<?php
include 'header.html';
?>
<!doctype html>
<html>

<body>   
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