<?php

namespace Kali\AuditEmail\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Kali\AuditEmail\Mail\TestMail;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Mail;

class AuditEmailTest extends TestCase
{
    use RefreshDatabase, WithWorkbench;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app)
    {
        return [
            'Kali\AuditEmail\Providers\AuditEmailServiceProvider',
        ];
    }

    /**
     * Define database migrations.
     *
     * @return void
     */

    public function test_config_is_valid()
    {
        $this->assertEquals("ac_email_audits", config("emailaudit.table"));
    }

    public function test_audit_table_exists()
    {
        $this->assertDatabaseEmpty(config("emailaudit.table"));
    }

    public function test_send_mail()
    {
        Mail::fake();
        Mail::to('test-biba@test.com')->send(new TestMail);

        // Mail::assertSent(TestMail::class);

        // $this->assertDatabaseCount(config("emailaudit.table"), 1);

        $this->assertDatabaseHas(config("emailaudit.table"), [
            "app" => "app",
            "from_email" => "no-reply",
            'to_email' => 'test-biba@test.com',
            'subject' => 'Test Email',
        ]);
    }
}