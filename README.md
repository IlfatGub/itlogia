# Install

### sql
~~~
create DATABASE itlogia
~~~
### terminal
~~~
composer update
yii rbac/init
~~~



# Vhost
~~~
<VirtualHost 127.0.0.1:80>
    ServerName itlogia
    ServerAlias 127.0.0.1
    DocumentRoot "/var/www/html/itlogia/web"

    ErrorLog "/var/log/itlogia/logs/error.log"
    CustomLog "/var/log/itlogia/logs/access.log" common
</VirtualHost>
~~~


# Databases
user – таблица с пользователями

lesson – таблица с уроками

study – таблица с пройденными уроками пользователя


# site map

site.ru/site/login - Вход

site.ru/site/signup - Самостоятельная регистрация

site.ru/lesson -  Уроки. CRUD

site.ru/user -  Пользователи. CRUD

site.ru/rbac/assignment - Предоставление ролей пользователям

site.ru/rbac/role - Создание ролей

Управление доступом осуществляется через роли.

Роли создаются автоматически. При инициализации(yii rbac/init)