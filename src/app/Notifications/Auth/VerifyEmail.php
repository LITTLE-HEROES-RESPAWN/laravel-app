<?php
namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\VerifyEmail as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Notification
{
    /**
     * 日本語化
     * Get the verify email notification mail message for the given URL.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        $appName = config('app.name');
        return (new MailMessage)->markdown('emails.auth.verify-email', [
            'url' => $url,
            'appName' => $appName
        ])->subject("【${appName}】まだ本登録が済んでいません。");
    }
}
