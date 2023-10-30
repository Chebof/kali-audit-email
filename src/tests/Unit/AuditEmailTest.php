<?php

namespace Kali\AuditEmail\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Mail;

class AuditEmailTest extends TestCase
{
    public function test_send_mail()
    {
        Mail::raw('Hello World!', function ($msg)
        {
            $msg->to('test-biba@test.com')->subject('Test Email'); 
        });

        $this->assertDatabaseHas('ac_email_audits', [
            'to_email' => 'test-biba@test.com',
            'subject' => 'Test Email',
        ]);
    }

}