<?php

namespace Kali\AuditEmail\Models;

use Illuminate\Database\Eloquent\Model;

class EmailAudit extends Model
{
    public function __construct()
    {
        $this->connection = config("emailaudit.db_connection");
    }

    protected $table = 'ac_email_audits';

    protected $guarded = ["id"];
}
