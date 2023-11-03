<?php

namespace Kali\AuditEmail\Providers;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Kali\AuditEmail\Listeners\StoreSentMailListener;

class AuditEmailServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerPublishing();
        $this->mergeConfigFrom(__DIR__ . '/../../config/emailaudit.php', 'emailaudit');


        if (config('emailaudit.audit_enabled'))
            Event::listen(MessageSent::class, StoreSentMailListener::class);
    }

    private function registerPublishing()
    {
        if ($this->app->runningInConsole())
        {
            $this->publishes([
                __DIR__ . '/../../config/emailaudit.php' => config_path('emailaudit.php'),
            ], 'config');

            if (!class_exists('CreateEmailAuditsTable'))
            {
                $this->publishes([
                    __DIR__ . '/../../database/migrations/create_email_audits_table.php' => database_path(
                        sprintf('migrations/%s_create_email_audits_table.php', date('Y_m_d_His'))
                    ),
                ], 'migrations');
            }
        }
    }

    public function register()
    {
        //
    }



}