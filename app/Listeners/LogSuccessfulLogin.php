<?php

namespace App\Listeners;

use App\Events\LoginSuccess;

class LogSuccessfulLogin
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\LoginSuccess  $event
     * @return void
     */
    public function handle(LoginSuccess $event)
    {
        $event->user->last_login = now()->toDateTimeString();
        $event->user->save();
    }
}
