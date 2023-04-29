<?php

namespace App\Http\Requests;

use App\Rules\Book\ValueDecimalRule;
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
            'value' => ['required', new ValueDecimalRule],
        ];
    }
}
