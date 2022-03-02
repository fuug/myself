<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class PerformerEditRequest extends FormRequest
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
            'user_id' => 'required|string',
            'email' => 'required|string',
            'name' => 'required|string',
            'role_id' => 'nullable|string',
            'description' => 'nullable|string',
            'category_ids' => 'nullable|array',
            'activity_ids' => 'nullable|array',
            'gender' => 'nullable|string',
            'pricePerOnceSession' => 'nullable|int',
            'highestCategory' => 'nullable|string',
            'activities' => 'nullable|string',
            'experience' => 'nullable|string',
            'thumbnail' => 'nullable|file',
        ];
    }
}
