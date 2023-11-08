<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetails;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class ReportController extends Controller
{
    public function reportRevenue()
    {
        $revenueData = Bill::select(DB::raw('MONTH(created_at) as month'))
            ->selectRaw('SUM(total_price) as revenue')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
        // dd($revenueData);
        return view('admin.InventoryEntry.thongke', compact('revenueData'));
    }

    public function filterRevenue(Request $request)
    {
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        FacadesSession::put('date_start', $request->input('date_start'));
        FacadesSession::put('date_end', $request->input('date_end'));
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

    public function reportProduct()
    {
        $topProducts = BillDetails::select('product_variant_id', BillDetails::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_variant_id')
            ->orderBy('total_quantity', 'desc')
            ->take(5)
            ->get();

        return view('admin.InventoryEntry.product', compact('topProducts'));
    }
}
