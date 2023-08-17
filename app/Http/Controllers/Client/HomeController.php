<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

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

        // $data = Product::with(['images' => function ($query) {
        //     $query->take(2);
        // }])->findOrFail(8);
        $products = Image::all();
        $banners = Banner::all();
        // dd($banner);
        return view('client.layouts.components.main', compact('category', 'products', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function product($id)
    {
        $product = Product::where('id', $id)->get();
        return view('client.products.productDetail', compact('product'));
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
