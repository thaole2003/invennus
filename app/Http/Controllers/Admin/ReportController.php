<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetails;
use Carbon\Carbon;
use DateTime;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class ReportController extends Controller
{
    public function reportRevenue()
    {
        $date_start = null;
        $date_end = null;

        // Nếu cả hai ngày đều là null, thì sử dụng ngày hiện tại và trừ đi 12 tháng
        if ($date_start === null && $date_end === null) {
            $end_date = Carbon::now()->month(11)->endOfMonth()->year(2023);
            $start_date = $end_date->copy()->subMonths(12);
        } else {
            $start_date = new DateTime($date_start);
            $end_date = new DateTime($date_end);
        }

        $query = Bill::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('SUM(total_price) as revenue'));

        if ($date_start !== null && $date_end !== null) {
            $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$date_start, $date_end]);
        } else {
            $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$start_date, $end_date]);
        }

        $revenueData = $query
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->get();

        $current_date = Carbon::now()->subYear()->startOfMonth();
        $end_date = Carbon::now()->startOfMonth();
        // dd($current_date, $end_date);
        $months_years = [];

        while ($current_date <= $end_date) {
            $months_years[] = [
                'month' => $current_date->format('m'),
                'year' => $current_date->format('Y'),
            ];

            $current_date->addMonth();
        }
        return view('admin.InventoryEntry.thongke', compact('revenueData', 'months_years'));
    }

    // public function filterRevenue(Request $request)
    // {
    //     $date_start = $request->input('date_start');
    //     $date_end = $request->input('date_end');
    //     $start_date = null;
    //     $end_date = null;

    //     $query = Bill::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('SUM(total_price) as revenue'));

    //     if ($date_start !== null && $date_end !== null) {
    //         $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$date_start, $date_end]);
    //         $start_date = Carbon::createFromFormat('Y-m-d', $date_start);
    //     } else {
    //         // If date_start and date_end are null, show revenue for the last 12 months
    //         $end_date = now();
    //         $start_date = $end_date->copy()->subMonths(11);

    //         $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$start_date, $end_date]);
    //     }

    //     $revenueData = $query
    //         ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
    //         ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
    //         ->get();

    //     $months_years = [];

    //     $current_date = $start_date->copy(); // Start from the calculated start date

    //     while ($current_date <= $end_date) {
    //         $months_years[] = [
    //             'month' => $current_date->format('m'),
    //             'year' => $current_date->format('Y'),
    //         ];

    //         $current_date->modify('+1 month');
    //     }
    //     dd($months_years);
    //     return view('admin.InventoryEntry.thongke', compact('revenueData', 'months_years'));
    // }
    // public function filterRevenue(Request $request)
    // {
    //     $date_start = $request->input('date_start');
    //     $date_end = $request->input('date_end');
    //     $start_date = null;
    //     $end_date = null;

    //     $query = Bill::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('SUM(total_price) as revenue'));

    //     if ($date_start !== null && $date_end !== null) {
    //         $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$date_start, $date_end]);
    //         $start_date = Carbon::createFromFormat('Y-m-d', $date_start);
    //         $end_date = Carbon::createFromFormat('Y-m-d', $date_end);
    //     } else {
    //         // If date_start and date_end are null, show revenue for the last 12 months
    //         $end_date = now();
    //         $start_date = $end_date->copy()->subMonths(11);

    //         $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$start_date, $end_date]);
    //     }

    //     $revenueData = $query
    //         ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
    //         ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
    //         ->get();

    //     $months_years = [];

    //     if ($date_start === null || $date_end === null) {
    //         // If date_start or date_end is null, use the while loop
    //         $current_date = $start_date->copy(); // Start from the calculated start date

    //         while ($current_date <= ($end_date ?: now())) {
    //             $months_years[] = [
    //                 'month' => $current_date->format('m'),
    //                 'year' => $current_date->format('Y'),
    //             ];

    //             $current_date->modify('+1 month');
    //         }
    //     } else {
    //         // If date_start and date_end are specified, create a single entry for that range
    //         $months_years[] = [
    //             'month' => $start_date->format('m'),
    //             'year' => $start_date->format('Y'),
    //         ];
    //     }

    //     dd($months_years);
    //     return view('admin.InventoryEntry.thongke', compact('revenueData', 'months_years'));
    // }

    public function filterRevenue(Request $request)
    {
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $start_date = null;
        $end_date = null;

        $query = Bill::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('SUM(total_price) as revenue'));

        if ($date_start !== null && $date_end !== null) {
            $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$date_start, $date_end]);
            $start_date = Carbon::createFromFormat('Y-m-d', $date_start);
            $end_date = Carbon::createFromFormat('Y-m-d', $date_end);
        } else {
            // If date_start and date_end are null, show revenue for the last 12 months
            $end_date = now();
            $start_date = $end_date->copy()->subMonths(11);

            $query->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [$start_date, $end_date]);
        }

        $revenueData = $query
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->get();

        $manger = [];

        if ($date_start !== null && $date_end !== null) {
            // If date_start and date_end are specified, calculate the difference in months
            $months_difference = $start_date->diffInMonths($end_date);

            for ($i = 0; $i <= $months_difference; $i++) {
                $manger[] = [
                    'month' => $start_date->copy()->addMonths($i)->format('m'),
                    'year' => $start_date->copy()->addMonths($i)->format('Y'),
                ];
            }
        } else {
            // If date_start or date_end is null, use the while loop
            $current_date = $start_date->copy(); // Start from the calculated start date

            while ($current_date <= $end_date) {
                $manger[] = [
                    'month' => $current_date->format('m'),
                    'year' => $current_date->format('Y'),
                ];

                $current_date->modify('+1 month');
            }
        }

        // dd($manger);
        return view('admin.InventoryEntry.thongke', compact('revenueData', 'manger'));
    }

    public function reportProduct()
    {
        $topProducts = BillDetails::select('product_sku', DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(quantity * price) as total_amount'))
            ->groupBy('product_sku')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        return view('admin.InventoryEntry.product', compact('topProducts'));
    }

    public function filterProduct(Request $request)
    {
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $query = BillDetails::select('product_sku', DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(quantity * price) as total_amount'));

        if ($date_start !== null && $date_end !== null) {
            $query->whereBetween('created_at', [$date_start, $date_end]);
        }

        $topProducts = $query
            ->groupBy('product_sku', 'date')
            ->orderByDesc('total_quantity')
            ->orderBy('date')
            ->limit(5)
            ->get();

        return view('admin.InventoryEntry.product', compact('topProducts'));
    }
}
