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
    public function index()
    {

        $data = PostCategories::latest('created_at')->paginate(5);
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

            $model->save();
            return to_route('admin.postCategory.index')->with('msg', ['success' => true, 'message' => 'Thêm thành công!']);
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
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Size deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
