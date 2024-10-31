<?php
    include 'header.html';
    include "db.php";
?>
<!doctype html>
<html>

<body>   
    <main>
        <div class="wrapper">
            <div class="table">
                <?php
                
                $sql = "SELECT name, characteristics FROM terms";
                $result = $mysql->query($sql);

                if ($result->num_rows > 0) {
                    
                    echo "<table><tr><th>Имя</th><th>Описание</th>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["name"]."</td><td>".$row["characteristics"]."</td></tr>";
                    }
                    echo "</table>";
                }
                    
                ?> 
            </div> 
        </div>
    </main>
<footer>
    <div style="text-align:left">Сформировано <?=date('d.m.Y в H-i:s')?></div>
</footer>
</body>
 
</html>