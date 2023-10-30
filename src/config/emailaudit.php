<?php

return [
    "db_connection" => env("EMAIL_AUDIT_TABLE_CONNECTION", "oracle_without_prefix"),
    "app_name_field"=> env("EMAIL_AUDIT_APP_NAME_FIELD", config("app.name")),
];