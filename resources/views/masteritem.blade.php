<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Untuk Icon Button  dan Font -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS untuk Table Halaman ini -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    

    <title>Trivento | Master Item</title>
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
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" autocomplete="off">
                        <div class="input-group">
                            <input type="text" name="search" value="" class="form-control bg-light border-0 small" placeholder="Search item...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS (Display on Mobile Device Only)) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search" autocomplete="off">
                                    <div class="input-group">
                                        <input type="text" name="search" value="" class="form-control bg-light border-0 small"
                                            placeholder="Search item...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
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
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
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
                <h1 class="h3 mb-2 text-gray-800">Master Items</h1>
                <p class="mb-4">Master Data for Asset and Consumable Items</p>
                
                <!-- DataTables -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif

                        @if(session()->has('editsuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('editsuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddAssetItemModal">Add Asset</button>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddConsumableItemModal">Add Consumable</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Model</th>
                                            <th>Brand</th>
                                            <th>Image</th>
                                            <th>Remarks</th>
                                            <th>Quantity</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($showItems as $value)
                                        <tr>
                                            <input type="hidden" class="itemid_value" value="{{ $value->id }}">
                                            <td>{{ $value->item_name}}</td>
                                            <td>{{ $value->item_category}}</td>
                                            <td>{{ $value->item_model}}</td>
                                            <td>{{ $value->item_brand}}</td>
                                            <td><img src="{{ asset('storage/' . $value->item_image) }}" height="100" width="120" alt="" /></td>
                                            <td>{{ $value->item_remark}}</td>
                                            <td>{{ $value->item_quantity}}</td>
                                            <td>{{ $value->created_at}}</td>
                                            <td>{{ $value->updated_at}}</td>
                                            <td>
                                            <a data-bs-toggle="modal" data-bs-target="#EditItemModal" data-itemid="{{ $value->id }}" data-itemname="{{ $value->item_name}}" data-itemcategory="{{ $value->item_category}}" data-itemmodel="{{ $value->item_model}}" data-itembrand="{{ $value->item_brand}}" data-itemimage="{{ $value->item_image}}" data-itemremark="{{ $value->item_remark}}" data-itemquantity="{{ $value->item_quantity}}" class="btn btn-success edit hasPopOver" style="font-size: 12px;padding: 4px 7px 4px 7px;"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger delete hasPopOver" style="font-size: 12px;padding: 4px 7px 4px 7px;"><i class="fa fa-trash"></i></button>
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
                <div class="modal fade" id="AddAssetItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Asset Details</h5>
                    </div>
                    <form action="{{ action('App\Http\Controllers\ItemController@store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="modal-body">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Reminder!</strong>
                    <br>When adding asset items, please add the SubID behind item name!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Item Name" value="{{ old('name') }}">
                        </div>

                        {{-- @foreach ($errors->all() as $message) {
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @endforeach --}}

                        @if($errors->asset->first('name'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->asset->first('name') }}
                            </div>
                        @endif

                        <div class="form-group">
                        <label>Category</label>
                        <input type="text" readonly name="category" value="Asset" class="form-control" placeholder="Enter Item Name">
                        </div>
                        
                        <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" placeholder="Enter Item Model" value="{{ old('model') }}">
                        </div>

                        @if($errors->asset->first('model'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->asset->first('model') }}
                            </div>
                        @endif

                        {{-- @error('model')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="form-group">
                        <label>Brand</label>
                        <select name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') }}">
                        <option value="">Choose Brand</option>
                        @if (isset($dataBrand))
                        @foreach ($dataBrand as $values)
                        <option value="{{$values->brand_name}}">{{$values->brand_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        @if($errors->asset->first('brand'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->asset->first('brand') }}
                            </div>
                        @endif

                        {{-- @error('brand')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        </div>

                        @if($errors->asset->first('image'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->asset->first('image') }}
                            </div>
                        @endif

                        {{-- @error('image')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks (Optional)" value="{{ old('remarks') }}">
                        </div>

                        <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" readonly name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="1" placeholder="Enter Item Quantity">
                        </div>

                        @if($errors->asset->first('quantity'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->asset->first('quantity') }}
                            </div>
                        @endif

                        {{-- @error('quantity')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}
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
            <div class="modal fade" id="AddConsumableItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Consumable Details</h5>
                    </div>
                    <form action="{{ action('App\Http\Controllers\ItemController@store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Item Name" value="{{ old('name') }}">
                        </div>

                        @if($errors->consumable->first('name'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->consumable->first('name') }}
                        </div>
                        @endif

                        <div class="form-group">
                        <label>Category</label>
                        <input type="text" readonly name="category" value="Consumable" class="form-control" placeholder="Enter Item Name">
                        </div>
                        
                        <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" placeholder="Enter Item Model">
                        </div>

                        @if($errors->consumable->first('model'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->consumable->first('model') }}
                        </div>
                        @endif

                        <div class="form-group">
                        <label>Brand</label>
                        <select name="brand" class="form-control @error('brand') is-invalid @enderror" >
                        <option value="">Choose Brand</option>
                        @if (isset($dataBrand))
                        @foreach ($dataBrand as $values)
                        <option value="{{$values->brand_name}}">{{$values->brand_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        @if($errors->consumable->first('brand'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->consumable->first('brand') }}
                        </div>
                        @endif

                        <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        </div>

                        @if($errors->consumable->first('image'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->consumable->first('image') }}
                        </div>
                        @endif

                        <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks (Optional)">
                        </div>

                        <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Item Quantity">
                        </div>

                        @if($errors->consumable->first('quantity'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->consumable->first('quantity') }}
                        </div>
                        @endif

                        <input type="hidden" name="mode" value="isConsumable" />
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
            <div class="modal fade" id="EditItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Item Details</h5>
                    </div>
                    <form action="{{ route('masteritem.update','edit')}}" method="POST" enctype="multipart/form-data" autocomplete="off" id="editForm">
                    {{ method_field('patch') }}
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="item_id" id="item_id" value="">

                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" required name="item_name" id="txtname" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Item Name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                        <label>Category</label>
                        <input type="text" required readonly name="item_category" id="txtcategory" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        <label>Model</label>
                        <input type="text" required name="item_model" id="txtmodel" class="form-control @error('model') is-invalid @enderror" placeholder="Enter Item Model">
                        </div>

                        <div class="form-group">
                        <label>Brand</label>
                        <select required name="item_brand" id="txtbrand" class="form-control @error('brand') is-invalid @enderror" >
                        <option value="">Choose Brand</option>
                        @if (isset($dataBrand))
                        @foreach ($dataBrand as $values)
                        <option value="{{$values->brand_name}}">{{$values->brand_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="item_image" id="txtimage" class="form-control">
                        </div>

                        <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="item_remark" id="txtremark" class="form-control" placeholder="Enter Remarks (Optional)">
                        </div>

                        <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" required name="item_quantity" id="txtquantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Item Quantity">
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
                </div>
                </div>
            <!-- End of Modal Edit Item -->

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

    <!-- Add Asset Modal Validation Error Scripts -->
    @if ($errors->hasBag('asset'))
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#AddAssetItemModal').modal('show');
            });
        </script>
    @endif
    <!-- End of Add Asset Modal Validation Error Scripts -->

    <!-- Add Consumable Modal Validation Error Scripts -->
    @if ($errors->hasBag('consumable'))
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#AddConsumableItemModal').modal('show');
        });
    </script>
    @endif
    <!-- End of Add Consumable Modal Validation Error Scripts -->

    <!--Edit Item Modal Scripts -->
    <script>
    $('#EditItemModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var item_id = button.data('itemid')
        var itemname = button.data('itemname')
        var itemcategory = button.data('itemcategory')
        var itemmodel = button.data('itemmodel')
        var itembrand = button.data('itembrand')
        var itemremark = button.data('itemremark')
        var itemquantity = button.data('itemquantity')

        var modal =$(this)
        modal.find('.modal-body #item_id').val(item_id);
        modal.find('.modal-body #txtname').val(itemname);
        modal.find('.modal-body #txtcategory').val(itemcategory);
        modal.find('.modal-body #txtmodel').val(itemmodel);
        modal.find('.modal-body #txtbrand').val(itembrand);
        modal.find('.modal-body #txtremark').val(itemremark);
        modal.find('.modal-body #txtquantity').val(itemquantity);
    });
    </script>
    <!--End of Edit User Modal Scripts -->

    <!--Delete Item SweetAlert Scripts -->
    <script>
        $(document).ready(function () {

            $('.delete').click(function (e) {
                e.preventDefault();
                
                var delete_id = $(this).closest("tr").find('.itemid_value').val();
                
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
                        url: "{!! url('masteritem' ) !!}" + "/"+delete_id,
                        data: data,
                        success: function (response) {
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