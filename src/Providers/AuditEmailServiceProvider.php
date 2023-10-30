<?php

namespace Kali\AuditEmail\Providers;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Kali\AuditEmail\Listeners\StoreSentMailListener;

class EmailAuditServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/emailaudit.php' => config_path('emailaudit.php'),
        ]);

        //Adding event listener for MessageSent
        Event::listen(MessageSent::class, StoreSentMailListener::class);
    }

    public function register()
    {
        //
    }



}