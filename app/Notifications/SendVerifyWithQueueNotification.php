<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVerifyWithQueueNotification extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    // короче мы переопределили так, что у нас сохраился изначальный функционал (в VerifyEmail), но
    // к нему добавилась implements ShouldQueue и use Queueable
    // благодаря чему и будут работать очерёдность
}
