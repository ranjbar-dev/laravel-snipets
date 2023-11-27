<?php

namespace App\Jobs\System;

use App\Jobs\JobCore;
use App\Models\HttpLog;

class StoreHttpLogJob extends JobCore
{
    public $queue = 'low' ;

    public function __construct( public array $payload )
    {}

    public function handle()
    {
        // we are using insert becuase insert function does not emit model events 
        HttpLog::query()->insert($this->payload);
    }

}
