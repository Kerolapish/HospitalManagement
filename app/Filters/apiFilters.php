<?php

namespace App\Filters;

use App\Models\Author;
use Illuminate\Http\Request;

class apiFilters {

    protected $safeParm = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request){
        $eloQuery = [];

        foreach ($this->safeParm as $parm => $operators){
            $query = $request-> query($parm);
            
            if(!isset($query)){
                continue;
            }

            $column = $this -> columnMap[$parm] ?? $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
        
    }
}

?>