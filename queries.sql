INSERT INTO project (name, user_id)
VALUES ('Входящие', 1), ('Учеба', 5), ('Работа',2), ('Домашние дела',1), ('Авто',3);

INSERT INTO task (date_create, is_done, file_link, name, date_done, user_id, project_id) VALUES
('11.09.2019', 0, null, 'Собеседование в IT компании', '01.12.2019', 1, 3),
('11.08.2019', 0, null, 'Выполнить тестовое задание', '25.12.2019', 2, 3),
('13.08.2019', 1, null, 'Сделать задание первого раздела', '21.12.2019', 3, 2),
('06.06.2019', 0, null, 'Встреча с другом', '22.11.2019', 4, 1),
('06.06.2019', 0, null, 'Купить корм для кота', null, 5, 4),
('07.06.2019', 0, null, 'Заказать пиццу', null, 5, 4);


INSERT INTO user (date_reg, email, name, password) VALUES
('02.11.2019', 'mgh09@gmail.com', 'Михаил', 'bhuiho'),
('01.10.2017', 'Vas90@mail.com', 'Василий', '12344556667'),
('09.07.2018', 'alex07@gmail.com', 'Алексей', 'gbdgfsg'),
('22.01.2018', 'sanek89@gmail.com', 'Александр', 'cedfa3213'),
('29.05.2018', 'grigoriiivanov@gmail.com', 'Григорий', '321312fes344r3');

--список из всех проектов для одного пользователя;
SELECT * FROM project WHERE user_id = 1 ;

-- список из всех задач для одного проекта
SELECT * FROM task WHERE project_id = 1;

-- пометили задачу c id = 1 как выполненную
UPDATE task SET is_done = TRUE WHERE id = 1;

-- обновили название задачи c id = 1
UPDATE task SET name = 'Сделать что-нибудь' WHERE id = 1;
