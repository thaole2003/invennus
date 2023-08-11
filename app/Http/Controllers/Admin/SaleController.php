<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Sale::with('product')->latest('id')->paginate(10);
        // dd($data);
        return view('admin.sale.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Product::all();
        return view('admin.sale.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Sale();
        $data->fillable($request->all());
        $data->product_id = $request->product_id;
        $data->discount = $request->discount;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();
        return redirect()->route('admin.sale.index')->with('success','Sale Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
    public function destroy(Sale $sale)
    {
        //
        $sale->delete();
        return redirect()->route('admin.sale.index')->with('success','Sale Deleted Successfully');
    }
}
