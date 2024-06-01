<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'todoname' => 'required|max:80',
                'deadlinedate' => 'date|after:yesterday',
                // 'deadlinetime' => 'nullable|after:now-2h',
                'deadlinetime' => 'nullable|after:yesterday',
                'importance' => 'boolean',
                'description' => 'max:200|nullable',
                'by_user_id' => 'integer',
                'isDone' => 'boolean',
                'by_group_id' => 'integer'
            ];
    }

    public function messages(): array
{
    return [
                'todoname.max' => 'The todo field input must not be greater than 80 characters!',
                'deadlinedate.after' => 'Choosed date is already gone!',
                'deadlinetime.after' => 'Choosed time is already gone!',
                'description.max' => 'The description field must not be greater than 200 characters!'
            ];
    }


}
