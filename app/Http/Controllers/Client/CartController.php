<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        // $request['user_id'] = auth()->id();

        $size_id = $request['size'];
        $color_id = $request['color'];
        $user_id = auth()->user()->id;
        $quantity = $request['quantity'];
        $product_variant = $request['product_variant'];
        $quantityStock = 3;
        $product_variant = ProductVariant::query()->where([
            'size_id' => $size_id,
            'color_id' => $color_id,
        ])->first();
        $cartItem = Cart::where('product_radiant', $product_variant)->first();
        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $quantity;

            if ($newQuantity > $quantityStock) {
                return response()->json([
                    'error' => 'Sản phẩm vượt quá số lượng trong kho',
                ], 400);
            }

            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            $cart = new Cart;
            $cart->fill(
                [
                    'user_id' => $user_id,
                    'product_radiant' => $product_variant,
                    'quantity' => $quantity,
                ]
            );
            $cart->save();
        }

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
        $currentDateTime = Carbon::now()->tz('Asia/Ho_Chi_Minh');
        $carts = Cart::with('ProductVariant')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        return view('client.carts.viewcart', compact('carts'));
    }

    public function delCart(string $id)
    {
        Cart::find($id)->delete();
        toastr()->success('Đã xóa sản phẩm khỏi giỏ hàng', 'Thành công');
        return back();
    }
    public function getTotalPrice(Request $request)
    {
        $id = $request['id'];
        $quantity = $request['quantity'];
        // $product_radiant = $request['product_radiant'];
        // $product_radiants = $product_radiant->ProductVariant->total_quantity_stock;
        $cart = Cart::find($id);
        $cart->quantity = $quantity;
        $cart->save();
        return response()->json([
            'code' => 200,
            'data' => [
                'cart' => $cart ?? 0,
                // 'product_radiants' => $product_radiants
            ]
        ]);
    }
    public function checkout()
    {
        $carts = Cart::with('ProductVariant')
            ->where('user_id', auth()->user()->id) // Thêm điều kiện user_id
            ->latest()
            ->get();
        return view('client.carts.checkout', compact('carts'));
    }
}
