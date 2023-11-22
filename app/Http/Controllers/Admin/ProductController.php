<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Store;
use App\Models\StoreVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:products.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy', 'updatequantitystock']]);
    }
    public function index()
    {
        $data = Product::latest('created_at')->get();
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = Store::all();
        $categories = Category::query()->get();
        // $sizes = Size::query()->get();
        // $colors = Color::query()->get();
        // dd($categories);
        return view('admin.product.create', compact('store', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        // dd($request->all());
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
            $slug = Str::slug($request->title);
            $model->slug = $slug;
            $model->save();
            foreach ($request->category as $valuecate) {
                $modelProductCategory = new CategoryProduct();
                $modelProductCategory->category_id = $valuecate;
                $modelProductCategory->product_id = $model->id;
                $modelProductCategory->save();
            }
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
            $sizeunique = array_map('strtoupper', array_map('trim', $sizeunique));
            $color = $request->input('color');
            $colorunique = collect($color)->unique()->values()->all();
            $colorunique = array_map('strtoupper', array_map('trim', $colorunique));
            if (count($request->input('store_id'))) {
                foreach ($colorunique as $color) {
                    $colorr = Color::firstOrCreate(['name' => $color]);
                    foreach ($sizeunique as $size) {
                        $sizee = Size::firstOrCreate(['name' => $size]);

                        // Thêm biến thể vào bảng product_variants
                        $productVariant = new ProductVariant;
                        $productVariant->product_id = $model->id;
                        $productVariant->size_id = $sizee->id;
                        $productVariant->color_id = $colorr->id;
                        $productVariant->price = $request->input('price');
                        $productVariant->save();

                        // Tạo danh sách store_id tại đây để đảm bảo không lặp lại
                        $uniqueStoreIds = [];

                        foreach ($request->input('store_id') as $store) {
                            // Kiểm tra xem cửa hàng đã được xử lý chưa
                            if (!in_array($store, $uniqueStoreIds)) {
                                // Thêm biến thể vào bảng store_variants
                                $storeVariant = new StoreVariant;
                                $storeVariant->store_id = $store;
                                $storeVariant->variant_id = $productVariant->id;
                                $storeVariant->quantity = 0;
                                $storeVariant->save();

                                // Đánh dấu cửa hàng đã được xử lý
                                $uniqueStoreIds[] = $store;
                            }
                        }
                    }
                }
            }
            toastr()->success('Thêm thành công 1 sản phẩm', 'Thành công');
            return to_route('admin.product.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return redirect();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProductVariant::where('product_id', $id)->get();
        return view('admin.product.show', compact('data'));
    }
    public function updateprice(Request $request, $id)
    {
        try {
            $productDetail = ProductVariant::findOrFail($id);
            $productDetail->update([
                'price' => $request->price,
            ]);
            toastr()->success('Đã sửa giá 1 sản phẩm', 'Thành công');
            return back();
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }
    public function updatequantitystock(Request $request, $id)
    {
        try {
            $productVariant = ProductVariant::findOrFail($id);
            $productVariant->total_quantity_stock = $request->total_quantity_stock;
            $productVariant->save();
            toastr()->success('Đã sửa số lượng sản phẩm', 'Thành công');
            return back();
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Product::with('images')->findOrFail($id);

        $categories = Category::query()->latest()->get();
        $categoryproducts = CategoryProduct::query()->where('product_id', $id)->get();
        foreach ($categoryproducts as $categoryproduct) {
            $categoryArray[] = $categoryproduct->category_id;
        }
        $sizes = Size::query()->get();
        $colors = Color::query()->get();
        return view('admin.product.edit', compact('data', 'categories', 'categoryArray'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $model = Product::findOrFail($id);
            $model->fill($request->all());
            if ($request->hasFile('newimage')) {
                $file = $request->file('newimage');
                $folder = 'images/admin/product';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $oldimage = str_replace('storage/', '', $model->image);
                if (Storage::exists($oldimage)) {
                    Storage::delete($oldimage);
                }
                $model->image = $filePathAfterUpload;
            } else {
                $model->image = $request->input('currentimage');
            }
            $model->save();
            $model->categories()->sync($request->category);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $folder = 'images/admin/ImageProduct';
                    $fileaddPathAfterUpload = Storage::put($folder, $image);
                    $fileaddPathAfterUpload = 'storage/' . $fileaddPathAfterUpload;
                    $imageModel = new Image();
                    $imageModel->product_id = $model->id;
                    $imageModel->image = $fileaddPathAfterUpload;
                    $imageModel->save();
                }
            }
            toastr()->success('Đã sửa thông tin sản phẩm', 'Thành công');
            return to_route('admin.product.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        try {
            $product->delete();
            toastr()->success('Đã xóa 1 sản phẩm', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }
}
