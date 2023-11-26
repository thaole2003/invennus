<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href>
        <div class="sidebar-brand-icon rotate-n-15">
            <img style="width:50px;height:50px;border-radius:50%" src="{{ asset('img/logo.jpg') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Invennus <sup>♣️</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bảng điều khiển</span></a>
    </li>
    {{-- <li class="nav-item active">
        <a class="nav-link" href="/report-revenue">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống kê</span></a>
    </li> --}}
    {{-- <div class="sidebar-heading">
        Thống kê
    </div> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo0111"
            aria-expanded="true" aria-controls="collapseTwo0111">
            <i class="fas fa-store"></i>
            <span>Thống kê</span>
        </a>
        <div id="collapseTwo0111" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{ route('report-revenue') }}>Doanh thu</a>
                <a class="collapse-item" href={{ route('report-product') }}>Sản phẩm</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->can('stores.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2"
                aria-expanded="true" aria-controls="collapseTwo2">
                <i class="fas fa-store"></i>
                <span>Quản lý cửa hàng</span>
            </a>
            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.store.index') }}>Danh sách cửa hàng</a>
                    <a class="collapse-item" href={{ route('admin.store.create') }}>Thêm mới cửa hàng</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('bills.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.bill.detail') }}" aria-expanded="true"
                aria-controls="collapseTwo6">
                <i class="fas fa-wallet"></i>
                <span>Quản lý đơn hàng</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->can('categories.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                aria-expanded="true" aria-controls="collapseTwo1">
                <i class="fas fa-calendar"></i>
                <span>Quản lý danh mục</span>
            </a>
            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.category.index') }}">Danh sách danh mục</a>
                    <a class="collapse-item" href="{{ route('admin.category.create') }}">Thêm mới danh mục</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('colors.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo5"
                aria-expanded="true" aria-controls="collapseTwo5">
                <i class="fas fa-tshirt"></i>
                <span>Quản lý sản phẩm</span>
            </a>
            <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.product.index') }}>Danh sách sản phẩm</a>
                    <a class="collapse-item" href={{ route('admin.product.create') }}>Thêm mới sản phẩm</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('storevariants.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.storevariant.index') }}" data-toggle="" data-target="#"
                aria-expanded="true" aria-controls="">
                <i class="fas fa-store-alt"></i>
                <span> Sản phẩm theo cửa hàng</span>
            </a>
            {{-- <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.product.index') }}>Danh sách sản phẩm</a>
                <a class="collapse-item"  href={{ route('admin.product.create') }}>Thêm mới sản phẩm</a>
            </div>
        </div> --}}
        </li>
    @endif
    @if (Auth::user()->can('inventoryentrys.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('InventoryEntry') }}" data-toggle="collapse"
                data-target="#collapseTwo8" aria-expanded="true" aria-controls="collapseTwo8">
                <i class="fab fa-salesforce"></i>
                <span>Nhập kho</span>
            </a>
            <div id="collapseTwo8" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('InventoryEntry') }}">Danh sách nhập kho</a>
                    <a class="collapse-item" href={{ route('importStock') }}>Thêm mới nhập kho</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('vendors.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo11"
                aria-expanded="true" aria-controls="collapseTwo11">
                <i class="fas fa-fw fa-cog"></i>
                <span>Quản lý nhà cung cấp</span>
            </a>
            <div id="collapseTwo11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.vendors.index') }}>Danh sách nhà cung cấp</a>
                    <a class="collapse-item" href={{ route('admin.vendors.create') }}>Thêm nhà cung cấp</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('users.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.users.index') }}" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Quản lý người dùng</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.users.index') }}">Danh sách người dùng</a>
                    <a class="collapse-item" href="{{ route('admin.users.create') }}">Thêm mới người dùng</a>
                </div>
            </div>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo0"
            aria-expanded="true" aria-controls="collapseTwo0">
            <i class="fas fa-store"></i>
            <span>Phân quyền</span>
        </a>
        <div id="collapseTwo0" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (Auth::user()->can('permissions.resource'))
                    <a class="collapse-item" href={{ route('admin.permissions.create') }}>Thêm mới quyền</a>
                    <a class="collapse-item" href={{ route('admin.permissions.index') }}>Danh sách quyền</a>
                @endif
                @if (Auth::user()->can('roles.resource'))
                    <a class="collapse-item" href={{ route('admin.roles.index') }}>Vai trò và quyền</a>
                    <a class="collapse-item" href={{ route('admin.roles.create') }}>Thêm vai trò</a>
                @endif

            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->can('admins.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo00"
                aria-expanded="true" aria-controls="collapseTwo00">
                <i class="fas fa-store"></i>
                <span>Quản lý quản trị viên</span>
            </a>
            <div id="collapseTwo00" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.admins.index') }}>Danh sách quản trị viên</a>
                    <a class="collapse-item" href={{ route('admin.admins.create') }}>Thêm mới quản trị viên</a>
                </div>
            </div>
        </li>
    @endif

    @if (Auth::user()->can('sales.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo7"
                aria-expanded="true" aria-controls="collapseTwo7">
                <i class="fab fa-salesforce"></i>
                <span>Sản phẩm giảm giá</span>
            </a>
            <div id="collapseTwo7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.sale.index') }}>Danh sách giảm giá</a>
                    <a class="collapse-item" href={{ route('admin.sale.create') }}>Thêm mới giảm giá</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('vendors.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
                aria-expanded="true" aria-controls="collapseTw">
                <i class="fas fa-images"></i>
                <span>Quản lý ảnh banner</span>
            </a>
            <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.banner.index') }}>Danh sách ảnh banner</a>
                    <a class="collapse-item" href={{ route('admin.banner.create') }}>Thêm mới ảnh banner</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('post-categories.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwooo"
                aria-expanded="true" aria-controls="collapseTwo7">
                <i class="fas fa-calendar"></i>
                <span>Danh mục bài viết</span>
            </a>
            <div id="collapseTwooo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.postCategory.index') }}>Danh sách </a>
                    <a class="collapse-item" href={{ route('admin.postCategory.create') }}>Thêm mới</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('posts.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoo"
                aria-expanded="true" aria-controls="collapseTwo7">
                <i class="fab fa-salesforce"></i>
                <span>Bài viết</span>
            </a>
            <div id="collapseTwoo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.post.index') }}>Danh sách bài viết</a>
                    <a class="collapse-item" href={{ route('admin.post.create') }}>Thêm mới bài viết</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('banners.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3"
                aria-expanded="true" aria-controls="collapseTwo3">
                <i class="fas fa-ruler"></i>
                <span>Quản lý kích cỡ</span>
            </a>
            <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.size.index') }}>Danh sách kích cỡ</a>
                    <a class="collapse-item" href={{ route('admin.size.create') }}>Thêm mới kích cỡ</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('sizes.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo4"
                aria-expanded="true" aria-controls="collapseTwo4">
                <i class="fas fa-palette"></i>
                <span>Quản lý màu sắc</span>
            </a>
            <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.color.index') }}>Danh sách màu sắc</a>
                    <a class="collapse-item" href={{ route('admin.color.create') }}>Thêm mới màu sắc</a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('ads.resource'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw11"
                aria-expanded="true" aria-controls="collapseTw">
                <i class="fas fa-images"></i>
                <span>Thuê quảng cáo</span>
            </a>
            <div id="collapseTw11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href={{ route('admin.ads.index') }}>Danh sách </a>
                    <a class="collapse-item" href={{ route('admin.ads.create') }}>Thêm mới</a>
                </div>
            </div>
        </li>
    @endif








    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


</ul>
