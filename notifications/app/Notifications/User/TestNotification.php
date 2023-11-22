<?php

namespace App\Notifications\User;

use App\Notifications\Channels\TelegramChannel;
use App\Notifications\NotificationCore;

class TestNotification extends NotificationCore
{
    public string $title = "Test notification" ;

    public array $channels = [ TelegramChannel::class ];

    public function __construct(public string $message)
    {}

    public function toDatabase($notifiable)
    {
        return [
            "title" => $this->title ,
            "type" => TestNotification::class ,
        ];
    }

    public function toTelegram ($notifiable) : array
    {
        return [
            "text" => $this->message ,
        ];
    }


}
