<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Stock;
use App\Models\StockDetail;

class InventoryEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::query()->get();
        return view('admin.InventoryEntry.index', compact('stocks'));
    }

    public function InventoryEntryDetail($id)
    {
        $stockDetails = StockDetail::query()->where([
            'stock_id' => $id
        ])->first();
        return view('admin.InventoryEntry.detail', compact('stockDetails'));
    }


    public function create()
    {

        $productVariants = ProductVariant::query()
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
            ->leftJoin('sizes', 'product_variants.size_id', '=', 'sizes.id')
            ->select(
                'product_variants.id',
                'products.title',
                'product_variants.color_id',
                'product_variants.size_id',
                'colors.name as color_name', // Lấy tên màu từ bảng colors
                'sizes.name as size_name'    // Lấy tên kích thước từ bảng sizes
            )
            ->get();

        $vender = Vendor::query()->get();
        // dd($productVariants);
        return view('admin.InventoryEntry.inport', compact('productVariants', 'vender'));
    }

    public function store(Request $request)
    {
        $vender = $request->vender;
        $selectedSuggestions = $request->input('selectedSuggestions');

        // Tạo một bản ghi mới trong bảng stock
        $stock = new Stock();
        $stock->vender_id = $vender;
        $stock->total_price = $request->totalPrice; // Bạn có thể cập nhật giá trị này sau khi tính toán tổng giá trị
        $stock->save();
        // Lấy id của bản ghi stock vừa được tạo
        $stockId = $stock->id;
        // Thêm dữ liệu vào bảng stock_detail
        foreach ($selectedSuggestions as $suggestion) {
            $stockDetail = new StockDetail();
            $stockDetail->stock_id = $stockId;
            $stockDetail->product_variant_id = $suggestion['id'];
            $stockDetail->price = $suggestion['price'];
            $stockDetail->quantity = $suggestion['quantity'];
            $stockDetail->save();
            $productVariant = ProductVariant::find($suggestion['id']);
            $productVariant->total_quantity_stock += $suggestion['quantity'];
            $productVariant->save();
        }
        return response()->json(['data' => $selectedSuggestions, 'vender' => $vender]);
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
