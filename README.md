
composer update

create DATABASE itlogia

yii migrate

yii migrate/up --migrationPath=@yii/rbac/migrations

yii rbac/init