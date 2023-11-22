<?php

namespace App\Notifications\Channels;

use App\Models\User;
use Illuminate\Notifications\Notification;

class DatabaseChannel
{
    public function send(User $notifiable, Notification $notification)
    {
        try {
            $message = $notification->toDatabase($notifiable);
            $this->store_db($notification, $notifiable, $message);
        } catch (\Exception $exception) {
            report($exception);
        }
    }

    public function store_db(Notification $notification, User $notifiable, array $message)
    {
        $notifiable->notifications()->create([
            "id" => $notification->id,
            "title" => $message['title'],
            "type" => $message['type'],
            // === telegram === //
            "telegram_notified" => null,
            "telegram_error" => null,
            'telegram_message_id' => null,
            'telegram_chat_id' => null,
        ]);
    }

}
