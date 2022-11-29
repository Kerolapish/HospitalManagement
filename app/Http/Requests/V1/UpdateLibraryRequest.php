<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLibraryRequest extends FormRequest
{
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

        $method = $this -> method();

        if($method == 'PUT'){
            
            return [
                'authorId'=> ['required','integer'],
                'bookName' => ['required'],
                'year' => ['required','digits:4','integer'],
                'bookPrice' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
                'ISBN' => ['required','digits_between:10,14']
            ];

        } else {

            return [
                'authorId'=> ['sometimes','required','integer'],
                'bookName' => ['sometimes','required'],
                'year' => ['sometimes','required','digits:4','integer'],
                'bookPrice' => ['sometimes','required','regex:/^\d+(\.\d{1,2})?$/'],
                'ISBN' => ['sometimes','required','digits_between:10,14']
            ];
        }
    }

    protected function prepareForValidation(){

        if($this -> bookPrice){
            $this -> merge([
                'price' => $this -> bookPrice
            ]);
        }
        if($this -> bookName){
            $this -> merge([
                'name' => $this -> bookName,
            ]);
        }
        if($this -> authorId){
            $this -> merge([
                'author_id' => $this -> authorId,
            ]);
        }
    }
}
