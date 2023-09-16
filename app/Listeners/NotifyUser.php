<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\RequestRespons;
use App\Models\LeaveApprovalLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestResponseNotification;

class NotifyUser
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
    public function handle(RequestRespons $event): void
    {
        $request = $event->leaveRequest;

        LeaveApprovalLog::create([
            'user_id' => Auth::id(),
            'status' => $request->status ,
            'comment' =>  request('comment'),
            'leave_request_id' => $request->id
        ]);

        $userId = $request->user_id;

        $user = User::where('id', $userId)->first();

        Notification::send($user, new RequestResponseNotification($event->leaveRequest));
    }
}
