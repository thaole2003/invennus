<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Store::latest('created_at')->paginate(5);
        return view('admin.store.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStoreRequest $request)
    {
        //
        // dd($request->all());
        try {
            // dd($request->all());
            $model = new Store();
            $model->fill($request->all());
            // Tạo slug từ tên cửa hàng
            $slug = Str::slug($request->name);
            $model->slug = $slug;
            $model->save();
            return to_route('admin.store.index')->with('msg', ['success' => true, 'message' => 'Thêm thành công!']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
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
        $data = Store::findOrFail($id);
        return view('admin.store.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, string $id)
    {
        //
        $data = Store::findOrFail($id);
        $data->fill($request->all());
        $slug = Str::slug($request->name);
        $data->slug = $slug;
        $data->save();
        return to_route('admin.store.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
        try {
            $store->delete();
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Store deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
