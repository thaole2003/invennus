<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Rules\EmployeeStoreRule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=User::with('store')->latest('created_at')->paginate(5);
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data= Store::all();
        return view('admin.user.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'role' => ['required', 'in:admin,user,employee'],
            'store_id' => ['nullable', new EmployeeStoreRule],
        ]);
        try{
            $model = new User();
            $model->fill($request->all());
            if($request->hasFile('avt')){
                $image = $request->file('avt');
                $folder = 'images/user';
                $imageName =Storage::put($folder,$image);
                $imageName= 'storage/' . $imageName;
                $model->avt = $imageName;
            }
            $model->save();
            toastr()->success('Thêm thành công 1 người dùng !','Đã sửa');
            return to_route('admin.users.index');
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
        $data= Store::all();

        $model = User::findOrFail($id);
        return view('admin.user.edit',compact('data','model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        //
        // dd($request->all());
        $request->validate([
            'role' => ['required', 'in:admin,user,employee'],
            'store_id' => ['nullable', new EmployeeStoreRule],
        ]);
        try{
            $model = User::findOrFail($id);
            $model->fill($request->all());
            $model->fill($request->all());
            if($model->role=='user' || $model->role=='admin'){
                $model->store_id=null;
            }
            if($request->hasFile('new_avt')){
                $image = $request->file('new_avt');
                $folder = 'images/user';
                $imageName =Storage::put($folder,$image);
                $imageName= 'storage/' . $imageName;
                $oldFilePath = str_replace('storage/', '', $model->avt); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
                $model->avt = $imageName;
            }else{
                $model->avt = $request->input('current_avt');
            }
            $model->save();
            toastr()->success('Sửa thành công 1 người dùng !','Đã sửa');
            return to_route('admin.users.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            if ($user->avt) {
                $oldFilePath = str_replace('storage/', '', $user->avt); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            toastr()->success('Xóa thành công 1 người dùng !','Đã xóa');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra','Thử lại sau');
            return back();
        }
    }
}
