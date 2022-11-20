<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order</title>

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
                <li class="nav-item ">
                    <a class="nav-link " href="/admin/user"><i class="fa-sharp fa-solid fa-users"></i> Quản lý User</a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item ">
                    <a class="nav-link " href="/admin"> <i class="fa-solid fa-bars"></i>Quản lý sản phẩm</a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item ">
                    <a class="nav-link " href="/admin/order"><i class="fa-regular fa-pen-to-square"></i> Quản lý đơn hàng</a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item active">
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
                    <h1 class="h3 mb-2 text-gray-800">Tổng kết doanh thu</h1>
                    <!-- Product list -->
                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Giai đoạn </th>

                                            <th>Tên sản phẩm </th>
                                            <th>Số lượng</th>
                                            <th>Doanh thu </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($Revenus as $Revenu)
                                        <tr>

                                            <th> {{$Revenu->month}}</th>

                                            <th>{{$Revenu->ProductName}}</th>
                                            <th>{{$Revenu->quantity}}</th>

                                            <th>{{number_format($Revenu->Total)}}</th>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$Revenus->links()}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tổng kết số đơn đã đặt</h1>
                    <!-- Product list -->
                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Giai đoạn </th>

                                            <th>Số đơn hàng khách đặt</th>
                                            <th>Doanh thu </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>

                                            <th> {{$order->month}}</th>

                                            <th>{{$order->Status}}</th>

                                            <th>{{number_format($order->Total)}}</th>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$orders->links()}}
                            </div>
                        </div>
                    </div>

                </div>
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