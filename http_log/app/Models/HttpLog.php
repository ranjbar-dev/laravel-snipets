<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class HttpLog extends BaseModel
{
    protected $casts = [
        'request_body' => AsCollection::class, // request body 
        'request_headers' => AsCollection::class, // request headers 
        'response_headers' => AsCollection::class, // request headers 
    ];
}
