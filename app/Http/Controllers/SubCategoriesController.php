<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubCategoryRequest;

class SubCategoriesController extends Controller
{
    public function index(){
        $categories = Categories::with('subcategories')->get();
        return view('pages.sub-categories',['categories' => $categories]);
    }
    public function create(){
        if (Auth::user()->isAdmin == 1)
        {
            $categories = Categories::all();
        return view('pages.functions.create-sub-category',['categories' => $categories]);
        }else 
        {   
        return redirect()->intended('categories');
        }
    }
    public function store(SubCategoryRequest $request){
        SubCategories::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->intended('categories')->with('status', 'SubCategory has been added to Category');
    }

    public function edit(int $id){
        $subcategory = SubCategories::findorFail($id);
        return view('pages.functions.edit-sub-category',compact('subcategory'));
    }
    public function update(SubCategoryRequest $request, int $id){

        SubCategories::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->intended('subcategories')->with('status', 'SubCategory Updated successfully.');
    } 

    public function destroy($subcategoryId){
        $subcategory = SubCategories::findOrFail($subcategoryId);
        $subcategory->delete();
        return redirect('subcategories/')->with('status','Category Deleted');
    }
}
