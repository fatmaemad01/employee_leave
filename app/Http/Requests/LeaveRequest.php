<?php

namespace App\Http\Requests;

use App\Rules\ValidDuration;
use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'leave_type_id' => 'required|exists:leave_types,id|int',
            'start_date' => [
                'required',
                'date',
                'after:today'
            ],
            'duration' => [
                'required',
                'numeric',
                new ValidDuration()
            ],
            'reason' => 'required|string',
            'status' => 'nullable|in:pending,approved,rejected',
        ];
    }
}
