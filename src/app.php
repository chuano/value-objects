<?php

use App\MailAddress\MailAddress;
use App\Mailer;
use App\SendNotificationAddress;

require "vendor/autoload.php";

try {
    $sender = new SendNotificationAddress(new Mailer());
    $sender->sendNotification(
        new MailAddress($argv[1]),
        new App\PostalAddress\PostalAddress($argv[2], $argv[3], $argv[4], $argv[5])
    );
} catch (Throwable $e) {
    echo $e->getMessage() . "\n";
}
