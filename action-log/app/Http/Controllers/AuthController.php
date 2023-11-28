<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\User\Auth\LoginAttemptEvent;

class AuthController extends Controller
{

    public function login( $request )
    {
        $user = User::query()->where("email",$request->email)->first();

        $token = "" ; /// TODO : implement 
        $authorized = true ; /// TODO : implement 

        LoginAttempEvent::dispatch( $user ,$request->ip(), $authorized );

        return $this->response->ok([
            'token'=> $token
        ]) ;
    }

}
