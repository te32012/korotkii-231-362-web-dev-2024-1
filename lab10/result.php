<?php
    include 'header.html';
?>
<?php

function test_it( $text )
{
    
    // определяем ассоциированный массив с цифрами
    $cifra=array( '0'=>true, '1'=>true, '2'=>true, '3'=>true, '4'=>true,
    '5'=>true, '6'=>true, '7'=>true, '8'=>true, '9'=>true );
    // вводим переменные для хранения информации о:
    $cifra_amount=0; // количество цифр в тексте
    // определяем ассоциированный массив с знаками препинания
    $punctuation=array('.'=>true, ','=>true, ';'=>true, ':'=>true, '/'=>true, '?'=>true, '!'=>true, '-'=>true, '('=>true, ')'=>true, '"'=>true, "'"=>true);
    $punctuation_amount=0;
    $letter_amount=0;
    $word_amount=0; // количество слов в тексте
    $word=''; // текущее слово
    $words=array(); // список всех слов
    for($i=0; $i<strlen($text); $i++) // перебираем все символы текста
    {
        if( array_key_exists($text[$i], $cifra) ) // если встретилась цифра
            $cifra_amount++; // увеличиваем счетчик цифр
        elseif( array_key_exists($text[$i], $punctuation) ) // если встретился знак препинания
            $punctuation_amount++; // увеличиваем счетчик знаков препинания
        // если в тексте встретился пробел или текст закончился
        elseif($text[$i]!=' '){
            $letter_amount++;
        }
        if( $text[$i]==' ' || $i==strlen($text)-1 )
        {
            if( $word ) // если есть текущее слово
            {
                // если текущее слово сохранено в списке слов
                if( isset($words[$word]) )
                    $words[ $word ]++; // увеличиваем число его повторов
                else
                    $words[ $word ]=1; // первый повтор слова
            }
            $word=''; // сбрасываем текущее слово
        }
        else // если слово продолжается
            $word.=$text[$i]; //добавляем в текущее слово новый символ
    }



    // количество символов в тексте определяется функцией размера текста
    echo 'Количество символов: '.strlen($text).'<br>';
    // выводим количество букв в тексте
    echo 'Количество букв: '.$letter_amount.'<br>';
    $text_r = iconv("cp1251", "utf-8", $text);
    // количество заглавных букв
    echo 'Количество заглавных букв: '.mb_strlen( preg_replace('/[^A-ZА-ЯЁ]/u', '', $text_r), 'UTF-8').'<br>';
    // количество строчных букв
    echo 'Количество строчных букв: '.mb_strlen( preg_replace('/[^a-zа-яё]/u', '', $text_r), 'UTF-8').'<br>';
    // выводим количество знаков препинания в тексте
    echo 'Количество знаков препинания: '.$punctuation_amount.'<br>';
    // выводим количество цифр в тексте
    echo 'Количество цифр: '.$cifra_amount.'<br>';
    // выводим количество слов в тексте
    echo 'Количество слов: '.count($words).'<br>';

    $l_text=mb_strtolower( $text ); // переводим текст в нижний регистр
    $array_text_l=test_symbs($l_text);
    foreach ($array_text_l as $key => $value) {
        echo '<p>'.iconv("cp1251", "utf-8", $key).': '.$value.'</p>';
    }
    echo 'Слова:<br>';
    // непосредственно перед выводом перекодируем строку обратно в UTF-8
    foreach($words as $key => $value){
        $key=iconv("cp1251", "utf-8", $key);
    }
    ksort($words);
    foreach($words as $key => $value){
        echo '<p>'.iconv("cp1251", "utf-8", $key).': '.$value.'</p>';
    }
}

function test_symbs( $text )
{
    $symbs=array(); // массив символов текста

    // последовательно перебираем все символы текста
    for($i=0; $i<strlen($text); $i++)
    {
        if( isset($symbs[$text[$i]]) ) // если символ есть в массиве
            $symbs[$text[$i]]++; // увеличиваем счетчик повторов
        else // иначе
            $symbs[$text[$i]]=1; // добавляем символ в массив
    }
    return $symbs; // возвращаем массив с числом вхождений символов в тексте
} 
?>
<body>
    <main>
        <?php
        if( isset($_POST['data']) && $_POST['data'] ) // если передан текст для анализа
        {
            echo '<p>'.$_POST['data'].'</p><br>'; // выводим текст
            test_it( iconv("utf-8", "cp1251",$_POST['data']) ); 
        }
        else // если текста нет или он пустой
            echo '<div class="src_error">Нет текста для анализа</div>'; // выводим ошибку
        
        echo '<a href="index.php" class="btn">Другой анализ</a>';
        ?>
    </main>
    <footer>
    </footer>
</body>
</html>