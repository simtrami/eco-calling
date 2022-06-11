<?php

namespace App\Notifications;

use App\Models\Signature;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
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
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo(config('mail.reply_to.address'), config('mail.reply_to.name'))
            ->subject(__('mail.subject'))
            ->greeting(__('mail.greeting',
                ['firstName' => $signature->first_name]))
            ->line(__('mail.confirm'))
            ->action(__('mail.button'), $this->verificationUrl)
            ->line(__('mail.dismiss'))
            ->salutation(__('mail.salutation',
                    ['name' => config('app.our-name')])
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
            'subject' => __('mail.subject'),
            'action' => $this->verificationUrl,
        ];
    }
}
