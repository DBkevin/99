<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
Use App\Models\Product;

class OrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'price'=>[
                'required|integer',
            ]
        ];
    }
}
