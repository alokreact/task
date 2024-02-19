<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAdminNewUserNotification
{
    
   
    /**
     * Handle the event.
     */
    public function handle(NewUserRegistered $event): void
    {
        //dd($event);

        $adminEmail = 'me.alokprasad54@gmail.com';
        $newUser = $event->user;

        //dd($newUser);
        // Send email to admin
        \Mail::to($adminEmail)->send(new \App\Mail\NewUserNotification($newUser));
    }
}
