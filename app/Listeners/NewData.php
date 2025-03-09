<?php

namespace App\Listeners;

use App\Events\NewDataEvent;
use App\Mail\createMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Mail;

class NewData
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewDataEvent $event): void
    {
        Mail::to(Auth::user()->email)->send(new createMail($event->data));
    }
}
