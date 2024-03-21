<?php

namespace App\Http\Controllers\Client;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Store;
use App\Models\StoreVariant;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use stdClass;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDateTime = Carbon::now()->tz('Asia/Ho_Chi_Minh');
        $category = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->paginate(4);
        $banners = Banner::where('is_active', 1)
            ->latest()
            ->paginate(3);
        $product_sale = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
            'sales'
        ])
            ->whereHas('sales', function ($query) use ($currentDateTime) {
                $query->where('start_date', '<=', $currentDateTime)
                    ->where('end_date', '>=', $currentDateTime);
            })
            ->latest()
            ->paginate(6);
        $products = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
            'sales' => function ($query) use ($currentDateTime) {
                $query->where('start_date', '<=', $currentDateTime)
                    ->where('end_date', '>=', $currentDateTime);
            },
        ])->latest()->paginate(6);
        $productall = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
            'sales' => function ($query) use ($currentDateTime) {
                $query->where('start_date', '<=', $currentDateTime)
                    ->where('end_date', '>=', $currentDateTime);
            },
        ])->latest()->paginate(12);
        $colorIds = ProductVariant
            ::where('total_quantity_stock', '>', 0)
            ->where('product_id', 1)
            ->with('color')
            ->groupBy('color_id')
            ->pluck('color_id');
        $sizeIds = ProductVariant::where('total_quantity_stock', '>', 0)
            ->where('product_id', 1)
            ->with('color')
            ->groupBy('size_id')
            ->pluck('size_id');
        // dd($products->variants->product_id);
        $carts = Cart::query()->latest()->get();
        if (auth()->check()) {
            $wishlists = Wishlist::query()
                ->latest()
                ->where('user_id', auth()->user()->id)
                ->get();
        } else {
            $wishlists = collect(); // Tạo một mảng trống
        }

        $posts = Post::query()->paginate(3);
        $feedbacks = Feedback::query()->paginate(6);

        return view('client.layouts.components.main', compact('category', 'products', 'banners', 'product_sale', 'productall', 'carts', 'wishlists', 'colorIds', 'sizeIds', 'posts', 'feedbacks'));
    }

    public function product(string $slug,string $id)
    {
        $currentDateTime = Carbon::now()->tz('Asia/Ho_Chi_Minh');
        $store_isset = StoreVariant::whereHas('variant', function ($query) use ($id) {
            $query->where('product_id', $id);
        })->where('quantity', '>', 0)->pluck('store_id')->unique();
        $stores = Store::whereIn('id', $store_isset)->get();
        $product = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
            'sales' => function ($query) use ($currentDateTime) {
                $query->where('start_date', '<=', $currentDateTime)
                    ->where('end_date', '>=', $currentDateTime);
            }
        ])->findOrFail($id);
        $productvariants = $product->variants;
        $products = Product::whereHas('categories', function ($query) use ($product) {
            $query->whereIn('category_id', $product->categories->pluck('id'));
        })
            ->where('id', '!=', $id)
            ->paginate(6);

        $totalQuantity = ProductVariant::where('product_id', $id)->sum('total_quantity_stock');
        $groupbyColors = [];
        $groupbySizes = [];
        $ads = Ads::where('active', 1)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        // dd($product->variants);
        foreach ($product->variants as $variant) {

            $color = $variant->color;
            $size = $variant->size;

            if (!in_array($color, $groupbyColors)) {
                $groupbyColors[] = $color;
            }
            if (!in_array($size, $groupbySizes)) {
                $groupbySizes[] = $size;
            }
        }
        return view('client.products.productDetail', compact('productvariants', 'ads', 'product', 'products', 'groupbyColors', 'groupbySizes', 'stores', 'totalQuantity'));
    }

    public function checkQuantity(Request $request)
    {
        $getsizes = ProductVariant::query()->with('product')
            ->where([
                'product_id' => $request->product_id,
                'color_id' => $request->color,
            ])->where('total_quantity_stock', '>', 0)->get();
        // $sale = $getsizes->product->sales;
        return response()->json([
            'data' => $getsizes,
            'sale' => 1
        ]);
    }
    public function search(Request $request)
    {
        $category = $request->category_id;
        $keyword = $request->input('keyword');


        if ($keyword) {
            $products = Product::where('title', 'like', '%' . $keyword . '%')->with([
                'variants' => function ($query) {
                    $query->with('color', 'size');
                },
                'images',
                'categories',
                'sales'
            ])->get();
            return view('client.search', compact('products'));
        }
        if ($category) {
            $products = Product::with([
                'variants' => function ($query) {
                    $query->with('color', 'size');
                },
                'images',
                'categories',
            ])
                ->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_id', $category);
                })
                ->get();
            return view('client.search', compact('products'));
        }
    }

    public function allProduct(Request $request)
    {
        $product = Product::with([
            'variants' => function ($query) {
                $query->with('color', 'size');
            },
            'images',
            'categories',
        ]);
        $products = $product->get();
        // dd($products);
        return view('client.products.index', compact('products'));
    }


    public function post()
    {
        $posts = Post::query()->paginate(5);
        $ads = Ads::where('active', 1)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        return view('client.posts.post', compact('posts', 'ads'));
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::where('slug', '!=', $slug)->paginate(5);
        $ads = Ads::where('active', 1)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        return view('client.posts.postDettail', compact('post', 'posts', 'ads'));
    }

    public function getContactForm()
    {
        return view('client.contact');
    }
    public function contactForm(Request $request)
    {
        $messages = [
            'phone_number.required' => 'Số điện thoại là trường bắt buộc.',
            'phone_number.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại có 9 hoặc 10 chữ số.',
        ];

        $request->validate([
            'phone_number' => [
                'required',
                'regex:/^[0-9]{9,10}$/',
            ],
        ], $messages);

        $user = User::where('role', 'admin')->first();
        $content = [
            'title' => 'Liên hệ làm việc',
            'message' => "Xin chào, tôi là " . $request->name . " tôi gửi mail này cho bạn với lời nhắn : ". $request->message . ' nếu bạn thấy phù hợp hãy liên lạc lại với tôi qua email: '. $request->email.' hoặc số điện thoại '. $request->phone_number,
        ];
        event(new NotificationEvent($user, $content));
        toastr()->success('Lời nhắn đã dược gửi, chúng tôi sẽ liên hệ sớm','Thành công');
        return to_route('home');
    }
}
