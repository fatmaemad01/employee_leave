<?php

namespace App\Listeners;

use App\Events\RequestDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteLog
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
    public function handle(RequestDeleted $event): void
    {
        $request = $event->leaveRequest;
        $request->logs()->delete();
    }
}
