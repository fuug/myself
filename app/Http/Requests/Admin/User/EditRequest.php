<?php

namespace App\Http\Requests\Admin\User;

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
            'user_id' => 'required|string',
            'email' => 'required|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|file',
            'name' => 'required|string',
            'category_ids' => 'nullable|array',
            'user_role' => 'nullable|string',
        ];
    }
}
