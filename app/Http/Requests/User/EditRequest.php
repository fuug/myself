<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'surname' => 'nullable|string',
            'email' => 'required|string',
            'about' => 'nullable|string',
            'experience' => 'nullable|string',
            'category_ids' => 'nullable|array',
            'activity_ids' => 'nullable|array',
        ];
    }
}
