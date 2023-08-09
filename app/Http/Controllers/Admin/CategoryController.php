<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Category::latest('created_at')->paginate(5);
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $model = new Category();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            $folder = 'images/categories';
            $imageName =Storage::put($folder,$image);
            $imageName= 'storage/' . $imageName;
            $model->image = $imageName;
        }
        $model->save();
        return to_route('admin.category.index')->with('msg', ['success' => true, 'message' => 'Thêm thành công!']);
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
        $data= Category::findOrFail($id);
        return view('admin.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data= Category::findOrFail($id);
        $data->fill($request->all());
        if($request->hasFile('newimage')){
            if ($data->image) {
                $oldFilePath = str_replace('storage/', '', $data->image); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            $image = $request->file('newimage');
            $folder = 'images/categories';
            $imageName =Storage::put($folder,$image);
            $imageName= 'storage/' . $imageName;
            $data->image = $imageName;
        }else{
            $data->image =  $request->input('currentimage');
        }
        $data->save();
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        try {
            if ($category->image) {
                $oldFilePath = str_replace('storage/', '', $category->image); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            $category->delete();
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Category deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
