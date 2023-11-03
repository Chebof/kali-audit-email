<?php

return [
    "audit_enabled" => env("EMAIL_AUDIT_ENABLED", true),
    "db_connection" => env("EMAIL_AUDIT_TABLE_CONNECTION", "oracle_without_prefix"),
    "table" => env("EMAIL_AUDIT_TABLE", "ac_email_audits"),
    "app_name_field"=> env("EMAIL_AUDIT_APP_NAME_FIELD", env("APP_NAME", "default")),
    "should_queue" => env("EMAIL_AUDIT_SHOULD_QUEUE", false),
];