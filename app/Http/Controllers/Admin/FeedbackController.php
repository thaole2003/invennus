<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackRequest;
use App\Http\Requests\Feedback\FeedbackUpdateRequest;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Feedback::latest('created_at')->get();
        return view('admin.feedback.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::query()->get();
        return view('admin.feedback.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackRequest $request)
    {
        //

        try {
            $model = new Feedback();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'images/feedbacks';
                $imageName = Storage::put($folder, $image);
                $imageName = 'storage/' . $imageName;
                $model->image = $imageName;
            }
            toastr()->success('Thêm thành công feedback', 'Thành công');
            $model->save();
            return to_route('admin.feedbacks.index');
        } catch (\Exception $exception) {
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
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
        $data = Feedback::findOrFail($id);
        return view('admin.feedback.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeedbackUpdateRequest $request, string $id)
    {
        //
        $data = Feedback::findOrFail($id);
        if ($request->hasFile('newimage')) {
            $image = $request->file('newimage');
            $folder = 'images/feedbacks';
            $imageName = Storage::put($folder, $image);
            $imageName = 'storage/' . $imageName;
            if ($data->image) {
                $oldFilePath = str_replace('storage/', '', $data->image);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            $data->image = $imageName;
        } else {
            $data->image =  $request->input('currentimage');
        }
        $data->save();
        toastr()->success('Sửa thành công feedback', 'Thành công');
        return to_route('admin.feedbacks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
        try {
            $feedback->delete();
            if ($feedback->image) {
                $oldFilePath = str_replace('storage/', '', $feedback->image);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            toastr()->success('Xóa thành công 1 feedback', 'Thành công');

            return redirect()->back();
        } catch (\Exception $exception) {
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            Log::error($exception->getMessage());
            return back();
        }

    }
}
