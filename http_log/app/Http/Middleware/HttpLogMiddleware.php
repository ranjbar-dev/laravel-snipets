<?php

namespace App\Http\Middleware;

use App\Jobs\System\StoreHttpLogJob;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HttpLogMiddleware extends Middleware
{
    protected $except = [
        "/admin/avatar",
        "/maintain-mode",
    ];

    public function handle($request, $next)
    {
        return $next($request);
    }

    public function terminate( Request $request, $response)
    {
        // check if request url is not in except list 
        if ( !Str::startsWith($request->path(),$this->except) )
        {
            $user_id = null ;
            $email = null ;

            if ( user() ) {
                $user_id = user()->id ;
                $email = user()->email ;
            }

            StoreHttpLogJob::dispatch([
                'ip' => ip_address() ,
                'user_id' => $user_id ,
                'email' => $email ,
                'url' => $request->path() ,
                'request_body' => [...$request->post(),...array_keys($request->allFiles())] ,
                'request_headers' => $request->headers->all() ?? [] ,
                'response_body' => $response->getContent() ?? null ,
                'response_headers' => $response->headers->all() ?? [] ,
                'response_status' => $response->getStatusCode() ?? 0,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
    }

}
