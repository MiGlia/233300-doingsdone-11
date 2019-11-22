<?php

//функциz mysqli_connect, чтобы выполнить подключение к MySQL
$con = mysqli_connect("localhost", "root", "","doingsdone");
// // Установка кодировки
mysqli_set_charset($con, "utf8");


// Обработка ошибок
if ($con === false ) {
    print ("Ошибка подключения: " . mysqli_connect_error());
};

// $categories = [];
// $content = '';
