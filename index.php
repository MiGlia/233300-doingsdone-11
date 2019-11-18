<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
require_once('helpers.php');

//функциz mysqli_connect, чтобы выполнить подключение к MySQL
$con = mysqli_connect("localhost", "root", "","doingsdone");

// Установка кодировки
mysqli_set_charset($con, "utf8");

// Обработка ошибок
if ($con === false ) {
    print ("Ошибка подключения: " . mysqli_connect_error());
}
else {
    print ("Соединение установлено:");
}

// выбор id, name из таблицы project
$sql = "SELECT id, name FROM project WHERE user_id = 1";

//  получаем объект результата запроса
$result = mysqli_query($con, $sql);

// Обработка ошибок
if (!$result) {
$error = mysqli_error($con);
print("Ошибка MySQL: " . $error);
}

// Преобразуем объект результата в массив
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// выбор  из таблицы task
$sql = "SELECT id, date_create, is_done, file_link, name, date_done, user_id, project_id FROM task  WHERE user_id = 1";

//  получаем объект результата запроса
$result = mysqli_query($con, $sql);

// Обработка ошибок
if (!$result) {
$error = mysqli_error($con);
print("Ошибка MySQL: " . $error);
}

// Преобразуем объект результата в массив
$categories_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

 // функция для подсчета количества проектов
function count_categories($task_list, $project) {
    $count = 0;
    foreach ($task_list as $val) {
        if ($val['project_id'] === $categories['id']) {
            $count++;
        }
    }
    return $count;
}

// функция считает оставшееся время и если оно меньше 24 то возвращает true
function is_important_task($date) {
    $sec_in_hours = 3600;
    $ts = time();
    $end_ts = strtotime($date);
    $ts_diff = $end_ts - $ts;
    $time = floor($ts_diff / $sec_in_hours);
    if ($date !== null && $time <= 24)
    {
        return true;
    }
};


 $page_content = include_template("main.php", [
     'show_complete_tasks' => $show_complete_tasks,
     'categories' => $categories,
     'categories_list' => $categories_list
 ]
);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Дела в порядке'
]
);

print($layout_content);

?>
