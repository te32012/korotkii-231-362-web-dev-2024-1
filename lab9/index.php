<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Короткий Иван Михайлович 239-362 - lab9</title>   
</head>

<body>
    
    <header>
        <img src="mospolytech_logo_white.png" alt="Логотип">
    </header>

    <main>
        <?php
            $initialArgument = -100; 
            $numOfValues = 100;
            $maxValue = 1000000;
            $minValue = -100; 
            $type = 'B';

            function calculateFunction($x) {
                if ($x <= 10 && $x != 5){
                    return (5 - $x) / (1 - $x / 5);
                }
                else if ($x > 10 && $x < 20){
                    return $x * $x / 4 + 7;
                }
                else if($x>=20){
                    return 2 * $x - 21;
                }
                else{
                    return 'error';
                }
            }

            $arguments = [];
            $values = [];
            $currentArgument = 0;

            $output = '';
            $tableData = '<table border="1">';

            
            for ($i = $initialArgument; $i < $numOfValues; $i++) {
                $functionValue = calculateFunction($i);
                if($functionValue!='error'){
                    $functionValue = round(num: $functionValue, precision: 3);
                }
                $arguments[$i] = $arguments;
                $values[$i] = $functionValue;

                //if($functionValue>=$maxValue || $functionValue<$minValue ){	// если вышли за рамки диапазона
                //    break;	// закончить цикл досрочно
                //}
                //else if ($type == 'A') {
                //    $output .= "f($i)=$functionValue<br>";
                //}
                elseif ($type == 'B') {
                    $output .= "<li>f($i)=$functionValue</li>";
                }
                elseif ($type == 'C') {
                    $output .= "<li>f($i)=$functionValue</li>";
                } 
                elseif ($type == 'D') {
                    if (count($arguments) === 1) {
                        $tableData .= '<tr>';
                        $tableData .= '<th>Аргумент</th><th>Значение функции</th>';
                        $tableData .= '</tr>';
                    }
                    $tableData .= '<tr>';
                    $tableData .= "<td>{$i}</td><td>{$functionValue}</td>";
                    $tableData .= '</tr>';
                }
                elseif ($type == 'E') {
                    $output .=  "<div>f($i)=$functionValue</div><br>";
                }
            }
            
            if ($type == 'B') {
                $output = "<ul>$output</ul>";
            }
            if ($type == 'C') {
                $output = "<ol>$output</ol>";
            }
            if ($type == 'D') {
                $tableData .= '</table>';
                $output .= $tableData;
            }
            
            
            echo $output;

            if (in_array('error', $values, true)) {
                $values = array_diff($values, ['error']);
            }
            $max = max($values);
            $min = min($values);
            $average = round(array_sum($values) / count($values), 3);
            $sum = array_sum($values);

            echo "<p>Максимальное значение: $max</p>";
            echo "<p>Минимальное значение: $min</p>";
            echo "<p>Среднее арифметическое: $average</p>";
            echo "<p>Сумма всех значений: $sum</p>";
        ?>
    </main>

    <footer>
    </footer>
</body>
</html>