<?php

namespace App\Listeners;

use App\Events\Signed;

class SendSignatureVerificationNotification
{
    /**
     * Handle the event.
     *
     * @param Signed $event
     * @return void
     */
    public function handle(Signed $event): void
    {
        if (!$event->signature->hasVerifiedEmail()) {
            $event->signature->sendEmailVerificationNotification();
        }
    }
}
