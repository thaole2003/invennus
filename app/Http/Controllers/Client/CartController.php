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
        $user_id = $request['user_id'];
        $quantity = $request['quantity'];

        $product_variant = ProductVariant::query()->where([
            'size_id' => $size_id,
            'color_id' => $color_id,
        ])->first();

        // $product_variant_id = $product_variant->id;

        $cart = new Cart;
        $cart->fill(
            [
                'user_id' => $user_id,
                'product_radiant' => $product_variant->id,
                'quantity' => $quantity,
            ]
        );
        $cart->save();


        // $cart = Cart::query();

        // $checkProductExists = $cart->where([
        //     'user_id' => $user_id,
        //     'product_radiant' => $product_variant->id,
        //     'quantity' => $quantity,
        // ])->first();

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
        $carts = Cart::with('ProductVariant')
        ->where('user_id', auth()->user()->id) // Thêm điều kiện user_id
        ->latest()
        ->get();
        return view('client.carts.viewcart', compact('carts'));
    }

    public function delCart(string $id)
    {
        // dd(Cart::query()->find($id));
        Cart::find($id)->delete();
        return back();
    }
    public function getTotalPrice(Request $request)
    {


        $id = $request['id'];
        $quantity = $request['quantity'];
        $cart = Cart::find($id);
        $cart->quantity = $quantity;
        $cart->save();
        return response()->json([
            'code' => 200,
            'data' => [
                'cart' => $cart ?? 0
            ]
        ]);
    }
    public function checkout(){
        $carts = Cart::with('ProductVariant')
        ->where('user_id', auth()->user()->id) // Thêm điều kiện user_id
        ->latest()
        ->get();
        return view('client.carts.checkout',compact('carts'));
    }
}
