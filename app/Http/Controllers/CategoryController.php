<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    public function __construct()
    {
        // middleware to not accept store,update or delete if
        // you're not jwt authenticate
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return CategoryResource::collection(Category::latest()->get());
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return response('created', Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }



    public function update(Request $request, Category $category)
    {
        $category->update(
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]
        );

        return response('updated', Response::HTTP_ACCEPTED);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
