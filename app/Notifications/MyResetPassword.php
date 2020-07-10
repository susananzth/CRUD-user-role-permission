<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

class MyResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password')
            ->greeting('Hi!')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', route('password.reset', $this->token))
            ->line('')
            ->line('This link will expire in '.config('auth.passwords.users.expire').' minutes.')
            ->line('If you did not request a password reset, no further action is required.');
            ->salutation('Regards, '. config('app.name'));
    }

}
