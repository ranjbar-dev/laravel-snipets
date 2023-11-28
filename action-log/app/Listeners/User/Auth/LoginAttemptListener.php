<?php

namespace App\Listeners\User\Auth;

use App\Events\User\Auth\LoginAttemptEvent;
use App\Listeners\User\UserListenerCore;
use App\Models\Enums\LogTypeEnum;

class LoginAttemptListener extends UserListenerCore
{
    protected LogTypeEnum $type = LogTypeEnum::UserLoginAttempt;

    public function handle( LoginAttemptEvent $event )
    {
        $this->initial( $event ,"Login attempt, user #{$event->user['id']}" ,[ 
            'ip' => $event->ip,
            'authorized' => $event->authorized,
        ]);
    }

}
