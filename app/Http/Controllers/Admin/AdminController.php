<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admins.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()
            ->where('role', 'admin')
            ->where('name', '!=', 'Super Admin')
            ->latest()
            ->get();
        return view('admin.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::query()
        ->where('name', '!=', 'super-admin')
        ->latest()
        ->get();
        return view('admin.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $model = new User();
            $model->fill($request->all());
            $model->role = 'admin';
            if ($request->hasFile('avt')) {
                $image = $request->file('avt');
                $folder = 'images/admin';
                $imageName = Storage::put($folder, $image);
                $imageName = 'storage/' . $imageName;
                $model->avt = $imageName;
            }
            $model->save();
            $role = Role::find($request->roles); // Lấy vai trò từ ID
            if ($role) {
                $model->assignRole($role); // Gán vai trò cho người dùng
            }
            toastr()->success('Thêm thành công admin !', 'Đã sửa');
            return to_route('admin.admins.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
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
        $model = User::findOrFail($id);
        $roles = Role::query()
        ->where('name', '!=', 'super-admin')
        ->latest()
        ->get();
        return view('admin.admin.edit', compact('model', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if($id === 1){
                toastr()->error('Không thể sửa quản trị viên cấp cao nhất', 'Thất bại');
                return to_route('admin.admins.index');
            }
            $model = User::findOrFail($id);
            $model->role = 'admin';
            $model->fill($request->all());
            $model->fill($request->all());

            if ($request->hasFile('new_avt')) {
                $image = $request->file('new_avt');
                $folder = 'images/admin';
                $imageName = Storage::put($folder, $image);
                $imageName = 'storage/' . $imageName;
                $oldFilePath = str_replace('storage/', '', $model->avt); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
                $model->avt = $imageName;
            } else {
                $model->avt = $request->input('current_avt');
            }
            $model->save();

            $model->roles()->detach();

            $role = Role::find($request->roles); // Lấy vai trò từ ID
            if ($role) {
                $model->assignRole($role); // Gán vai trò cho người dùng
            }
            toastr()->success('Sửa thành công admin !', 'Đã sửa');
            return to_route('admin.admins.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            if($id == 12){
                toastr()->error('Không thể xóa quản trị viên cấp cao nhất', 'Thất bại');
                return back();
            }

            $data = User::query()->findOrFail($id);
            $data->delete();
            if ($data->avt) {
                $oldFilePath = str_replace('storage/', '', $data->avt);
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            toastr()->success('Xóa thành công admin!', 'Đã xóa');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đã có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }
}
