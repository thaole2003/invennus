<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;




class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions.resource', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy', 'importPermission', 'Export', 'Import']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Permission::query()->latest()->get();
        return view('admin.permission.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request)
    {
        try {
            $data = new Permission();
            $data->fill($request->all());
            $data->save();
            toastr()->success('Thêm quyền thành công', 'Thành công');
            return to_route('admin.permissions.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Permission::query()->findOrFail($id);
        return view('admin.permission.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Permission::query()->findOrFail($id);
            $data->fill($request->all());
            $data->save();
            toastr()->success('Cập nhật quyền thành công', 'Thành công');
            return to_route('admin.permissions.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Permission::query()->findOrFail($id);
            $data->delete();
            toastr()->success('Xóa quyền thành công', 'Thành công');

            return to_route('admin.permissions.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    public function importPermission()
    {
        return view('admin.permission.import');
    }

    public function Export()
    {
        return Excel::download(new PermissionExport, 'permissions.xlsx');
    }

    public function Import(Request $request)
    {
        try {
            Excel::import(new PermissionImport, $request->file('import_file'));
            toastr()->success('Import quyền thành công', 'Thành công');
            return to_route('admin.permissions.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
}
