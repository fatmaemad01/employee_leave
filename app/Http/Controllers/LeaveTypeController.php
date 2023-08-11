<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }


    public function index()
    {
        $leave_types = LeaveType::all();
        return view('leave_type.index', compact('leave_types'));
    }

    public function create()
    {
        return view('leave_type.create', [
            'leave_type' => new LeaveType()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|max:500|string',
            'allowed_days' => 'required|int|max:30',
        ]);

        $leave_type = LeaveType::create($request->all());
        return redirect()->route('leave_type.index');
    }

    public function edit(LeaveType $leave_type)
    {
        return view('leave_type.edit', [
            'leave_type' => $leave_type
        ]);
    }


    public function update(Request $request, LeaveType $leave_type)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|max:500|string',
            'allowed_days' => 'required|int|max:30',
        ]);

        $leave_type->update($request->all());

        return redirect()->route('leave_type.index');
    }


    public function destroy(LeaveType $leave_type)
    {
        $leave_type->delete();

        return redirect()->route('leave_type.index');
    }
}
