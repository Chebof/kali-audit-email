# Kali audit email

Store laravel app generated mail copy to database

### Install
```sh
composer require igchebof/kali-audit-email
```

### Publish config

Выполнить ```php artisan vendor:publish``` и выбрать ```Kali\AuditEmail\Providers\AuditEmailProvider```

### Env variables
EMAIL_AUDIT_ENABLED - включен ли аудит, bool значение. По дефолту true.

EMAIL_AUDIT_TABLE - название таблицы в модели аудита.

EMAIL_AUDIT_TABLE_CONNECTION - подключение к бд в модели аудита. Указываем подключение без перефикса.

EMAIL_AUDIT_APP_NAME_FIELD - значение идентификатора приложения, которое будет в базе. По дефолту .env APP_NAME.

EMAIL_AUDIT_SHOULD_QUEUE - флаг выполниния обрабротчика событий в очереди. По дефолту false.

## Tests
```sh
composer test
```