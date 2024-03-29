<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <!--  проходим по массиву $categories и заменяем назвагие проектов -->
                <?php foreach($categories as $value):?>
                    <li class="main-navigation__list-item">
                        <a class="main-navigation__list-item-link" href="#"><?=$value?></a>
                        <span class="main-navigation__list-item-count"><?=count_categories ($categories_list, $value) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button"
        href="pages/form-project.html" target="project_add">Добавить проект</a>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="post" autocomplete="off">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <nav class="tasks-switch">
                <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                <a href="/" class="tasks-switch__item">Повестка дня</a>
                <a href="/" class="tasks-switch__item">Завтра</a>
                <a href="/" class="tasks-switch__item">Просроченные</a>
            </nav>

            <label class="checkbox">
                <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks): ?>checked<?php endif;?>>
                <span class="checkbox__text">Показывать выполненные</span>
            </label>
        </div>

        <table class="tasks">
            <!-- проходим по массиву и заменяем содержимое таблицы на содержание массива $categories_list-->
            <?php foreach($categories_list as $key => $value):?>
                <!-- если условие выполняется показываем задачу -->
                <?php if (($value['done'] == false) && ($show_complete_tasks == 0)):?>
                    <!-- Если у задачи статус «выполнен», то строке с этой задачей добавить класс "task--completed". -->
                    <!-- если оставшееся время меньше 24 часов добавляем класс task--important-->
                    <tr class="tasks__item task <?php if ($value['done']): ?>task--completed<?php endif ?>
                        <?php if (is_important_task($value["date"])): ?>task--important<?php endif ?>
                        ">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                <span class="checkbox__text"><?=$value['task'];?></span>
                            </label>
                        </td>
                        <td class="task__file">
                            <a class="download-link" href="#">Home.psd</a>
                        </td>
                        <td class="task__date"><?=$value['date'];?></td>
                    </tr>
                <?php else: ?>
                    <?php if  ($show_complete_tasks):?>
                        <tr class="tasks__item task <?php if ($value['done']): ?>task--completed<?php endif ?>
                                <?php if (is_important_task($value["date"])): ?>task--important<?php endif ?>">
                            <td class="task__select">
                                <label class="checkbox task__checkbox">
                                    <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                    <span class="checkbox__text"><?=$value['task'];?></span>
                                </label>
                            </td>
                            <td class="task__file">
                                <a class="download-link" href="#">Home.psd</a>
                            </td>
                            <td class="task__date"><?=$value['date'];?></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </main>
</div>
</div>
</div>
