<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventory System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Brand -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brand" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fa fa-btc"></i>
            <span>Brands</span>
        </a>
        <div id="brand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand Components:</h6>
                <a class="collapse-item" href="{{ url('/brand') }}">Brand List</a>
            </div>
        </div>
    </li>

    <!-- Product -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Components:</h6>
                <a class="collapse-item" href="{{ url('/product') }}">Products List</a>
            </div>
        </div>
    </li>

    <!-- Stock -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stock" aria-expanded="true"
            aria-controls="stock">
            <i class="fas fa-box"></i>
            <span>Stocks</span>
        </a>
        <div id="stock" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Stock Components:</h6>
                <a class="collapse-item" href="{{ url('/stock') }}">Stock List</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Customer -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer" aria-expanded="true"
            aria-controls="customer">
            <i class="fas fa-user"></i>
            <span>Customers</span>
        </a>
        <div id="customer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Customer Components:</h6>
                <a class="collapse-item" href="{{ url('/customer') }}">Customer List</a>
            </div>
        </div>
    </li>

    <!-- Order -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true"
            aria-controls="order">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order Components:</h6>
                <a class="collapse-item" href="{{ url('/order') }}">Order List</a>
            </div>
        </div>
    </li>


</ul>