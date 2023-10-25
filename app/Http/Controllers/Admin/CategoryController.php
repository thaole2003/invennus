<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Category::withCount('products')->latest('created_at')->paginate(5);
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
    public function store(CreateCategoryRequest $request)
    {
        //
        try{
        $model = new Category();
        $model->fill($request->all());
        $slug = Str::slug($request->name);
            $model->slug = $slug;
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
        $data=Category::with('products')
        ->where('id',$id)
        ->latest('created_at')->paginate(5);
        return view('admin.category.show',compact('data'));
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
    public function update(UpdateCategoryRequest $request, string $id)
    {
        //
        $data= Category::findOrFail($id);
        $data->fill($request->all());
        $slug = Str::slug($request->name);
        $data->slug = $slug;
        if($request->hasFile('newimage')){

            $image = $request->file('newimage');
            $folder = 'images/categories';
            $imageName =Storage::put($folder,$image);
            $imageName= 'storage/' . $imageName;
            if ($data->image) {
                $oldFilePath = str_replace('storage/', '', $data->image); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
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
            $category->delete();
            if ($category->image) {
                $oldFilePath = str_replace('storage/', '', $category->image);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Category deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
