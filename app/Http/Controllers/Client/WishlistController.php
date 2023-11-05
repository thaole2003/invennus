<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\wishlist;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class WishlistController extends Controller
{

    function index()
    {
        $data = wishlist::query()->latest()->where('user_id', auth()->user()->id)->get();
        return view('client.wishlists.index', compact('data'));
    }

    function addToWishlist(String $id)
    {
        $model = new wishlist();
        $model->fill(
            [
                'product_id' => $id,
                'user_id' => 1,
            ]
        );
        $model->save();
        toastr()->success('Bạn vừa lưu 1 sản phẩm','Lưu thành công');
        return back();
    }



    function destroy(String $id)
    {
        wishlist::find($id)->delete();
        toastr()->success('Bạn bỏ lưu 1 sản phẩm','Thành công');
        return back();
    }
}
