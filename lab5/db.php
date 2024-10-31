<?php 
    define('DB_HOST', 'mysql'); //Адрес
    define('DB_USER', 'root'); //Имя пользователя
    define('DB_PASSWORD', 'admin'); //Пароль
    define('DB_NAME', 'lab5'); //Имя БД
    $mysql = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_set_charset($mysql, 'utf8mb4');
?>