<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use stdClass;

use function Laravel\Prompts\select;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->paginate(4);
        $banner = Banner::latest('id')->paginate(2);
        // $data = Product::with('images')->get();
        $products = Product::with('images')->get();
        // dd(@do $products->images);
        $banners = Banner::all();
        // dd($banner);
        return view('client.layouts.components.main', compact('category', 'products', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function product(string $id)
    // {
    //     $product = Product::query()->with('images')->findOrFail($id);
    //     // $colors = ProductVariant::where('product_id', $id)
    //     //     ->select('product_variants.color_id', 'colors.name')
    //     //     ->join('colors', 'colors.id', '=', 'product_variants.color_id')
    //     //     ->groupBy('product_variants.color_id')->get();
    //     // $sizes = ProductVariant::query()
    //     //     ->select('product_variants.size_id', 'sizes.name')
    //     //     ->join('sizes', 'sizes.id', '=', 'product_variants.size_id')
    //     //     ->where('product_variants.product_id', $id)
    //     //     ->groupBy('product_variants.size_id')->get();

    //     // dd($colors->id);
    //     $szArr = new stdClass;
    //     foreach ($product->variants as $item) {
    //         if ($item->storeVariant->quantity > 0) {
    //             $szArr->size = $item->size->name;
    //             $szArr->sizes = $item;
    //             $szArr->color = $item->color->name;
    //             $szArr->color_id = $item->color->id;
    //             $item;
    //         }
    //     }
    //     // dd($product->variants);

    //     // $color = ProductVariant::query()->findOrFail($id);
    //     // dd($product->variants);
    //     // $product = ProductVariant::select('product_id')->distinct()->where('product_id', $id)->get();
    //     // dd($product[0]->product[0]->images);
    //     // $product = Product::select('product_variants.color_id', 'product_variants.size_id', 'products.id')
    //     //     ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
    //     //     ->distinct()
    //     //     ->get();
    //     // dd($product);
    //     return view('client.products.productDetail', compact('product', 'szArr'));
    // }
    public function product(string $id)
    {
        $product = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
        ])->findOrFail($id);

        $groupbyColors = [];
        $groupbySizes = [];
        // dd($product->variants);
        foreach ($product->variants as $variant) {

            $color = $variant->color;
            $size = $variant->size;

            if (!in_array($color, $groupbyColors)) {
                $groupbyColors[] = $color;
            }
            if (!in_array($size, $groupbySizes)) {
                $groupbySizes[] = $size;
            }
        }
        return view('client.products.productDetail', compact('product', 'groupbyColors', 'groupbySizes'));
    }

    public function checkQuantity(Request $request)
    {
        $getcolors = ProductVariant::query()
            ->where([
                'product_id' => $request->product_id,
                'size_id' => $request->size,
            ])->where('total_quantity_stock', '>', 0)->get();

        return response()->json([
            'data' => $getcolors,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
