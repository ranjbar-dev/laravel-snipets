<?php

namespace App\Listeners;

use App\Events\EventCore;
use App\Models\Admin;
use App\Models\User;
use App\Models\Enums\LogTypeEnum;
use App\Services\EMqtt\EMqttApi;
use App\Services\EMqtt\Topics\AdminPublicTopics;
use Illuminate\Support\Facades\Log;

abstract class ListenerCore
{
    protected EventCore $event ;

    // using type to identify the type of event (example: 'user-login-attempt')
    protected LogTypeEnum $type ;

    // you can enable/disable datbase log, it is enable by default 
    protected bool $database_log = true; 

    // you can enable/disable telegram log, it is disable by default
    protected bool $telegram_log = false; 

    // actor is the source of the event
    protected string $actor_type = "system" ; // system, user, ...
    protected User|string $actor_model = "system"  ; // actor model 

    // target is the target of the event
    protected string $target_type = "system" ; // system, user, ...
    protected User|string $target = "system"  ; // actor model 

    // log message that describe what happened  
    protected string $message = "";

    // the array payload that contains more information about the event
    protected array $payload = [] ;

    // ========================================== //

    protected function store_telegram_log()
    {
        /// TODO : implement 
        // $this->actor_type
        // $this->actor_model
        // $this->target_type
        // $this->target
        // $this->type
        // $this->message
        // $this->payload
    }

    protected function store_database_log()
    {
        /// TODO : implement 
        // $this->actor_type
        // $this->actor_model
        // $this->target_type
        // $this->target
        // $this->type
        // $this->message
        // $this->payload
    }

    // ========================================== //


    protected function execute_logs()
    {
        if( $this->database_log )
            $this->store_database_log();

        if( $this->telegram_log )
            $this->store_telegram_log();
    }
}
