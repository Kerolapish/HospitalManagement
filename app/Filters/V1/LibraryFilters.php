<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\apiFilters;

class LibraryFilters extends apiFilters {

    protected $safeParm = [
        'bookName' => ['eq'],
        'year' => ['eq','lt', 'gt', 'lte', 'gte'],
        'bookPrice' => ['eq','lt', 'gt', 'lte', 'gte'],
        'ISBN' => ['eq'],
        'Availability' => ['eq']
    ];

    protected $columnMap = [
        'bookName' => 'name',
        'bookPrice' => 'price',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>='
    ];
}

?>