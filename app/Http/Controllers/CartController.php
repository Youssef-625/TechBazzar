<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use function auth;
use function dd;
use function with;

class CartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show($id)
    {
        $carts = CartItem::where('cart_id', Cart::where('user_id',$id)->first()->id)->with('product')->get();
        return view('cart', ['carts' => $carts]);
    }
    public function store($id)
    {

        CartItem::create([
            'cart_id' =>Cart::where('user_id',auth()->id())->first()->id,
            'product_id' => $id,
            'quantity' => 1,
        ]);
        return redirect()->back();
    }
    public function destroy($id)
    {

    }
    public function destroyItem($id)
    {
        CartItem::find($id)->delete();
        return redirect()->back()->with('success', 'Item has been deleted');
    }
}
