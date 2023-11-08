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
            $productGroups = [];

            foreach ($data as $storeVariant) {
                $product = $storeVariant->variant->product;
                $productId = $product->id;
                // Nếu sản phẩm đã tồn tại trong nhóm, thêm vào nhóm đó
                if (isset($productGroups[$productId])) {
                    $productGroups[$productId]['variants'][] = $storeVariant->variant;
                } else {
                    // Nếu sản phẩm chưa tồn tại trong nhóm, tạo một nhóm mới
                    $productGroups[$productId] = [
                        'product' => $product,
                        'variants' => [$storeVariant->variant],
                    ];
                }
            }
            // dd($productGroups);
        return view('admin.storeVariant.show', compact('data','id','productGroups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }
    public function showStoreVariant($idStore, $idProduct)
    {
        $data = StoreVariant::with(['variant.product'])
            ->where('store_id', $idStore)
            ->whereHas('variant.product', function ($query) use ($idProduct) {
                $query->where('id', $idProduct);
            })
            ->latest('created_at')
            ->get();
        return view('admin.storeVariant.showProduct', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StoreVariant::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        toastr()->success('Cập nhật thành công !','Đã sửa');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
    }
}
