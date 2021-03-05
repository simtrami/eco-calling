<?php

namespace App\Listeners;

use App\Events\Signed;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SendSignatureVerificationNotification
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
     * @param Signed $event
     * @return void
     */
    public function handle(Signed $event): void
    {
        if ($event->signature instanceof MustVerifyEmail && !$event->signature->hasVerifiedEmail()) {
            $event->signature->sendEmailVerificationNotification();
        }
    }
}
