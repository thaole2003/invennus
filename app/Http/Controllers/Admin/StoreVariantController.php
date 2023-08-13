<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreVariant;
use Illuminate\Http\Request;

class StoreVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Store::all();
        return view('admin.storeVariant.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StoreVariant::with(['variant.product'])
            ->where('store_id', $id)
            ->latest('created_at')
            ->get();

        return view('admin.storeVariant.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StoreVariant::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
    }
}
