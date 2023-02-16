<?php

namespace Octopy\PHPUnitExtra;

use Closure;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

trait LaravelAssertionExtra
{
    /**
     * @param  Closure $callback
     * @return void
     */
    protected function assertMail(Closure $callback) : void
    {
        $callback(Mail::fake());
    }

    /**
     * @param  Closure $callback
     * @return void
     */
    protected function assertEvent(Closure $callback) : void
    {
        $callback(Event::fake());
    }

    /**
     * @param  Closure $callback
     * @return void
     */
    protected function assertNotification(Closure $callback) : void
    {
        $callback(Notification::fake());
    }
}
