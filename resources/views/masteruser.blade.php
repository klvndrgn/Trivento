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

    <title>Trivento | Master User</title>
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
                            <input type="text" name="search" value="" class="form-control bg-light border-0 small" placeholder="Search user...">
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
                                            placeholder="Search user...">
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
                <h1 class="h3 mb-2 text-gray-800">Master User</h1>
                <p class="mb-4">Master Data for System Users</p>
                
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

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddUserModal">Add User</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Address</th>
                                            <th>Position</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($showUsers as $value)
                                        <tr>
                                            <input type="hidden" class="userid_value" value="{{ $value->id }}">
                                            <td>{{ $value->username}}</td>
                                            <td>{{ $value->address}}</td>
                                            <td>{{ $value->position}}</td>
                                            <td>{{ $value->email}}</td>
                                            <td>{{ $value->created_at}}</td>
                                            <td>{{ $value->updated_at}}</td>
                                            <td>
                                            <a data-bs-toggle="modal" data-bs-target="#EditUserModal" data-userid="{{ $value->id }}" data-username="{{ $value->username}}" data-address="{{ $value->address}}" data-position="{{ $value->position}}" data-email="{{ $value->email}}" data-password="{{ $value->password}}" data-level="{{ $value->isAdmin}}" class="btn btn-success edit hasPopOver" style="font-size: 12px;padding: 4px 7px 4px 7px;"><i class="fa fa-edit"></i></a>
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

                <!-- Modal Add User -->
                <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="AddUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User Details</h5>
                    </div>
                    <form action="{{ action('App\Http\Controllers\UsersController@store')}}" method="POST" autocomplete="off">
                    @csrf
                
                    <div class="modal-body">
                        
                        <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter User Name" value="{{ old('username') }}">
                        </div>
                        @error('username')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter User Address" value="{{ old('address') }}">
                        </div>

                        @error('address')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                        <label>Position</label>
                        <select name="position" class="form-control @error('position') is-invalid @enderror" >
                        <option value="">Choose Position</option>
                        @if (isset($dataPosition))
                        @foreach ($dataPosition as $values)
                        <option value="{{$values->position_name}}">{{$values->position_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        @error('position')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter User Email Address" value="{{ old('email') }}">
                        </div>

                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="eyepassword" class="form-control @error('password') is-invalid @enderror" placeholder="Enter User Password">
                        <span style="position: absolute; left: 93px; margin-top: -40px; transform: translate(0, -120%); cursor: pointer;">
                        <i class="far fa-eye" id="EyePassword" onclick="toggle()"></i>
                        </span>
                        </div>

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                        <label>Role</label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror" >
                        <option value="">Choose User Role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                        </select>
                        </div>

                        @error('level')
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
                <!-- End of Modal Add User -->

                <!-- Modal Edit User -->
                <div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change User Details</h5>
                    </div>
                    <form action="{{ route('masteruser.update','edit')}}" method="POST" autocomplete="off" id="editForm">
                    {{ method_field('patch') }}
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="">

                        <div class="form-group">
                        <label>User Name</label>
                        <input type="text" required name="username" id="txtusername" class="form-control" placeholder="Enter User Name">
                        </div>

                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" required name="address" id="txtaddress" class="form-control" placeholder="Enter User Address">
                        </div>

                        <div class="form-group">
                        <label>Position</label>
                        <select required name="position" id="txtposition" class="form-control">
                        <option value="">Choose Position</option>
                        @if (isset($dataPosition))
                        @foreach ($dataPosition as $values)
                        <option value="{{$values->position_name}}">{{$values->position_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" id="txtemail" class="form-control" placeholder="Enter User Email Address">
                        </div>

                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" required name="password" id="txtpassword" class="form-control" placeholder="Enter User Password">
                        </span>
                        </div>

                        <div class="form-group">
                        <label>Role</label>
                        <select required name="isAdmin" id="txtlevel" class="form-control">
                        <option value="">Choose User Role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                        </select>
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
                <!-- End of Modal Edit User -->



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/public/js/datatables-simple-demo.js"></script>
    <script src="/public/js/demo/datatables-demo.js"></script>

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

    <!-- Eye Password Add Form scripts -->
    <script>
        var state= false;
        function toggle(){
        if(state){
            document.getElementById("eyepassword").
            setAttribute("type","password");
            document.getElementById("EyePassword").style.color='#808080';
            state = false;
        }
        else{
            document.getElementById("eyepassword").
            setAttribute("type","text");
            document.getElementById("EyePassword").style.color='#0033FF';
            state = true;
            }
        }
    </script>

    

    <!-- Add User Modal Validation Error Scripts -->
    @if (count($errors) > 0)
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#AddUserModal').modal('show');
            });
        </script>
    @endif
    <!-- End of Add User Modal Validation Error Scripts -->

    <!--Edit User Modal Scripts -->
    <script>
    $('#EditUserModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var user_id = button.data('userid')
        var username = button.data('username')
        var address = button.data('address')
        var position = button.data('position')
        var email = button.data('email')
        var password = button.data('password')
        var level = button.data('level')

        var modal =$(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #txtusername').val(username);
        modal.find('.modal-body #txtaddress').val(address);
        modal.find('.modal-body #txtposition').val(position);
        modal.find('.modal-body #txtemail').val(email);
        modal.find('.modal-body #txtpassword').val(password);
        modal.find('.modal-body #txtlevel').val(level);
    });
    </script>
    <!--End of Edit User Modal Scripts -->

    <!--Delete User SweetAlert Scripts -->
    <script>
        $(document).ready(function () {

            $('.delete').click(function (e) {
                e.preventDefault();
                
                var delete_id = $(this).closest("tr").find('.userid_value').val();
                
                    swal({
                        title: "Delete this user?",
                        text: "Once deleted, user will be gone!",
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
                        url: "{!! url('masteruser' ) !!}" + "/"+delete_id,
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
    <!--End of Delete User SweetAlert Scripts -->
</body>
</html>