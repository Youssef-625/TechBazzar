<?php

namespace App\Http\Controllers;

use App\Models\Product;
use function dd;
use function view;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index', [
            'featuredProducts' => Product::inRandomOrder()->take(5)->get(),
            'onSaleProducts' => Product::where('status', 'onSale')->inRandomOrder()->take(10)->get(),
            'laptops' => Product::where('category_id', 1)->inRandomOrder()->take(10)->get(),
            'pcs' => Product::where('category_id', 3)->inRandomOrder()->take(10)->get(),
            'phones' => Product::where('category_id', 2)->inRandomOrder()->take(12)->get(),
        ]);
    }

    public function show(Product $product)
    {

        return view('products.show', [
           'product' => $product
        ]);
    }


    public function phones()
    {
        return view('category.show', [
                'products' => Product::where('category_id', '=', 2)->simplePaginate(8),
                'heading' => 'Phones',
            ]
        );
    }

    public function laptops()
    {

        return view('category.show', [
                'products' => Product::where('category_id', '=', 1)->simplePaginate(8),
                'heading' => 'Laptops',
            ]
        );
    }

    public function pcs()
    {
        return view('category.show', [
                'products' => Product::where('category_id', '=', 3)->simplePaginate(8),
                'heading' => 'PCs',
            ]
        );
    }
}
