<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function revenue7day()
    {
        $last7DaysData = Bill::select(DB::raw('DATE(created_at) as date'))
            ->selectRaw('SUM(total_price) as revenue, COUNT(*) as totalBills')
            ->whereDate('created_at', '>=', now()->subDays(7)) // Lấy dữ liệu trong 7 ngày gần nhất
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'))
            ->get();
        // dd($last7DaysData);
        return view('admin.layouts.components.main', compact('last7DaysData'));
    }
}
