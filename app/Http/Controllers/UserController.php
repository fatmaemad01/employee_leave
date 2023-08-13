<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('employee');
    }

    public function employee(User $user)
    {
        $leave_requests = LeaveRequest::all();
        return view('user.employee', compact('user', 'leave_requests'));
    }

    public function admin(User $user)
    {
        // if (Auth::id() == $user->id) {
        $users = User::all();
        return view('user.admin', compact('user', 'users'));
    }



    public function edit(User $user)
    {
        // 
        // $users = User::all();

        return view('user.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birthday' => 'nullable|date',
            'phone' => 'required|string|max:10',
            'type' => 'required|in:administrator,employee',
            'department' => 'nullable|string',
            'job_title' => 'nullable|string',
        ]);


        $user->update($request->all());

        return redirect()->route('user.home.admin', Auth::id());
    }


    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
