<?php

namespace App\Notifications;

use App\Models\Signature;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerifySignature extends Notification
{
    use Queueable;

    /**
     * The new signature.
     *
     * @var Signature
     */
    public $signature;

    /**
     * The generated temporary verification url.
     *
     * @var string
     */
    public $verificationUrl;

    /**
     * Create a new notification instance.
     *
     * @param Signature $signature
     */
    public function __construct(Signature $signature)
    {
        $this->signature = $signature;
        $this->generateVerificationUrl($this->signature);
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param Signature $signature
     * @return void
     */
    protected function generateVerificationUrl(Signature $signature): void
    {
        $this->verificationUrl = URL::temporarySignedRoute(
            'signatures.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $signature->getKey(),
                'hash' => sha1($signature->getEmailForVerification()),
            ]
        );
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param Signature $signature
     * @return MailMessage
     */
    public function toMail(Signature $signature): MailMessage
    {
        return (new MailMessage)
            ->subject(Lang::get('mail.subject'))
            ->greeting(Lang::get('mail.greeting'))
            ->line(Lang::get('mail.confirm'))
            ->action(Lang::get('mail.button'), $this->verificationUrl)
            ->line(Lang::get('mail.dismiss'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param Signature $signature
     * @return array
     */
    public function toArray(Signature $signature): array
    {
        $this->signature = $signature;
        $this->generateVerificationUrl($this->signature);
        return [
            'subject' => Lang::get('mail.subject'),
            'action' => $this->verificationUrl,
        ];
    }
}
