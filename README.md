### Install

# sql
create DATABASE itlogia

# terminal
composer update
yii rbac/init


### Vhost

<VirtualHost 127.0.0.1:80>
    ServerName itlogia
    ServerAlias 127.0.0.1
    DocumentRoot "/var/www/html/itlogia/web"

    ErrorLog "/var/log/itlogia/logs/error.log"
    CustomLog "/var/log/itlogia/logs/access.log" common
</VirtualHost>