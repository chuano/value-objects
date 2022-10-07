<?php

declare(strict_types=1);

namespace Tests;

use App\MailAddress\MailAddress;
use App\Mailer;
use App\PostalAddress\PostalAddress;
use App\SendNotificationAddress;
use PHPUnit\Framework\TestCase;

class SendNotificationAddressTest extends TestCase
{
    private Mailer $mailer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mailer = $this->createMock(Mailer::class);
    }

    public function test_send_email(): void
    {
        $this->mailer->expects($spy = self::any())
            ->method('send')
            ->with(
                'user@test.com',
                'Dirección de notificaciones',
                "Las notificaciones se le enviarán a la dirección: \nProgreso, 1\n46001 Valencia\nPuede modificar sus datos poníendose en contacto con nosotros."
            );

        $sendNotification = new SendNotificationAddress($this->mailer);
        $sendNotification->sendNotification(
            new MailAddress('user@test.com'),
            new PostalAddress('Progreso', '1', '46001', 'Valencia'),
        );

        $this->assertTrue($spy->hasBeenInvoked());
    }
}
