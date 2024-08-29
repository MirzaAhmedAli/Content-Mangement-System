<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('pages.categories',['categories' => $categories]);
    }

    public function show($categoryId, Categories $categories){
        $category = Categories::findOrFail($categoryId);
        $subcategories = $category->subcategories;  
        return view('pages.category-show', ['category' => $category, 'subcategories' => $subcategories]);
    }

    public function create(){
        if (Auth::user()->isAdmin == 1)
            {
        return view('pages.functions.create-category');
        }else 
        {   
        return redirect()->intended('categories');
        }
    }
    public function store(CategoryRequest $request){

        $defaultImagePath = 'uploads/category/default.png';
        $filemname = null;
        $path = null;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filemname = time().'.'.$extension;
            $path = 'uploads/category/';
            $file->move($path,$filemname);
        }else {
            $filemname = basename($defaultImagePath);
            $path = dirname($defaultImagePath) . '/';
        }

        Categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path.$filemname
        ]);

        return redirect()->intended('categories')->with('status', 'Category Added successfully.');
    }

    public function edit(int $id){
        $category = Categories::findorFail($id);
        return view('pages.functions.edit-category',compact('category'));
    }
    public function update(CategoryRequest $request, int $id){
        $defaultImagePath = 'uploads/category/default.png';
        $filemname = null;
        $path = null;
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filemname = time().'.'.$extension;
            $path = 'uploads/category/';
            $file->move($path,$filemname);
        }else {
            $filemname = basename($defaultImagePath);
            $path = dirname($defaultImagePath) . '/';
        }

        Categories::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path.$filemname
        ]);

        return redirect()->intended('categories')->with('status', 'Category Updated successfully.');
    } 

    public function destroy($categoryId){
        $category = Categories::findOrFail($categoryId);
        $category->delete();
        return redirect('categories/')->with('status','Category Deleted');
    }
}
