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



<style type="text/css">
    .input-group-append { cursor: pointer; }

    table {overflow-x:scroll;}
td { white-space:nowrap}

.btn-sm-menu {
        border-radius: 3px;
        transition-duration: 0.4s;
        background-color: #ccd5ae;
        border: 3px solid #ddd;
        color: black;
        font-size: 12px;
        height: 60px;
        margin: 0 0 10px 10px;
        min-width: 80px;
        padding: 15px 5px;
        position: relative;
        text-align: center;
           /* float: right; */
     
    }
    .btn-sm-menu:hover {
        border-radius: 3px;
      background-color: #4CAF50; /* Green */
       color: white;
        border: 3px solid #ddd;
        font-size: 12px;
        height: 60px;
        margin: 0 0 10px 10px;
        min-width: 80px;
        padding: 15px 5px;
        position: relative;
        text-align: center;
        /* float: le; */
    }

      /* .btn-sm-menu>.fa, .btn-sm-menu>.fab, .btn-sm-menu>.far, .btn-sm-menu>.fas, .btn-sm-menu>.glyphicon, .btn-sm-menu>.ion {
    display: grid;
    font-size: 20px;
} */
</style>

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


                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
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
                                                <td>{{ $item->item_quantity }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->description }}</td>
                                                {{-- <td>{{ $item->update_date }}</td> --}}
                                                
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
     <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 
     <!-- Page level custom scripts -->
     <script src="js/demo/datatables-demo.js"></script>

 <!-- SweetAlert2 scripts -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                 <script src="build/js/moment.js"></script>
     <script src="build/js/tempusdominus-bootstrap-4.js"></script>

<!-- SweetAlert2 scripts -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script>
                $('#dataTable').dataTable( {
                "scrollX": true,
                "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "autoWidth": true,
                             orderCellsTop: true,
                            // orderCellsTop: true,
                            dom:
                                 "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                                 "<'row'<'col-sm-12'tr>>" +
                                 "<'row'<'col-sm-4'><'col-sm-4 text-center'><'col-sm-4'p>>",
                             buttons: [
                                 {
                                     extend: 'excelHtml5',
                                     text: '<i class="fas fa-file-download"></i> Export',
                                     titleAttr: 'Export',
                                     className: 'btn-sm-menu',
                                     filename: 'Inventory Report',
                                 },
                                {
                                    extend: 'print',
                                    text: ' <i class="fas fa-print sav"></i> Print',
                                    titleAttr: 'Print',
                                    className: 'btn-sm-menu tes',
                                }
                            ],
                } );
                
            </script>
</body>



</html>
