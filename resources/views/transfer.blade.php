<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.7/css/bootstrap.min.css"> -->
    <link href="build/css/tempusdominus-bootstrap-4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha256-yMjaV542P+q1RnH6XByCPDfUFhmOafWbeLPmqKh11zo=" crossorigin="anonymous" />
    <!-- Untuk Icon Button  dan Font -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS untuk Table Halaman ini -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" rel="stylesheet"/> -->

    <title>Trivento | Transfer Item</title>
    <link rel="icon" type="image/jpg" href="img/logo.png">
</head>

<style type="text/css">
    .input-group-append { cursor: pointer; }

    table {overflow-x:scroll;}
td { white-space:nowrap}
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
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
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
                <h1 class="h3 mb-2 text-gray-800">Transfer Items</h1>
                <p class="mb-4">Transfer for Asset Items</p>
                
                <!-- DataTables -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
    
                            @if(session()->has('editsuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('editsuccess') }}
                            </div>
                            @endif

                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddAssetItemModal">Taken</button>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddConsumableItemModal">Return</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x:auto">
                                <table class="table table-bordered" id="dataTable" style="overflow-x: scroll;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ItemName</th>
                                            {{-- <th>Item Name</th> --}}
                                            <th>Username</th>
                                            <th>TakenDate</th>
                                            <th>ReturnDate</th>
                                            <th>TakenIssue</th>
                                            <th>ReturnIssue</th>
                                            <th>ApprovedBy</th>
                                            <th>Created At</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($showTransfer as $value)
                                        <tr>
                                            <input type="hidden" class="transferid_value" value="{{ $value->id }}">
                                            <td>{{ $value->items->item_name}}</td>
                                            <td>{{ $value->users->username}}</td>
                                            <td>{{ $value->taken_date}}</td>
                                            <td>{{ $value->return_date}}</td>
                                            <td>{{ $value->taken_issue}}</td>
                                            <td>{{ $value->return_issue}}</td>
                                            <td>{{ $value->approvedby}}</td>
                                            {{-- <td>Borrowing</td> --}}
                                            {{-- <td></td> --}}
                                            <td>{{ $value->created_at}}</td>
                                            <td>{{ $value->updated_at}}</td>
                                            <td>
                                            <button type="button" id="edittest" data-toggle="modal" data-target="#EditUserModal"
                                            data-id="{{ $value->id }}" data-itemid="{{ $value->item_id }}" data-itemname="{{ $value->items->item_name }}" data-username="{{ $value->username}}" data-takendate="{{ $value->taken_date}}" data-takenissue="{{ $value->taken_issue}}" class="btn btn-success edit hasPopOver" data-backdrop="static" data-keyboard="false" style="font-size: 12px;padding: 4px 7px 4px 7px;"><i class="fa fa-edit"></i></button>
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
            
            <!-- End of Modal Add Asset Item -->

            <div class="modal fade" id="AddAssetItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Asset Details</h5>
                    </div>
                    <form action="{{ action('App\Http\Controllers\TransferController@store')}}" method="POST" autocomplete="off">
                        @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_karyawan" id="id_karyawan">
                        <input type="hidden" name="validatereturndate" id="validatereturndate">

                        <div class="form-group">
                        <label>User ID/User Name</label>
                        <select required name="username" id="#" class="form-control @error('username') is-invalid @enderror">
                        <option value="">Select Taken By</option>
                        @if (isset($dataUser))
                        @foreach ($dataUser as $values)
                        <option value="{{$values->id}}" {{old('username') == $values->id ? 'selected' : ''}}>{{$values->username}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        @error('username')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-group">
                        <label>Item ID/Item Name</label>
                        <select required name="itemid" id="itemid" class="form-control @error('itemid') is-invalid @enderror" onchange="selectitem()">
                        <option value="">Select Item</option>
                        @if (isset($dataItem))
                        @foreach ($dataItem as $values)
                        <option value="{{$values->id}}" {{old('itemid') == $values->id ? 'selected' : ''}}>{{$values->item_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        @error('itemid')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-group">
                        <label>Taken Date</label>
                        <div required class="input-group date" id="datetimepicker-demo" data-target-input="nearest">
                          <input type="text" name="takendate" class="form-control datetimepicker-input @error('taken_datetime') is-invalid @enderror" data-target="#datetimepicker-demo" value="{{ old('takendate') }}"/>
                          <div class="input-group-append" data-target="#datetimepicker-demo" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        </div>

                        @error('taken_datetime')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                        
                        <div class="form-group">
                        <label>Taken Issue</label>
                        <textarea required type="text" name="takenissue" id="#" class="form-control @error('takenissue') is-invalid @enderror" placeholder="Enter Taken Issue">{{Request::old('takenissue')}}</textarea> 
                        </div>

                        @error('takenissue')
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

            <!-- Modal Add Consumable Item -->
            <div class="modal fade" id="AddConsumableItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Return Asset Item Details</h5>
                    </div>
                    <form action="{{ route('transfer.update','edit')}}" method="POST" autocomplete="off">
                        {{ method_field('patch') }}
                            @csrf
                    <div class="modal-body">
                        <input type="hidden" name="Transferid2" id="Transferid2">
                        <input type="hidden" name="validatetakendate" id="validatetakendate">

                        <div class="form-group">
                        <label>Item ID/Item Name</label>
                        <select required name="ReturnItemId" id="ReturnItemId" onchange="selectitem2()" class="form-control">
                        <option value="">Select Item</option>
                        @if (isset($dataReturnItem))
                        @foreach ($dataReturnItem as $values)
                        <option value="{{$values->item_id}}" {{old('ReturnItemId') == $values->item_id ? 'selected' : ''}}>{{$values->items->item_name}}</option>
                        @endforeach
                        @endif
                        </select>
                        </div>

                        <div class="form-group">
                            <label>Taken by</label>
                            <input type="text" id="UserName2" name="UserName2" value="{{ old('UserName2') }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                        <label>Return Date</label>
                         <div class="input-group date" id="datetimepicker-demo2" data-target-input="nearest">
                          <input type="text" name="returndate" class="form-control datetimepicker-input @error('return_datetime') is-invalid @enderror" data-target="#datetimepicker-demo2" value="{{ old('returndate') }}"/>
                          <div class="input-group-append" data-target="#datetimepicker-demo2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        </div>

                        @error('return_datetime')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                        
                        <div class="form-group">
                        <label>Return Issue</label>
                        <textarea type="text" name="returnissue" required id="#" class="form-control" placeholder="Enter Return Issue">{{Request::old('returnissue')}}</textarea> 
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
            <!-- End of Modal Add Consumable Item -->


            <!-- Modal Edit Item -->
            <div class="modal fade" id="EditUserModal" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change User Details</h5>
                    </div>
                    <form action="{{ route('transfer.update','edit')}}" method="POST" autocomplete="off">
                        {{ method_field('patch') }}
                            @csrf
                        <div class="modal-body">
                            {{-- <form action="#" method="POST" autocomplete="off"> --}}
                            <input type="hidden" name="Transferid" id="Transferid">
                            <input type="hidden" name="editreturndate" id="editreturndate">
    
                            <div class="form-group">
                            <label>User ID/User Name</label>
                            <select required name="username" id="username" class="form-control">
                            <option value="">Select Taken By</option>
                            @if (isset($dataUser))
                            @foreach ($dataUser as $values)
                            <option value="{{$values->id}}" {{old('username') == $values->id ? 'selected' : ''}}>{{$values->username}}</option>
                            @endforeach
                            @endif
                            </select>
                            </div>
    
                            <div class="form-group">
                            <label>Item ID/Item Name</label>
                            <select required name="edititemid" id="edititemid" class="form-control" onchange="selectitem3()">
                            <option value="">Select Item</option>
                            <option id="EditOption" {{old('edititemid') == '1' ? 'selected' : ''}} value=""></option>
                            @if (isset($dataItem))
                            @foreach ($dataItem as $values)
                            <option value="{{$values->id}}" {{old('edititemid') == $values->id ? 'selected' : ''}}>{{$values->item_name}}</option>
                            @endforeach
                            @endif
                            </select>
                            </div>
    
                            <div class="form-group">
                            <label>Taken Date</label>
                            <div class="input-group date" id="datetimepicker-demo3" data-target-input="nearest">
                              <input type="text" id="takendate" name="edittakendate" class="form-control datetimepicker-input" data-target="#datetimepicker-demo3" value="{{ old('edittakendate') }}"/>
                              <div class="input-group-append" data-target="#datetimepicker-demo3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                            </div>

                            @error('taken_date_time')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
    
                            
                            <div class="form-group">
                            <label>Taken Issue</label>
                            <textarea type="text" id="edittakenissue" required name="edittakenissue" class="form-control" placeholder="Enter Taken Issue">{{Request::old('edittakenissue')}}</textarea> 
                            </div>
                        </div>
    
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" id="closemodal" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script src="build/js/moment.js"></script>
        <script src="build/js/tempusdominus-bootstrap-4.js"></script>

   <!-- SweetAlert2 scripts -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
$('#datetimepicker-demo').datetimepicker({
        format: 'YYYY-MM-DD HH:mm', 
        allowInputToggle: true,
        icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }

});
    $('#datetimepicker-demo2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm', 
            allowInputToggle: true,
        icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
});
$('#datetimepicker-demo3').datetimepicker({
        format: 'YYYY-MM-DD HH:mm', 
        allowInputToggle: true,
        icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
});


$('#takendate').change(function(){
    $(this).attr('value', $('#takendate').val());
});
</script>
@if ($errors->has('taken_datetime') || $errors->has('return_datetime') || (count($errors) <= 0))
<script>
    $('#EditUserModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var itemid = button.data('itemid')
        var itemname = button.data('itemname')
        var username = button.data('username')
        var takendate = button.data('takendate')
        var takenissue = button.data('takenissue')
        sessionStorage.setItem('itemid', itemid);
        sessionStorage.setItem('itemname', itemname);
        sessionStorage.setItem('id', id);
        // localStorage.setItem('button',button);

        $('#EditOption').val(itemid);
        $('#EditOption').text(itemname);
        var modal =$(this)
        modal.find('.modal-body #Transferid').val(id);
        modal.find('.modal-body #username').val(username);
        modal.find('.modal-body #edititemid').val(itemid).trigger('change');
        modal.find('.modal-body #takendate').val(takendate);
        modal.find('.modal-body #edittakenissue').val(takenissue);

    });
    </script>
@else
    <script>
        $('#EditOption').val(sessionStorage.getItem('itemid'));
        $('#EditOption').text(sessionStorage.getItem('itemname'));
        $('#Transferid').val(sessionStorage.getItem('id'));
        // location.reload();
    </script>
@endif

            <!--Delete User SweetAlert Scripts -->
            <script>
                // $('#edittest').on('hidden.bs.modal', function (e) {           
                //     location.reload();
                // })
                $("#closemodal").click(function(){
                    location.reload();
                });

                $(document).ready(function () {
        
                    $('.delete').click(function (e) {
                        e.preventDefault();
                        
                        var delete_id = $(this).closest("tr").find('.transferid_value').val();
                        
                            swal({
                                title: "Delete this transfer data?",
                                text: "Once deleted, transfer data will be gone!",
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
                                url: "{!! url('transfer' ) !!}" + "/"+delete_id,
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


    <!-- Add User Modal Validation Error Scripts -->
    @if ($errors->has('taken_date_time'))
    <script type="text/javascript">
        $( document ).ready(function() {
            $( "#edittest" ).click();
            // $('#EditUserModal').modal('show');
            // $('#EditUserModal').modal({backdrop: 'static', keyboard: false})  
            selectitem3();
        });
    </script>
    @endif
    @if ($errors->has('taken_datetime'))
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#AddAssetItemModal').modal('show');
            selectitem();
        });
    </script>
    @endif
    @if ($errors->has('return_datetime'))
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#AddConsumableItemModal').modal('show');
                selectitem2();
            });
        </script>
    @endif
    <!-- End of Add User Modal Validation Error Scripts -->
    <script>
        $('#dataTable').dataTable( {
        "scrollX": true
        } );

        function selectitem(){
            var item = $('#itemid').val();
            var data = {
                "id": item
            };
            // alert(item);
            $.ajax({
                    url: "/Taken",
                    data: data
                })
                .done(function( data ) {
                    var date = data.answer.return_date;
                    if(date == "" || date == null || date == undefined){
                        $('#validatereturndate').val('');
                    }
                    else{
                        $('#validatereturndate').val(data.answer.return_date);
                    }
                });
        }

        function selectitem2(){
            var item = $('#ReturnItemId').val();
            var data = {
                "id": item
            };
            // alert(item);
            $.ajax({
                    url: "/Return",
                    data: data
                })
                .done(function( data ) {
                    // console.log(data.answer.username);
                    $('#UserName2').val(data.username.username);
                    $('#Transferid2').val(data.answer.id);
                    $('#validatetakendate').val(data.answer.taken_date);
                });
        }

        function selectitem3(){
            var item = $('#edititemid').val();
            var data = {
                "id": item
            };
            // alert(item);
            $.ajax({
                    url: "/EditTaken",
                    data: data
                })
                .done(function( data ) {
                    $('#editreturndate').val(data.answer.return_date);
                });
        }
    </script>
</body>
</html>