<?php

namespace App\Listeners;

use App\Events\StudentAppliedOnScholarship;
use App\Models\Request;

class CreateRequestAndNotifySchool
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
     * @param  StudentAppliedOnScholarship  $event
     * @return void
     */
    public function handle(StudentAppliedOnScholarship $event)
    {
        $request = Request::create(['type' => 'scholarship', 'user_id' => $event->user->id, 'school_id' => $event->school->id, 'scholarship_id' => $event->scholarship->id]);
        $event->school->notify(new \App\Notifications\StudentAppliedOnScholarship($event->user, $event->school, $request));
    }
}