<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\CreateSizeRequest;
use App\Http\Requests\Size\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:sizes.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        //
        $data = Size::latest('created_at')->get();
        return view('admin.size.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSizeRequest $request)
    {
        //
        try {
            $model = new Size();
            $model->fill($request->all());

            $model->save();
            toastr()->success('Thêm thành công 1 kích cỡ','Thành công');
            return to_route('admin.size.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
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
        $data = Size::findOrFail($id);
        return view('admin.size.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, string $id)
    {
        //
        $data = Size::findOrFail($id);
        $data->fill($request->all());
        toastr()->success('Sửa thành công 1 kích cỡ','Thành công');
        $data->save();
        return to_route('admin.size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        //
        try {
            $size->delete();
            toastr()->success('Xóa thành công 1 kích cỡ','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
