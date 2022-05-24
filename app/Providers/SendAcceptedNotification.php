<?php

namespace App\Providers;

use App\Providers\AcceptedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAcceptedNotification
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
     * @param  \App\Providers\AcceptedUser  $event
     * @return void
     */
    public function handle(AcceptedUser $event)
    {
        $user = $event->user;
        Mail::to($user->email)
            ->send(new conferma_accettazione($user));
    }
}
