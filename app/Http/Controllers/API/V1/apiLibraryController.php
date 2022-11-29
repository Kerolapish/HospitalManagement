<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\library;
use App\Http\Resources\V1\LibraryResource;
use App\Http\Resources\V1\LibraryCollection;
use App\Filters\V1\LibraryFilters;
use App\Http\Requests\V1\StoreLibraryRequest;
use App\Http\Requests\V1\UpdateLibraryRequest;

class apiLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $filter = new LibraryFilters();
        $queryItem = $filter->transform($request);

        if(count($queryItem) == 0){

            return new LibraryCollection(library::paginate());
        } else {

            $libraries = library::where($queryItem)->paginate();
            return new LibraryCollection($libraries->appends($request->query()));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryRequest $request){

        $input = $request -> all();
        $input['Availability'] = 'Available';
        
        return new LibraryResource(library::create($input));
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Library $Library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $Library){
        return new LibraryResource($Library);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library $Library
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibraryRequest $request, Library $Library){
        
        $Library -> update($request-> all());
    }

    /**
     * 
     * @param \App\Models\library $Library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $Library){

        if(!$Library -> delete()){
            
            return response()->json(['message' => 'Failed to delete library'], 404);
        } 
        return response() -> json(['message' => 'Library deleted'] , 200);
    }
}
