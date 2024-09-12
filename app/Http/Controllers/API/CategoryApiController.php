<?php

namespace App\Http\Controllers\API;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Categories::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if (Auth::user()->isAdmin == 1)
        {
            return Categories::create($request->all());
        }    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categories::with('subcategories')->find($id);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        if (Auth::user()->isAdmin == 1)
        {
            $category = Categories::find($id);
            $category->update($request->all());
            return $category;
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin == 1)
        {
        return Categories::destroy($id);
        }
    }
}
