<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'approver_id' , 'leave_type_id', 'start_date', 'duration', 'reason', 'status'];

    public function leave_type()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function logs()
    {
        return $this->hasMany(LeaveApprovalLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class , 'approver_id');
    }


}
