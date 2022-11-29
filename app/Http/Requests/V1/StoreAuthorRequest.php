<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAuthorRequest extends FormRequest{
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
    
        if(isset($this -> authorEmail) && isset($this->authorPhoneNo)){
           
            return[
                'authorName' => ['required'],
                'authorEmail' => ['required' , 'email'],
                'authorPhoneNo' => ['required'],
            ];
        } else {

            return[
                'authorName' => ['required'],
            ];
        }
    }

    protected function prepareForValidation(){
        
        $this -> merge([
            'email' => $this -> authorEmail,
            'phoneNo' => $this -> authorPhoneNo
        ]);
    }
}












