<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:inventoryentrys.resource', ['only' => ['index', 'calculateMonthlyRevenue', 'filter']]);
    }
    public function index()
    {
        $productVariants = ProductVariant::query()
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->select('products.title', 'product_variants.color_id', 'product_variants.size_id')
            ->get();
        // dd($productVariants);
        return view('admin.InventoryEntry.index', compact('productVariants'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function calculateMonthlyRevenue()
    {
        $revenueData = Bill::select(DB::raw('MONTH(created_at) as month'))
            ->selectRaw('SUM(total_price) as revenue')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
        // dd($revenueData);
        return view('admin.InventoryEntry.thongke', compact('revenueData'));
    }

    public function filter(Request $request)
    {
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        if ($date_start === null && $date_end === null) {
            $revenueData = Bill::select(DB::raw('MONTH(created_at) as month'))
                ->selectRaw('SUM(total_price) as revenue')
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy(DB::raw('MONTH(created_at)'))
                ->get();
        } else {
            $revenueData = Bill::select(DB::raw('MONTH(created_at) as month'))
                ->selectRaw('SUM(total_price) as revenue')
                ->whereBetween('created_at', [$date_start, $date_end])
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy(DB::raw('MONTH(created_at)'))
                ->get();
        }
        return view('admin.InventoryEntry.thongke', compact('revenueData'));
    }
}
