<?php

declare(strict_types=1);

namespace App;

use App\MailAddress\MailAddress;
use App\PostalAddress\PostalAddress;

class SendNotificationAddress
{
    private Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNotification(MailAddress $mailAddress, PostalAddress $postalAddress): void
    {
        $this->mailer->send(
            $mailAddress->getValue(),
            'Dirección de notificaciones',
            $this->buildBody($postalAddress),
        );
    }

    private function buildBody(PostalAddress $postalAddress): string
    {
        return "Las notificaciones se le enviarán a la dirección: \n"
            . $postalAddress->forLetter() . "\n"
            . "Puede modificar sus datos poníendose en contacto con nosotros.";
    }
}
