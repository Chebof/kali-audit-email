# Kali audit email

Store laravel app generated mail copy to database

### Install
```sh
composer require igchebof/kali-audit-email
```

### Publish config

Выполнить ```php artisan vendor:publish``` и выбрать ```Kali\AuditEmail\Providers\AuditEmailProvider```

### Env variables

EMAIL_AUDIT_TABLE_CONNECTION - подключение к бд в модели аудита. Указываем подключение без перефикса.
EMAIL_AUDIT_APP_NAME_FIELD - значение идентификатора приложения, которое будет в базе. По дефолту APP_NAME

## Tests
```sh
composer test
```