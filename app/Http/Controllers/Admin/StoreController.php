<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Store;
use App\Models\StoreVariant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:stores.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        //
        $data = Store::latest('created_at')->get();
        return view('admin.store.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStoreRequest $request)
    {
        //
        // dd($request->all());
        try {
            // dd($request->all());
            $model = new Store();
            $model->fill($request->all());
            // Tạo slug từ tên cửa hàng
            $slug = Str::slug($request->name);
            $model->slug = $slug;
            $model->save();
            toastr()->success('Thêm thành công 1 cửa hàng!','Đã thêm');
            return to_route('admin.store.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
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
        $data = Store::findOrFail($id);
        return view('admin.store.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, string $id)
    {
        //
        $data = Store::findOrFail($id);
        $data->fill($request->all());
        $slug = Str::slug($request->name);
        $data->slug = $slug;
        $data->save();
        toastr()->success('Sửa thành công 1 cửa hàng!','Đã sửa');
        return to_route('admin.store.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
        try {
            $data = StoreVariant::with(['variant.product'])
            ->where('store_id', $store->id)
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
                $productGroups[$productId] = [
                    'product' => $product,
                    'variants' => [$storeVariant->variant],
                ];
            }
            if(count($productGroups)>0){
                toastr()->error('Không thể xóa cửa hàng này, xóa sẽ mất sản phẩm có liên quan','Thử lại sau');
                return back();
            }
        }
            $store->delete();
            toastr()->success('Xóa thành công 1 cửa hàng!','Đã xóa');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
