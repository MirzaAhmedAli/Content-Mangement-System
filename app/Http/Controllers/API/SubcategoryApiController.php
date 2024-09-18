<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\SubCategoryResource;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubCategoryRequest;

class SubcategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isAdmin == 1)
            {
            $subcategories = SubCategoryResource::collection(SubCategories::all());
            return $subcategories;
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        if (Auth::user()->isAdmin == 1)
        {
            return SubCategories::create($request->all());
        }
    }

    /**
     * Display the specified resource.
     */    
    public function show(string $id){
        $subcategory = SubCategories::find($id);
        return new SubCategoryResource($subcategory);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {
        if (Auth::user()->isAdmin == 1)
        {
            $subcategory = SubCategories::find($id);
            $subcategory->update($request->all());
            return $subcategory;
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin == 1)
        {
            return SubCategories::destroy($id);
        }    
    }
}
