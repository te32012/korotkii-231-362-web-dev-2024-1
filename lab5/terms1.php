<?php
    include 'header.html';
    include "db.php";
?>
<!doctype html>
<html>

<body>   
    <main>
        <?php
        
        $sql2 = "SELECT image, name FROM images"; 
            $result2 = $mysql->query($sql2);
            
            if ($result2->num_rows > 0) {
                
                while($row = $result2->fetch_assoc()) {
                    echo '<div style="display:inline-block; margin: 10px; padding: 20 px; text-align:center;">';
                    echo '<img src="'.$row['image'].'.jpg";'.' />';
                    echo '</div>';
                }
            }
            
        ?>  
    </main>
<footer>
    <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
</footer>
</body>
 
</html>
