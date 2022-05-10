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

    <title>Trivento | Master Brand</title>
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
                            <input type="text" name="search" value="" class="form-control bg-light border-0 small" placeholder="Search brand..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Display on Mobile Device Only) -->
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
                                            placeholder="Search brand...">
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
                <h1 class="h3 mb-2 text-gray-800">Master Brand</h1>
                <p class="mb-4">Master Data for Item Brand</p>
                
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

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddBrandModal">Add Brand</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($showBrand as $value)
                                        <tr>
                                            <input type="hidden" class="brandid_value" value="{{ $value->id }}">
                                            <td>{{ $value->brand_name}}</td>
                                            <td>{{ $value->created_at}}</td>
                                            <td>{{ $value->updated_at}}</td>
                                            <td>
                                            <a data-bs-toggle="modal" data-bs-target="#EditBrandModal" data-brandid="{{ $value->id }}" data-brandname="{{ $value->brand_name}}" class="btn btn-success edit hasPopOver" style="font-size: 12px;padding: 4px 7px 4px 7px;"><i class="fa fa-edit"></i></a>
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

                <!-- Modal Add Brand -->
                <div class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="AddUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Brand Details</h5>
                    </div>
                    <form action="{{ action('App\Http\Controllers\BrandController@store')}}" method="POST" autocomplete="off">
                    @csrf
                
                    <div class="modal-body">
                        
                        <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brandname" class="form-control @error('brandname') is-invalid @enderror" placeholder="Enter Brand Name" value="{{ old('brandname') }}">
                        </div>

                        @error('brandname')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
                </div>
                </div>
                <!-- End of Modal Add Brand -->

                <!-- Modal Edit Brand -->
                <div class="modal fade" id="EditBrandModal" tabindex="-1" aria-labelledby="AddBrandModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Brand Details</h5>
                    </div>
                    <form action="{{ route('masterbrands.update','edit')}}" method="POST" autocomplete="off">
                    {{ method_field('patch') }}
                    @csrf
                
                    <div class="modal-body">
                    <input type="hidden" name="brand_id" id="brand_id" value="">

                        <div class="form-group">
                        <label>Position Name</label>
                        <input type="text" required name="brand_name" id="txtbrandname" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Enter Brand Name">
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
                <!-- End of Modal Edit Brand -->



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
    <script src="js/jquery-3.6.0.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- SweetAlert2 scripts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Add Brand Modal Validation Error Scripts -->
    @if (count($errors) > 0)
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#AddBrandModal').modal('show');
            });
        </script>
    @endif
    <!-- End of Add Brand Modal Validation Error Scripts -->

    <!--Edit Position Modal Scripts -->
    <script>
    $('#EditBrandModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var brand_id = button.data('brandid')
        var brandname = button.data('brandname')

        var modal =$(this)
        modal.find('.modal-body #brand_id').val(brand_id);
        modal.find('.modal-body #txtbrandname').val(brandname);
    });
    </script>
    <!--End of Edit Position Modal Scripts -->

    <!--Delete Position SweetAlert Scripts -->
    <script>
        $(document).ready(function () {

            $('.delete').click(function (e) {
                e.preventDefault();
                
                var delete_id = $(this).closest("tr").find('.brandid_value').val();
                
                    swal({
                        title: "Delete this brand?",
                        text: "Once deleted, brand will be gone!",
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
                        url: "{!! url('masterbrands' ) !!}" + "/"+delete_id,
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
    <!--End of Delete Position SweetAlert Scripts -->
</body>
</html>