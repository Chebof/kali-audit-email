<?php

namespace Kali\AuditEmail\Models;

use Illuminate\Database\Eloquent\Model;

class EmailAudit extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = config("emailaudit.db_connection");
        $this->table = config("emailaudit.table");
    }

    protected $guarded = ['id'];
}
