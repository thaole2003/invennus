<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        $data=User::latest('created_at')->paginate(5);
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
    public function store(Request $request)
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
            return to_route('admin.users.index')->with('msg', ['success' => true, 'message' => 'Thêm thành công người dùng!']);
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
        $data= Store::all();

        $model = User::findOrFail($id);
        return view('admin.user.edit',compact('data','model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            if($model->role=='user' || $model->role=='admin'){
                $model->store_id=null;
            }
            if($request->hasFile('new_avt')){
                $image = $request->file('new_avt');
                $folder = 'images/user';
                $imageName =Storage::put($folder,$image);
                $imageName= 'storage/' . $imageName;
                $model->avt = $imageName;
            }else{
                $model->avt = $request->input('current_avt');
            }
            $model->save();
            return to_route('admin.users.index')->with('msg', ['success' => true, 'message' => 'Sửa thành công người dùng!']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
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
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
}
