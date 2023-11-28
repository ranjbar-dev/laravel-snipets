<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Log extends Model
{
    /// TODO : define relations here 

    protected $casts = [
        'payload' => AsCollection::class,
    ];

}
