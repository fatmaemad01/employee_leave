<?php

namespace App\Listeners;

use App\Events\RequestCreated;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRequestNotification;

class NotifyAdmin
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
    public function handle(RequestCreated $event): void
    {
        $users = User::where('type', 'administrator')->get();

        Notification::send($users, new NewRequestNotification($event->leaveRequest));
    }
}
