<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\LeaveApprovalLog;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $leave_requests = LeaveRequest::all();
        return view('leave_request.index', compact('leave_requests'));
    }

    public function create()
    {
        $leave_types = LeaveType::all();
        return view('leave_request.create', [
            'leave_request' => new LeaveRequest(),
            'leave_types' => $leave_types
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id|int',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'required|string',
            'status' => 'nullable|in:pending,approved,rejected',
        ]);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $leave_request = LeaveRequest::create($request->all());

        $approval_log = new LeaveApprovalLog([
            'approval_status' => 'Pending', // Initial status
            'comments' => $leave_request->reason,
            'leave_request_id' => $leave_request->id
        ]);

        $approval_log->save();

        return back()->with('success', 'Request Sent! ');
    }



    public function approve(Request $request, LeaveRequest $leave_request)
    {

        $leave_request->update(['status' => 'approved']);

        $approval_log = new LeaveApprovalLog([
            'status' => 'approved',
            'comment' => 'Leave request approved.',
            'leave_request_id' => $leave_request->id,
            'user_id' => Auth::id()
        ]);
        $approval_log->save();

        return redirect()->route('user.home.admin', Auth::id())
            ->with('success', 'Leave request has been approved.');
    }

    public function reject(Request $request, LeaveRequest $leave_request)
    {

        $leave_request->update(['status' => 'rejected']);

        $approval_log = new LeaveApprovalLog([
            'status' => 'rejected',
            'comment' => 'Leave request rejected.',
            'leave_request_id' => $leave_request->id,
            'user_id' => Auth::id()

        ]);
        $approval_log->save();

        return redirect()->route('user.home.admin', Auth::id())
            ->with('warning', 'Leave request has been rejected.');
    }


    public function destroy(LeaveRequest $leave_request)
    {
        $leave_request->delete();

        $leave_request->logs()->delete();

        return back()->with('success', 'Request & Logs Deleted');
    }
}
