<?php

namespace App\Http\Requests\Admin\Activity;

use Illuminate\Foundation\Http\FormRequest;

class RenameRequest extends FormRequest
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
            'activity_id' => 'required|string',
            'title' => 'required|string'
        ];
    }
}
