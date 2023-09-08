<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::query()->where('user_id', auth()->user()->id)->latest()->get();
        // dd($bills);
        return view('client.bills.billDetail', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $bills = Bill::query()->where([
            'user_id' => auth()->user()->id,
            'id' => $id
        ])->first();
        // dd($bills->billDetail);
        return view('client.bills.billProduct', compact('bills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $model = new Bill();
        $model->fill($request->all());
        $model->user_id = auth()->user()->id;
        $model->save();
        $cart_user = Cart::with('ProductVariant')
            ->where('user_id', auth()->user()->id) // Thêm điều kiện user_id
            ->latest()
            ->get();
        foreach ($cart_user as $value) {
            $billDetail =  new BillDetails();
            $billDetail->product_variant_id = $value['product_radiant'];
            $billDetail->quantity = $value['quantity'];
            $billDetail->bill_id = $model->id;
            $billDetail->save();
            Cart::destroy($value['id']);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
