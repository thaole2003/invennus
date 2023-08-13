<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href>
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2"
            aria-expanded="true" aria-controls="collapseTwo2">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý cửa hàng</span>
        </a>
        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href={{ route('admin.store.index') }}>Danh sách cửa hàng</a>
                <a class="collapse-item"  href={{ route('admin.store.create') }}>Thêm mới cửa hàng</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.users.index') }}" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Quản lý User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.users.index') }}">Danh sách User</a>
                <a class="collapse-item" href="{{ route('admin.users.create') }}">Thêm mới User</a>
            </div>
        </div>
    </li>
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

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
            aria-expanded="true" aria-controls="collapseTw">
            <i class="fas fa-images"></i>
            <span>Quản lý ảnh banner</span>
        </a>
        <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.banner.index') }}>Danh sách ảnh banner</a>
                <a class="collapse-item"  href={{ route('admin.banner.create') }}>Thêm mới ảnh banner</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3"
            aria-expanded="true" aria-controls="collapseTwo3">
            <i class="fas fa-ruler"></i>
            <span>Quản lý kích cỡ</span>
        </a>
        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.size.index') }}>Danh sách kích cỡ</a>
                <a class="collapse-item"  href={{ route('admin.size.create') }}>Thêm mới kích cỡ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo4"
            aria-expanded="true" aria-controls="collapseTwo4">
            <i class="fas fa-palette"></i>
            <span>Quản lý màu sắc</span>
        </a>
        <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.color.index') }}>Danh sách màu sắc</a>
                <a class="collapse-item"  href={{ route('admin.color.create') }}>Thêm mới màu sắc</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo5"
            aria-expanded="true" aria-controls="collapseTwo5">
            <i class="fas fa-tshirt"></i>
            <span>Quản lý sản phẩm</span>
        </a>
        <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.product.index') }}>Danh sách sản phẩm</a>
                <a class="collapse-item"  href={{ route('admin.product.create') }}>Thêm mới sản phẩm</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.storevariant.index') }}" data-toggle="" data-target="#"
            aria-expanded="true" aria-controls="">
            <i class="fas fa-tshirt"></i>
            <span> QL Số lượng sản phẩm</span>
        </a>
        {{-- <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.product.index') }}>Danh sách sản phẩm</a>
                <a class="collapse-item"  href={{ route('admin.product.create') }}>Thêm mới sản phẩm</a>
            </div>
        </div> --}}
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo7"
            aria-expanded="true" aria-controls="collapseTwo7">
            <i class="fab fa-salesforce"></i>
            <span>Quản lý giảm giá</span>
        </a>
        <div id="collapseTwo7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"  href={{ route('admin.sale.index') }}>Danh sách giảm giá</a>
                <a class="collapse-item"  href={{ route('admin.sale.create') }}>Thêm mới giảm giá</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo6"
            aria-expanded="true" aria-controls="collapseTwo6">
            <i class="fas fa-wallet"></i>
            <span>Quản lý đơn hàng</span>
        </a>
        {{-- <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href>Danh sách đơn hàng</a>
            </div>
        </div> --}}
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


</ul>
