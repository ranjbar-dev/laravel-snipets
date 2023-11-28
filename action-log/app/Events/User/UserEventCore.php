<?php

namespace App\Events\User;

use App\Events\EventCore;
use App\Models\User;

abstract class UserEventCore extends EventCore
{
    public User $user ; 
    
    public function getUser() : User
    {
        return $this->user  ;
    }
}
