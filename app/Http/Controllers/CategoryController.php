<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use \Illuminate\Support\Collection;

class CategoryController extends Controller
{
    public function tree()
    {
        $tree = new Collection();
        $roots = Category::roots()->get();
        foreach ($roots as $root) {
            $hierarchy = $root->getDescendantsAndSelf(['id', 'parent_id', 'name'])->toHierarchy();
            $tree = $tree->merge($hierarchy);
        }

        return response()->json($tree);
    }

    public function products($category_id)
    {
        $products = Product::all()->where('category_id', '=', $category_id)->map(function ($product) {
            $product->image = '/products/' . $product->image;

            return $product;
        });

        return response()->json($products);
    }

    public function index()
    {
        return response()->json(Category::all());
    }

    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    public function store(Request $request)
    {
        $category = Category::create(['name' => $request->get('name')]);
        $parent_id = $request->get('parent_id');
        if ($parent_id) {
            $parent = Category::find($parent_id);
            $category->makeChildOf($parent);
        }

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        $parent_id = $request->get('parent_id');
        if ($parent_id) {
            $parent = Category::find($parent_id);
            $category->makeChildOf($parent);
        }

        return response()->json($category);
    }

    public function delete(Request $request, $id)
    {
        Category::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
