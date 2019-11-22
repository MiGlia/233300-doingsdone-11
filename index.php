<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
require_once('helpers.php');
require_once('init.php');
require_once('function.php');

$categories = get_categories($con, 4);
$task_list =  get_tasks($con, 4);

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
     'task_list' => $task_list
 ]
);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Дела в порядке'
]
);

print($layout_content);

?>
