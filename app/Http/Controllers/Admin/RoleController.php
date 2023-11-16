<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:roles.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        $roles = Role::query()
            ->where('name', '!=', 'super-admin')
            ->latest()
            ->get();
        return view('admin.role.index', compact('roles'));
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
        $permissions = Permission::query()->latest()->get();
        return view('admin.role.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        try {
            $role = Role::create(['name' => $request->input('name')]);

            // Lấy danh sách ID của quyền từ request
            $permissionIds = $request->input('permission');

            // Lấy danh sách quyền dựa trên ID
            $permissions = Permission::whereIn('id', $permissionIds)->get();

            // Gán quyền cho vai trò
            $role->syncPermissions($permissions);

            toastr()->success('Thêm vai trò thành công', 'Thành công');
            return to_route('admin.roles.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
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
        $role = Role::query()->findOrFail($id);
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        // Lấy thông tin của vai trò cần cập nhật
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionIds = $request->input('permission', []);

        // Lấy danh sách quyền dựa trên ID
        $permissions = Permission::whereIn('id', $permissionIds)->get();

        // Gán quyền cho vai trò
        $role->syncPermissions($permissions);

            toastr()->success('Cập nhật vai trò thành công', 'Thành công');
            return redirect()->route('admin.roles.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->permissions()->detach();
            $role->delete();
            toastr()->success('Xóa vai trò thành công', 'Thành công');
            return redirect()->route('admin.roles.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
}
