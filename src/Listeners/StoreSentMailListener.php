<?php

namespace Kali\AuditEmail\Listeners;

use Kali\AuditEmail\Models\EmailAudit;
use Illuminate\Mail\Events\MessageSent;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;


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
            "to_email" => $this->getAddressValue($message->getTo()),
            "from_email" => $this->getAddressValue($message->getFrom(), true),
            "cc" => $this->getAddressValue($message->getCc()),
            "body" => $this->getHtml($message),
            "app" => config("emailaudit.app_name_field"),
        ]);
    }


    protected function getAddressValue(array|null $array, $first = false)
    {
        if (!$array)
            return "";

        $values = [];
        foreach ($array as $key => $value)
        {
            $values[] = $value instanceof Address ? $value->getAddress() : $key;
        }

        return $first ? $values[0] : implode(", ", $values);
    }

    protected function getHtml($message)
    {
        return $message instanceof Email ? $message->getHtmlBody() : (string) $message->getBody();
    }
}
