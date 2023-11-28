<?php

namespace App\Events;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class EventCore implements ShouldQueue
{
    use Dispatchable ,SerializesModels;

    public function backoff()
    {
        return [ 3, 5, 10] ; // if job fail try after [] seconds
    }

}
