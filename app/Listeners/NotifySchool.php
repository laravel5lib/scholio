<?php

namespace App\Listeners;

use App\Events\UserAppliedOnSchool;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySchool
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
     * @param  UserAppliedOnSchool  $event
     * @return void
     */
    public function handle(UserAppliedOnSchool $event)
    {
        //
    }
}
