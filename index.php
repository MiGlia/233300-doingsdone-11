<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
// Массивы
$categories = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];
$categories_list = [
    [
        'task' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'categories' => 'Работа',
        'done' => false
    ],
    [
        'task' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'categories' => 'Работа',
        'done' => false
    ],
    [
        'task' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'categories' => 'Учеба',
        'done' => true
    ],
    [
        'task' => 'Встреча с другом',
        'date' => '22.12.2019',
        'categories' => 'Входящие',
        'done' => false
    ],
    [
        'task' => 'Купить корм для кота',
        'date' => null,
        'categories' => 'Домашние дела',
        'done' => false
    ],
    [
        'task' => 'Заказать пиццу',
        'date' => null,
        'categories' => 'Домашние дела',
        'done' => false
    ]

];

// функция для подсчета количества проектов
function count_categories($task_list, $project) {
    $count = 0;
    foreach ($task_list as $val) {
        if ($val["categories"] == $project) {
            $count++;
        }
    }
    return $count;
}

require_once('helpers.php');

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
