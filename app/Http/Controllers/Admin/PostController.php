<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategories;
use App\Models\PostCategoryPost;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:posts.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        //
        $data = Post::latest('created_at')->get();
        return view('admin.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCate = PostCategories::all();
        return view('admin.post.create', compact('postCate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $model = new Post();
            $model->fill($request->all());
            $model->slug = Str::slug($request->title);
            // $model->user_id = ;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'images/post';
                $imageName = Storage::put($folder, $image);
                $imageName = 'storage/' . $imageName;
                $model->image = $imageName;
            }
            $model->save();
            if (count($request->input('postCate'))) {
                foreach ($request->input('postCate') as $postCate) {
                    $PostCategoryPost = new PostCategoryPost();
                    $PostCategoryPost->categorypost_id = $postCate;
                    $PostCategoryPost->post_id = $model->id;
                    $PostCategoryPost->save();
                }
            }
            toastr()->success('Thêm thành công 1 bài viết','Thành công');
            return to_route('admin.post.index');
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
        $data = Post::findOrFail($id);
        $category = PostCategories::all();
        $postcategory = PostCategoryPost::query()->where('post_id', $id)->get();
        foreach ($postcategory as $postcate) {
            $datas[] = $postcate->categorypost_id;
        }
        return view('admin.post.edit', compact('data', 'category', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Post::findOrFail($id);
        $data->fill($request->all());
        $slug = Str::slug($request->name);
        $data->slug = $slug;
        if ($request->hasFile('newimage')) {
            $image = $request->file('newimage');
            $folder = 'images/post';
            $imageName = Storage::put($folder, $image);
            $imageName = 'storage/' . $imageName;

            if ($data->image) {
                $oldFilePath = str_replace('storage/', '', $data->image); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            $data->image = $imageName;

        } else {
            $data->image =  $request->input('currentimage');
        }
        toastr()->success('Sửa thành công 1 bài viết','Thành công');
        $data->save();
        $data->category_posts()->sync($request->postCate);
        return to_route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $Post)
    {
        //
        try {
            $Post->delete();
            if ($Post->image) {
                $oldFilePath = str_replace('storage/', '', $Post->image);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            toastr()->success('Xóa thành công 1 bài viết','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
