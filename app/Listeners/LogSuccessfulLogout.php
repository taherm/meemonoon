<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout $event
     * @return void
     */
    public function handle(Logout $event)
    {
        Session::flush();
//        Cache::flush();
//        if (Cache::get('role.' . $event->user->id) || Cache::get('authCompanyOwnerId.' . $event->user->id)) {
//
//            Cache::forget('role.' . $event->user->id);
//
//            Cache::forget('perms.' . $event->user->id);
//
//            Cache::forget('modules.' . $event->user->id);
//
//            Cache::foreget('authCompanyOwnerId.' . $event->user->id);
//        }
    }
}
