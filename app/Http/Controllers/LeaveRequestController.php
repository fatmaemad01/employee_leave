<?php

namespace App\Http\Controllers;

use App\Events\RequestCreated;
use App\Events\RequestDeleted;
use App\Events\RequestRespons;
use App\Events\RequestResponsed;
use App\Http\Requests\LeaveRequest as RequestsLeaveRequest;
use App\Models\LeaveType;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\LeaveApprovalLog;
use App\Rules\ValidDuration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('create', 'store');
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


    public function store(RequestsLeaveRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        $leave_request = LeaveRequest::create($validated);

        event(new RequestCreated($leave_request));

        return back()->with('success', 'Request Sent! ');
    }



    public function approve(Request $request, LeaveRequest $leave_request)
    {

        $leave_request->update([
            'status' => 'approved',
            'approver_id' => Auth::id(),

        ]);

        event(new RequestRespons($leave_request));
        return redirect()->route('user.home.admin', Auth::id())
            ->with('success', 'Leave request has been approved.');
    }

    public function reject(Request $request, LeaveRequest $leave_request)
    {

        $leave_request->update([
            'status' => 'rejected',
            'approver_id' => Auth::id(),
        ]);
        event(new RequestRespons($leave_request));

        return redirect()->route('user.home.admin', Auth::id())
            ->with('warning', 'Leave request has been rejected.');
    }


    public function destroy(LeaveRequest $leave_request)
    {
        $leave_request->delete();

        event(new RequestDeleted($leave_request));

        return back()->with('success', 'Request & Logs Deleted');
    }
}
