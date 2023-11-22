<?php

namespace App\Models\Base;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BaseAuthModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [] ;


    public function notifications() : HasMany
    {
        return $this->hasMany(Notification::class) ;
    }
}
