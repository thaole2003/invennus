<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::query()->latest()->get();
        return view('admin.bills.billDetail', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $bills = Bill::query()->where([
            'id' => $id
        ])->first();
        return view('admin.bills.billProduct', compact('bills'));
    }

    public function updateStatus(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->status = $request->status;
        $bill->save();
        toastr()->success('Sửa trạng thái thành công đơn hàng','Thành công');
        $content = [
            'title' => 'Đơn hàng của bạn đã được thay đổi trạng thái',
            'message' => "Đơn hàng của bạn đã được cập nhật,vui lòng truy cập website xem thông tin đơn hàng"
        ];
        $user = User::findOrFail($bill->user_id);
        event(new NotificationEvent($user, $content));
        return response()->json($bill);
    }
}
