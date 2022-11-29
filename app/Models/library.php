<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class library extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'name',
        'year',
        'price',
        'ISBN',
        'Availability'
    ];

    public function author(){
        return $this -> belongsTo(Author::class);
    }
}
