<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'allowed_days'];

    public function leave_requests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
