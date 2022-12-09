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
        <a class="nav-link" href="{{ url('/cashier') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brand" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="brand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order Components:</h6>
                <a class="collapse-item" href="{{ url('/cash') }}">Cash Order</a>
                <a class="collapse-item" href="{{ url('/installment') }}">Installment Order</a>
                {{-- <a class="collapse-item" href="{{ url('/confirm') }}">Confrim Order</a> --}}
            </div>
        </div>
    </li>

    <!-- Transaction History -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trans" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="	fa fa-credit-card"></i>
            <span>Cash Transactions</span>
        </a>
        <div id="trans" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaction Components:</h6>
                <a class="collapse-item" href="{{ url('/cash-transaction') }}">Transaction</a>
                {{-- <a class="collapse-item" href="{{ url('/installment') }}">Installment Order</a>
                <a class="collapse-item" href="{{ url('/confirm') }}">Confrim Order</a> --}}
            </div>
        </div>
    </li>


    <!-- Transaction History -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#insta" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fa fa-credit-card"></i>
            <span>Installment Transactions</span>
        </a>
        <div id="insta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaction Components:</h6>
                <a class="collapse-item" href="{{ url('/installment-transaction') }}">Transaction</a>
                <a class="collapse-item" href="{{ url('/paid-installment') }}">Paid Installment</a>
                {{-- <a class="collapse-item" href="{{ url('/installment') }}">Installment Order</a>
                <a class="collapse-item" href="{{ url('/confirm') }}">Confrim Order</a> --}}
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



</ul>