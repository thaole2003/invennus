<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\CreateVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VendoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Vendor::latest('created_at')->paginate(5);
        return view('admin.vendor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVendorRequest $request)
    {
        try {
            $model = new Vendor();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm thành công nhà cung cấp mới','Thành công');
            return to_route('admin.vendors.index');
        } catch (\Exception $exception) {
            toastr()->error('Thêm thất bại nhà cung cấp mới','Thất bại');
            Log::error($exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Vendor::findOrFail($id);
        return view('admin.vendor.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, string $id)
    {
        //
        $data = Vendor::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        toastr()->success('Sửa thành công nhà cung cấp!','Thành công');
        return to_route('admin.vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
        try {
            $vendor->delete();
            toastr()->success('Xóa thành công nhà cung cấp!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
