<?php

namespace App\Http\Controllers\Client;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::query()->where('user_id', auth()->user()->id)->latest()->paginate(10);
        // dd($bills);
        return view('client.bills.billDetail', compact('bills'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $billDetail = BillDetails::with(['product', 'size', 'color'])->where('bill_id', $id)->get();

        return view('client.bills.billProduct', compact('billDetail'));
    }
    public function edit($id)
    {
        $bills = Bill::findOrFail($id);
        return view('client.bills.changeInfo', compact('bills'));
    }
    public function update(Request $request,string $id){
       $bill = Bill::findOrFail($id);
       if($bill->status==='pendding'){
        if($request->status=='cancelled'){
            $bill->fill($request->all());
            $bill->save();
            toastr()->success('Đã hủy đơn hàng!','Thành công');
        return to_route('bill.index');
        }
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
        return to_route('bill.index');
       }else{
        toastr()->error('Bạn chỉ có thể cập nhật khi đơn hàng chờ xử lí!','Thất bại');
        return to_route('bill.index');
       }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $currentDateTime = \Illuminate\Support\Carbon::now()->tz('Asia/Ho_Chi_Minh');
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
        $model = new Bill();
        $model->fill($request->all());
        $model->user_id = auth()->user()->id;
        $model->save();
        $cart_user = Cart::with('ProductVariant')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        foreach ($cart_user as $value) {
            $billDetail =  new BillDetails();
            $product_variant = ProductVariant::findOrFail($value['product_radiant']);
            $billDetail->product_name = $product_variant->product->title;
            $billDetail->product_sku = $product_variant->product->sku;
            $billDetail->product_image = $product_variant->product->image;
            $billDetail->color = $product_variant->color->name;
            $billDetail->size = $product_variant->size->name;
            if ($product_variant->product->sales && $product_variant->product->sales->start_date <= $currentDateTime && $product_variant->product->sales->end_date >= $currentDateTime){
                $price = $product_variant->price - $product_variant->product->sales->discount;
            }else{
                $price = $product_variant->price;
            }
            $billDetail->price = $price;
            $billDetail->quantity = $value['quantity'];
            $billDetail->bill_id = $model->id;
            $billDetail->save();
            $productVariant = ProductVariant::findOrFail($value['product_radiant']);
            $productVariant->total_quantity_stock = $productVariant->total_quantity_stock - $value['quantity'];
            $productVariant->save();
            Cart::destroy($value['id']);
        }
        toastr()->success('Tạo thành công 1 đơn hàng','Thành công');
        $content = [
            'title' => 'Bạn có 1 đơn hàng',
            'message' => "Người dùng " . auth()->user()->name . " vừa tạo 1 đơn hàng , vui lòng truy cập để xem thông tin đơn hàng"
        ];
        $user = User::where('role', 'admin')->first();
        event(new NotificationEvent($user, $content));
        return to_route('home');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momoPayment(Request $request)
    {
        // include "../common/helper.php";

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total_momo'];
        $orderId = time() . "";
        $redirectUrl = "http://invennus.test/";
        $ipnUrl = "http://invennus.test/";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // dd($secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);
    }

    public function vnpayPayment(Request $request)
    {
        if (isset($_POST['redirect'])) {
            $payment = new Transaction();
            $payment->user_id = auth()->user()->id;
            $payment->status = 'pending';
            $payment->payment_method = 'vnpay';
            $payment->point = $request->old_total_amount_input;
            $payment->price_promotion = $request->total_amount_input;
            $payment->verification = null;
            $payment->save();
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // url chuyển đến trang thanh toán
            $vnp_Returnurl = "http://datn-webstie-tro-oi1.test/vnpay-return"; // url redirect sau khi thanh toán xong
            $vnp_TmnCode = "M4WVGGAX"; //Mã website tại VNPAY
            $vnp_HashSecret = "GCJDLQSWQXFNASGVNESEOJRUUNQUZJYO"; //Chuỗi bí mật

            // $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_TxnRef = $payment->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            // $vnp_OrderInfo = $_POST['order_desc']; // thông tin đơn
            $vnp_OrderInfo = 'Thanh toán đơn hàng';
            // $vnp_OrderType = $_POST['order_type'];
            $vnp_OrderType = 'billpayment';
            // $vnp_Amount = $_POST['amount'] * 100;
            $vnp_Amount = $request->total_amount_input * 100;
            // $vnp_Locale = $_POST['language'];
            $vnp_Locale = 'vn';
            // $vnp_BankCode = $_POST['bank_code'];
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
                // "vnp_ExpireDate" => $vnp_ExpireDate
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            // $returnData = array(
            //     'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            // );


            // $paymentId = $payment->id;
            // dd($paymentId);
            session()->start();

            // Session::put('payment_id', $paymentId);
            header('Location: ' . $vnp_Url);
            die();
        }
    }
}
