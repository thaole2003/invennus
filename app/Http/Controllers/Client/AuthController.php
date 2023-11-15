<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeInfoRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //
    public function editInfo(ChangeInfoRequest $request, string $id){
        $user = User::findOrFail($id);
        $user->fill($request->all());
        if($request->has('new_avatar') ){
            $user->avt='storage/' . Storage::put('image/user',$request->file('new_avatar') );
        }else{
            $user->avt=$request->old_avatar;
        }
        toastr()->success('Cập nhập thông tin tài khoản thành công!','Thành công');
        if($request->hasFile('new_avatar')){
            $pathFile = str_replace('storage/', '', $request->old_avatar);
            Storage::exists($pathFile) ? Storage::delete($pathFile) : null;
        }
        $user->save();
        return to_route('home');
    }

    public function editPassword(ChangePasswordRequest $request, string $id)
    {
        try {
            if (auth()->user()) {
                $user = User::findOrFail($id);
                $user->password = bcrypt($request->password);
                $user->save();
                toastr()->success('Cập nhật mật khẩu thành công!', 'Thành công');
                return redirect()->route('home');
            } else {
                return redirect('home');
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Cập nhật mật khẩu thất bại!', 'Thất bại');
            return back();
        }
    }

}
