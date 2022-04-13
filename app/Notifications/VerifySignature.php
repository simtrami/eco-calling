<?php

namespace App\Notifications;

use App\Models\Signature;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
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
    public Signature $signature;

    /**
     * The generated temporary verification url.
     *
     * @var string
     */
    public string $verificationUrl;

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
        $this->verificationUrl = URL::signedRoute(
            'signatures.verify',
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
    public function via(mixed $notifiable): array
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
            ->replyTo(env('MAIL_REPLY_TO_ADDRESS'), env('MAIL_REPLY_TO_NAME'))
            ->subject(Lang::get('mail.subject'))
            ->greeting(Lang::get('mail.greeting',
                ['firstName' => $signature->first_name]))
            ->line(Lang::get('mail.confirm'))
            ->action(Lang::get('mail.button'), $this->verificationUrl)
            ->line(Lang::get('mail.dismiss'))
            ->salutation(Lang::get('mail.salutation',
                ['name' => env('MAIL_FROM_NAME')])
            );
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
