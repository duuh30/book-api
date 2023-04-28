<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'isbn' => 'required|numeric|int',
            'value' => 'required|regex:/^(([0-9]*)(\.([0-9]+))?)$/',
        ];
    }
}
