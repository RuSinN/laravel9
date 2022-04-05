<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $post = Post::paginate(10);
        return response()->json($post);
    }

    public function all(){
        $category = Post::all();
        return response()->json($category);
    }

    public function store(StoreRequest $request)
    {
        $post = Post::create($request->validated());
        return response()->json($post);
    }
  
    public function show(Post $post)
    {
        return response()->json($post);
    }
  
    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }
  
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(true);
    }

    function postByCategory(Category $category){
        //queryBuilder -----------
        // $posts = Post::join("categories", "categories.id", "=", "posts.category_id")
        // ->select("posts.*", "categories.title as category")
        // ->where("categories.id",$category->id)
        // ->get();
        //->toSql();

        //ELOQUENT ---------
        $posts = Post::with("category")
        ->where("category_id", $category->id)
        ->get();
        //->toSql();

        return response()->json($posts);
    }

    public function slug(Post $post)
    {
        //$post = Post::with("category")->where('slug',$slug)->firstOrFail();
        $post->category;
        return response()->json($post);
    }
}
