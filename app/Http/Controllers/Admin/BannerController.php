<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Http\Requests\Banner\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Banner::latest('created_at')->paginate(5);
        return view('admin.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBannerRequest $request)
    {
        //
        try {
            $model = new Banner();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'images/banner';
                $imageName = Storage::put($folder, $image);
                $imageName = 'storage/' . $imageName;
                $oldimage = str_replace('storage/', '', $model->image);
                if (Storage::exists($oldimage)) {
                    Storage::delete($oldimage);
                }
                $model->image = $imageName;
            }
            toastr()->success('Thêm thành công 1 banner','Thành công');
            $model->save();
            return to_route('admin.banner.index')->with('msg', ['success' => true, 'message' => 'Thêm thành công!']);
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
        $data = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        //
        $data = Banner::findOrFail($id);
        $data->fill($request->all());
        if ($request->hasFile('newimage')) {
            if ($data->image) {
                $oldFilePath = str_replace('storage/', '', $data->image); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            $image = $request->file('newimage');
            $folder = 'images/categories';
            $imageName = Storage::put($folder, $image);
            $imageName = 'storage/' . $imageName;
            $data->image = $imageName;
        } else {
            $data->image =  $request->input('currentimage');
        }
        $data->save();
        return to_route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
        try {
            if ($banner->image) {
                $oldFilePath = str_replace('storage/', '', $banner->image);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            $banner->delete();
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Banner deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
