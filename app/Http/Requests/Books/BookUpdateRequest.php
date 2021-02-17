<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|integer|min:0|not_in:0',
            'discount' => 'required|integer|between:0,100',
            'genres' => 'required|string',
            'authors' => 'required|string',
            'user_id' => 'required|integer'
        ];
    }
}
