INSERT INTO project (name)
VALUES ('Входящие'), ('Учеба'), ('Работа'), ('Домашние дела'), ('Авто');
INSERT INTO project (user_id)
VALUES (null), (null), (null), (null), (null), (null);


INSERT INTO task (date_create)
VALUES (null), (null), (null), (null), (null), (null);
INSERT INTO task (is_done)
VALUES (null), (null), (null), (null), (null), (null);
INSERT INTO task (file_link)
VALUES (null), (null), (null), (null), (null), (null);
INSERT INTO task (name)
VALUES ('Собеседование в IT компании'), ('Выполнить тестовое задание'), ('Сделать задание первого раздела'), ('Встреча с другом'), ('Купить корм для кота'), ('Заказать пиццу');
INSERT INTO task (date_done)
VALUES ('01.12.2019'), ('25.12.2019'), ('21.12.2019'), ('22.11.2019'), (null), (null);
INSERT INTO task (user_id)
VALUES (null), (null), (null), (null), (null), (null);
INSERT INTO task (project_id)
VALUES ('3'), ('3'), ('2'), ('1'), ('4'), ('4');


INSERT INTO user (date_reg)
VALUES ('02.11.2019'), ('01.10.2017'), ('09.07.2018'), ('22.01.2018'), ('29.05.2018');
INSERT INTO user (email)
VALUES ('mgh09@gmail.com'), ('Vas90@mail.com'), ('alex07@gmail.com'), ('sanek89@gmail.com'), ('grigoriiivanov@gmail.com');
INSERT INTO user (name)
VALUES ('Михаил'), ('Василий'), ('Алексей'), ('Александр'), ('Григорий');
INSERT INTO user (password)
VALUES ('bhuiho'), ('12344556667'), ('gbdgfsg'), ('cedfa3213'), ('321312fes344r3');

--список из всех проектов для одного пользователя;
SELECT * FROM project WHERE user_id = 1 ;

-- список из всех задач для одного проекта
SELECT * FROM task WHERE project_id = 1;

-- пометили задачу c id = 1 как выполненную
UPDATE task SET is_done = TRUE WHERE id = 1;

-- обновили название задачи c id = 1
UPDATE task SET name = 'Сделать что-нибудь' WHERE id = 1;
