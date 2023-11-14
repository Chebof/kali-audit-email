<?php

return [
    /**
     * turn on/off auditing
     */
    "audit_enabled" => env("EMAIL_AUDIT_ENABLED", true),

    // db connection in audit model
    "db_connection" => env("EMAIL_AUDIT_TABLE_CONNECTION", "oracle_without_prefix"),

    // table name in audit model
    "table" => env("EMAIL_AUDIT_TABLE", "ac_email_audits"),

    // application name field in audit model
    "app_name_field" => env("EMAIL_AUDIT_APP_NAME_FIELD", env("APP_NAME", "default")),

    // should audit listener work in queue 
    "should_queue" => env("EMAIL_AUDIT_SHOULD_QUEUE", false),

    // queue listener connection
    "queue_connection" => env("EMAIL_AUDIT_QUEUE", env("QUEUE_CONNECTION", "sync")),
];