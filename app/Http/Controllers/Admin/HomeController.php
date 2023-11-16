<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Post;
use App\Models\Product;
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
        $vender = Vendor::query()->count();
        $last7DaysData = Bill::select(DB::raw('DATE(created_at) as date'))
            ->selectRaw('SUM(total_price) as revenue, COUNT(*) as totalBills')
            ->whereDate('created_at', '>=', now()->subDays(7)) // Lấy dữ liệu trong 7 ngày gần nhất
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'))
            ->get();
        // dd($last7DaysData);
        return view('admin.layouts.components.main', compact('product', 'post', 'user', 'vender', 'last7DaysData'));
    }
}
