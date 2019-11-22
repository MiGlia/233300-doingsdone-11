<?php

function get_categories($con, $user_id) {
    // выбор id, name из таблицы project
    $sql = "SELECT `id`, `name` FROM project WHERE `user_id` = 1";

    //  получаем объект результата запроса
    $result = mysqli_query($con, $sql);

    // Обработка ошибок
    if (!$result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
} else {

    // Преобразуем объект результата в массив
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
    return $categories;
};

function get_tasks($con, $user_id) {
        $sql = "SELECT `id`, `date_create`, `is_done`, `file_link`, `name`, `date_done`, `user_id`, `project_id` FROM task  WHERE `user_id` = $user_id";
        $result = mysqli_query($con, $sql);
        // Обработка ошибок
        if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
    } else {

        // Преобразуем объект результата в массив
        $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
        return $task_list;
};
