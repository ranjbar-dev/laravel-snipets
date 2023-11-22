<?php

namespace App\Notifications\Channels;

use App\Models\User;
use App\Services\Telegram\TelegramService;
use Illuminate\Notifications\Notification;


class TelegramChannel
{

    public function send( User $notifiable, Notification $notification)
    {
        try {
            $message = $notification->toTelegram($notifiable);

            if( !notifiable->isTelegramAccountLinked() )
                throw new \Exception("User did not linked telegram account");

            $messageId = $this->notify_telegram( $notifiable ,$message) ;

            $this->update_db( $notification ,$notifiable ,$message ,$messageId );
        }
        catch ( \Exception $exception )
        {
            report( $exception );
            $this->error_db( $notification, $notifiable ,$message ,$exception );
        }
    }

    private function notify_telegram( User $notifiable ,array $message ) : string
    {
        /// TODO : send message to user 

        return 1234 ;
    }

    private function update_db( Notification $notification , User $notifiable ,array $message , string $telegram_message_id ) : void
    {
        $notification_model = $notifiable->notifications()->where("id",$notification->id)->firstOrFail();

        $notification_model->update([
            'telegram_notified' => true ,
            'telegram_error' => null ,
            'telegram_message_id' => $telegram_message_id ,
            'telegram_chat_id' => $notifiable->getTelegramChatId() ,
        ]);
    }

    private function error_db( Notification $notification,  User $notifiable, array $message, \Exception $exception ) : void
    {
        $notification_model = $notifiable->notifications()->where("id",$notification->id)->firstOrFail();

        $notification_model->update([
            "telegram_notified" => false ,
            "telegram_error" => $exception->getMessage() ,
            'telegram_message_id' => null ,
            'telegram_chat_id' => $notifiable->getTelegramChatId() ,
        ]);
    }

}
