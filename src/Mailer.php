<?php

declare(strict_types=1);

namespace App;

class Mailer
{
    public function send(string $email, string $subject, string $body): void
    {
        echo "Email: " . $email . "\n";
        echo "Asunto: " . $subject . "\n";
        echo "-----------------------------\nCuerpo\n-----------------------------\n";
        echo $body . "\n";
    }
}
