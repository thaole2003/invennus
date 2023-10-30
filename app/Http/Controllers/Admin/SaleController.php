<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\CreateSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function store(CreateSaleRequest $request)
    {
        $data = new Sale();
        $data->fillable($request->all());
        $data->product_id = $request->product_id;
        $data->discount = $request->discount;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();
        toastr()->success('Thêm thành công 1 giảm giá','Thành công');
        return redirect()->route('admin.sale.index');
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
        $data = Sale::findOrFail($id);
        return view('admin.sale.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Sale::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        toastr()->success('Sửa thành công 1 giảm giá!','Đã sửa');
        return to_route('admin.sale.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
        try {
            $sale->delete();
            toastr()->success('Xóa thành công 1 giảm giá!','Đã xóa');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
