<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    // Automatically registers Listeners
    // In directory App/Listeners
    public function shouldDiscoverEvents() : bool
    {
        return true;
    }
}
