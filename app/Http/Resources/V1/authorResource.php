<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class authorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'authorId' => $this -> id,
            'authorName' => $this -> authorName,
            'authorEmail' => $this -> email,
            'authorPhoneNo' => $this -> phoneNo,
            'completeReg' => $this -> haveComplete,
            'bookList' => LibraryResource::collection($this->whenLoaded('Library'))
        ];
    }
}
