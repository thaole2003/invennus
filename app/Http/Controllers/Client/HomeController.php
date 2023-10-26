<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Store;
use App\Models\StoreVariant;
use App\Models\wishlist;
use Illuminate\Http\Request;
use stdClass;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->paginate(4);
        $banner = Banner::latest('id')->paginate(2);
        $products = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
        ])->paginate(6);
        $colorIds = ProductVariant::where('total_quantity_stock', '>', 0)
            ->where('product_id', 1)
            ->with('color')
            ->groupBy('color_id')
            ->pluck('color_id');
        $sizeIds = ProductVariant::where('total_quantity_stock', '>', 0)
            ->where('product_id', 1)
            ->with('color')
            ->groupBy('size_id')
            ->pluck('size_id');
        // dd($products->variants->product_id);
        $banners = Banner::all();
        $carts = Cart::query()->latest()->get();
        $countCart = Cart::query()->count();
        $wishlists = wishlist::query()->latest()->where('user_id', 1)->get();

        return view('client.layouts.components.main', compact('category', 'products', 'banners', 'carts', 'countCart', 'wishlists', 'colorIds', 'sizeIds'));
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

        $store_isset = StoreVariant::whereHas('variant', function ($query) use ($id) {
            $query->where('product_id', $id);
        })->where('quantity', '>', 0)->pluck('store_id')->unique();
        $stores = Store::whereIn('id', $store_isset)->get();
        $product = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
        ])->findOrFail($id);
        $totalQuantity = ProductVariant::where('product_id', $id)->sum('total_quantity_stock');
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
        return view('client.products.productDetail', compact('product', 'groupbyColors', 'groupbySizes', 'stores', 'totalQuantity'));
    }

    public function checkQuantity(Request $request)
    {
        $getsizes = ProductVariant::query()
            ->where([
                'product_id' => $request->product_id,
                'color_id' => $request->color,
            ])->where('total_quantity_stock', '>', 0)->get();

        return response()->json([
            'data' => $getsizes,
        ]);
    }
    public function search(Request $request)
    {
        $category = $request->category_id;
        $keyword = $request->input('keyword');
        if ($keyword) {
            $products = Product::where('title', 'like', '%' . $keyword . '%')->with([
                'variants' => function ($query) {
                    $query->with('color', 'size');
                },
                'images',
                'categories',
            ])->get();
            return view('client.search', compact('products'));
        }
        if ($category) {
            $products = Product::with([
                'variants' => function ($query) {
                    $query->with('color', 'size');
                },
                'images',
                'categories',
            ])
                ->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_id', $category);
                })
                ->get();
            return view('client.search', compact('products'));
        }
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
