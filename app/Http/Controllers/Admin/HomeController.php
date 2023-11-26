<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Post;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::query()->count();
        $post = Post::query()->count();
        $user = User::query()->count();
        $store = Store::query()->count();
        $vender = Vendor::query()->count();
        $ads = Ads::query()->count();
        $last7DaysData = Bill::select(DB::raw('DATE(created_at) as date'))
            ->selectRaw('SUM(total_price) as revenue, COUNT(*) as totalBills')
            ->whereDate('created_at', '>=', now()->subDays(7)) // Lấy dữ liệu trong 7 ngày gần nhất
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'))
            ->get();


        // thống kê 7 sản phẩm được bán nhiều nhất trong 7 ngày gần nhất
        // Thời điểm 7 ngày trước từ ngày hiện tại
        $sevenDaysAgo = now()->subDays(7);

        $top7Products = [];
        // BillDetails::select(
        //     'product_variants.product_id',
        //     'products.title as product_name',
        //     'sizes.name as size',
        //     'colors.name as color',
        //     'product_variants.price',
        //     'product_variant_id',
        //     BillDetails::raw('SUM(quantity) as total_quantity')
        // )
        //     ->join('product_variants', 'product_variants.id', '=', 'bill_details.product_variant_id')
        //     ->join('products', 'products.id', '=', 'product_variants.product_id')
        //     ->join('sizes', 'sizes.id', '=', 'product_variants.size_id')
        //     ->join('colors', 'colors.id', '=', 'product_variants.color_id')
        //     ->where('bill_details.created_at', '>=', $sevenDaysAgo) // Thêm điều kiện về thời gian
        //     ->groupBy('product_variant_id', 'products.title', 'sizes.name', 'colors.name', 'product_variants.price', 'product_variants.product_id')
        //     ->orderBy('total_quantity', 'desc')
        //     ->take(7) // Lấy 7 sản phẩm
        //     ->get();
        $top7Products = BillDetails::select('product_sku', DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(quantity * price) as total_amount'))
            ->where('created_at', '>=', $sevenDaysAgo)
            ->groupBy('product_sku')
            ->take(7)
            ->get();
        // dd($add);
        $fixedColors = ['#4e73df', '#1cc88a', '#36b9cc', '#d9534f', '#5bc0de', '#f0ad4e', '#5cb85c'];
        return view('admin.layouts.components.main', compact('product', 'post', 'user', 'vender', 'last7DaysData', 'top7Products', 'fixedColors', 'store', 'ads'));
    }
}
