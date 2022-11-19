<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    @include('admin_tpl/style')
</head>

<body class="" id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <div class="sidebar-content">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-left" href="">

                    <p><b>Xin chào, {{ Auth::user()->name }}</b> </p>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                  <!-- Nav Item - Dashboard -->
                  <li class="nav-item active ">
                    <a class="nav-link " href="/admin/user"><i class="fa-sharp fa-solid fa-users"></i> Quản lý User</a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item ">
                    <a class="nav-link " href="/admin"> <i class="fa-solid fa-bars"></i>Quản lý sản phẩm</a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link " href="/admin/order"><i class="fa-regular fa-pen-to-square"></i> Quản lý đơn hàng</a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link " href="/admin/revenu"><i class="fa-solid fa-sack-dollar"></i> Quản lý doanh thu</a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin_tpl/topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách nhân viên</h1>
                    <div style="overflow:auto;">
                        <a href="/admin/add_user" class="btn mr-2" style="float: right; background-color: #3b4a6b; color: rgba(255,255,255,.8)"> Thêm tài khoản </a>
                    </div>
                    <br>
                  
                    <!-- Product list -->
                    <div class="card shadow mb-4">

                    <div class="card-body">
                            <div class="table-responsive">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                                @endif
                              
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>No.</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Role</th>
                                            
                                            <th width="15%"></th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td></td>
                                            <td>{{ $user ->name}}</td>
                                            <td>{{ $user ->email}}</td>
                                            <th>{{ $user ->level}}</th>
                                            <th> @if($user ->level =='1') admin @else Nhân viên @endif</th>
                                            
                                            
                                            <td class="d-flex justify-content-center">
                                                <a class="p-1 m-1 btn btn-primary" href="/admin/edit_user/{{$user->id}}">Sửa</a>
                                                <form action="delete_user/{{$user->id}}"  method="post" onsubmit="return confirm('Bạn có muốn xóa?')">
                                                @method('delete')
                                                @csrf
                                                <button type = "submit" class="p-1 btn btn-danger m-1">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin_tpl/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin_tpl/logout_modal')


</body>

</html>