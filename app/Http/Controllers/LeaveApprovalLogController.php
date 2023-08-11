<?php

namespace App\Http\Controllers;

use App\Models\LeaveApprovalLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveApprovalLogController extends Controller
{
// request 
    public function index()
    {
        $approval_logs = LeaveApprovalLog::all();
        return view('log.index', compact('approval_logs'));
    }

}
