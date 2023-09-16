<?php

namespace App\Rules;

use App\Models\LeaveRequest;
use Closure;
use App\Models\LeaveType;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDuration implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        $leave_type = LeaveType::where('id', request('leave_type_id'))->first();
        $allowed = $leave_type->allowed_days;
        $duration = request('duration');

        if ($duration <= $allowed) {
            return true;
        } else {
            return false;
        }
    }

    public function message()
    {
        return 'The :attribute must be less than or equal to the allowed days.';
    }
}
