<?php

namespace App\Listeners;

use App\Events\RequestCreated;
use App\Models\LeaveApprovalLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateLog
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
        $leave_request = $event->leaveRequest;

      LeaveApprovalLog::create([
            'user_id' => Auth::id(),
            'status' => $leave_request->status ?? 'pending' , // Initial status
            'comment' =>  request('comment'),
            'leave_request_id' => $leave_request->id
        ]);
    }
}
