<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bills.resource', ['only' => ['index', 'show', 'updateStatus']]);
    }

    public function index()
    {
        $bills = Bill::latest()->paginate(10);
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
    public function edit($id){
        $bills = Bill::query()->where([
            'id' => $id
        ])->first();
        return view('admin.bills.changeInfo', compact('bills'));
    }
    public function update(Request $request,String $id){
        $bill = Bill::findOrFail($id);
        if($bill->status==='pendding'){
         $request->validate([
             'name' => 'required',
             'address' => 'required',
             'email' => 'required|email',
             'phone' => [
                 'required',
                 function ($attribute, $value, $fail) {
                     if (!preg_match('/^\+?[0-9-]+$/', $value)) {
                         $fail("Số điện thoại không hợp lệ.");
                     }
                 },
             ],
         ], [
             'name.required' => 'Tên không được bỏ trống.',
             'address.required' => 'Vui lòng nhập địa chỉ.',
             'email.required' => 'Vui lòng nhập địa chỉ email.',
             'email.email' => 'Địa chỉ email không hợp lệ.',
             'phone.required' => 'Vui lòng nhập số điện thoại.',
         ]);
         $bill->fill($request->all());
         $bill->save();
         toastr()->success('Cập nhật thông tin thành công!','Thành công');
         return to_route('admin.bill.detail');
        }else{
         toastr()->error('Bạn chỉ có thể cập nhật khi đơn hàng chờ xử lí!','Thất bại');
         return to_route('admin.bill.detail');
        }
    }

    public function updateStatus(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->status = $request->status;
        $bill->save();
        toastr()->success('Sửa trạng thái thành công đơn hàng', 'Thành công');
        if($bill->status === 'cancelled'){
           $bill_details =  BillDetails::where('bill_id', $bill->id)->get();
           if($bill_details){
            foreach($bill_details as $item => $value){
                $vartiant = ProductVariant::findOrFail($value->product_variant_id);
                $vartiant->total_quantity_stock += $value->quantity;
                $vartiant->save();
            }
           }
        }
        $content = [
            'title' => 'Đơn hàng của bạn đã được thay đổi trạng thái',
            'message' => "Đơn hàng của bạn đã được cập nhật,vui lòng truy cập website xem thông tin đơn hàng"
        ];
        $user = User::findOrFail($bill->user_id);
        event(new NotificationEvent($user, $content));
        return response()->json($bill);
    }
}
