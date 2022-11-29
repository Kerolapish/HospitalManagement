<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class LibraryResource extends JsonResource
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
            'authorId' => $this -> author_id,
            'bookId' => $this -> id,
            'bookName' => $this -> name,
            'year' => $this -> year,
            'bookPrice' => $this -> price,
            'ISBN' => $this -> ISBN,
            'bookAvailability' => $this -> Availability
        ];
    }
}
