<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Untuk Icon Button  dan Font -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS untuk Table Halaman ini -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>Trivento | Inventory Items</title>
    <link rel="icon" type="image/jpg" href="img/logo.png">
</head>




<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-box"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trivento</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Welcome -->
            <li class="nav-item active">
                <a class="nav-link" href="home">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                @if(auth()->user()->isAdmin)
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-box-archive"></i>
                    <span>Master Data</span>
                </a>
                @endif
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="masteruser">User</a>
                        <a class="collapse-item" href="masterposition">Position</a>
                        <a class="collapse-item" href="masterbrands">Brand</a>
                        <a class="collapse-item" href="masteritem">Item</a>
                    </div>
                </div>
                </li>
    
                <!-- Nav Item - Transaction Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Transaction</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="transfer">Transfer Items</a>
                            <a class="collapse-item" href="inventory">Inventory</a>
                        </div>
                    </div>
                </li>
    
                <!-- Nav Item - Report Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                        aria-expanded="true" aria-controls="collapseUtilities2">
                        <i class="fa-solid fa-file"></i>
                        <span>Report</span>
                    </a>
                    <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="reporttransfer">Transfer Report</a>
                            <a class="collapse-item" href="reportinventory">Inventory Report</a>
                        </div>
                    </div>
                </li>
    
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
    
            </ul>
            <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Page Content Start -->

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Inventory Items</h1>
                    <p class="mb-4">Inventory Items </p> <!-- for Asset and Consumable Items --->


                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </div>
                            @endif

                            @if (session()->has('editsuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('editsuccess') }}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </div>
                            @endif
                            <!-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddItemModal">Add</button> -->
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#StockInModal">Stock In</button>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#StockOutModal">Stock Out</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Inventory ID</th>
                                            <th>User ID</th>
                                            <th>Stock In Qty</th>
                                            <th>Stock Out Qty</th>
                                            <th>Item Name</th>
                                            <th>Inventory Balance</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            {{-- <th>Update By</th>
                                            <th>Update Date</th> --}}
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stock as $item)
                                            <tr>
                                                <input type="hidden" class="id_value" value="{{ $item->id }}">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->stock_in_qty }}</td>
                                                <td>{{ $item->stock_out_qty }}</td>
                                                <td>{{ $item->item_name }}</td>
                                                <td>{{ $item->balance }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->description }}</td>
                                                {{-- <td>{{ $item->update_date }}</td> --}}
                                                <td>
                                                    <a id="#" data-bs-toggle="modal" data-bs-target="#EditItemModal"
                                                        data-id="{{ $item->id }}"
                                                        data-user_id="{{ $item->user_id }}"
                                                        data-stock_in_qty="{{ $item->stock_in_qty }}"
                                                        data-stock_out_qty="{{ $item->stock_out_qty }}"
                                                        data-item_id="{{ $item->item_id }}"
                                                        data-balance="{{ $item->balance }}"
                                                        data-status="{{ $item->status }}"
                                                        data-description="{{ $item->description }}"
                                                        class="btn btn-success edit hasPopOver"
                                                        style="font-size: 12px;padding: 4px 7px 4px 7px;"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger delete hasPopOver"
                                                        style="font-size: 12px;padding: 4px 7px 4px 7px;"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Trivento 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            <!-- Modal Add Asset Item -->
            <div class="modal fade" id="StockInModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Stock In</h5>
                        </div>
                        <form action="{{ route('inventory.store') }}" method="POST" autocomplete="off">
                            <div class="modal-body">

                                <!-- <input type="hidden" name="id_karyawan" id="id_karyawan"> -->
                                @csrf

                                <div class="form-group">
                                    <label>Item</label>
                                    <select class="form-control @error('item') is-invalid @enderror" name="item">
                                        <option value="" selected disabled>-- Pilih Item --</option>
                                        @foreach ($dataItem as $itemKey)
                                            <option value="{{ $itemKey->id }}">{{ $itemKey->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->StockIn->first('item'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockIn->first('item') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-control @error('user') is-invalid @enderror" name="user">
                                        <option value="" selected disabled>-- Pilih User --</option>
                                        @foreach ($dataUser as $userKey)
                                            <option value="{{ $userKey->id }}">{{ $userKey->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->StockIn->first('user'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockIn->first('user') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Stock In Qty</label>
                                    <input type="text" name="stock" value="{{ old('stock') }}"
                                        class="form-control  @error('stock') is-invalid @enderror"
                                        placeholder="Enter Stock In Qty" required>
                                </div>

                                @if ($errors->StockIn->first('stock'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockIn->first('stock') }}
                                    </div>
                                @endif
                                {{-- <div class="form-group">
                                    <label>Inventory Balance</label>
                                    <input type="text" name="balance" class="form-control"
                                        placeholder="Enter Inventory Balance" readonly>
                                </div> --}}

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control  @error('status') is-invalid @enderror">
                                        <option value="">Choose Status</option>
                                        <option value="Stok Barang Mingguan">Stok Barang Mingguan</option>
                                        <option value="Stok Barang Bulanan">Stok Barang Bulanan</option>
                                        <option value="Stok Barang Tahunan">Stok Barang Tahunan</option>
                                    </select>
                                </div>

                                @if ($errors->StockIn->first('status'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockIn->first('status') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control @error('status') is-invalid @enderror "
                                        rows="2">{{ old('description') }}</textarea>
                                </div>

                                @if ($errors->StockIn->first('description'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockIn->first('description') }}
                                    </div>
                                @endif
                                <input type="hidden" name="mode" value="In">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Asset Item -->

            <!-- Modal Add Consumable Item -->
            <div class="modal fade" id="StockOutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Stock Out</h5>
                        </div>
                        <form action="{{ route('inventory.store') }}" method="POST" autocomplete="off">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label>Item</label>
                                    <select class="form-control @error('item') is-invalid @enderror" name="item">
                                        <option value="" selected disabled>-- Pilih Item --</option>
                                        @foreach ($dataItem as $itemKey)
                                            <option value="{{ $itemKey->id }}">{{ $itemKey->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->StockOut->first('item'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('item') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-control @error('user') is-invalid @enderror " name="user">
                                        <option value="" selected disabled>-- Pilih User --</option>
                                        @foreach ($dataUser as $userKey)
                                            <option value="{{ $userKey->id }}">{{ $userKey->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->StockOut->first('user'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('user') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Stock Out Qty</label>
                                    <input type="text" name="stock" value="{{ old('stock') }}"
                                        class="form-control @error('stock') is-invalid @enderror"
                                        placeholder="Enter Stock Out Qty" required>
                                </div>
                                @if ($errors->StockOut->first('stock'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('stock') }}
                                    </div>
                                @endif
                                {{-- <div class="form-group">
                                    <label>Inventory Balance</label>
                                    <input type="text" name="balance" class="form-control"
                                        placeholder="Enter Inventory Balance" readonly>
                                </div> --}}

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Choose Status</option>
                                        <option value="Barang Rusak">Barang Rusak</option>
                                        <option value="Barang Keluar">Barang Keluar</option>
                                        <option value="Barang Expired">Barang Expired</option>
                                    </select>
                                </div>
                                @if ($errors->StockOut->first('status'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('status') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                        rows="2">{{ old('description') }}</textarea>
                                </div>
                                @if ($errors->StockOut->first('description'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Consumable Item -->

            <!-- Modal Edit Item -->
            <div class="modal fade" id="EditItemModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Item Details</h5>
                        </div>
                        <form action="{{ route('inventory.update','edit')}}" method="POST" autocomplete="off">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label>Item</label>
                                    <select class="form-control @error('item') is-invalid @enderror" name="item"
                                        id="item">
                                        <option value="" selected disabled>-- Pilih Item --</option>
                                        @foreach ($dataItem as $itemKey)
                                            <option value="{{ $itemKey->id }}">{{ $itemKey->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->StockOut->first('item'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('item') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-control @error('user') is-invalid @enderror " name="user"
                                        id="user">
                                        <option value="" selected disabled>-- Pilih User --</option>
                                        @foreach ($dataUser as $userKey)
                                            <option value="{{ $userKey->id }}">{{ $userKey->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->StockOut->first('user'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->StockOut->first('user') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Stock In Qty</label>
                                    <input type="text" name="stock_in" class="form-control"
                                        placeholder="Enter Stock In Qty" id="stock_in" required>
                                </div>

                                <div class="form-group">
                                    <label>Stock Out Qty</label>
                                    <input type="text" name="stock_out" class="form-control"
                                        placeholder="Enter Stock Out Qty" id="stock_out" required>
                                </div>

                                <div class="form-group">
                                    <label>Inventory Balance</label>
                                    <input type="text" name="balance" class="form-control"
                                        placeholder="Enter Inventory Balance" id="item_quantity" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Choose Status</option>
                                        <option value="Barang Masuk">Barang Masuk</option>
                                        <option value="Barang Keluar">Barang Keluar</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="2" id="description"></textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Item -->

            <!-- Modal Add Item -->
            <!-- <div class="modal fade" id="AddItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST" autocomplete="off">

                            <div class="form-group">
                                    <label>Inventory ID</label>
                                    <input type="text" required name="#" id="#" class="form-control" placeholder="<AUTO NO>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>User ID</label>
                                    <input type="text" required name="#" id="#" class="form-control" placeholder="Enter User ID">
                                </div>

                                <div class="form-group">
                                    <label>Stock In Qty</label>
                                    <input type="text" required name="#" id="#" class="form-control" placeholder="Enter Stock In Qty">
                                </div>
                                
                                <div class="form-group">
                                    <label>Stock Out Qty</label>
                                    <input type="text" required name="#" id="#" class="form-control" placeholder="Enter Stock Out Qty">
                                </div>

                                <div class="form-group">
                                    <label>Inventory Balance</label>
                                    <input type="text" required name="#" id="#" class="form-control" placeholder="Enter Inventory Balance">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Choose Status</option>
                                        <option value="">Barang Masuk</option>
                                        <option value="">Stok Barang Mingguan</option>
                                        <option value="">Stok Barang Bulanan</option>
                                        <option value="">Stok Barang Tahunan</option>
                                        <option value="">Barang Rusak</option>
                                        <option value="">Barang Keluar</option>
                                        <option value="">Barang Expired</option>
                                        <option value="">Barang Digunakan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="#" id="" class="form-control" rows="2"></textarea>
                                </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End of Modal Add Item -->



            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
            <script src="js/bootstrap.min.js"></script>


            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>

            <!-- SweetAlert2 scripts -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            @if ($errors->hasBag('StockIn'))
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#StockInModal').modal('show');
                    });
                </script>
            @endif

            @if ($errors->hasBag('StockOut'))
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#StockOutModal').modal('show');
                    });
                </script>
            @endif

            <script>
                $('#EditItemModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var user_id = button.data('user_id')
                    var item_id = button.data('item_id')
                    var stock_in = button.data('stock_in_qty')
                    var stock_out = button.data('stock_out_qty')
                    var balance = button.data('balance')
                    var status = button.data('status')
                    var description = button.data('description')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #user').val(user_id);
                    modal.find('.modal-body #item').val(item_id);
                    modal.find('.modal-body #stock_in').val(stock_in);
                    modal.find('.modal-body #stock_out').val(stock_out);
                    modal.find('.modal-body #balance').val(balance);
                    modal.find('.modal-body #status').val(status);
                    modal.find('.modal-body #description').val(description);
                });
            </script>

            <!--Delete Item SweetAlert Scripts -->
            <script>
                $(document).ready(function() {

                    $('.delete').click(function(e) {
                        e.preventDefault();

                        var delete_id = $(this).closest("tr").find('.id_value').val();
                        console.log(delete_id);
                        swal({
                                title: "Delete this item?",
                                text: "Once deleted, item will be removed!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {

                                    var data = {
                                        "_token": $('input[name=_token]').val(),
                                        "id": delete_id
                                    };

                                    $.ajax({
                                        type: "DELETE",
                                        url: "{!! url('inventory') !!}" + "/" + delete_id,
                                        data: data,
                                        success: function(response) {
                                            swal(response.deletesuccess, {
                                                    icon: "success",
                                                })
                                                .then((result) => {
                                                    location.reload();
                                                });
                                        }
                                    });

                                }
                            });
                    });
                });
            </script>
            <!--End of Delete Item SweetAlert Scripts -->
</body>



</html>
