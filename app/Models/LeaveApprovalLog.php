<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApprovalLog extends Model
{
    use HasFactory;

    protected $fillable = ['leave_request_id', 'user_id', 'status', 'comment', 'approval_date'];

    public function leave_request()
    {
        return $this->belongsTo(LeaveRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
