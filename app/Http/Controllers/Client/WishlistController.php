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
        dd($data);
        return view('client.wishlists.index', compact('data'));
    }

    function addToWishlist(String $id)
    {
        // dd($id);
        if (!empty($id)) {
            dd('exit');
        } else {
            $model = new wishlist();
            $model->fill(
                [
                    'product_id' => $id,
                    'user_id' => 1,
                ]
            );
            $model->save();
            return back();
        }
    }



    function destroy(String $id)
    {
        wishlist::find($id)->delete();
        return back();
    }
}
