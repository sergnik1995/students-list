Список студентов
======
Реализация списка студентов и их регистрация с помощью PHP 7.2.8.0 и MariaDB 10.1.34.

Необходимо
------
1. Наличие веб-сервера настроенного для использования с PHP >= 7.0.
2. Наличие сервера MySQL.

Установка
------
1. Переместить папки и файлы из public в рабочую директорию веб-сервера.
2. Остальные папки и файлы переместить в директорию выше рабочей папки веб-сервера.
3. Править [/app/dbConfig.ini](/app/dbConfig.ini) для работы с вашей базой данных.
4. Загрузить [таблицу](students.sql) в вашу базу данных или создать новую по ее примеру (имя таблицы обязательно должно быть students).

Особенности использования
------
В проекте есть возможность регистрации и редактирования данных, но нет отдельной формы входа 
поэтому пользователь не имеет возможности зайти в свой аккаунт на другом устройстве или после чистки куки.