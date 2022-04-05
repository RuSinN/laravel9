<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::paginate(10);
        return response()->json($category);
    }

    public function all(){
        $category = Category::all();
        return response()->json($category);
    }

    public function store(StoreRequest $request)
    {        
        $category = Category::create($request->validated());
        return response()->json($category);
    }

 
    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(true);
    }

    public function slug($slug)
    {
        $post = Category::where('slug',$slug)->firstOrFail();
        return response()->json($post);
    }
}
