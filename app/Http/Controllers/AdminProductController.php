<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use function redirect;
use function view;


class AdminProductController extends Controller
{

    public function __construct()
    {

        Gate::authorize('is_admin');
    }

    public function index()
    {

        return view('admin.products.index', [
            'products' => Product::latest()->simplePaginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required','numeric'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required'],
            'status' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'imageUrl' => ['required', 'image']
        ]);

        $path = 'storage/' . $request->imageUrl->store('images');
        $attributes['imageUrl'] = $path;
        Product::create($attributes);
        return redirect('/admin/products')->with(['success' => 'Product created successfully!']);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {

        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required','numeric'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required'],
            'status' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);
        if ($request->imageUrl) {
            $path = 'storage/' . $request->imageUrl->store('images');
            $attributes['imageUrl'] = $path;
        }
        $product->update($attributes);
        return redirect('/admin/products/')->with(['success'=>'Product details updated.']);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products/')->with(['success'=>'Product removed.']);
    }


}
