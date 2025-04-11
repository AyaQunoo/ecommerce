<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Notifications\WelcomeEmailNotification;

class SendWelcomeEmail
{
    
    public function __construct()
    {
        //
    }

    public function handle(Registered $event)
    {
        
    
        $event->user->notify(new WelcomeEmailNotification());
    }
}
