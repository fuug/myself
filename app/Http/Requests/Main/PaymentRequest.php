<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'performer_id' => 'string',
            'subscription_id' => 'string',
            'hiddenSum' => 'string'
        ];
    }
}
