Установка
------------

### Клонируем репозиторий

~~~
git clone git@github.com:ZveRN/test-comments.git
~~~

### Composer

Установить composer если его еще нет
~~~
sudo apt install composer
~~~

Установить зависимости
~~~
composer install
~~~

### Миграция

Изменить доступ к бд в файле
~~~
/config/db.php
~~~

Выполнить миграцию
~~~
php yii migrate
~~~

### Доступ к директориям

~~~
sudo chmod 777 web/assets
sudo chmod 777 web/img
~~~
