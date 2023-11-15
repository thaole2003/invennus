<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $user_id = auth()->user()->id;
        $quantity = $request['quantity'];
        $product_variant = $request['product_variant'];
        $quantityStock = $request['quantity_stock'];


        $cartItem = Cart::where('product_radiant', $product_variant)->first();
        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $quantity;

            if ($newQuantity > $quantityStock) {
                toastr()->error('Không đủ số lượng trong kho', 'Thất bại');
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
            toastr()->success('Thêm thành công giỏ hàng', 'Thành công');
        }

        return response()->json([
            'data' => $request->all(),
            'code' => 200,
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
        //     $id = auth()->user()->id;

        $id = $request['id'];
        $quantity = $request['quantity'];
        $price = $request['price'];
        // $product_radiant = $request['product_radiant'];
        // $product_radiants = $product_radiant->ProductVariant->total_quantity_stock;
        $cart = Cart::find($id);
        $cart->quantity = $quantity;
        $cart->save();
        $total = $quantity * $price;
        $totalPrice = Cart::where('user_id', auth()->user()->id)
            ->join('product_variants', 'carts.product_radiant', '=', 'product_variants.id')
            ->sum(DB::raw('carts.quantity * product_variants.price'));
        return response()->json([
            'code' => 200,
            'data' => [
                'cart' => $cart ?? 0,
                // 'product_radiants' => $product_radiants
            ],
            'total' => $total,
            'totalPrice' => $totalPrice
        ]);
    }
    public function checkout()
    {
        $countCart = Cart::where('user_id', auth()->user()->id)->sum('quantity');
        if ($countCart == 0) {
        toastr()->error('Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi tạo đơn hàng.', 'Không thành công');
        return back();
    }
        $carts = Cart::with('ProductVariant')
            ->where('user_id', auth()->user()->id) // Thêm điều kiện user_id
            ->latest()
            ->get();
        return view('client.carts.checkout', compact('carts'));
    }
    
}
