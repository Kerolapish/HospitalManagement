<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\library;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'authorName',
        'email',
        'phoneNo',
        'haveComplete'
    ];

    public function library(){
        return $this -> hasMany(Library::class);
    }
}
