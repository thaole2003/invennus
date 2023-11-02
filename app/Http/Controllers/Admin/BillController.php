<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::query()->latest()->get();
        return view('admin.bills.billDetail', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $bills = Bill::query()->where([
            'id' => $id
        ])->first();
        return view('admin.bills.billProduct', compact('bills'));
    }

    public function updateStatus(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->status = $request->status;
        $bill->save();

        return response()->json($bill);
    }
}
