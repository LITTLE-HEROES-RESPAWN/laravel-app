<?php
namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\VerifyEmail as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Notification
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return $this->buildCustomizedMailMessage($verificationUrl, $notifiable);
    }

    /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param  string  $url
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildCustomizedMailMessage($url, $notifiable)
    {
        $appName = config('app.name');
        return (new MailMessage)->markdown('emails.auth.verify-email', [
            'user' => $notifiable,
            'url' => $url,
            'appName' => $appName
        ])->subject("【${appName}】まだ本登録が済んでいません。");
    }
}
