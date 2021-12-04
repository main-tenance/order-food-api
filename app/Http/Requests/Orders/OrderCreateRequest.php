<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'company_id' => 'required',
            'client_name' => 'required',
            'client_phone' => 'required',
            'lines' => [
                'dish_id' => [
                    'required',
                ],
                'quantity' => [
                    'required',
                ],
            ]
        ];
    }
}
