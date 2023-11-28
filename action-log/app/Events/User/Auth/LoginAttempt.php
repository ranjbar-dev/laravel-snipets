<?php

namespace App\Events\User\Auth;

use App\Events\User\UserEventCore;
use App\Models\User;

class LoginEvent extends UserEventCore
{

    public function __construct( public User $user ,public string $ip ,public bool $authorized)
    {}

}
