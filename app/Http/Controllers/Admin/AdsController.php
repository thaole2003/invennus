<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\CreateAdsRequest;
use App\Http\Requests\Ads\UpdateAdsRequest;
use Illuminate\Http\Request;
use App\Models\Ads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ads.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        //
        $data = Ads::latest('created_at')->get();
        return view('admin.ads.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdsRequest $request)
    {
        //
        try {
            // dd($request->all());
            $model = new Ads();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'images/ads';
                $imageName = Storage::put($folder, $image);
                $imageName = 'storage/' . $imageName;
                $oldimage = str_replace('storage/', '', $model->image);
                if (Storage::exists($oldimage)) {
                    Storage::delete($oldimage);
                }
                $model->image = $imageName;
            }
            toastr()->success('Thêm thành công','Thành công');
            $model->save();
            return to_route('admin.ads.index');
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
        $data = Ads::findOrFail($id);
        return view('admin.ads.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdsRequest $request, string $id)
    {
        //
        $data = Ads::findOrFail($id);
        $data->fill($request->all());
        if ($request->hasFile('newimage')) {
            if ($data->image) {
                $oldFilePath = str_replace('storage/', '', $data->image);
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
        toastr()->success('Đã sửa banner','Thành công');
        $data->save();
        return to_route('admin.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ads $ads)
    {
        //
        try {
            if ($ads->image) {
                $oldFilePath = str_replace('storage/', '', $ads->image);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            toastr()->success('Đã xóa banner','Thành công');
            $ads->delete();
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
