<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:post-categories.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {

        $data = PostCategories::latest('created_at')->get();
        return view('admin.postCategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.postCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $model = new PostCategories();
            $model->fill($request->all());
            toastr()->success('Thêm thành công 1 danh mục của bài viết','Thành công');
            $model->save();
            return to_route('admin.postCategory.index');
        } catch (\Exception $exception) {
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
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
        $data = PostCategories::findOrFail($id);
        return view('admin.postCategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = PostCategories::findOrFail($id);
        $data->fill($request->all());
        toastr()->success('Sửa thành công 1 danh mục của bài viết','Thành công');
        $data->save();
        return to_route('admin.postCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategories $postCategory)
    {
        //
        try {
            $postCategory->delete();
            toastr()->success('Xóa thành công 1 danh mục của bài viết','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
