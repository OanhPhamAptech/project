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
                <li class="nav-item active">
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
                    <!-- Dashboard -->
                    @include('admin_tpl/begin_page')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn hàng</h1>
                    <!-- Product list -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Order ID</th>
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th width="25%">Status</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders_pd as $order_pd)
                                        <tr>
                                            <td></td>
                                            <td class=" justify-content-center"> <a href="/admin/order_{{$order_pd->id}}" class="p-1 m-1">{{$order_pd->id}} </a> </td>
                                            <td>{{$order_pd->Total}}</td>
                                            <td>{{$order_pd->created_at}}</td>
                                           
                                            <td>
                                                <form style="display:inline-block;" action="/admin/aprrove_order_{{$order_pd->id}}" method="post" onsubmit="return confirm('Bạn muốn duyệt đơn hàng này?')">
                                                    @csrf
                                                    <button type="submit" class="p-1 m-1 btn btn-success">Duyệt đơn</button>
                                                </form>
                                                <form style="display:inline-block;" action="/admin/cancel_order_{{$order_pd->id}}" method="post" onsubmit="return confirm('Bạn muốn hủy đơn hàng này?')">
                                                    @csrf
                                                    <button type="submit" class="p-1 m-1 btn btn-danger ">Hủy đơn </button>
                                                </form>
                                            </td>                                         

                                        </tr>
                                        @endforeach
                                        @foreach ($orders_ap as $order_ap)
                                        <tr>
                                            <td></td>
                                            <td class=" justify-content-center"> <a href="/admin/order_{{$order_ap->id}}" class="p-1 m-1">{{$order_ap->id}} </a> </td>
                                            <td>{{$order_ap->Total}}</td>
                                            <td>{{$order_ap->created_at}}</td>  
                                            @if($order_ap->Status==1)                                     
                                            
                                            <td class="text-success">Đã duyệt bởi {{$order_ap->name}} </td>
                                            @elseif($order_ap->Status==2)
                                            <td class="text-danger">Đã hủy bởi {{$order_ap->name}}</td>
                                            @endif
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