<?php

namespace App\Listeners\User;

use App\Actions\Log\StoreUserLog;
use App\Events\EventCore;
use App\Events\User\UserEventCore;
use App\Listeners\ListenerCore;

abstract class UserListenerCore extends ListenerCore
{
    protected bool $database_log = true ;

    protected bool $telegram_log = false ;

    public function __construct()
    {
        $this->actor_type = "user" ;

        $this->target_type = "user" ;
    }

    protected function initial( EventCore|UserEventCore $event ,string $message = "" ,array $payload = [] ) : void
    {
        $this->actor = $event->getUser()  ;

        $this->target = $event->getUser()  ;

        $this->log_message = $message  ;

        $this->log_payload = $payload  ;

        $this->execute_logs();
    }

}
