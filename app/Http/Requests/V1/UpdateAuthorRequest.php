<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
        } else {

            if(isset($this -> authorEmail) && isset($this->authorPhoneNo)){
            
                return[
                    'authorName' => ['sometimes' ,'required'],
                    'authorEmail' => ['sometimes' ,'required' , 'email'],
                    'authorPhoneNo' => ['sometimes' ,'required'],
                ];
            } else {
    
                return[
                    'authorName' => ['sometimes' ,'required'],
                ];
            }
        }
        
    }

    protected function prepareForValidation(){

        if($this ->authorEmail || $this ->authorPhoneNo){
            $this -> merge([
                'email' => $this -> authorEmail,
                'phoneNo' => $this -> authorPhoneNo
            ]);
        }   
    }
}
