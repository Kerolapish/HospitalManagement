<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLibraryRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
            'authorId'=> ['required','integer'],
            'bookName' => ['required'],
            'year' => ['required','digits:4','integer'],
            'bookPrice' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'ISBN' => ['required','digits_between:10,14']
        ];
    }

    protected function prepareForValidation(){
        $this -> merge([
            'author_id' => $this -> authorId,
            'name' => $this -> bookName,
            'price' => $this -> bookPrice
        ]);
    }
}
