<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Http\Resources\V1\authorResource;
use App\Http\Resources\V1\authorCollection;
use App\Filters\V1\AuthorFilters;
use App\Http\Requests\V1\StoreAuthorRequest;
use App\Http\Requests\V1\UpdateAuthorRequest;
 
class apiAuthorController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $filter = new AuthorFilters();
        $filterItem = $filter->transform($request);

        $includeBookList = $request->query('includeBookList');

        $authors = Author::where($filterItem);
        if($includeBookList){
            
            $authors = $authors->with('Library');
        }
        return new authorCollection($authors->paginate()->appends($request->query()));
    }
    
    /**
     * Store a newly created resource in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request){
            
        $input = $request -> all();

        if(isset($request -> authorEmail) && isset($request->authorPhoneNo)){
            $input['haveComplete'] = true;
        } else {
            $input['haveComplete'] = false;
        }       
        return new authorResource(author::create($input));   
    }

    /**
     * Display the specified resources
     *
     * @param App\Models\Author $author
     * @return \Illuminate\Http\Response    
     */
    public function show(Author $Author){

        $includeBookList = request()->query('includeBookList');

        if ($includeBookList){
            return new authorResource($Author->loadMissing('Library'));
        } 
        return new authorResource($Author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $Author){
        
        $input = $request -> all();
        if(isset($request -> authorEmail) && isset($request->authorPhoneNo)){
            $input['haveComplete'] = true;
        } else {
            $input['haveComplete'] = false;
        } 
        $Author->update($input);
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param  \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $Author){

        if (!$Author -> delete()){
            return response()->json(['message' => 'Failed to delete author'], 404);
        } 
        return response()->json(['message' => 'Author deleted'], 200);
    }
}