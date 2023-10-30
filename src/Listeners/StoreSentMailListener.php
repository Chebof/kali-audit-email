<?php

namespace Kali\AuditEmail\Listeners;

use Kali\AuditEmail\Models\EmailAudit;
use Illuminate\Mail\Events\MessageSent;


class StoreSentMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSent $event): void
    {
        $message = $event->message;

        EmailAudit::create([
            "subject" => $message->getSubject(),
            "to_email" => $this->getKeys($message->getTo()),
            "from_email" => $this->getKeys($message->getFrom(), true),
            "cc" => $this->getKeys($message->getCc()),
            "body" => (string)$message->getBody(),
            "app" => config("emailaudit.app_name_field"),
        ]);
    }


    protected function getKeys(array|null $array, $first = false)
    {
        if (!$array)
            return "";

        $keys = array_keys($array);
        return $first ? $keys[0] : implode(", ", $keys);
    }
}
