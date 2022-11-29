<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\apiFilters;

class AuthorFilters extends apiFilters {

    protected $safeParm = [
        'authorName' => ['eq'],
        'authorEmail' => ['eq'],
        'authorPhoneNo' => ['eq'],
        'completeReg' => ['eq']
    ];

    protected $columnMap = [
        'authorEmail' => 'email',
        'authorPhoneNo' => 'phoneNo',
        'completeReg' => 'haveComplete'
    ];

    protected $operatorMap = [
        'eq' => '='
    ];
}

?>