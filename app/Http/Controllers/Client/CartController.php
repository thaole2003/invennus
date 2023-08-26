<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        // $request['user_id'] = auth()->id();

        $size_id = $request['size'];
        $color_id = $request['color'];

        $product_variant = ProductVariant::query()->where([
            'size_id' => $size_id,
            'color_id' => $color_id,
        ])->first();

        $id = $product_variant->id;

        $request['id'] = $id;

        $cart = Cart::query();
        $cart->create($request->all());
        // $checkProductExists = $cart->where([
        //     'product_id' => $request['product_id'],
        //     'stock_id' => $request['stock_id'],
        // ])->first();
        // // $cart->create($request->all());
        // if (!$checkProductExists) {
        // }
        // if (!$checkProductExists) {
        //     $cart->create($request->all());
        // } else {
        //     $checkProductExists->update([
        //         'quantity' => $checkProductExists->quantity + $request['quantity']
        //     ]);
        // }

        return response()->json([
            'data' => $request->all(),
        ]);
    }


    public function viewCart()
    {
        // if (!empty(auth()->user()->id)) {
        //     $id = auth()->user()->id;
        //     $data = Cart::query()->where('user_id', $id)->get();
        //     return view('client.cart.viewcart', compact('data'));
        // } else {
        //     return redirect()->route('loginUser');
        // }
        return view('client.carts.viewcart');
    }

    public function delCart(string $id)
    {
        //        dd(Cart::query()->find($id));
        Cart::find($id)->delete();
        return back();
    }
}
