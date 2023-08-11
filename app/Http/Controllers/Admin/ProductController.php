<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Store;
use App\Models\StoreVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::latest('created_at')->paginate(5);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = Store::all();
        return view('admin.product.create', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $model = new Product();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folder = 'images/admin/product';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $model->image = $filePathAfterUpload;
            }
            $model->save();
            foreach ($request->file('images') as $key => $image) {
                $folder = 'images/admin/ImageProduct';
                $filePathAfterUpload = Storage::put($folder, $image);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $imageModel = new Image();
                $imageModel->product_id = $model->id;
                $imageModel->image = $filePathAfterUpload;
                $imageModel->save();
            }

            $size = $request->input('size');
            $sizeunique = collect($size)->unique()->values()->all();
            $color = $request->input('color');
            $colorunique = collect($color)->unique()->values()->all();
            if (count($request->input('store_id'))) {
                foreach ($request->input('store_id') as $store) {
                    foreach ($colorunique as $color) {
                        $colorr = Color::firstOrCreate(['name' => $color]);
                        foreach ($sizeunique as $size) {
                            $sizee = Size::firstOrCreate(['name' => $size]);
                            // Thêm biến thể vào bảng product_variants
                            $productVariant = new ProductVariant;
                            $productVariant->product_id = $model->id;
                            $productVariant->size_id = $sizee->id; // Thay thế $sizeId bằng id của size tương ứng
                            $productVariant->color_id = $colorr->id; // Thay thế $colorId bằng id của color tương ứng
                            $productVariant->price = $request->input('price'); // Thay thế $price bằng giá của biến thể
                            $productVariant->save();
                            // Thêm biến thể vào bảng store_variants
                            $storeVariant = new StoreVariant;
                            $storeVariant->store_id = $store; // Thay thế $storeId bằng id của cửa hàng tương ứng
                            $storeVariant->variant_id = $productVariant->id;
                            $storeVariant->quantity = 0; // Thay thế $quantity bằng số lượng của biến thể trong cửa hàng
                            $storeVariant->save();
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
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
    public function destroy(Product $product)
    {
        //
        try {
            $product->delete();
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
